<div>
    <form wire:submit.prevent="save">
        <div class="grid lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white/60 border border-caribeCoffee/10 rounded-[12px] p-6">
                    <h2 class="text-caribeCoffee text-lg font-semibold mb-4 pb-2 border-b border-caribeCoffee/10">Información básica</h2>
                    <div class="space-y-4">
                        <div>
                            <label for="title" class="block text-caribeCoffee/90 font-medium text-sm mb-1.5">Título *</label>
                            <input type="text" id="title" wire:model="title"
                                class="w-full rounded-[12px] border @error('title') border-red-600 @else border-caribeCoffee/15 @enderror bg-bgGray/30 px-4 py-2.5 text-caribeCoffee placeholder-caribeCoffee/40 text-sm focus:border-caribeOrange/50 focus:outline-none focus:ring-2 focus:ring-caribeOrange/20">
                            @error('title')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="description" class="block text-caribeCoffee/90 font-medium text-sm mb-1.5">Descripción *</label>
                            <textarea id="description" wire:model="description" rows="4" placeholder="Descripción de la habitación..."
                                class="w-full rounded-[12px] border @error('description') border-red-600 @else border-caribeCoffee/15 @enderror bg-bgGray/30 px-4 py-2.5 text-caribeCoffee placeholder-caribeCoffee/40 text-sm focus:border-caribeOrange/50 focus:outline-none focus:ring-2 focus:ring-caribeOrange/20 resize-none"></textarea>
                            @error('description')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="bg-white/60 border border-caribeCoffee/10 rounded-[12px] p-6">
                    <h2 class="text-caribeCoffee text-lg font-semibold mb-4 pb-2 border-b border-caribeCoffee/10">Capacidad</h2>
                    <div class="grid md:grid-cols-3 gap-4">
                        <div>
                            <label for="persons" class="block text-caribeCoffee/90 font-medium text-sm mb-1.5">Personas *</label>
                            <input type="number" id="persons" wire:model="persons"
                                class="w-full rounded-[12px] border @error('persons') border-red-600 @else border-caribeCoffee/15 @enderror bg-bgGray/30 px-4 py-2.5 text-caribeCoffee text-sm focus:border-caribeOrange/50 focus:outline-none focus:ring-2 focus:ring-caribeOrange/20">
                            @error('persons')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="beds" class="block text-caribeCoffee/90 font-medium text-sm mb-1.5">Número de camas *</label>
                            <input type="number" id="beds" wire:model="beds"
                                class="w-full rounded-[12px] border @error('beds') border-red-600 @else border-caribeCoffee/15 @enderror bg-bgGray/30 px-4 py-2.5 text-caribeCoffee text-sm focus:border-caribeOrange/50 focus:outline-none focus:ring-2 focus:ring-caribeOrange/20">
                            @error('beds')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="beds_label" class="block text-caribeCoffee/90 font-medium text-sm mb-1.5">Etiqueta de camas *</label>
                            <input type="text" id="beds_label" wire:model="beds_label" placeholder="Ej: 1 cama doble"
                                class="w-full rounded-[12px] border @error('beds_label') border-red-600 @else border-caribeCoffee/15 @enderror bg-bgGray/30 px-4 py-2.5 text-caribeCoffee placeholder-caribeCoffee/40 text-sm focus:border-caribeOrange/50 focus:outline-none focus:ring-2 focus:ring-caribeOrange/20">
                            @error('beds_label')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="bg-white/60 border border-caribeCoffee/10 rounded-[12px] p-6">
                    <h2 class="text-caribeCoffee text-lg font-semibold mb-4 pb-2 border-b border-caribeCoffee/10">Configuración</h2>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label for="price" class="block text-caribeCoffee/90 font-medium text-sm mb-1.5">Precio</label>
                            <div class="relative">
                                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-caribeCoffee/60 text-sm">L.</span>
                                <input type="number" id="price" wire:model="price" placeholder="0.00" step="0.01"
                                    class="w-full rounded-[12px] border border-caribeCoffee/15 bg-bgGray/30 pl-8 pr-4 py-2.5 text-caribeCoffee placeholder-caribeCoffee/40 text-sm focus:border-caribeOrange/50 focus:outline-none focus:ring-2 focus:ring-caribeOrange/20">
                            </div>
                            @error('price')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="order" class="block text-caribeCoffee/90 font-medium text-sm mb-1.5">Orden de visualización</label>
                            <input type="number" id="order" wire:model="order"
                                class="w-full rounded-[12px] border @error('order') border-red-600 @else border-caribeCoffee/15 @enderror bg-bgGray/30 px-4 py-2.5 text-caribeCoffee text-sm focus:border-caribeOrange/50 focus:outline-none focus:ring-2 focus:ring-caribeOrange/20">
                            <p class="mt-1 text-xs text-caribeCoffee/60">Menor número = aparece primero</p>
                            @error('order')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-4">
                        <label class="flex items-center cursor-pointer">
                            <input type="checkbox" wire:model="active"
                                class="rounded border-caribeCoffee/15 text-caribeOrange focus:ring-caribeOrange/20 w-4 h-4">
                            <span class="ml-2 text-sm text-caribeCoffee/90">Habitación activa (visible en el sitio)</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-1">
                <div class="bg-white/60 border border-caribeCoffee/10 rounded-[12px] p-6 sticky top-6">
                    <h2 class="text-caribeCoffee text-lg font-semibold mb-4 pb-2 border-b border-caribeCoffee/10">Imagen</h2>
                    <div class="space-y-4">
                        @if($image)
                            <div class="relative rounded-[12px] overflow-hidden border border-caribeCoffee/10 bg-bgGray/30 aspect-[4/5] mb-4">
                                <img src="{{ $image->temporaryUrl() }}" alt="Preview" class="w-full h-full object-cover">
                                <button type="button" wire:click="removeImage" class="absolute top-2 right-2 bg-red-500 text-white rounded-full p-1.5 hover:bg-red-600 transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                                </button>
                            </div>
                        @else
                            <div class="rounded-[12px] border-2 border-dashed border-caribeCoffee/20 bg-bgGray/30 aspect-[4/5] flex items-center justify-center mb-4">
                                <div class="text-center p-4">
                                    <svg class="w-12 h-12 text-caribeCoffee/30 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    <p class="text-xs text-caribeCoffee/60">Selecciona una imagen</p>
                                </div>
                            </div>
                        @endif
                        <div>
                            <label for="image_{{ $this->getId() }}" class="block text-caribeCoffee/90 font-medium text-sm mb-1.5">Seleccionar imagen *</label>
                            <input type="file" id="image_{{ $this->getId() }}" wire:model="image" accept="image/webp,image/jpeg,image/jpg,image/png"
                                class="w-full rounded-[12px] border @error('image') border-red-600 @else border-caribeCoffee/15 @enderror bg-bgGray/30 px-4 py-2.5 text-caribeCoffee text-sm focus:border-caribeOrange/50 focus:outline-none focus:ring-2 focus:ring-caribeOrange/20 file:mr-4 file:py-2 file:px-4 file:rounded-[8px] file:border-0 file:text-sm file:font-medium file:bg-caribeOrange file:text-white file:cursor-pointer hover:file:opacity-90">
                            <p class="mt-2 text-xs text-caribeCoffee/60">Formatos: WebP, JPG, JPEG, PNG. Máximo: 5MB</p>
                            @error('image')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            <div wire:loading wire:target="image" class="mt-2 text-xs text-caribeCoffee/60">Procesando imagen...</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6 flex gap-4 justify-end">
            <a href="{{ route('admin.rooms.index') }}" class="bg-bgGray/30 text-caribeCoffee font-medium px-6 py-2.5 rounded-[12px] hover:bg-bgGray/50 transition-colors">
                Cancelar
            </a>
            <button type="submit" class="bg-caribeOrange text-white font-medium px-6 py-2.5 rounded-[12px] hover:opacity-90 transition-opacity">
                Crear habitación
            </button>
        </div>
    </form>
</div>
