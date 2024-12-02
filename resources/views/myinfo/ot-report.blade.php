@extends('layouts.header-sidebar')

@section('content1')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<style>
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

    .dataTables_info,
    .dataTables_wrapper,
    .dataTables_paginate {
        margin-top: 10px;
        font-size: 15px;
    }

    /* end pagination */

    .custombtn{
        border-radius: 20px;
        color: white;
        background-color: #459fff;
    }
    .custombtn:hover{
        border-radius: 20px;
        color: white;
        background-color: #59a9ff;
    }

    .row {
        font-family: "Nunito", sans-serif;
        font-size: 16px;
    }

    table {
        border-collapse: collapse;
        width: 100%;
        font-family: "Nunito", sans-serif;
        /* border: 1px solid #b7b7b7; */
    }

    td {
        padding: 8px;
        text-align: center;
    }

    th{
        border: none;
        text-align: center;
    }

    .card-title{
        padding: 10px 0 0 0;
        font-size: 20px;
    }
    .comingsoon{
        margin-top: 20px;
        font-size: 34px;
        color: #899bbd;
        font-weight: 700;
    }

    @media (max-width: 767px) {

        .table-responsive{
            font-size: 14px;
            padding: 0%;
            width: 100%;
        }

    }
</style>
<div class="pagetitle">
    <h1>OT Hours Report</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
        <li class="breadcrumb-item">My Info</li>
        <li class="breadcrumb-item active">My OT Hours Report</li>
      </ol>
    </nav>
</div>
@if (auth()->user()->role == 'superadmin' || auth()->user()->role == 'admin' || auth()->user()->role == 'staff' || auth()->user()->role == 'nonstaff')
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h5 class="comingsoon" style="text-align: center;">Coming Soon</h5>
        </div>
    </div>
</div>
@else
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <h5 class="card-title"> OT Hours Report</h5>
                </div>
                <div class="col">
                    <div class="float-end">
                        <button type="button" class="custombtn btn btn-light " data-bs-toggle="modal" data-bs-target="#filterModalPayslip" id="importForm">
                            <i class="bi bi-filter"></i> Filter
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row p-2">
                {{-- kiri --}}
                <div class="col-md-2 col-4 p-1 ">Employee No</div>
                <div class="col-md-5 col-8 p-1 ">:  {{ Auth()->user()->employee_id }} - {{ Auth()->user()->name }} </div>
                {{-- kanan --}}
                <div class="col-md-2 col-4 p-1 ">Department</div>
                <div class="col-md-3 col-8 p-1 ">:
                    @if (Auth()->user()->position)
                    {{Auth()->user()->position->department}}
                    @else
                    No Department Assigned
                    @endif
                </div>
                {{-- kiri --}}
                <div class="col-md-2 col-4 p-1 ">Position</div>
                <div class="col-md-5 col-8 p-1 ">:
                    @if (Auth()->user()->position)
                    {{ Auth()->user()->position->position_name }}
                    @else
                    No Position Assigned
                    @endif
                </div>
                {{-- kanan --}}
                <div class="col-md-2 col-4 p-1 ">Group</div>
                <div class="col-md-3 col-8 p-1 ">: {{Auth::user()->group}}</div>
            </div>
            <hr>
            <div class="table-responsive overflow-x-auto p-0">
                <table id="example" class="display" style="width:100%" >
                    <thead>
                        <tr>
                            <th colspan="1" rowspan="2" scope="colgroup" class="text-center align-middle">Date</th>
                            <th colspan="1" rowspan="2" scope="colgroup" class="text-center align-middle">Day</th>
                            <th colspan="1" rowspan="2" scope="colgroup" class="text-center align-middle">Shift Code</th>
                            <th colspan="1" rowspan="2" scope="colgroup" class="text-center align-middle">OT Hours</th>
                            <th colspan="4" scope="colgroup" style="text-align: center;">OT Rate</th>
                            <th colspan="1" rowspan="2" scope="colgroup" class="text-center align-middle">Total OT Rate</th>
                            <th colspan="1" rowspan="2" scope="colgroup" class="text-center align-middle">Total Worked Hour</th>
                        </tr>
                        <tr>
                            <th scope="col">1.5</th>
                            <th scope="col">2</th>
                            <th scope="col">3</th>
                            <th scope="col">4</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td rowspan="1">21-Oct-2023</td>
                            <td>Saturday</td>
                            <td>002</td>
                            <td>8</td>
                            <td>0</td>
                            <td>16</td>
                            <td>0</td>
                            <td>0</td>
                            <td>16</td>
                            <td>8</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endif


<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="js/sweetalert2@10.js"></script>
<script>
    $('#example').DataTable();
    $('#example_wrapper').css('font-family', 'Nunito, sans-serif');
</script>
@endsection
