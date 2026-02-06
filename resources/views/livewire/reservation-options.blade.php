<div class="mt-[80px] sm:mt-[120px] w-full max-w-7xl mx-auto px-0 sm:px-6 h-fit min-h-0"
    x-data="{
        open: false,
        isLg: false,
        init() {
            const mq = window.matchMedia('(min-width: 1024px)');
            this.isLg = mq.matches;
            mq.addEventListener('change', (e) => { this.isLg = e.matches; });
        }
    }">
    <div class="mb-8 md:mb-10 text-center">
        <h2 class="text-caribeCoffee text-2xl md:text-3xl font-bold">Reserva</h2>
        <p class="mt-1 text-caribeCoffee/70 italic text-sm md:text-base">Contáctanos por WhatsApp, teléfono, correo o reserva con un clic</p>
    </div>

    {{-- Móvil: flex. Tablet/Desktop: grid con alturas alineadas, sin celdas vacías --}}
    <div class="flex flex-col gap-4 max-w-5xl mx-auto sm:grid sm:grid-cols-2 sm:gap-5 md:gap-6 lg:grid-cols-4 sm:items-stretch">
        {{-- WhatsApp: ancho completo tablet; desktop: 2 cols x 2 rows --}}
        <a href="{{ $this->getWhatsAppLink() }}" target="_blank" rel="noopener noreferrer"
            class="group rounded-[12px] w-full min-h-[140px] sm:col-span-2 sm:min-h-0 sm:h-full lg:row-span-2 p-6 md:p-8 flex flex-col justify-between bg-white/60 border border-caribeCoffee/10 hover:border-caribeCoffee/20 transition-colors duration-200">
            <div class="flex items-start gap-4">
                <span class="flex-shrink-0 w-12 h-12 rounded-full bg-caribeCoffee/10 flex items-center justify-center text-caribeCoffee group-hover:bg-caribeOrange/20 transition-colors duration-200">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                </span>
                <div>
                    <p class="text-caribeCoffee font-semibold text-base md:text-lg">WhatsApp</p>
                    <p class="text-caribeCoffee/80 text-sm md:text-base mt-1">{{ $phoneDisplay }}</p>
                </div>
            </div>
            <span class="inline-flex items-center gap-1.5 text-caribeOrange font-medium text-sm md:text-base mt-4 border-b border-transparent group-hover:border-caribeOrange/50 transition-colors duration-200 w-fit">
                Escribir ahora
                <svg class="w-4 h-4 transition-transform duration-200 group-hover:translate-x-0.5 group-hover:-translate-y-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6L16 12l-6 6"/></svg>
            </span>
        </a>

        {{-- Teléfono --}}
        <a href="{{ $this->getTelLink() }}"
            class="group rounded-[12px] w-full h-full min-h-0 p-5 md:p-6 flex items-center gap-4 bg-white/60 border border-caribeCoffee/10 hover:border-caribeCoffee/20 transition-colors duration-200"
            x-show="open || isLg">
            <span class="flex-shrink-0 w-12 h-12 rounded-full bg-caribeCoffee/10 flex items-center justify-center text-caribeCoffee group-hover:bg-caribeOrange/20 transition-colors duration-200">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
            </span>
            <div class="min-w-0">
                <p class="text-caribeCoffee font-semibold text-sm md:text-base">Teléfono</p>
                <p class="text-caribeCoffee/70 text-sm mt-0.5">{{ $phoneDisplay }}</p>
            </div>
            <svg class="w-5 h-5 text-caribeOrange shrink-0 ml-auto group-hover:translate-x-0.5 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6l6 6-6 6"/></svg>
        </a>

        {{-- Correo --}}
        <a href="mailto:{{ $email }}"
            class="group rounded-[12px] w-full h-full min-h-0 lg:col-span-1 p-5 md:p-6 flex items-center gap-4 bg-white/60 border border-caribeCoffee/10 hover:border-caribeCoffee/20 transition-colors duration-200"
            x-show="open || isLg">
            <span class="flex-shrink-0 w-12 h-12 rounded-full bg-caribeCoffee/10 flex items-center justify-center text-caribeCoffee group-hover:bg-caribeOrange/20 transition-colors duration-200">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
            </span>
            <div class="min-w-0">
                <p class="text-caribeCoffee font-semibold text-sm md:text-base">Correo</p>
                <p class="text-caribeCoffee/70 text-sm mt-0.5 truncate">{{ $email }}</p>
            </div>
            <svg class="w-5 h-5 text-caribeOrange shrink-0 ml-auto group-hover:translate-x-0.5 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6l6 6-6 6"/></svg>
        </a>

        {{-- Booking.com --}}
        <a href="{{ $bookingUrl }}" target="_blank" rel="noopener noreferrer"
            class="group rounded-[12px] w-full h-full min-h-0 lg:col-span-2 p-5 md:p-6 flex items-center gap-4 bg-white/60 border border-caribeCoffee/10 hover:border-caribeCoffee/20 transition-colors duration-200"
            x-show="open || isLg">
            <span class="flex-shrink-0 w-12 h-12 rounded-full bg-caribeCoffee/10 flex items-center justify-center text-caribeCoffee group-hover:bg-caribeOrange/20 transition-colors duration-200">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            </span>
            <div class="min-w-0 flex-1">
                <p class="text-caribeCoffee font-semibold text-sm md:text-base">Reservar en Booking</p>
                <p class="text-caribeCoffee/70 text-sm mt-0.5">Ver disponibilidad</p>
            </div>
            <span class="inline-flex items-center gap-1.5 text-caribeOrange font-medium text-sm md:text-base border-b border-transparent group-hover:border-caribeOrange/50 transition-colors duration-200 shrink-0">
                Ir
                <svg class="w-4 h-4 transition-transform duration-200 group-hover:translate-x-0.5 group-hover:-translate-y-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6L16 12l-6 6"/></svg>
            </span>
        </a>

        {{-- Airbnb --}}
        <a href="{{ $airbnbUrl }}" target="_blank" rel="noopener noreferrer"
            class="group rounded-[12px] w-full h-full min-h-0 lg:col-span-2 p-5 md:p-6 flex items-center gap-4 bg-white/60 border border-caribeCoffee/10 hover:border-caribeCoffee/20 transition-colors duration-200"
            x-show="open || isLg">
            <span class="flex-shrink-0 w-12 h-12 rounded-full bg-caribeCoffee/10 flex items-center justify-center text-caribeCoffee group-hover:bg-caribeOrange/20 transition-colors duration-200">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12.001 2.181c-2.439 0-4.562 1.257-5.562 3.062v.027c-.027.055-.055.109-.082.164-1.257 2.453-2.301 4.781-2.971 6.699-.355 1.015-.602 1.945-.71 2.699-.218 1.527.055 2.617 1.2 3.254.273.164.601.273.984.273 1.091 0 2.182-.382 3.436-1.091 1.2-.709 2.491-1.636 3.927-2.763 1.436 1.127 2.727 2.054 3.927 2.763 1.254.709 2.345 1.091 3.436 1.091.383 0 .711-.109.984-.273 1.145-.637 1.418-1.727 1.2-3.254-.109-.754-.355-1.684-.71-2.699-.67-1.918-1.714-4.246-2.971-6.699-.027-.055-.055-.109-.082-.164v-.027c-1-1.805-3.123-3.062-5.562-3.062zm0 4.418c.764 0 1.382.618 1.382 1.382 0 .764-.618 1.382-1.382 1.382-.764 0-1.382-.618-1.382-1.382 0-.764.618-1.382 1.382-1.382zm-4.8 6.545c.273-.491.6-.927 1.036-1.309-.382-.382-.709-.818-.927-1.309-.218.491-.382 1.036-.382 1.636 0 .709.218 1.364.273 1.982zm9.6 0c.055-.618.273-1.273.273-1.982 0-.6-.164-1.145-.382-1.636-.218.491-.545.927-.927 1.309.436.382.764.818 1.036 1.309z"/></svg>
            </span>
            <div class="min-w-0 flex-1">
                <p class="text-caribeCoffee font-semibold text-sm md:text-base">Reservar en Airbnb</p>
                <p class="text-caribeCoffee/70 text-sm mt-0.5">Ver disponibilidad</p>
            </div>
            <span class="inline-flex items-center gap-1.5 text-caribeOrange font-medium text-sm md:text-base border-b border-transparent group-hover:border-caribeOrange/50 transition-colors duration-200 shrink-0">
                Ir
                <svg class="w-4 h-4 transition-transform duration-200 group-hover:translate-x-0.5 group-hover:-translate-y-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6L16 12l-6 6"/></svg>
            </span>
        </a>

        {{-- Ver más al final (solo móvil/tablet), ancho completo en grid tablet --}}
        <div class="flex justify-center items-center w-full sm:col-span-2 lg:hidden py-1 min-h-0" x-show="!isLg" x-cloak>
            <button type="button" @click="open = !open"
                class="inline-flex items-center gap-1.5 text-caribeOrange font-medium text-sm border-b border-transparent hover:border-caribeOrange/50 transition-colors duration-200">
                <span x-text="open ? 'Ver menos' : 'Ver más'">Ver más</span>
                <svg class="w-4 h-4 transition-transform duration-200" :class="open && 'rotate-180'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
            </button>
        </div>
    </div>
</div>
