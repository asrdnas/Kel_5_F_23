<?php

namespace App\Filament\Author\Resources\AuthorResource\Pages;

use App\Filament\Author\Resources\AuthorResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAuthor extends EditRecord
{
    protected static string $resource = AuthorResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}
