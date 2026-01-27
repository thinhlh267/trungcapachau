<?php

namespace App\Filament\Resources\AdmissionCategoryResource\Pages;

use App\Filament\Resources\AdmissionCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAdmissionCategory extends EditRecord
{
    protected static string $resource = AdmissionCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
