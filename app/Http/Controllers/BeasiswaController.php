<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Beasiswa;

class BeasiswaController extends Controller
{
    public function index()
    {
        $data['beasiswa'] = Beasiswa::orderBy('id','asc')->paginate(5);
        return view('beasiswa.index', $data);
    }

    public function getData(Request $request)
    {
        $res = Beasiswa::select("*")
                ->get();

        return response()->json($res);
    }

    public function create()
    {
        $response = Http::get('https://siswasekolah.herokuapp.com/api/siswa');
        $siswa = $response->json('data.data');
        return view('beasiswa.create', compact('siswa'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_beasiswa' => 'required',
            'jenis_beasiswa' => 'required',
        ]);
        $beasiswa = new Beasiswa;
        $beasiswa->nama_beasiswa = $request->nama_beasiswa;
        $beasiswa->jenis_beasiswa = $request->jenis_beasiswa;
        $beasiswa->save();
        return redirect()->route('beasiswa.index')->with('success','Beasiswa has been created successfully.');
    }

    public function show(Beasiswa $beasiswa)
    {
        return view('beasiswa.show',compact('beasiswa'));
    }

    public function edit(Beasiswa $beasiswa)
    {
        return view('beasiswa.edit',compact('beasiswa'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_beasiswa' => 'required',
            'jenis_beasiswa' => 'required',
        ]);
        $beasiswa = Beasiswa::find($id);
        $beasiswa->nama_beasiswa = $request->nama_beasiswa;
        $beasiswa->jenis_beasiswa = $request->jenis_beasiswa;
        $beasiswa->save();
        return redirect()->route('beasiswa.index')->with('success','Beasiswa Has Been updated successfully');
    }

    public function destroy(Beasiswa $beasiswa)
    {
        $beasiswa->delete();
        return redirect()->route('beasiswa.index')->with('success','Beasiswa has been deleted successfully');
    }
}
