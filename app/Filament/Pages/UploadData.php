<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class UploadData extends Page
{
    protected static ?string $navigationGroup = 'Data';
    protected static ?string $navigationIcon = 'heroicon-o-document-arrow-up';
    protected static ?string $navigationLabel = 'Upload Data';
    protected static string $view = 'filament.pages.upload-data';
}
