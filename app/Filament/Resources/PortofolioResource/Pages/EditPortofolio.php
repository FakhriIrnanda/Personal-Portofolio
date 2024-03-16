<?php

namespace App\Filament\Resources\PortofolioResource\Pages;

use App\Models\Portofolio;
use Filament\Pages\Actions;
use Illuminate\Support\Facades\Storage;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\PortofolioResource;

class EditPortofolio extends EditRecord
{
    protected static string $resource = PortofolioResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make()->after(
                function(Portofolio $record) {
                    if($record->thumbnail){
                        Storage::disk('public')->delete($record->thumbnail);
                    }
                }
            ),
        ];
    }
}
