<?php

namespace App\Filament\Resources\GymTestimonials;

use App\Filament\Resources\GymTestimonials\Pages\CreateGymTestimonial;
use App\Filament\Resources\GymTestimonials\Pages\EditGymTestimonial;
use App\Filament\Resources\GymTestimonials\Pages\ListGymTestimonials;
use App\Filament\Resources\GymTestimonials\Schemas\GymTestimonialForm;
use App\Filament\Resources\GymTestimonials\Tables\GymTestimonialsTable;
use App\Models\GymTestimonial;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class GymTestimonialResource extends Resource
{
    protected static ?string $model = GymTestimonial::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Star;

    public static function form(Schema $schema): Schema
    {
        return GymTestimonialForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return GymTestimonialsTable::configure($table);
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
            'index' => ListGymTestimonials::route('/'),
            'create' => CreateGymTestimonial::route('/create'),
            'edit' => EditGymTestimonial::route('/{record}/edit'),
        ];
    }
}
