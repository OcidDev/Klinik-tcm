@extends('layouts.main')

@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" rel="stylesheet"/>
<style>
    .btn-pasien{
        background: transparent;
        color: #1c5e20;
        width: 100%;
        border-radius: 17px;
        border: 2px solid #1c5e20;
    }
    .profile-img {
        border-radius: 50%;
        width: 70px;
        height: 70px;
        overflow: hidden;
    }
</style>
    <title>Dashboard</title>

    @php
        $count_antrian = 0;
    @endphp
    @foreach ($antrian as $row)
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
            @php
                $count_antrian++;
            @endphp
        @endif
    @endforeach

    <div class="container">

        <div class="row ">
            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto mr-2">
                                <i class="fa fa-book fa-2x text-gray-300"></i>
                            </div>
                            <div class="col">
                                <div class=" font-weight-bold h5 text-primary text-gray-800 mb-1">
                                    {{ $transaksi }} Transaksi</div>
                                <div class="text-sm  mb-0 font-weight-bold text-gray-800">
                                    Semua Transaksi
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto mr-2">
                                <i class="fa fa-user-md	fa-2x text-gray-300"></i>
                            </div>
                            <div class="col">
                                <div class=" font-weight-bold h5 text-primary text-gray-800 mb-1">
                                    {{ $countdokter }} Dokter</div>
                                <div class="text-sm  mb-0 font-weight-bold text-gray-800">
                                    Dokter Terdaftar
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto mr-2">
                                <i class="fa fa-medkit fa-2x text-gray-300"></i>
                            </div>
                            <div class="col">
                                <div class=" font-weight-bold h5 text-primary text-gray-800 mb-1">
                                    {{ $count_antrian }} Antrian</div>
                                <div class="text-sm  mb-0 font-weight-bold text-gray-800">
                                    Semua Antrian
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto mr-2">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                            <div class="col">
                                <div class=" font-weight-bold h5 text-primary text-gray-800 mb-1">
                                    {{ $countpasien }} Pasien</div>
                                <div class="text-sm  mb-0 font-weight-bold text-gray-800">
                                    Pasien Terdaftar
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <form action="" method="get">
            @csrf
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <input type="number" id="datepicker" placeholder="Tahun: {{ date('Y') }}"
                            value="{{ $tahun ?? date('Y') }}" name="tahun" class="date-own form-control">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <button class="btn btn-success">Filter</button>
                    </div>
                </div>
            </div>
        </form>

        <div class="row mt-4">
            <div class="col-lg-8 mb-lg-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div id="container"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-lg-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <center>
                            <span class="text-center" style="font-weight: 700">Dokter Terbaik</span> <br>
                            <span class="text-center" style="font-size:15px">Berikut adalah dokter yang paling banyak melakukan pelayanan kesehatan. </span>
                        </center>
                        {{-- @dd($arr_doc) --}}
                            @foreach ($arr_doc as $doc)
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-4">
                                                <img class="profile-img" src="https://e7.pngegg.com/pngimages/550/997/png-clipart-user-icon-foreigners-avatar-child-face.png" alt="Profile Picture" >
                                            </div>
                                            <div class="col-8">
                                                <span>{{ $doc['dokter'] }}</span>
                                                <button class="btn btn-primary btn-pasien">{{ $doc['total_pasien'] }} Pasien</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Powered by &copy; {{ date('Y') }} | Rumah Sehat Herbal Inti Sehat TCM. All rights reserved.</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>
    </div>
    <script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



  <script>

Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Statistik Kunjungan Klinik',
        align: 'left'
    },
    subtitle: {
        text: 'Periode: {{ $tahun }}',
        align: 'left'
    },
    xAxis: {
        categories: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
        crosshair: true,
        accessibility: {
            description: 'Months'
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Total'
        }
    },
    tooltip: {
        valueSuffix: ' Pasien',
        pointFormat: '<span style="color:{point.color}">\u25CF</span> {series.name}: <b>{point.y:,.0f}</b><br/>'
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y:,.0f} Pasien',
                style: {
                    color: '#333'
                }
            }
        }
    },
    series: [
        {
            name: 'Pasien',
            data: @json($charts_kunjungan),
            color: 'blue' // Warna hijau
        }
    ]
});

$("#datepicker").datepicker({
    format: "yyyy",
    viewMode: "years",
    minViewMode: "years"
});
  </script>

@endsection
