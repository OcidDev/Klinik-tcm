<title>Database Pasien </title>
@extends('layouts.main')
@section('content')
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
        <h1>Data Pendaftaran Pasien Keseluruhan</h1>
        <h3>RUMAH SEHAT HERBAL INTI SEHAT TCM</h3>
        <br>

        </-------------------------------------------------------- Tabel
            -----------------------------------------------------------------------------------* />
        <a href="#n" type="button" class="">
        </a>
        <br />
        <div class="table-responsive">
            <table class="table table-flush" id="products-list">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Tools</th>
                        <th>Tanggal Daftar</th>
                        <th>Kode Pasien</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Nomer Telepon</th>
                        <th>Agama</th>
                        <th>Pekerjaan</th>
                        <th>Warna Brosur</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @dd($datapasien) --}}
                    @foreach ($datapasien as $p)
                        <tr>
                            <td> {{ $loop->iteration }} </td>
                            </-------------------------------------------------------- edit
                                -----------------------------------------------------------------------------------* />
                            <td class="text-sm">
                                </-------------------------------------------------------- hapus
                                    -----------------------------------------------------------------------------------* />
                                <form action="{{ route('pasien.destroy', $p->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger"
                                        onClick="return confirm('Yakin ingin hapus data?')">
                                        <i class="fas fa-trash"></i></button>
                                </form>
                                <a href="{{ route('print-antrian', $p->id) }}" target="_blank" class="btn btn-success" data-bs-toggle="tooltip" data-bs-original-title="Lihat Pasien">
                                    <i class="fa fa-print"></i>
                                </a>
                            <td> {{ $p->created_at }}</td>
                            <td> {{ $p->kodepasien }} </td>
                            <td> {{ $p->nama }} </td>
                            <td> {{ $p->alamat }} </td>
                            @php
                                 $lahir = new \DateTime($p->lahir);
                                 $tgl_lahir = $lahir->format('Y/M(m)/d');
                            @endphp
                            <td> {{ $tgl_lahir }} </td>
                            <td> {{ $p->kelamin }} </td>
                            <td> {{ $p->telepon }} </td>
                            <td> {{ $p->agama }} </td>
                            <td> {{ $p->pekerjaan }} </td>
                            <td> {{ $p->warna_brosur }} </td>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>



    </div>
    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#products-list').DataTable({
                    dom: 'lBfrtip',
                    lengthMenu: [
                        [5, 10, 25, 50, 100, 1000, -1],
                        ['5', '10', '25', '50', '100', '1000', 'All']
                    ],
                    buttons: [{
                            extend: 'excel',
                            text: 'Excel',
                            messageTop: 'Data Pasien Dicetak pada Tanggal '+'{{  \Carbon\Carbon::now()->format("d-M(m)-Y") }}'
                        },
                        {
                            extend: 'copy',
                            text: 'Copy Isi',
                            messageTop: 'Data Pasien di Copy pada Tanggal '+'{{  \Carbon\Carbon::now()->format("d-M(m)-Y") }}'
                        },
                    ],
                    language: {
                        "searchPlaceholder": "Cari nama pasien",
                        "zeroRecords": "Tidak ditemukan data yang sesuai",
                        "emptyTable": "Tidak terdapat data di tabel"
                    }
                });
            });
        </script>
    @endpush
@endsection
