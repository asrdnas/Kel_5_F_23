<?php

namespace App\Filament\Superadmin\Resources\NewsCategoryResource\Pages;

use App\Filament\Superadmin\Resources\NewsCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListNewsCategories extends ListRecords
{
    protected static string $resource = NewsCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
