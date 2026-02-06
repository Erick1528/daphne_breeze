<?php

namespace App\Livewire\Admin;

use App\Models\Room;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class RoomCreate extends Component
{
    use WithFileUploads;

    public $title = '';
    public $description = '';
    public $image;
    public $processedImagePath = null;
    public $persons = '';
    public $beds = '';
    public $beds_label = '';
    public $price = '';
    public $order = 0;
    public $active = true;

    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'image' => 'required|image|mimes:webp,jpg,jpeg,png|max:5120',
        'persons' => 'required|integer|min:1',
        'beds' => 'required|integer|min:1',
        'beds_label' => 'required|string|max:255',
        'price' => 'nullable|numeric|min:0',
        'active' => 'boolean',
        'order' => 'nullable|integer|min:0',
    ];

    protected $messages = [
        'title.required' => 'El título es obligatorio.',
        'title.max' => 'El título no puede superar 255 caracteres.',
        'description.required' => 'La descripción es obligatoria.',
        'image.required' => 'La imagen es obligatoria.',
        'image.image' => 'El archivo debe ser una imagen.',
        'image.mimes' => 'La imagen debe ser formato WebP, JPG, JPEG o PNG.',
        'image.max' => 'La imagen no puede superar 5MB.',
        'persons.required' => 'El número de personas es obligatorio.',
        'persons.integer' => 'El número de personas debe ser un número entero.',
        'persons.min' => 'Debe haber al menos 1 persona.',
        'beds.required' => 'El número de camas es obligatorio.',
        'beds.integer' => 'El número de camas debe ser un número entero.',
        'beds.min' => 'Debe haber al menos 1 cama.',
        'beds_label.required' => 'La etiqueta de camas es obligatoria.',
        'beds_label.max' => 'La etiqueta de camas no puede superar 255 caracteres.',
        'price.numeric' => 'El precio debe ser un número.',
        'price.min' => 'El precio no puede ser negativo.',
        'order.integer' => 'El orden debe ser un número entero.',
        'order.min' => 'El orden no puede ser negativo.',
    ];

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
        if ($this->processedImagePath) {
            $this->rules['image'] = 'nullable';
        }
        $this->validate($this->rules, $this->messages);

        $imagePath = $this->processAndStoreImage();

        Room::create([
            'title' => $this->title,
            'description' => $this->description ?: null,
            'image' => $imagePath,
            'persons' => (int) $this->persons,
            'beds' => (int) $this->beds,
            'beds_label' => $this->beds_label,
            'price' => $this->price !== '' ? $this->price : null,
            'active' => (bool) $this->active,
            'order' => (int) $this->order,
        ]);

        if ($this->processedImagePath && Storage::disk('public')->exists($this->processedImagePath)) {
            Storage::disk('public')->delete($this->processedImagePath);
        }

        session()->flash('success', 'Habitación creada correctamente.');
        return $this->redirect(route('admin.rooms.index'), navigate: true);
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
        $path = 'rooms/' . $filename;
        Storage::disk('public')->makeDirectory('rooms');

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
        return view('livewire.admin.room-create');
    }
}
