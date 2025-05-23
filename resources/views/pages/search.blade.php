@extends('layout.app')

@section('title', 'Hasil Pencarian')

@section('content')
    <div class="flex flex-col px-4 lg:px-14 mt-10">
        @if ($results->isEmpty())
            <!-- Jika tidak ada hasil -->
            <p class="text-center text-lg font-semibold text-gray-500">
                Tidak ada hasil ditemukan untuk "{{ $query }}". Silakan coba kata kunci lain.
            </p>
        @else
            <!-- Jika ada hasil -->
            <div class="grid sm:grid-cols-1 gap-5 lg:grid-cols-4">
                @foreach ($results as $news)
                    <a href="{{ route('news.show', $news->slug) }}">
                        <div class="border border-slate-200 p-3 rounded-xl hover:border-primary hover:cursor-pointer transition duration-300 ease-in-out"
                            style="height: 100%;">

                            <!-- Kategori Berita -->
                            <div class="bg-primary text-white rounded-full w-fit px-5 py-1 font-normal ml-2 mt-2 text-sm absolute">
                                {{ $news->category->title ?? 'Tanpa Kategori' }}
                            </div>

                            <!-- Thumbnail Berita -->
                            <img src="{{ asset('storage/' . $news->thumbnail) }}" alt=""
                                class="w-full rounded-xl mb-3"
                                style="height: 150px; object-fit: cover;">

                            <!-- Judul & Tanggal Berita -->
                            <p class="font-bold text-base mb-1">{{ $news->title }}</p>
                            <p class="text-slate-400">{{ \Carbon\Carbon::parse($news->created_at)->format('d F Y') }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        @endif
    </div>
@endsection