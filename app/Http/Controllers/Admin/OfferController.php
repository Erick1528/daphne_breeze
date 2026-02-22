<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class OfferController extends Controller
{
    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'image' => 'required|image|mimes:webp,jpg,jpeg,png|max:5120',
        'link' => 'nullable|string|max:500',
        'start_date' => 'nullable|date',
        'end_date' => 'nullable|date|after_or_equal:start_date',
        'discount_percent' => 'nullable|integer|min:0|max:100',
        'terms' => 'nullable|string',
        'featured' => 'boolean',
        'active' => 'boolean',
        'order' => 'nullable|integer|min:0',
    ];

    protected $messages = [
        'title.required' => 'El título es obligatorio.',
        'title.max' => 'El título no puede superar 255 caracteres.',
        'image.required' => 'La imagen es obligatoria.',
        'image.image' => 'El archivo debe ser una imagen.',
        'image.mimes' => 'La imagen debe ser formato WebP, JPG, JPEG o PNG.',
        'image.max' => 'La imagen no puede superar 5MB.',
        'link.max' => 'El enlace no puede superar 500 caracteres.',
        'start_date.date' => 'La fecha de inicio debe ser una fecha válida.',
        'end_date.date' => 'La fecha de fin debe ser una fecha válida.',
        'end_date.after_or_equal' => 'La fecha de fin debe ser igual o posterior a la fecha de inicio.',
        'discount_percent.integer' => 'El descuento debe ser un número entero.',
        'discount_percent.min' => 'El descuento no puede ser negativo.',
        'discount_percent.max' => 'El descuento no puede superar 100%.',
        'order.integer' => 'El orden debe ser un número entero.',
        'order.min' => 'El orden no puede ser negativo.',
    ];

    protected function validationAttributes(): array
    {
        return [
            'title' => 'título',
            'description' => 'descripción',
            'image' => 'imagen',
            'link' => 'enlace',
            'start_date' => 'fecha de inicio',
            'end_date' => 'fecha de fin',
            'discount_percent' => 'descuento',
            'terms' => 'términos',
            'order' => 'orden',
        ];
    }

    public function index()
    {
        $offers = Offer::orderBy('order')->orderBy('id')->get();
        return view('admin.offers.index', compact('offers'));
    }

    public function create()
    {
        return view('admin.offers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate($this->rules, $this->messages, $this->validationAttributes());
        $paths = $this->processAndStoreImage($request->file('image'), 'offers');
        $validated['image'] = $paths['image'];
        $validated['image_jpg'] = $paths['image_jpg'];
        $validated['active'] = $request->boolean('active');
        $validated['featured'] = $request->boolean('featured');
        $validated['order'] = (int) ($validated['order'] ?? 0);
        $validated['discount_percent'] = $validated['discount_percent'] ?? null;

        Offer::create($validated);

        return redirect()->route('admin.offers.index')
            ->with('success', 'Oferta creada correctamente.');
    }

    public function edit(Offer $offer)
    {
        return view('admin.offers.edit', compact('offer'));
    }

    public function update(Request $request, Offer $offer)
    {
        $rules = $this->rules;
        $rules['image'] = 'nullable|image|mimes:webp,jpg,jpeg,png|max:5120';

        $validated = $request->validate($rules, $this->messages, $this->validationAttributes());
        $validated['active'] = $request->boolean('active');
        $validated['featured'] = $request->boolean('featured');
        $validated['order'] = (int) ($validated['order'] ?? 0);
        $validated['discount_percent'] = $validated['discount_percent'] ?? null;

        if ($request->hasFile('image')) {
            $this->deleteOfferImages($offer);
            $paths = $this->processAndStoreImage($request->file('image'), 'offers');
            $validated['image'] = $paths['image'];
            $validated['image_jpg'] = $paths['image_jpg'];
        } else {
            unset($validated['image']);
        }

        $offer->update($validated);

        return redirect()->route('admin.offers.index')
            ->with('success', 'Oferta actualizada correctamente.');
    }

    public function destroy(Offer $offer)
    {
        $this->deleteOfferImages($offer);

        $offer->delete();

        return redirect()->route('admin.offers.index')
            ->with('success', 'Oferta eliminada correctamente.');
    }

    /**
     * Procesa la imagen: genera WebP (para web) y JPG (para OG) en la misma carpeta.
     * Devuelve ['image' => ruta webp, 'image_jpg' => ruta jpg].
     */
    private function processAndStoreImage($file, string $folder = 'offers'): array
    {
        $uuid = Str::uuid();
        $pathWebp = $folder . '/' . $uuid . '.webp';
        $pathJpg = $folder . '/' . $uuid . '.jpg';

        Storage::disk('public')->makeDirectory($folder);

        $imageInfo = getimagesize($file->getRealPath());
        $mimeType = $imageInfo['mime'];

        switch ($mimeType) {
            case 'image/jpeg':
                $sourceImage = imagecreatefromjpeg($file->getRealPath());
                break;
            case 'image/png':
                $sourceImage = imagecreatefrompng($file->getRealPath());
                break;
            case 'image/webp':
                $sourceImage = imagecreatefromwebp($file->getRealPath());
                break;
            default:
                throw new \Exception('Formato de imagen no soportado');
        }

        $maxWidth = 1920;
        $originalWidth = imagesx($sourceImage);
        $originalHeight = imagesy($sourceImage);

        if ($originalWidth > $maxWidth) {
            $newWidth = $maxWidth;
            $newHeight = (int)($originalHeight * ($maxWidth / $originalWidth));
        } else {
            $newWidth = $originalWidth;
            $newHeight = $originalHeight;
        }

        $resizedImage = imagecreatetruecolor($newWidth, $newHeight);

        if ($mimeType === 'image/png') {
            imagealphablending($resizedImage, false);
            imagesavealpha($resizedImage, true);
            $transparent = imagecolorallocatealpha($resizedImage, 255, 255, 255, 127);
            imagefilledrectangle($resizedImage, 0, 0, $newWidth, $newHeight, $transparent);
        }

        imagecopyresampled($resizedImage, $sourceImage, 0, 0, 0, 0, $newWidth, $newHeight, $originalWidth, $originalHeight);

        $quality = 85;
        $tempFile = tempnam(sys_get_temp_dir(), 'webp_');
        imagewebp($resizedImage, $tempFile, $quality);

        $fileSize = filesize($tempFile);
        $maxSize = 200 * 1024;

        if ($fileSize > $maxSize) {
            for ($q = $quality; $q >= 50 && $fileSize > $maxSize; $q -= 5) {
                imagewebp($resizedImage, $tempFile, $q);
                $fileSize = filesize($tempFile);
            }
        }

        // Guardar WebP en storage
        Storage::disk('public')->put($pathWebp, file_get_contents($tempFile));

        // Generar JPG en la misma carpeta (para Open Graph)
        $tempJpg = tempnam(sys_get_temp_dir(), 'jpg_');
        imagejpeg($resizedImage, $tempJpg, 88);
        Storage::disk('public')->put($pathJpg, file_get_contents($tempJpg));
        unlink($tempJpg);

        imagedestroy($sourceImage);
        imagedestroy($resizedImage);
        unlink($tempFile);

        return [
            'image' => 'storage/' . $pathWebp,
            'image_jpg' => 'storage/' . $pathJpg,
        ];
    }

    /**
     * Elimina los archivos de imagen (WebP y JPG) de una oferta.
     */
    private function deleteOfferImages(Offer $offer): void
    {
        foreach (['image', 'image_jpg'] as $attr) {
            $path = $offer->{$attr};
            if ($path) {
                $relative = str_replace('storage/', '', $path);
                if (Storage::disk('public')->exists($relative)) {
                    Storage::disk('public')->delete($relative);
                }
            }
        }
    }
}
