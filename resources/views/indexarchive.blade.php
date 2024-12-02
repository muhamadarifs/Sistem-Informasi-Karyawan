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
    .card-header{
    }
    .card-title{
        padding: 10px 0 0 0;
        font-size: 20px;
    }

    .row{
        font-family: "Nunito", sans-serif;
        font-size: 16px;
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

    th {
        border: none;
        background-color: #36a4c0;
        color: #ffffff;
    }
    @media (max-width: 767px) {
        .card{
        margin-left: auto;
        margin-right: auto;
        }
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

        .border{
        border: none; /* Menghilangkan border */
        }

        .row{
            font-size: 14px;
        }

        table{
            font-size: 14px;
        }

        .btn{
            font-size: 12px;
            display: flex;
            align-items: center;
        }
        .bi{
            margin-right: 2px;
        }
    }
</style>
<div class="pagetitle">
    <h1>All Form</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
        <li class="breadcrumb-item">My Info</li>
        <li class="breadcrumb-item active">All Form</li>
      </ol>
    </nav>
</div>
<div class="col-12">
    <div class="card">
            <div class="card-header">
                <h5 class="card-title">Certificate Employee</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive overflow-x-auto p-0 w-200">
                    <table id="example" class="display" style="width:100% margin: 0;" >
                        <thead>
                            <tr>
                                <th class="col-md-1 col-1" style="text-align: center;">No.</th>
                                <th class="col-md-2 col-2" style="text-align: center;">Purpose</th>
                                <th class="col-md-2 col-2" style="text-align: center;">File</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ( $data as $datas )
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $datas->keperluan }}</td>
                                <td>
                                    @if ($datas->review_position !== null)
                                        <a href="{{ route('certificate.Form', $datas->id)}}" target="_blank"><i class="fa-solid fa-file-pdf" style="margin-right: 3px;"></i>Click here to download</a>
                                    @else
                                        Form not yet available
                                    @endif
                                </td>
                            </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Request Data Change Histori</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive overflow-x-auto p-0 w-200">
                <table id="example1" class="display" style="width:100% margin: 0;" >
                    <thead>
                        <tr>
                            <th class="col-md-1 col-1" style="text-align: center;">No.</th>
                            <th class="col-md-2 col-2" style="text-align: center;">Name</th>
                            <th class="col-md-2 col-2" style="text-align: center;">Department</th>
                            <th class="col-md-2 col-2" style="text-align: center;">Changed Data</th>
                            <th class="col-md-2 col-2" style="text-align: center;">New Data</th>
                            <th class="col-md-2 col-2" style="text-align: center;">status</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ( $changedata as $data )
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->user->name }}</td>
                            <td>{{ $data->department }}</td>
                            <td>{{ $data->data_change }}</td>
                            <td>{{ $data->newdata }}</td>
                            <td>
                                @if ($data->status == null)
                                    Waiting for approved
                                @else
                                    @if ($data->status == 'Submission of data changes is approved')
                                        <span style="color: green;">{{ $data->status }}</span>
                                    @endif
                                @endif
                            </td>
                        </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="js/sweetalert2@10.js"></script>
<script>
    $('#example').DataTable();
    $('#example_wrapper').css('font-family', 'Nunito, sans-serif');
    $('#example1').DataTable();
    $('#example1_wrapper').css('font-family', 'Nunito, sans-serif');
</script>
@endsection

