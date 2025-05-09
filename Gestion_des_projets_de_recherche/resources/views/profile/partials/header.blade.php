@stack('bootstrap.css')

<nav class="bg-blue-200 shadow">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between h-16 items-center">
        <a href="/" class="text-xl font-bold text-gray-800">Finndeerr</a>

        <!-- Mobile menu button -->
        <div class="lg:hidden">
          <button id="menu-toggle" class="text-gray-800 focus:outline-none">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 6h16M4 12h16M4 18h16" />
            </svg>
          </button>
        </div>

        <!-- Menu items -->
        <div class="hidden lg:flex space-x-6 items-center" id="menu">
            @auth
            @if (Auth::user()->role === 'Admin')
                <a href="/admin/dashboard" class="text-gray-700 hover:text-blue-700">Admin</a>
            @elseif (Auth::user()->role === 'chercheur')
                <a href="/chercheur/dashboard" class="text-gray-700 hover:text-blue-700">Mon profil</a>
            @else
                <a href="/visiteur/dashboard" class="text-gray-700 hover:text-blue-700">Home</a>
            @endif
            @endauth
          <a href="/list/publication" class="text-gray-700 hover:text-blue-700">Publication</a>

          <!-- Dropdown -->
          <div class="relative group">
            <button class="text-gray-700 hover:text-blue-700 focus:outline-none">Dropdown</button>
            <div
              class="absolute hidden group-hover:block bg-white shadow-md mt-2 rounded w-48 z-10">
              <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Chercheur</a>
              <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Another action</a>
              <div class="border-t border-gray-200"></div>
              <a href="/list/publication" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Something else here</a>
            </div>
          </div>

          <a href="/list/chercheur" class="text-gray-700 hover:text-blue-700">Chercheur</a>

          <!-- Search form -->
          <form class="flex">
            <input type="search" placeholder="Search" aria-label="Search"
              class="px-2 py-1 rounded-l border border-gray-300 focus:outline-none focus:ring focus:border-blue-300">
            <button type="submit"
              class="px-3 py-1 bg-green-500 text-white rounded-r hover:bg-green-600">Search</button>
          </form>
          @guest
            <a class="btn btn-success bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700"
            href="{{ route('login') }}">
                {{ __('Se connecter') }}
            </a>
            @endguest
            @auth
            <!-- Si l'utilisateur est connecté -->
            <span class="text-gray-700">Bonjour, {{ Auth::user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                <button type="submit" class="text-red-600 hover:text-red-800">Déconnexion</button>
            </form>
            @endauth
        </div>
      </div>
    </div>
  </nav>

@stack('bootstrap.bundle.js')
