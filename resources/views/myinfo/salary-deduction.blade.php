
@extends('layouts.header-sidebar')

@section('content1')
<style>
    .custombtn{
        margin-top: 3px;
        border-radius: 20px;
        color: white;
        background-color: #459fff;
    }
    .custombtn:hover{
        border-radius: 20px;
        color: white;
        background-color: #59a9ff;
    }

    .modal-footer{
        font-family: "Nunito", sans-serif;
    }

    .card-title{
        padding: 10px 0 0 0;
        font-size: 20px;
    }

    .float-end{
        padding: 5px 5px 5px 0;
        font-size: 20px;
    }

    .border {
        border: 1px solid #000; /* Sesuaikan warna dan ketebalan garis sesuai kebutuhan Anda */
        padding: 5px; /* Sesuaikan padding sesuai kebutuhan Anda */
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
        font-size: 14px; /* Ganti dengan ukuran font yang Anda inginkan */
        font-weight: 400;
    }
    .custom-dd {
        font-size: 14px; /* Ganti dengan ukuran font yang Anda inginkan */
        font-weight: 400;
        text-align: right;
    }
    .custom-dt1 {
        font-size: 14px; /* Ganti dengan ukuran font yang Anda inginkan */
        font-weight: 600;
    }
    .custom-dd1 {
        font-size: 14px; /* Ganti dengan ukuran font yang Anda inginkan */
        font-weight: 600;
        text-align: right;
    }
    .custom-dd2 {
        font-size: 14px; /* Ganti dengan ukuran font yang Anda inginkan */
        font-weight: 600;
        text-align: right;
        color: #0040af;
    }
    .custom-dt3 {
        font-size: 14px; /* Mengatur ukuran font pada elemen <dt> */
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
    /* Underline di bawah payment slip */
    .text-underline-double {
        position: relative;
        text-decoration: none;
    }

    .text-underline-double::before, .text-underline-double::after {
        content: "";
        position: absolute;
        left: 0;
        right: 10%;
        bottom: 1px; /* Sesuaikan dengan jarak antara dua garis bawah */
        border-bottom: 1px solid #000; /* Warna dan ketebalan garis bawah */
    }

    .text-underline-double::after {
        bottom: -2px; /* Mengatur jarak antara dua garis bawah */
        right: 10%;
    }
    /* underline di bawah employe No */
    .text-underline-double1 {
        position: relative;
        text-decoration: none;
    }
    .text-underline-double1::before, .text-underline-double1::after {
        content: "";
        position: absolute;
        left: 0;
        right: 0;
        bottom: 1px; /* Sesuaikan dengan jarak antara dua garis bawah */
        border-bottom: 1px solid #000; /* Warna dan ketebalan garis bawah */
    }

    .text-underline-double1::after {
        bottom: -2px; /* Mengatur jarak antara dua garis bawah */
    }
    /* Underline di bawah nomor dan nama */
    .text-underline-double2 {
        position: relative;
        text-decoration: none;
    }

    .text-underline-double2::before, .text-underline-double2::after {
        content: "";
        position: absolute;
        left: 0;
        right: 10%;
        bottom: 1px; /* Sesuaikan dengan jarak antara dua garis bawah */
        border-bottom: 1px solid #000; /* Warna dan ketebalan garis bawah */
    }

    .text-underline-double2::after {
        bottom: -2px; /* Mengatur jarak antara dua garis bawah */
        right: 10%;
    }
    /* Upperline Double */
    .text-double-upper-line {
        position: relative;
        text-decoration: none;
        display: inline-block; /* Membuat elemen menjadi inline block */
        font-size: 18px;
    }

    .text-double-upper-line::before,
    .text-double-upper-line::after {
        content: "";
        position: absolute;
        left: 0;
        right: 0;
        border-top: 1px solid #000; /* Double upper line dengan ketebalan 2px */
    }

    .text-double-upper-line::before {
        top: -3px; /* Jarak dari atas untuk garis atas pertama */
    }

    .text-double-upper-line::after {
        top: -6px; /* Jarak dari atas untuk garis atas kedua */
    }
    /* Upperline  */
    .text-double-upper-line1 {
        position: relative;
        text-decoration: none;
        display: inline-block; /* Membuat elemen menjadi inline block */
        font-size: 12px;
    }

    .text-double-upper-line1::before{
        content: "";
        position: absolute;
        left: 0;
        right: 0;
        border-top: 1px solid #000; /* Double upper line dengan ketebalan 2px */
    }

    .text-double-upper-line1::before {
        top: -3px; /* Jarak dari atas untuk garis atas pertama */
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
    .nodatainfo{
        text-align: center;
        margin-top: 10px;
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
            width: 60px; /* Sesuaikan ukuran sesuai kebutuhan Anda */
            height: 60px;
        }
        .border{
        border: none; /* Menghilangkan border */
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
            width: 60px; /* Sesuaikan ukuran sesuai kebutuhan Anda */
            height: 60px;
            display: none;
        }

        /* underline */
        .text-underline-double::before,
        .text-underline-double::after {
        bottom: 1px; /* Ubah jarak untuk perangkat seluler */
        }
        .text-underline-double1::before,
        .text-underline-double1::after {
        bottom: 2px; /* Ubah jarak untuk perangkat seluler */
        }
        .text-underline-double2::before,
        .text-underline-double2::after {
        bottom: 2px; /* Ubah jarak untuk perangkat seluler */
        }

        .text-underline-double::after {
        bottom: -1px; /* Ubah jarak antara dua garis bawah untuk perangkat seluler */
        }
        .text-underline-double1::after {
        bottom: 0px; /* Ubah jarak antara dua garis bawah untuk perangkat seluler */
        }
        .text-underline-double2::after {
        bottom: 0px; /* Ubah jarak antara dua garis bawah untuk perangkat seluler */
        }

        /* Upperline */
        .text-double-upper-line {
            position: relative;
            text-decoration: none;
            display: inline-block; /* Membuat elemen menjadi inline block */
            font-size: 10px;
        }
        .text-double-upper-line::before,
        .text-double-upper-line::after, {
            border-top: 1px solid #000; /* Mengurangi ketebalan garis atas untuk perangkat seluler */
        }

        .text-double-upper-line::before {
            top: -2px; /* Mengurangi jarak dari atas untuk garis atas pertama */
        }

        .text-double-upper-line::after {
            top: -4px; /* Mengurangi jarak dari atas untuk garis atas kedua */
        }

        .text-double-upper-line1 {
            position: relative;
            text-decoration: none;
            display: inline-block; /* Membuat elemen menjadi inline block */
        }
        .text-double-upper-line1::before {
            top: -3px; /* Jarak dari atas untuk garis atas pertama */
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
            font-size: 15px;
            margin-top: 15px;
            display: flex;
        }

        .bi{
            margin-right: 3px;
        }
        .nodatainfo{
            font-size: 16px;
            text-align: center;
            margin-top: 10px;
        }

    }

</style>
<div class="pagetitle">
    <h1>Salary Deduction History</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
        <li class="breadcrumb-item">My Info</li>
        <li class="breadcrumb-item active">My Payslip Deduction History</li>
      </ol>
    </nav>
</div><!-- End Page Title -->

<div class="col-12">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <h5 class="card-title">Payslip Deduction</h5>
                </div>
                <div class="col">
                    <div class="d-flex flex-row justify-content-end">
                        <button type="button" class="custombtn btn btn-light d-flex justify-content-between align-items-center " data-bs-toggle="modal" data-bs-target="#filterModalDeduc" id="importForm">
                            <i class="bi bi-funnel-fill" style="margin-right: 3px;"></i> Filter
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-7  m-0 font-weight-bold"></div>
                    <div class="col-5  m-0 font-bold text-underline-double">Payment Slip</div>
                </div>

                <div class="row">
                    {{-- kiri --}}
                    <div class="col-2  p-1  font-weight-bold text-underline-double1">Employee No</div>
                    <div class="col-5  p-1 text-underline-double2">:  {{Auth::user()->employee_id}} - {{ Auth::user()->name }} </div>
                    {{-- kanan --}}
                    <div class="col-2  p-1  font-weight-bold">Position</div>
                    <div class="col-3  p-1">: {{ Auth::user()->position->position_name ?? '-'  }}</div>
                    {{-- kiri --}}
                    <div class="col-2  p-1  font-weight-bold">Periode</div>
                    <div class="col-5  p-1">: {{$data->periode ?? '-' }}</div>
                    {{-- kanan --}}
                    <div class="col-2  p-1  font-weight-bold">Date of Print out</div>
                    <div class="col-3  p-1">: {{$data->date_print ?? '-' }}</div>
                    {{-- kiri --}}
                    <div class="col-2  p-1  font-weight-bold">Department</div>
                    <div class="col-5  p-1">: {{ Auth::user()->position->department ?? '-'  }}</div>
                    {{-- kanan --}}
                    <div class="col-2  p-1  font-weight-bold">Slip No</div>
                    <div class="col-3  p-1">: {{$data->slip_no ?? '-' }}</div>
                    {{-- kiri --}}
                    <div class="col-2  p-1  font-weight-bold"></div>
                    <div class="col-5  p-1"> </div>
                    {{-- kanan --}}
                    <div class="col-2  p-1  font-weight-bold">Group</div>
                    <div class="col-3  p-1">: {{$data->group ?? '-' }}</div>
                </div>

                <br>
                    <div class="col-12 text-double-upper-line p-1 text-center">Deduction</div>
                    {{-- <div class="col-4 text-double-upper-line p-1 ">Income</div>
                    <div class="col-4 text-double-upper-line p-1 ">Deduction</div> --}}

                    <div class="col-12 text-double-upper-line1 p-1">
                        <dl class="row">
                            <dt class="col-6 custom-dt">Absent</dt>
                            <dd class="text-right col-6 custom-dd">{{ number_format($data->pay_absent ?? 0, 0, ',', '.') }}</dd>

                            <dt class="col-6 custom-dt">Late</dt>
                            <dd class="text-right col-6 custom-dd">{{ number_format($data->pay_late ?? 0, 0, ',', '.') }}</dd>

                            <dt class="col-6 custom-dt">Annual Leave/MC</dt>
                            <dd class="text-right col-6 custom-dd">{{ number_format($data->pay_cuti ?? 0, 0, ',', '.') }}</dd>

                            <dt class="col-6 custom-dt">Other Deduct</dt>
                            <dd class="text-right col-6 custom-dd">{{ number_format($data->other_deduc ?? 0, 0, ',', '.') }}</dd>

                            <dt class="col-6 custom-dt">JHT</dt>
                            <dd class="text-right col-6 custom-dd">{{ number_format($data->jht ?? 0, 0, ',', '.') }}</dd>

                            <dt class="col-6 custom-dt">BPJS Health Care</dt>
                            <dd class="text-right col-6 custom-dd">{{ number_format($data->bpjs_kesehatan ?? 0, 0, ',', '.') }}</dd>

                            <dt class="col-6 custom-dt">BPJS Pension</dt>
                            <dd class="text-right col-6 custom-dd">{{ number_format($data->bpjs_tk ?? 0, 0, ',', '.') }}</dd>

                            <dt class="col-6 custom-dt">Tax</dt>
                            <dd class="text-right col-6 custom-dd">{{ number_format($data->tax ?? 0, 0, ',', '.') }}</dd>
                        </dl>
                    </div>
                <hr>
            </div>
        </div>
    </div>
    {{-- Modal Filter --}}
    @if ($data)
    <div class="modal fade" id="filterModalDeduc" tabindex="-1" role="dialog" aria-labelledby="filterModalDeducLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="filterModalDeducLabel">Filter Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <form action="{{ route('showDeduc') }}" method="post">
                                {{-- <form id="periode-form"> --}}
                                @csrf
                            <div class="col-12 p-2 cust-period ">
                                <div class="col custom-1">
                                    <h5>Periode</h5>
                                </div>
                                <div class="col-4 select-cust mx-auto">
                                    <select  id="periode" name="periode" style="margin: auto; display: block;">
                                        @forelse ( $availablePeriods as $periode )
                                            <option value="{{ $periode }}"
                                            {{ $selectedPeriode == $periode ? 'selected' : ''}}>
                                            {{ $periode }}
                                            </option>
                                        @empty
                                            <option value="No Option">No Option</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 p-2 btn-cust ">
                                {{-- <button class="btn btn-primary" id="viewButton"><i class="bi bi-eye-fill"></i> View</button> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="viewButton">Apply</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    @else
    <div class="modal fade" id="filterModalDeduc" tabindex="-1" role="dialog" aria-labelledby="filterModalDeducLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="filterModalDeducLabel">Filter Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <p class="nodatainfo">Tidak ada data yang tersedia.</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection
