<?php

namespace App\Http\Controllers;

use App\Models\Rekam;
use App\Models\Pasien;
use App\Models\Keuangan;
use Illuminate\Http\Request;
use App\Models\LaporanHarian;
use Illuminate\Support\Facades\Auth;

class KeuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['keuangan'] = Keuangan::orderBy('created_at', 'desc')->get();
        $data['pasien'] = Pasien::orderBy('created_at', 'desc')->get();
        // dd($data);
        return view('keuangan.index', $data);
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
    public function store(Request $request, $id)
    {
        try {
            $keuangan = new Keuangan();
            $keuangan->id_antrian = $id;

            $antrian = Rekam::where('id', $id)->first();
            $keuangan->tgl_pembayaran = date('Y-m-d');
            $keuangan->id_pasien = $antrian->id_pasien;
            $keuangan->uang_masuk = 50000;
            $keuangan->action_by = Auth::user()->id;
            $keuangan->save();

            return back()->with('success', 'Status Pembayaran berhasil di update!');
        } catch (\Throwable $th) {
            // dd($th->getMessage());
            return back()->with('failed', 'Status Pembayaran gagal di update!');
        }
    }
    public function approve($id,$rekam_id)
    {
        try {
            $keuangan = Keuangan::find($id);
            $keuangan->status = 2;
            $keuangan->save();

            $antrian = Rekam::find($rekam_id);
            $antrian->laporan = 1;
            $antrian->save();


            return back()->with('success', 'Status Pembayaran berhasil di update!');
        } catch (\Throwable $th) {
            return back()->with('failed', 'Status Pembayaran gagal di update!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Keuangan $keuangan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Keuangan $keuangan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Keuangan $keuangan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Keuangan $keuangan)
    {
        //
    }
}
