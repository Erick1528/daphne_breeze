@extends('layouts.index')

@section('title', 'Términos y condiciones')
@section('meta_description', 'Términos y condiciones de uso del sitio web de Hotel Daphne Breeze en Omoa, Cortés, Honduras.')
@section('meta_keywords', 'términos y condiciones, Daphne Breeze, hotel Omoa')

@section('banner')
    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 pt-6 sm:pt-8">
        <a href="{{ route('home') }}" class="group inline-flex items-center gap-1.5 text-caribeCoffee/70 text-sm md:text-base hover:text-caribeOrange transition-colors duration-200 border-b border-transparent group-hover:border-caribeOrange/50">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
            Volver al inicio
        </a>
    </div>
@endsection

@section('content')
    <section class="mt-[40px] sm:mt-[60px] w-full max-w-7xl mx-auto px-4 sm:px-6">
        <h1 class="text-navDark text-2xl md:text-3xl font-bold mb-4">Términos y condiciones</h1>

        <p class="text-caribeCoffee/80 text-sm md:text-base leading-relaxed mb-4">
            Al acceder y utilizar el sitio web de <strong>Hotel Daphne Breeze</strong> usted acepta los siguientes términos y condiciones. Le recomendamos leerlos con atención.
        </p>

        <h2 class="text-navDark text-lg md:text-xl font-semibold mt-6 mb-2">1. Objeto y aceptación</h2>
        <p class="text-caribeCoffee/80 text-sm md:text-base leading-relaxed">
            Los presentes términos y condiciones regulan el uso del sitio web de Hotel Daphne Breeze, con domicilio en Barrio La Playa, una cuadra antes del muelle artesanal de Omoa, a la par de la marina mercante, 21000 Omoa, Cortés, Honduras. La navegación y el uso de los servicios ofrecidos en este sitio implican la aceptación de estos términos. Si no está de acuerdo con ellos, le rogamos que no utilice este sitio.
        </p>

        <h2 class="text-navDark text-lg md:text-xl font-semibold mt-6 mb-2">2. Uso del sitio web</h2>
        <p class="text-caribeCoffee/80 text-sm md:text-base leading-relaxed mb-2">
            El usuario se compromete a utilizar este sitio web de forma lícita, correcta y de buena fe. En particular, el usuario no deberá:
        </p>
        <ul class="list-disc pl-5 text-caribeCoffee/80 text-sm md:text-base leading-relaxed space-y-1 mb-2">
            <li>Utilizar el sitio con fines fraudulentos o que puedan perjudicar a terceros.</li>
            <li>Introducir virus, malware o cualquier elemento que pueda dañar o alterar el funcionamiento del sitio o de los equipos de otros usuarios.</li>
            <li>Reproducir, copiar o explotar el contenido del sitio con fines comerciales sin autorización previa.</li>
        </ul>
        <p class="text-caribeCoffee/80 text-sm md:text-base leading-relaxed">
            Hotel Daphne Breeze se reserva el derecho de denegar el acceso o suspender el uso del sitio a quienes incumplan estos términos.
        </p>

        <h2 class="text-navDark text-lg md:text-xl font-semibold mt-6 mb-2">3. Propiedad intelectual</h2>
        <p class="text-caribeCoffee/80 text-sm md:text-base leading-relaxed">
            Todos los contenidos de este sitio web (textos, imágenes, logotipos, diseño, fotografías, etc.) son propiedad de Hotel Daphne Breeze o de sus titulares y están protegidos por la legislación aplicable en materia de propiedad intelectual e industrial. Queda prohibida su reproducción, distribución o comunicación pública sin autorización expresa, salvo en los casos en que la ley lo permita (por ejemplo, uso privado o citas con fines informativos).
        </p>

        <h2 class="text-navDark text-lg md:text-xl font-semibold mt-6 mb-2">4. Información, consultas y reservas</h2>
        <p class="text-caribeCoffee/80 text-sm md:text-base leading-relaxed">
            La información sobre habitaciones, ofertas, precios y servicios que se muestra en este sitio tiene carácter orientativo y puede ser modificada sin previo aviso. Las reservas o solicitudes de información realizadas a través del formulario de contacto o por otros medios no constituyen una confirmación definitiva hasta que el hotel responda y, en su caso, confirme la disponibilidad y las condiciones. Para cualquier duda sobre reservas, precios o condiciones de estancia, puede contactarnos a través de los medios indicados en la sección de contacto de este sitio.
        </p>

        <h2 class="text-navDark text-lg md:text-xl font-semibold mt-6 mb-2">5. Enlaces a terceros</h2>
        <p class="text-caribeCoffee/80 text-sm md:text-base leading-relaxed">
            Este sitio puede contener enlaces a páginas externas (por ejemplo, redes sociales o plataformas de reserva). Hotel Daphne Breeze no controla el contenido ni las prácticas de esos sitios y no asume responsabilidad por ellos. La inclusión de un enlace no implica respaldo alguno. El uso de sitios de terceros queda bajo la responsabilidad del usuario y sujeto a sus propios términos y políticas.
        </p>

        <h2 class="text-navDark text-lg md:text-xl font-semibold mt-6 mb-2">6. Limitación de responsabilidad</h2>
        <p class="text-caribeCoffee/80 text-sm md:text-base leading-relaxed">
            Hotel Daphne Breeze se esfuerza por mantener la información del sitio actualizada y correcta, pero no garantiza que el contenido esté libre de errores o que el sitio funcione de forma ininterrumpida. En la medida permitida por la ley, no seremos responsables de daños indirectos o consecuentes derivados del uso o la imposibilidad de uso de este sitio web. La relación contractual con los huéspedes (reservas, estancias, servicios) se rige por las condiciones acordadas en cada caso y por la legislación aplicable.
        </p>

        <h2 class="text-navDark text-lg md:text-xl font-semibold mt-6 mb-2">7. Modificaciones</h2>
        <p class="text-caribeCoffee/80 text-sm md:text-base leading-relaxed">
            Nos reservamos el derecho de modificar estos términos y condiciones en cualquier momento. Los cambios entrarán en vigor desde su publicación en esta página. Le recomendamos revisar periódicamente esta sección. El uso continuado del sitio tras la publicación de cambios constituye la aceptación de los nuevos términos.
        </p>

        <h2 class="text-navDark text-lg md:text-xl font-semibold mt-6 mb-2">8. Ley aplicable y jurisdicción</h2>
        <p class="text-caribeCoffee/80 text-sm md:text-base leading-relaxed">
            Estos términos se rigen por la legislación de Honduras. Para cualquier controversia derivada del uso de este sitio web o de la relación con Hotel Daphne Breeze, las partes se someterán a los juzgados y tribunales competentes en Honduras, salvo que la ley disponga otra cosa.
        </p>

        <h2 class="text-navDark text-lg md:text-xl font-semibold mt-6 mb-2">9. Contacto</h2>
        <p class="text-caribeCoffee/80 text-sm md:text-base leading-relaxed">
            Para cualquier consulta sobre estos términos y condiciones puede dirigirse a Hotel Daphne Breeze mediante el formulario de contacto de este sitio web o en la dirección: Barrio La Playa, una cuadra antes del muelle artesanal de Omoa, a la par de la marina mercante, 21000 Omoa, Cortés, Honduras.
        </p>
    </section>
@endsection
