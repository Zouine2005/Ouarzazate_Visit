@extends('layouts.app')

@section('content')
<div class="container mx-auto flex justify-center items-center min-h-screen bg-gradient-to-br from-amber-100 to-orange-200">
    <div class="w-full max-w-md bg-white p-8 rounded-xl shadow-lg transform transition-all hover:shadow-xl">
        <!-- Titre avec icône -->
        <h2 class="text-2xl md:text-3xl font-bold text-center mb-6 text-amber-900 flex items-center justify-center">
            <svg class="w-6 h-6 mr-2 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
            </svg>
            Inscription
        </h2>

        <!-- Formulaire -->
        <form method="POST" action="{{ route('register') }}" class="space-y-6">
            @csrf
            <!-- Champ Nom complet -->
            <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                    <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </span>
                <input type="text" 
                       name="name" 
                       placeholder="Nom complet" 
                       class="w-full pl-10 p-3 border border-amber-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent bg-amber-50 text-gray-800 placeholder-gray-500" 
                       required>
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Champ Email -->
            <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                    <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </span>
                <input type="email" 
                       name="email" 
                       placeholder="Email" 
                       class="w-full pl-10 p-3 border border-amber-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent bg-amber-50 text-gray-800 placeholder-gray-500" 
                       required>
                @error('email

')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Champ Mot de passe -->
            <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                    <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0-1.1-.9-2-2-2s-2 .9-2 2 2 4 2 4m0 0c0 1.1.9 2 2 2s2-.9 2-2-2-4-2-4zm8-5v6a4 4 0 01-4 4H8a4 4 0 01-4-4V6a2 2 0 012-2h12a2 2 0 012 2z"></path>
                    </svg>
                </span>
                <input type="password" 
                       name="password" 
                       placeholder="Mot de passe" 
                       class="w-full pl-10 p-3 border border-amber-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent bg-amber-50 text-gray-800 placeholder-gray-500" 
                       required>
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Champ Confirmation Mot de passe -->
            <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                    <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5-2v6a4 4 0 01-4 4H8a4 4 0 01-4-4V6a2 2 0 012-2h12a2 2 0 012 2z"></path>
                    </svg>
                </span>
                <input type="password" 
                       name="password_confirmation" 
                       placeholder="Confirmer le mot de passe" 
                       class="w-full pl-10 p-3 border border-amber-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent bg-amber-50 text-gray-800 placeholder-gray-500" 
                       required>
                @error('password_confirmation')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Bouton d'inscription -->
            <button type="submit" 
                    class="w-full bg-amber-800 text-white p-3 rounded-lg hover:bg-amber-900 transition-colors duration-300 flex items-center justify-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0-1.1-.9-2-2-2s-2 .9-2 2 2 4 2 4m0 0c0 1.1.9 2 2 2s2-.9 2-2-2-4-2-4zm8-5v6a4 4 0 01-4 4H8a4 4 0 01-4-4V6a2 2 0 012-2h12a2 2 0 012 2z"></path>
                </svg>
                S'inscrire
            </button>
        </form>

        <!-- Lien vers la connexion -->
        <p class="mt-4 text-center text-gray-600">
            Déjà un compte ? 
            <a href="{{ route('login') }}" class="text-amber-600 hover:text-amber-800 font-medium transition-colors">
                Connectez-vous
            </a>
        </p>
    </div>
</div>
@endsection