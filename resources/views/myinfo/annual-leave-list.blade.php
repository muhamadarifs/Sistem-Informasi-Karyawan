@extends('layouts.header-sidebar')

@section('content1')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <style>
        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background: none;
            color: #459fff !important;
            border-radius: 50%;
            border: 1px solid #ccc;
            transition: none !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background: #459fff;
            color: white !important;
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

        .dataTables_length select {
            width: 50px;
        }

        .dataTables_length,
        .dataTables_length select {
            font-size: 15px;
        }

        .dataTables_filter {
            margin-bottom: 20px;
            font-size: 15px;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button {
            border-radius: 50%;
            margin: 0 5px;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.next {
            border-radius: 15px;

        }

        .dataTables_length select,
        .dataTables_filter input {
            border-radius: 10px !important;
        }

        .card-header {}

        .card-title {
            padding: 10px 0 0 0;
            font-size: 20px;
        }

        .row {
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

        th {
            border: none;
            background-color: #36a4c0;
            color: #ffffff;
        }

        .question-mark-icon {
            color: gray;
            cursor: pointer;
        }

        .status-cell {
            text-align: center;
            padding: 2px;
            border-radius: 5px;
            font-weight: bold;
            height: 5px;
        }

        .waiting-status {
            color: rgb(216, 216, 0);
            background-color: white;
        }

        .approve-status {
            color: rgb(0, 182, 0);
            background-color: white;
        }

        .reject-status {
            color: red;
            background-color: white;
        }

        .comingsoon {
            margin-top: 20px;
            font-size: 34px;
            color: #899bbd;
            font-weight: 700;
        }

        .center-form {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .waiting-review {
            color: rgb(0, 0, 0);
        }

        .accordion {
            background-color: white;
        }

        @media (max-width: 767px) {

            .dataTables_length,
            .dataTables_length select {
                padding-top: 3px;
            }

            .dataTables_length,
            .dataTables_length select {
                margin-bottom: 8px;
                font-size: 13px;
            }

            .dataTables_filter {
                margin-bottom: 30px;
                font-size: 13px;
            }

            .border {
                border: none;
            }

            .row {
                font-size: 14px;
            }

            table {
                font-size: 14px;
            }

            .btn {
                font-size: 12px;
                display: flex;
                align-items: center;
            }

            .bi {
                margin-right: 2px;
            }
        }
    </style>

    <div class="pagetitle">
        <h1>Record My Leave</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                <li class="breadcrumb-item">My Info</li>
                <li class="breadcrumb-item active">Record My Leave</li>
            </ol>
        </nav>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Annual Leave List</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive overflow-x-auto p-0 w-200">
                    <table id="example" class="display" style="width:100% margin: 0;">
                        <thead>
                            <tr>
                                <th class="col" style="text-align: center;">No.</th>
                                <th class="col-md-2 col-2" style="text-align: center;">Number Leave Day</th>
                                <th class="col-md-2 col-2" style="text-align: center;">Start Date</th>
                                <th class="col-md-2 col-2" style="text-align: center;">End Date</th>
                                <th class="col-md-2 col-2" style="text-align: center;">Back Office Date</th>
                                <th class="col-md-1 col-1" style="text-align: center;">Phone Number</th>
                                <th class="col-md-2 col-2" style="text-align: center;">Destination</th>
                                <th class="col-md-1 col-1" style="text-align: center;">Status</th>
                                <th class="col-md-1 col-1" style="text-align: center;">Review Date</th>
                                <th class="col-md-3 col-3" style="text-align: center;">Form Leave</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($leaveList as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->jumlah_hari }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->from_date)->format('d M Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->to_date)->format('d M Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->backoffice_date)->format('d M Y') }}</td>
                                    <td>{{ $item->telp }}</td>
                                    <td>{{ $item->tujuan }}</td>
                                    <td class="status-cell {{ strtolower($item->status) }}-status">{{ $item->status }}</td>
                                    <td>
                                        @empty($item->review_date)
                                            <p class="waiting-review">waiting for review</p>
                                        @else
                                            {{ \Carbon\Carbon::parse($item->review_date)->format('d M Y') }}
                                        @endempty
                                    </td>
                                    <td>
                                        @if (Auth::check())
                                            @if ($item->review_date !== null)
                                                @if (Auth::user()->employee_id >= 200000)
                                                    <form
                                                        action="{{ route('viewAnnualLeaveFormDVE', ['id' => $item->id ?? null]) }}"
                                                        method="get" target="_blank" class="center-form">
                                                        <button
                                                            class="btn btn-primary d-flex justify-content-between align-items-center">
                                                            View
                                                        </button>
                                                    </form>
                                                @else
                                                    <form
                                                        action="{{ route('viewAnnualLeaveFormFM', ['id' => $item->id ?? null]) }}"
                                                        method="get" target="_blank" class="center-form">
                                                        <button
                                                            class="btn btn-primary d-flex justify-content-between align-items-center">
                                                            View
                                                        </button>
                                                    </form>
                                                @endif
                                            @else
                                                @if (Auth::user()->employee_id >= 200000)
                                                    <form
                                                        action="{{ route('viewAnnualLeaveFormDVE', ['id' => $item->id ?? null]) }}"
                                                        method="get" target="_blank" class="center-form">
                                                        <button
                                                            class="btn btn-primary d-flex justify-content-between align-items-center"
                                                            disabled>
                                                            View
                                                        </button>
                                                    </form>
                                                @else
                                                    <form
                                                        action="{{ route('viewAnnualLeaveFormFM', ['id' => $item->id ?? null]) }}"
                                                        method="get" target="_blank" class="center-form">
                                                        <button
                                                            class="btn btn-primary d-flex justify-content-between align-items-center"
                                                            disabled>
                                                            View
                                                        </button>
                                                    </form>
                                                @endif
                                            @endif
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
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Medical Leave List</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive overflow-x-auto p-0 w-200">
                    <table id="example1" class="display" style="width:100% margin: 0;">
                        <thead>
                            <tr>
                                <th class="col" style="text-align: center;">No.</th>
                                <th class="col-md-1 col-1" style="text-align: center;">Number Leave Days</th>
                                <th class="col-md-2 col-2" style="text-align: center;">Start Date</th>
                                <th class="col-md-2 col-2" style="text-align: center;">End Date</th>
                                <th class="col-md-2 col-2" style="text-align: center;">Back Office Date</th>
                                <th class="col-md-2 col-2" style="text-align: center;">Phone Number</th>
                                <th class="col-md-1 col-1" style="text-align: center;">Status</th>
                                <th class="col-md-3 col-3" style="text-align: center;">Review Date</th>
                                <th class="col-md-3 col-3" style="text-align: center;">File Attachment</th>
                                <th class="col-md-3 col-3" style="text-align: center;">Form Leave</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($medicalList as $items)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $items->jumlah_hari }}</td>
                                    <td>{{ \Carbon\Carbon::parse($items->from_date)->format('d M Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($items->to_date)->format('d M Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($items->backoffice_date)->format('d M Y') }}</td>
                                    <td>{{ $items->telp }}</td>
                                    <td class="status-cell {{ strtolower($items->status) }}-status">{{ $items->status }}</td>
                                    <td>
                                        @empty($items->review_date)
                                            <p class="waiting-review">waiting for review</p>
                                        @else
                                            {{ \Carbon\Carbon::parse($items->review_date)->format('d M Y') }}
                                        @endempty
                                    </td>
                                    <td>
                                        <form action="{{ route('viewPdfmedical', ['id' => $items->id ?? null]) }}"
                                            method="get" target="_blank" class="center-form">
                                            <button
                                                class="btn btn-danger d-flex justify-content-between align-items-center">
                                                <i class="fa-regular fa-file-pdf"></i> PDF
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        @if (Auth::check())
                                            @if ($items->review_date !== null && $items->status == 'approve')
                                                @if (Auth::user()->employee_id >= 200000)
                                                    <form
                                                        action="{{ route('pdfmedicalleaveDVE.Form', ['id' => $items->id ?? null]) }}"
                                                        method="get" target="_blank" class="center-form">
                                                        <button
                                                            class="btn btn-primary d-flex justify-content-between align-items-center">
                                                            View
                                                        </button>
                                                    </form>
                                                @else
                                                    <form
                                                        action="{{ route('pdfmedicalleaveFM.Form', ['id' => $items->id ?? null]) }}"
                                                        method="get" target="_blank" class="center-form">
                                                        <button
                                                            class="btn btn-primary d-flex justify-content-between align-items-center">
                                                            View
                                                        </button>
                                                    </form>
                                                @endif
                                            @else
                                                @if (Auth::user()->employee_id >= 200000)
                                                    <form
                                                        action="{{ route('pdfmedicalleaveDVE.Form', ['id' => $items->id ?? null]) }}"
                                                        method="get" target="_blank" class="center-form">
                                                        <button
                                                            class="btn btn-primary d-flex justify-content-between align-items-center"
                                                            disabled>
                                                            View
                                                        </button>
                                                    </form>
                                                @else
                                                    <form
                                                        action="{{ route('pdfmedicalleaveFM.Form', ['id' => $items->id ?? null]) }}"
                                                        method="get" target="_blank" class="center-form">
                                                        <button
                                                            class="btn btn-primary d-flex justify-content-between align-items-center"
                                                            disabled>
                                                            View
                                                        </button>
                                                    </form>
                                                @endif
                                            @endif
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
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Special Leave List</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive overflow-x-auto p-0 w-200">
                    <table id="example2" class="display" style="width:100% margin: 0;">
                        <thead>
                            <tr>
                                <th class="col" style="text-align: center;">No.</th>
                                <th class="col-md-1 col-1" style="text-align: center;">Number Leave Day</th>
                                <th class="col-md-2 col-2" style="text-align: center;">Start Date</th>
                                <th class="col-md-2 col-2" style="text-align: center;">End Date</th>
                                <th class="col-md-2 col-2" style="text-align: center;">Back Office Date</th>
                                <th class="col-md-2 col-2" style="text-align: center;">Permit</th>
                                <th class="col-md-2 col-2" style="text-align: center;">Phone Number</th>
                                <th class="col-md-1 col-1" style="text-align: center;">Status</th>
                                <th class="col-md-1 col-1" style="text-align: center;">Review Date</th>
                                <th class="col-md-1 col-1" style="text-align: center;">File Attachment</th>
                                <th class="col-md-3 col-3" style="text-align: center;">Form Leave</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($specialleave as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->jumlah_hari }}</td>
                                    <td>{{ \Carbon\Carbon::parse($data->from_date)->format('d M Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($data->to_date)->format('d M Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($data->backoffice_date)->format('d M Y') }}</td>
                                    <td>{{ $data->cuti }}</td>
                                    <td>{{ $data->telp }}</td>
                                    <td class="status-cell {{ strtolower($data->status) }}-status">{{ $data->status }}</td>
                                    <td>
                                        @empty($data->review_date)
                                            <p class="waiting-review">waiting for review</p>
                                        @else
                                        {{ \Carbon\Carbon::parse($data->review_date)->format('d M Y') }}
                                        @endempty
                                    </td>
                                    <td>
                                        <form action="{{ route('viewPdfspecial', ['id' => $data->id ?? null]) }}"
                                            method="get" target="_blank" class="center-form">
                                            <button
                                                class="btn btn-danger d-flex justify-content-between align-items-center">
                                                <i class="fa-regular fa-file-pdf"></i> PDF
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        @if (Auth::check())
                                            @if ($data->review_date !== null)
                                                @if (Auth::user()->employee_id >= 200000)
                                                    <form
                                                        action="{{ route('viewspecialLeaveFormDVE', ['id' => $data->id ?? null]) }}"
                                                        method="get" target="_blank" class="center-form">
                                                        <button
                                                            class="btn btn-primary d-flex justify-content-between align-items-center">
                                                            View
                                                        </button>
                                                    </form>
                                                @else
                                                    <form
                                                        action="{{ route('viewspecialLeaveFormFM', ['id' => $data->id ?? null]) }}"
                                                        method="get" target="_blank" class="center-form">
                                                        <button
                                                            class="btn btn-primary d-flex justify-content-between align-items-center">
                                                            View
                                                        </button>
                                                    </form>
                                                @endif
                                            @else
                                                @if (Auth::user()->employee_id >= 200000)
                                                    <form
                                                        action="{{ route('viewspecialLeaveFormDVE', ['id' => $data->id ?? null]) }}"
                                                        method="get" target="_blank" class="center-form">
                                                        <button
                                                            class="btn btn-primary d-flex justify-content-between align-items-center"
                                                            disabled>
                                                            View
                                                        </button>
                                                    </form>
                                                @else
                                                    <form
                                                        action="{{ route('viewspecialLeaveFormFM', ['id' => $data->id ?? null]) }}"
                                                        method="get" target="_blank" class="center-form">
                                                        <button
                                                            class="btn btn-primary d-flex justify-content-between align-items-center"
                                                            disabled>
                                                            View
                                                        </button>
                                                    </form>
                                                @endif
                                            @endif
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
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Permit List</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive overflow-x-auto p-0 w-200">
                    <table id="example3" class="display" style="width:100% margin: 0;">
                        <thead>
                            <tr>
                                <th class="col-md-1 col-1" style="text-align: center;">No.</th>
                                <th class="col-md-2 col-1" style="text-align: center;">Permit</th>
                                <th class="col-md-2 col-1" style="text-align: center;">Status</th>
                                <th class="col-md-2 col-1" style="text-align: center;">Review Date</th>
                                <th class="col-md-3 col-3" style="text-align: center;">Form Leave</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($permit as $permits)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $permits->permit }}</td>
                                    <td class="status-cell {{ strtolower($permits->status) }}-status">{{ $permits->status }}</td>
                                    <td>
                                        @empty($permits->review_date)
                                            <p class="waiting-review">waiting for review</p>
                                        @else
                                            {{ \Carbon\Carbon::parse($permits->review_date)->format('d-m-Y') }}
                                        @endempty
                                    </td>
                                    <td>
                                        @if (Auth::check())
                                            @if ($permits->review_date !== null)
                                                @if (Auth::user()->employee_id >= 200000)
                                                    <form
                                                        action="{{ route('pdfpermitsDVE.Form', ['id' => $permits->id ?? null]) }}"
                                                        method="get" target="_blank" class="center-form">
                                                        <button
                                                            class="btn btn-primary d-flex justify-content-between align-items-center">
                                                            View
                                                        </button>
                                                    </form>
                                                @else
                                                    <form
                                                        action="{{ route('pdfpermitsFM.Form', ['id' => $permits->id ?? null]) }}"
                                                        method="get" target="_blank" class="center-form">
                                                        <button
                                                            class="btn btn-primary d-flex justify-content-between align-items-center">
                                                            View
                                                        </button>
                                                    </form>
                                                @endif
                                            @else
                                                @if (Auth::user()->employee_id >= 200000)
                                                    <form
                                                        action="{{ route('pdfpermitsDVE.Form', ['id' => $permits->id ?? null]) }}"
                                                        method="get" target="_blank" class="center-form">
                                                        <button
                                                            class="btn btn-primary d-flex justify-content-between align-items-center"
                                                            disabled>
                                                            View
                                                        </button>
                                                    </form>
                                                @else
                                                    <form
                                                        action="{{ route('pdfpermitsFM.Form', ['id' => $permits->id ?? null]) }}"
                                                        method="get" target="_blank" class="center-form">
                                                        <button
                                                            class="btn btn-primary d-flex justify-content-between align-items-center"
                                                            disabled>
                                                            View
                                                        </button>
                                                    </form>
                                                @endif
                                            @endif
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
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="js/sweetalert2@10.js"></script>
    <script>
        $('#example').DataTable();
        $('#example_wrapper').css('font-family', 'Nunito, sans-serif');

        $('#example1').DataTable();
        $('#example1_wrapper').css('font-family', 'Nunito, sans-serif');

        $('#example2').DataTable();
        $('#example2_wrapper').css('font-family', 'Nunito, sans-serif');

        $('#example3').DataTable();
        $('#example3_wrapper').css('font-family', 'Nunito, sans-serif');
    </script>
@endsection
