@extends('layouts.app')

<style>
    /* Style global */
.container {
    max-width: 1200px;
    margin: 0 auto;
}

/* Barre de recherche et filtres */
.filter-container {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: space-between;
    background: #f8f9fa;
    padding: 15px;
    border-radius: 8px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
}

.search-bar {
    flex: 1;
    margin-right: 10px;
    padding: 10px;
    font-size: 16px;
    border: 2px solid #ddd;
    border-radius: 6px;
}

.filter-checkbox {
    margin-left: 10px;
}

/* Conteneur des attractions */
.attractions-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 20px;
    margin-top: 20px;
}

/* Cartes des attractions */
.attraction-card {
    background: #fff;
    border-radius: 10px;
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.15);
}

.attraction-card:hover {
    transform: scale(1.03);
    box-shadow: 0px 10px 25px rgba(0, 0, 0, 0.2);
}

/* Image des attractions */
.card-img-top {
    width: 100%;
    height: 220px;
    object-fit: cover;
}

/* Corps de la carte */
.card-body {
    padding: 15px;
}

.card-title {
    font-size: 18px;
    font-weight: bold;
    color: #333;
}

.card-body p {
    margin: 5px 0;
    font-size: 14px;
    color: #555;
}

/* Bouton vidéo */
.btn-primary {
    display: block;
    text-align: center;
    background: #007bff;
    color: white;
    padding: 10px;
    border-radius: 5px;
    text-decoration: none;
    margin-top: 10px;
    transition: background 0.3s;
}

.btn-primary:hover {
    background: #0056b3;
}

h1 {
    font-size: 32px;
    margin-bottom: 20px;
    color: #963D19;
    text-align: center;
    padding: 10px 15px;
    border-radius: 8px;
    text-decoration: underline;
    text-decoration-color: #963D19;
    text-decoration-thickness: 2px;
    text-underline-offset: 5px;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
    font-family: 'Playfair Display', serif;
}

/* Effet responsive */
@media (max-width: 768px) {
    .filter-container {
        flex-direction: column;
        align-items: stretch;
    }

    .search-bar {
        margin-bottom: 10px;
        width: 100%;
    }

    .attractions-container {
        grid-template-columns: 1fr;
    }
    h1 {
        font-size: 26px;
        padding: 10px 15px;
    }
}


</style>

@section('content')
    <div class="container mt-5">
        <h1>{{ $category->{'name_' . app()->getLocale()} }}</h1>

        <!-- Barre de recherche et filtres -->
        <div class="filter-container">
            <input type="text" id="searchInput" class="form-control search-bar" placeholder="{{ __('messages.Rechercher_une_attraction') }}">
            
            <div>
                <input type="checkbox" id="topRated" class="filter-checkbox">
                <label for="topRated">{{ __('messages.Bien_noté') }}</label>

                <input type="checkbox" id="nearest" class="filter-checkbox">
                <label for="nearest">{{ __('messages.Plus_proche_de_moi') }}</label>
            </div>
        </div>

        <!-- Liste des attractions -->
        <div class="attractions-container" id="attractionsList">
            @foreach($category->services as $service)
                <div class="card attraction-card animate__fadeInUp" 
                     data-name="{{ $service->{'name_' . app()->getLocale()} }}" 
                     data-rating="{{ $service->rating }}"  
                     data-localization="{{ $service->latitude }},{{ $service->longitude }}">
                    <img src="{{ asset($service->photo) }}" class="card-img-top" alt="{{ $service->{'name_' . app()->getLocale()} }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $service->{'name_' . app()->getLocale()} }}</h5>
                        <p><strong>{{ __('messages.Adresse') }} :</strong> {{ $service->address }}</p>
                        <p><strong>{{ __('messages.Note') }} :</strong> ⭐{{ $service->rating }}</p>
                        @if($service->video)
                            <a href="{{ $service->video }}" target="_blank" class="btn btn-primary">{{ __('messages.Cliquez pour découvrir') }}</a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.getElementById("searchInput");
    const topRated = document.getElementById("topRated");
    const nearest = document.getElementById("nearest");
    const attractionsList = document.getElementById("attractionsList");
    let userLocation = null;

    function getUserLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(position => {
                userLocation = [position.coords.latitude, position.coords.longitude];
                console.log("Localisation utilisateur :", userLocation);
                filterAttractions();
            }, error => {
                console.error("Erreur de géolocalisation", error);
                alert("Impossible d'obtenir votre position.");
            });
        } else {
            alert("Votre navigateur ne supporte pas la géolocalisation.");
        }
    }

    // Récupérer la position de l'utilisateur au chargement
    getUserLocation();

    function filterAttractions() {
    let searchText = searchInput.value.toLowerCase().trim();
    let allAttractions = Array.from(document.querySelectorAll(".attraction-card"));

    let filteredAttractions = allAttractions.filter(card => {
        let name = card.dataset.name.toLowerCase();
        let rating = parseFloat(card.dataset.rating);
        let isTopRated = topRated.checked ? rating >= 4.5 : true;
        let isMatchingSearch = name.includes(searchText);
        return isMatchingSearch && isTopRated;
    });

    // Trier par distance si "Plus proche" est activé
    if (nearest.checked && userLocation) {
        filteredAttractions = filteredAttractions
            .map(card => {
                let distance = getDistance(userLocation, card.dataset.localization);
                return { card, distance };
            })
            .sort((a, b) => a.distance - b.distance) // Trie du plus proche au plus éloigné
            .map(item => {
                let cardBody = item.card.querySelector(".card-body");
                let existingDistanceText = cardBody.querySelector(".distance-info");
                if (existingDistanceText) existingDistanceText.remove(); // Évite l'ajout multiple

                let distanceText = document.createElement("p");
                distanceText.classList.add("distance-info");
                distanceText.innerHTML = `<strong></strong> ${item.distance.toFixed(2)} km`;
                cardBody.appendChild(distanceText);

                return item.card;
            });

        // **Mise à jour de l'affichage** : On réorganise l'ordre dans le DOM
        attractionsList.innerHTML = ""; // On vide la liste
        filteredAttractions.forEach(card => attractionsList.appendChild(card)); // Ajout dans le bon ordre
    }

    // Masquer toutes les cartes puis afficher celles qui correspondent au filtre
    allAttractions.forEach(card => card.style.display = "none");
    filteredAttractions.forEach(card => card.style.display = "block");
}


    function getDistance(userLoc, placeLoc) {
        if (!placeLoc) return Infinity;

        let [lat1, lon1] = userLoc;
        let [lat2, lon2] = placeLoc.split(',').map(parseFloat);

        if (isNaN(lat2) || isNaN(lon2)) return Infinity;

        let R = 6371; // Rayon de la Terre en km
        let dLat = (lat2 - lat1) * Math.PI / 180;
        let dLon = (lon2 - lon1) * Math.PI / 180;
        let a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
                Math.cos(lat1 * Math.PI / 180) * Math.cos(lat2 * Math.PI / 180) *
                Math.sin(dLon / 2) * Math.sin(dLon / 2);
        let c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
        let distance = R * c; // Distance en km

        console.log(`Distance de (${lat1}, ${lon1}) à (${lat2}, ${lon2}) : ${distance} km`);
        return distance;
    }

    // Ajouter les écouteurs d'événements
    searchInput.addEventListener("input", filterAttractions);
    topRated.addEventListener("change", filterAttractions);
    nearest.addEventListener("change", filterAttractions);
});
</script>
@endsection
