@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8 bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen">
    <div class="max-w-5xl mx-auto bg-white rounded-xl shadow-lg p-6 md:p-8 transform transition-all hover:shadow-xl">
        <!-- Titre avec effet -->
        <h1 class="text-3xl md:text-4xl font-serif text-gray-900 mb-4 text-center md:text-left bg-clip-text text-transparent bg-gradient-to-r from-amber-600 to-pink-600 animate-fade-in">
            {{ $service->{'name_' . app()->getLocale()} }}
        </h1>

        <!-- Catégorie avec badge -->
        <p class="text-gray-600 text-base md:text-lg mb-6 text-center md:text-left">
            <span class="inline-block bg-amber-100 text-amber-800 text-sm font-semibold px-3 py-1 rounded-full">
                {{ $service->category->{'name_' . app()->getLocale()} }}
            </span>
        </p>

        <hr class="my-6 border-gray-200">

        <!-- Vidéo avec overlay -->
        @if($service->video)
            <div class="mt-6 relative group">
                <video class="w-full h-auto rounded-lg shadow-md transition-transform duration-300 group-hover:scale-105" controls>
                    <source src="{{ asset($service->video) }}" type="video/mp4">
                    Votre navigateur ne supporte pas la lecture de vidéos.
                </video>
            </div>
        @endif

        <!-- 🖼️ Scroll horizontal avec effet hover -->
        <div class="mt-8 w-full overflow-x-auto scrollbar-thin scrollbar-thumb-indigo-500 scrollbar-track-gray-100 snap-x snap-mandatory" 
             x-data="{ scrollPosition: 0 }" 
             x-init="$nextTick(() => {
                 const container = $el;
                 setInterval(() => {
                     const maxScroll = container.scrollWidth - container.clientWidth;
                     scrollPosition = scrollPosition >= maxScroll ? 0 : scrollPosition + container.clientWidth;
                     container.scrollTo({ left: scrollPosition, behavior: 'smooth' });
                 }, 5000);
             })">
            <div class="flex flex-row gap-4 whitespace-nowrap">
                @foreach($service->photos as $photo)
                    <div class="flex-shrink-0 snap-center">
                        <img src="{{ asset($photo) }}" 
                             class="w-72 md:w-96 h-72 md:h-96 object-cover rounded-lg shadow-md transition-all duration-300 hover:scale-105 hover:shadow-xl"
                             alt="Photo de {{ $service->{'name_' . app()->getLocale()} }}">
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Informations avec carte stylée -->
        <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="col-span-2 bg-gray-50 rounded-lg p-4 shadow-inner">
                <div class="flex items-center mb-4">
                    <span class="text-yellow-500 text-2xl mr-2">⭐</span>
                    <span class="text-gray-800 font-semibold">{{ number_format($service->rating, 1) }}/5</span>
                </div>
                <div class="space-y-3">
                    <p class="text-gray-700">
                        <span class="font-medium">Adresse :</span> {{ $service->address }}
                    </p>
                    @if($service->latitude && $service->longitude)
                    <p>
                        <a href="https://www.google.com/maps?q={{ $service->latitude }},{{ $service->longitude }}" 
                           target="_blank" 
                           class="text-indigo-600 hover:text-indigo-800 font-medium transition-colors flex items-center">
                            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            Voir sur Google Maps
                        </a>
                    </p>
                    @endif
                </div>
            </div>
        </div>

        <hr class="my-8 border-gray-200">

        <!-- Description avec mise en valeur -->
        <h2 class="text-2xl font-serif text-gray-900 mb-4 text-center md:text-left">Description</h2>
        <p class="text-gray-700 leading-relaxed bg-gray-50 p-4 rounded-lg shadow-inner">
            {{ $service->{'description_' . app()->getLocale()} }}
        </p>

        <!-- Call to Action -->
        <div class="mt-8 text-center">
            <a href="#" class="inline-block bg-amber-800 text-white font-semibold px-6 py-3 rounded-full hover:bg-amber-990 transition-colors duration-300">
                Avis
            </a>
        </div>
    </div>
</div>

<style>
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
    .animate-fade-in {
        animation: fadeIn 1s ease-in-out;
    }
</style>
@endsection