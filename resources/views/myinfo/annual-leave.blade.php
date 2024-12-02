@extends('layouts.header-sidebar')

@section('content1')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<style>
    /* dataTables style */
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

    /* end style datatables */

    .border {
        padding: 5px;
    }

    .card-title
    {
        padding: 10px 0 0 0;
        font-size: 20px;
    }

    .row{
        font-family: "Nunito", sans-serif;
        font-size: 16px;
    }

    table {
        border-collapse: collapse;
        width: 100%;
        font-family: "Nunito", sans-serif;
        padding: 0px;
    }

    td {
        padding: 8px;
        text-align: center;
    }

    th{
        border: none;
    }

    .question-mark-icon {
        color: gray;
        cursor: pointer;
    }
    .modal{
        font-family: "Nunito",sans-serif;
    }

    @media (max-width: 767px) {
        .dataTables_length,
        .dataTables_length select{
            padding-top: 3px;
        }

        .dataTables_length,
        .dataTables_length select {
            margin-bottom: 8px;
            font-size: 13px;
        }

        .dataTables_filter{
            margin-bottom: 30px;
            font-size: 13px;
        }

        .border{
        border: none; /* Menghilangkan border */
        }
        .table-responsive{
            font-size: 14px;
        }
        select {
            width: auto; /* Atur lebar elemen select kembali ke lebar aslinya */
            font-size: 10px;
        }
        .row{
            font-size: 14px;
        }

    }

</style>
<div class="pagetitle">
    <h1>Annual Leave Balance</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
        <li class="breadcrumb-item">My Info</li>
        <li class="breadcrumb-item active">My Annual Leave Balance</li>
      </ol>
    </nav>
</div><!-- End Page Title -->

<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Annual Leave Balance</h5>
        </div>
        <div class="card-body">
            <div class="row p-2">
                {{-- kiri --}}
                <div class="col-md-2 col-4 p-1  font-weight-bold ">Employee No</div>
                <div class="col-md-5 col-8 p-1 ">:  {{ Auth()->user()->employee_id }} - {{ Auth()->user()->name }} </div>
                {{-- kanan --}}
                <div class="col-md-2 col-4 p-1  font-weight-bold">Department</div>
                <div class="col-md-3 col-8 p-1">:
                    @if (Auth()->user()->position)
                    {{Auth()->user()->position->department}}
                    @else
                    No Department Assigned
                    @endif
                </div>
                {{-- kiri --}}
                <div class="col-md-2 col-4 p-1  font-weight-bold">Position</div>
                <div class="col-md-5 col-8 p-1">:
                    @if (Auth()->user()->position)
                    {{ Auth()->user()->position->position_name }}
                    @else
                    No Position Assigned
                    @endif
                </div>
                {{-- kanan --}}
                <div class="col-md-2 col-4 p-1  font-weight-bold">Group</div>
                <div class="col-md-3 col-8 p-1">: {{Auth::user()->group}}</div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Pelajari Selengkapnya</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                               {{$message}}
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="table-responsive  mt-2 overflow-x: auto;">
                <table id="example" class="display" style="width:100% margin: 0;" >
                    <thead>
                        <tr>
                            <th class="col-md-1" style="text-align: center;">No.</th>
                            <th class="col-md-1" style="text-align: center;">Periode</th>
                            <th class="col-md-1" style="text-align: center;">Tahun</th>
                            <th class="col-md-2" style="text-align: center;">Saldo diberikan</th>
                            {{-- <th class="col-md-3" style="text-align: center;">Saldo Cuti
                                <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <i class="bi bi-question-circle"></i>
                                </button>
                            </th> --}}
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($annualLeave as $datas)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>
                                {{-- {{$datas->bulan}} --}} <!-- Mengambil data dengan bulan dengan angka -->
                                {{ \Carbon\Carbon::create()->month($datas->bulan)->format('F')}} <!-- Mengambil dan Mengubah data bulan dari angka -> text -->
                            </td>
                            <td>{{$datas->tahun}}</td>
                            <td>{{$datas->saldo_diberikan}}</td>
                            {{-- <td>
                                @if ($datas->saldo_diberikan == 1)
                                    <?php
                                    Auth()->user()->saldo_cuti += 1;
                                    ?>
                                @endif
                                {{Auth()->user()->saldo_cuti }}
                            </td> --}}
                        </tr>
                        @empty
                        <tr>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                {{-- <button type="button" class="btn btn-outline-success text-white" >
                    <a href="{{ route('riwayatSaldoCutiBulanSebelumnya')}}" class="">View History leave balance</a>
                </button> --}}
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="js/sweetalert2@10.js"></script>
<script>
     $('#example').DataTable();
     $('#example_wrapper').css('font-family', 'Nunito, sans-serif');
</script>
@endsection
