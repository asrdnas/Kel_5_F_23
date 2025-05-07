<?php

namespace App\Filament\Superadmin\Resources\AuthorResource\Pages;

use App\Filament\Superadmin\Resources\AuthorResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAuthor extends CreateRecord
{
    protected static string $resource = AuthorResource::class;
}
