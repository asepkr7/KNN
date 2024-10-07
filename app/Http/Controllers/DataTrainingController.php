<?php

namespace App\Http\Controllers;

use App\Models\DataSet;
use App\Models\DataTraining;
use Illuminate\Http\Request;

class DataTrainingController extends Controller
{
   public function index(Request $request)
{
    // $k = DataTraining::first()->k;
     $dataTrainings = DataTraining::all();
    $k = $request->input('k') ?? DataTraining::count();
   $selectedOption = $request->input('id'); // Ambil inputan option dari request

    $dataUji = DataTraining::where('id', $selectedOption)->get(); // Ambil data berdasarkan option yang dipilih
    $dataSets = DataSet::all();
    $neighbors = collect();

    // Hitung jarak antara data training dan data uji
    foreach ($dataSets as $dataSet) {
        foreach ($dataUji as $dataTraining) {
            $distance = $this->calculateDistance($dataSet, $dataTraining);
            $dataSet->distance = $distance;
            $neighbors->push($dataSet);
        }
    }

        // Urutkan data training berdasarkan jarak terdekat
        $neighbors = $neighbors->sortBy('distance')->take($k);

        $predictedCategory = $this->prediksi($neighbors);

        return view('datatraining.index', compact('dataUji', 'neighbors', 'predictedCategory', 'dataTrainings'));
    }

    private function calculateDistance($dataSet, $dataTraining)
    {
        $distance = sqrt(pow($dataSet->atribute1 - $dataTraining->datauji1, 2) + pow($dataSet->atribute2 - $dataTraining->datauji2, 2));
        return $distance;
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'datauji1' => 'required|numeric',
            'datauji2' => 'required|numeric',
        ]);

        DataTraining::create($validatedData);

        return redirect('/datatraining')->with('success', 'Data Training berhasil ditambahkan');
    }

public function prediksi($neighbors)
{
     $categoryVotes = [];

    foreach ($neighbors as $neighbor) {
        $category = $neighbor->kategori;

        if (isset($categoryVotes[$category])) {
            $categoryVotes[$category]++;
        } else {
            $categoryVotes[$category] = 1;
        }
    }

    arsort($categoryVotes);
    $predictedCategory = key($categoryVotes);

    return $predictedCategory;
}

    public function destroy()
    {
        DataTraining::truncate();

        return redirect()->back()->with('success', 'Semua data berhasil dihapus.');
    }
}