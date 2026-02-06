<section id="contacto" class="mt-[80px] sm:mt-[120px] w-full max-w-7xl mx-auto px-4 sm:px-6 scroll-mt-[100px]">
    <div class="mb-8 md:mb-10 text-center">
        <h2 class="text-caribeCoffee text-2xl md:text-3xl font-bold">Contacto</h2>
        <p class="mt-1 text-caribeCoffee/70 italic text-sm md:text-base">Escríbenos y te respondemos lo antes posible</p>
    </div>

    @if ($sent)
        <div class="max-w-xl mx-auto rounded-[12px] bg-white/60 border border-caribeCoffee/10 p-6 md:p-8 text-center text-caribeCoffee" role="alert">
            <p class="font-medium">Mensaje enviado correctamente.</p>
            <p class="mt-1 text-sm text-caribeCoffee/80">Te contestaremos a la brevedad.</p>
        </div>
    @else
        <div class="max-w-xl mx-auto rounded-[12px] bg-white/60 border border-caribeCoffee/10 p-6 md:p-8">
            <form wire:submit.prevent="submit" class="space-y-5">
                <div class="grid sm:grid-cols-2 gap-5">
                    <div>
                        <label for="contact-name" class="block text-caribeCoffee/90 font-medium text-sm mb-1.5">Nombre</label>
                        <input type="text" id="contact-name" wire:model="name"
                            class="w-full rounded-[12px] border border-caribeCoffee/15 bg-bgGray/30 px-4 py-2.5 text-caribeCoffee placeholder-caribeCoffee/40 text-sm md:text-base focus:border-caribeOrange/50 focus:outline-none focus:ring-2 focus:ring-caribeOrange/20"
                            placeholder="Tu nombre">
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="contact-email" class="block text-caribeCoffee/90 font-medium text-sm mb-1.5">Correo</label>
                        <input type="email" id="contact-email" wire:model="email"
                            class="w-full rounded-[12px] border border-caribeCoffee/15 bg-bgGray/30 px-4 py-2.5 text-caribeCoffee placeholder-caribeCoffee/40 text-sm md:text-base focus:border-caribeOrange/50 focus:outline-none focus:ring-2 focus:ring-caribeOrange/20"
                            placeholder="tu@correo.com">
                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="contact-subject" class="block text-caribeCoffee/90 font-medium text-sm mb-1.5">Asunto</label>
                    <input type="text" id="contact-subject" wire:model="subject"
                        class="w-full rounded-[12px] border border-caribeCoffee/15 bg-bgGray/30 px-4 py-2.5 text-caribeCoffee placeholder-caribeCoffee/40 text-sm md:text-base focus:border-caribeOrange/50 focus:outline-none focus:ring-2 focus:ring-caribeOrange/20"
                        placeholder="Ej. Reserva, consulta...">
                    @error('subject')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="contact-message" class="block text-caribeCoffee/90 font-medium text-sm mb-1.5">Mensaje</label>
                    <textarea id="contact-message" wire:model="message" rows="4"
                        class="w-full rounded-[12px] border border-caribeCoffee/15 bg-bgGray/30 px-4 py-2.5 text-caribeCoffee placeholder-caribeCoffee/40 text-sm md:text-base focus:border-caribeOrange/50 focus:outline-none focus:ring-2 focus:ring-caribeOrange/20 resize-none min-h-[100px]"
                        placeholder="Escribe tu mensaje..."></textarea>
                    @error('message')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="pt-1 flex justify-center">
                    <button type="submit" wire:loading.attr="disabled" wire:target="submit"
                        class="group inline-flex items-center gap-1.5 text-caribeOrange font-medium text-sm md:text-base hover:text-caribeCoffee transition-colors duration-200 border-b border-transparent group-hover:border-caribeOrange/50 disabled:opacity-50 disabled:cursor-not-allowed">
                        <span wire:loading.remove wire:target="submit">Enviar mensaje</span>
                        <span wire:loading wire:target="submit">Enviando...</span>
                        <svg wire:loading.remove wire:target="submit" class="w-4 h-4 transition-transform duration-200 group-hover:translate-x-0.5 group-hover:-translate-y-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6L16 12l-6 6"/></svg>
                        <svg wire:loading wire:target="submit" class="w-4 h-4 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                    </button>
                </div>
            </form>
        </div>
    @endif
</div>
