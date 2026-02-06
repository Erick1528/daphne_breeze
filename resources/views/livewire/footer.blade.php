<footer class="mt-[80px] sm:mt-[120px] w-full max-w-7xl mx-auto px-0 sm:px-6 pt-8 pb-8 border-t border-caribeCoffee/15">
    <div class="flex flex-col items-center gap-6 md:gap-8">
        <a href="/" class="shrink-0">
            <img src="{{ asset('build/assets/logo.svg') }}" alt="Daphne Breeze" class="h-10 md:h-12">
        </a>

        <nav aria-label="Enlaces del sitio">
            <ul class="flex flex-wrap justify-center gap-x-6 gap-y-1 text-caribeCoffee text-sm md:text-base">
                <li><a href="#inicio" class="hover:text-caribeOrange transition-colors">Inicio</a></li>
                <li><a href="#habitaciones" class="hover:text-caribeOrange transition-colors">Habitaciones</a></li>
                <li><a href="#ofertas" class="hover:text-caribeOrange transition-colors">Ofertas</a></li>
                {{-- <li><a href="#reserva" class="hover:text-caribeOrange transition-colors">Reserva</a></li> --}}
                <li><a href="#restaurante" class="hover:text-caribeOrange transition-colors">Restaurante</a></li>
                <li><a href="#contacto" class="hover:text-caribeOrange transition-colors">Contacto</a></li>
            </ul>
        </nav>

        <p class="text-caribeCoffee/70 text-sm text-center">
            © {{ date('Y') }} Daphne Breeze. Todos los derechos reservados.
        </p>
    </div>
</footer>
