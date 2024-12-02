@extends('layouts.header-sidebar')

@section('content1')
<style>
    table {
        border-collapse: collapse;
        width: 100%;
        font-family: "Nunito", sans-serif;
        border: 1px solid #b7b7b7;
        margin-top: 5px;
    }
    th, td {
        border: 1px solid #b7b7b7;
        padding: 8px;
        text-align: center;
    }
    th{
        font-size: 16px;
    }
    .custom-th{
        background-color: #36a4c0;
        color: #ffffff;
    }
    .card{
        font-family: "Nunito", sans-serif;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .card-text{
        font-size: 12px;
    }

    .icon{
        font-size: 60px;
        text-align: center;
    }

    .saldo-cuti{
        margin-bottom: 30px;
        padding: 0;
    }

    .custom1{
        margin-top: 25px;
        border-radius: 20px;
        background-color: #36a4c0;
    }

    .customhari{
        font-size: 9px;
    }
    .card-title{
        padding: 10px 0 0 0;
        font-size: 20px;
    }
    .card-balance{
        border-radius: 10px;
        background-color: #36a4c0;
    }
    .text-class{
        color: #36a4c0;
    }
    .text-class:hover {
        color: #292929;
        background: #cfcfcf;
        border:  #cfcfcf;
    }
    .jurnalcss:hover{
        color: #C0C2C0;
    }
    .hand-icon {
        display: inline-block;
        font-size: 24px;
        animation: bounce 0.5s infinite alternate;
    }

    @keyframes bounce {
        0% {
            transform: translateY(0);
        }
        100% {
            transform: translateY(-5px);
        }
    }

    @media (max-width: 768px) {
        .table-responsive{
            font-size: 11px;
        }
        th{
            font-size: 8px;
        }
        .card-title {
            font-size: 18px;
            padding: 0;
            margin-bottom: 0;
        }
    }

</style>

<div class="pagetitle">
    <h1>My Home Page</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
      </ol>
    </nav>
</div>
<section class="section dashboard">
    @if(session('passwordChangeWarning'))
        <script>
            window.location = "{{ route('change.password') }}";
        </script>
    @endif
    @if (is_null($sign))
        <div class="alert alert-warning" role="alert">
            You have not added a signature, <a href="{{ route('showProfile')}}" class="alert-link">click here</a> to upload it.
        </div>
    @endif

    <div class="row mt-4">
      <!-- Left side columns -->
        <div class="col-lg-8">
            <div class="row">
                {{-- <div class="col-12">
                    <p>Klik <a href="">disini</a> untuk mengunduh manual book aplikasi harispa</p>
                </div> --}}
                <div class="col-12">
                    <div class="card welcome">
                        <div class="card-body  ">
                            <div class="container">
                                <h4 class="card-title mt-3 typing">Hello <div class="hand-icon">👋</div> .. {{Auth()->user()->name}} ! Welcome to HRISPA Xyz.
                            </div>
                        </div>
                    </div>
                </div>
                <!-- absensi / minggu -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Attendance <span>/ Last 1 (one) Week</span></h5>
                        </div>
                        <div class="card-body">
                            <div id="reportsChart"></div>
                            <div class="table-responsive mt-2 overflow-x: auto;">
                                <div class="scroll-table">
                                    <table id="example" class="display" style="width:100%">
                                        <thead class="custom-th">
                                            <tr>
                                                <th>Day</th>
                                                <th>Date</th>
                                                <th>In</th>
                                                <th>Out</th>
                                                <th>Total WH</th>
                                                <th>Late</th>
                                                <th>Absent</th>
                                                <th>OT</th>
                                                <th>Remarks</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $today = \Carbon\Carbon::now();
                                                $startDate = $today->copy()->subDays(7);
                                                $endDate = $today->copy();

                                                $saturday = $today->copy()->subDays($today->dayOfWeek - 6);
                                                $sunday = $today->copy()->subDays($today->dayOfWeek - 7);

                                                $absensiInRange = $absensi->filter(function ($data) use ($startDate, $endDate, $saturday, $sunday) {
                                                    $tanggal = \Carbon\Carbon::parse($data->tanggal);
                                                    if ($tanggal->between($startDate, $endDate)) {
                                                        return true;
                                                    }
                                                    if ($tanggal->isSameDay($saturday) || $tanggal->isSameDay($sunday)) {
                                                        return !empty($data->ot);
                                                    }
                                                    return false;
                                                })->unique('tanggal')->sortByDesc('tanggal')->values();
                                            @endphp
                                            @forelse ( $absensiInRange as $data )
                                            <tr>
                                                <td>{{ \Carbon\Carbon::parse($data->tanggal)->translatedFormat('l') }}</td>
                                                <td>{{ $data->tanggal }}</td>
                                                <td>{{ $data->jam_masuk ? date('H:i', strtotime($data->jam_masuk)) : '-' }}</td>
                                                <td>{{ $data->jam_keluar ? date('H:i', strtotime($data->jam_keluar)) : '-' }}</td>
                                                <td>
                                                    @php
                                                    if ($data->jam_masuk == '00:00' && $data->jam_keluar == '00:00' || $data->jam_masuk == '00.00' && $data->jam_keluar == '00.00' || $data->jam_masuk == null && $data->jam_keluar == null) {
                                                        $totalWh = '00:00';
                                                    }else {
                                                        $jamKeluar = new DateTime($data->jam_keluar);
                                                        $jamKeluarBatas = new DateTime('17:00');
                                                        $jamKeluarBatasLanjutan = new DateTime('17:00');
                                                        $totalWhBatas = new DateTime('08:00');

                                                        if ($jamKeluar < $jamKeluarBatas) {
                                                            $totalWh = '08:00';
                                                        } elseif ($jamKeluar > $jamKeluarBatasLanjutan) {
                                                            $totalWh = '08:00';
                                                        } else {
                                                            $selisih = $jamKeluar->diff($jamKeluarBatas);
                                                            $totalWh = $selisih->format('%H:%I');
                                                        }

                                                        $jamMasuk = new DateTime($data->jam_masuk);
                                                        $jamMasukBatas = new DateTime('08:05');

                                                        if ($jamMasuk > $jamMasukBatas) {
                                                            $telat = $jamMasuk->diff($jamMasukBatas);
                                                            $telatFormatted = $telat->format('%H:%I');

                                                            $telatInMinutes = $telat->format('%i');
                                                            $telatInHours = $telat->format('%H');
                                                            $totalWh = $totalWhBatas->sub(new DateInterval('PT' . $telatInHours . 'H' . $telatInMinutes . 'M'))->format('H:i');
                                                        } else {
                                                            $telatFormatted = '00:00';
                                                        }
                                                    }
                                                    $data->total_wh = $totalWh;
                                                    $data->save();
                                                @endphp
                                                {{ $totalWh }}
                                                </td>
                                                <td>
                                                    @php
                                                        $jamMasuk = new DateTime($data->jam_masuk);
                                                        $jamKeluar = new DateTime($data->jam_keluar);
                                                        $jamMasukBatas = new DateTime('08:05:00');

                                                        if ($data->jam_masuk == '00:00' && $data->jam_keluar == '00:00' || $data->jam_masuk == null && $data->jam_keluar == null) {
                                                            $telatFormatted = '00:00';
                                                        }
                                                        elseif ($jamMasuk > $jamMasukBatas) {
                                                            $telat = $jamMasuk->diff($jamMasukBatas);
                                                            $telatFormatted = $telat->format('%H:%I');
                                                        } else {
                                                            $telatFormatted = '00:00';
                                                        }
                                                        $data->late = $telatFormatted;
                                                        $data->save();
                                                    @endphp
                                                        {{ $telatFormatted}}
                                                </td>
                                                <td>
                                                    @php
                                                        $absent = '08:00';
                                                        if (empty($data->jam_masuk) && empty($data->jam_keluar)) {
                                                            $absent = '08:00';
                                                        }
                                                        elseif($data->jam_masuk == '00:00' && $data->jam_keluar == '00:00' || $data->jam_masuk == '00.00' && $data->jam_keluar == '00.00' || $data->total_wh == '00:00') {
                                                            $absent = '08:00';
                                                        } else {
                                                            $absent = '00:00';
                                                        }
                                                        if (in_array(date('D', strtotime($data->tanggal)), ['Sat', 'Sun']) && $absent == '08:00') {
                                                            $absent = '00:00';
                                                        }
                                                        $data->absent = $absent;
                                                        $data->save();
                                                    @endphp
                                                        {{ $absent }}
                                                </td>
                                                <td>{{ $data->ot ?? '-' }}</td>
                                                <td>{{ $data->remarks ?? '' }}</td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="9">No data available in table</td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

      <!-- Right side columns -->
      <div class="col-lg-4">
        <div class="card" hidden>
            <div class="card-body pb-0">
                <h5 class="card-title">Yang Perlu Kamu Lakukan Saat Ini </h5>
                <div class="activity mb-5">
                    <div class="activity-item d-flex">
                        <i class='bi bi-circle-fill activity-badge text-muted align-self-start'></i>
                        <div class="activity-content">
                            Tes
                        </div>
                    </div>
                    <div class="activity-item d-flex">
                        <i class='bi bi-circle-fill activity-badge text-muted align-self-start'></i>
                        <div class="activity-content">
                            Tes2
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card text-white  card-balance">
            <div class="card-body pb-0">
                <div class="row mt-2">
                    <div class="col" style="border-right: 2px solid white; ">
                        <div class="icon">
                            <h3 class="custom1 border">
                                <span class="saldo-cuti" style="font-size: 60px; ">{{ Auth::user()->saldo_cuti ?? '0'}}</span>
                                <span class="" style="font-size: 14px; margin-bottom: 2px">Day's</span>
                            </h3>
                        </div>
                    </div>
                    <div class="col">
                        <div class="icon">
                            <a href="{{ route('viewCreateAnnual')}}" style="text-decoration: none;  color: inherit;"><i class="bi bi-journals jurnalcss" style="font-size: 5rem;"></i></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col" style="border-right: 2px solid white; ">
                        <p class="card-text" style="text-align: center;">Annual Leave Balance</p>
                    </div>
                    <div class="col">
                        <p class="leave-form" style="font-size: 12px; text-align: center">Annual Leave Form</p>
                    </div>
                </div>
                <div class="row mt-2 mb-2">
                    {{-- /annual-leave --}}
                    <a href="{{ route('viewLeaveList')}}" class="btn btn-light text-class text-center" style="border-radius: 8px; padding: 5px 15px; text-decoration: none; ">
                        More info <i class="fa-solid fa-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Website Traffic -->
        <div class="card" hidden>
          <div class="card-body pb-0">
            <h5 class="card-title">Leave Traffic</h5>

            <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

            <script>
              document.addEventListener("DOMContentLoaded", () => {
                echarts.init(document.querySelector("#trafficChart")).setOption({
                  tooltip: {
                    trigger: 'item'
                  },
                  legend: {
                    top: '5%',
                    left: 'center'
                  },
                  series: [{
                    name: 'Access From',
                    type: 'pie',
                    radius: ['40%', '70%'],
                    avoidLabelOverlap: false,
                    label: {
                      show: false,
                      position: 'center'
                    },
                    emphasis: {
                      label: {
                        show: true,
                        fontSize: '18',
                        fontWeight: 'bold'
                      }
                    },
                    labelLine: {
                      show: false
                    },
                    data: [{
                        value: 1048,
                        name: 'Annual Leave'
                      },
                      {
                        value: 735,
                        name: 'Medical Leave'
                      },
                      {
                        value: 580,
                        name: 'Special Leave'
                      },
                      {
                        value: 484,
                        name: 'Permit'
                      },
                      {
                        value: 300,
                        name: 'Video Ads'
                      }
                    ]
                  }]
                });
              });
            </script>

          </div>
        </div>

        <!-- Internal Memo -->
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Announcement</h5>
            </div>
            <div class="card-body mt-3">
                <div class="announcement">
                    @forelse ( $memoin as $item )
                        <div class="post-item clearfix">
                            <img src="{{ asset('storage/images/Pengumuman/Toa.jpg') }}" alt="#">
                            <h4>{{ $item->title }}</h4>
                            <p class="datetime">{{($item->author)}}, {{ \Carbon\Carbon::parse($item->date)->format('d M y') }}, {{ \Carbon\Carbon::parse($item->date . ' ' . $item->jam, 'Asia/Jakarta')->format('H:i T') }}</p>
                            <p><a href="{{ asset('storage/pdf/Company Announcement/' . $item->files) }}" target="_blank">Click here to open</a></p>
                        </div>
                    @empty
                        <p>There has been no announcement yet</p>
                    @endforelse
                </div>
            </div>
        </div>
        <!-- News & Info -->
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">News &amp; Info</h5>
            </div>
            <div class="card-body mt-3">
                <div class="news">
                    @forelse ( $news as $data )
                        <div class="post-item clearfix">
                            <img src="{{ asset('storage/images/News & Update/' . $data->image) }}" alt="{{ $data->title }}">
                            <h4>{{ $data->title }}</h4>
                            <p class="datetime">{{ \App\Models\User::find($data->user_id)->name }}, {{ \Carbon\Carbon::parse($data->date)->format('d M y') }}, {{ \Carbon\Carbon::parse($data->date . ' ' . $data->time, 'Asia/Jakarta')->format('H:i T') }}</p>
                            <p>{{ Str::limit($data->body, 50) }}</p>
                            <p><a href="{{ route('news.singlepage', ['id' => $data->id])}}" method="get" target="_blank">View More <i class="bi bi-arrow-right-circle"></i></a></p>
                        </div>
                    @empty
                        <p>No News yet</p>
                    @endforelse
                </div>
            </div>
        </div>
      </div><!-- End Right side columns -->
    </div>
</section>
@endsection
