<title>Dokter : {{ $dokter->nama }}</title>
@extends('layouts.main')
@section('content')

    @if ($errors->any())
        @foreach ($errors->all() as $item)
            <div class="alert alert-danger" role="alert">
                {{ $item }}
            </div>
        @endforeach

    @endif
    <div class="container">
        <h1>Perubahan Data Ahli</h1>
        <br>
        <form action="{{ route('dokter.update', $dokter->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            </--------------------------------------------------------Nama-----------------------------------------------------------------------------------* />
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="Nama" placeholder="Nama" required="required"
                        value="{{ $dokter->nama }}" oninvalid="this.setCustomValidity('Nama tidak boleh kosong')" oninput="setCustomValidity('')">
                </div>
            </div>
            </--------------------------------------------------------Alamat-----------------------------------------------------------------------------------* />
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="Alamat" placeholder="Alamat"
                        value="{{ $dokter->alamat }}">
                </div>
            </div>

            </--------------------------------------------------------Telepon-----------------------------------------------------------------------------------* />
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Telepon</label>
                <div class="col-sm-3">
                    <input type="number" class="form-control" id="notelp" name="Telepon"
                        placeholder="Nomer Telepon (aktif)" value="{{ $dokter->telepon }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Hari Praktek</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control @error('hari') is-invalid @enderror" id="notelp"
                        name="hari" value=" {{ $dokter->hari }} " placeholder="Hari" value="{{ old('Hari') }}">
                    @error('hari')
                        <div class="invalid-feedback">
                            "Hari Praktek masih kosong
                        </div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-6">
                    <label class="col-form-label">Start Praktek</label>
                    <input type="time" class="form-control @error('start_praktek') is-invalid @enderror" id="notelp"
                        name="start_praktek" value="{{ $dokter->start_praktek }}" placeholder="Start Praktek" value="{{ old('start_praktek') }}">
                    @error('start_praktek')
                        <div class="invalid-feedback">
                            "Start Praktek masih kosong
                        </div>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <label class="col-form-label">End Praktek</label>
                    <input type="time" class="form-control @error('end_praktek') is-invalid @enderror" id="notelp"
                        name="end_praktek" value="{{ $dokter->end_praktek }}" placeholder="end Praktek" value="{{ old('end_praktek') }}">
                    @error('end_praktek')
                        <div class="invalid-feedback">
                            "End Praktek masih kosong
                        </div>
                    @enderror
                </div>
            </div>

            {{-- </--------------------------------------------------------Jadwal lama-----------------------------------------------------------------------------------* />

            <div class="form group row">
                <label class="col-form-label col-sm-2 pt-0">Jadwal Praktek Lama</label>
                <div class="col-sm-8">
                    <input class="form-control" value="{{ $dokter->jadwal->jadwalpraktek ?? "-" }}" readonly>
                </div>
            </div>

        </--------------------------------------------------------Jadwal baru-----------------------------------------------------------------------------------* />
            <div class="form group row">
                <label class="col-form-label col-sm-2 pt-0">Jadwal Praktek Baru</label>
                <div class="col-sm-8">
                    <select name="Jadwal" class="form-control" value="{{ $dokter->jadwal->jadwalpraktek ?? "-"}}"
                        required oninvalid="this.setCustomValidity('Pilih Jadwal Praktek')" oninput="setCustomValidity('')">
                        <option selected value="">tentukan jadwal praktek baru...</option>
                        @foreach ($jadwalvariabel as $jadwal)
                            <option value="{{ $jadwal->id }}">{{ $jadwal->jadwalpraktek }}</option>
                        @endforeach
                    </select>
                </div>
            </div> --}}
            <br>

            <div class="form-group row">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Ubah</button>
                    <a href="/dokter" class="btn btn-warning">Batal</a>
                </div>
            </div>
        </form>
    </div>
@endsection

