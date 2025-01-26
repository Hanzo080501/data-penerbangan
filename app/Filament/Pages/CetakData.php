<?php

namespace App\Filament\Pages;

use Filament\Actions\Action;
use Filament\Pages\Page;

class CetakData extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'Cetak Data';
    protected static ?string $navigationGroup = 'Data';
    public function getCachedHeaderActions(): array
    {
        return [
            Action::make('print')
                ->label(__('Print'))
                ->icon('heroicon-s-printer')
                ->requiresConfirmation()
                ->url(route('print.data')),
        ];
    }
    protected static string $view = 'filament.pages.cetak-data';
}
