<?php

namespace App\Filament\Resources\SubscribePackages\Pages;

use App\Filament\Resources\SubscribePackages\SubscribePackageResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSubscribePackages extends ListRecords
{
    protected static string $resource = SubscribePackageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
