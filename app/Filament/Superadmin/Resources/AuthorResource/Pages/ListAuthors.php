<?php

namespace App\Filament\Superadmin\Resources\AuthorResource\Pages;

use App\Filament\Superadmin\Resources\AuthorResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAuthors extends ListRecords
{
    protected static string $resource = AuthorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
