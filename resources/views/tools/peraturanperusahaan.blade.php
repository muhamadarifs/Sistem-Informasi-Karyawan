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
    }
    #example2 {
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
    <h1>Company Regulation</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Tools</a></li>
        <li class="breadcrumb-item active">Company Regulation</li>
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
                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#upload-dve"><i class="fa-solid fa-circle-plus"></i> New</a></li>
                    </ul>
                </div>
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title">PT. DVE Marine Engineering</h5>
                        </div>
                        <div class="col button-container">
                            <h5 class="mt-0">
                                <div class="float-end">
                                    <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#upload-dve">
                                        <i class="fa-solid fa-circle-plus" aria-hidden="true" style="margin-right: 5px;"></i> New
                                    </button>
                                </div>
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive  mt-2 overflow-x: auto;">
                        <table id="example" class="display" style="width:100% margin: 0;" >
                            <thead>
                                <tr>
                                    <th class="col" style="text-align: center;">No.</th>
                                    <th class="col-md-2 col-3" style="text-align: center;">Date</th>
                                    <th class="col-md-1 col-3" style="text-align: center;">Time</th>
                                    <th class="col-md-6 col-4" style="text-align: center;">Regulation Files</th>
                                    <th class="col-md-auto col-auto" style="text-align: center;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($PPDVE as $item)
                                <tr>
                                    <td class="col" style="text-align: center;">{{ $loop->iteration }}</td>
                                    <td class="col-md-2 col-3" style="text-align: center;">{{ $item->tanggal}}</td>
                                    <td class="col-md-1 col-3" style="text-align: center;">{{ \Carbon\Carbon::parse($item->jam)->format('H:i') }}</td>
                                    <td class="col-md-6 col-4" style="text-align: center;">
                                        <u><a href="{{ route('viewCompanyDVE',['id' => $item->id]) }}" target="_blank">{{ $item->companyreg_dve }}</a></u>
                                    </td>
                                    <td class="col-md-auto col-auto" style="text-align: center;">
                                        <form id="deletedve-{{ $item->id }}" action="{{ route('pp.deletedve', $item->id) }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                        <a href="#" class="custom-button btn btn-danger btn-margin" rel="noopener noreferrer"  onclick="confirmDeleteDve('{{ $item->companyreg_dve }}',{{ $item->id }})"> Delete</a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td style="text-align: center;">-</td>
                                    <td style="text-align: center;">-</td>
                                    <td style="text-align: center;">-</td>
                                    <td style="text-align: center;">-</td>
                                    <td style="text-align: center;">-</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                        <h6>Menu</h6>
                    </li>
                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#upload-fm"><i class="fa-solid fa-circle-plus"></i> New</a></li>
                    </ul>
                </div>
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title">PT. Feen Marine</h5>
                        </div>
                        <div class="col button-container">
                            <h5 class="mt-0">
                                <div class="float-end">
                                    <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#upload-fm">
                                        <i class="fa-solid fa-circle-plus" aria-hidden="true" style="margin-right: 5px;"></i> New
                                    </button>
                                </div>
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive  mt-2 overflow-x: auto;">
                        <table id="example2" class="display" style="width:100% margin: 0;" >
                            <thead>
                                <tr>
                                    <th class="col" style="text-align: center;">No.</th>
                                    <th class="col-md-2 col-3" style="text-align: center;">Date</th>
                                    <th class="col-md-1 col-3" style="text-align: center;">Time</th>
                                    <th class="col-md-6 col-4" style="text-align: center;">Regulation Files</th>
                                    <th class="col-md-auto col-auto" style="text-align: center;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($PPFM as $items)
                                <tr>
                                    <td class="col" style="text-align: center;">{{ $loop->iteration }}</td>
                                    <td class="col-md-2 col-3" style="text-align: center;">{{ $items->tanggal}}</td>
                                    <td class="col-md-1 col-3" style="text-align: center;">{{ \Carbon\Carbon::parse($items->jam)->format('H:i') }}</td>
                                    <td class="col-md-6 col-4" style="text-align: center;">
                                        <u><a href="{{ route('viewCompanyDVE',['id' => $items->id]) }}" target="_blank">{{ $items->companyreg_fm }}</a></u>
                                    </td>
                                    <td class="col-md-auto col-auto" style="text-align: center;">
                                        <form id="deletefm-{{ $items->id }}" action="{{ route('pp.deletefm', $items->id) }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                        <a href="#" class="custom-button btn btn-danger btn-margin" rel="noopener noreferrer"  onclick="confirmDeleteFM('{{ $items->companyreg_fm}}', {{ $items->id}})"> Delete</a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td style="text-align: center;">-</td>
                                    <td style="text-align: center;">-</td>
                                    <td style="text-align: center;">-</td>
                                    <td style="text-align: center;">-</td>
                                    <td style="text-align: center;">-</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--MODAL-->
        <div class="modal fade" id="upload-dve" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" >
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Upload DVE</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('store.PPDVE') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="col-12 mb-3">
                                    <input type="file" name="companyreg_dve">
                                </div>
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
        <div class="modal fade" id="upload-fm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" >
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Upload FM</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('store.PPFM') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="col-12 mb-3">
                                    <input type="file" name="companyreg_fm">
                                </div>
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
</section>

<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script>
    $('#example').DataTable();
    $('#example_wrapper').css('font-family', 'Nunito, sans-serif');
    $('#example2').DataTable();
    $('#example2_wrapper').css('font-family', 'Nunito, sans-serif');

    // Delete PPDVE
    function Deletedve(PPId) {
        document.getElementById('deletedve-' +PPId).submit();
    }

    function confirmDeleteDve(PPDVE, PPId) {
        event.preventDefault();
        Swal.fire({
            title: 'Confirmation Delete',
            text: 'Are you sure want to delete " ' + PPDVE + ' " ?',
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
                Deletedve(PPId);
            }
        });
    }

    // Delete PPDVE
    function Delete(PPId2) {
        document.getElementById('deletefm-' + PPId2).submit();
    }

    function confirmDeleteFM(PPFM, PPId2) {
        event.preventDefault();
        Swal.fire({
            title: 'Confirmation Delete',
            text: 'Are you sure want to delete " ' + PPFM + ' " ?',
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
                Delete(PPId2);
            }
        });
    }
</script>
@endsection
