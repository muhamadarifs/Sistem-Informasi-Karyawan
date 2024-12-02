@extends('layouts.header-sidebar')

@section('content1')
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
    #example1 {
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
    .card-title{
        padding: 10px 0 0 0;
        font-size: 20px;
    }
    form{
        font-family: "Nunito", sans-serif;
    }
    .items:hover{
        color: #ffffff;
    }
</style>
<div class="pagetitle">
    <h1>Company Announcement</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Tools</a></li>
        <li class="breadcrumb-item active">Company Announcement</li>
      </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">
        <!-- Left side columns -->
      <div class="col-lg-8 mx-auto">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title text-center">Company Announcement Form</h5>
                    </div>
                    {{-- <div class="card-body">

                    </div> --}}
                    <div class="card-body mt-3" >
                        <!-- Vertical Form -->
                        <form class="row g-3" id="data-change-form" method="post" action="{{ route('CA.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="col-12">
                                <label for="author" class="form-label" >Author</label>
                                <input type="text" class="form-control" id="author" name="author" value="{{ Auth()->user()->name }}" readonly style="background-color: #e9ecef; opacity: 1; color: #495057; pointer-events: none;">
                            </div>
                            <div class="col-12">
                                <label for="title" class="form-label" >Title</label>
                                <input type="text" class="form-control" id="title" name="title">
                            </div>
                            <div class="col-12">
                                <label for="files" class="form-label" >files
                                    <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="bi bi-question-circle"></i>
                                    </button>
                                </label>
                                <input type="file" class="form-control" id="files" name="files">
                            </div>

                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Pelajari Selengkapnya</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h6 class="model-title"><p>Silahkan Upload pengumuman dalam bentuk PDF</p>
                                            </h6>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Button Form --}}
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary" >Submit</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                        </form><!-- Vertical Form -->
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <table id="example1" class="display" style="width:100%; margin-top: 10px;" >
                            <thead>
                                <tr>
                                    <th  class="text-center align-middle">No</th>
                                    <th  class="text-center align-middle">Date</th>
                                    <th  class="text-center align-middle">Time</th>
                                    <th  class="text-center align-middle">Author</th>
                                    <th  class="text-center align-middle">Title</th>
                                    <th  class="text-center align-middle">File</th>
                                    <th  class="text-center align-middle">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ( $data1 as $data )
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->date }}</td>
                                        <td>{{ date('H:i', strtotime($data->jam)) }}</td>
                                        <td>{{ $data->author }}</td>
                                        <td>{{ $data->title }}</td>
                                        <td>{{ $data->files }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-secondary btnaction dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                  Action
                                                </button>
                                                <ul class="dropdown-menu">
                                                    {{-- <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#EditAnnounc{{$data->id}}"><i class="bi bi-pencil-square"></i> Edit</a></li> --}}
                                                    <form id="deletedata-{{ $data->id}}" action="{{ route('CA.destroy', $data->id) }}" method="POST" style="display: none;">
                                                        @csrf
                                                    </form>
                                                    <li><a class="dropdown-item items" href="#" onclick="Datadelete('{{ $data->title }}', {{ $data->id }})"><i class="bi bi-trash3"></i> Delete</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{-- @foreach ($data1 as $data)
                        <div class="modal fade" id="EditAnnounc{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add Company Announcement</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('update', ['id' => $data->id]) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-6 mb-3">
                                                    <label for="nik" class="form-label">NIK (KTP)</label>
                                                    <input type="number" name="nik" class="form-control" id="nik" value="" required>
                                                    <div class="invalid-feedback">The field cannot be empty !</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                        @endforeach --}}
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script>
    $('#example1_wrapper').css('font-family', 'Nunito, sans-serif');

    function Delete(dataId) {
        document.getElementById('deletedata-' + dataId).submit();
    }

    function Datadelete(dataTitle, dataId) {
        event.preventDefault();
        Swal.fire({
            title: 'Confirmation Delete',
            text: 'Do You Want to Delete " ' + dataTitle + ' " ?',
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
                Delete(dataId);
            }
        });
    }
</script>
@endsection
