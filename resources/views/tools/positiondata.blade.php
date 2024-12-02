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
    #example3 {
        border-collapse: collapse;
        width: 100%;
        font-family: "Nunito", sans-serif;
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

    @media (max-width: 767px) {
        tr, th, td {
            border: 1px solid #ddd;
            text-align: center;
            padding: 8px;
        }
        .card-title {
            font-size: 18px;
            padding: 0;
            margin-bottom: 0;
        }
        .table-responsive{
            font-size: 11px;
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
    <h1>Position Data</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Tools</a></li>
        <li class="breadcrumb-item active">Position Data</li>
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
                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#importModal" id="importForm"><i class="bi bi-file-earmark-arrow-up-fill"></i> Import</a></li>
                    <li><a class="dropdown-item" href="#" id="exportPosition2"><i class="bi bi-file-earmark-arrow-down-fill"></i> Export</a></li>
                    </ul>
                </div>
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title">Positions Data Hierarcy</h5>
                        </div>
                        <div class="col button-container">
                            <h5 class="mt-0">
                                <div class="float-end">
                                    <button type="button" class="btn btn-outline-primary mt-2" data-bs-toggle="modal" data-bs-target="#importModal" id="importForm">
                                        <i class="fas fa-upload" style="margin-right: 4px;"></i>Import
                                    </button>
                                    <div id="import-errors" class="alert alert-danger" style="display: none;"></div>
                                    <button type="button" class="btn btn-outline-primary mt-2" id="exportPosition">
                                        <i class="fas fa-download" style="margin-right: 4px;"></i>Export
                                    </button>
                                </div>
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive  mt-2 overflow-x: auto;">
                        <div id="paginationContainer">
                            <table id="example3" class="display" style="width:100%" >
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Position Code</th>
                                        <th>Position Name</th>
                                        <th>Superior Code</th>
                                        <th>Superior Name</th>
                                        <th>Department</th>
                                        <th>Supervisor</th>
                                        <th>Dept Code</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($position as $data)
                                        <tr>
                                            <td>{{ $data->id }}</td>
                                            <td>{{ $data->position_code }}</td>
                                            <td>{{ $data->position_name }}</td>
                                            <td>{{ $data->superior_code }}</td>
                                            <td>{{ $data->superior_name }}</td>
                                            <td>{{ $data->department }}</td>
                                            <td>{{ $data->a }}</td>
                                            <td>{{ $data->dept_code }}</td>
                                        </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- MODAL IMPORT POSITIONS --}}
                <div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="importModalLabel">Import Data</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{ route('importPosition') }}" method="POST" enctype="multipart/form-data">
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
    $('#example3').DataTable();
    $('#example3_wrapper').css('font-family', 'Nunito, sans-serif');

    // Export Position JS
    document.getElementById("exportPosition").addEventListener("click", function() {
            event.preventDefault();
            Swal.fire({
                title: "Export Position",
                html: `
                    <button class="btn btn-primary" id="exportToExcel">Excel</button>
                `,
                showCancelButton: true,
                cancelButtonText: "Batal",
                showConfirmButton: false
            });

            document.getElementById("exportToExcel").addEventListener("click", function() {
                window.location.href = '{{ route('exportPosition') }}';
                Swal.close();
            });
        });
        @if(Session::has('success'))
            Swal.fire('Berhasil!', '{{ Session::get('success') }}', 'success');
        @endif

        // Export Position2 JS
        document.getElementById("exportPosition2").addEventListener("click", function() {
            event.preventDefault();
            Swal.fire({
                title: "Export Position",
                html: `
                    <button class="btn btn-primary" id="exportToExcel">Excel</button>
                `,
                showCancelButton: true,
                cancelButtonText: "Batal",
                showConfirmButton: false
            });

            document.getElementById("exportToExcel").addEventListener("click", function() {
                window.location.href = '{{ route('exportPosition') }}';
                Swal.close();
            });

        });
        @if(Session::has('success'))
            Swal.fire('Berhasil!', '{{ Session::get('success') }}', 'success');
        @endif
</script>
@endsection
