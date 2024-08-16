<title>Keuangan</title>
@extends('layouts.main')
@section('content')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .select2-container{
            width: 100%!important;
        }
    </style>
    @if ($errors->any())
        @foreach ($errors->all() as $item)
            <div class="alert alert-danger" role="alert">
                {{ $item }}
            </div>
        @endforeach
    @endif

    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="container">
        </-------------------------------------------------------- Tabel
            -----------------------------------------------------------------------------------* />
        {{-- <a data-toggle="modal" data-target="#modalcreate" type="button" style="float: right" class="btn btn-success mb-3">
            <i class="fas fa-plus text-white"></i> <i class="fas fa-calendar text-white"></i> Tambah Data Keuangan</a>

        <div class="modal fade" id="modalcreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Keuangan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('jadwal.store') }}" method="post">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Pasien</label>
                                <div class="col-sm-10">
                                    <select name="id_pasien" required class="form-control js-example-basic-single" id="">
                                        <option value="">Pilih Pasien</option>
                                        @foreach ($pasien as $p)
                                            <option value="{{ $p->id }}"> {{ $p->nama }}</option>
                                        @endforeach
                                    </select>

                                    @error('id_pasien')
                                        <div class="invalid-feedback">
                                            Pasien tidak boleh kosong
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Tanggal Pembayaran</label>
                                <div class="col-sm-10">
                                    <input type="date" name="tgl_pembayaran" class="form-control" required>

                                    @error('tgl_pembayaran')
                                        <div class="invalid-feedback">
                                            Tanggal Pembayaran tidak boleh kosong
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Uang Masuk</label>
                                <div class="col-sm-10">
                                    <input type="integer" name="uang_masuk" class="form-control" required>

                                    @error('uang_masuk')
                                        <div class="invalid-feedback">
                                            Uang Masuk tidak boleh kosong
                                        </div>
                                    @enderror
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-primary">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div> --}}
        <div class="row">
            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total Data Keuangan</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{ count($keuangan) }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total Saldo</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    @currency($keuangan->where('status',2)->sum('uang_masuk'))
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fa fa-money fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card" style="width: 100%">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-flush" id="products-list">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Tanggal Pembayaran</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Nomor Handphone</th>
                                <th>Warna Brosur</th>
                                <th>Uang Masuk</th>
                                <th>Status</th>
                                @if (Auth::user()->is_superadmin != null)
                                    <th>Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($keuangan as $item)
                                <tr>
                                    <td> {{ $loop->iteration }} </td>
                                    <td>{{ $item->tgl_pembayaran }}</td>
                                    @php
                                        $rekam = \App\Models\Rekam::where('id',$item->id_antrian)->first();
                                    @endphp
                                    <td> {{ $rekam->pasien->nama }} </td>
                                    <td> {{ $rekam->pasien->alamat }} </td>
                                    <td> {{ $rekam->pasien->telepon }} </td>
                                    <td> {{ $rekam->pasien->warna_brosur ?? '-' }} </td>
                                    <td> @currency($item->uang_masuk) </td>
                                    <td>
                                        @if ($item->status == 1)
                                        <span class="badge bg-danger text-white">Belum di Approve</span>    
                                        @else
                                        <span class="badge bg-success text-white">Sudah di Approve</span>
                                        @endif
                                    </td>
                                    @if (Auth::user()->is_superadmin != null)
                                        <td>
                                            @if ($item->status == 1)
                                            <a href="{{ route('keuangan.approve',['id' => $item->id,'rekam_id' => $rekam->id]) }}" class="btn btn-primary"><i class="fa fa-check"></i></a>
                                            @endif
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <script>
            $(document).ready(function() {
                $('.js-example-basic-single').select2();
            });
            $(document).ready(function() {
                $('#products-list').DataTable({
                    lengthMenu: [
                        [10, 100, -1],
                        ['10', '100', 'All']
                    ],

                    language: {
                        "searchPlaceholder": "Cari Keuangan",
                        "zeroRecords": "Tidak ditemukan Keuangan",
                        "emptyTable": "Tidak terdapat Keuangan di tabel"
                    }
                });
            });
        </script>
    @endpush
@endsection
