<?php

namespace App\Filament\Resources\SubscribePackages;

use App\Filament\Resources\SubscribePackages\Pages\CreateSubscribePackage;
use App\Filament\Resources\SubscribePackages\Pages\EditSubscribePackage;
use App\Filament\Resources\SubscribePackages\Pages\ListSubscribePackages;
use App\Filament\Resources\SubscribePackages\Schemas\SubscribePackageForm;
use App\Filament\Resources\SubscribePackages\Tables\SubscribePackagesTable;
use App\Models\SubscribePackage;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SubscribePackageResource extends Resource
{
    protected static ?string $model = SubscribePackage::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Ticket;

    public static function form(Schema $schema): Schema
    {
        return SubscribePackageForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SubscribePackagesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSubscribePackages::route('/'),
            'create' => CreateSubscribePackage::route('/create'),
            'edit' => EditSubscribePackage::route('/{record}/edit'),
        ];
    }
}
