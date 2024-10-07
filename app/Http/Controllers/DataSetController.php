<?php

namespace App\Http\Controllers;

use App\Models\DataSet;
use Illuminate\Http\Request;

class DataSetController extends Controller
{
    public function index()
    {
        return view('dataset.index',[
            'dataset' => DataSet::all()
            ]
        );
    }

    public function create()
    {
        return view('dataset.create');
    }

    public function store(Request $request )
    {
       $item =  $request->validate([
            'atribute1' => 'required|numeric',
            'atribute2' => 'required|numeric',
            'kategori' => 'required|string',
        ]);

        DataSet::create($item);
        return redirect()->route('dataset')->with('success', 'Dataset berhasil ditambahkan');
    }


    public function destroy()
    {
        DataSet::hapusSemuaData();
        return redirect()->back()->with('success', 'Semua data berhasil dihapus.');
    }
}