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
    .btnaction{
        background-color: #36a4c0;
        color: #ffffff;
        border-style: none;
    }
    .btnaction:hover{
        background-color: #45b5d3;
        color: #ffffff;
        border-style: none;
    }
    .actionbody:hover{
        color: #ffffff;
    }
    .actiontable:hover{
        color: #ffffff;
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
    <h1>Request Data Change</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Tools</a></li>
        <li class="breadcrumb-item active">Request Data Change</li>
      </ol>
    </nav>
</div>
<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title">Request Data Change</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive  mt-2 overflow-x: auto;">
                        <table id="example" class="display" style="width:100%" >
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Department</th>
                                    <th>Changed Data</th>
                                    <th>New Data</th>
                                    <th>File Attachment</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ $item->department}}</td>
                                        <td>{{ $item->data_change }}</td>
                                        <td>{{ $item->newdata }}</td>
                                        <td>
                                            @if($item->pdf_file)
                                                <a href="{{ Storage::url('public/pdf/Submission Data Change/' . $item->user->nik . '-' . str_replace(' ', '-', $item->user->name) . '/' . $item->pdf_file) }}" target="_blank" class="btn btn-danger"><i class="fa-regular fa-file-pdf" style="margin-right: 2px"></i>{{ $item->pdf_file ?? ''}}</a>
                                            @else
                                                No PDF
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->status == null)
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-secondary btnaction dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                  Action
                                                </button>
                                                <ul class="dropdown-menu">
                                                    {{-- <li><a class="dropdown-item actiontable" href="{{ route('employee.index', ['user_id' => $item->user_id]) }} " target="_blank"><i class="bi bi-pencil-square"></i> Employee</a></li> --}}
                                                    <li>
                                                        <a class="dropdown-item actiontable" href="#" onclick="event.preventDefault(); document.getElementById('approve-form-{{ $item->id }}').submit();">
                                                            <i class="bi bi-check-lg"></i>Approve
                                                        </a>
                                                        <form id="approve-form-{{ $item->id }}" action="{{ route('datachange.approve', $item->id )}}" method="POST" style="display: none;">
                                                        @csrf
                                                        </form>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item actiontable" href="#" onclick="event.preventDefault(); document.getElementById('reject-form-{{ $item->id }}').submit();">
                                                            <i class="bi bi-x-lg"></i>Reject
                                                        </a>
                                                        <form id="reject-form-{{ $item->id }}" action="{{ route('datachange.reject', $item->id) }}" method="POST" style="display: none;">
                                                            @csrf
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                            @else
                                                <span style="color: green;">approve</span>
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
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script>
    $('#example').DataTable();
    $('#example_wrapper').css('font-family', 'Nunito, sans-serif');

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
