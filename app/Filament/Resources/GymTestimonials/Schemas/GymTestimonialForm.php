<?php

namespace App\Filament\Resources\GymTestimonials\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class GymTestimonialForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                //
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),

                TextInput::make('occupation')
                    ->required()
                    ->maxLength(255),

                FileUpload::make('photo')
                    ->required()
                    ->image()
                    ->disk('public'),

                Select::make('gym_id')
                    ->relationship('gym', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),

                Textarea::make('message')
                    ->required(),

            ]);
    }
}
