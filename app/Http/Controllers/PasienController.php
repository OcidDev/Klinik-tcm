<?php

namespace App\Http\Controllers;

use PDO;
use DateTime;
use Carbon\Carbon;
use App\Models\Obat;
use App\Models\Rekam;
use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Antrian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datapasien = Pasien::get();
        return view('pasien', compact('datapasien'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pasien-form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate(
            $request,
            [
                'Nama' => 'required',
                'Alamat' => 'required',
                'Lahir' => 'required',
                'Kelamin' => 'required',
                'Telepon' => 'required',
                'Agama' => 'required',
                'layanan' => 'required',
                'RekamMedis' => 'required',
                'doktor' => 'required',
                'warna_brosur' => 'required',
                'g-recaptcha-response' => 'required|captcha'
            ],
            [
                'g-recaptcha-response' => [
                    'required' => 'Please verify that you are not a robot.',
                    'captcha' => 'Captcha error! try again later or contact site admin.',
                ],
            ],
        );
        // dd($request->all());

        $timeSelected = $request->tanggal . ' ' . $request->time_slot . ':00';
        $data = Pasien::where('nama', $request->Nama)->where('lahir', $request->Lahir)->get();
        $total_rekam = Rekam::whereDate('created_at', $request->tanggal)->get();
        if (count($total_rekam) >= 10) {
            session()->flash('failed', 'Kouta Pemeriksaan Yang anda pilih Penuh.');
            return redirect()->back();
        }


        // cek duplikat jam
        $dataCek = Rekam::where('created_at', $timeSelected)->first();
        // dd($dataCek);
        if (!empty($dataCek)) {
            session()->flash('failed', 'Jam Pemeriksaan Yang anda pilih sudah penuh.');
            return redirect()->back();
        }
        $nomorAntrian = 1;
        $cekData = Rekam::whereDate('created_at', $request->tanggal)->latest()->first();
        // $cekData = Rekam::whereDate('created_at', Carbon::today())->max('nomorantrian');
        if ($cekData) {
            $nomorAntrian = $cekData->nomorantrian + 1;
        }

        if (count($data) > 0) {
            foreach ($data as $row) :
                $Rekam = Rekam::create([
                    'nomorantrian' => "00" . $nomorAntrian,
                    'id_pasien' => $row->id,
                    'layanan' => $request->layanan,
                    'keluhan' => $request->RekamMedis,
                    'created_at' => $timeSelected,
                    'id_dokter' => $request->doktor
                ]);

                if ($Rekam->nomorantrian == '001') {
                    $created = $Rekam->created_at;
                    $Rekam->jadwal_kedatangan = $created->addMinute(5);
                    $Rekam->jadwal_selesai = $created->addMinute(15);
                    $Rekam->created_at = $timeSelected;
                    $Rekam->updated_at = $timeSelected;
                    $Rekam->save();
                } else {
                    $created = Carbon::parse($cekData->created_at);
                    $Rekam->jadwal_kedatangan = $created->addMinute(25);
                    $Rekam->jadwal_selesai = $created->addMinute(35);
                    $Rekam->created_at = $timeSelected;
                    $Rekam->updated_at = $timeSelected;
                    $Rekam->save();
                }
                session()->put('nomorAntrian', "00" . $nomorAntrian);

                return back()->with([
                    'success' => 'Data berhasil ditambahkan',
                    'nomorAntrian' => "00" . $nomorAntrian,
                    'nama' => $request->Nama,
                    'timestamps' => $Rekam->created_at->format('H:i:s'),
                    'tanggaldaftar' => $Rekam->created_at->format('d-m-Y'),
                    'jadwalkedatangan' => $Rekam->jadwal_kedatangan->format('H:i'),
                    'jadwalselesai' => $Rekam->jadwal_selesai,
                ]);
            endforeach;
        } else {
            $Pasien = Pasien::create([
                'nama' => ucwords(strtolower($request->Nama)),
                'alamat' => $request->Alamat,
                'lahir' => $request->Lahir,
                'kelamin' => $request->Kelamin,
                'telepon' => $request->Telepon,
                'agama' => $request->Agama,
                'warna_brosur' => $request->warna_brosur
            ]);

            // $kode= 100000+ (integer)$Pasien -> id ;
            // $nomer= substr($kode, 1, 5). $Pasien -> lahir -> format ('dmy');
            // $Pasien -> kodepasien = $nomer ;
            // $Pasien -> save();
            $lahir = new DateTime($Pasien->lahir);
            $nomer = $lahir->format('dmy');
            $Pasien->kodepasien = $nomer;
            $Pasien->save();

            $latestpasien = Pasien::all()->last();

            $rekam = Rekam::create([
                'nomorantrian' => "00" . $nomorAntrian,
                'id_pasien' => $latestpasien->id,
                'layanan' => $request->layanan,
                'keluhan' => $request->RekamMedis,
                'id_dokter' => $request->doktor,
                'created_at' => $timeSelected,
            ]);

            if ($rekam->nomorantrian == '001') {
                $created = $rekam->created_at;
                $rekam->jadwal_kedatangan = $created->addMinute(5);
                $rekam->jadwal_selesai = $created->addMinute(15);
                $rekam->created_at = $timeSelected;
                $rekam->updated_at = $timeSelected;
                $rekam->save();
            } else {
                $created = Carbon::parse($latestpasien->created_at);
                $rekam->jadwal_kedatangan = $created->addMinute(25);
                $rekam->jadwal_selesai = $created->addMinute(35);
                $rekam->created_at = $timeSelected;
                $rekam->updated_at = $timeSelected;
                $rekam->save();
            }
            session()->put('nomorAntrian', "00" . $nomorAntrian);

            return back()->with([
                'success' => 'Data berhasil ditambahkan',
                'nomorAntrian' => "00" . $nomorAntrian,
                'nama' => $request->Nama,
                'timestamps' => $Pasien->created_at->format('H:i:s'),
                'tanggaldaftar' => $Pasien->created_at->format('d-m-Y'),
                'jadwalkedatangan' => $rekam->jadwal_kedatangan->format('H:i'),
                'jadwalselesai' => $rekam->jadwal_selesai,
            ]);
        }

        // return request()->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function show(Pasien $pasien)
    {
        $pasien = Pasien::where('id', $pasien)->get();
        return view('pasien', compact('pasien'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pasien = Pasien::findOrfail($id);
        $rekam = Rekam::where('id_pasien', $id)->whereNotNull('diagnosa')->get();
        $pasien = Pasien::find($id);
        return view('pasien-edit', compact('pasien'));

        return view('pasien-rekammedis', [
            'pasien' => $pasien,
            'rekam' => $rekam,
            'dokter' => Dokter::all(),
            'obat' => Obat::all()
        ]);
    }

    // public function ubah($id)
    // {
    //     $pasien = Pasien::findOrfail($id);
    //     return view('pasien-form-edit', compact('pasien-rekammedis'));
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'kodepasien' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'lahir' => 'required|date',
            'kelamin' => 'required',
            'telepon' => 'required',
            'agama' => 'required',
            'warna_brosur' => 'required'
        ]);

        // Cari pasien berdasarkan ID
        $pasien = Pasien::find($id);

        // Perbarui data pasien
        $pasien->update([
            'kodepasien' => $request->kodepasien,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'lahir' => $request->lahir,
            'kelamin' => $request->kelamin,
            'telepon' => $request->telepon,
            'agama' => $request->agama,
            'warna_brosur' => $request->warna_brosur
        ]);

        // Redirect ke halaman index pasien dengan pesan sukses
        return redirect()->route('pasien.index')->with('success', 'Data telah diubah');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pasien $pasien)
    {
        $pasien->delete();
        $rekam = Rekam::where('id_pasien', $pasien->id);
        $rekam->delete();
        return redirect('/pasien')->with('success', 'Data terhapus');
    }

    public function antrianpasien()
    {
        $data = Rekam::where('diagnosa', null)->get();
        return view('antrian-pasien', [
            'datarekam' => $data
        ]);
    }

    public function pasienlama()
    {
        $data = Dokter::all();
        return view('pasien-lama', [
            'dokter' => $data
        ]);
    }

    public function cekpasienlama(Request $request)
    {
        $validated = $request->validate(
            [
                "kode" => 'required',
            ]
        );

        $kode = $validated['kode'];

        $data = Pasien::where('kodepasien', $kode)->get();

        // dd($data);
        if (count($data) > 0) {
            foreach ($data as $row) :
                $lahir = new \DateTime($row->lahir);
                $tgl_lahir = $lahir->format('Y/M(m)/d');
                return redirect('/pasien-lama')->with([
                    'success' => 'Data ditemukan',
                    'nama' => $row->nama,
                    'lahir' => $tgl_lahir,
                    'alamat' => $row->alamat,
                    'kelamin' => $row->kelamin,
                    'id' => $row->id
                ]);
            endforeach;
        } else {
            return redirect('/pasien-lama')->with([
                'failed' => 'Data tidak ditemukan'
            ]);
        }
    }

    public function rekamstore(Request $request)
    {
        $validated = $request->validate([
            'idpasien' => 'required',
            'layanan' => 'required',
            'keluhan' => 'required',
            'dokter' => 'required',
            'diagnosa' => 'required',
            'obat' => 'required',
            'jumlahobat' => 'required',
            'keterangan' => 'required'
        ]);

        Rekam::create([
            'jumlahobat' => $validated['jumlahobat'],
            'id_pasien' => $validated['idpasien'],
            'nomorantrian' => 0,
            'layanan' => $validated['layanan'],
            'keluhan' => $validated['keluhan'],
            'id_dokter' => $validated['dokter'],
            'diagnosa' => $validated['diagnosa'],
            'id_obat' => $validated['obat'],
            'keterangan' => $validated['keterangan']
        ]);

        $obat = Obat::find($validated['obat']);
        $obat->stok = $obat->stok - $validated['jumlahobat'];
        $obat->save();

        return back()->with('success', 'Data berhasil ditambahkan');
    }

    public function updatepasien(Request $request)
    {
        $validated = $request->validate([
            'idpasien' => 'required',
            'Kodepasien' => 'required',
            'Nama' => 'required',
            'Alamat' => 'required',
            'Lahir' => 'required',
            'Kelamin' => 'required',
            'Telepon' => 'required',
            'Agama' => 'required',
            'warna_brosur' => 'required'
        ]);

        $pasien = Pasien::find($validated['idpasien']);
        $pasien->kodepasien = $validated['Kodepasien'];
        $pasien->nama = $validated['Nama'];
        $pasien->alamat = $validated['Alamat'];
        $pasien->lahir = $validated['Lahir'];
        $pasien->kelamin = $validated['Kelamin'];
        $pasien->telepon = $validated['Telepon'];
        $pasien->agama = $validated['Agama'];
        $pasien->warna_brosur = $validated['warna_brosur'];
        $pasien->save();

        return back()->with('success', 'Data Terupdate');
    }

    public function selesai($id)
    {
        $antrian = Antrian::findOrFail($id);
        $antrian->delete();

        return redirect()->back()->with('success', 'Data antrian pasien berhasil dihapus.');
    }
}
