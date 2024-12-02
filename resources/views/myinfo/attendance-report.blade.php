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
    .dataTables_info,
    .dataTables_wrapper,
    .dataTables_paginate {
        margin-top: 10px;
        font-size: 15px;
    }
    .dataTables_length select {
        width: 50px;
    }
    .dataTables_length,
    .dataTables_length select {
        font-size: 15px;
    }
    .dataTables_filter{
        margin-bottom: 20px;
        font-size: 15px;
    }
    .dataTables_wrapper .dataTables_paginate .paginate_button {
        border-radius: 50%;
        margin: 0 5px;
    }
    .dataTables_wrapper .dataTables_paginate .paginate_button.next {
        border-radius: 15px;

    }
    .dataTables_length select,
    .dataTables_filter input {
        border-radius: 10px!important;
    }
    .form-group {
        max-width: 600px;
        margin: auto;
        font-family: "Nunito", sans-serif;
        text-align: center;
        padding: 0;
    }
    .row {
        font-family: "Nunito", sans-serif;
        font-size: 16px;
    }
    .card-body{
        font-family: "Poppins", sans-serif;
    }
    table {
        border-collapse: collapse;
        width: 100%;
        font-family: "Nunito", sans-serif;
        padding: 0px;
    }
    td {
        padding: 8px;
        text-align: center;
    }
    th{
        border: none;
        background-color: #36a4c0;
        color: #ffffff;
    }
    .cust-col {
        flex: 0 0 36%;
        margin: 0 42px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    select,
    input {
        font-size: 16px;
        width: 65%;
        padding: 10px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 5px;
        transition: border-color 0.3s;
    }
    input{
        text-align: center;
    }
    select:focus,
    input:focus {
        outline: none;
        border-color: #007bff;
    }
    .btn-margin {
        margin: 2px;
    }
    .custom-button {
        margin-top: 15px;
        width: 25%;
    }
    .card-title{
        padding: 10px 0 0 0;
        font-size: 20px;
    }
    .float-end{
        padding: 5px 5px 5px 0;
        font-size: 20px;
    }
    .custombtn{
        border-radius: 20px;
        color: white;
        background-color: #459fff;
    }
    .custombtn:hover{
        border-radius: 20px;
        color: white;
        background-color: #59a9ff;
    }
    .modal-footer{
        font-family: "Nunito", sans-serif;
    }
    .filter {
        display: none;
    }
    .button-container {
        display: block;
    }
    .comingsoon{
        margin-top: 20px;
        font-size: 34px;
        color: #899bbd;
        font-weight: 700;
    }
    @media (max-width: 767px) {
        .dataTables_length,
        .dataTables_length select{
            padding-top: 3px;
        }

        .dataTables_length,
        .dataTables_length select {
            margin-bottom: 8px;
            font-size: 13px;
        }

        .dataTables_filter{
            margin-bottom: 30px;
            font-size: 13px;
        }

        .dataTables_length select {
            width: 30px;
        }

        .custom-button {
            font-size: 0.875rem;
            line-height: 1.5;
            border-radius: 0.2rem;
        }

        .btn-margin {
            margin: 2px;
        }

        .row{
            font-size: 14px;
        }

        .table-responsive{
            font-size: 14px;
            padding: 0%;
            width: 100%;
        }
        .cust-col {
            flex: 0 0 36%;
            margin: 0 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        select,
        input {
            font-size: 14px;
            width: 100%;
            padding: 5px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: border-color 0.3s;
        }

        select:focus,
        input:focus {
            outline: none;
            border-color: #007bff;
        }

        .periode{
            font-size: 16px;
            text-align: center;
        }

        .card-title {
            font-size: 18px;
            padding: 0;
            margin-bottom: 0;
        }

        .col-custom {
           padding: 2px;
        }
        .button-container {
            display: none;
        }
        .filter {
            display: block;
        }
    }
</style>
<div class="pagetitle">
    <h1>Attendance Report</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
        <li class="breadcrumb-item">My Info</li>
        <li class="breadcrumb-item active">My Attendance Report</li>
      </ol>
    </nav>
</div>
<section class="section dashboard">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                        <h6>Menu</h6>
                    </li>
                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#DownloadAttendance" id="downloadattendance"><i class="fa-solid fa-download"></i> Download</a></li>
                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#filterModalAttaendance" id="importForm"><i class="bi bi-filter"></i> Filter</a></li>
                    </ul>
                </div>
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title">Attendance</h5>
                        </div>
                        <div class="col button-container">
                            <div class="float-end">
                                <button type="button" class="custombtn btn btn-light " data-bs-toggle="modal" data-bs-target="#DownloadAttendance" id="downloadattendance">
                                    <i class="fa-solid fa-download" style="margin-right: 3px;"></i> Download
                                </button>
                                <button type="button" class="custombtn btn btn-light " data-bs-toggle="modal" data-bs-target="#filterModalAttaendance" id="importForm">
                                    <i class="bi bi-filter"></i> Filter
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row p-2">
                        @if ($data)
                        <div class="col-md-1 col-3 p-1 ">Name</div>
                        <div class="col-md-5 col-8 p-1 ">:  {{ $data->user->employee_id ?? '-'}} - {{ $data->user->name ?? '-' }} </div>
                        <div class="col-md-2 col-3 p-1 ">Position</div>
                        <div class="col-md-4 col-8 p-1 ">:
                            {{$data->user->position_name}}
                        </div>
                        <div class="col-md-1 col-3 p-1 ">Periode</div>
                        <div class="col-md-5 col-8 p-1 ">:
                            {{ $periode_start->format('d M Y') }} - {{ $end_date->format('d M Y') }}
                        </div>
                        <div class="col-md-2 col-3 p-1 ">Department</div>
                        <div class="col-md-3 col-8 p-1 ">:
                            @if ($data->user->position)
                            {{$data->user->position->department ?? '-'}}
                            @else
                            No Department Assigned
                            @endif
                        </div>
                        @else
                            <div class="col-md-1 col-3 p-1">Name</div>
                            <div class="col-md-5 col-8 p-1">: {{ Auth::user()->employee_id}} - {{ Auth::user()->name}} </div>
                            <div class="col-md-2 col-3 p-1">Position</div>
                            <div class="col-md-4 col-8 p-1">: {{Auth::user()->position_name}} </div>
                            <div class="col-md-1 col-3 p-1">Periode</div>
                            <div class="col-md-5 col-8 p-1">: {{ $periode_start->format('d M Y') }} - {{ $end_date->format('d M Y') }}</div>
                            <div class="col-md-2 col-3 p-1">Department</div>
                            <div class="col-md-3 col-8 p-1">: No Department Assigned </div>
                        @endif
                    </div>
                    <hr>
                    <div class="table-responsive overflow-x-auto p-0 w-200">
                        <table id="example" class="display" style="width:100% margin: 0;" >
                            <thead>
                                <tr>
                                    <th style="text-align: center;">Name</th>
                                    <th style="text-align: center;">Date</th>
                                    <th style="text-align: center;">Day</th>
                                    <th style="text-align: center;">In</th>
                                    <th style="text-align: center;">Out</th>
                                    <th style="text-align: center;">Total Work Hours</th>
                                    <th style="text-align: center;">Late</th>
                                    <th style="text-align: center;">Absent</th>
                                    <th style="text-align: center;">OT</th>
                                    <th style="text-align: center;">Remarks</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ( $absensi as $datas )
                                <tr>
                                    <td>{{ $datas->user->name}}</td>
                                    <td>{{ $datas->tanggal ? date('d-m-Y', strtotime($datas->tanggal)) : '' }}</td>
                                    <td>{{ \Carbon\Carbon::parse($datas->tanggal)->format('D') }}</td>
                                    <td>{{ $datas->jam_masuk ? date('H:i', strtotime($datas->jam_masuk)) : '-' }}</td>
                                    <td>{{ $datas->jam_keluar ? date('H:i', strtotime($datas->jam_keluar)) : '-' }}</td>
                                    <td>{{ $datas->total_wh }}</td>
                                    <td>{{ $datas->late }}</td>
                                    <td>{{ $datas->absent }}</td>
                                    <td>{{ $datas->ot ?? '0'}}</td>
                                    <td>{{ $datas->remarks}}</td>
                                </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- Modal Filter --}}
                <div class="modal fade" id="filterModalAttaendance" tabindex="-1" role="dialog" aria-labelledby="filterModalAttaendanceLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="filterModalAttaendanceLabel">Filter Attendance</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('attend.filter') }}" method="post">
                                @csrf
                                <div class="container">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col p-0 col-custom ">
                                                <label for="start_date">Start Date :</label><br>
                                                <input class="inputdate" type="date" id="start_date" name="start_date" value="{{ $periode_start->format('Y-m-d') }}">
                                            </div>
                                            <div class="col p-0 col-custom ">
                                                <label for="end_date">End Date :</label><br>
                                                <input class="inputdate" type="date" id="end_date" name="end_date" value="{{ $end_date->format('Y-m-d') }}" readonly style="background-color: #e9ecef; opacity: 1; color: #495057; pointer-events: none;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" id="viewButton">Filter</button>
                            </div>
                                </form>
                        </div>
                    </div>
                </div>
                {{-- Modal Download --}}
                <div class="modal fade" id="DownloadAttendance" tabindex="-1" role="dialog" aria-labelledby="DownloadAttendanceLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="DownloadAttendanceLabel">Download Attendance</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            @if (Auth::check())
                                @if(Auth::user()->employee_id >= 200000)
                                    <div class="modal-body">
                                        <form action="{{ route('attend.download.dve') }}" method="GET" target="_blank">
                                        @csrf
                                        <div class="container">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col p-0 col-custom ">
                                                        <label for="start_date">Start Date :</label><br>
                                                        <input class="inputdate" type="date" id="start_date1" name="start_date" value="{{ $periode_start->format('Y-m-d') }}">
                                                    </div>
                                                    <div class="col p-0 col-custom ">
                                                        <label for="end_date" style="pointer-events: none;">End Date :</label><br>
                                                        <input class="inputdate" type="date" id="end_date1" name="end_date" value="{{ $end_date->format('Y-m-d') }}" readonly style="background-color: #e9ecef; opacity: 1; color: #495057; pointer-events: none;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" id="viewButton">Download</button>
                                    </div>
                                        </form>
                                @else
                                    <div class="modal-body">
                                        <form action="{{ route('attend.download.fm') }}" method="GET" target="_blank">
                                        @csrf
                                        <div class="container">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col p-0 col-custom ">
                                                        <label for="start_date">Start Date :</label><br>
                                                        <input class="inputdate" type="date" id="start_date1" name="start_date" value="{{ $periode_start->format('Y-m-d') }}">
                                                    </div>
                                                    <div class="col p-0 col-custom ">
                                                        <label for="end_date" style="pointer-events: none;">End Date :</label><br>
                                                        <input class="inputdate" type="date" id="end_date1" name="end_date" value="{{ $end_date->format('Y-m-d') }}" readonly style="background-color: #e9ecef; opacity: 1; color: #495057; pointer-events: none;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" id="viewButton"> <i class="fa-solid fa-file-pdf " style="margin-right: 3px;"></i>Download</button>
                                    </div>
                                        </form>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- @endif --}}


<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="js/sweetalert2@10.js"></script>
<script>
    $('#example').DataTable();
    $('#example_wrapper').css('font-family', 'Nunito, sans-serif');

    $(document).ready(function() {
        $('#start_date').on('change', function() {
            var startDate = new Date($(this).val());
            startDate.setMonth(startDate.getMonth() + 1);
            startDate.setDate(startDate.getDate() - (startDate.getDate() - 20));
            $('#end_date').val(startDate.toISOString().split('T')[0]);
        });
        $('#start_date').trigger('change');
    });
    $(document).ready(function() {
        $('#start_date1').on('change', function() {
            var startDate = new Date($(this).val());
            startDate.setMonth(startDate.getMonth() + 1);
            startDate.setDate(startDate.getDate() - (startDate.getDate() - 20));
            $('#end_date1').val(startDate.toISOString().split('T')[0]);
        });
        $('#start_date1').trigger('change');
    });

</script>
@endsection
