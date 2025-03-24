<!DOCTYPE html><html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guide Touristique - Votre Aventure Commence Ici</title>
    @vite(['resources/css/app.css', 'resources/js/app.js']) <!-- Tailwind via Vite -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  
</head>
<body class="bg-white font-sans antialiased">
    <!-- Navbar (inspirée de GetYourGuide) -->
    <nav class="bg-white shadow-md p-4 sticky top-0 z-10">
        <div class="container mx-auto flex justify-between items-center">
            <a href="/" class="text-2xl font-bold text-blue-600">Guide Touristique</a>
            <div class="flex items-center space-x-6">
                <a href="#categories" class="text-gray-700 hover:text-blue-600">Explorer</a>
                @if (Route::has('login') && !Auth::check())
                    <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-600">Connexion</a>
                    <a href="{{ route('register') }}" class="bg-blue-600 text-white px-4 py-2 rounded-full hover:bg-blue-700">Inscription</a>
                @else
                    <a href="#" class="text-gray-700 hover:text-blue-600">Mon compte</a>
                    <form method="POST" action="#" class="inline">
                        @csrf
                        <button type="submit" class="text-gray-700 hover:text-blue-600">Déconnexion</button>
                    </form>
                @endif
            </div>
        </div>
    </nav>
<!-- Hero Section (inspirée de GetYourGuide) -->
<section class="relative bg-gray-100 py-20">
    <div class="container mx-auto text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">Découvrez des expériences uniques</h1>
        <p class="text-lg text-gray-600 mb-8">Attractions, restaurants, hôtels et bien plus, près de vous.</p>
        <div class="max-w-xl mx-auto">
            <form action="#" method="GET" class="flex items-center bg-white p-2 rounded-full shadow-md">
                <input type="text" name="search" placeholder="Que cherchez-vous ?" class="w-full px-4 py-2 text-gray-700 focus:outline-none">
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-full hover:bg-blue-700">Rechercher</button>
            </form>
        </div>
    </div>
</section>

<!-- Categories Section (inspirée des vignettes de GetYourGuide) -->
<section id="categories" class="py-16">
    <div class="container mx-auto">
        <h2 class="text-3xl font-bold text-gray-800 text-center mb-12">Explorez par catégorie</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <a href="#" class="group">
                <div class="bg-cover bg-center h-40 rounded-lg shadow-md transform group-hover:scale-105 transition" style="background-image: url('https://source.unsplash.com/random/300x200?landmark')"></div>
                <p class="mt-2 text-center text-gray-700 font-semibold">Attractions</p>
            </a>
            <a href="#" class="group">
                <div class="bg-cover bg-center h-40 rounded-lg shadow-md transform group-hover:scale-105 transition" style="background-image: url('https://source.unsplash.com/random/300x200?food')"></div>
                <p class="mt-2 text-center text-gray-700 font-semibold">Restaurants</p>
            </a>
            <a href="#"class="group">
                <div class="bg-cover bg-center h-40 rounded-lg shadow-md transform group-hover:scale-105 transition" style="background-image: url('https://source.unsplash.com/random/300x200?hotel')"></div>
                <p class="mt-2 text-center text-gray-700 font-semibold">Hôtels</p>
            </a>
            <a href="#" class="group">
                <div class="bg-cover bg-center h-40 rounded-lg shadow-md transform group-hover:scale-105 transition" style="background-image: url('https://source.unsplash.com/random/300x200?spa')"></div>
                <p class="mt-2 text-center text-gray-700 font-semibold">Hammam & Spa</p>
            </a>
            <!-- Ajoutez d'autres catégories ici -->
        </div>
        <div class="text-center mt-8">
            <a href="#map" class="text-blue-600 hover:underline">Voir toutes les catégories</a>
        </div>
    </div>
</section>

<!-- Map Section -->
<section id="map" class="py-16 bg-gray-100">
    <div class="container mx-auto text-center">
        <h2 class="text-3xl font-bold text-gray-800 mb-8">Trouvez des lieux près de vous</h2>
        <div id="map-container" class="w-full h-96 rounded-lg shadow-md"></div>
        <p class="mt-4 text-gray-600">Activez la géolocalisation pour une expérience personnalisée.</p>
    </div>
</section>

<!-- Call to Action (Prestataires) -->
<section class="py-16 bg-blue-600 text-white text-center">
    <div class="container mx-auto">
        <h2 class="text-3xl font-bold mb-4">Vous êtes prestataire ?</h2>
        <p class="text-lg mb-6">Ajoutez votre établissement et atteignez des milliers de visiteurs.</p>
        <a href="#" class="bg-white text-blue-600 px-6 py-3 rounded-full hover:bg-gray-100 transition">Rejoignez-nous</a>
    </div>
</section>

<!-- Footer -->
<footer class="bg-gray-800 text-white py-8">
    <div class="container mx-auto text-center">
        <p class="text-sm">© {{ date('Y') }} Guide Touristique. Tous droits réservés.</p>
        <div class="mt-4 space-x-4">
            <a href="#" class="text-gray-400 hover:text-white">À propos</a>
            <a href="#" class="text-gray-400 hover:text-white">Contact</a>
            <a href="#" class="text-gray-400 hover:text-white">Conditions</a>
        </div>
    </div>
</footer>

<!-- Script pour la carte -->
<script>
    var map = L.map('map-container').setView([51.505, -0.09], 13); // Coordonnées par défaut
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    // Géolocalisation
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            var userLat = position.coords.latitude;
            var userLng = position.coords.longitude;
            map.setView([userLat, userLng], 13);
            L.marker([userLat, userLng]).addTo(map).bindPopup('Vous êtes ici !').openPopup();
        }, function() {
            console.log('Géolocalisation refusée ou indisponible.');
        });
    }
</script>

</body>
</html>

