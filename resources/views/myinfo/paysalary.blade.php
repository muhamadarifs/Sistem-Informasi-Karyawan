@extends('layouts.header-sidebar')

@section('content1')
<style>
    .custombtn{
        margin-top: 3px;
        border-radius: 15px;
        /* border-radius: 20px; */
        color: white;
        background-color: #459fff;
        border: none;
    }
    .custombtn:hover{
        border-radius: 20px;
        color: white;
        background-color: #59a9ff;
        border: none;
    }
    .modal-footer{
        font-family: "Nunito", sans-serif;
    }
    .card-title{
        padding: 10px 0 0 0;
        font-size: 20px;
        text-align: center;
    }
    .body-title{
        padding: 10px 0 0 0;
        font-size: 20px;
        text-align: center;
    }
    .float-end{
        padding: 5px 5px 5px 0;
        font-size: 20px;
    }
    .card{
        font-family: "Nunito", sans-serif;
    }
    .border {
        border: 1px solid #000;
        padding: 5px;
    }
    .container-fluid{
        font-family: "Nunito", sans-serif;
        padding: 10px 0 0 0;
    }
    dl dt {
        margin-bottom: 2px;
    }

    dl dd {
        margin-bottom: 2px;
    }
    .custom-dt {
        font-size: 14px;
        font-weight: 400;
    }
    .custom-dd {
        font-size: 14px;
        font-weight: 400;
        text-align: right;
    }
    .custom-dt1 {
        font-size: 14px;
        font-weight: 600;
    }
    .custom-dd1 {
        font-size: 14px;
        font-weight: 600;
        text-align: right;
    }
    .custom-dd2 {
        font-size: 14px;
        font-weight: 600;
        text-align: right;
        color: #0040af;
    }
    .custom-dt3 {
        font-size: 14px;
        position: absolute;
        bottom: 0;
        font-family: "Poppins", sans-serif;
    }
    .font-bold{
        font-weight: 800;
        color: #0040af;
        text-align: left;
        font-size: 22px;
        text-transform: uppercase;
        margin-left: 10px;
        font-family: "Poppins", sans-serif;
    }
    .text-underline {
        text-decoration: underline;
    }
    .text-underline-double {
        position: relative;
        text-decoration: none;
    }
    .text-underline-double::before, .text-underline-double::after {
        content: "";
        position: absolute;
        left: 0;
        right: 10%;
        bottom: 1px;
        border-bottom: 1px solid #000;
    }
    .text-underline-double::after {
        bottom: -2px;
        right: 10%;
    }
    .text-underline-double1 {
        position: relative;
        text-decoration: none;
    }
    .text-underline-double1::before, .text-underline-double1::after {
        content: "";
        position: absolute;
        left: 0;
        right: 0;
        bottom: 1px;
        border-bottom: 1px solid #000;
    }
    .text-underline-double1::after {
        bottom: -2px;
    }
    .text-underline-double2 {
        position: relative;
        text-decoration: none;
    }
    .text-underline-double2::before, .text-underline-double2::after {
        content: "";
        position: absolute;
        left: 0;
        right: 10%;
        bottom: 1px;
        border-bottom: 1px solid #000;
    }
    .text-underline-double2::after {
        bottom: -2px;
        right: 10%;
    }
    .text-double-upper-line {
        position: relative;
        text-decoration: none;
        display: inline-block;
        font-size: 18px;
    }
    .text-double-upper-line::before,
    .text-double-upper-line::after {
        content: "";
        position: absolute;
        left: 0;
        right: 0;
        border-top: 1px solid #000;
    }
    .text-double-upper-line::before {
        top: -3px;
    }
    .text-double-upper-line::after {
        top: -6px;
    }
    .text-double-upper-line1 {
        position: relative;
        text-decoration: none;
        display: inline-block;
        font-size: 12px;
    }
    .text-double-upper-line1::before{
        content: "";
        position: absolute;
        left: 0;
        right: 5%;
        border-top: 1px solid #000;
    }
    .text-double-upper-line1::before {
        top: -3px;
    }
    .btn-cust{
        text-align: center;
    }
    .cust-period{
        text-align: center;
    }
    .custom-1{
        padding-top: 8px;
    }
    select{
        font-size: 16px;
        width: 107%;
        padding: 5px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 5px;
        transition: border-color 0.3s;
        font-family: "Nunito",sans-serif;
    }
    select:focus{
        outline: none;
        border-color: #007bff;
    }
    .custselect{
        margin-top: 5px;
    }
    .nodatainfo{
        text-align: center;
        margin-top: 10px;
    }
    .watermark {
        position: absolute;
        top: 50%;
        left: 5%;
        right: 15%;
        align-items: center;
        transform: translate(-50%, -50%);
        text-align: center;
        transform-origin: 0 0;
        transform: rotate(-19.566deg) scale(1, 1);
    }
    .preview-text {
        font-family: "Verdana", sans-serif;
        font-size: 180px;
        color: rgba(36, 42, 184, 0.15);
    }
    @media (max-width: 767px) {
        .container-fluid{
            font-size: 5px;
        }
        .row{
            font-size: 6px;
        }
        .custom-dt{
            font-size: 4px;
        }
        .visible-print {
            width: 60px;
            height: 60px;
        }
        .border{
            border: none;
        }
        .font-bold{
            font-size: 12px;
        }
        .custom-dt{
            font-size: 4px;
        }
        .custom-dd{
            font-size: 4px;
        }
        .custom-dt1{
            font-size: 4px;
        }
        .custom-dd1{
            font-size: 4px;
        }
        .custom-dd2{
            font-size: 4px;
        }
        .custom-dt3{
            font-size: 4px;
        }
        .visible-print {
            width: 60px;
            height: 60px;
            display: none;
        }
        /* underline */
        .text-underline-double::before,
        .text-underline-double::after {
        bottom: 1px;
        }
        .text-underline-double1::before,
        .text-underline-double1::after {
        bottom: 2px;
        }
        .text-underline-double2::before,
        .text-underline-double2::after {
        bottom: 2px;
        }
        .text-underline-double::after {
        bottom: -1px;
        }
        .text-underline-double1::after {
        bottom: 0px;
        }
        .text-underline-double2::after {
        bottom: 0px;
        }
        /* Upperline */
        .text-double-upper-line {
            position: relative;
            text-decoration: none;
            display: inline-block;
            font-size: 10px;
        }
        .text-double-upper-line::before,
        .text-double-upper-line::after, {
            border-top: 1px solid #000;
        }
        .text-double-upper-line::before {
            top: -2px;
        }
        .text-double-upper-line::after {
            top: -4px;
        }
        .text-double-upper-line1 {
            position: relative;
            text-decoration: none;
            display: inline-block;
        }
        .text-double-upper-line1::before {
            top: -3px;
        }
        .visible-print {
            display: none;
        }
        .btn{
            font-size: 16px;
        }
        .select-cust{
            width: 50%;
        }
        .custombtn{
            margin-top: 5px;
            margin-right: 1px;
            font-size: 15px;
            display: flex;
        }
        .bi{
            margin-right: 3px;
        }
        .row .custselect{
            font-size: 16px;
        }
        .nodatainfo{
            font-size: 16px;
            text-align: center;
            margin-top: 10px;
        }
        .preview-text {
            font-family: "Verdana", sans-serif;
            font-size: 80px;
            color: rgba(36, 42, 184, 0.15);
        }
    }
    @media (min-width: 768px) and (max-width: 1199px) {
        .preview-text {
            font-family: "Verdana", sans-serif;
            font-size: 150px;
            color: rgba(36, 42, 184, 0.15);
        }
    }


