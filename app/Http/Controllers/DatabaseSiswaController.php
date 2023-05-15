<?php

namespace App\Http\Controllers;

use App\Models\DatabaseSiswa;
use Illuminate\Http\Request;

class DatabaseSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $databaseSiswa = DatabaseSiswa::all()->toArray();
        return $databaseSiswa;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $databaseSiswa = DatabaseSiswa::create([
            'namalengkap' => $request->namalengkap,
            'unit' => $request->unit,
            'kelas' => $request->kelas,
            'nisn' => $request->nisn,
            'jeniskelamin' => $request->jeniskelamin,
            'ttl' => $request->ttl,
            'userid' => $request->userid
        ]);
        return $databaseSiswa;
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return DatabaseSiswa::find($id);
    }

    // public function update(Request $request, DatabaseSiswa $databaseSiswa)
    // {

    //     $databaseSiswa->namalengkap = $request->namalengkap;
    //     $databaseSiswa->unit = $request->unit;
    //     $databaseSiswa->kelas = $request->kelas;
    //     $databaseSiswa->nisn = $request->nisn;
    //     $databaseSiswa->jeniskelamin = $request->jeniskelamin;
    //     $databaseSiswa->ttl = $request->ttl;
    //     $databaseSiswa->userid = $request->userid;

    //     return $databaseSiswa;
    // }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'namalengkap' => 'required',
            'unit' => 'required',
            'kelas' => 'required',
            'nisn' => 'required',
            'jeniskelamin' => 'required',
            'ttl' => 'required',
            'userid' => 'required',
        ]);

        $databaseSiswa = DatabaseSiswa::find($id);
        if (!$databaseSiswa) {
            return response()->json(['message' => 'Post not found'], 404);
        }

        $databaseSiswa->namalengkap = $request->input('namalengkap');
        $databaseSiswa->unit = $request->input('unit');
        $databaseSiswa->kelas = $request->input('kelas');
        $databaseSiswa->nisn = $request->input('nisn');
        $databaseSiswa->ttl = $request->input('ttl');
        $databaseSiswa->userid = $request->input('userid');
        $databaseSiswa->save();

        return $databaseSiswa;
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $databaseSiswa = DatabaseSiswa::find($id);
        if (!$databaseSiswa) {
            return response()->json(['message' => 'Siswa tidak ditemukan'], 404);
        }

        $databaseSiswa->delete();

        return response()->json(['message' => 'Siswa Dihapus']);
    }
}
