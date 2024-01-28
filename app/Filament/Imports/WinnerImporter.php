<?php

namespace App\Filament\Imports;

use App\Models\Winner;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class WinnerImporter extends Importer
{
    protected static ?string $model = Winner::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('municipality')
                ->relationship(resolveUsing: 'name')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('event')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('player')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('medal')
                ->requiredMapping()
                ->rules(['required']),
        ];
    }

    public function resolveRecord(): ?Winner
    {
        // return Winner::firstOrNew([
        //     // Update existing records, matching them by `$this->data['column_name']`
        //     'email' => $this->data['email'],
        // ]);

        return new Winner();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your winner import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
