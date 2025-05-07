<?php

namespace App\Filament\Superadmin\Resources\NewsResource\Pages;

use App\Filament\Superadmin\Resources\NewsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateNews extends CreateRecord
{
    protected static string $resource = NewsResource::class;
}
