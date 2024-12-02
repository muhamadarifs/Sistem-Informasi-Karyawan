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
    .status-cell {
        text-align: center;
        padding: 2px;
        border-radius: 5px;
        font-weight: bold;
        height: 5px;
    }
    .waiting-status {
        color: rgb(216, 216, 0);
        background-color: white;
    }

    .approve-status {
        color: rgb(0, 182, 0);
        background-color: white;
    }

    .reject-status {
        color: red;
        background-color: white;
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
    <h1>Review Annual Leave</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('review.mainindex')}}">Review Form</a></li>
        <li class="breadcrumb-item active">Annual Leave</li>
      </ol>
    </nav>
</div>

<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
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
                                <th style="text-align: center;">Start Date</th>
                                <th style="text-align: center;">End Date</th>
                                <th style="text-align: center;">Back Offie Date</th>
                                <th style="text-align: center;">Contact</th>
                                <th style="text-align: center;">Manager / HOD</th>
                                <th style="text-align: center;">Status</th>
                                <th style="text-align: center;">Date Review</th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($reviewHR  as $items)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $items->user->employee_id }}</td>
                                        <td>{{ $items->user->name }}</td>
                                        <td>{{ $items->department }}</td>
                                        <td>{{ $items->position_name }}</td>
                                        <td>{{ $items->from_date }}</td>
                                        <td>{{ $items->to_date }}</td>
                                        <td>{{ $items->backoffice_date }}</td>
                                        <td>{{ $items->telp }}</td>
                                        <td>{{ $items->superior_code }}</td>
                                        <td class="status-cell {{ strtolower($items->status) }}-status">{{ $items->status}}</td>
                                        @if ($items->review_date)
                                            <td>{{ \Carbon\Carbon::parse($items->review_date)->format('d-m-Y') }}</td>
                                        @else
                                            <td>-</td>
                                        @endif
                                        <td>
                                            @if ($items->review_date == null)
                                                <a href="{{ route('review.cutitahunan', $items->id)}}" class="btn btn-primary">Review</a>
                                            @else
                                                <a href="{{ route('review.cutitahunan', $items->id)}}" class="btn btn-success">Details</a>
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
</section>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script>
    $('#example').DataTable();
    $('#example_wrapper').css('font-family', 'Nunito, sans-serif');
</script>
@endsection
