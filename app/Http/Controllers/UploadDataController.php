<?php

namespace App\Http\Controllers;

use App\Models\FlightData;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;

class UploadDataController extends Controller
{

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'serialNumber' => 'required|string',
            'registration' => 'required|string',
            'tableData' => 'required|json',
        ]);
        // dd($validated);

        // Proses data dari form
        $serialNumber = $validated['serialNumber'];
        $registration = $validated['registration'];

        // Proses data Handsontable
        $handsontableData = json_decode($validated['tableData'], true);

        // Variabel untuk menyimpan perhitungan
        $sumC = 0;
        $sumD = 0;
        $sumA = 0;

        // Menyimpan data dari baris terakhir untuk time_since_new dan cycle_since_new
        $lastRow = count($handsontableData) - 1;

        // Ambil nilai dari kolom E dan F pada baris terakhir untuk time_since_new
        $timeSinceNewHours = isset($handsontableData[$lastRow][4]) ? $handsontableData[$lastRow][4] : 0;
        $timeSinceNewMinutes = isset($handsontableData[$lastRow][5]) ? $handsontableData[$lastRow][5] : 0;

        // Ambil nilai dari kolom G pada baris terakhir untuk cycle_since_new
        $cycleSinceNew = isset($handsontableData[$lastRow][6]) ? (float)$handsontableData[$lastRow][6] : 0;

        // Proses data untuk perhitungan
        foreach ($handsontableData as $row) {
            $sumC += (float)$row[2]; // Kolom Hours
            $sumD += (float)$row[3]; // Kolom Minutes
            $sumA += isset($row[0]) ? (float)$row[0] : 0; // Kolom Landing
        }

        // Hitung flight hours dengan konversi menit ke jam
        $totalMinutes = $sumC * 60 + $sumD;
        $hours = floor($totalMinutes / 60);
        $minutes = $totalMinutes % 60;
        $flightHours = "{$hours} | {$minutes}";

        // Flight cycles sudah benar
        $flightCycles = $sumA;

        // Gabungkan time_since_new
        $timeSinceNew = "{$timeSinceNewHours} | {$timeSinceNewMinutes}";

        // Simpan data ke database
        FlightData::create([
            'serial_number' => $serialNumber,
            'registration' => $registration,
            'flight_hours' => $flightHours,
            'flight_cycles' => $flightCycles,
            'time_since_new' => $timeSinceNew,
            'cycle_since_new' => $cycleSinceNew,
        ]);

        // Feedback pesan sukses
        return redirect()->back()->with('message', 'Data berhasil disimpan.');
    }
}
