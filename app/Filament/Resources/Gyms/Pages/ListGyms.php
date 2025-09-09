<?php

namespace App\Filament\Resources\Gyms\Pages;

use App\Filament\Resources\Gyms\GymResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListGyms extends ListRecords
{
    protected static string $resource = GymResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
