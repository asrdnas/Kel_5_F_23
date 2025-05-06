<?php

namespace App\Filament\Widgets;

use App\Models\Author;
use App\Models\News;
use App\Models\NewsCategory;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatsOverviewAdmin extends BaseWidget
{
    protected int | string | array $columnSpan = 'full'; // Agar tampil penuh di dashboard

    protected function getCards(): array
    {
        return [
            Card::make('Total Authors', Author::count())
                ->icon('heroicon-o-user') // Ikon untuk penulis
                ->description('Jumlah penulis yang terdaftar'),
                
            Card::make('News Categories', NewsCategory::count())
                ->icon('heroicon-o-tag') // Ikon archive-box untuk kategori
                ->description('Jumlah kategori berita yang ada'),
                
            Card::make('News Items', News::count())
                ->icon('heroicon-o-newspaper') // Ikon untuk berita
                ->description('Jumlah artikel berita yang diterbitkan'),
        ];
    }
}
