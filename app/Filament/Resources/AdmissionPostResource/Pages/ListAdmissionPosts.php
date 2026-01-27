<?php

namespace App\Filament\Resources\AdmissionPostResource\Pages;

use App\Filament\Resources\AdmissionPostResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAdmissionPosts extends ListRecords
{
    protected static string $resource = AdmissionPostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
