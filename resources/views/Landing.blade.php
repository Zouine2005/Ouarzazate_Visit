
@extends('layouts.app')
@section('content')
<!-- Hero Section -->
<section class="relative bg-amber-200 py-24 bg-cover bg-center overflow-hidden">
    <!-- Video Background -->
    <video autoplay muted loop class="absolute top-0 left-0 w-full h-full object-cover">
        <source src="{{ asset('vedios/hero.mp4') }}" type="video/mp4">
        Votre navigateur ne supporte pas les vidéos HTML5.
    </video>

    <!-- Contenu par-dessus la vidéo -->
    <div class="relative container mx-auto text-center">
        <h1 class="text-5xl md:text-6xl font-bold text-white font-playfair mb-4" data-aos="fade-up">
            {{ __('messages.hero_title') }}
        </h1>
        <p class="text-lg text-white mb-8" data-aos="fade-up" data-aos-delay="200">
            {{ __('messages.hero_subtitle') }}
        </p>
        <div class="max-w-xl mx-auto">
            <form action="{{ route('landingpage.search') }}" method="GET" class="flex items-center bg-white p-2 rounded-full shadow-md">
                <input type="text" name="search" value="{{ old('search', $search ?? '') }}" placeholder="{{ __('messages.search_placeholder') }}" class="w-full px-4 py-2 text-amber-900 focus:outline-none">
                <button type="submit" class="bg-amber-800 text-white px-6 py-2 rounded-full hover:bg-amber-900 shadow-md transition">
                    {{ __('messages.search') }}
                </button>
            </form>
        </div>
    </div>
</section>

<!-- Categories Section -->
<section id="categories" class="py-24">
    <div class="container mx-auto">
        <h2 class="text-4xl font-bold text-amber-900 font-playfair text-center mb-12" data-aos="fade-up">{{ __('messages.explore_by_category') }}</h2>
        
        <!-- Les 4 premières catégories -->
        @if($categoriesFirst->isNotEmpty())
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            @foreach($categoriesFirst as $category)
                <a href="{{ route('category.services', $category->id) }}" class="group"  data-aos="zoom-in">
                    <div class="bg-cover bg-center h-40 rounded-lg shadow-md transform group-hover:scale-105 transition"
                         style="background-image: url('{{ $category->image }}')"></div>
                    <p class="mt-2 text-center text-amber-900 font-semibold">{{ $category->name }}</p>
                </a>
            @endforeach
        </div>
        @else
            <p>{{ __('messages.no_categories') }}</p>
        @endif
        <div id="servicesContainer" class="mt-8 hidden">
            <h3 class="text-2xl font-bold text-amber-900 font-playfair text-center mb-4">{{ __('messages.related_services') }}</h3>
            <div id="servicesList" class="grid grid-cols-2 md:grid-cols-4 gap-6"></div>
        </div>
        <!-- Bouton Voir Plus -->
        <div class="text-center mt-8">
            <button id="showMoreBtn" class="text-teal-600 hover:text-teal-700 transition duration-300" style="cursor:pointer">{{ __('messages.view_all') }}</button>
        </div>

        <!-- Catégories cachées -->
        <div id="moreCategories" class="grid grid-cols-2 md:grid-cols-4 gap-6 mt-8 hidden">
            @foreach($moreCategories as $category)
                <a href="#" class="group" data-aos="zoom-in">
                    <div class="bg-cover bg-center h-40 rounded-lg shadow-md transform group-hover:scale-105 transition"
                         style="background-image: url('{{ $category->image }}')"></div>
                    <p class="mt-2 text-center text-amber-900 font-semibold">{{ $category->name }}</p>
                </a>
            @endforeach
        </div>
    </div>
</section>

<!-- Map Section -->
<section id="map" class="py-24 bg-amber-50">
    <div class="container mx-auto text-center">
        <h2 class="text-4xl font-bold text-amber-900 font-playfair mb-8" data-aos="fade-up">{{ __('messages.find_nearby') }}</h2>
        <div id="map-container" class="w-full h-96 rounded-lg shadow-md"></div>
        <p class="mt-4 text-amber-800">{{ __('messages.enable_geo') }}</p>
    </div>
</section>




<!-- Scripts -->

<script>
    var map = L.map('map-container').setView([30.9335, -6.9370], 13);
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
<!-- Show More Categories -->
<script>
    document.getElementById('showMoreBtn').addEventListener('click', function() {
        document.getElementById('moreCategories').classList.remove('hidden');
        this.style.display = 'none';
    });
</script>



<!-- Services -->
<script>
    document.querySelectorAll('.category-link').forEach(category => {
        category.addEventListener('click', function(event) {
            event.preventDefault();

            let categoryId = this.getAttribute('data-id');

            fetch(`/${categoryId}/services`)
                .then(response => response.json())
                .then(data => {
                    let servicesContainer = document.getElementById('servicesContainer');
                    let servicesList = document.getElementById('servicesList');

                    servicesList.innerHTML = '';

                    if (data.length > 0) {
                        data.forEach(service => {
                            let serviceItem = document.createElement('div');
                            serviceItem.classList.add('p-4', 'bg-white', 'shadow-md', 'rounded-lg', 'text-center');
                            serviceItem.innerHTML = `
                                <img src="${service.image}" alt="${service.name}" class="w-full h-32 object-cover rounded-md">
                                <p class="mt-2 text-amber-900 font-semibold">${service.name}</p>
                            `;
                            servicesList.appendChild(serviceItem);
                        });

                        servicesContainer.classList.remove('hidden');
                    } else {
                        servicesContainer.classList.add('hidden');
                    }
                })
                .catch(error => console.error('Erreur:', error));
        });
    });
</script>

@endsection