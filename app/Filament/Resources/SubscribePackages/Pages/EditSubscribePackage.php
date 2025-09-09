<?php

namespace App\Filament\Resources\SubscribePackages\Pages;

use App\Filament\Resources\SubscribePackages\SubscribePackageResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSubscribePackage extends EditRecord
{
    protected static string $resource = SubscribePackageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
