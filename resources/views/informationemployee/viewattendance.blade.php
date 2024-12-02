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
    #example6 {
        border-collapse: collapse;
        width: 100%;
        font-family: "Nunito", sans-serif;
    }
    th{
        color: #fff;
        background-color: #36a4c0;
        border: 1px solid #b7b7b7;
        text-align: center;
        padding: 8px;
    }
    tr, td {
        border: 1px solid #ddd;
        text-align: center;
        padding: 8px;
    }
    .table-responsive {
        overflow-x: auto;
    }
    .btn-margin {
        margin: 2px;
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
    <h1>Attendance Employee</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">HOD Pages</a></li>
        <li class="breadcrumb-item active">Attendance Employee</li>
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
                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#addnews"><i class="fa-solid fa-circle-plus"></i> New</a></li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="table-responsive  mt-2 overflow-x: auto;">
                        <div id="paginationContainer">
                                <table id="example6" class="display" style="width:100%" >
                                    <thead>
                                        <tr>
                                            <th  class="text-center align-middle">No</th>
                                            <th  class="text-center align-middle">Employee ID</th>
                                            <th  class="text-center align-middle">Name</th>
                                            <th  class="text-center align-middle">Date</th>
                                            <th  class="text-center align-middle">In</th>
                                            <th  class="text-center align-middle">Out</th>
                                            <th  class="text-center align-middle">Total WH</th>
                                            <th  class="text-center align-middle">Late</th>
                                            <th  class="text-center align-middle">Absent</th>
                                            <th  class="text-center align-middle">OT</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ( $attendance as $data )
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $data->user->employee_id}}</td>
                                                <td>{{ $data->user->name}}</td>
                                                <td>{{ $data->tanggal }}</td>
                                                <td>{{ date('H:i', strtotime($data->jam_masuk)) }}</td>
                                                <td>{{ date('H:i', strtotime($data->jam_keluar)) }}</td>
                                                <td>{{ date('H:i', strtotime($data->total_wh)) }}</td>
                                                <td>{{ date('H:i', strtotime($data->late)) }}</td>
                                                <td>{{ date('H:i', strtotime($data->absent)) }} </td>
                                                <td>{{ date('H:i', strtotime($data->ot)) }} </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="10">No data have yet</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script>
    $('#example6').DataTable();
    $('#example6_wrapper').css('font-family', 'Nunito, sans-serif');

    function Delete(NewsId) {
        document.getElementById('deletenews-' + NewsId).submit();
    }

    function confirmDelete(Title, NewsId) {
        event.preventDefault();
        Swal.fire({
            title: 'Confirmation Delete',
            text: 'Are you sure want to delete " ' + Title + ' " ?',
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
                Delete(NewsId);
            }
        });
    }
</script>
@endsection
