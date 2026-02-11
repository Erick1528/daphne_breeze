<section id="reseñas" class="mt-[80px] sm:mt-[120px] w-full max-w-7xl mx-auto px-0 sm:px-6 scroll-mt-[100px]"
    x-data="{
        current: 0,
        total: {{ $reviews->count() }},
        updateCurrent() {
            const el = $refs.carousel;
            if (!el) return;
            const scrollLeft = el.scrollLeft;
            const scrollWidth = el.scrollWidth - el.clientWidth;
            if (scrollWidth <= 0) { this.current = 0; return; }
            const index = Math.round((scrollLeft / scrollWidth) * (this.total - 1));
            this.current = Math.max(0, Math.min(index, this.total - 1));
        },
    }"
    x-init="$nextTick(() => {
        const el = $refs.carousel;
        el?.addEventListener('scroll', () => updateCurrent());
        updateCurrent();
        const total = {{ $reviews->count() }};
        if (total > 1) {
            setInterval(() => {
                const carousel = $refs.carousel;
                if (!carousel) return;
                const maxScroll = carousel.scrollWidth - carousel.clientWidth;
                if (maxScroll <= 0) return;
                const currentIndex = Math.round((carousel.scrollLeft / maxScroll) * (total - 1));
                const nextIndex = (currentIndex + 1) % total;
                const left = nextIndex === 0 ? 0 : maxScroll * (nextIndex / (total - 1));
                carousel.scrollTo({ left, behavior: 'smooth' });
            }, 5000);
        }
    })">
    <div class="mb-8 md:mb-10">
        <h2 class="text-navDark text-2xl md:text-3xl font-bold">Lo que dicen nuestros huéspedes</h2>
        <p class="mt-1 text-navDark/70 italic text-sm md:text-base">Reseñas de quienes nos han visitado</p>
    </div>

    @if ($reviews->isEmpty())
        <div class="rounded-[12px] border border-caribeCoffee/10 bg-white/60 p-8 md:p-12 text-center">
            <p class="text-caribeCoffee/70 text-base">Próximamente podrás leer aquí las reseñas de nuestros huéspedes.</p>
        </div>
    @else
        <div class="relative">
            <div class="overflow-x-auto snap-x snap-mandatory scroll-smooth flex gap-4 pb-4 -mx-1 md:mx-0 [scrollbar-width:none] [-ms-overflow-style:none] [&::-webkit-scrollbar]:hidden"
                x-ref="carousel">
                @foreach ($reviews as $review)
                    <article class="flex-shrink-0 w-full min-w-full snap-center rounded-[12px] border border-caribeCoffee/10 bg-white/60 p-6 md:p-8 lg:p-10">
                        <div class="flex items-center gap-0.5 text-caribeOrange mb-4" aria-label="{{ $review->rating }} de 5 estrellas">
                            @for ($star = 1; $star <= 5; $star++)
                                <svg class="w-5 h-5 {{ $star <= $review->rating ? 'text-caribeOrange' : 'text-caribeCoffee/20' }}" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            @endfor
                        </div>
                        <p class="text-caribeCoffee/90 text-base md:text-lg leading-relaxed">{{ $review->content }}</p>
                        <p class="mt-4 font-semibold text-caribeCoffee">{{ $review->author_name }}</p>
                        @if ($review->review_date)
                            <p class="text-sm text-caribeCoffee/60 mt-0.5">{{ $review->review_date->translatedFormat('d \d\e F \d\e Y') }}</p>
                        @endif
                    </article>
                @endforeach
            </div>

            <button type="button"
                class="hidden md:flex absolute left-0 top-1/2 -translate-y-1/2 -translate-x-4 w-12 h-12 rounded-full bg-white shadow-lg items-center justify-center text-caribeCoffee hover:bg-bgGray z-10"
                aria-label="Reseña anterior"
                @click="$refs.carousel.scrollBy({ left: -$refs.carousel.offsetWidth, behavior: 'smooth' })">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            </button>
            <button type="button"
                class="hidden md:flex absolute right-0 top-1/2 -translate-y-1/2 translate-x-4 w-12 h-12 rounded-full bg-white shadow-lg items-center justify-center text-caribeCoffee hover:bg-bgGray z-10"
                aria-label="Siguiente reseña"
                @click="$refs.carousel.scrollBy({ left: $refs.carousel.offsetWidth, behavior: 'smooth' })">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </button>
        </div>

        <div class="flex justify-center gap-2 mt-6">
            @foreach ($reviews as $index => $review)
                <button type="button"
                    class="w-2 h-2 rounded-full transition-all duration-200"
                    :class="current === {{ $index }} ? 'bg-caribeOrange w-6' : 'bg-caribeCoffee/30'"
                    aria-label="Ir a reseña {{ $index + 1 }}"
                    @click="const el = $refs.carousel; const maxScroll = el.scrollWidth - el.clientWidth; const total = {{ $reviews->count() }}; const left = total <= 1 ? 0 : maxScroll * ({{ $index }} / (total - 1)); el.scrollTo({ left, behavior: 'smooth' });">
                </button>
            @endforeach
        </div>
    @endif
</section>
