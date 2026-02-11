<footer class="mt-[80px] sm:mt-[120px] w-full px-4 sm:px-5 pt-10 pb-10 bg-navDark rounded-[20px]">
    <div class="max-w-7xl mx-auto flex flex-col items-center gap-6 md:gap-8">
        <a href="/" class="shrink-0">
            <img src="{{ asset('build/assets/logo.svg') }}" alt="Daphne Breeze" class="h-10 md:h-12">
        </a>

        <nav aria-label="Enlaces del sitio">
            <ul class="flex flex-wrap justify-center gap-x-6 gap-y-1 text-caribeOrange text-sm md:text-base font-medium">
                <li><a href="#inicio" class="hover:text-[#faf8f3] transition-colors">Inicio</a></li>
                <li><a href="#habitaciones" class="hover:text-[#faf8f3] transition-colors">Habitaciones</a></li>
                <li><a href="#ofertas" class="hover:text-[#faf8f3] transition-colors">Ofertas</a></li>
                {{-- <li><a href="#reserva" class="hover:text-[#faf8f3] transition-colors">Reserva</a></li> --}}
                <li><a href="#restaurante" class="hover:text-[#faf8f3] transition-colors">Restaurante</a></li>
                <li><a href="#contacto" class="hover:text-[#faf8f3] transition-colors">Contacto</a></li>
            </ul>
        </nav>

        <p class="text-caribeOrange/80 text-xs text-center max-w-md px-4">
            © {{ date('Y') }} Daphne Breeze. Todos los derechos reservados.
        </p>
    </div>
</footer>
