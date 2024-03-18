<?php

namespace App\Filament\Resources\CvResource\Pages;

use Filament\Pages\Actions;
use App\Filament\Resources\CvResource;
use App\Models\cv;
use Illuminate\Support\Facades\Storage;
use Filament\Resources\Pages\EditRecord;

class EditCv extends EditRecord
{
    protected static string $resource = CvResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make()->after(
                function(cv $record) {
                    if($record->thumbnail){
                        Storage::disk('public')->delete($record->thumbnail);
                    }
                }
            ),
        ];
    }
}
