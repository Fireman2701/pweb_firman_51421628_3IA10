<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMahasiswaRequest;
use App\Http\Requests\UpdateMahasiswaRequest;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $cari = $request->query('cari');

        // Jika parameter pencarian tidak kosong
        if (!empty($cari)) {
            // Melakukan pencarian berdasarkan nama atau npm
            $mahasiswa = Mahasiswa::where('fullname', 'like', "%$cari%")
                ->orWhere('npm', 'like', "%$cari%")
                ->get();

            return view('mahasiswa.data')->with(['mahasiswa' => $mahasiswa, 'cari' => $cari]);
        }

        // Jika tidak ada parameter pencarian, tampilkan semua data
        $mahasiswa = Mahasiswa::all();
        return view('mahasiswa.data')->with(['mahasiswa' => $mahasiswa, 'cari' => $cari]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMahasiswaRequest $request)
    {
        $validate = $request->validated();

        $mahasiswa = new Mahasiswa;
        $mahasiswa -> npm = $request ->npm;
        $mahasiswa -> fullname = $request ->fullname;
        $mahasiswa -> nickname = $request ->nickname;
        $mahasiswa -> class = $request ->class;
        $mahasiswa -> gender = $request -> gender;
        $mahasiswa -> address= $request ->address;
        $mahasiswa -> save();


        return redirect('mahasiswa')->with('msg', 'Data berhasil disimpan');

    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.formedit')->with([
            'npm' => $mahasiswa->npm,
            'fullname' => $mahasiswa->fullname,
            'nickname' => $mahasiswa->nickname,
            'class' => $mahasiswa->class,
            'gender' => $mahasiswa->gender,
            'address' => $mahasiswa->address
        ]);
    }
    

    /**
     * Show the form for editing the specified resource.
     */


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMahasiswaRequest $request, Mahasiswa $mahasiswa )
    {
        
        $data = $mahasiswa;
        $data -> npm = $request ->npm;
        $data -> fullname = $request ->fullname;
        $data -> nickname = $request ->nickname;
        $data -> class = $request ->class;
        $data -> gender = $request -> gender;
        $data -> address= $request ->address;
        $data -> save();


        return redirect('mahasiswa')->with('msg', 'Data Mahasiswa dengan nama' .$data->fullname.  ' berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        $fullname = $mahasiswa->fullname;

        $mahasiswa->delete();
        return redirect('mahasiswa')->with('msg', 'Data berhasil dihapus');
    }
}
