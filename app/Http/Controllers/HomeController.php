<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Keuangan;
use App\Models\obat;
use App\Models\Pasien;
use App\Models\Pegawai;
use App\Models\Rekam;
use DateTimeInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard(Request $request)
    {
        $today = date("d/m/Y");
        $pasien = Pasien::all();
        // $countpasien = Rekam::where('diagnosa', null)->count();
        $countdokter = Dokter::get()->count();
        $countobat = obat::get()->count();
        $countpasien = Pasien::get()->count();

        $allDokter = Dokter::get();
        // dd($allDokter);
        $arr_doc = [];
        foreach ($allDokter as $key => $doc) {
            $dt['dokter'] = $doc->nama;
            $rekam = Rekam::where('id_dokter',$doc->id)->get()->count();
            $dt['total_pasien'] = $rekam;
            array_push($arr_doc,$dt);
        }


        // Mengurutkan array berdasarkan 'total_pasien' dari yang terbanyak
        usort($arr_doc, function($a, $b) {
            return $b['total_pasien'] - $a['total_pasien'];
        });

        // Mengambil 2 elemen teratas
        $arr_doc = array_slice($arr_doc, 0, 2);
        // dd($arr_doc);
        $transaksi = Keuangan::get()->count();

        $tahunReq = $request->tahun;

        if ($tahunReq != null) {
           $tahun = $tahunReq;
        }else{
            $tahun = date('Y');
        }

        $charts_kunjungan = [];
        $bulan = range(1,12);
        foreach ($bulan as $key => $value) {
            $kunjungan = Pasien::whereYear('created_at',$tahun)->whereMonth('created_at',$value)->count();
            array_push($charts_kunjungan, $kunjungan);
        }
        // dd($data);

        $data['tahun'] = $tahun;

        $antrian = Rekam::where('diagnosa', null)->get();


        return view('dashboard', [
            'countpasientoday' => $countpasien,
            'tahun' => $tahun,
            'arr_doc' => $arr_doc,
            'countpasien' => $countpasien,
            'countobat' => $countobat,
            'countdokter' => $countdokter,
            'transaksi' => $transaksi,
            'charts_kunjungan' => $charts_kunjungan,
            'pasien' => $pasien,
            'antrian' => $antrian,
            'pegawai' => Pegawai::all(),
            'laporan' => Rekam::where('laporan', 1)->count()
        ]);
    }
    
    public function index()
    {
        $dokter = Dokter::all();
        $rekam = Rekam::whereDate('created_at',date('Y-m-d'))->get();
        // dd($rekam);
        return view('index', [
            'dokter' => $dokter, 
            'rekam' => $rekam 
        ]);
    }
}
