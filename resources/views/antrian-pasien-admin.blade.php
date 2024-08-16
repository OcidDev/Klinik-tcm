<title>Antrian-Pasien (Jam {{ \Carbon\Carbon::now()->format('H:i') }})</title>
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
        <h1>Data Antrian Pasien Harian</h1>
        <br>

        </-------------------------------------------------------- Tabel
            -----------------------------------------------------------------------------------* />
        <br />
        <div class="table-responsive">
            <table class="table table-flush" id="products-list">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Tools</th>
                        <th width="30%">Status</th>
                        <th>No Antrian</th>
                        <th>Jam Daftar</th>
                        <th>Nama</th>
                        <th>Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        {{-- <th>Jenis Layanan</th> --}}
                        <th>Keluhan</th>
                        <th>Dokter</th>
                        <th>Alamat</th>
                        <th>Nomer Telepon</th>
                        <th>Agama</th>
                        <th>Pekerjaan</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $count = 0;
                    @endphp
                    {{-- @dd($datarekam) --}}
                    @foreach ($datarekam as $row)
                        @php
                            $cekPembayaran = App\Models\Keuangan::where('id_antrian', $row->id)->first();
                            $hideRow = false;
                            $minutesDiff = null;
                            $minute = null;

                            if ($cekPembayaran != null && $cekPembayaran->status == 2) {
                                $now = \Carbon\Carbon::now()->setTimezone(config('app.timezone'));
                                $updatedAt = \Carbon\Carbon::parse($cekPembayaran->updated_at)->setTimezone(
                                    config('app.timezone'),
                                );
                                $minutesDiff = $now->diffInMinutes($updatedAt);

                                $pisah = explode('-',round($minutesDiff));
                                // dd($pisah[1]);
                                $minute = $pisah[1];
                                if ($minute > 35) {
                                    $hideRow = true;
                                }
                            }
                        @endphp

                        @if (!$hideRow)
                            <tr>
                                <td>{{ $count = $count + 1 }}</td>
                                <td>
                                    <a href="{{ route('rekam.edit', $row->id) }}" class="btn btn-warning"
                                        data-bs-toggle="tooltip" data-bs-original-title="Lihat Pasien">
                                        <i class="fas fa-pen text-white"></i>
                                    </a>
                                    <form action="{{ route('rekam.destroy', $row->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger"
                                            onClick="return confirm('Yakin ingin hapus data?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                    @if ($cekPembayaran != null)
                                        <a href="{{ route('print-antrian', $row->id) }}" target="_blank"
                                            class="btn btn-success" data-bs-toggle="tooltip"
                                            data-bs-original-title="Lihat Pasien">
                                            <i class="fa fa-print"></i>
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    @if ($cekPembayaran == null)
                                        Belum Bayar
                                        <a href="{{ route('keuangan.proses', $row->id) }}" class="btn btn-primary"><i
                                                class="fa fa-check"></i></a>
                                    @else
                                        Sudah Bayar <br>
                                        ({{ $minute }} Menit Lalu)
                                    @endif
                                </td>
                                <td>{{ $row->nomorantrian }}</td>
                                <td>{{ $row->updated_at->format('H:i:s -- d/m/Y') }}</td>
                                <td>{{ $row->pasien->nama }}</td>
                                @php
                                    $lahir = new \DateTime($row->pasien->lahir);
                                    $tgl_lahir = $lahir->format('d/M/Y');
                                @endphp
                                <td>{{ $tgl_lahir }}</td>
                                <td>{{ $row->pasien->kelamin }}</td>
                                <td>{{ $row->keluhan }}</td>
                                <td>{{ $row->dokter->nama ?? 'Dokter Tidak ada' }}</td>
                                <td>{{ $row->pasien->alamat }}</td>
                                <td>
                                    <a href="https://api.whatsapp.com/send?phone={{ $row->pasien['telepon'] }}"
                                        target="_blank" title="Pesan WhatsApp" class="btn btn-success">
                                        <b>{{ $row->pasien->telepon }}</b>
                                    </a>
                                </td>
                                <td>{{ $row->pasien->agama }}</td>
                                <td>{{ $row->pasien->pekerjaan }}</td>
                            </tr>
                        @endif
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
                        [50, 100, 5, -1],
                        ['50', '100', '5', 'All']
                    ],
                    buttons: [{
                            extend: 'excel',
                            text: 'Excel',
                            messageTop: 'Data Antrian Harian per Tanggal ' +
                                '{{ \Carbon\Carbon::now()->format('d-M(m)-Y') }}'

                        },
                        {
                            extend: 'copy',
                            text: 'Copy Isi',
                            messageTop: 'Data Antrian Harian per Tanggal ' +
                                '{{ \Carbon\Carbon::now()->format('d-M(m)-Y') }}'

                        },
                    ],
                    language: {
                        "searchPlaceholder": "Cari nama pasien",
                        "zeroRecords": "Tidak ditemukan data yang sesuai",
                        "emptyTable": "Tidak terdapat data di tabel"
                    }
                });
            });

            // <!--------------------------------------------------------auto refresh page----------------------------------------------------------------------------------->
            setTimeout(function() {
                window.location.reload();
            }, 16000);
        </script>
    @endpush
@endsection
