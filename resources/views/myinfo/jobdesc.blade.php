@extends('layouts.header-sidebar')

@section('content1')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<style>
    /* dataTables style */
    /* Pagination */
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

    /* end pagination */

    .dataTables_length,
    .dataTables_length select,
    .dataTables_filter {
        margin-bottom: 10px;
        font-size: 15px;
    }

    .dataTables_length select,
    .dataTables_filter input {
        border-radius: 10px!important;
    }

    /* end style datatables */

    /* .row {
        display: flex;
        justify-content: left;
        align-items: center;
        margin-top: 10px;
        font-family: "Poppins", sans-serif;
    } */

    .col-2 {
        font-weight: bold;
        min-width: 100px;
    }
    .dataTables_filter {
        margin-bottom: 10px;
    }

    table {
        border-collapse: collapse;
        width: 100%;
        font-family: "Nunito", sans-serif;
        padding: 0px;
    }
    .card-title
    {
        padding: 10px 0 0 0;
        font-size: 20px;
    }
    th{
        border: none;
    }

    td {
        text-align: center;
        padding: 8px;
    }

    .table-responsive {
        overflow-x: auto;
    }

    .btn-margin {
        margin: 2px;
    }
    .custom-button{
        border-radius: 10px;
        border: none;
    }
    .custom-button:hover{
        border-radius: 10px;
        border: none;
        background-color: #59a9ff;
    }

    /* Responsive */
    @media (max-width: 767px) {
        .table-responsive{
            font-size: 14px;
        }

        /* menyesuaikan button pada perangkat */
        .custom-button {
            padding: 0.25rem 0.5rem;
            font-size: 0.875rem; /* Sesuaikan dengan ukuran yang diinginkan */
            line-height: 1.5;
            border-radius: 0.2rem;
        }
        /* menambahkan ruang pada button */
        .btn-margin {
            margin: 2px;
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
    }

</style>
<div class="pagetitle">
    <h1>Job Description</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
        <li class="breadcrumb-item">My Info</li>
        <li class="breadcrumb-item active">My Job Description</li>
      </ol>
    </nav>
</div><!-- End Page Title -->

<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Job Description</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive mt-2 overflow-x: auto;">
                <table id="example" class="display" style="width:100%" >
                    {{-- table table-striped table-bordered --}}
                <thead>
                    <tr>
                        <th style="text-align: center;">No.</th>
                        <th style="text-align: center;">Code</th>
                        <th style="text-align: center;">Job Name</th>
                        <th style="text-align: center;">Files</th>
                        <th style="text-align: center;">View PDF</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($users as $user) --}}
                    @forelse ( $data as $datas )
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $datas->job_code }}</td>
                            <td>{{ $datas->job_name }}</td>
                            <td>{{ $datas->job_file }}</td>
                            <td>
                                <a href="{{ route('viewPdfJobDesc', ['id' => $datas->id]) }}" target="_blank" class="custom-button btn btn-primary btn-margin align-item:center;" rel="noopener noreferrer">View</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            {{-- <td colspan="6">Belum ada data</td> --}}
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                    @endforelse
                    {{-- @endforeach --}}
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
{{-- <script src="https://cdn.datatables.net/1.13.7/js/dataTables.jqueryui.min.js"></script> --}}
<script>
    // $('#example').DataTable();
    // $('#example_wrapper').css('font-family', 'Nunito, sans-serif');
</script>
@endsection
