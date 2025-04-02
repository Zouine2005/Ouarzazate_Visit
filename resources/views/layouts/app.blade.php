<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mer7babik</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        .font-playfair { font-family: 'Playfair Display', serif; }
        .font-open-sans { font-family: 'Open Sans', sans-serif; }
        #map-container,
        .leaflet-container {
            z-index: 10 !important; /* Moins que la navbar */
        }
    </style>
</head>

<body class="bg-amber-50 font-open-sans antialiased">
@include('layouts.navbar')  <!-- Inclusion de la navbar -->

    @yield('content')  <!-- Contenu dynamique -->

@include('layouts.footer')  <!-- Inclusion du footer -->
</body>
</html>