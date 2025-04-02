<!-- Navbar Responsive -->
<nav class="bg-amber-100 shadow-md p-4 sticky top-0 z-20">
    <div class="container mx-auto flex justify-between items-center">
        <!-- Logo -->
        <a href="/" class="text-2xl font-bold text-amber-800 font-playfair">Mer7babik</a>

        <!-- Desktop Links -->
        <div class="hidden md:flex items-center space-x-6">
            <!--<a href="#categories" class="text-amber-800 hover:text-amber-600 transition duration-300 rounded-full">{{ __('messages.explorer') }}</a>-->

            @guest
                <a href="#" class="bg-white-800 text-balck px-4 py-2 rounded-full hover:bg-white-600 shadow transition">{{ __('messages.login') }}</a>
                <a href="#" class="bg-white-800 text-balck px-4 py-2 rounded-full hover:bg-white-600 shadow transition">{{ __('messages.register') }}</a>
            @else
                <a href="#" class="text-amber-800 hover:text-teal-600 transition duration-300">{{ __('messages.my_account') }}</a>
                <form method="POST" action="#" class="inline">@csrf
                    <button type="submit" class="text-amber-800 hover:text-teal-600 transition duration-300">{{ __('messages.logout') }}</button>
                </form>
            @endguest

            <!-- Language Selector -->
            <form action="{{ route('language.change') }}" method="POST" class="flex items-center ">
                @csrf
                <select name="language" onchange="this.form.submit()" class="border border-white bg-white-800 text-black px-4 py-2 rounded-full hover:bg-white-600 shadow transition">
                    <option value="fr" {{ app()->getLocale() == 'fr' ? 'selected' : '' }}>Français</option>
                    <option value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>English</option>
                    <option value="ar" {{ app()->getLocale() == 'ar' ? 'selected' : '' }}>العربية</option>
                    <option value="es" {{ app()->getLocale() == 'es' ? 'selected' : '' }}>Español</option>
                </select>
            </form>
        </div>

        <!-- Mobile Hamburger Icon -->
        <div class="md:hidden">
            <button id="menu-toggle" class="text-amber-800 focus:outline-none text-3xl">
                &#9776; <!-- Hamburger icon -->
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden bg-amber-50 p-6 space-y-4 md:hidden">
        <a href="#categories" class="block text-amber-800 hover:text-teal-600 transition">{{ __('messages.explorer') }}</a>

        @guest
            <a href="#" class="block bg-amber-800 text-white px-4 py-2 rounded-full hover:bg-amber-900 shadow transition">{{ __('messages.login') }}</a>
            <a href="#" class="block bg-amber-800 text-white px-4 py-2 rounded-full hover:bg-amber-900 shadow transition">{{ __('messages.register') }}</a>
        @else
            <a href="#" class="block text-amber-800 hover:text-teal-600 transition">{{ __('messages.my_account') }}</a>
            <form method="POST" action="#">@csrf
                <button type="submit" class="block text-amber-800 hover:text-teal-600 transition">{{ __('messages.logout') }}</button>
            </form>
        @endguest

        <form action="{{ route('language.change') }}" method="POST" class="mt-4">
            @csrf
            <select name="language" onchange="this.form.submit()" class="w-full border border-gray-300 bg-amber-800 text-white px-4 py-2 rounded-full hover:bg-amber-900 shadow transition">
                <option value="fr" {{ app()->getLocale() == 'fr' ? 'selected' : '' }}>Français</option>
                <option value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>English</option>
                <option value="ar" {{ app()->getLocale() == 'ar' ? 'selected' : '' }}>العربية</option>
                <option value="es" {{ app()->getLocale() == 'es' ? 'selected' : '' }}>Español</option>
            </select>
        </form>
    </div>
</nav>

<!-- Mobile Menu Toggle -->
<script>
    const menuToggle = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');

    menuToggle.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
</script>