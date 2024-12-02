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

    .card-title
    {
        padding: 10px 0 0 0;
        font-size: 20px;
        text-align: center;
    }
    .row{
        font-family: "Nunito", sans-serif;
    }
    td{
        font-size: 16px;
    }
    th{
        background-color: #36a4c0;
        color: #FFFFFF;
    }

    @media (max-width: 767px) {
        .row{
            font-size: 14px;
        }

        .table-responsive{
            max-width: 500%;
        }
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
        td{
            font-size: 15px;
        }
    }
</style>
<div class="pagetitle">
    <h1>Company Regulation</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
        <li class="breadcrumb-item">My Info</li>
        <li class="breadcrumb-item active">View Company Regulation</li>
      </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="col-lg-12 mx-auto">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Company Regulation</h5>
                    </div>
                    <div class="card-body">

                        @if(Auth::check())
                            @if(Auth::user()->employee_id >= 200000)
                            <div class="table-responsive  mt-2 overflow-x: auto;">
                                <table id="example" class="display" style="width:100% margin: 0;" >
                                    <thead>
                                        <tr>
                                            <th class="col" style="text-align: center;">No.</th>
                                            <th class="col-md-3 col-4" style="text-align: center;">Company Regulation</th>
                                            <th class="col-md-2 col-3" style="text-align: center;">Date</th>
                                            <th class="col-md-1 col-3" style="text-align: center;">Time</th>
                                            <th class="col-md-6 col-4" style="text-align: center;">Regulation Files</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($companyreg_dve as $item)
                                        <tr>
                                            <td class="col" style="text-align: center;">{{ $loop->iteration }}</td>
                                            <td class="col-md-3 col-4" style="text-align: center;">PT. Dve Marine Engineering</td>
                                            <td class="col-md-2 col-3" style="text-align: center;">{{ date('d-m-Y', strtotime($item->tanggal)) }}</td>
                                            <td class="col-md-1 col-3" style="text-align: center;">{{ \Carbon\Carbon::parse($item->jam)->format('H:i') }}</td>
                                            <td class="col-md-6 col-4" style="text-align: center;">
                                                <u><a href="{{ route('viewCompanyDVE',['id' => $item->id]) }}" target="_blank">{{ $item->companyreg_dve }}</a></u>
                                            </td>
                                        </tr>
                                        @empty
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            @else
                            <div class="table-responsive  mt-2 overflow-x: auto;">
                                <table id="example1" class="display" style="width:100% margin: 0;" >
                                    <thead>
                                        <tr>
                                            <th class="col" style="text-align: center;">No.</th>
                                            <th class="col-md-3 col-4" style="text-align: center;">Company Regulation</th>
                                            <th class="col-md-2 col-3" style="text-align: center;">Date</th>
                                            <th class="col-md-1 col-3" style="text-align: center;">Time</th>
                                            <th class="col-md-6 col-4" style="text-align: center;">Regulation Files</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($companyreg_fm as $items)
                                        <tr>
                                            <td class="col" style="text-align: center;">{{ $loop->iteration }}</td>
                                            <td class="col-md-3 col-4" style="text-align: center;">PT. Feen Marine</td>
                                            <td class="col-md-2 col-3" style="text-align: center;">{{ date('d-m-Y', strtotime($items->tanggal)) }}</td>
                                            <td class="col-md-1 col-3" style="text-align: center;">{{ \Carbon\Carbon::parse($items->jam)->format('H:i') }}</td>
                                            <td class="col-md-6 col-4" style="text-align: center;">
                                                <u><a href="{{ route('viewCompanyFM',['id' => $items->id]) }}" target="_blank">{{ $items->companyreg_fm }}</a></u>
                                            </td>
                                        </tr>
                                        @empty
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            @endif
                        @endif
                    </div>
                </div>
                @if (Auth::user()->level == 'Developer')
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive  mt-2 overflow-x: auto;">
                                <table id="example" class="display" style="width:100% margin: 0;" >
                                    <thead>
                                        <tr>
                                            <th class="col" style="text-align: center;">No.</th>
                                            <th class="col-md-3 col-4" style="text-align: center;">Company Regulation</th>
                                            <th class="col-md-2 col-3" style="text-align: center;">Date</th>
                                            <th class="col-md-1 col-3" style="text-align: center;">Time</th>
                                            <th class="col-md-6 col-4" style="text-align: center;">Regulation Files</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($companyreg_dve as $item)
                                        <tr>
                                            <td class="col" style="text-align: center;">{{ $loop->iteration }}</td>
                                            <td class="col-md-3 col-4" style="text-align: center;">PT. Dve Marine Engineering</td>
                                            <td class="col-md-2 col-3" style="text-align: center;">{{ date('d-m-Y', strtotime($item->tanggal)) }}</td>
                                            <td class="col-md-1 col-3" style="text-align: center;">{{ \Carbon\Carbon::parse($item->jam)->format('H:i') }}</td>
                                            <td class="col-md-6 col-4" style="text-align: center;">
                                                <u><a href="{{ route('viewCompanyDVE',['id' => $item->id]) }}" target="_blank">{{ $item->companyreg_dve }}</a></u>
                                            </td>
                                        </tr>
                                        @empty
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script>
        $('#example').DataTable();
        $('#example_wrapper').css('font-family', 'Nunito, sans-serif');
        $('#example1').DataTable();
        $('#example1_wrapper').css('font-family', 'Nunito, sans-serif');
    </script>
</section>

@endsection
