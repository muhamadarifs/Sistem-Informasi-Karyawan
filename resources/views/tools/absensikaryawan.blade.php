@extends('layouts.header-sidebar')

@section('content1')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<style>
    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        background: none;
        color: #459fff!important;
        border-radius: 50%;
        border: 1px solid #ccc;
        transition: none!important;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
        background: #459fff;
        color: white!important;
        border: 1px solid #ccc;
        border-radius: 50px;
        margin: 2px;
    }
    .dataTables_wrapper .dataTables_paginate .paginate_button.previous,
    .dataTables_wrapper .dataTables_paginate .paginate_button.next {
        border-radius: 10px;
    }
    /* end pagination */

    .dataTables_info,
    .dataTables_wrapper,
    .dataTables_paginate {
        margin-top: 10px;
        font-size: 15px;
    }

    .dataTables_length,
    .dataTables_length select,
    .dataTables_filter {
        margin-bottom: 20px;
        font-size: 15px;
    }
    .dataTables_length select,
    .dataTables_filter input {
        border-radius: 10px!important;
    }
    #example6 {
        border-collapse: collapse;
        width: 100%;
        font-family: "Nunito", sans-serif;
        /* border: 1px solid #ddd; */
    }

    tr, th, td {
        border: 1px solid #ddd;
        text-align: center;
        padding: 8px;
    }
    th{
        color: #fff;
        background-color: #36a4c0;
        border: 1px solid #b7b7b7;
        text-align: center;
        padding: 8px;
    }
    .table-responsive {
        overflow-x: auto;
    }
    .button-container {
        display: block;
    }

    .filter {
        display: none;
    }
    .card-title{
        padding: 10px 0 0 0;
        font-size: 20px;
    }
    #exportToExcel,
    #exportTemplate {
        margin: 2px;
    }
    .actiondrop:hover{
        color: #36a4c0;
    }
    @media (max-width: 767px) {
        tr, th, td {
            border: 1px solid #ddd;
            text-align: center;
            padding: 8px;
        }
        .table-responsive{
            font-size: 11px;
        }
        .button-container {
            display: none;
        }
        .card-title {
            font-size: 18px;
            padding: 0;
            margin-bottom: 0;
        }
        .filter {
            display: block;
        }


    }
</style>

<div class="pagetitle">
    <h1>Employee Attendance</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Tools</a></li>
        <li class="breadcrumb-item active">Employee Attendance</li>
      </ol>
    </nav>
