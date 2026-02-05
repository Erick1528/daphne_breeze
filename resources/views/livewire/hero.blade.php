<div class="grid grid-cols-4 grid-rows-2 h-[780px] w-full rounded-[20px] relative overflow-hidden"
    style="background-image: url('{{ asset('build/assets/hero.webp') }}'); background-size: cover; background-position: center; transform: translateZ(0); backface-visibility: hidden; -webkit-backface-visibility: hidden;">
    
    <!-- Overlay de gradiente para el texto sobre las cuadrículas a, b, c, e, f -->
    <div class="absolute left-0 top-0 right-0 bottom-0 bg-linear-to-r from-[rgba(0,0,0,0.5)] via-[rgba(0,0,0,0.2)] to-[rgba(0,0,0,0.02)] z-10" style="transform: translateZ(0);"></div>
    
    <!-- Contenido de texto sobre las cuadrículas a, b, c, e, f -->
    <div class="absolute left-0 top-0 w-3/4 h-full flex flex-col justify-center items-start pl-[42px] z-20 text-white">
        <h1 class="text-[80px] font-medium leading-[98px]">Vive la Experiencia del Trópico</h1>
        <p class="text-xl mb-[44px] italic leading-[24px] max-w-[438px] w-full">El lugar donde el descanso se encuentra con la belleza natural.</p>

        <div class="flex items-center gap-1.5">
            <a href="#" class="bg-caribeOrange text-white text-[20px] leading-[24px] px-[75px] py-[14px] rounded-[20px] font-semibold hover:opacity-90 transition-opacity">
                Ver ofertas
            </a>
            <a href="#" class="bg-caribeOrange text-white w-[52px] h-[52px] p-[14px] rounded-full flex items-center justify-center hover:opacity-90 transition-opacity">
                <img src="{{  asset('build/assets/arrow_outward.svg')  }}" alt="">
            </a>
        </div>

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

            <img src="{{  asset('build/assets/C11.jpeg')  }}" alt="" class="w-full h-full object-cover rounded-[12px]">

            <div class="absolute bottom-0 left-[19px] right-0 top-[21px] bg-linear-to-t from-[rgba(0,0,0,0.3)] to-[rgba(0,0,0,0.04)] rounded-[12px]"></div>

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

            <img src="{{  asset('build/assets/23.jpeg')  }}" alt="" class="w-full h-full object-cover rounded-[12px]">

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