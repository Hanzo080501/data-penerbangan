<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class ListData extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-list-bullet';
    protected static ?string $navigationGroup = 'Data';
    protected static string $view = 'filament.pages.list-data';
}
