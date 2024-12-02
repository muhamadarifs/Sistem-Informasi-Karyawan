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
    .model-title{
        font-family: "Nunito", sans-serif;
    }
    #importFile{
        font-family: "Nunito", sans-serif;
    }
    .dropdownlist:hover{
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
    <h1>Qr Code Payslip</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Tools</a></li>
        <li class="breadcrumb-item active">Qr Payslip</li>
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
                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#addqrcode" id="importForm"><i class="bi bi-file-earmark-arrow-up-fill"></i> Import</a></li>
                    </ul>
                </div>
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title">QR Code</h5>
                        </div>
                        <div class="col button-container">
                            <h5 class="mt-0">
                                <div class="float-end">
                                    <button type="button" class="btn btn-primary mt-2 " data-bs-toggle="modal" data-bs-target="#addqrcode" id="importForm">
                                        <i class="fa-solid fa-circle-plus" style="margin-right: 3px;"></i>Add QR
                                    </button>
                                </div>
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
                                            <th class="text-center align-middle">No</th>
                                            <th class="text-center align-middle">Periode</th>
                                            <th class="text-center align-middle">Qr Code</th>
                                            <th class="text-center align-middle">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ( $Qr as $data )
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $data->periode }}</td>
                                                <td>
                                                    <img src="{{ asset('storage/images/QRCodes/' . $data->qrcode) }}" style="width: 100px; height: 100px;">
                                                </td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-secondary btnaction dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                        Action
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <form id="deleteQr-{{ $data->id }}" action="{{ route('destroy.qr', $data->id) }}"  method="POST" style="display: none;">
                                                                @csrf
                                                            </form>
                                                            <li><a class="dropdown-item dropdownlist" href="#" onclick="confirmDelete('{{ $data->periode }}', {{ $data->id }})"><i class="bi bi-trash3" style="margin-right: 3px;"></i>Delete</a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" style="text-align: center">Not Set</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- End of Table Position-->
                </div>
                {{-- MODAL IMPORT attendance --}}
                <div class="modal fade" id="addqrcode" tabindex="-1" role="dialog" aria-labelledby="addqrcodeLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addqrcodeLabel">Add Qr Code</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{ route('store.qr')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                    <div class="col mb-3">
                                        <label for="periodeqr">Periode</label>
                                        <input type="text" name="periode" class="form-control" id="periodeqr" placeholder="e.g. Apr-24">
                                    </div>
                                    <div class="col mb-2">
                                        <label for="importFile"></label>
                                        <input type="file" name="qrcode" class="form-control-file" id="importFile">
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
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

    function Delete(QrId) {
        document.getElementById('deleteQr-' + QrId).submit();
    }

    function confirmDelete(Periode, QrId) {
        event.preventDefault();
        Swal.fire({
            title: 'Confirm delete',
            text: 'Are you sure want to delete data " ' + Periode + ' " ?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#FF5555',
            cancelButtonColor: '#a0a0a0',
            confirmButtonText: 'Yes, Delete',
            cancelButtonText: 'Cancel',
            customClass: {
                title: 'custom-swal-text',
                content: 'custom-swal-text'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                Delete(QrId);
            }
        });
    }
</script>
@endsection
