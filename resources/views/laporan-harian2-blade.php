<title>Laporan Harian Pasien</title>
@extends('layouts.laporan-main')
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
    <form action="/clearlaporan" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger" onClick="return confirm('Yakin ingin clear data?')">Clear Laporan</button>
    </form>

    <h1>Laporan Pasien Harian</h1>
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
                    <th>Tanggal Lahir</th>
                    <th>Lama/Baru</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat Rumah</th>
                    <th>No Handphone</th>
                    <th>Pekerjaan</th>
                </tr>
            </thead>
            <tbody>
                @php
                $count = 0;
                @endphp
                @foreach($data as $r)
                <tr>
                    <td>{{ ++$count }}</td>
                    <td>
                        <form action="{{ route('pasien.selesai', $r->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-success" onClick="return confirm('Yakin ingin menyelesaikan pemeriksaan?')">
                                <i class="fas fa-check"></i> Selesai Pemeriksaan
                            </button>
                        </form>
                        <a href="{{ route('print-antrian', $r->id) }}" target="_blank" class="btn btn-success" data-bs-toggle="tooltip" data-bs-original-title="Lihat Pasien">
                            <i class="fa fa-print"></i>
                        </a>
                    </td>
                    <td>{{ $r->created_at }}</td>
                    <td>{{ $r->pasien->kodepasien }}</td>
                    <td>{{ $r->pasien->nama }}</td>
                    <td>{{ $r->pasien->lahir }}</td>
                    <td>{{ $r->lamabaru == '' ? '-' : $r->lamabaru }}</td>
                    <td>{{ $r->pasien->kelamin }}</td>
                    <td>{{ $r->pasien->alamat }}</td>
                    <td>{{ $r->pasien->telepon }}</td>
                    <td>{{ $r->pasien->pekerjaan }}</td>
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
                [50, 100, 200, -1],
                ['50', '100', '200', 'All']
            ],
            buttons: [{
                    extend: 'excel',
                    text: 'Excel',
                    messageTop: 'Laporan Diagnosa Harian Tanggal ' + '{{ \Carbon\Carbon::now()->format("d-M(m)-Y") }}'
                },
                {
                    extend: 'copy',
                    text: 'Copy Isi',
                },
            ],
            language: {
                searchPlaceholder: 'Cari nama pasien',
                zeroRecords: 'Tidak ditemukan data yang sesuai',
                emptyTable: 'Tidak terdapat data di tabel'
            }
        });
    });
</script>
@endpush
@endsection