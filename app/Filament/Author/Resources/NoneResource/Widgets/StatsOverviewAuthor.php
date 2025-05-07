<?php

namespace App\Filament\Author\Resources\NoneResource\Widgets;

use App\Models\News;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use Illuminate\Support\Facades\Auth;  // Pastikan untuk menggunakan Auth

class StatsOverviewAuthor extends BaseWidget
{
    protected int | string | array $columnSpan = 'full'; // Agar tampil penuh di dashboard
    
    protected function getStats(): array
    {
        // Ambil jumlah berita yang dibuat oleh author yang sedang login
        $newsCount = News::where('author_id', Auth::id())->count();

        return [
            Card::make('News Items', $newsCount)  // Menampilkan jumlah berita untuk penulis yang login
                ->icon('heroicon-o-newspaper')  // Ikon untuk berita
                ->description('Jumlah artikel berita yang diterbitkan oleh penulis ini'),
        ];
    }
}
