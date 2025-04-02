<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flex CV - Construtor de CVs</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Styles remain the same */
        .bg-[#34ebba] { background-color: #34ebba; }
        .hover\:bg-[#2cd9a8]:hover { background-color: #2cd9a8; }
        .mobile-menu { display: none; }
        .mobile-menu.active { display: block; }
        body { display: flex; flex-direction: column; min-height: 100vh; }
        .content { flex: 1; }
        .nav-form { display: flex; align-items: center; }
    </style>
</head>
<body class="bg-gray-100">
    <!-- Header -->
    <header class="bg-white shadow">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <!-- Logo points to Template Selection -->
            <a href="{{ route('cv.templates') }}" class="flex items-center">
                <img src="{{ asset('images/logo.png') }}" alt="Flex CV Logo" class="h-10 w-auto mr-2">
            </a>
            <!-- Desktop Navigation -->
            <nav class="hidden md:flex space-x-4 items-center">
                <a href="#" class="text-gray-700 hover:text-blue-600">Blog</a>
                <a href="#" class="text-gray-700 hover:text-blue-600">Preços</a>
                <a href="#" class="text-gray-700 hover:text-blue-600">Para Organizações</a>

                {{-- New "Criar CV" Button --}}
                <a href="{{ route('home') }}" class="text-green-600 font-semibold hover:text-green-800">Criar CV</a>

                @if (Auth::check())
                    <form method="POST" action="{{ route('logout') }}" onsubmit="return confirm('Tem certeza que deseja sair?');" class="nav-form">
                        @csrf
                        <button type="submit" class="text-gray-700 hover:text-blue-600">Sair</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-600">Entrar</a>
                @endif

                {{-- Renamed "Começar" to "Início" and linked to welcome page --}}
                <a href="{{ route('welcome') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Início</a>
            </nav>
            <!-- Mobile Burger Button -->
            <button id="mobile-menu-button" class="md:hidden focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
        </div>
        <!-- Mobile Navigation Menu -->
        <div id="mobile-menu" class="mobile-menu md:hidden bg-white">
            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-blue-600 hover:text-white">Blog</a>
            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-blue-600 hover:text-white">Preços</a>
            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-blue-600 hover:text-white">Para Organizações</a>

            {{-- New "Criar CV" Link (Mobile) --}}
            <a href="{{ route('home') }}" class="block px-4 py-2 text-green-600 font-semibold hover:bg-gray-100">Criar CV</a>

            @if (Auth::check())
                <form method="POST" action="{{ route('logout') }}" onsubmit="return confirm('Tem certeza que deseja sair?');" class="block px-4 py-2">
                    @csrf
                    <button type="submit" class="w-full text-left text-gray-700 hover:text-blue-600">Sair</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="block px-4 py-2 text-gray-700 hover:bg-blue-600 hover:text-white">Entrar</a>
            @endif

             {{-- Renamed "Começar" to "Início" (Mobile) --}}
            <a href="{{ route('welcome') }}" class="block px-4 py-2 bg-blue-600 text-white hover:bg-blue-700">Início</a>
        </div>
    </header>

    <!-- Main Content -->
    <main class="content">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <!-- Footer Logo points to Template Selection -->
                    <a href="{{ route('cv.templates') }}" class="flex items-center">
                        <img src="{{ asset('images/logo-white.png') }}" alt="Flex CV Logo" class="h-10 w-auto mr-2">
                    </a>
                    <p class="text-gray-400 mt-2">Construtor de CVs profissional...</p>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-4">Links Rápidos</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white">Blog</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Preços</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Para Organizações</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-4">Contacto</h3>
                    <p class="text-gray-400">Email: suporte@flexcv.com</p>
                    <p class="text-gray-400">Telefone: +258 84 123 4567</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script>
        // Mobile menu toggle (no changes needed here)
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        if (mobileMenuButton && mobileMenu) {
            mobileMenuButton.addEventListener('click', () => {
                mobileMenu.classList.toggle('active');
            });
        }

        // Form Specific JS (Should ideally be in the form view, but kept here based on previous code)
        // No changes needed here for the new flow logic
        const addExperienceButton = document.getElementById('add-experience');
        // ... rest of the add/remove JS ...
    </script>
</body>
</html>