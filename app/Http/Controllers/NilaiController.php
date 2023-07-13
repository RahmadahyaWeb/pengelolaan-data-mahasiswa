<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Nilai;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Hapus Data Nilai Mahasiswa!';
        $text = "Yakin ingin hapus?";
        confirmDelete($title, $text);

        return view('admin.nilai.index', [
            'nilai' => Nilai::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.nilai.create', [
            'mahasiswa' => Mahasiswa::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'mahasiswa_id' => 'required',
            'mata_kuliah'  => 'required',
            'nilai'        => 'numeric',
        ]);

        if ($request->nilai >= '85') {
            $grade = 'A';
        } else if ($request->nilai >= '75' && $request->nilai < '85') {
            $grade = 'B';
        } else if ($request->nilai >= '65' && $request->nilai < '75') {
            $grade = 'C';
        } else if ($request->nilai >= '50' && $request->nilai < '65') {
            $grade = 'D';
        } else {
            $grade = 'E';
        }

        Nilai::create([
            'mahasiswa_id' => $request->mahasiswa_id,
            'mata_kuliah'  => $request->mata_kuliah,
            'nilai'        => $request->nilai,
            'grade'        => $grade
        ]);

        return redirect()->route('nilai.index')->with('success', 'Data nilai mahasiswa berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Nilai $nilai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Nilai $nilai)
    {
        $mahasiswa = Mahasiswa::all();
        return view('admin.nilai.edit', compact('nilai', 'mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Nilai $nilai)
    {
        $request->validate([
            'mahasiswa_id' => 'required',
            'mata_kuliah'  => 'required',
            'nilai'        => 'numeric',
        ]);

        if ($request->nilai >= '85') {
            $grade = 'A';
        } else if ($request->nilai >= '75' && $request->nilai < '85') {
            $grade = 'B';
        } else if ($request->nilai >= '65' && $request->nilai < '75') {
            $grade = 'C';
        } else if ($request->nilai >= '50' && $request->nilai < '65') {
            $grade = 'D';
        } else {
            $grade = 'E';
        }

        $nilai->update([
            'mahasiswa_id' => $request->mahasiswa_id,
            'mata_kuliah'  => $request->mata_kuliah,
            'nilai'        => $request->nilai,
            'grade'        => $grade
        ]);

        return redirect()->route('nilai.index')->with('success', 'Data nilai mahasiswa berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Nilai $nilai)
    {
        $nilai->delete();
        return redirect()->route('nilai.index')->with('success', 'Data nilai mahasiswa berhasil dihapus!');
    }
}
