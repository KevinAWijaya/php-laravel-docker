<?php

namespace App\Filament\Resources\Facilities\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class FacilityForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                //
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),

                FileUpload::make('thumbnail')
                    ->required()
                    ->image()
                    ->disk('public'),

                Textarea::make('about')
                    ->required(),

                Select::make('is_open')
                    ->required()
                    ->options([
                        true => 'Open',
                        false => 'Maintenance',
                    ]),
            ]);
    }
}
