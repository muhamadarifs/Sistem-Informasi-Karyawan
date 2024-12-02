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
    .modal {
        font-family: "Nunito", sans-serif;
    }
    .card-body .btn i {
        font-size: 24px;
    }
    .card-body {
    overflow-x: auto;
    }
    .text {
        display: none;
    }
    table {
        border-collapse: collapse;
        width: 100%;
        font-family: "Nunito", sans-serif;
    }
    tr, th, td {
        border: 1px solid #ddd;
        text-align: center;
        padding: 8px;
    }
    th{
        background-color: #36a4c0;
        color: #ffffff;
    }
    .bi{
        font-size: 6px;
    }
    .table-responsive {
        overflow-x: auto;
    }
    .card-title{
        padding: 10px 0 0 0;
        font-size: 20px;
    }

    @media (max-width: 767px) {
        .table-options {
            flex-direction: column;
        }
        .table-search,
        .table-show-entries {
            margin-top: 10px;
        }
        .card-title {
            font-size: 18px;
            padding: 0;
            margin-bottom: 0;
        }
        .table-responsive{
            font-size: 11px;
        }
        tr, th, td {
            border: 1px solid #ddd;
            text-align: center;
            padding: 8px;
        }
        select {
            width: auto;
            font-size: 10px;
        }
    }

</style>
<div class="pagetitle">
    <h1>Special Leave Approval</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
        <li class="breadcrumb-item">Approval List</li>
        <li class="breadcrumb-item active">Special Leave</li>
      </ol>
    </nav>
</div>

