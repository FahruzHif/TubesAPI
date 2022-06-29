<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Beasiswa;
use App\Models\Daftar;

class DaftarController extends Controller
{
    public function index()
    {
        $data['daftar'] = Daftar::orderBy('id','asc')->paginate(5);

        return view('daftar.index', $data);
    }

    public function getData(Request $request)
    {
        $res = Daftar::select("*")
                // ->where("alamat_siswa","LIKE","%{$request->term}%")
                ->get();

        return response()->json($res);
    }

    public function create()
    {
        $beasiswas = Beasiswa::get();
        $response = Http::get('https://njajalapi.herokuapp.com/api/siswa');
        $siswa = $response->json('data.data');

        return view('daftar.create', compact('siswa','beasiswas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_beasiswa' => 'required',
            'jenis_beasiswa' => 'required',
            'nama' => 'required',
            'nis' => 'required',
        ]);
        $daftar = new Daftar;
        $daftar->nama_beasiswa = $request->nama_beasiswa;
        $daftar->jenis_beasiswa = $request->jenis_beasiswa;
        $daftar->nama = $request->nama;
        $daftar->nis = $request->nis;
        $daftar->save();
        return redirect()->route('daftar.index')->with('success','Daftar Beasiswa telah terbuat!.');
    }

    public function show(Daftar $daftar)
    {
        return view('daftar.show',compact('daftar'));
    }

    public function edit(Daftar $daftar)
    {
        return view('daftar.edit',compact('daftar'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_beasiswa' => 'required',
            'jenis_beasiswa' => 'required',
            'tahun_beasiswa' => 'required',
            'nama' => 'required',
            'nis' => 'required',
        ]);
        $daftar = Daftar::find($id);
        $daftar->nama_beasiswa = $request->nama_beasiswa;
        $daftar->jenis_beasiswa = $request->jenis_beasiswa;
        $daftar->nama = $request->nama;
        $daftar->nis = $request->nis;
        $daftar->save();
        return redirect()->route('daftar.index')->with('success','Daftar Beasiswa berhasil diUpdate!');
    }

    public function destroy(Daftar $daftar)
    {
        $daftar->delete();
        return redirect()->route('daftar.index')->with('success','Daftar Beasiswa telah terhapus!');
    }
}
