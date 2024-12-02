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
    .card-title{
        padding: 10px 0 0 0;
        font-size: 20px;
    }
</style>
<div class="pagetitle">
    <h1>Submission Data Employee List</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
        <li class="breadcrumb-item">HRD Information System</li>
        <li class="breadcrumb-item active">Submission Data Employee List</li>
      </ol>
    </nav>
</div>

<section class="section dashboard">
    <div class="row">
      <div class="col-12">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Submission List</h5>
                    </div>
                    <div class="card-body" >
                        <div class="table-responsive overflow-x-auto p-0 w-200">
                            <table id="example" class="display" style="width:100% margin: 0;" >
                                <thead>
                                    <tr>
                                        <th class="col" style="text-align: center;">No.</th>
                                        <th class="col-md-1 col-1" style="text-align: center;">1</th>
                                        <th class="col-md-2 col-2" style="text-align: center;">2</th>
                                        <th class="col-md-2 col-2" style="text-align: center;">3</th>
                                        <th class="col-md-2 col-2" style="text-align: center;">4</th>
                                        <th class="col-md-2 col-2" style="text-align: center;">5</th>
                                        <th class="col-md-1 col-1" style="text-align: center;">6</th>
                                        <th class="col-md-3 col-3" style="text-align: center;">7</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    {{-- @forelse ($leaveList as $item) --}}
                                    <tr>
                                        <td>tes</td>
                                        <td class="col-md-1 col-1">tes</td>
                                        <td class="col-md-2 col-2">tes</td>
                                        <td class="col-md-2 col-2">tes</td>
                                        <td class="col-md-2 col-2">tes</td>
                                        <td class="col-md-2 col-2">tes</td>
                                        <td class="col-md-1 col-1">tes</td>
                                        <td class="col-md-3 col-3">tes</td>
                                    </tr>
                                    {{-- @empty --}}
                                    {{-- <tr>
                                        <td>No Data Assign</td>
                                    </tr>
                                    @endforelse --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script>
        $('#example').DataTable();
        $('#example_wrapper').css('font-family', 'Nunito, sans-serif');
    </script>
</section>
@endsection
