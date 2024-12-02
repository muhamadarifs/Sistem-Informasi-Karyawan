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
    .waiting-sign {
        color: rgb(216, 184, 0);
        font-weight: bold;
    }

    .created {
        color: rgb(0, 182, 0);
        font-weight: bold;
    }

    /* .reject-status {
        color: red;
        background-color: white;
    } */

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
    <h1>Review Certificate Employee</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('review.mainindex')}}">Review Form</a></li>
        <li class="breadcrumb-item active">Certificate Employee</li>
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
                                <th style="text-align: center;">Purpose</th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($reviewHR  as $items)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $items->user->employee_id  ?? ''}}</td>
                                        <td>{{ $items->user->name  ?? ''}}</td>
                                        <td>{{ $items->user->position->department  ?? ''}}</td>
                                        <td>{{ $items->position  ?? ''}}</td>
                                        <td>{{ $items->keperluan ?? ''}}</td>
                                        <td>
                                            @if ($items->form_number == null)
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$items->id}}">
                                                    create a letter number
                                                </button>
                                            @elseif ($items->create_sign !== null && $items->review_position == null)
                                                <form action="{{ route('certificate.check', $items->id)}}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <button type="submit" class="btn btn-primary">Review Certificate Employee</button>
                                                </form>
                                            @elseif ($items->review_position !== null)
                                                <span class="created">Certificate of Employment Has Created</span>
                                            @else
                                                <span class="waiting-sign">Create Letter Number and Waiting sign from Asst. General Manager-Operational</span>
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
    @foreach ( $reviewHR as $items)
    <div class="modal fade" id="exampleModal{{$items->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Create Letter Number</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('create.letternumber', ['id' => $items->id])}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" value="{{$items->user->name}}" style="background-color: #e9ecef; opacity: 1; color: #495057;" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label for="keperluan" class="form-label">Neccesary</label>
                            <input type="text" class="form-control" id="keperluan" value="{{$items->keperluan}}" style="background-color: #e9ecef; opacity: 1; color: #495057;" readonly>
                        </div>
                    </div>
                </div>
                <label for="nosurat" class="form-label">Letter Number</label>
                <input type="text" class="form-control" name="form_number" id="nosurat" placeholder=" 005/DVE/HRD-SKK/I/2024" required>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Create</button>
            </div>
            </form>
          </div>
        </div>
    </div>
    @endforeach

</section>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script>
    $('#example').DataTable();
    $('#example_wrapper').css('font-family', 'Nunito, sans-serif');
</script>
@endsection
