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
        margin-bottom: 10px;
        font-size: 15px;
    }
    .dataTables_length select,
    .dataTables_filter input {
        border-radius: 10px!important;
    }
    .modal {
        font-family: "Nunito", sans-serif;
    }
    .card-body {
    overflow-x: auto;
    }
    .text {
        display: none;
    }
    .dataTables_filter {
        margin-bottom: 10px;
    }
    #example1 {
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
    th{
        color: #fff;
        background-color: #36a4c0;
        border: 1px solid #b7b7b7;
        text-align: center;
        padding: 8px;
    }

    td{
        border: 1px solid #ddd;
    }
    .table-responsive {
        overflow-x: auto;
    }
    .btn-margin {
        margin: 2px;
    }
    .bi{
        margin-right: 5px;
    }
    .card-title{
        padding: 10px 0 0 0;
        font-size: 20px;
    }

    .button-container {
        display: block;
    }
    .filter {
        padding: 10px 0 0 0;
        display: none;
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
    #exportToExcel,
    #exportToPDF,
    #templateimport {
        margin: 2px;
    }
    .actionbody:hover{
        color: #ffffff;
    }
    .actiontable:hover{
        color: #ffffff;
    }
    .border {
        border: 2px solid #080808;
        border-radius: 10px;
        padding: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        background-color: #fafafa;
    }
    .row{
        margin-bottom: 10px;
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
            padding: 0 0 0 0;
            display: block;
        }
        .row{
            margin-bottom: 10px;
        }
    }
    @media (min-width: 768px) and (max-width: 1199px) {
        .button-container {
            display: none;
        }
        .filter {
            display: block;
        }
        .card-title {
            font-size: 18px;
            padding: 0;
            margin-bottom: 0;
        }
    }
</style>
<div class="pagetitle">
    <h1>Employee</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Tools</a></li>
        <li class="breadcrumb-item active">Employee</li>
      </ol>
    </nav>
