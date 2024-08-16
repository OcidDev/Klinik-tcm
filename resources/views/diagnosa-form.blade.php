<title>Pasien : {{ $diagnosa->pasien->nama }}</title>
    @include('partials.navdashboard')

    @if ($errors->any())
        @foreach ($errors->all() as $item)
            <div class="alert alert-danger" role="alert">
                {{ $item }}
            </div>
        @endforeach

    @endif
    <div class="container">
        <h1>Nama Pasien</h1>
        <br>
        <form action="{{ route('diagnosatools.update', $diagnosa->id) }}" method="POST">
            @method('PATCH')
            @csrf

            </--------------------------------------------------------kodepasien-----------------------------------------------------------------------------------* />
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Kode Pasien</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control bg-secondary text-white" name="Kodepasien"
                        value="{{ $diagnosa->pasien->kodepasien }}" readonly>
                </div>
            </div>
            </--------------------------------------------------------Nama-----------------------------------------------------------------------------------* />
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control bg-secondary text-white" name="Nama" placeholder="Nama" required="required"
                        value="{{ $diagnosa->pasien->nama }}"readonly>
                </div>
            </div>





            <!--------------------------------------------------------keluhan pasien----------------------------------------------------------------------------------- -->
            <div class="form-group row mt-2">
                <label class="col-sm-2 col-form-label">Keluhan</label>
                <div class="col-sm-5">
                    {{-- <input type="text" class="form-control" name="RekamMedis"
                    placeholder="Anda sakit apa, dan sudah berapa lama?"> --}}
                    <textarea readonly type="text" name="RekamMedis" class="form-control bg-secondary text-white" cols="30" rows="5">{{ $diagnosa->keluhan }}</textarea>
                </div>
            </div>

            <!--------------------------------------------------------dokter pemriksa----------------------------------------------------------------------------------- -->
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Dokter</label>
                <div class="col-sm-5">
                    <input type="text" value="{{ $diagnosa->dokter->nama ?? "-"}}" readonly class="form-control bg-secondary text-white">
                </div>
            </div>

            </--------------------------------------------------------umur-----------------------------------------------------------------------------------* />
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Umur</label>
                <div class="col-sm-5">
                    @php
                        $age = \Carbon\Carbon::parse($diagnosa->pasien->lahir)->age;
                    @endphp
                    <h1> {{ $age }} Tahun </h1>
                </div>
            </div>

        </--------------------------------------------------------Lahir-----------------------------------------------------------------------------------* />
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Lahir</label>
            <div class="col-sm-5">
                <input type="date" class="form-control" name="Lahir"
                    value="{{ $diagnosa->pasien->lahir }}" readonly>
            </div>
        </div>

            </--------------------------------------------------------Alamat-----------------------------------------------------------------------------------* />
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="Alamat"
                        value="{{ $diagnosa->pasien->alamat }}" readonly>
                </div>
            </div>

            </--------------------------------------------------------No
                Handphone-----------------------------------------------------------------------------------* />
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nomer Handphone</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="Telepon"
                        value="{{ $diagnosa->pasien->telepon }}" readonly>
                </div>
            </div>

            </--------------------------------------------------------Pekerjaan-----------------------------------------------------------------------------------* />
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Pekerjaan</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="Pekerjaan"
                        value="{{ $diagnosa->pasien->pekerjaan }}" readonly>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Selesai</button>
                    <a href="/diagnosa" class="btn btn-warning">Kembali</a>
                </div>
            </div>
        </form>
    </div>
