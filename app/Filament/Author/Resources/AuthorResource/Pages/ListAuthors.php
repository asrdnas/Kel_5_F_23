<?php

namespace App\Filament\Author\Resources\AuthorResource\Pages;

use App\Filament\Author\Resources\AuthorResource;
use Filament\Resources\Pages\ListRecords;

class ListAuthors extends ListRecords
{
    protected static string $resource = AuthorResource::class;

    protected function getHeaderActions(): array
    {
        return []; // Tidak menampilkan tombol apa pun
    }
}