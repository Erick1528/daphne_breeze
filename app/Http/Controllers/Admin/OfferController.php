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
        $validated['image'] = $this->processAndStoreImage($request->file('image'), 'offers');
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
            $this->deleteOfferImageAndOg($offer->image);
            $validated['image'] = $this->processAndStoreImage($request->file('image'), 'offers');
        } else {
            unset($validated['image']);
        }

        $offer->update($validated);

        return redirect()->route('admin.offers.index')
            ->with('success', 'Oferta actualizada correctamente.');
    }

    public function destroy(Offer $offer)
    {
        $this->deleteOfferImageAndOg($offer->image);

        $offer->delete();

        return redirect()->route('admin.offers.index')
            ->with('success', 'Oferta eliminada correctamente.');
    }

    private function processAndStoreImage($file, string $folder = 'offers'): string
    {
        $uuid = Str::uuid();
        $filename = $uuid . '.webp';
        $path = $folder . '/' . $filename;

        // Crear directorios si no existen
        Storage::disk('public')->makeDirectory($folder);
        Storage::disk('public')->makeDirectory($folder . '/og');

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
        Storage::disk('public')->put($path, file_get_contents($tempFile));

        // Generar JPG para Open Graph (Facebook no soporta WebP al 100%)
        $ogPath = $folder . '/og/' . $uuid . '.jpg';
        $tempJpg = tempnam(sys_get_temp_dir(), 'og_');
        imagejpeg($resizedImage, $tempJpg, 88);
        Storage::disk('public')->put($ogPath, file_get_contents($tempJpg));
        unlink($tempJpg);

        imagedestroy($sourceImage);
        imagedestroy($resizedImage);
        unlink($tempFile);

        return 'storage/' . $path;
    }

    /**
     * Ruta de la imagen OG (JPG) a partir de la ruta de la imagen principal.
     */
    private function getOgImagePath(string $imagePath): string
    {
        $relative = str_replace('storage/', '', $imagePath);
        $baseName = pathinfo($relative, PATHINFO_FILENAME);
        $folder = pathinfo($relative, PATHINFO_DIRNAME);

        return 'storage/' . $folder . '/og/' . $baseName . '.jpg';
    }

    /**
     * Elimina la imagen principal y su versión OG si existe.
     */
    private function deleteOfferImageAndOg(?string $imagePath): void
    {
        if (! $imagePath) {
            return;
        }
        $relative = str_replace('storage/', '', $imagePath);
        if (Storage::disk('public')->exists($relative)) {
            Storage::disk('public')->delete($relative);
        }
        $ogPath = str_replace('storage/', '', $this->getOgImagePath($imagePath));
        if (Storage::disk('public')->exists($ogPath)) {
            Storage::disk('public')->delete($ogPath);
        }
    }
}
