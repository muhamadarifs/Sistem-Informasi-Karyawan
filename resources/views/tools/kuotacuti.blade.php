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
    #example5 {
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
    <h1>Balance of Annual Leave</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Tools</a></li>
        <li class="breadcrumb-item active">Balance of Annual Leave</li>
      </ol>
    </nav>
</div>
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive  mt-2 overflow-x: auto;">
                <div id="paginationContainer">
                    <table id="example5" class="display" style="width:100%" >
                        <thead>
                            <tr>
                                <th  class="text-center align-middle">No</th>
                                <th  class="text-center align-middle">Identity card Employee</th>
                                <th  class="text-center align-middle">Employee Name</th>
                                <th  class="text-center align-middle">Departement</th>
                                <th  class="text-center align-middle">Balance Leave</th>
                                <th  class="text-center align-middle">Group</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ( $user as $use )
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $use->nik ?? '-' }}</td>
                                <td>{{ $use->name ?? '-' }}</td>
                                <td>{{ $use->position->department ?? '-' }}</td>
                                <td>{{ $use->saldo_cuti ?? '-' }}</td>
                                <td>{{ $use->group ?? '-' }}</td>
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
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script>
    $('#example5').DataTable();
    $('#example5_wrapper').css('font-family', 'Nunito, sans-serif');
</script>
@endsection