</div>
<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                @if (Auth::user()->role == 'superadmin')
                <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li class="dropdown-header text-start">
                            <h6>Menu</h6>
                        </li>
                        <li><a class="dropdown-item actionbody" href="#" data-bs-toggle="modal" data-bs-target="#importuser"><i class="fas fa-upload"></i> Import</a></li>
                        <li><a class="dropdown-item actionbody" href="#" id="exportUser2"><i class="fas fa-download"></i> Export</a></li>
                        {{-- <li><a class="dropdown-item actionbody" href="#" data-bs-toggle="modal" data-bs-target="#addUser" id="adduser"><i class="bi bi-person-fill-add"></i> Add User</a></li> --}}
                            <form action="{{ route('send.userpass') }}" method="POST" style="display: none;" id="credentials">
                                @csrf
                            </form>
                        <li><a class="dropdown-item actionbody" href="#" onclick="sendCredentials()"><i class="fas fa-paper-plane"></i> Send Credentials</a></li>
                    </ul>
                </div>
                @endif

                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title">Employee Data</h5>
                        </div>
                        <div class="col button-container">
                            <h5 class="mt-0">
                                @if (Auth::user()->role == 'superadmin')
                                    <div class="float-end">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#importuser" id="importForm">
                                            <i class="fas fa-upload" style="margin-right: 4px;"></i>Import
                                        </button>
                                        <div id="import-errors" class="alert alert-danger" style="display: none;"></div>
                                        <button type="button" class="btn btn-primary" id="exportUser">
                                            <i class="fas fa-download" style="margin-right: 4px;"></i>Export
                                        </button>
                                        {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUser" id="adduser">
                                            <i class="fas fa-user-plus" style="margin-right: 4px;"></i>Add
                                        </button> --}}
                                        <button type="button" class="btn btn-primary" onclick="sendCredentials()">
                                            <form action="{{ route('send.userpass') }}" method="POST" style="display: none;" id="credentials">
                                                @csrf
                                            </form>
                                            <i class="fas fa-paper-plane" style="margin-right: 4px;"></i>Send Mail
                                        </button>
                                    </div>
                                @endif
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Tabel Data Pengguna -->
                    <div class="table-responsive  mt-2 overflow-x: auto;">
                        <table id="example1" class="display" style="width:100%" >
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>Employee ID</th>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Position Code</th>
                                <th>Dept Code</th>
                                <th>Department</th>
                                <th>Supervisor</th>
                                <th>Division</th>
                                <th>Section</th>
                                <th>Unit</th>
                                <th>Home Base</th>
                                <th>Date Hire</th>
                                <th>Place of Birth</th>
                                <th>Date of Birth</th>
                                <th>Age</th>
                                <th>Gender</th>
                                <th>Address</th>
                                <th>Phone Number</th>
                                <th>Family Status</th>
                                <th>Child</th>
                                <th>Bank Account</th>
                                <th>NPWP</th>
                                <th>BPJS Health Care</th>
                                <th>BPJS Emloyee</th>
                                <th>Basic</th>
                                <th>Allowance</th>
                                <th>Foreman</th>
                                <th>My Allow</th>
                                <th>Other</th>
                                <th>Email</th>
                                <th>Group</th>
                                <th>Education</th>
                                <th>Ras</th>
                                <th>Religion</th>
                                <th>Shirt</th>
                                <th>Shoe</th>
                                <th>Contract Start</th>
                                <th>Finish Contract</th>
                                <th>Date Terminated</th>
                                <th>Reason</th>
                                <th>Status</th>
                                <th>Spouse</th>
                                <th>Spouse Gender</th>
                                <th>Spouse DOB</th>
                                <th>Child 1</th>
                                <th>Child 1 Gender</th>
                                <th>Child 1 DOB</th>
                                <th>Child 2</th>
                                <th>Child 2 Gender</th>
                                <th>Child 2 DOB</th>
                                <th>Child 3</th>
                                <th>Child 3 Gender</th>
                                <th>Child 3 DOB</th>
                                <th>Staff / Non Staff</th>
                                <th>Role</th>
                                <th>Image</th>
                                <th>Balance Annual Leave</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->nik }}</td>
                                    <td>{{ $user->employee_id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->position_name }}</td>
                                    <td>
                                        @if ($user->position)
                                        {{ $user->position->position_code }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        @if ($user->position)
                                        {{ $user->position->dept_code }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        @if ($user->position)
                                        {{ $user->position->department }}
                                        @else
                                            -
                                        @endif
                                    </td>

                                    <td>
                                        @if ($user->position)
                                        {{ $user->position->superior_name }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>{{ $user->division ?? ''}}</td>
                                    <td>{{ $user->section ?? ''}}</td>
                                    <td>{{ $user->unit ?? ''}}</td>
                                    <td>{{ $user->home_base }}</td>
                                    <td>{{ $user->date_hire }}</td>
                                    <td>{{ $user->tempat_lahir }}</td>
                                    <td>{{ $user->tgl_lahir }}</td>
                                    <td>{{ $user->umur }}</td>
                                    <td>{{ $user->jenis_kelamin }}</td>
                                    <td>{{ $user->alamat }}</td>
                                    <td>{{ $user->telp }}</td>
                                    <td>{{ $user->status_keluarga }}</td>
                                    <td>{{ $user->anak }}</td>
                                    <td>{{ $user->bank_account }}</td>
                                    <td>{{ $user->npwp }}</td>
                                    <td>{{ $user->bpjs_kesehatan }}</td>
                                    <td>{{ $user->bpjs_tk }}</td>
                                    <td>{{ $user->basic }}</td>
                                    <td>{{ $user->allowance }}</td>
                                    <td>{{ $user->foreman }}</td>
                                    <td>{{ $user->my_allow }}</td>
                                    <td>{{ $user->other }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->group }}</td>
                                    <td>{{ $user->education }}</td>
                                    <td>{{ $user->ras }}</td>
                                    <td>{{ $user->agama }}</td>
                                    <td>{{ $user->size_baju }}</td>
                                    <td>{{ $user->size_sepatu }}</td>
                                    <td>{{ $user->contract_start }}</td>
                                    <td>{{ $user->finish_contract }}</td>
                                    <td>{{ $user->date_terminated }}</td>
                                    <td>{{ $user->reason }}</td>
                                    <td>{{ $user->status }}</td>
                                    <td>{{ $user->spouse }}</td>
                                    <td>{{ $user->spouse_gender }}</td>
                                    <td>{{ $user->spouse_DOB }}</td>
                                    <td>{{ $user->child1 }}</td>
                                    <td>{{ $user->child1_gender }}</td>
                                    <td>{{ $user->child1_DOB }}</td>
                                    <td>{{ $user->child2 }}</td>
                                    <td>{{ $user->child2_gender }}</td>
                                    <td>{{ $user->child2_DOB }}</td>
                                    <td>{{ $user->child3 }}</td>
                                    <td>{{ $user->child3_gender }}</td>
                                    <td>{{ $user->child3_DOB }}</td>
                                    <td>{{ $user->level }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>{{ $user->image }}</td>
                                    <td>{{ $user->saldo_cuti }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-secondary btnaction dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                Action
                                            </button>

                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item actiontable" href="#" data-bs-toggle="modal" data-bs-target="#view{{$user->id}}"><i class="bi bi-person-lines-fill"></i> Details</a></li>
                                                @if (Auth::user()->role == 'superadmin')
                                                <li><a class="dropdown-item actiontable" href="#" data-bs-toggle="modal" data-bs-target="#EditUser{{$user->id}}"><i class="bi bi-pencil-square"></i> Edit</a></li>
                                                <form id="deleteuser-{{ $user->id}}" action="{{ route('user.delete', $user->id) }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                                <li><a class="dropdown-item actiontable" href="#" onclick="userDelete('{{ $user->name }}', {{ $user->id }})"><i class="bi bi-trash3"></i> Delete</a></li>
                                                @endif
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Modal Import User -->
            <div class="modal fade" id="importuser" tabindex="-1" aria-labelledby="importuserLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="importuserLabel">Import Data User</i></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('importUsers') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="file" name="file" required>
                            </div>
                        </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Import</button>
                            </div>
                    </div>
                    </form>
                </div>
            </div>

            <!-- Modal Add User -->
            {{-- <div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Data User</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('addUser') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="col-12 mb-3">
                                    <label for="nik" class="form-label">NIK (KTP)</label>
                                    <input type="number" name="nik" class="form-control" id="nik" required>
                                    <div class="invalid-feedback">Mohon, Isi Nomor Kependudukan !</div>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="employeeid" class="form-label">Employee Id</label>
                                    <input type="number" name="employee_id" class="form-control" id="employeeid" required>
                                    <div class="invalid-feedback">Mohon, Isi Nomor Karyawan !</div>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="name" class="form-label">Nama Lengkap</label>
                                    <input type="text" name="name" class="form-control" id="name" required>
                                    <div class="invalid-feedback">Mohon, Isi Nama Lengkap !</div>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="jabatan" class="form-label">Posisi <small>(jabatan)</small></label>
                                    <select name="position_id" class="form-select" id="jabatan" required>
                                        <option selected disabled>Select Option</option>
                                        @foreach ($position as $item)
                                            <option value="{{ $item->id }}">{{ $item->position_code }} - {{ $item->position_name }}</small></option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Mohon, Isi Posisi !</div>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="tempat-lahir" class="form-label">tempat Lahir</label>
                                    <input type="text" name="tempat_lahir" class="form-control" id="tempat-lahir" required>
                                    <div class="invalid-feedback">Mohon, Isi Tempat Lahir !</div>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="tgl-lahir" class="form-label">Tanggal Lahir</label>
                                    <input type="date" name="tgl_lahir" class="form-control" id="tgl-lahir" required>
                                    <div class="invalid-feedback">Mohon, Isi Tanggal Lahir !</div>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="gender" class="form-label">Gender <small>(Male / Female)</small></label>
                                    <select name="jenis_kelamin" class="form-select" id="gender" required>
                                        <option selected disabled>Select Option</option>
                                        <option value="Male">Laki-Laki <small>(male)</small></option>
                                        <option value="Female">Perempuan <small>(female)</small></option>
                                    </select>
                                    <div class="invalid-feedback">Mohon, Isi Gender !</div>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" id="email" required>
                                    <div class="invalid-feedback">The field cannot be empty !</div>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="telp" class="form-label">Nomor Telepon</label>
                                    <input type="number" name="telp" class="form-control" id="telp" required>
                                    <div class="invalid-feedback">Mohon, Isi Nomor Telepon !</div>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="alamat" class="form-label">Alamat Rumah</label>
                                    <input type="text" name="alamat" class="form-control" id="alamat" required>
                                    <div class="invalid-feedback">Mohon, Isi Alamat Rumah !</div>
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
            </div> --}}

            <!-- Modal Edit User -->
            @foreach ($users as $user)
            <div class="modal fade" id="EditUser{{$user->id}}" tabindex="-1" aria-labelledby="EditUserLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="EditUserLabel">Edit Data User</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('update', ['id' => $user->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="row">
                                    {{-- NIK KTP --}}
                                    <div class="col-6 mb-3">
                                        <label for="nik" class="form-label">NIK (KTP)</label>
                                        <input type="number" name="nik" class="form-control" id="nik" value="{{ is_numeric($user->nik) ? $user->nik : '0'}}" autocomplete="nik" required>
                                        <div class="invalid-feedback">The field cannot be empty !</div>
                                    </div>
                                    {{-- NIK / employe number --}}
                                    <div class="col-6 mb-3">
                                        <label for="employeeid" class="form-label">Employee ID</label>
                                        <input type="number" name="employee_id" class="form-control" id="employeeid" value="{{ $user->employee_id }}" required>
                                        <div class="invalid-feedback">The field cannot be empty !</div>
                                    </div>
                                    {{-- Nama --}}
                                    <div class="col-6 mb-3">
                                        <label for="name" class="form-label">Employee Name</label>
                                        <input type="text" name="name" class="form-control" id="name" value="{{ $user->name }}" autocomplete="name" required>
                                        <div class="invalid-feedback">The field cannot be empty !</div>
                                    </div>
                                    {{-- Position --}}
                                    <div class="col-6 mb-3">
                                        <label for="jabatan" class="form-label">Position Code <small>(jabatan)</small></label>
                                        <select name="position_id" class="form-select" id="jabatan" required>
                                            <option {{ $user->position ? 'selected' : 'disabled' }}>
                                                {{ $user->position ? $user->position->position_code . ' - ' . $user->position->position_name : '-' }}
                                            </option>
                                            @foreach ($position as $item)
                                                <option value="{{ $item->id }}" {{ $user->position_id == $item->id ? 'selected' : '' }}>{{ $item->position_code }} - {{ $item->position_name }}</small></option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">The field cannot be empty !</div>
                                    </div>
                                    {{-- Position --}}
                                    <div class="col-6 mb-3">
                                        <label for="position" class="form-label">Position Name</label>
                                        <input type="text" name="position_name" class="form-control" id="position" value="{{ $user->position_name ?? '-' }}" autocomplete="off">
                                    </div>
                                    {{-- deptcode --}}
                                    <div class="col-6 mb-3">
                                        <label for="deptcode" class="form-label">Department Code</label>
                                        <input type="text" name="" class="form-control" id="deptcode" value="{{ $user->position ? $user->position->dept_code : '-' }}" readonly style="background-color: #e9ecef; opacity: 1; color: #495057; pointer-events: none;">
                                    </div>
                                    {{-- department --}}
                                    <div class="col-6 mb-3">
                                        <label for="department" class="form-label">Department</label>
                                        <input type="text" name="" class="form-control" id="department" value="{{ $user->position ? $user->position->department : '-'}}" readonly style="background-color: #e9ecef; opacity: 1; color: #495057; pointer-events: none;">
                                    </div>
                                    {{-- Supervisor --}}
                                    <div class="col-6 mb-3">
                                        <label for="supervisor" class="form-label">Supervisor</label>
                                        <input type="text" name="" class="form-control" id="supervisor" value="{{ $user->position ? $user->position->superior_name : '-'}}" readonly style="background-color: #e9ecef; opacity: 1; color: #495057; pointer-events: none;">
                                    </div>
                                    {{-- Home Base --}}
                                    <div class="col-6 mb-3">
                                        <label for="homebase" class="form-label">Home Base</label>
                                        <input type="text" name="home_base" class="form-control" id="homebase" value="{{ $user->home_base ?: '-' }}" required>
                                        <div class="invalid-feedback">The field cannot be empty !</div>
                                    </div>
                                    {{-- tempat Lahir --}}
                                    <div class="col-6 mb-3">
                                        <label for="tempat-lahir" class="form-label">Place of Birth</label>
                                        <input type="text" name="tempat_lahir" class="form-control" id="tempat-lahir" value="{{ $user->tempat_lahir }}" required>
                                        <div class="invalid-feedback">The field cannot be empty !</div>
                                    </div>
                                    {{-- tanggal Lahir --}}
                                    <div class="col-6 mb-3">
                                        <label for="tgl-lahir" class="form-label">Date of Birth</label>
                                        <input type="date" name="tgl_lahir" class="form-control" id="tgl-lahir" value="{{ $user->tgl_lahir }}" required>
                                        <div class="invalid-feedback">The field cannot be empty !</div>
                                    </div>
                                    {{-- Umur --}}
                                    <div class="col-6 mb-3">
                                        <label for="age" class="form-label">Age</label>
                                        <input type="number" name="umur" class="form-control" id="age" value="{{ $user->umur ?: '0'}}" required>
                                        <div class="invalid-feedback">The field cannot be empty !</div>
                                    </div>
                                    {{-- Jenis Kelamin --}}
                                    <div class="col-6 mb-3">
                                        <label for="gender" class="form-label">Gender <small>(Male / Female)</small></label>
                                        <select name="jenis_kelamin" class="form-select" id="gender" required>
                                            <option selected disabled>Select Option</option>
                                            <option value="Male" {{ $user->jenis_kelamin == 'Male' ? 'selected' : '' }}>Laki-Laki <small>(male)</small></option>
                                            <option value="Female" {{ $user->jenis_kelamin == 'Female' ? 'selected' : '' }}>Perempuan <small>(female)</small></option>
                                        </select>
                                        <div class="invalid-feedback">The field cannot be empty !</div>
                                    </div>
                                    {{-- Alamat Rumah --}}
                                    <div class="col-6 mb-3">
                                        <label for="alamat" class="form-label">Address</label>
                                        <textarea type="text" name="alamat" class="form-control" id="alamat" required>{{ $user->alamat }}</textarea>
                                        <div class="invalid-feedback">The field cannot be empty !</div>
                                    </div>
                                    {{-- No. HP --}}
                                    <div class="col-6 mb-3">
                                        <label for="telp" class="form-label">Phone Number</label>
                                        <input type="number" name="telp" class="form-control" id="telp" value="{{ is_numeric($user->telp) ? $user->telp :'0' }}" autocomplete="tel" required>
                                    </div>
                                    {{-- No. HP --}}
                                    <div class="col-6 mb-3">
                                        <label for="emergency_contact" class="form-label">Emergency Contact</label>
                                        <input type="number" name="emergency_contact" class="form-control" id="emergency_contact" value="{{ is_numeric($user->emergency_contact) ? $user->emergency_contact :'0' }}" autocomplete="tel" required>
                                    </div>
                                    {{-- Status Keluarga --}}
                                    <div class="col-6 mb-3">
                                        <label for="statuskeluarga" class="form-label">Family Status</label>
                                        <select name="status_keluarga" class="form-select" id="statuskeluarga" required>
                                            <option selected disabled>Select Option</option>
                                            <option value="Maried" {{ $user->status_keluarga == 'Maried' ? 'selected' : '' }}>Menikah <small>(Maried)</small></option>
                                            <option value="Single" {{ $user->status_keluarga == 'Single' ? 'selected' : '' }}>Belum Nikah <small>(Single)</small></option>
                                        </select>
                                        <div class="invalid-feedback">The field cannot be empty !</div>
                                    </div>
                                    {{-- anak --}}
                                    <div class="col-6 mb-3">
                                        <label for="anak" class="form-label">Child</label>
                                        <input type="number" name="anak" class="form-control" id="anak" value="{{ is_numeric($user->anak) ? $user->anak : '0'}}" >
                                        <div class="invalid-feedback">The field cannot be empty !</div>
                                    </div>
                                    {{-- Bank Account --}}
                                    <div class="col-6 mb-3">
                                        <label for="bank_account" class="form-label">Bank Account</label>
                                        <input type="number" name="bank_account" class="form-control" id="bank_account" value="{{ is_numeric($user->bank_account) ? $user->bank_account : '0'}}" required>
                                        <div class="invalid-feedback">The field cannot be empty !</div>
                                    </div>
                                    {{-- NPWP --}}
                                    <div class="col-6 mb-3">
                                        <label for="npwp" class="form-label">NPWP</label>
                                        <input type="text" name="npwp" class="form-control" id="npwp" value="{{ is_numeric($user->npwp) ? $user->npwp : '0'}}" required>
                                        <div class="invalid-feedback">The field cannot be empty !</div>
                                    </div>
                                    {{-- BPJS Kesehatan --}}
                                    <div class="col-6 mb-3">
                                        <label for="bpjs_kesehatan" class="form-label">BPJS Health</label>
                                        <input type="number" name="bpjs_kesehatan" class="form-control" id="bpjs_kesehatan" value="{{ is_numeric($user->bpjs_kesehatan) ? $user->bpjs_kesehatan : '0'}}" required>
                                        <div class="invalid-feedback">The field cannot be empty !</div>
                                    </div>
                                    {{-- BPJS Ketenagakerjaan --}}
                                    <div class="col-6 mb-3">
                                        <label for="bpjs_tk" class="form-label">BPJS Employee</label>
                                        <input type="number" name="bpjs_tk" class="form-control" id="bpjs_tk" value="{{ is_numeric($user->bpjs_tk) ? $user->bpjs_tk : '0'}}" required>
                                        <div class="invalid-feedback">The field cannot be empty !</div>
                                    </div>
                                    {{-- Basic --}}
                                    <div class="col-6 mb-3">
                                        <label for="basic" class="form-label">Basic</label>
                                        <div class="input-group">
                                            <span class="input-group-text">Rp.</span>
                                            <input type="number" name="basic" class="form-control" id="basic" value="{{ is_numeric($user->basic) ? $user->basic : '0'}}" required>
                                        </div>
                                        <div class="invalid-feedback">The field cannot be empty !</div>
                                    </div>
                                    {{-- Allowance --}}
                                    <div class="col-6 mb-3">
                                        <label for="allowance" class="form-label">Allowance</label>
                                        <div class="input-group">
                                            <span class="input-group-text">Rp.</span>
                                            <input type="number" name="allowance" class="form-control" id="allowance" value="{{ is_numeric($user->allowance) ? $user->allowance : '0'}}" required>
                                        </div>
                                        <div class="invalid-feedback">The field cannot be empty !</div>
                                    </div>
                                    {{-- Foreman --}}
                                    <div class="col-6 mb-3">
                                        <label for="foreman" class="form-label">Foreman</label>
                                        <div class="input-group">
                                            <span class="input-group-text">Rp.</span>
                                            <input type="number" name="foreman" class="form-control" id="foreman" value="{{ is_numeric($user->foreman) ? $user->foreman : '0'}}" required>
                                        </div>
                                        <div class="invalid-feedback">The field cannot be empty !</div>
                                    </div>
                                    {{-- My Allow --}}
                                    <div class="col-6 mb-3">
                                        <label for="my_allow" class="form-label">My Allow</label>
                                        <div class="input-group">
                                            <span class="input-group-text">Rp.</span>
                                            <input type="number" name="my_allow" class="form-control" id="my_allow" value="{{ is_numeric($user->my_allow) ? $user->my_allow : '0'}}" required>
                                        </div>
                                        <div class="invalid-feedback">The field cannot be empty !</div>
                                    </div>
                                    {{-- Other --}}
                                    <div class="col-6 mb-3">
                                        <label for="other" class="form-label">Other</label>
                                        <div class="input-group">
                                            <span class="input-group-text">Rp.</span>
                                            <input type="number" name="other" class="form-control" id="other" value="{{ is_numeric($user->other) ? $user->other : '0'}}" required>
                                        </div>
                                        <div class="invalid-feedback">The field cannot be empty !</div>
                                    </div>
                                    {{-- Alamat email --}}
                                    <div class="col-6 mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control" id="email" value="{{ $user->email }}" autocomplete="email" required>
                                        <div class="invalid-feedback">The field cannot be empty !</div>
                                    </div>
                                    {{-- Group --}}
                                    <div class="col-6 mb-3">
                                        <label for="group" class="form-label">Group</label>
                                        <input type="text" name="group" class="form-control" id="group" value="{{ $user->group ?: '-'}}" required>
                                        <div class="invalid-feedback">The field cannot be empty !</div>
                                    </div>
                                    {{-- Education --}}
                                    <div class="col-6 mb-3">
                                        <label for="education" class="form-label">Education</label>
                                        <input type="text" name="education" class="form-control" id="education" value="{{ $user->education ?: '-'}}" required>
                                        <div class="invalid-feedback">The field cannot be empty !</div>
                                    </div>
                                    {{-- Ras --}}
                                    <div class="col-6 mb-3">
                                        <label for="ras" class="form-label">Race</label>
                                        <input type="text" name="ras" class="form-control" id="ras" value="{{ $user->ras ?: '-'}}" required>
                                        <div class="invalid-feedback">The field cannot be empty !</div>
                                    </div>
                                    {{-- Agama --}}
                                    <div class="col-6 mb-3">
                                        <label for="agama" class="form-label">Religion</label>
                                        <input type="text" name="agama" class="form-control" id="agama" value="{{ $user->agama ?: '-'}}" required>
                                        <div class="invalid-feedback">The field cannot be empty !</div>
                                    </div>
                                    {{-- Baju --}}
                                    <div class="col-6 mb-3">
                                        <label for="size_baju" class="form-label">Clothes Size</label>
                                        <input type="text" name="size_baju" class="form-control" id="size_baju" value="{{ $user->size_baju ?: '-'}}" required>
                                        <div class="invalid-feedback">The field cannot be empty !</div>
                                    </div>
                                    {{-- Sepatu --}}
                                    <div class="col-6 mb-3">
                                        <label for="size_sepatu" class="form-label">Shoe Size</label>
                                        <input type="number" name="size_sepatu" class="form-control" id="size_sepatu" value="{{ is_numeric($user->size_sepatu) ? $user->size_sepatu : '0'}}" required>
                                        <div class="invalid-feedback">The field cannot be empty !</div>
                                    </div>
                                    {{-- date hire --}}
                                    <div class="col-6 mb-3">
                                        <label for="dateofhire" class="form-label">Date Hire</label>
                                        <input type="date" name="date_hire" class="form-control" id="dateofhire" value="{{ $user->date_hire }}" required>
                                        <div class="invalid-feedback">The field cannot be empty !</div>
                                    </div>
                                    {{-- Contract Start --}}
                                    <div class="col-6 mb-3">
                                        <label for="contract_start" class="form-label">Contract Start</label>
                                        <input type="date" name="contract_start" class="form-control" id="contract_start" value="{{ $user->contract_start }}" required>
                                        <div class="invalid-feedback">The field cannot be empty !</div>
                                    </div>
                                    {{-- Finish Contract --}}
                                    <div class="col-6 mb-3">
                                        <label for="finish_contract" class="form-label">Finish Contract</label>
                                        <input type="date" name="finish_contract" class="form-control" id="finish_contract" value="{{ $user->finish_contract }}" required>
                                        <div class="invalid-feedback">The field cannot be empty !</div>
                                    </div>
                                    {{-- Date Terminated --}}
                                    <div class="col-6 mb-3">
                                        <label for="date_terminated" class="form-label">Date Terminated</label>
                                        <input type="date" name="date_terminated" class="form-control" id="date_terminated" value="{{ $user->date_terminated }}" >
                                        <div class="invalid-feedback">The field cannot be empty !</div>
                                    </div>
                                    {{-- Reason --}}
                                    <div class="col-6 mb-3">
                                        <label for="reason" class="form-label">Reason</label>
                                        <input type="text" name="reason" class="form-control" id="reason" value="{{ $user->reason ?: '-'}}" >
                                        <div class="invalid-feedback">The field cannot be empty !</div>
                                    </div>
                                    {{-- Status --}}
                                    <div class="col-6 mb-3">
                                        <label for="status" class="form-label">Status</label>
                                        <select name="status" class="form-select" id="status" required>
                                            <option selected disabled>Select Option</option>
                                            <option value="Active" {{ $user->status == 'Active' ? 'selected' : '' }}>Active</option>
                                            <option value="Inactive" {{ $user->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                        <div class="invalid-feedback">The field cannot be empty !</div>
                                    </div>
                                    {{-- Spouse --}}
                                    <div class="col-12 mb-3">
                                        <label for="spouse" class="form-label">Spouse</label>
                                        <input type="text" name="spouse" class="form-control" id="spouse" value="{{ $user->spouse ?: '-'}}" >
                                        <div class="invalid-feedback">The field cannot be empty !</div>
                                    </div>
                                    {{-- Spouse Gender --}}
                                    <div class="col-6 mb-3">
                                        <label for="spouse_gender" class="form-label">Spouse Gender</label>
                                        <select name="spouse_gender" class="form-select" id="spouse_gender" >
                                            <option selected disabled>Select Option</option>
                                            <option value="Male" {{ $user->spouse_gender == 'Male' ? 'selected' : ($user->spouse_gender === null ? '-' : '') }}>Male</option>
                                            <option value="Female" {{ $user->spouse_gender == 'Female' ? 'selected' : ($user->spouse_gender === null ? '-' : '') }}>Female</option>
                                        </select>
                                        <div class="invalid-feedback">The field cannot be empty !</div>
                                    </div>
                                    {{-- Spouse DOB --}}
                                    <div class="col-6 mb-3">
                                        <label for="spouse_DOB" class="form-label">Spouse DOB</label>
                                        <input type="date" name="spouse_DOB" class="form-control" id="spouse_DOB" value="{{ $user->spouse_DOB !== null ? $user->spouse_DOB : '' }}" >
                                        <div class="invalid-feedback">The field cannot be empty !</div>
                                    </div>
                                    {{-- child1 --}}
                                    <div class="col-12 mb-3">
                                        <label for="child1" class="form-label">Child 1</label>
                                        <input type="text" name="child1" class="form-control" id="child1" value="{{ $user->child1 ?: '-'}}" >
                                        <div class="invalid-feedback">The field cannot be empty !</div>
                                    </div>
                                    {{-- child1 Gender --}}
                                    <div class="col-6 mb-3">
                                        <label for="child1_gender" class="form-label">Child 1 Gender</label>
                                        <select name="child1_gender" class="form-select" id="child1_gender" >
                                            <option selected disabled>Select Option</option>
                                            <option value="Male" {{ $user->child1_gender == 'Male' ? 'selected' : '' }}>Male</option>
                                            <option value="Female" {{ $user->child1_gender == 'Female' ? 'selected' : '' }}>Female</option>
                                        </select>
                                        <div class="invalid-feedback">The field cannot be empty !</div>
                                    </div>
                                    {{-- child1 DOB --}}
                                    <div class="col-6 mb-3">
                                        <label for="child1_DOB" class="form-label">Child 1 DOB</label>
                                        <input type="date" name="child1_DOB" class="form-control" id="child1_DOB" value="{{ $user->child1_DOB }}" >
                                        <div class="invalid-feedback">The field cannot be empty !</div>
                                    </div>
                                    {{-- child2 --}}
                                    <div class="col-12 mb-3">
                                        <label for="child2" class="form-label">Child 2</label>
                                        <input type="text" name="child2" class="form-control" id="child2" value="{{ $user->child2 ?: '-'}}" >
                                        <div class="invalid-feedback">The field cannot be empty !</div>
                                    </div>
                                    {{-- child2 Gender --}}
                                    <div class="col-6 mb-3">
                                        <label for="child2_gender" class="form-label">Child 2 Gender</label>
                                        <select name="child2_gender" class="form-select" id="child2_gender" >
                                            <option selected disabled>Select Option</option>
                                            <option value="Male" {{ $user->child2_gender == 'Male' ? 'selected' : '' }}>Male</option>
                                            <option value="Female" {{ $user->child2_gender == 'Female' ? 'selected' : '' }}>Female</option>
                                        </select>
                                        <div class="invalid-feedback">The field cannot be empty !</div>
                                    </div>
                                    {{-- child2 DOB --}}
                                    <div class="col-6 mb-3">
                                        <label for="child2_DOB" class="form-label">Child 2 DOB</label>
                                        <input type="date" name="child2_DOB" class="form-control" id="child2_DOB" value="{{ $user->child2_DOB }}" >
                                        <div class="invalid-feedback">The field cannot be empty !</div>
                                    </div>
                                    {{-- child3 --}}
                                    <div class="col-12 mb-3">
                                        <label for="child3" class="form-label">Child 3</label>
                                        <input type="text" name="child3" class="form-control" id="child3" value="{{ $user->child3 ?: '-'}}" >
                                        <div class="invalid-feedback">The field cannot be empty !</div>
                                    </div>
                                    {{-- child3 Gender --}}
                                    <div class="col-6 mb-3">
                                        <label for="child3_gender" class="form-label">Child 3 Gender</label>
                                        <select name="child3_gender" class="form-select" id="child3_gender" >
                                            <option selected disabled>Select Option</option>
                                            <option value="Male" {{ $user->child3_gender == 'Male' ? 'selected' : '' }}>Male</option>
                                            <option value="Female" {{ $user->child3_gender == 'Female' ? 'selected' : '' }}>Female</option>
                                        </select>
                                        <div class="invalid-feedback">The field cannot be empty !</div>
                                    </div>
                                    {{-- child3 DOB --}}
                                    <div class="col-6 mb-3">
                                        <label for="child3_DOB" class="form-label">Child 3 DOB</label>
                                        <input type="date" name="child3_DOB" class="form-control" id="child3_DOB" value="{{ $user->child3_DOB }}" >
                                        <div class="invalid-feedback">The field cannot be empty !</div>
                                    </div>
                                    {{-- Staff Non Staff --}}
                                    <div class="col-6 mb-3">
                                        <label for="level" class="form-label">Staff / Non Staff</label>
                                        <select name="level" class="form-select" id="level" required>
                                            <option selected disabled>Select Option</option>
                                            <option value="Staff" {{ $user->level == 'Staff' ? 'selected' : '' }}>Staff</option>
                                            <option value="Non Staff" {{ $user->level == 'Non Staff' ? 'selected' : '' }}>Non Staff</option>
                                        </select>
                                        <div class="invalid-feedback">Mohon, Isi role !</div>
                                    </div>
                                    {{-- role --}}
                                    <div class="col-6 mb-3">
                                        <label for="role" class="form-label">Role</label>
                                        <select name="role" class="form-select" id="role" required>
                                            <option selected disabled>Select Option</option>
                                            <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                                            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                            <option value="superadmin" {{ $user->role == 'superadmin' ? 'selected' : '' }}>Super Admin</option>
                                        </select>
                                        <div class="invalid-feedback">Mohon, Isi role !</div>
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
            @endforeach

            {{-- MODAL DETAILS --}}
            @foreach ( $users as $user )
            <div class="modal fade" id="view{{$user->id}}" tabindex="-1" aria-labelledby="viewLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="viewLabel">User Data "{{$user->name}}"</i></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col">
                                    <div class="col-md-6 col-12">NIK (KTP)</div>
                                    <div class="col-md-10 col-12 border"> {{ $user->nik }}</div>
                                </div>
                                <div class="col">
                                    <div class="col-md-6 col-12">Employee ID</div>
                                    <div class="col-md-10 col-12 border"> {{ $user->employee_id ?? '-' }}</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="col-md-4 col-12">Employee Name</div>
                                    <div class="col-md-10 col-12 border"> {{ $user->name }}</div>
                                </div>
                                <div class="col">
                                    <div class="col-md-4 col-12">Position</div>
                                    <div class="col-md-10 col-12 border"> {{ $user->position->position_code ?? '-' }} - {{ $user->position_name ?? '-' }}</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="col-md-6 col-12">Department Code</div>
                                    <div class="col-md-10 col-12 border"> {{ $user->position->dept_code ?? '-'}}</div>
                                </div>
                                <div class="col">
                                    <div class="col-md-4 col-12">Department</div>
                                    <div class="col-md-10 col-12 border"> {{ $user->position->department ?? '-' }} </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="col-md-6 col-12">Report Code</div>
                                    <div class="col-md-10 col-12 border"> {{ $user->position->superior_code ?? '-'}}</div>
                                </div>
                                <div class="col">
                                    <div class="col-md-4 col-12">Report to</div>
                                    <div class="col-md-10 col-12 border"> {{ $user->position->superior_name ?? '-' }} </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="col-md-6 col-12">Place, Date of Birth</div>
                                    <div class="col-md-10 col-12 border"> {{ $user->tempat_lahir ?? '-' }}, {{ $user->tgl_lahir ? \Carbon\Carbon::parse($user->tgl_lahir)->format('d - F - Y') : '-' }}
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="col-md-6 col-12">Home Base</div>
                                    <div class="col-md-10 col-12 border"> {{ $user->home_base ?? '-' }}</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="col-md-4 col-12">Age</div>
                                    <div class="col-md-10 col-12 border"> {{ $user->umur ?? '-' }}</div>
                                </div>
                                <div class="col">
                                    <div class="col-md-4 col-12">Gender</div>
                                    <div class="col-md-10 col-12 border"> {{ $user->jenis_kelamin ?? '-' }}</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="col-md-4 col-12">Address</div>
                                    <div class="col-md-10 col-12 border"> {{ $user->alamat ?? '-' }}</div>
                                </div>
                                <div class="col">
                                    <div class="col-md-6 col-12">Phone Number</div>
                                    <div class="col-md-10 col-12 border"> {{ $user->telp ?? '-' }}</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="col-md-6 col-12">Mother Name</div>
                                    <div class="col-md-10 col-12 border"> {{ $user->mother_name ?? '-' }}</div>
                                </div>
                                <div class="col">
                                    <div class="col-md-6 col-12">Family Certificate No</div>
                                    <div class="col-md-10 col-12 border"> {{ $user->family_certificate_no ?? '-' }}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="col-md-6 col-12">Family Status</div>
                                    <div class="col-md-10 col-12 border"> {{ $user->status_keluarga ?? '-' }}</div>
                                </div>
                                <div class="col">
                                    <div class="col-md-4 col-12">Child</div>
                                    <div class="col-md-10 col-12 border"> {{ $user->anak ?? '-' }}</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="col-md-6 col-12">Bank Account</div>
                                    <div class="col-md-10 col-12 border"> {{ $user->bank_account ?? '-' }}</div>
                                </div>
                                <div class="col">
                                    <div class="col-md-4 col-12">NPWP</div>
                                    <div class="col-md-10 col-12 border"> {{ $user->npwp ?? '-' }}</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="col-md-6 col-12">BPJS Health Care</div>
                                    <div class="col-md-10 col-12 border"> {{ $user->bpjs_kesehatan ?? '-' }} </div>
                                </div>
                                <div class="col">
                                    <div class="col-md-6 col-12">BPJS Employment</div>
                                    <div class="col-md-10 col-12 border"> {{ $user->bpjs_tk ?? '-' }}</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="col-md-6 col-12">Emergency Contact</div>
                                    <div class="col-md-10 col-12 border"> {{ $user->emergency_contact ?? '0' }}</div>
                                </div>
                                <div class="col">
                                    <div class="col-md-4 col-12">Email</div>
                                    <div class="col-md-10 col-12 border"> {{ $user->email ?? '-' }}</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="col-md-4 col-12">Group</div>
                                    <div class="col-md-10 col-12 border"> {{ $user->group ?? '-' }}</div>
                                </div>
                                <div class="col">
                                    <div class="col-md-4 col-12">Education</div>
                                    <div class="col-md-10 col-12 border"> {{ $user->education ?? '-' }}</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="col-md-4 col-12">Race</div>
                                    <div class="col-md-10 col-12 border"> {{ $user->ras ?? '-' }}</div>
                                </div>
                                <div class="col">
                                    <div class="col-md-4 col-12">Religion</div>
                                    <div class="col-md-10 col-12 border"> {{ $user->agama ?? '-' }}</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="col-md-4 col-12">Clothes Size</div>
                                    <div class="col-md-10 col-12 border"> {{ $user->size_baju ?? '-' }}</div>
                                </div>
                                <div class="col">
                                    <div class="col-md-6 col-12">Shoe Size</div>
                                    <div class="col-md-10 col-12 border"> {{ $user->size_sepatu ?? '-' }}</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="col-md-6 col-12">Start Contract</div>
                                    <div class="col-md-10 col-12 border">{{ $user->contract_start ? date('d-m-Y', strtotime($user->contract_start)) : '-' }}
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="col-md-6 col-12">Finish Contract</div>
                                    <div class="col-md-10 col-12 border">{{ $user->finish_contract ? date('d-m-Y', strtotime($user->finish_contract)) : '-' }}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="col-md-6 col-12">Date of Hire</div>
                                    <div class="col-md-10 col-12 border">
                                        {{ $user->date_hire ? date('d-m-Y', strtotime($user->date_hire)) : '-' }}
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="col-md-6 col-12">Date Terminated</div>
                                    <div class="col-md-10 col-12 border">{{ $user->date_terminated ? date('d-m-Y', strtotime($user->date_terminated)) : '-' }}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="col-md-4 col-12">Reason</div>
                                    <div class="col-md-10 col-12 border">{{ $user->reason ?? '-' }}</div>
                                </div>
                                <div class="col">
                                    <div class="col-md-4 col-12">Status</div>
                                    <div class="col-md-10 col-12 border">{{ $user->status ?? '-' }}</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="col-md-12 col-12">Spouse</div>
                                    <div class="col-md-11 col-12 border">{{ $user->spouse ?? '-' }}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="col-md-6 col-12">Spouse Gender</div>
                                    <div class="col-md-10 col-12 border">{{ $user->spouse_gender ?? '-' }}
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="col-md-6 col-12">Spouse DOB</div>
                                    <div class="col-md-10 col-12 border">{{ $user->spouse_DOB ? date('d-m-Y', strtotime($user->spouse_DOB)) : '-' }}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="col-md-12 col-12">Child</div>
                                    <div class="col-md-11 col-12 border">{{ $user->child1 ?? '-' }}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="col-md-6 col-12">Child Gender</div>
                                    <div class="col-md-10 col-12 border">{{ $user->child1_gender ?? '-' }}
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="col-md-6 col-12">Child DOB</div>
                                    <div class="col-md-10 col-12 border">{{ $user->child1_DOB ? date('d-m-Y', strtotime($user->child1_DOB)) : '-' }}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="col-md-12 col-12">Child 2</div>
                                    <div class="col-md-11 col-12 border">{{ $user->child2 ?? '-' }}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="col-md-6 col-12">Child 2 Gender</div>
                                    <div class="col-md-10 col-12 border">{{ $user->child2_gender ?? '-' }}
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="col-md-6 col-12">Child 2 DOB</div>
                                    <div class="col-md-10 col-12 border">{{ $user->child2_DOB ? date('d-m-Y', strtotime($user->child2_DOB)) : '-' }}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="col-md-12 col-12">Child 3</div>
                                    <div class="col-md-11 col-12 border">{{ $user->child3 ?? '-' }}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="col-md-6 col-12">Child 3 Gender</div>
                                    <div class="col-md-10 col-12 border">{{ $user->child3_gender ?? '-' }}
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="col-md-6 col-12">Child 3 DOB</div>
                                    <div class="col-md-10 col-12 border">{{ $user->child3_DOB ? date('d-m-Y', strtotime($user->child3_DOB)) : '-' }}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="col-md-4 col-12">Staff / Non Staff</div>
                                    <div class="col-md-10 col-12 border"> {{ $user->level ?? '-' }}</div>
                                </div>
                                <div class="col">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script>
    $('#example1').DataTable();
    $('#example1_wrapper').css('font-family', 'Nunito, sans-serif');

    // Export User JS
    document.getElementById("exportUser").addEventListener("click", function() {
        event.preventDefault();
        Swal.fire({
            title: "Export User",
            html: `
                <button class="btn btn-primary" id="exportToExcel"><i class="fas fa-file-excel" style="margin: 2px;"></i> User Data</button>

                <button class="btn btn-success" id="templateimport"><i class="fas fa-file-import" style="margin: 2px;"></i> Template User import</button>
            `,

            showCancelButton: true,
            cancelButtonText: "Batal",
            showConfirmButton: false
        });
        document.getElementById("exportToExcel").addEventListener("click", function() {
            window.location.href = '{{ route('exportUsers') }}';
            Swal.close();
        });
        document.getElementById("templateimport").addEventListener("click", function() {
            window.location.href = '{{ route('user.template') }}';
            Swal.close();
        });
    });
    @if(Session::has('success'))
        Swal.fire('Berhasil!', '{{ Session::get('success') }}', 'success');
    @endif

    // Export User2 JS
    document.getElementById("exportUser2").addEventListener("click", function() {
        event.preventDefault();
        Swal.fire({
            title: "Export User",
            html: `
                <button class="btn btn-primary" id="exportToExcel"><i class="fas fa-file-excel" style="margin: 2px;"></i> User Data</button>

                <button class="btn btn-success" id="templateimport"><i class="fas fa-file-import" style="margin: 2px;"></i> Template User import</button>
            `,

            showCancelButton: true,
            cancelButtonText: "Batal",
            showConfirmButton: false
        });

        document.getElementById("exportToExcel").addEventListener("click", function() {
            window.location.href = '{{ route('exportUsers') }}';
            Swal.close();
        });

        document.getElementById("templateimport").addEventListener("click", function() {
            window.location.href = '{{ route('user.template') }}';
            Swal.close();
        });
    });
    @if(Session::has('success'))
        Swal.fire('Berhasil!', '{{ Session::get('success') }}', 'success');
    @endif

    // Delete User
    function Delete(userId) {
        document.getElementById('deleteuser-' + userId).submit();
    }

    function userDelete(userName, userId) {
        event.preventDefault();
        Swal.fire({
            title: 'Confirmation Delete',
            text: "Do You Want to Delete User " + userName + " ?",
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
                Delete(userId);
            }
        });
    }

    function send() {
        document.getElementById('credentials').submit();
    }

    function sendCredentials() {
        Swal.fire({
            title: 'Confirmation Message',
            text: "Send Email and Password to User by Email ?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#36a4c0',
            cancelButtonColor: '#a0a0a0',
            confirmButtonText: 'Send',
            cancelButtonText: 'Cancel',
            customClass: {
                title: 'custom-swal-text',
                content: 'custom-swal-text'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Sending Email and Password',
                    html: `
                        <div>Please wait...</div>
                        <div class="spinner-grow mt-3" role="status"></div>
                    `,
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    showConfirmButton: false,
                    customClass: {
                        popup: 'swal2-noanimation',
                        backdrop: 'swal2-noanimation',
                        icon: 'swal2-noanimation',
                        spinner: 'swal2-spinner-grow',
                        htmlContainer: 'swal2-noanimation'
                    }
                });
                send();
            }
        });

    }
</script>
@endsection
