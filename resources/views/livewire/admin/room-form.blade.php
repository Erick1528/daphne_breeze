<div>
    {{-- Sección de imagen con preview --}}
    <div class="bg-white/60 border border-caribeCoffee/10 rounded-[12px] p-6 sticky top-6">
        <h2 class="text-caribeCoffee text-lg font-semibold mb-4 pb-2 border-b border-caribeCoffee/10">Imagen</h2>
        
        <div class="space-y-4">
            {{-- Preview con Livewire temporaryUrl --}}
            @if($image)
                <div class="relative rounded-[12px] overflow-hidden border border-caribeCoffee/10 bg-bgGray/30 aspect-[4/5] mb-4">
                    <img src="{{ $image->temporaryUrl() }}" alt="Preview" class="w-full h-full object-cover">
                    <button type="button" wire:click="removeImage" class="absolute top-2 right-2 bg-red-500 text-white rounded-full p-1.5 hover:bg-red-600 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>
            @elseif($room && $room->image)
                {{-- Imagen actual en modo edición --}}
                <div class="relative rounded-[12px] overflow-hidden border border-caribeCoffee/10 bg-bgGray/30 aspect-[4/5] mb-4">
                    <img src="{{ asset($room->image) }}" alt="{{ $room->title }}" class="w-full h-full object-cover">
                    <div class="absolute top-2 left-2 bg-caribeCoffee/80 text-white text-xs px-2 py-1 rounded-[6px]">Actual</div>
                </div>
            @else
                {{-- Placeholder cuando no hay imagen --}}
                <div class="rounded-[12px] border-2 border-dashed border-caribeCoffee/20 bg-bgGray/30 aspect-[4/5] flex items-center justify-center mb-4">
                    <div class="text-center p-4">
                        <svg class="w-12 h-12 text-caribeCoffee/30 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        <p class="text-xs text-caribeCoffee/60">Selecciona una imagen</p>
                    </div>
                </div>
            @endif

            {{-- Input file --}}
            <div>
                <label for="image_{{ $this->getId() }}" class="block text-caribeCoffee/90 font-medium text-sm mb-1.5">
                    {{ $room ? 'Cambiar imagen' : 'Seleccionar imagen *' }}
                </label>
                <input type="file" id="image_{{ $this->getId() }}" wire:model="image" accept="image/webp,image/jpeg,image/jpg,image/png"
                    class="w-full rounded-[12px] border border-caribeCoffee/15 bg-bgGray/30 px-4 py-2.5 text-caribeCoffee text-sm focus:border-caribeOrange/50 focus:outline-none focus:ring-2 focus:ring-caribeOrange/20 file:mr-4 file:py-2 file:px-4 file:rounded-[8px] file:border-0 file:text-sm file:font-medium file:bg-caribeOrange file:text-white file:cursor-pointer hover:file:opacity-90">
                <p class="mt-2 text-xs text-caribeCoffee/60">
                    @if($room)
                        Dejar vacío para mantener la imagen actual<br>
                    @endif
                    Formatos: WebP, JPG, JPEG, PNG<br>
                    Máximo: 5MB<br>
                    Se convertirá automáticamente a WebP
                </p>
                @error('image')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
                <div wire:loading wire:target="image" class="mt-2 text-xs text-caribeCoffee/60">
                    Procesando imagen...
                </div>
            </div>

            {{-- Campo oculto con la ruta de la imagen procesada para el formulario --}}
            @if($processedImagePath)
                <input type="hidden" name="processed_image_path" value="{{ $processedImagePath }}">
            @endif
        </div>
    </div>
</div>
