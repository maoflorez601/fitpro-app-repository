<div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
    <img src="{{ asset('images/logo.png') }}" alt="logo_fitpro" class="block h-9 w-auto"/>

    <h1 class="mt-8 text-2xl font-medium text-gray-900 dark:text-white">
        Bienvenido al sistema FitPro!
    </h1>

    <p class="mt-6 text-gray-500 dark:text-gray-400 leading-relaxed">
        En FitPro nos dedicamos a acompañarte en tu viaje hacia un estilo de vida más saludable y activo, 
        ofreciéndote rutinas de ejercicio diseñadas por profesionales, seguimiento personalizado de tu progreso, 
        y consejos nutricionales. Ya sea que estés comenzando o buscando desafíos avanzados, nuestra plataforma está 
        aquí para apoyarte en cada paso del camino hacia tu mejor versión física y mental. Únete a nuestra comunidad 
        activa y descubre cómo puedes transformar tu vida con FitPro.
        <br><br>
        ¡Prepárate para alcanzar tu mejor versión con FitPro!
    </p>
</div>

<div class="bg-gray-200 dark:bg-gray-800 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">
    
    <div>
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-6 h-6 stroke-gray-400">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
            </svg>
            <h2 class="ms-3 text-xl font-semibold text-gray-900 dark:text-white">
                <a href="{{ route('health_profiles.index') }}">Perfil de Salud</a>
            </h2>
        </div>

        <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
            El perfil de salud en FitPro te permite evaluar tu estado físico actual y establecer metas personalizadas mediante análisis de datos biométricos, historial médico y preferencias personales. Con esta información, te ofrecemos recomendaciones específicas para mejorar tu bienestar general y alcanzar un estilo de vida más saludable de manera gradual y efectiva.
        </p>
    </div>

    <div>
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-6 h-6 stroke-gray-400">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
            </svg>
            <h2 class="ms-3 text-xl font-semibold text-gray-900 dark:text-white">
                <a href="{{ route('foods.index') }}">Dieta</a>
            </h2>
        </div>

        <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
            El módulo de dieta en FitPro te proporciona planes alimenticios personalizados según tus objetivos de salud y rendimiento. Desde recomendaciones nutricionales adaptadas a tus necesidades hasta recetas saludables y consejos prácticos, nuestro enfoque integral te ayuda a optimizar tu alimentación para alcanzar tus metas fitness de manera efectiva y sostenible.
        </p>
    </div>

    <div>
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-6 h-6 stroke-gray-400">
                <path stroke-linecap="round" d="M15.75 10.5l4.72-4.72a.75.75 0 011.28.53v11.38a.75.75 0 01-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25h-9A2.25 2.25 0 002.25 7.5v9a2.25 2.25 0 002.25 2.25z" />
            </svg>
            <h2 class="ms-3 text-xl font-semibold text-gray-900 dark:text-white">
                <a href="{{ route('exercise_routines.index') }}">Rutinas de ejercicios</a>
            </h2>
        </div>

        <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
            Las rutinas de ejercicios en FitPro están diseñadas para adaptarse a tus objetivos de fitness y nivel de experiencia. Desde principiantes hasta atletas avanzados, encontrarás planes personalizados que incluyen ejercicios variados y estructurados para mejorar tu fuerza, resistencia y flexibilidad.
        </p>
    </div>

    <div>
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-6 h-6 stroke-gray-400">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
            </svg>
            <h2 class="ms-3 text-xl font-semibold text-gray-900 dark:text-white">
                <a href="https://tailwindcss.com/">Comunidad FitPro</a>
            </h2>
        </div>

        <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
            
La Comunidad FitPro te conecta con personas apasionadas por el fitness, donde puedes compartir experiencias, motivaciones y consejos para mantener un estilo de vida activo y saludable. Es un espacio inclusivo que fomenta el apoyo mutuo y la inspiración para alcanzar tus metas de bienestar.
        </p>
    </div>    
</div>
