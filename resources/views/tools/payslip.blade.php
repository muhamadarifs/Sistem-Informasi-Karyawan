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
    .float-end{
        padding: 5px 5px 5px 0;
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
    .itemsdrop:hover{
        color: #ffffff;
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
    }
    @media (min-width: 768px) and (max-width: 1199px) {
        .button-container {
            display: none;
        }
        .filter {
            display: block;
        }
    }
</style>
<div class="pagetitle">
    <h1>Payslip</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Tools</a></li>
        <li class="breadcrumb-item active">Payslip</li>
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
                      <li><a class="dropdown-item itemsdrop" href="#" data-bs-toggle="modal" data-bs-target="#importModalPayslip" id="importForm"><i class="fas fa-upload"></i> Import</a></li>
                      <li><a class="dropdown-item itemsdrop" href="#" id="exportPay2"><i class="fas fa-download"></i> Export</a></li>

                    </ul>
                </div>
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title">Payslip</h5>
                        </div>
                        <div class="col button-container">
                            <h5 class="mt-0">
                                <div class="float-end">
                                    <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#importModalPayslip" id="importForm">
                                        <i class="fas fa-upload" style="margin-right: 4px;"></i>Import
                                    </button>
                                    <div id="import-errors" class="alert alert-danger" style="display: none;"></div>
                                    <button type="button" class="btn btn-primary " id="exportPay">
                                        <i class="fas fa-download" style="margin-right: 4px;"></i>Export
                                    </button>
                                </div>
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                        <div class="table-responsive  mt-2 overflow-x: auto;">
                            <div id="paginationContainer">
                                <table id="example1" class="display" style="width:100%" >
                                    <thead>
                                        <tr>
                                            <th colspan="1" rowspan="2" scope="colgroup" class="text-center align-middle">No</th>
                                            <th colspan="1" rowspan="2" scope="colgroup" class="text-center align-middle">No Karwayan</th>
                                            <th colspan="1" rowspan="2" scope="colgroup" class="text-center align-middle">Nama Karyawan</th>
                                            <th colspan="1" rowspan="2" scope="colgroup" class="text-center align-middle">Position Name</th>
                                            <th colspan="1" rowspan="2" scope="colgroup" class="text-center align-middle">Departement</th>
                                            <th colspan="1" rowspan="2" scope="colgroup" class="text-center align-middle">Periode</th>
                                            <th colspan="1" rowspan="2" scope="colgroup" class="text-center align-middle">Date Print Out</th>
                                            <th colspan="1" rowspan="2" scope="colgroup" class="text-center align-middle">Slip No</th>
                                            <th colspan="1" rowspan="2" scope="colgroup" class="text-center align-middle">Group</th>
                                            <th colspan="5" scope="colgroup"  class="text-center align-middle">Data Absent</th>
                                            <th colspan="9" scope="colgroup"  class="text-center align-middle">Income</th>
                                            <th colspan="8" scope="colgroup"  class="text-center align-middle">Deduction</th>
                                            <th colspan="1" rowspan="2" scope="colgroup" class="text-center align-middle">Total Income</th>
                                            <th colspan="1" rowspan="2" scope="colgroup" class="text-center align-middle">Total Deduction</th>
                                            <th colspan="1" rowspan="2" scope="colgroup" class="text-center align-middle">Take Home Pay</th>
                                        </tr>
                                        <tr>
                                            {{-- Data Absent --}}
                                            <th scope="col">Working Day</th>
                                            <th scope="col">Absent <small>(Days)</small></th>
                                            <th scope="col">Late <small>(Hours)</small></th>
                                            <th scope="col">Annual Leave/MC/Other</th>
                                            <th scope="col">Total Overtime <small>Hours</small></th>
                                            {{-- Income --}}
                                            <th scope="col-lg-6">Basic Salary</th>
                                            <th scope="col-lg-6">Allowance</th>
                                            <th scope="col-lg-6">Correction</th>
                                            <th scope="col-lg-6">Foreman Allowence</th>
                                            <th scope="col-lg-6">Overtime</th>
                                            <th scope="col-lg-6">Shift Allowence</th>
                                            <th scope="col-lg-6">Additional Allowence</th>
                                            <th scope="col-lg-6">Bonus</th>
                                            <th scope="col-lg-6">THR</th>
                                            {{-- Deduction --}}
                                            <th scope="col">Absent</th>
                                            <th scope="col">Late</th>
                                            <th scope="col">Annual Leave/MC</th>
                                            <th scope="col">Other Deduct</th>
                                            <th scope="col">JHT</th>
                                            <th scope="col">BPJS Health Care</th>
                                            <th scope="col">BPJS Pension</th>
                                            <th scope="col">tax</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ( $payslip as $pay )
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $pay->user->nik ?? ''}}</td>
                                            <td>{{ $pay->user->name ?? ''}}</td>
                                            <td>{{ $pay->user->position->position_name ?? '-'}}</td>
                                            <td>{{ $pay->user->position->department ?? '-'}}</td>
                                            <td>{{ $pay->periode }}</td>
                                            <td>{{ $pay->date_print }}</td>
                                            <td>{{ $pay->slip_no }}</td>
                                            <td>{{ $pay->group }}</td>
                                            <td>{{ $pay->work_day }}</td>
                                            <td>{{ $pay->absent }}</td>
                                            <td>{{ $pay->late }}</td>
                                            <td>{{ $pay->cuti }}</td>
                                            <td>{{ $pay->total_ot }}</td>
                                            <td>Rp. {{ number_format($pay->basic_salary ?? 0, 0, ',', '.') }}</td>
                                            <td>Rp. {{ number_format($pay->allowence ?? 0, 0, ',', '.') }}</td>
                                            <td>Rp. {{ number_format($pay->correction ?? 0, 0, ',', '.') }}</td>
                                            <td>Rp. {{ number_format($pay->foreman_allow ?? 0, 0, ',', '.') }}</td>
                                            <td>Rp. {{ number_format($pay->overtime ?? 0, 0, ',', '.') }}</td>
                                            <td>Rp. {{ number_format($pay->shift_allow ?? 0, 0, ',', '.') }}</td>
                                            <td>Rp. {{ number_format($pay->addition_allow ?? 0, 0, ',', '.') }}</td>
                                            <td>Rp. {{ number_format($pay->bonus ?? 0, 0, ',', '.') }}</td>
                                            <td>Rp. {{ number_format($pay->thr ?? 0, 0, ',', '.') }}</td>
                                            <td>Rp. {{ number_format($pay->pay_absent ?? 0, 0, ',', '.') }}</td>
                                            <td>Rp. {{ number_format($pay->pay_late ?? 0, 0, ',', '.') }}</td>
                                            <td>Rp. {{ number_format($pay->pay_cuti ?? 0, 0, ',', '.') }}</td>
                                            <td>Rp. {{ number_format($pay->other_deduc ?? 0, 0, ',', '.') }}</td>
                                            <td>Rp. {{ number_format($pay->jht ?? 0, 0, ',', '.') }}</td>
                                            <td>Rp. {{ number_format($pay->bpjs_kesehatan ?? 0, 0, ',', '.') }}</td>
                                            <td>Rp. {{ number_format($pay->bpjs_tk ?? 0, 0, ',', '.') }}</td>
                                            <td>Rp. {{ number_format($pay->tax ?? 0, 0, ',', '.') }}</td>
                                            <td>Rp. {{ number_format($pay->total_income ?? 0, 0, ',', '.') }}</td>
                                            <td>Rp. {{ number_format($pay->total_deduc ?? 0, 0, ',', '.') }}</td>
                                            <td>Rp. {{ number_format($pay->take_pay ?? 0, 0, ',', '.')  }}</td>
                                            {{-- <td>Rp. {{ number_format($pay->take_pay, 2, ',', '.')  }}</td> --}}
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
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
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
                        <!-- End of Table Position-->
                </div>
                {{-- MODAL IMPORT PAYSLIP --}}
                <div class="modal fade" id="importModalPayslip" tabindex="-1" role="dialog" aria-labelledby="importModalPayslipLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="importModalPayslipLabel">Import Payslip Data</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{ route('importPayslip') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                    <div class="form-group">
                                        <label for="importFile"></label>
                                        <input type="file" name="file" class="form-control-file" id="importFile">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Import</button>
                            </div>
                            </form>
                        </div>
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
    $('#example1').DataTable();
    $('#example1_wrapper').css('font-family', 'Nunito, sans-serif');

    // Export Payslip JS
    document.getElementById("exportPay").addEventListener("click", function() {
        event.preventDefault();
        Swal.fire({
            title: "Pilih Export",
            html: `
                <button class="btn btn-primary" id="exportToExcel">
                    <i class="fas fa-file-excel" style="margin: 2px;"></i> Payslip Data
                </button>
                <button class="btn btn-success" id="TemplatePayslip">
                    <i class="fas fa-file-import" style="margin: 2px;"></i> Template Payslip Import
                </button>

            `,
            showCancelButton: true,
            cancelButtonText: "Batal",
            showConfirmButton: false
        });

        document.getElementById("exportToExcel").addEventListener("click", function() {
            window.location.href = '{{ route('exportPayslip') }}';
            Swal.close();
        });
        document.getElementById("TemplatePayslip").addEventListener("click", function() {
            window.location.href = '{{ route('payslip.template') }}';
            Swal.close();
        });
    });
    @if(Session::has('success'))
        Swal.fire('Berhasil!', '{{ Session::get('success') }}', 'success');
    @endif

    // Export Payslip JS2
    document.getElementById("exportPay2").addEventListener("click", function() {
        event.preventDefault();
        Swal.fire({
            title: "Pilih Export",
            html: `
                <button class="btn btn-primary" id="exportToExcel">
                    <i class="fas fa-file-excel" style="margin: 2px;"></i> Payslip Data
                </button>
                <button class="btn btn-success" id="TemplatePayslip">
                    <i class="fas fa-file-import" style="margin: 2px;"></i> Template Payslip Import
                </button>
            `,
            showCancelButton: true,
            cancelButtonText: "Batal",
            showConfirmButton: false
        });

        document.getElementById("exportToExcel").addEventListener("click", function() {
            window.location.href = '{{ route('exportPayslip') }}';
            Swal.close();
        });
        document.getElementById("TemplatePayslip").addEventListener("click", function() {
            window.location.href = '{{ route('payslip.template') }}';
            Swal.close();
        });

    });
    @if(Session::has('success'))
        Swal.fire('Berhasil!', '{{ Session::get('success') }}', 'success');
    @endif

</script>
@endsection
