<?php

namespace App\Filament\Author\Resources\NewsResource\Pages;

use App\Filament\Author\Resources\NewsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateNews extends CreateRecord
{
    protected static string $resource = NewsResource::class;
}
