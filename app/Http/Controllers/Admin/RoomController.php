<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class RoomController extends Controller
{
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

    protected function validationAttributes(): array
    {
        return [
            'title' => 'título',
            'description' => 'descripción',
            'image' => 'imagen',
            'persons' => 'personas',
            'beds' => 'camas',
            'beds_label' => 'etiqueta de camas',
            'price' => 'precio',
            'order' => 'orden',
        ];
    }

    public function index()
    {
        $rooms = Room::orderBy('order')->orderBy('id')->get();
        return view('admin.rooms.index', compact('rooms'));
    }

    public function create()
    {
        return view('admin.rooms.create');
    }

    public function store(Request $request)
    {
        $rules = $this->rules;
        
        // Si hay una imagen procesada desde Livewire, usar esa
        if ($request->has('processed_image_path') && $request->input('processed_image_path')) {
            $tempPath = $request->input('processed_image_path');
            $imageFile = Storage::disk('public')->get($tempPath);
            
            // Crear un archivo temporal para procesar
            $tempFile = tempnam(sys_get_temp_dir(), 'room_image_');
            file_put_contents($tempFile, $imageFile);
            
            // Crear un UploadedFile simulado
            $uploadedFile = new \Illuminate\Http\UploadedFile(
                $tempFile,
                basename($tempPath),
                mime_content_type($tempFile),
                null,
                true
            );
            
            // Procesar y guardar imagen
            $imagePath = $this->processAndStoreImage($uploadedFile, 'rooms');
            $validated['image'] = $imagePath;
            
            // Eliminar archivo temporal
            Storage::disk('public')->delete($tempPath);
            unlink($tempFile);
            
            // Validar sin la regla de imagen requerida
            $rules['image'] = 'nullable';
            $validated = $request->validate($rules, $this->messages, $this->validationAttributes());
        } else {
            // Validación normal con imagen requerida
            $validated = $request->validate($rules, $this->messages, $this->validationAttributes());
            
            // Procesar y guardar imagen
            $imagePath = $this->processAndStoreImage($request->file('image'), 'rooms');
            $validated['image'] = $imagePath;
        }

        Room::create($validated);

        return redirect()->route('admin.rooms.index')
            ->with('success', 'Habitación creada correctamente.');
    }

    public function edit(Room $room)
    {
        return view('admin.rooms.edit', compact('room'));
    }

    public function update(Request $request, Room $room)
    {
        $rules = $this->rules;
        $rules['image'] = 'nullable|image|mimes:webp,jpg,jpeg,png|max:5120';
        
        // Si hay una imagen procesada desde Livewire, usar esa
        if ($request->has('processed_image_path') && $request->input('processed_image_path')) {
            $tempPath = $request->input('processed_image_path');
            $imageFile = Storage::disk('public')->get($tempPath);

            $tempFile = tempnam(sys_get_temp_dir(), 'room_image_');
            file_put_contents($tempFile, $imageFile);

            $uploadedFile = new \Illuminate\Http\UploadedFile(
                $tempFile,
                basename($tempPath),
                mime_content_type($tempFile),
                null,
                true
            );

            // Eliminar imagen anterior
            if ($room->image && Storage::disk('public')->exists(str_replace('storage/', '', $room->image))) {
                Storage::disk('public')->delete(str_replace('storage/', '', $room->image));
            }

            $imagePath = $this->processAndStoreImage($uploadedFile, 'rooms');

            Storage::disk('public')->delete($tempPath);
            unlink($tempFile);

            // Validar primero; luego añadir la ruta de la imagen para que no se pierda
            $validated = $request->validate($rules, $this->messages, $this->validationAttributes());
            $validated['image'] = $imagePath;
        } else {
            $validated = $request->validate($rules, $this->messages, $this->validationAttributes());
            
            // Si se subió una nueva imagen, procesarla y eliminar la anterior
            if ($request->hasFile('image')) {
                // Eliminar imagen anterior
                if ($room->image && Storage::disk('public')->exists(str_replace('storage/', '', $room->image))) {
                    Storage::disk('public')->delete(str_replace('storage/', '', $room->image));
                }
                $imagePath = $this->processAndStoreImage($request->file('image'), 'rooms');
                $validated['image'] = $imagePath;
            } else {
                // Mantener la imagen existente
                unset($validated['image']);
            }
        }

        $room->update($validated);

        return redirect()->route('admin.rooms.index')
            ->with('success', 'Habitación actualizada correctamente.');
    }

    public function destroy(Room $room)
    {
        // Eliminar imagen
        if ($room->image && Storage::disk('public')->exists($room->image)) {
            Storage::disk('public')->delete($room->image);
        }

        $room->delete();

        return redirect()->route('admin.rooms.index')
            ->with('success', 'Habitación eliminada correctamente.');
    }

    /**
     * Procesa la imagen: convierte a WebP y comprime a máximo 200KB
     */
    private function processAndStoreImage($file, $folder = 'rooms')
    {
        $filename = Str::uuid() . '.webp';
        $path = $folder . '/' . $filename;

        // Crear directorio si no existe
        Storage::disk('public')->makeDirectory($folder);

        // Obtener información de la imagen
        $imageInfo = getimagesize($file->getRealPath());
        $mimeType = $imageInfo['mime'];

        // Crear recurso de imagen según el tipo
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

        // Calcular nuevas dimensiones manteniendo aspecto (máximo 1920px de ancho)
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

        // Crear imagen redimensionada
        $resizedImage = imagecreatetruecolor($newWidth, $newHeight);

        // Preservar transparencia para PNG
        if ($mimeType === 'image/png') {
            imagealphablending($resizedImage, false);
            imagesavealpha($resizedImage, true);
            $transparent = imagecolorallocatealpha($resizedImage, 255, 255, 255, 127);
            imagefilledrectangle($resizedImage, 0, 0, $newWidth, $newHeight, $transparent);
        }

        imagecopyresampled($resizedImage, $sourceImage, 0, 0, 0, 0, $newWidth, $newHeight, $originalWidth, $originalHeight);

        // Comprimir a WebP con calidad ajustable para llegar a 200KB
        $quality = 85;
        $tempFile = tempnam(sys_get_temp_dir(), 'webp_');
        imagewebp($resizedImage, $tempFile, $quality);

        // Verificar tamaño y reducir calidad si es necesario
        $fileSize = filesize($tempFile);
        $maxSize = 200 * 1024; // 200KB

        if ($fileSize > $maxSize) {
            // Reducir calidad progresivamente hasta llegar a 200KB
            for ($q = $quality; $q >= 50 && $fileSize > $maxSize; $q -= 5) {
                imagewebp($resizedImage, $tempFile, $q);
                $fileSize = filesize($tempFile);
            }
        }

        // Guardar en storage
        Storage::disk('public')->put($path, file_get_contents($tempFile));

        // Limpiar recursos
        imagedestroy($sourceImage);
        imagedestroy($resizedImage);
        unlink($tempFile);

        return 'storage/' . $path;
    }
}
