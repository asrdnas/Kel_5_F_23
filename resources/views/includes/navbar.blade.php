<!-- Nav -->
<style>
    .rounded-full {
        background-color: blue;
    }
</style>
<div class="sticky top-0 z-50 flex justify-between py-5 px-4 lg:px-14 bg-white shadow-sm">
    <div class="flex gap-10 w-full">
        <!-- Logo dan Menu -->
        <div class="flex items-center justify-between w-full lg:w-auto">
            <!-- Logo -->
            <a href="{{ route('landing') }}">
                <div class="flex items-center gap-2">
                    <img src="{{ asset('assets/img/flashnews.png') }}" alt="Logo" class="w-8 lg:w-10 rounded-full">
                    <p class="text-lg lg:text-xl font-bold">Flash News</p>
                </div>
            </a>
            <button class="lg:hidden text-primary text-2xl focus:outline-none" id="menu-toggle">
                ☰
            </button>
        </div>

        <!-- Menu Navigasi -->
        <div id="menu"
            class="hidden lg:flex flex-col lg:flex-row lg:items-center lg:gap-10 w-full lg:w-auto mt-5 lg:mt-0">
            <ul
                class="flex flex-col lg:flex-row items-start lg:items-center gap-4 font-medium text-base w-full lg:w-auto">
                {{-- Link ke Beranda --}}
                <li>
                    <a href="{{ route('landing') }}" class="{{ request()->is('/') ? 'text-primary' : '' }}"
                        style="transition: all 0.3s; padding: 0.25rem 0.5rem; border-radius: 0.700rem; {{ request()->is('/') ? 'color: #1D4ED8;' : '' }}"
                        onmouseover="this.style.backgroundColor='#1D4ED8'; this.style.color='white';"
                        onmouseout="this.style.backgroundColor=''; this.style.color='{{ request()->is('/') ? '#1D4ED8' : '' }}';">
                        Beranda
                    </a>
                </li>


                {{-- Link ke setiap kategori --}}
                @foreach (\App\Models\NewsCategory::all() as $category)
                    <li>
                        <a href="{{ route('news.category', $category->slug) }}"
                            class="{{ request()->is('news/category/' . $category->slug) ? 'text-primary' : '' }}"
                            style="transition: all 0.3s; padding: 0.25rem 0.5rem; border-radius: 0.700rem;"
                            onmouseover="this.style.backgroundColor='#1D4ED8'; this.style.color='white';"
                            onmouseout="this.style.backgroundColor=''; this.style.color='';">
                            {{ $category->title }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>


    </div>

    <!-- Search dan Login -->
    <div class="hidden lg:flex items-center gap-2 mt-4 lg:mt-0 w-full lg:w-auto relative">
        <div class="relative w-full lg:w-auto">
            <input type="text" placeholder="Cari berita..."
                style="background-color: white; border: 1px solid #1137f4; border-radius: 999px; padding: 8px 16px; padding-left: 32px; width: 250px; font-size: 14px; outline: none;"
                id="searchInput" />
            <!-- Icon Search -->
            <button onclick="performSearch()"
                class="absolute inset-y-0 left-3 flex items-center text-slate-400 bg-transparent border-none cursor-pointer">
                <img src="{{ asset('assets/img/search.png') }}" alt="search" class="w-4">
            </button>
        </div>

        <a href="/author/login"
            class="bg-primary px-8 py-2 rounded-full text-white font-semibold h-fit text-sm lg:text-base">
            Masuk
        </a>
    </div>
</div>
