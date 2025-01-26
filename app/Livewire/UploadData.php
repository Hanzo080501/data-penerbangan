<?php

namespace App\Livewire;

use Filament\Notifications\Notification;
use Livewire\Component;

class UploadData extends Component
{
    public function render()
    {
        if (session()->has('message')) {
            Notification::make()
                ->success()
                ->title('Success')
                ->body(session('message'))
                ->send();
        }
        return view('livewire.upload-data');
    }
}
