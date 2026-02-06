<section id="habitaciones" class="mt-[80px] sm:mt-[120px] w-full max-w-7xl mx-auto px-4 sm:px-6 scroll-mt-[100px]"
    x-data="{
        current: 0,
        total: {{ count($rooms) }},
        updateCurrent() {
            const el = $refs.carousel;
            if (!el) return;
            const scrollLeft = el.scrollLeft;
            const scrollWidth = el.scrollWidth - el.clientWidth;
            if (scrollWidth <= 0) { this.current = 0; return; }
            const index = Math.round((scrollLeft / scrollWidth) * (this.total - 1));
            this.current = Math.max(0, Math.min(index, this.total - 1));
        }
    }"
    x-init="$nextTick(() => { $refs.carousel?.addEventListener('scroll', () => updateCurrent()); updateCurrent(); })">
    <h2 class="text-caribeCoffee text-2xl md:text-3xl font-bold mb-8">Nuestras Habitaciones</h2>

    <div class="relative">
        {{-- Carrusel: contenedor con scroll horizontal --}}
        <div class="overflow-x-auto snap-x snap-mandatory scroll-smooth flex gap-4 pb-4 -mx-1 md:mx-0 [scrollbar-width:none] [-ms-overflow-style:none] [&::-webkit-scrollbar]:hidden"
            x-ref="carousel">
            @foreach ($rooms as $index => $room)
                <a href="{{ route('rooms.show', $room['id']) }}" class="flex-shrink-0 w-[min(85vw,100%)] sm:w-[min(70vw,100%)] md:w-[400px] max-w-full snap-center group">
                    <div class="rounded-[12px] overflow-hidden aspect-[4/5] md:aspect-[5/6] relative bg-bgGray">
                        <img src="{{ asset($room['image']) }}" alt="{{ $room['title'] }}"
                            class="w-full h-full object-cover rounded-[12px] group-hover:scale-105 transition-transform duration-300">
                        <div class="absolute inset-0 bg-gradient-to-t from-[rgba(0,0,0,0.5)] to-[rgba(0,0,0,0.04)] rounded-[12px]"></div>
                        <div class="absolute bottom-0 left-0 right-0 text-left py-[19px] px-[13px] z-10 text-white flex flex-col items-start">
                            <h3 class="text-xl font-semibold mb-2">{{ $room['title'] }}</h3>
                            <div class="flex flex-wrap items-center gap-x-3 gap-y-1 italic text-sm text-white/90">
                                <span>{{ $room['persons'] }} {{ $room['persons'] === 1 ? 'persona' : 'personas' }}</span>
                                <span>·</span>
                                <span>{{ $room['beds_label'] }}</span>
                            </div>
                            <div class="mt-3 flex items-center gap-1.5 text-sm">
                                <span>Ver detalles</span>
                                <img src="{{ asset('build/assets/arrow_outward.svg') }}" alt="" class="w-4 h-4 group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-transform">
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

        {{-- Botones anterior / siguiente (opcionales, para desktop) --}}
        <button type="button"
            class="hidden md:flex absolute left-0 top-1/2 -translate-y-1/2 -translate-x-4 w-12 h-12 rounded-full bg-white shadow-lg items-center justify-center text-caribeCoffee hover:bg-bgGray z-10"
            aria-label="Anterior"
            @click="$refs.carousel.scrollBy({ left: -($refs.carousel.offsetWidth * 0.6), behavior: 'smooth' })">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
        </button>
        <button type="button"
            class="hidden md:flex absolute right-0 top-1/2 -translate-y-1/2 translate-x-4 w-12 h-12 rounded-full bg-white shadow-lg items-center justify-center text-caribeCoffee hover:bg-bgGray z-10"
            aria-label="Siguiente"
            @click="$refs.carousel.scrollBy({ left: $refs.carousel.offsetWidth * 0.6, behavior: 'smooth' })">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </button>
    </div>

    {{-- Indicadores (puntos) --}}
    <div class="flex justify-center gap-2 mt-6">
        @foreach ($rooms as $index => $room)
            <button type="button"
                class="w-2 h-2 rounded-full transition-all duration-200"
                :class="current === {{ $index }} ? 'bg-caribeOrange w-6' : 'bg-caribeCoffee/30'"
                aria-label="Ir a habitación {{ $index + 1 }}"
                @click="const el = $refs.carousel; const maxScroll = el.scrollWidth - el.clientWidth; const total = {{ count($rooms) }}; const left = total <= 1 ? 0 : maxScroll * ({{ $index }} / (total - 1)); el.scrollTo({ left, behavior: 'smooth' });">
            </button>
        @endforeach
    </div>
</section>
