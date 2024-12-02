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
    #example {
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
    <h1>Employee App</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('viewHRIS') }}">HRIS Application</a></li>
        <li class="breadcrumb-item active">Employee App</li>
      </ol>
    </nav>
</div>
<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                        <h6>Menu</h6>
                    </li>
                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#importAttendance" id="importForm"><i class="bi bi-file-earmark-arrow-up-fill"></i> Import</a></li>
                    <li><a class="dropdown-item" href="#" id="exportAttendance2"><i class="bi bi-file-earmark-arrow-down-fill"></i> Export</a></li>
                    </ul>
                </div>
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title">Attendance</h5>
                        </div>
                        <div class="col button-container">
                            <h5 class="mt-0">
                                <div class="float-end">
                                    <button type="button" class="btn btn-outline-primary mt-2" data-bs-toggle="modal" data-bs-target="#importAttendance" id="importForm">
                                        <i class="bi bi-cloud-arrow-up-fill"></i>Import
                                    </button>
                                    <button type="button" class="btn btn-outline-primary mt-2" id="exportAttendance">
                                        <i class="bi bi-cloud-arrow-down-fill"></i>Export
                                    </button>
                                </div>
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script>
    $('#example').DataTable();
    $('#example_wrapper').css('font-family', 'Nunito, sans-serif');
</script>
@endsection
