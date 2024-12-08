<?php

namespace App\Filament\Resources\PasResource\Pages;

use App\Filament\Resources\PasResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPas extends EditRecord
{
    protected static string $resource = PasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
