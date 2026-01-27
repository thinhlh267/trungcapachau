<?php

namespace App\Filament\Resources\AdmissionPostResource\Pages;

use App\Filament\Resources\AdmissionPostResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAdmissionPost extends EditRecord
{
    protected static string $resource = AdmissionPostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
