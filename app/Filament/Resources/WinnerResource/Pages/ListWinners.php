<?php

namespace App\Filament\Resources\WinnerResource\Pages;

use App\Filament\Imports\WinnerImporter;
use App\Filament\Resources\WinnerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWinners extends ListRecords
{
    protected static string $resource = WinnerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ImportAction::make()
                ->importer(WinnerImporter::class),
            Actions\CreateAction::make(),
        ];
    }
}
