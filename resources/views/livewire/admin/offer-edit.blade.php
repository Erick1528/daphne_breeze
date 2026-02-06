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
                            <textarea id="description" wire:model="description" rows="4" placeholder="Descripción de la oferta..."
                                class="w-full rounded-[12px] border @error('description') border-red-600 @else border-caribeCoffee/15 @enderror bg-bgGray/30 px-4 py-2.5 text-caribeCoffee placeholder-caribeCoffee/40 text-sm focus:border-caribeOrange/50 focus:outline-none focus:ring-2 focus:ring-caribeOrange/20 resize-none"></textarea>
                            @error('description')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="link" class="block text-caribeCoffee/90 font-medium text-sm mb-1.5">Enlace (Ver oferta)</label>
                            <input type="text" id="link" wire:model="link" placeholder="https://... o #"
                                class="w-full rounded-[12px] border @error('link') border-red-600 @else border-caribeCoffee/15 @enderror bg-bgGray/30 px-4 py-2.5 text-caribeCoffee placeholder-caribeCoffee/40 text-sm focus:border-caribeOrange/50 focus:outline-none focus:ring-2 focus:ring-caribeOrange/20">
                            @error('link')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="terms" class="block text-caribeCoffee/90 font-medium text-sm mb-1.5">Términos y condiciones *</label>
                            <textarea id="terms" wire:model="terms" rows="3" placeholder="Ej: Válido solo fines de semana, No acumulable con otras promociones..."
                                class="w-full rounded-[12px] border @error('terms') border-red-600 @else border-caribeCoffee/15 @enderror bg-bgGray/30 px-4 py-2.5 text-caribeCoffee placeholder-caribeCoffee/40 text-sm focus:border-caribeOrange/50 focus:outline-none focus:ring-2 focus:ring-caribeOrange/20 resize-none"></textarea>
                            @error('terms')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="bg-white/60 border border-caribeCoffee/10 rounded-[12px] p-6">
                    <h2 class="text-caribeCoffee text-lg font-semibold mb-4 pb-2 border-b border-caribeCoffee/10">Fechas de promoción</h2>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label for="start_date" class="block text-caribeCoffee/90 font-medium text-sm mb-1.5">Fecha de inicio</label>
                            <input type="date" id="start_date" wire:model="start_date"
                                class="w-full rounded-[12px] border @error('start_date') border-red-600 @else border-caribeCoffee/15 @enderror bg-bgGray/30 px-4 py-2.5 text-caribeCoffee text-sm focus:border-caribeOrange/50 focus:outline-none focus:ring-2 focus:ring-caribeOrange/20">
                            @error('start_date')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="end_date" class="block text-caribeCoffee/90 font-medium text-sm mb-1.5">Fecha de fin</label>
                            <input type="date" id="end_date" wire:model="end_date"
                                class="w-full rounded-[12px] border @error('end_date') border-red-600 @else border-caribeCoffee/15 @enderror bg-bgGray/30 px-4 py-2.5 text-caribeCoffee text-sm focus:border-caribeOrange/50 focus:outline-none focus:ring-2 focus:ring-caribeOrange/20">
                            @error('end_date')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="bg-white/60 border border-caribeCoffee/10 rounded-[12px] p-6">
                    <h2 class="text-caribeCoffee text-lg font-semibold mb-4 pb-2 border-b border-caribeCoffee/10">Configuración</h2>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label for="discount_percent" class="block text-caribeCoffee/90 font-medium text-sm mb-1.5">Descuento (%)</label>
                            <input type="number" id="discount_percent" wire:model="discount_percent" min="0" max="100" placeholder="Ej: 15"
                                class="w-full rounded-[12px] border @error('discount_percent') border-red-600 @else border-caribeCoffee/15 @enderror bg-bgGray/30 px-4 py-2.5 text-caribeCoffee placeholder-caribeCoffee/40 text-sm focus:border-caribeOrange/50 focus:outline-none focus:ring-2 focus:ring-caribeOrange/20">
                            @error('discount_percent')
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
                    <div class="mt-4 flex flex-wrap gap-6">
                        <label class="flex items-center cursor-pointer">
                            <input type="checkbox" wire:model="featured"
                                class="rounded border-caribeCoffee/15 text-caribeOrange focus:ring-caribeOrange/20 w-4 h-4">
                            <span class="ml-2 text-sm text-caribeCoffee/90">Destacada (aparece en homepage)</span>
                        </label>
                        <label class="flex items-center cursor-pointer">
                            <input type="checkbox" wire:model="active"
                                class="rounded border-caribeCoffee/15 text-caribeOrange focus:ring-caribeOrange/20 w-4 h-4">
                            <span class="ml-2 text-sm text-caribeCoffee/90">Oferta activa (visible en el sitio)</span>
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
                        @elseif($offer->image)
                            <div class="relative rounded-[12px] overflow-hidden border border-caribeCoffee/10 bg-bgGray/30 aspect-[4/5] mb-4">
                                <img src="{{ asset($offer->image) }}" alt="{{ $offer->title }}" class="w-full h-full object-cover">
                                <div class="absolute top-2 left-2 bg-caribeCoffee/80 text-white text-xs px-2 py-1 rounded-[6px]">Actual</div>
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
                            <label for="image_{{ $this->getId() }}" class="block text-caribeCoffee/90 font-medium text-sm mb-1.5">Cambiar imagen</label>
                            <input type="file" id="image_{{ $this->getId() }}" wire:model="image" accept="image/webp,image/jpeg,image/jpg,image/png"
                                class="w-full rounded-[12px] border @error('image') border-red-600 @else border-caribeCoffee/15 @enderror bg-bgGray/30 px-4 py-2.5 text-caribeCoffee text-sm focus:border-caribeOrange/50 focus:outline-none focus:ring-2 focus:ring-caribeOrange/20 file:mr-4 file:py-2 file:px-4 file:rounded-[8px] file:border-0 file:text-sm file:font-medium file:bg-caribeOrange file:text-white file:cursor-pointer hover:file:opacity-90">
                            <p class="mt-2 text-xs text-caribeCoffee/60">
                                Dejar vacío para mantener la imagen actual<br>
                                Formatos: WebP, JPG, JPEG, PNG<br>
                                Máximo: 5MB<br>
                                Se convertirá automáticamente a WebP
                            </p>
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
            <a href="{{ route('admin.offers.index') }}" class="bg-bgGray/30 text-caribeCoffee font-medium px-6 py-2.5 rounded-[12px] hover:bg-bgGray/50 transition-colors">
                Cancelar
            </a>
            <button type="submit" class="bg-caribeOrange text-white font-medium px-6 py-2.5 rounded-[12px] hover:opacity-90 transition-opacity">
                Actualizar oferta
            </button>
        </div>
    </form>
</div>
