<?php

namespace App\Livewire;

use App\Models\FlightData;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;
use Livewire\Component;

class CetakPDF extends Component
{
    public function cetakPDF()
    {
        // dd('cetak');
        $data = FlightData::all();
        $pdf = Pdf::loadView('pdf.print', compact('data'));
        return $pdf->stream();
    }
    public function render()
    {
        $data = FlightData::all();
        return view('livewire.cetak-p-d-f', compact('data'));
    }
}
