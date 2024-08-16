

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Rumah Sehat Herbal</title>

    <style>
      .certificate {
        border: 2px solid black;
        padding: 20px;
        max-width: 650px;
        margin: 50px auto;
        text-align: center;
      }
      .certificate h1 {
        font-size: 2em;
        margin-top: 20px;
      }
      .certificate p {
        font-size: 1.2em;
        margin-bottom: 0px;
      }
      .certificate .subtitle {
        font-weight: bold;
        font-size: 1.5em;
      }
      .certificate .details {
        margin-top: 30px;
        font-size: 1em;
      }
      .certificate .details p {
        margin: 0;
      }
      .logos {
        display: flex;
        /* justify-content: space-between; */
        /* margin-bottom: 20px; */
      }
      .logos img {
        max-width: 100px;
      }
      .queue {
        border-top: 2px solid black;
        /* padding-top: 20px; */
        /* margin-top: 20px; */
      }
      .queue p {
        font-size: 1em;
        margin-bottom: 0px;
        text-align: left;
      }
      .queue h2 {
        font-size: 2.5em;
        font-weight: bold;
        margin: 20px 0;
      }
    </style>
  </head>
  <body onload="window.print()">
    {{-- @dd($datarekam) --}}
    <div class="certificate">
        <div class="logos align-items-center justify-content-center d-flex">
          <img src="{{ asset('img/logoaspetri2012.jpg') }}" alt="Logo 1">
          <h1 style="font-weight: 800">RUMAH SEHAT HERBAL<br>INTI SEHAT TCM</h1>
          <img src="{{ asset('img/logo.png') }}" alt="Logo 2">
        </div>
      <p class="subtitle">RAMUAN CINA KUNO SUPER MUJARAB<br>AHLI PENYAKIT KRONIS TANPA OPERASI..!!</p>
      <p style="font-weight: 700">( KANKER / TUMOR, DIABETES, MATA )</p>
      <div class="">
        <p style="font-size: 15px;font-weight:600">NO. INDUK BERUSAHA : 1243000241405</p>
        <p style="font-size: 15px;font-weight:600">SERTIFIKAT STANDAR : 1240002414050001</p>
      </div>

      <div class="queue">
        <div class="row">
          <div class="col-4" style="float: left">
            <span style="font-weight:700;float:left">Nomor Reg</span>
          </div>
          <div class="col-1" style="float: left">
            <span style="float: left">=</span>
          </div>
          <div class="col-6" style="float: left">
             <span style="float: left"> {{$datarekam->pasien->kode_pasien ?? '-'}}</span>
          </div>
        </div>
        <div class="row">
          <div class="col-4" style="float: left">
            <span style="font-weight:700;float:left">Tanggal Daftar</span>
          </div>
          <div class="col-1" style="float: left">
            <span style="float: left">=</span>
          </div>
          <div class="col-6" style="float: left">
             <span style="float: left"> {{$datarekam->updated_at->format('H:i:s - d/m/Y')}}</span>
          </div>
        </div>
        <div class="row">
          <div class="col-4" style="float: left">
            <span style="font-weight:700;float:left">Brosur Warna</span>
          </div>
          <div class="col-1" style="float: left">
            <span style="float: left">=</span>
          </div>
          <div class="col-6" style="float: left">
             <span style="float: left"> {{$datarekam->pasien->warna_brosur ?? '-'}}</span>
          </div>
        </div>
        <div class="row">
          <div class="col-4" style="float: left">
            <span style="font-weight:700;float:left">Nama Pasien</span>
          </div>
          <div class="col-1" style="float: left">
            <span style="float: left">=</span>
          </div>
          <div class="col-6" style="float: left">
             <span style="float: left"> {{$datarekam->pasien->nama ?? '-'}}</span>
          </div>
        </div>
        <div class="row">
          <div class="col-4" style="float: left">
            <span style="font-weight:700;float:left">Umur</span>
          </div>
          <div class="col-1" style="float: left">
            <span style="float: left">=</span>
          </div>
          @php
              $agerek = \Carbon\Carbon::parse($datarekam->pasien->lahir)->age;
          @endphp
          <div class="col-6" style="float: left">
            <span style="float:left">
              {{$agerek}} Tahun
            </span>
          </div>
        </div>
        <div class="row">
          <div class="col-4" style="float: left">
            <span style="font-weight:700;float:left">Agama</span>
          </div>
          <div class="col-1" style="float: left">
            <span style="float: left">=</span>
          </div>
          <div class="col-6" style="float: left">
             <span style="float: left"> {{$datarekam->pasien->agama ?? '-'}}</span>
          </div>
        </div>
        <div class="row">
          <div class="col-4" style="float: left">
            <span style="font-weight:700;float:left">Pekerjaan</span>
          </div>
          <div class="col-1" style="float: left">
            <span style="float: left">=</span>
          </div>
          <div class="col-6" style="float: left">
             <span style="float: left"> {{$datarekam->pasien->pekerjaan ?? '-'}}</span>
          </div>
        </div>
        <div class="row">
          <div class="col-4" style="float: left">
            <span style="font-weight:700;float:left">No Telepon</span>
          </div>
          <div class="col-1" style="float: left">
            <span style="float: left">=</span>
          </div>
          <div class="col-6" style="float: left">
             <span style="float: left"> {{$datarekam->pasien->telepon ?? '-'}}</span>
          </div>
        </div>
        <div class="row">
          <div class="col-4" style="float: left">
            <span style="font-weight:700;float:left">Alamat Tempat Tinggal</span>
          </div>
          <div class="col-1" style="float: left">
            <span style="float: left">=</span>
          </div>
          <div class="col-6" style="float: left">
             <span style="float: left"> {{$datarekam->pasien->alamat ?? '-'}}</span>
          </div>
        </div>
        <div class="row">
          <div class="col-4" style="float: left">
            <span style="font-weight:700;float:left">Penyakit Yang Di Derita</span>
          </div>
          <div class="col-1" style="float: left">
            <span style="float: left">=</span>
          </div>
          {{-- @dd($datarekam) --}}
          <div class="col-6" style="float: left">
             <span style="float: left"> {{$datarekam->keluhan ?? '-'}}</span>
          </div>
        </div>
        <h2>NOMOR ANTRIAN ANDA<br>{{ $datarekam->nomorantrian }}</h2>

        <center>
          <span style="font-weight: 700">BUDAYAKAN ANTRI UNTUK KENYAMANAN BERSAMA</span><br>
          <span style="font-weight: 700">TERIMA KASIH. SEMOGA LEKAS SEMBUH</span>
        </center>
        <br>
          <center>
            <span style="font-weight: 700">BIAYA PENDAFTARAN Rp.50.000 </span> <br>
            <span style="font-weight: 700">HARAP DIBAYAR PADA PETUGAS PENDAFTARAN</span>
          </center>
      </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
