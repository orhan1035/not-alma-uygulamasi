<nav x-data="{ open: false }" class="bg-yellow-300 border-b border-yellow-400">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between h-16 items-center">

      <!-- Sol taraf: Emoji Logo + Nav Linkler -->
      <div class="flex items-center space-x-6">
        <!-- Emoji Logo -->
        <div class="shrink-0 flex items-center text-4xl select-none">
          <a href="{{ route('dashboard') }}" aria-label="Dashboard">
            📒
          </a>
        </div>

        <!-- Navigation Links -->
        <div class="flex space-x-6">
          <x-nav-link :href="route('home')" :active="request()->routeIs('home')" class="text-gray-900 hover:text-yellow-700">
            {{ __('MyNotes') }}
          </x-nav-link>

          @auth
            <x-nav-link :href="route('notes.index')" :active="request()->routeIs('notes.*')" class="text-gray-900 hover:text-yellow-700">
              {{ __('Notlarım') }}
            </x-nav-link>
          @endauth
        </div>
      </div>

      <!-- Sağ taraf: Settings Dropdown -->
      <div class="ml-auto relative" x-data="{ dropdownOpen: false }">
        <button @click="dropdownOpen = !dropdownOpen" 
          class="inline-flex items-center space-x-2 px-3 py-2 border border-transparent text-sm font-medium rounded-md text-gray-800 bg-yellow-200 hover:bg-yellow-400 focus:outline-none transition ease-in-out duration-150"
          aria-haspopup="true" :aria-expanded="dropdownOpen.toString()">
          @auth
            <div>{{ Auth::user()->name }}</div>
          @else
            <div>Misafir</div>
          @endauth

          <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" aria-hidden="true">
            <path fill-rule="evenodd"
              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
              clip-rule="evenodd" />
          </svg>
        </button>

        <!-- Dropdown Menü -->
        <div x-show="dropdownOpen" @click.away="dropdownOpen = false"
          x-transition:enter="transition ease-out duration-200"
          x-transition:enter-start="opacity-0 translate-y-1"
          x-transition:enter-end="opacity-100 translate-y-0"
          x-transition:leave="transition ease-in duration-150"
          x-transition:leave-start="opacity-100 translate-y-0"
          x-transition:leave-end="opacity-0 translate-y-1"
          class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-50"
          role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1"
          style="display: none;"
        >
          <div class="py-1" role="none">
            @auth
              <div class="px-4 py-2 border-b border-gray-200">
                <p class="text-gray-900 font-semibold truncate">{{ Auth::user()->name }}</p>
                <p class="text-gray-500 text-sm truncate">{{ Auth::user()->email }}</p>
              </div>

              <a href="{{ route('profile.edit') }}" 
                 class="block px-4 py-2 text-gray-700 hover:bg-yellow-400 hover:text-white transition" 
                 role="menuitem" tabindex="-1" id="user-menu-item-0">
                {{ __('Profil') }}
              </a>

              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" 
                  class="w-full text-left block px-4 py-2 text-gray-700 hover:bg-yellow-400 hover:text-white transition" 
                  role="menuitem" tabindex="-1" 
                  onclick="event.preventDefault(); this.closest('form').submit();">
                  {{ __('Çıkış Yap') }}
                </button>
              </form>
            @else
              <a href="{{ route('login') }}" 
                 class="block px-4 py-2 text-gray-700 hover:bg-yellow-400 hover:text-white transition" 
                 role="menuitem" tabindex="-1">
                {{ __('Giriş Yap') }}
              </a>
              <a href="{{ route('register') }}" 
                 class="block px-4 py-2 text-gray-700 hover:bg-yellow-400 hover:text-white transition" 
                 role="menuitem" tabindex="-1">
                {{ __('Kayıt Ol') }}
              </a>
            @endauth
          </div>
        </div>
      </div>

      <!-- Hamburger (Responsive) -->
      <div class="-mr-2 flex items-center sm:hidden">
        <button @click="open = !open"
          class="inline-flex items-center justify-center p-2 rounded-md text-gray-700 hover:text-yellow-900 hover:bg-yellow-400 focus:outline-none focus:bg-yellow-400 focus:text-yellow-900 transition">
          <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
            <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round"
              stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
              stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
    </div>
  </div>

  <!-- Responsive Navigation Menu -->
  <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
    <div class="pt-2 pb-3 space-y-1">
      <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">
        {{ __('Dashboard') }}
      </x-responsive-nav-link>

      @auth
      <x-responsive-nav-link :href="route('notes.index')" :active="request()->routeIs('notes.*')">
        {{ __('Notlarım') }}
      </x-responsive-nav-link>
      @endauth
    </div>

    <div class="pt-4 pb-1 border-t border-yellow-400">
      @auth
        <div class="px-4">
          <div class="font-medium text-base text-gray-800 truncate">{{ Auth::user()->name }}</div>
          <div class="font-medium text-sm text-gray-500 truncate">{{ Auth::user()->email }}</div>
        </div>

        <div class="mt-3 space-y-1">
          <x-responsive-nav-link :href="route('profile.edit')">
            {{ __('Profil') }}
          </x-responsive-nav-link>

          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
              {{ __('Çıkış Yap') }}
            </x-responsive-nav-link>
          </form>
        </div>
      @else
        <div class="mt-3 space-y-1">
          <x-responsive-nav-link :href="route('login')">
            {{ __('Giriş Yap') }}
          </x-responsive-nav-link>
          <x-responsive-nav-link :href="route('register')">
            {{ __('Kayıt Ol') }}
          </x-responsive-nav-link>
        </div>
      @endauth
    </div>
  </div>
</nav>
