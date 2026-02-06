<?php

namespace App\Livewire\Admin;

use App\Models\Offer;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class OfferEdit extends Component
{
    use WithFileUploads;

    public $offer;
    public $title = '';
    public $description = '';
    public $link = '';
    public $terms = '';
    public $image;
    public $processedImagePath = null;
    public $start_date = '';
    public $end_date = '';
    public $discount_percent = '';
    public $order = 0;
    public $featured = false;
    public $active = true;

    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'image' => 'nullable|image|mimes:webp,jpg,jpeg,png|max:5120',
        'link' => 'nullable|string|max:500',
        'start_date' => 'nullable|date',
        'end_date' => 'nullable|date|after_or_equal:start_date',
        'discount_percent' => 'nullable|integer|min:0|max:100',
        'terms' => 'required|string',
        'featured' => 'boolean',
        'active' => 'boolean',
        'order' => 'nullable|integer|min:0',
    ];

    protected $messages = [
        'title.required' => 'El título es obligatorio.',
        'title.max' => 'El título no puede superar 255 caracteres.',
        'description.required' => 'La descripción es obligatoria.',
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
        'terms.required' => 'Los términos y condiciones son obligatorios.',
    ];

    public function mount(Offer $offer)
    {
        $this->offer = $offer;
        $this->title = $offer->title;
        $this->description = $offer->description ?? '';
        $this->link = $offer->link ?? '';
        $this->terms = $offer->terms ?? '';
        $this->start_date = $offer->start_date?->format('Y-m-d') ?? '';
        $this->end_date = $offer->end_date?->format('Y-m-d') ?? '';
        $this->discount_percent = $offer->discount_percent ?? '';
        $this->order = $offer->order ?? 0;
        $this->featured = $offer->featured ?? false;
        $this->active = $offer->active ?? true;
    }

    public function removeImage()
    {
        if ($this->processedImagePath && Storage::disk('public')->exists($this->processedImagePath)) {
            Storage::disk('public')->delete($this->processedImagePath);
        }
        $this->reset(['image', 'processedImagePath']);
    }

    public function updatedImage()
    {
        $this->validateOnly('image', [
            'image' => 'image|mimes:webp,jpg,jpeg,png|max:5120',
        ]);
        if ($this->image) {
            if ($this->processedImagePath && Storage::disk('public')->exists($this->processedImagePath)) {
                Storage::disk('public')->delete($this->processedImagePath);
            }
            $this->processedImagePath = $this->image->store('temp', 'public');
        }
    }

    public function save()
    {
        $this->validate($this->rules, $this->messages);

        $data = [
            'title' => $this->title,
            'description' => $this->description ?: null,
            'link' => $this->link ?: null,
            'terms' => $this->terms ?: null,
            'start_date' => $this->start_date ?: null,
            'end_date' => $this->end_date ?: null,
            'discount_percent' => $this->discount_percent !== '' ? (int) $this->discount_percent : null,
            'featured' => (bool) $this->featured,
            'active' => (bool) $this->active,
            'order' => (int) $this->order,
        ];

        if ($this->image || $this->processedImagePath) {
            if ($this->offer->image && Storage::disk('public')->exists(str_replace('storage/', '', $this->offer->image))) {
                Storage::disk('public')->delete(str_replace('storage/', '', $this->offer->image));
            }
            $data['image'] = $this->processAndStoreImage();
        }

        $this->offer->update($data);

        if ($this->processedImagePath && Storage::disk('public')->exists($this->processedImagePath)) {
            Storage::disk('public')->delete($this->processedImagePath);
        }

        session()->flash('success', 'Oferta actualizada correctamente.');
        return $this->redirect(route('admin.offers.index'), navigate: true);
    }

    private function processAndStoreImage(): string
    {
        if ($this->processedImagePath) {
            $fullPath = Storage::disk('public')->path($this->processedImagePath);
            $mimeType = mime_content_type($fullPath);
            $uploadedFile = new \Illuminate\Http\UploadedFile(
                $fullPath,
                basename($this->processedImagePath),
                $mimeType,
                null,
                true
            );
            return $this->processAndStoreImageFile($uploadedFile);
        }
        return $this->processAndStoreImageFile($this->image);
    }

    private function processAndStoreImageFile($file): string
    {
        $filename = Str::uuid() . '.webp';
        $path = 'offers/' . $filename;
        Storage::disk('public')->makeDirectory('offers');

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
        Storage::disk('public')->put($path, file_get_contents($tempFile));
        imagedestroy($sourceImage);
        imagedestroy($resizedImage);
        unlink($tempFile);

        return 'storage/' . $path;
    }

    public function render()
    {
        return view('livewire.admin.offer-edit');
    }
}
