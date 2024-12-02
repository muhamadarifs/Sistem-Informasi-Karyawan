@extends('layouts.header-sidebar')

@section('content1')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<style>
    /* datTable Style */
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
    /* End dataTable Style */
    .modal {
        font-family: "Nunito", sans-serif;
    }
    #example6 {
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
    <h1>News & Info</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Tools</a></li>
        <li class="breadcrumb-item active">News & Info</li>
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
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title">News and Info</h5>
                        </div>
                        <div class="col button-container">
                            <h5 class="mt-0">
                                <div class="float-end">
                                    <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#addnews">
                                        <i class="fa-solid fa-circle-plus" aria-hidden="true" style="margin-right: 5px;"></i> New
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
                                            <th  class="text-center align-middle">No</th>
                                            <th  class="text-center align-middle">Image</th>
                                            <th  class="text-center align-middle">Title</th>
                                            <th  class="text-center align-middle">Body</th>
                                            <th  class="text-center align-middle">Author</th>
                                            <th  class="text-center align-middle">Date</th>
                                            <th  class="text-center align-middle">Time</th>
                                            <th  class="text-center align-middle">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ( $news as $data )
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td><img src="{{ asset('storage/images/News & Update/' . $data->image) }}" style="max-width: 100px;"></td>
                                                <td>{{ $data->title }}</td>
                                                <td>{{ Str::limit($data->body, 50) }}</td>
                                                <td>{{ $data->user->name}}</td>
                                                <td>{{ $data->date }}</td>
                                                <td>{{ date('H:i', strtotime($data->time)) }}</td>
                                                <td>
                                                    <a class="custom-button btn btn-warning btn-margin" rel="noopener noreferrer" data-bs-toggle="modal" data-bs-target="#editnews{{ $data->id }}"><i class="bi bi-pencil-fill"></i></a>
                                                    <form id="deletenews-{{ $data->id }}" action="{{ route('news.delete', $data->id) }}" method="POST" style="display: none;">
                                                        @csrf
                                                    </form>
                                                    <a href="#" class="custom-button btn btn-danger btn-margin" rel="noopener noreferrer"  onclick="confirmDelete('{{ $data->title }}', {{ $data->id }})"> <i class="bi bi-trash3"></i></a>
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
                                                <td>-</td>
                                                <td>-</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>

                {{-- MODAL EDIT --}}
                @foreach ( $news as $data )
                <div class="modal fade" id="editnews{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" >
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit News</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{ route('news.update', ['id' => $data->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                                <div class="modal-body">
                                    <div class="form-group">
                                        {{-- Judul --}}
                                        <div class="col-12 mb-3">
                                            <label for="title" class="form-label">Title</label>
                                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" required
                                            value="{{ $data->title }}">
                                            @error('title')
                                                <div class="invalid-feedback">Please enter a Title !</div>
                                            @enderror
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label for="image" class="form-label">News Image</label>
                                            <img class="img-preview img-fluid mb-3 col-sm-5" src="{{ asset('storage/images/News & Update/' . $data->image) }}" alt="Preview Image" style="max-width: 200px;">
                                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" onchange="previewImage()" value="{{ $data->image }}">
                                            @error('image')
                                                <div class="invalid-feedback">Please enter an image !</div>
                                            @enderror
                                        </div>
                                        {{-- Isian with Trix Editor--}}
                                        <div class="col-12 mb-3">
                                            <label for="body" class="form-label">Description</label>
                                            <textarea id="body" type="text" name="body" class="form-control" required >{{$data->body}}</textarea><!--PR Menampilkan data apabila type nya hidden-->
                                            {{-- <trix-editor input="body"></trix-editor> --}}
                                            <div class="invalid-feedback">Please enter a description !</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
                {{-- Tambah data Modal --}}
                <div class="modal fade" id="addnews" tabindex="-1" aria-labelledby="addnews" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addnews">Add News</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{ route('news.post')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    {{-- Judul --}}
                                    <div class="col-12 mb-3">
                                        <label for="title" class="form-label">Title</label>
                                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" required
                                        value="{{ old('title')}}">
                                        @error('title')
                                            <div class="invalid-feedback">Please enter a Title !</div>
                                        @enderror
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="image" class="form-label">News Image</label>
                                        <img class="img-previewnew img-fluid mb-3 col-sm-5" src="" alt="">
                                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="imagenew" name="image" onchange="previewImageNew()">
                                        @error('image')
                                            <div class="invalid-feedback">Tambahkan Image !</div>
                                        @enderror
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="body" class="form-label">Deskripsi</label>
                                        <textarea type="text" name="body" class="form-control" id="body" required value="{{ old('body')}}" ></textarea><!--maxlength="255"-->
                                        <div class="invalid-feedback">Please enter a description !</div>
                                        {{-- <span id="char-counter"></span> --}}
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
            </div>
        </div>
    </div>

</section>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script>
    document.addEventListener("trix-initialize", function(event) {
        var trix = event.target.editor;
        var bodyValue = document.getElementById("body").value;
        trix.loadHTML(bodyValue);
    });
    $('#example6').DataTable();
    $('#example6_wrapper').css('font-family', 'Nunito, sans-serif');

    function previewImageNew(){
        const image = document.querySelector('#imagenew');
        const imgPreview = document.querySelector('.img-previewnew');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(imagenew.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }

    function previewImage(){
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }


    // Delete NEWS
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
