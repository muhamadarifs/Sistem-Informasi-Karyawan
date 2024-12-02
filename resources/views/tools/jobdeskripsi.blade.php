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
    #jobDesc {
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
        .custom-button {
            padding: 0.25rem 0.5rem;
            font-size: 0.875rem;
            line-height: 1.5;
            border-radius: 0.2rem;
        }

        .btn-margin {
            margin: 2px;
        }

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
    <h1>Job Description</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Tools</a></li>
        <li class="breadcrumb-item active">Job Description</li>
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
                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#addJobDesc"><i class="bi bi-person-fill-add"></i> Tambah Data</a></li>
                    </ul>
                </div>
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title " style="margin: 0;">Job Description Employee</h5>
                        </div>
                        <div class="col button-container">
                            <h5 class="mt-0">
                                <div class="float-end">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addJobDesc">
                                        <i class="fa-solid fa-plus mr-3"></i> Add Job
                                    </button>
                                </div>
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Tabel Jobdesc -->
                    <div class="table-responsive  mt-2 overflow-x: auto;">
                        <table id="jobDesc" class="display" style="width:100%" >
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Code</th>
                                <th class="text-center">Job Name</th>
                                <th class="text-center">Files</th>
                                <th class="text-center">View PDF</th>
                                <th class="text-center">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @forelse ( $jobdata as $data )
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->job_code }}</td>
                                    <td>{{ $data->job_name }}</td>
                                    <td>{{ $data->job_file }}</td>
                                    <td>
                                        <a href="{{ route('viewPdfJobDesc', ['id' => $data->id]) }}" target="_blank" class="custom-button btn btn-primary btn-margin" rel="noopener noreferrer">View</a>
                                    </td>
                                    <td>
                                        <a class="custom-button btn btn-warning btn-margin" rel="noopener noreferrer" data-bs-toggle="modal" data-bs-target="#editJobModal{{$data->id}}" >Edit</a>
                                        <form id="deletejob-{{ $data->id }}" action="{{ route('job.delete', $data->id) }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                        <a href="#" class="custom-button btn btn-danger btn-margin" rel="noopener noreferrer"  onclick="confirmDelete('{{ $data->job_code}}',{{ $data->id}})"> Delete</a>
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
                        <!-- Modal Edit Job -->
                        @foreach ( $jobdata as $data )
                        <div class="modal fade" id="editJobModal{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Job Deskripsi Karyawan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form method="POST" action="{{ route('job.update', ['id' => $data->id]) }}"  enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-body">
                                        <div class="form-group">
                                            {{-- Job_code --}}
                                            <div class="col-12 mb-3">
                                                <label for="job_code" class="form-label">Code</label>
                                                <input type="text" name="job_code" class="form-control" id="job_code" value="{{ $data->job_code }}"  required>
                                                <div class="invalid-feedback">Mohon, Isi Code Job !</div>
                                            </div>
                                            {{-- Job_name --}}
                                            <div class="col-12 mb-3">
                                                <label for="job_name" class="form-label">Job Name</label>
                                                <input type="text" name="job_name" class="form-control" id="job_name" value="{{ $data->job_name }}"  required>
                                                <div class="invalid-feedback">Mohon, Isi Job Name !</div>
                                            </div>
                                            {{-- Job_files --}}
                                            <div class="col-12 mb-3">
                                                <label for="job_file" class="form-label">Files</label>
                                                <input type="file" name="job_file" class="form-control" id="job_file" value="{{ $data->job_file }}" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        {{-- Tambah data Modal --}}
        <div class="modal fade" id="addJobDesc" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Job Deskripsi Karyawan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('job.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            {{-- Job_code --}}
                            <div class="col-12 mb-3">
                                <label for="job_code" class="form-label">Code</label>
                                <input type="text" name="job_code" class="form-control" id="job_code" placeholder="e.g HR02" required>
                                <div class="invalid-feedback">Mohon, Isi Code Job !</div>
                            </div>
                            {{-- Job_name --}}
                            <div class="col-12 mb-3">
                                <label for="job_name" class="form-label">Job Name</label>
                                <input type="text" name="job_name" class="form-control" id="job_name" placeholder="e.g HR Supervisor" required>
                                <div class="invalid-feedback">Mohon, Isi Job Name !</div>
                            </div>
                            {{-- Job_files --}}
                            <div class="col-12 mb-3">
                                <label for="job_file" class="form-label">Files</label>
                                <input type="file" name="job_file" class="form-control" id="job_file" required>
                                <div class="invalid-feedback">Mohon, File !</div>
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
</section>

<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script>
    $('#jobDesc').DataTable();
    $('#jobDesc_wrapper').css('font-family', 'Nunito, sans-serif');
    // Delete Job Deskripsi
    function Delete(jobId) {
        document.getElementById('deletejob-' + jobId).submit();
    }

    function confirmDelete(jobCode, jobId) {
        Swal.fire({
            title: 'Konfirmasi Delete',
            text: "Apakah Anda yakin ingin menghapus data " + jobCode + " ?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#FF5555',
            cancelButtonColor: '#a0a0a0',
            confirmButtonText: 'Ya, Hapus',
            cancelButtonText: 'Batal',
            customClass: {
                title: 'custom-swal-text',
                content: 'custom-swal-text'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                Delete(jobId);
            }
        });
    }
</script>
@endsection
