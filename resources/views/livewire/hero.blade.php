<div class="">
    <div class=" xl:grid hidden grid-cols-4 grid-rows-2 h-[780px] w-full rounded-[20px] relative overflow-hidden"
        style="background-image: url('{{ asset('build/assets/hero.webp') }}'); background-size: cover; background-position: center; transform: translateZ(0); backface-visibility: hidden; -webkit-backface-visibility: hidden;">

        <!-- Overlay de gradiente para el texto sobre las cuadrículas a, b, c, e, f -->
        <div class="absolute left-0 top-0 right-0 bottom-0 bg-linear-to-b from-[rgba(0,0,0,0.02)] via-[rgba(0,0,0,0.2)] to-[rgba(0,0,0,0.5)] z-10"
            style="transform: translateZ(0);"></div>

        <!-- Contenido de texto sobre las cuadrículas a, b, c, e, f -->
        <div
            class="absolute left-0 top-0 w-3/4 h-full flex flex-col justify-center items-start pl-[42px] z-20 text-white">
            <h1 class="text-[80px] font-medium leading-[98px]">Vive la Experiencia del Trópico</h1>
            <p class="text-xl mb-[44px] italic leading-[24px] max-w-[438px] w-full">El lugar donde el descanso se
                encuentra con la belleza natural.</p>

            <a href="#" class="group flex items-center gap-1.5 w-fit">
                <span class="bg-caribeOrange text-white text-[20px] leading-[24px] px-[75px] py-[14px] rounded-[20px] font-semibold group-hover:opacity-90 transition-opacity inline-flex items-center justify-center">
                    Ver ofertas
                </span>
                <span class="bg-caribeOrange text-white w-[52px] h-[52px] p-[14px] rounded-full flex items-center justify-center group-hover:opacity-90 transition-opacity shrink-0">
                    <img src="{{  asset('build/assets/arrow_outward.svg')  }}" alt="">
                </span>
            </a>

        </div>

        <div class="a bg-transparent rounded-tl-[20px]"></div>
        <div class="b bg-transparent"></div>
        <div class="c bg-transparent"></div>

        <div class="d bg-transparent rounded-tr-[20px] relative">
            <!-- Borde curvo inverso esquina inferior derecha -->
            <div class="absolute bottom-0 right-0 w-[20px] h-[20px] z-10"
                style="background: radial-gradient(circle at top left, transparent 20px, #D5D5D5 20px);"></div>
        </div>

        <div class="e bg-transparent rounded-bl-[20px]"></div>

        <div class="f bg-transparent relative">
            <!-- Borde curvo inverso esquina inferior derecha -->
            <div class="absolute bottom-0 right-0 w-[20px] h-[20px] z-10"
                style="background: radial-gradient(circle at top left, transparent 20px, #D5D5D5 20px);"></div>
        </div>

        <div class="g flex items-center justify-center bg-bgGray rounded-tl-[20px] relative z-30">
            <!-- Borde curvo inverso esquina superior derecha -->
            <div class="absolute top-0 right-0 w-[20px] h-[20px] z-10"
                style="background: radial-gradient(circle at bottom left, transparent 20px, #D5D5D5 20px);"></div>

            <div class=" w-full h-full rounded-[12px] pt-[21px] pl-[19px] relative">

                <img src="{{  asset('build/assets/C11.jpeg')  }}" alt=""
                    class="w-full h-full object-cover rounded-[12px]">

                <div
                    class="absolute bottom-0 left-[19px] right-0 top-[21px] bg-linear-to-t from-[rgba(0,0,0,0.3)] to-[rgba(0,0,0,0.04)] rounded-[12px]">
                </div>

                <div class="absolute bottom-0 left-[19px] right-0 text-white py-[19px] px-[13px] z-10">

                    <h3 class=" text-2xl font-semibold mb-[13px]">Fortaleza de San Fernando</h3>

                    <div class=" flex items-center justify-between">

                        <div class=" flex items-center gap-x-[10px] italic text-base">

                            <p>500 m</p>
                            <p>Turístico</p>
                            <p>Familiar</p>

                        </div>

                        <img src="{{  asset('build/assets/arrow_outward.svg')  }}" alt="">
                    </div>

                </div>

            </div>

        </div>

        <div class="h flex items-center justify-center bg-bgGray rounded-br-[20px] relative z-30">
            <!-- Borde curvo inverso esquina superior izquierda -->
            <div class="absolute top-0 left-0 w-[20px] h-[20px] z-10"
                style="background: radial-gradient(circle at bottom right, transparent 20px, #D5D5D5 20px);"></div>

            <div class=" w-full h-full rounded-[12px] pt-[21px] pl-[19px] relative">

                <img src="{{  asset('build/assets/23.jpeg')  }}" alt=""
                    class="w-full h-full object-cover rounded-[12px]">

                <div
                    class="absolute bottom-0 left-[19px] right-0 top-[21px] bg-linear-to-t from-[rgba(0,0,0,0.3)] to-[rgba(0,0,0,0.04)] rounded-[12px]">
                </div>

                <div class="absolute bottom-0 left-[19px] right-0 text-white py-[19px] px-[13px] z-10">

                    <h3 class=" text-2xl font-semibold mb-[13px]">Bar y Restaurante con piscina</h3>

                    <div class=" flex items-center justify-between">

                        <div class=" flex items-center gap-x-[10px] italic text-base">

                            <p>5 m</p>
                            <p>Turístico</p>
                            <p>Familiar</p>

                        </div>

                        <img src="{{  asset('build/assets/arrow_outward.svg')  }}" alt="">
                    </div>

                </div>

            </div>

        </div>
    </div>

    <div class=" xl:hidden">

        <div class="rounded-[12px] overflow-hidden mb-[21px] relative">
            <div class="absolute inset-0">
                <img src="{{  asset('build/assets/hero.webp')  }}" alt=""
                    class="w-full h-full object-cover rounded-[12px]">
            </div>

            <div class="absolute inset-0 bg-linear-to-b from-[rgba(0,0,0,0.02)] via-[rgba(0,0,0,0.4)] to-[rgba(0,0,0,0.6)] z-10 rounded-[12px]"
                style="transform: translateZ(0);"></div>

            <div
                class="relative w-9/10 flex flex-col justify-end items-start pl-6 sm:pl-8 md:pl-10 lg:pl-12 xl:pl-[60px] z-20 text-white py-8 sm:py-10 md:py-12 min-h-[500px]">
                <h1
                    class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl xl:text-[80px] font-medium leading-tight sm:leading-[1.1] md:leading-[1.15] lg:leading-[1.1] xl:leading-[98px]">
                    Vive la Experiencia del Trópico</h1>
                <p
                    class="text-base sm:text-lg md:text-xl mb-4 sm:mb-5 md:mb-6 lg:mb-8 xl:mb-[44px] italic leading-relaxed sm:leading-[22px] md:leading-[24px] max-w-[438px] w-full">
                    El lugar donde el
                    descanso se
                    encuentra con la belleza natural.</p>

                <a href="#" class="group flex items-center gap-1.5 w-fit">
                    <span class="bg-caribeOrange text-white text-base sm:text-lg md:text-[18px] xl:text-[20px] leading-[22px] xl:leading-[24px] rounded-[20px] font-semibold group-hover:opacity-90 transition-opacity inline-flex items-center justify-center px-5 py-3 min-h-[52px] sm:px-[75px] sm:py-[14px]">
                        Ver ofertas
                    </span>
                    <span class="bg-caribeOrange text-white w-[52px] h-[52px] p-[14px] rounded-full flex items-center justify-center group-hover:opacity-90 transition-opacity shrink-0">
                        <img src="{{  asset('build/assets/arrow_outward.svg')  }}" alt="" class="w-full h-full">
                    </span>
                </a>

            </div>

        </div>

        <div class=" hidden sm:grid grid-cols-1 sm:grid-cols-2 gap-4">

            <div class=" rounded-[12px] overflow-hidden aspect-4/5 sm:aspect-4/5 md:aspect-5/6 lg:aspect-video relative">
                <img src="{{  asset('build/assets/C11.jpeg')  }}" alt=""
                    class="w-full h-full object-cover rounded-[12px]">

                <div
                    class="absolute bottom-0 left-0 right-0 top-0 bg-linear-to-t from-[rgba(0,0,0,0.3)] to-[rgba(0,0,0,0.04)] rounded-[12px]">
                </div>

                <div
                    class="absolute bottom-0 left-0 right-0 text-left py-[19px] px-[13px] z-10 text-white flex flex-col items-start">
                    <h3 class="text-xl font-semibold mb-[13px]">Fortaleza de San Fernando</h3>
                    <div class="flex items-center justify-between w-full">
                        <div class="flex items-center gap-x-[10px] italic text-sm">
                            <p>500 m</p>
                            <p>Turístico</p>
                            <p>Familiar</p>
                        </div>
                        <img src="{{  asset('build/assets/arrow_outward.svg')  }}" alt="" class="w-4 h-4 shrink-0">
                    </div>
                </div>
            </div>

            <div class=" rounded-[12px] overflow-hidden aspect-4/5 sm:aspect-4/5 md:aspect-5/6 lg:aspect-video relative">
                <img src="{{  asset('build/assets/23.jpeg')  }}" alt=""
                    class="w-full h-full object-cover rounded-[12px]">

                <div
                    class="absolute bottom-0 left-0 right-0 top-0 bg-linear-to-t from-[rgba(0,0,0,0.3)] to-[rgba(0,0,0,0.04)] rounded-[12px]">
                </div>

                <div
                    class="absolute bottom-0 left-0 right-0 text-left py-[19px] px-[13px] z-10 text-white flex flex-col items-start">
                    <h3 class="text-xl font-semibold mb-[13px]">Bar y Restaurante con piscina</h3>
                    <div class="flex items-center justify-between w-full">
                        <div class="flex items-center gap-x-[10px] italic text-sm">
                            <p>5 m</p>
                            <p>Turístico</p>
                            <p>Familiar</p>
                        </div>
                        <img src="{{  asset('build/assets/arrow_outward.svg')  }}" alt="" class="w-4 h-4 shrink-0">
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>