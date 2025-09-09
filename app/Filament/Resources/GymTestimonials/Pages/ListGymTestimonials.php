<?php

namespace App\Filament\Resources\GymTestimonials\Pages;

use App\Filament\Resources\GymTestimonials\GymTestimonialResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListGymTestimonials extends ListRecords
{
    protected static string $resource = GymTestimonialResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
