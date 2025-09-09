<?php

namespace App\Filament\Resources\SubscribeTransactions\Pages;

use App\Filament\Resources\SubscribeTransactions\SubscribeTransactionResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSubscribeTransaction extends EditRecord
{
    protected static string $resource = SubscribeTransactionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
