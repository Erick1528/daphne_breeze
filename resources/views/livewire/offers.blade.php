<section id="ofertas" class="mt-[80px] sm:mt-[120px] w-full max-w-7xl mx-auto px-4 sm:px-6 scroll-mt-[100px]">
    <div class="mb-8 md:mb-10">
        <h2 class="text-caribeCoffee text-2xl md:text-3xl font-bold">Ofertas</h2>
        <p class="mt-1 text-caribeCoffee/70 italic text-sm md:text-base">Promociones especiales para tu estancia</p>
    </div>

    <div class="space-y-12 md:space-y-16">
        @foreach ($offers as $index => $offer)
            <article class="grid md:grid-cols-2 gap-8 md:gap-10 items-center">
                <div class="{{ $index % 2 === 1 ? 'md:order-2' : 'md:order-1' }} rounded-[12px] overflow-hidden aspect-[4/3] md:aspect-[16/10] bg-bgGray">
                    <img src="{{ asset($offer['image']) }}" alt="{{ $offer['title'] }}"
                        class="w-full h-full object-cover">
                </div>
                <div class="{{ $index % 2 === 1 ? 'md:order-1' : 'md:order-2' }}">
                    <h3 class="text-caribeCoffee text-xl md:text-2xl font-semibold mb-3">{{ $offer['title'] }}</h3>
                    <p class="text-caribeCoffee/90 text-base md:text-lg leading-relaxed">
                        {{ $offer['description'] }}
                    </p>
                    <a href="{{ route('offers.show', $offer['id']) }}" class="group mt-5 inline-flex items-center gap-1.5 text-caribeOrange font-medium text-sm md:text-base hover:text-caribeCoffee transition-colors duration-200 border-b border-transparent group-hover:border-caribeOrange/50">
                        Ver oferta
                        <svg class="w-4 h-4 transition-transform duration-200 group-hover:translate-x-0.5 group-hover:-translate-y-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6L16 12l-6 6"/></svg>
                    </a>
                </div>
            </article>
        @endforeach
    </div>

    @if (!$showAll && $this->hasMoreOffers)
        <div class="mt-10 text-center">
            <a href="{{ route('offers') }}" class="group inline-flex items-center gap-1.5 text-caribeOrange font-medium text-base md:text-lg hover:text-caribeCoffee transition-colors duration-200 border-b border-transparent group-hover:border-caribeOrange/50">
                Ver más ofertas
                <svg class="w-5 h-5 transition-transform duration-200 group-hover:translate-x-0.5 group-hover:-translate-y-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6L16 12l-6 6"/></svg>
            </a>
        </div>
    @endif
</section>
