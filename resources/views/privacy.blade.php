@extends('layouts.index')

@section('title', 'Política de privacidad')
@section('meta_description', 'Política de privacidad de Hotel Daphne Breeze en Omoa, Cortés, Honduras. Información sobre el uso de datos y Google Analytics.')

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
        <h1 class="text-navDark text-2xl md:text-3xl font-bold mb-4">Política de privacidad</h1>

        <p class="text-caribeCoffee/80 text-sm md:text-base leading-relaxed mb-4">
            En Hotel Daphne Breeze nos tomamos en serio la privacidad de las personas que visitan nuestra página web.
            En este documento te explicamos qué datos se recopilan, con qué finalidad y cuáles son tus derechos.
        </p>

        <h2 class="text-navDark text-lg md:text-xl font-semibold mt-6 mb-2">1. Responsable del tratamiento</h2>
        <p class="text-caribeCoffee/80 text-sm md:text-base leading-relaxed">
            El responsable del tratamiento de los datos personales recogidos a través de esta página web es
            <span class="font-semibold">Hotel Daphne Breeze</span>, ubicado en Barrio La Playa, una cuadra antes del
            muelle artesanal de Omoa, a la par de la marina mercante, 21000 Omoa, Cortés, Honduras.
        </p>

        <h2 class="text-navDark text-lg md:text-xl font-semibold mt-6 mb-2">2. Datos que recopilamos</h2>
        <p class="text-caribeCoffee/80 text-sm md:text-base leading-relaxed mb-2">
            Al navegar por este sitio web se pueden tratar los siguientes tipos de datos:
        </p>
        <ul class="list-disc pl-5 text-caribeCoffee/80 text-sm md:text-base leading-relaxed space-y-1">
            <li>
                <span class="font-semibold">Datos técnicos de navegación</span> (por ejemplo, dirección IP, tipo de
                navegador, idioma, sistema operativo, fecha y hora de acceso), necesarios para permitir la conexión y
                seguridad del sitio.
            </li>
            <li>
                <span class="font-semibold">Datos de analítica web</span>, recogidos a través de
                <span class="font-semibold">Google Analytics</span>, de forma pseudonimizada, para obtener estadísticas
                agregadas de uso de la web (páginas visitadas, tiempo de visita, tipo de dispositivo, etc.).
            </li>
            <li>
                Los datos que tú mismo facilitas a través del <span class="font-semibold">formulario de contacto</span>
                (nombre, correo electrónico y mensaje), que utilizamos únicamente para responder a tu solicitud.
            </li>
        </ul>

        <h2 class="text-navDark text-lg md:text-xl font-semibold mt-6 mb-2">3. Cookies y Google Analytics</h2>
        <p class="text-caribeCoffee/80 text-sm md:text-base leading-relaxed mb-2">
            Utilizamos <span class="font-semibold">Google Analytics</span> para analizar de forma anónima y agregada cómo
            se utiliza nuestro sitio web (por ejemplo, qué secciones se visitan más, desde qué dispositivos nos visitan,
            etc.). Estas mediciones nos ayudan a mejorar contenidos y usabilidad.
        </p>
        <p class="text-caribeCoffee/80 text-sm md:text-base leading-relaxed mb-2">
            La activación de Google Analytics está gestionada a través de la plataforma de consentimiento de cookies
            <span class="font-semibold">Cookiebot</span>. No se cargan cookies de analítica ni se envían datos a Google
            hasta que el usuario haya dado su consentimiento a través del banner de cookies.
        </p>
        <p class="text-caribeCoffee/80 text-sm md:text-base leading-relaxed">
            Puedes cambiar o retirar tu consentimiento en cualquier momento utilizando el enlace de configuración de
            cookies que aparece en el banner o en el pie de página (según configuración de Cookiebot).
        </p>

        <h2 class="text-navDark text-lg md:text-xl font-semibold mt-6 mb-2">4. Base jurídica del tratamiento</h2>
        <ul class="list-disc pl-5 text-caribeCoffee/80 text-sm md:text-base leading-relaxed space-y-1">
            <li>
                <span class="font-semibold">Ejecución de la relación precontractual o contractual</span>:
                cuando respondemos a consultas que nos envías a través del formulario de contacto.
            </li>
            <li>
                <span class="font-semibold">Interés legítimo</span>: garantizar el funcionamiento técnico, la seguridad
                y mejora básica del sitio web (logs del servidor, prevención de abusos, etc.).
            </li>
            <li>
                <span class="font-semibold">Consentimiento</span>: para el uso de cookies de analítica (Google Analytics),
                que solo se activan cuando lo aceptas expresamente a través del banner de cookies.
            </li>
        </ul>

        <h2 class="text-navDark text-lg md:text-xl font-semibold mt-6 mb-2">5. Conservación de los datos</h2>
        <p class="text-caribeCoffee/80 text-sm md:text-base leading-relaxed">
            Los datos técnicos y de analítica se conservan durante los plazos necesarios para los fines descritos y de
            acuerdo con las políticas de retención de <span class="font-semibold">Google Analytics</span>. Los datos que
            nos envías a través del formulario de contacto se conservan mientras gestionamos tu solicitud y, en su caso,
            durante los plazos necesarios para cumplir obligaciones legales o atender posibles responsabilidades.
        </p>

        <h2 class="text-navDark text-lg md:text-xl font-semibold mt-6 mb-2">6. Destinatarios y transferencias</h2>
        <p class="text-caribeCoffee/80 text-sm md:text-base leading-relaxed">
            Utilizamos servicios de terceros que pueden implicar transferencias internacionales de datos, en particular:
            <span class="font-semibold">Google LLC</span> (Google Analytics). Google actúa como encargado del tratamiento
            y trata datos en nuestro nombre para prestar el servicio de analítica. Puedes consultar con más detalle cómo
            trata Google los datos en su propia política de privacidad.
        </p>

        <h2 class="text-navDark text-lg md:text-xl font-semibold mt-6 mb-2">7. Tus derechos</h2>
        <p class="text-caribeCoffee/80 text-sm md:text-base leading-relaxed mb-2">
            En función de la normativa aplicable (por ejemplo, Reglamento General de Protección de Datos de la Unión
            Europea o leyes de privacidad de determinados estados de EE. UU.), puedes tener derecho a:
        </p>
        <ul class="list-disc pl-5 text-caribeCoffee/80 text-sm md:text-base leading-relaxed space-y-1">
            <li>Acceder a tus datos personales.</li>
            <li>Solicitar la rectificación de datos inexactos o incompletos.</li>
            <li>Solicitar la supresión de tus datos cuando ya no sean necesarios o retires tu consentimiento.</li>
            <li>Solicitar la limitación del tratamiento en determinados supuestos.</li>
            <li>Oponerte al tratamiento de tus datos en determinadas circunstancias.</li>
            <li>Retirar tu consentimiento en cualquier momento, sin que ello afecte a la licitud del tratamiento previo.</li>
        </ul>
        <p class="text-caribeCoffee/80 text-sm md:text-base leading-relaxed mt-2">
            Para ejercer estos derechos puedes ponerte en contacto con nosotros a través de los datos de contacto
            indicados en esta página web (por ejemplo, el formulario de contacto de la sección “Contacto”).
        </p>

        <h2 class="text-navDark text-lg md:text-xl font-semibold mt-6 mb-2">8. Cambios en esta política</h2>
        <p class="text-caribeCoffee/80 text-sm md:text-base leading-relaxed">
            Podemos actualizar esta política de privacidad para adaptarla a cambios legales o en el funcionamiento del
            sitio web. La versión publicada en esta página será siempre la más reciente.
        </p>
    </section>
@endsection