</style>
<div class="pagetitle">
    <h1>Pay Slip</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
        <li class="breadcrumb-item">My Info</li>
        <li class="breadcrumb-item active">My Payslip</li>
      </ol>
    </nav>
</div><!-- End Page Title -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title">My PaySlip </h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h4 class="body-title">Select and Download Your Payslip.</h4>
                <button type="button" class="custombtn btn btn-light d-flex justify-content-between mx-auto mt-5 mb-5" style="margin-right: 5px; margin-top: 5px;" data-bs-toggle="modal" data-bs-target="#downloadpayslip" id="download">
                    <i class="fa-solid fa-download" style="margin-right: 3px;"></i> Download
                </button>
            </div>
        </div>

        {{-- Modal download PDF select --}}
        @if ($data)
        <div class="modal fade" id="downloadpayslip" tabindex="-1" role="dialog" aria-labelledby="downloadpayslipLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="downloadpayslipLabel">Download Payslip.</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                        @if(Auth::check())
                            @if(Auth::user()->employee_id >= 200000)
                                <div class="modal-body">
                                    <div class="container">
                                        <div class="row">
                                            <form action="{{ route('generatePDFdve', ['id' => $data->id ?? null]) }}" method="get" target="_blank">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col ">
                                                            <label for="periodeSelect" class="custselect">Select Period:</label>
                                                        </div>
                                                        <div class="col ">
                                                            <select class="form-control" id="periodeSelect" name="periode">
                                                                @foreach($availableDownload as $period)
                                                                    <option value="{{ $period }}" {{ $selectedPeriode == $period ? 'selected' : '' }}>{{ $period }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" id="viewButton">
                                        <i class="fa-solid fa-file-pdf"></i> Download
                                    </button>
                                </div>
                                </form>
                            @else
                                <div class="modal-body">
                                    <div class="container">
                                        <div class="row">
                                            <form action="{{ route('generatePDFfm', ['id' => $data->id ?? null]) }}" method="get" target="_blank">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col ">
                                                            <label for="periodeSelect" class="custselect">Select Period:</label>
                                                        </div>
                                                        <div class="col ">
                                                            <select class="form-control" id="periodeSelect" name="periode">
                                                                @foreach($availableDownload as $period)
                                                                    <option value="{{ $period }}" {{ $selectedPeriode == $period ? 'selected' : '' }}>{{ $period }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" id="viewButton">
                                        <i class="fa-solid fa-file-pdf"></i> Download
                                    </button>
                                </div>
                                </form>
                            @endif
                        @endif
                </div>
            </div>
        </div>
        @else
        <div class="modal fade" id="downloadpayslip" tabindex="-1" role="dialog" aria-labelledby="downloadpayslipLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="downloadpayslipLabel">Download Payslip.</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="form-group">
                                    <div class="row">
                                        <p class="nodatainfo">Tidak ada data yang tersedia.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
</script>
@endsection