<section class="section dashboard">
    <div class="row">
        {{-- supervisor approve --}}
        @if(!in_array(Auth::user()->position->position_code, ['ITD1', 'MGT2', 'HRGA1', 'MGT5', 'FAC1', 'MGT4', 'MGT6', 'PUR1', 'LOG1', 'WHD1', 'MGT7', 'ENI1', 'MGT9', 'MGT3', 'MGT10', 'HSE1', 'DVD1', 'MCN1', 'MGT8']))
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title">List Approve</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive  mt-2 overflow-x: auto;">
                        <table id="example" class="display" style="width:100%" >
                        <thead>
                            <tr>
                                <th style="text-align: center;">No</th>
                                <th style="text-align: center;">Employee ID</th>
                                <th style="text-align: center;">Name</th>
                                <th style="text-align: center;">Department</th>
                                <th style="text-align: center;">Position</th>
                                <th style="text-align: center;">Number Leave Days</th>
                                <th style="text-align: center;">Start Date</th>
                                <th style="text-align: center;">End Date</th>
                                <th style="text-align: center;">Back Office Date</th>
                                <th style="text-align: center;">Phone Number</th>
                                <th style="text-align: center;">File Attachment</th>
                                <th style="text-align: center;">Date Approved</th>
                                <th style="text-align: center;">Form Leave</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $iteration = 1;
                            @endphp
                            @forelse ($cutiBawahan  as $items)
                                <tr>
                                    <td>{{ $iteration }}</td>
                                    <td>{{ $items->user->employee_id }}</td>
                                    <td>{{ $items->user->name }}</td>
                                    <td>{{ $items->department }}</td>
                                    <td>{{ $items->position_name }}</td>
                                    <td>{{ $items->jumlah_hari}}</td>
                                    <td>{{ $items->from_date }}</td>
                                    <td>{{ $items->to_date }}</td>
                                    <td>{{ $items->backoffice_date }}</td>
                                    <td>{{ $items->telp }}</td>
                                    <td>
                                        @if($items->pdf_file)
                                            <a href="{{ Storage::url('public/pdf/Cuti Special/' . str_replace(' ', '_', $items->cuti) . '/' . $items->user->nik . '-' . str_replace(' ', ' ', $items->user->name) . '/' . $items->pdf_file) }}" target="_blank" class="btn btn-danger"><i class="fa-regular fa-file-pdf"></i></a>
                                        @else
                                            No PDF
                                        @endif
                                    </td>
                                    <td>{{$items->approval1_date ? date('d-m-Y', strtotime($items->approval1_date)) : '' }}</td>
                                    <td>
                                        @if ($items->approval1_date !== null)
                                        <a href="{{ route('specialleave.details', $items->id)}}" class="btn btn-success">Check Form</a>
                                        @else
                                        <a href="{{ route('specialleave.form', $items->id)}}" class="btn btn-primary">View</a>
                                        @endif
                                    </td>
                                </tr>
                                @php
                                    $iteration++;
                                @endphp
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endif
        {{-- manager approve --}}
        @if (   Auth::user()->level == 'Developer' ||
                Auth::user()->position->position_code == 'ITD1' ||
                Auth::user()->position->position_code == 'HRGA1' ||
                Auth::user()->position->position_code == 'FAC1' ||
                Auth::user()->position->position_code == 'PUR1' ||
                Auth::user()->position->position_code == 'LOG1' ||
                Auth::user()->position->position_code == 'WHD1' ||
                Auth::user()->position->position_code == 'ENI1' ||
                Auth::user()->position->position_code == 'HSE1' ||
                Auth::user()->position->position_code == 'MCN1' ||
                Auth::user()->position->position_code == 'DVD1' ||
                Auth::user()->position->position_code == 'MGT1' ||
                Auth::user()->position->position_code == 'MGT2' ||
                Auth::user()->position->position_code == 'MGT3' ||
                Auth::user()->position->position_code == 'MGT4' ||
                Auth::user()->position->position_code == 'MGT5' ||
                Auth::user()->position->position_code == 'MGT6' ||
                Auth::user()->position->position_code == 'MGT7' ||
                Auth::user()->position->position_code == 'MGT8' ||
                Auth::user()->position->position_code == 'MGT9' ||
                Auth::user()->position->position_code == 'MGT10'
                )
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title ">List Approve</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive  mt-2 overflow-x: auto;">
                        <table id="example1" class="display" style="width:100%" >
                        <thead>
                            <tr>
                                <th style="text-align: center;">No</th>
                                <th style="text-align: center;">Employee ID</th>
                                <th style="text-align: center;">Name</th>
                                <th style="text-align: center;">Department</th>
                                <th style="text-align: center;">Position</th>
                                <th style="text-align: center;">Number Leave Days</th>
                                <th style="text-align: center;">Start Date</th>
                                <th style="text-align: center;">End Date</th>
                                <th style="text-align: center;">Back Office Date</th>
                                <th style="text-align: center;">Contact</th>
                                <th style="text-align: center;">File Attachment</th>
                                <th style="text-align: center;">Date Approved</th>
                                <th style="text-align: center;">Form Leave</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $iteration = 1;
                            @endphp
                            @forelse ($approve2 as $data)
                                <tr>
                                    <td>{{ $iteration }}</td>
                                    <td>{{ $data->user->employee_id }}</td>
                                    <td>{{ $data->user->name }}</td>
                                    <td>{{ $data->department }}</td>
                                    <td>{{ $data->position_name }}</td>
                                    <td>{{ $data->jumlah_hari}}</td>
                                    <td>{{ $data->from_date }}</td>
                                    <td>{{ $data->to_date }}</td>
                                    <td>{{ $data->backoffice_date }}</td>
                                    <td>{{ $data->telp }}</td>
                                    <td>
                                        @if($data->pdf_file)
                                            <a href="{{ Storage::url('public/pdf/Cuti Special/' . str_replace(' ', '_', $data->cuti) . '/' . $data->user->nik . '-' . str_replace(' ', ' ', $data->user->name) . '/' . $data->pdf_file) }}" target="_blank" class="btn btn-danger"><i class="fa-regular fa-file-pdf"></i></a>
                                        @else
                                            No PDF
                                        @endif
                                    </td>
                                    <td>{{ $data->approval2_date ? date('d-m-Y', strtotime($data->approval2_date)) : '' }}</td>
                                    <td>
                                        @if ($data->approval2_date !== null)
                                        <a href="{{ route('specialleave.details', $data->id)}}" class="btn btn-success">Check Form</a>
                                        @else
                                        <a href="{{ route('specialleave.form', $data->id)}}" class="btn btn-primary">View</a>
                                        @endif
                                    </td>
                                </tr>
                                @php
                                    $iteration++;
                                @endphp
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script>
    $('#example').DataTable();
    $('#example_wrapper').css('font-family', 'Nunito, sans-serif');
    $('#example1').DataTable();
    $('#example1_wrapper').css('font-family', 'Nunito, sans-serif');
    $('#example2').DataTable();
    $('#example2_wrapper').css('font-family', 'Nunito, sans-serif');
</script>
@endsection
