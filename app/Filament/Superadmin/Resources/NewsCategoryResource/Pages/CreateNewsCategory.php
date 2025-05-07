<?php

namespace App\Filament\Superadmin\Resources\NewsCategoryResource\Pages;

use App\Filament\Superadmin\Resources\NewsCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateNewsCategory extends CreateRecord
{
    protected static string $resource = NewsCategoryResource::class;
}
