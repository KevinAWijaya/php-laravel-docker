<?php

namespace App\Filament\Resources\GymTestimonials\Pages;

use App\Filament\Resources\GymTestimonials\GymTestimonialResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditGymTestimonial extends EditRecord
{
    protected static string $resource = GymTestimonialResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
