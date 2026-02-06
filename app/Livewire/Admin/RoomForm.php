<?php

namespace App\Livewire\Admin;

use App\Models\Room;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class RoomForm extends Component
{
    use WithFileUploads;

    public $room = null;
    public $image;
    public $processedImagePath = null;

    public function mount(?Room $room = null)
    {
        $this->room = $room;
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

        // Procesar y guardar temporalmente la imagen
        if ($this->image) {
            // Eliminar imagen procesada anterior si existe
            if ($this->processedImagePath && Storage::disk('public')->exists($this->processedImagePath)) {
                Storage::disk('public')->delete($this->processedImagePath);
            }

            // Guardar temporalmente
            $path = $this->image->store('temp', 'public');
            $this->processedImagePath = $path;
        }
    }

    public function render()
    {
        return view('livewire.admin.room-form');
    }
}
