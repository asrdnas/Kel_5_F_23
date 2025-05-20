@extends('layout.app')

@section('title', 'Flash News | Lebih Cepat, Lebih Jelas!')

@section('content')
    <!-- swiper -->
    <div class="swiper mySwiper mt-9">
        <div class="swiper-wrapper">
            @foreach ($banners as $banner)
                <div class="swiper-slide">
                    <a href="{{ route('news.show', $banner->news->slug) }}" class="block">
                        <div class="relative flex flex-col gap-1 justify-end p-3 h-72 rounded-xl bg-cover bg-center overflow-hidden"
                            style="background-image: url('{{ asset('storage/' . $banner->news->thumbnail) }}')">
                            <!-- Gradient background -->
                            <div
                                class="absolute inset-x-0 bottom-0 h-full bg-gradient-to-t from-black/60 to-transparent pointer-events-none z-0 rounded-b-xl">
                            </div>

                            <!-- Content -->
                            <div class="relative z-10 text-white">
                                <div class="bg-primary text-white text-xs rounded-lg w-fit px-3 py-1 font-normal mt-3">
                                    {{ $banner->news->category->title ?? 'Tanpa Kategori' }}
                                </div>
                                <p class="text-xl font-semibold mt-1">
                                    {{ $banner->news->title ?? 'Judul Tidak Ada' }}
                                </p>
                                <div class="flex items-center gap-2 mt-1">
                                    <img src="{{ asset('storage/' . $banner->news->author->avatar) }}" alt="avatar"
                                        class="w-5 rounded-full object-cover">
                                    <p class="text-xs">
                                        {{ $banner->news->author->name }}
                                    </p>
                                </div>
                            </div>

                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Berita Unggulan -->
    <div class="flex flex-col px-14 mt-10 ">
        <div class="flex flex-col md:flex-row justify-between items-center w-full mb-6">
            <div class="font-bold text-2xl text-center md:text-left">
                <p>Berita Sorotan</p>
            </div>
        </div>
        <div class="grid sm:grid-cols-1 gap-5 lg:grid-cols-4">
            @foreach ($featureds as $featured)
                <a href="{{ route('news.show', $featured->slug) }}">
                    <div class="border border-slate-200 p-3 rounded-xl hover:border-primary hover:cursor-pointer transition duration-300 ease-in-out"
                        style="height: 100%;">
                        <div class="bg-primary text-white rounded-full w-fit px-5 py-1 font-normal ml-2 mt-2 text-sm absolute">
                            {{ $featured->category->title }}
                        </div>
                        <img src="{{ asset('storage/' . $featured->thumbnail) }}" alt="" class="w-full rounded-xl mb-3"
                            style="height: 150px; object-fit: cover;">
                        <p class="font-bold text-base mb-1">{{ $featured->title }}</p>
                        <p class="text-slate-400">{{ \Carbon\Carbon::parse($featured->created_at)->format('d F Y') }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

    <!-- Berita Terbaru -->
    <div class="flex flex-col px-4 md:px-10 lg:px-14 mt-10">
        <div class="flex flex-col md:flex-row w-full mb-6">
            <div class="font-bold text-2xl text-center md:text-left">
                <p>Berita Terbaru</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-12 gap-5">
            <!-- Berita Utama -->
            <div
                class="relative col-span-7  lg:row-span-3 border border-slate-200 p-3 rounded-xl hover:border-primary hover:cursor-pointer">
                <a href="{{ route('news.show', $news[0]->slug) }}">
                    <div class="bg-primary text-white rounded-full w-fit px-4 py-1 font-normal ml-5 mt-5 absolute">
                        {{ $news[0]->category->title }}
                    </div>
                    <img src="{{ asset('storage/' . $news[0]->thumbnail) }}" alt="berita1" class="rounded-2xl w-full"
                        style="height: 650px; object-fit: cover;">
                    <p class="font-bold text-xl mt-3">
                        {{ $news[0]->title }}
                    </p>
                    <p class="text-slate-400 text-base mt-1">
                        {!! \Str::limit($news[0]->content, 100) !!}
                    </p>
                    <p class="text-slate-400 text-base mt-1">
                        {{ $news[0]->created_at->format('d F Y') }}
                    </p>
                </a>
            </div>

            <!-- Berita Tambahan -->
            @foreach ($news->skip(1) as $news)
                <a href="{{ route('news.show', $news->slug) }}"
                    class="relative col-span-5 flex flex-col md:flex-row gap-3 border border-slate-200 p-3 rounded-xl hover:border-primary hover:cursor-pointer">
                    <!-- Bungkus gambar dan badge di dalam relative wrapper -->
                    <div class="relative w-full md:w-[250px]">
                        <div
                            class="bg-primary text-white rounded-full w-fit px-4 py-1 font-normal ml-2 mt-2 absolute text-sm z-10">
                            {{ $news->category->title }}
                        </div>
                        <img src="{{ asset('storage/' . $news->thumbnail) }}" alt="berita2" class="rounded-xl w-full"
                            style="height: 190px; object-fit: cover;">
                    </div>
                    <div class="mt-2 md:mt-0">
                        <p class="font-semibold text-lg">{{ $news->title }}</p>
                        <p class="text-slate-400 mt-3 text-sm font-normal">
                            {!! \Str::limit($news->content, 100) !!}
                        </p>
                    </div>
                </a>
            @endforeach

        </div>
    </div>


    <!-- Author -->
    <div class="flex flex-col px-4 md:px-10 lg:px-14 mt-10">
        <div class="flex flex-col md:flex-row justify-between items-center w-full mb-6">
            <div class="font-bold text-2xl text-center md:text-left">
                <p>Author</p>
            </div>
        </div>
        <div class="grid grid-cols-1  sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
            <!-- Author 1 -->
            @foreach ($authors as $author)
                <a href="{{ route('author.show', $author->username) }}">
                    <div
                        class="flex flex-col items-center border border-slate-200 px-4 py-8 rounded-2xl hover:border-primary hover:cursor-pointer">
                        <img src="{{ asset('storage/' . $author->avatar)}}" alt="" class="rounded-full w-24 h-24">
                        <p class="font-bold text-xl mt-4">{{$author->name}}</p>
                        <p class="text-slate-400">{{ $author->news->count() }} Berita</p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
    <div class="flex flex-col px-14 mt-10 "></div>
@endsection