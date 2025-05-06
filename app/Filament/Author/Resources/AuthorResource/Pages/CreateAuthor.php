<?php

namespace App\Filament\Author\Resources\AuthorResource\Pages;

use App\Filament\Author\Resources\AuthorResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAuthor extends CreateRecord
{
    protected static string $resource = AuthorResource::class;
}
