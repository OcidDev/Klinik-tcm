<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Rekam;
use App\Models\Pasien;
use Illuminate\Http\Request;

class DiagnosaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $diagnosa = Rekam::find($id);
        return view('diagnosa-form', [
            'diagnosa' => $diagnosa,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            // 'kodepasien' => 'required',
        ]);

        $rekam = Rekam::find($id);
        $rekam->laporan = 1;

        $idpasien = $rekam->id_pasien;

        if ($request->kodepasien != '') {
            $pasien = Pasien::find($idpasien);
            $pasien->kodepasien = $request->kodepasien . $pasien->kodepasien;
            $pasien->save();
        }

        return redirect('diagnosa')->with('success', 'Sukses memberi diagnosa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