</div>
<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                @if (Auth::user()->role == 'superadmin')
                <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li class="dropdown-header text-start">
                            <h6>Menu</h6>
                        </li>
                        <li><a class="dropdown-item actiondrop" href="#" data-bs-toggle="modal" data-bs-target="#importAttendance" id="importForm"><i class="fa fa-upload"></i>Import</a></li>
                        <li><a class="dropdown-item actiondrop" href="#" id="exportAttendance2"><i class="fa fa-download"></i>Export</a></li>
                    </ul>
                </div>
                @endif
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title">Attendance</h5>
                        </div>
                        <div class="col button-container">
                            <h5 class="mt-0">
                                @if (Auth::user()->role == 'superadmin')
                                <div class="float-end">
                                    <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#importAttendance" id="importForm">
                                        <i class="fa fa-upload" aria-hidden="true" style="margin-right: 5px;"></i>Import
                                    </button>
                                    <button type="button" class="btn btn-primary mt-2" id="exportAttendance">
                                        <i class="fa fa-download" aria-hidden="true" style="margin-right: 5px;"></i>Export
                                    </button>
                                </div>
                                @endif
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                        <div class="table-responsive  mt-2 overflow-x: auto;">
                            <div id="paginationContainer">
                                <table id="example6" class="display" style="width:100%" >
                                    <thead>
                                        <tr>
                                            <th  class="text-center align-middle">No</th>
                                            <th  class="text-center align-middle">Employee Id</th>
                                            <th  class="text-center align-middle">Name</th>
                                            <th  class="text-center align-middle">Date</th>
                                            <th  class="text-center align-middle">Day</th>
                                            <th  class="text-center align-middle">In</th>
                                            <th  class="text-center align-middle">Out</th>
                                            <th  class="text-center align-middle">Total WH</th>
                                            <th  class="text-center align-middle">Late</th>
                                            <th  class="text-center align-middle">Absent</th>
                                            <th  class="text-center align-middle">OT</th>
                                            <th  class="text-center align-middle">Remarks</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ( $absensi as $data )
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $data->employee_id ?? '-'}}</td>
                                                <td>{{ $data->user->name ?? '-'}}</td>
                                                <td>{{ date('d-m-Y', strtotime($data->tanggal)) }}</td>
                                                <td>{{ \Carbon\Carbon::parse($data->tanggal)->format('D') }}</td>
                                                <td>{{ date('H:i', strtotime($data->jam_masuk)) }}</td>
                                                <td>{{ date('H:i', strtotime($data->jam_keluar)) }}</td>
                                                <td>
                                                    @php
                                                        if ($data->jam_masuk == '00:00' && $data->jam_keluar == '00:00' || $data->jam_masuk == '00.00' && $data->jam_keluar == '00.00' || $data->jam_masuk == null && $data->jam_keluar == null) {
                                                            $totalWh = '00:00';
                                                        }
                                                        else {
                                                            $jamKeluar = new DateTime($data->jam_keluar);
                                                            $jamKeluarBatas = new DateTime('17:00:00');
                                                            $jamKeluarBatasLanjutan = new DateTime('17:00:00');
                                                            $totalWhBatas = new DateTime('08:00:00');

                                                            if ($jamKeluar < $jamKeluarBatas) {
                                                                $totalWh = '08:00';
                                                            } elseif ($jamKeluar > $jamKeluarBatasLanjutan) {
                                                                $totalWh = '08:00';
                                                            } else {
                                                                $selisih = $jamKeluar->diff($jamKeluarBatas);
                                                                $totalWh = $selisih->format('%H:%I');
                                                            }

                                                            $jamMasuk = new DateTime($data->jam_masuk);
                                                            $jamMasukBatas = new DateTime('08:05:00');

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
                                                <td>
                                                    @php
                                                        $ot = $data->ot ?? 0; 

                                                        if (is_null($data->ot)) {
                                                            $data->ot = $ot;
                                                            $data->save();
                                                        }
                                                    @endphp
                                                    {{ $ot }}
                                                </td>
                                                <td>{{ $data->remarks }}</td>
                                            </tr>
                                        @empty
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                </div>
                {{-- MODAL IMPORT attendance --}}
                <div class="modal fade" id="importAttendance" tabindex="-1" role="dialog" aria-labelledby="importAttendanceLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="importAttendanceLabel">Import Attendance Data</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{ route('import.absensi') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                    <div class="form-group">
                                        <label for="importFile"></label>
                                        <input type="file" name="file" class="form-control-file" id="importFile">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Import</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script>
    $('#example6').DataTable();
    $('#example6_wrapper').css('font-family', 'Nunito, sans-serif');

    // Export Absensi JS
    document.getElementById("exportAttendance").addEventListener("click", function() {
        event.preventDefault();
        Swal.fire({
            title: "Select Export",
            html: `
                <button class="btn btn-primary" id="exportToExcel">
                    <i class="fas fa-file-excel" style="margin: 2px;"></i> Attendance Data
                </button>
                <button class="btn btn-info" id="exportTemplate" style="color: #fff;">
                    <i class="fas fa-file-import" style="margin: 2px;"></i> Template Attendance Import
                </button>
            `,
            showCancelButton: true,
            cancelButtonText: "Cancel",
            showConfirmButton: false
            // cancelButtonColor: "#ff0000"
        });

        document.getElementById("exportToExcel").addEventListener("click", function() {
            window.location.href = '{{ route('export.absensi') }}';
            Swal.close();
        });
        document.getElementById("exportTemplate").addEventListener("click", function() {
            window.location.href = '{{ route('Attend.template') }}';
            Swal.close();
        });
    });
    @if(Session::has('success'))
        Swal.fire('Berhasil!', '{{ Session::get('success') }}', 'success');
    @endif

    // Export Absensi2 JS
    document.getElementById("exportAttendance2").addEventListener("click", function() {
        event.preventDefault();
        Swal.fire({
            title: "Select Export",
            html: `
                <button class="btn btn-primary" id="exportToExcel"><i class="bi bi-filetype-xlsx" style="margin: 2px;"></i> Attendance Data</button>
                <button class="btn btn-info" style="color: #fff;" id="exportToExcel"><i class="bi bi-filetype-xlsx" style="margin: 2px; color: #fff;"></i> Template Attendance Import </button>
            `,
            showCancelButton: true,
            cancelButtonText: "Cancel",
            showConfirmButton: false
            // cancelButtonColor: "#ff0000"
        });

        document.getElementById("exportToExcel").addEventListener("click", function() {
            window.location.href = '{{ route('export.absensi') }}';
            Swal.close();
        });
        document.getElementById("exportTemplate").addEventListener("click", function() {
            window.location.href = '{{ route('Attend.template') }}';
            Swal.close();
        });
    });
    @if(Session::has('success'))
        Swal.fire('Berhasil!', '{{ Session::get('success') }}', 'success');
    @endif
</script>
@endsection
