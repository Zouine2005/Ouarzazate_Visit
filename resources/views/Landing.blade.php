<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('messages.page_title') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js']) <!-- Tailwind + JS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-white font-sans antialiased">

<!-- Navbar -->
<nav class="bg-white shadow-md p-4 sticky top-0 z-10">
    <div class="container mx-auto flex justify-between items-center">
        <a href="/" class="text-2xl font-bold text-blue-600">Mer7babik</a>
        <div class="flex items-center space-x-6">
         
            <a href="#categories" class="text-gray-700 hover:text-blue-600">{{ __('messages.explorer') }}</a>
            @guest
                <a href="#" class="text-gray-700 hover:text-blue-600">{{ __('messages.login') }}</a>
                <a href="#" class="bg-blue-600 text-white px-4 py-2 rounded-full hover:bg-blue-700">{{ __('messages.register') }}</a>
            @else
                <a href="#" class="text-gray-700 hover:text-blue-600">{{ __('messages.my_account') }}</a>
                <form method="POST" action="#" class="inline">@csrf
                    <button type="submit" class="text-gray-700 hover:text-blue-600">{{ __('messages.logout') }}</button>
                </form>
            @endguest
            <form action="{{ route('language.change') }}" method="POST" class="flex items-center">
                    @csrf
                    <select name="language" onchange="this.form.submit()" class="border border-gray-300 rounded px-2 py-1">
                        <option value="fr" {{ app()->getLocale() == 'fr' ? 'selected' : '' }}>Français</option>
                        <option value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>English</option>
                        <option value="ar" {{ app()->getLocale() == 'ar' ? 'selected' : '' }}>العربية</option>
                        <option value="es" {{ app()->getLocale() == 'es' ? 'selected' : '' }}>Español</option>
                    </select>
            </form>

        </div>
         
    </div>
</nav>

<!-- Hero Section -->
<section class="relative bg-gray-100 py-20 bg-cover bg-center"  style="background-image: url('{{ asset('images/her-bg1.jpg') }}');">
    <div class="container mx-auto text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">{{ __('messages.hero_title') }}</h1>
        <p class="text-lg text-gray-600 mb-8">{{ __('messages.hero_subtitle') }}</p>
        <div class="max-w-xl mx-auto">
            <form action="#" method="GET" class="flex items-center bg-white p-2 rounded-full shadow-md">
                <input type="text" name="search" placeholder="{{ __('messages.search_placeholder') }}" class="w-full px-4 py-2 text-gray-700 focus:outline-none">
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-full hover:bg-blue-700">{{ __('messages.search') }}</button>
            </form>
        </div>
    </div>
</section>

<!-- Categories Section -->
<section id="categories" class="py-16">
    <div class="container mx-auto">
        <h2 class="text-3xl font-bold text-gray-800 text-center mb-12">{{ __('messages.explore_by_category') }}</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
        @foreach([
                       'landmark' => __('messages.attractions'),
                       'food' => __('messages.restaurants'),
                       'hotel' => __('messages.hotels'),
                       'spa' => __('messages.hammam_spa')
                   ] as $img => $label)
            <a href="#" class="group">
                <div class="bg-cover bg-center h-40 rounded-lg shadow-md transform group-hover:scale-105 transition" style="background-image: url('https://source.unsplash.com/random/300x200?{{ $img }}')"></div>
                <p class="mt-2 text-center text-gray-700 font-semibold">{{ $label }}</p>
            </a>
            @endforeach
        </div>
        <div class="text-center mt-8">
            <a href="#map" class="text-blue-600 hover:underline">{{ __('messages.view_all') }}</a>
        </div>
    </div>
</section>

<!-- Map Section -->
<section id="map" class="py-16 bg-gray-100">
    <div class="container mx-auto text-center">
        <h2 class="text-3xl font-bold text-gray-800 mb-8">{{ __('messages.find_nearby') }}</h2>
        <div id="map-container" class="w-full h-96 rounded-lg shadow-md"></div>
        <p class="mt-4 text-gray-600">{{ __('messages.enable_geo') }}</p>
    </div>
</section>

<!-- Call to Action -->
<section class="py-16 bg-blue-600 text-white text-center">
    <div class="container mx-auto">
        <h2 class="text-3xl font-bold mb-4">{{ __('messages.provider_call') }}</h2>
        <p class="text-lg mb-6">{{ __('messages.provider_sub') }}</p>
        <a href="#" class="bg-white text-blue-600 px-6 py-3 rounded-full hover:bg-gray-100 transition">{{ __('messages.join_us') }}</a>
    </div>
</section>

<!-- Footer -->
<footer class="bg-gray-800 text-white py-8">
    <div class="container mx-auto text-center">
        <p class="text-sm">© {{ now()->year }} Guide Touristique. {{ __('messages.rights_reserved') }}</p>
        <div class="mt-4 space-x-4">
            <a href="#" class="text-gray-400 hover:text-white">{{ __('messages.about') }}</a>
            <a href="#" class="text-gray-400 hover:text-white">{{ __('messages.contact') }}</a>
            <a href="#" class="text-gray-400 hover:text-white">{{ __('messages.terms') }}</a>
        </div>
    </div>
</footer>

<!-- Map Script -->
<script>
    var map = L.map('map-container').setView([30.9335, -6.9370], 13); // Par défaut Ouarzazate
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap'
    }).addTo(map);

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            var userLat = position.coords.latitude;
            var userLng = position.coords.longitude;
            map.setView([userLat, userLng], 13);
            L.marker([userLat, userLng]).addTo(map).bindPopup('{{ __("messages.you_are_here") }}').openPopup();
        });
    }
</script>

</body>
</html>
