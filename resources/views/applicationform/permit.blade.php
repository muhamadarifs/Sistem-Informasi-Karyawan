@extends('layouts.header-sidebar')

@section('content1')
<style>
    .row{
        font-family: "Poppins", sans-serif;
        font-size: 17px;
        margin-top: 10px;
    }
    .input-custom{
        margin-bottom: 15px;
    }
    .card-title{
        padding: 10px 0 0 0;
        font-size: 20px;
    }
    .form-control{
        font-family: "Nunito", sans-serif;
    }
    .bi{
        margin-left: 5px;
    }
    .alert svg {
        width: 1em;
        height: 1em;
        vertical-align: middle;
        fill: currentColor;
    }
    .alert .icon-wrapper {
        display: flex;
        align-items: center;
    }
    @media (max-width: 767px) {
        .row{
            font-size: 16px;
            margin-top: 10px;
        }
        .card-title{
            font-size: 20px;
        }
    }
</style>
<div class="pagetitle">
    <h1>Permit Application</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
        <li class="breadcrumb-item">My Application Form</li>
        <li class="breadcrumb-item active">Create Permit Application</li>
      </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
        <symbol id="info-fill" viewBox="0 0 16 16">
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
        </symbol>
    </svg>
    <div class="row">
        <!-- Left side columns -->
      <div class="col-lg-8 mx-auto">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title text-center">Permit Application Form</h5>
                    </div>
                    <div class="card-body" >
                        <div class="alert alert-info d-flex align-items-center" role="alert">
                            <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
                            <div>You have applied for {{ $currentPeriodPermitCount }} out of {{ $maxPermits }} permits for the current period.</div>
                        </div>
                        <!-- Vertical Form -->
                        <form class="row g-3" method="POST" action="{{ route('storePermit') }}" enctype="multipart/form-data" onsubmit="return validateForm()">
                            @csrf
                            <div class="row mb-3">
                                {{-- check11 --}}
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="gridRadio11" name="permit" value="Unpaid Leave" >
                                    <label class="form-check-label" for="gridRadio11">
                                        Cuti Tanpa Upah / <em>Unpaid Leave. (Approved by Management)</em>
                                    </label>
                                </div>
                                <div id="textInput11" style="display: none;" class="mb-3 mt-2 form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="number" class="form-label">Jumlah Hari Cuti</label>
                                            <input type="text" class="form-control input-custom" id="jumlah_hari" name="jumlah_hari" oninput="calculateToDate()" >
                                        </div>
                                        <div class="col-6">
                                            <label for="date" class="form-label">From Date</label>
                                            <input type="date" class="form-control input-custom" id="date" name="from_date" oninput="calculateToDate()" >
                                        </div>
                                        <div class="col-6">
                                            <label for="todate" class="form-label">To Date</label>
                                            <input type="date" class="form-control input-custom" id="todate" name="to_date" readonly style="background-color: #e9ecef; opacity: 1; color: #495057; pointer-events: none;">
                                        </div>
                                        <div class="col-6">
                                            <label for="backoffice" class="form-label">Date Back to Office</label>
                                            <input type="date" class="form-control input-custom" id="backoffice" name="backoffice_date" readonly style="background-color: #e9ecef; opacity: 1; color: #495057; pointer-events: none;">
                                        </div>
                                        <div class="col-12">
                                            <label for="destination" class="form-label">Leave Destination</label>
                                            <input type="text" class="form-control input-custom" id="destination" name="tujuan" >
                                        </div>
                                    </div>
                                </div>


                                {{-- check12 --}}
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="gridRadio12" name="permit"  value="Datang Terlambat">
                                    <label class="form-check-label" for="gridRadio12">
                                        Izin Datang Terlambat / <em>Late arival Permit.</em>
                                    </label>
                                </div>
                                <div id="textInput12" style="display: none;" class="mb-3 mt-2 form-group">
                                    <input type="text" name="ket_lambat" class="form-control" >
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="date" name="tanggal_datang_lambat" class="form-control mt-2" >
                                        </div>
                                        <div class="col-md-6">
                                            <input type="time" name="jam_datang_lambat" class="form-control mt-2" >
                                        </div>
                                    </div>
                                </div>

                                {{-- check13 --}}
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="gridRadio13" name="permit" value="Pulang Cepat" >
                                    <label class="form-check-label" for="gridRadio13">
                                        Izin Pulang Cepat / <em>Permission to leave early.</em>
                                    </label>
                                </div>
                                <div id="textInput13" style="display: none;" class="mb-3 mt-2 form-group">
                                    <input type="text" name="ket_cepat" class="form-control" >
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="date" name="tanggal_pulang_cepat" class="form-control mt-2" >
                                        </div>
                                        <div class="col-md-6">
                                            <input type="time" name="jam_pulang_cepat" class="form-control mt-2" >
                                        </div>
                                    </div>
                                </div>
                             </div>
                            <div class="col-12">
                                <label for="number" class="form-label">Nomor HP yang bisa dihubungi / <em>HP number can be contacted</em></label>
                                <input type="number" class="form-control" id="number" name="telp" value="{{ Auth::user()->telp }}" >
                            </div>

                            {{-- Button Form --}}
                            <div class="text-center">
                                <button type="reset" class="btn btn-secondary">Reset</button>
                                <button type="submit" class="btn btn-primary">Submit<i class="bi bi-send"></i></button>
                            </div>
                        </form>
                        <!-- Vertical Form -->
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var radios = document.querySelectorAll('input[type="radio"][name="permit"]');

            radios.forEach(function (radio) {
                radio.addEventListener("change", function () {
                    document.getElementById("textInput11").style.display = "none";
                    document.getElementById("textInput12").style.display = "none";
                    document.getElementById("textInput13").style.display = "none";

                    if (radio.checked) {
                        if (radio.id === "gridRadio11") {
                            document.getElementById("textInput11").style.display = "block";
                        } else if (radio.id === "gridRadio12") {
                            document.getElementById("textInput12").style.display = "block";
                        } else if (radio.id === "gridRadio13") {
                            document.getElementById("textInput13").style.display = "block";
                        }
                    }
                });
            });
        });
        function validateForm() {
            var radios = document.querySelectorAll('input[type="radio"][name="permit"]');
            var isChecked = Array.from(radios).some(radio => radio.checked);
            if (!isChecked) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error...',
                    text: 'Silahkan Pilih Opsi yang tersedia',
                });
                return false;
            }

            var unpaidRadio = document.getElementById('gridRadio11');
            var ketUnpaidInput = document.getElementById('ket_unpaid');
            if (unpaidRadio.checked && ketUnpaidInput && ketUnpaidInput.value.trim() === '') {
                Swal.fire({
                    icon: 'error',
                    title: 'Error...',
                    text: 'Keterangan harus diisi',
                });
                return false;
            }
            return true;
        }
        // Document 11
        // var checkbox11 = document.getElementById("gridCheck11");
        // var textInput11 = document.getElementById("textInput11");

        // checkbox11.addEventListener("change", function () {
        //     if (this.checked) {
        //         textInput11.style.display = "block";
        //     } else {
        //         textInput11.style.display = "none";
        //     }
        // });

        // Document 12
        // var checkbox12 = document.getElementById("gridCheck12");
        // var textInput12 = document.getElementById("textInput12");

        // checkbox12.addEventListener("change", function () {
        //     if (this.checked) {
        //         textInput12.style.display = "block";
        //     } else {
        //         textInput12.style.display = "none";
        //     }
        // });

        // Document 13
        // var checkbox13 = document.getElementById("gridCheck13");
        // var textInput13 = document.getElementById("textInput13");

        // checkbox13.addEventListener("change", function () {
        //     if (this.checked) {
        //         textInput13.style.display = "block";
        //     } else {
        //         textInput13.style.display = "none";
        //     }
        // });

        // function validateForm() {
        //     var checkboxes = document.querySelectorAll('input[type="checkbox"]');
        //     var checkedCount = Array.from(checkboxes).filter(checkbox => checkbox.checked).length;

        //     var unpaidCheckbox = document.getElementById('gridCheck11');
        //     var ketUnpaidInput = document.getElementById('ket_unpaid');

        //     if (checkedCount < 1) {
        //         Swal.fire({
        //             icon: 'error',
        //             title: 'Error...',
        //             text: 'Silahkan Pilih Opsi yang tersedia',
        //         });
        //         return false;
        //     }

        //     if (unpaidCheckbox.checked && ketUnpaidInput.value.trim() === '') {
        //         Swal.fire({
        //             icon: 'error',
        //             title: 'Error...',
        //             text: 'Keterangan harus diisi',
        //         });
        //         return false;
        //     }

        //     return true;
        // }

        function updateCheckboxes(checkboxId) {
            var checkboxes = document.querySelectorAll('input[type="checkbox"]');
            checkboxes.forEach(function(checkbox) {
                if (checkbox.id !== checkboxId) {
                    checkbox.checked = false;
                }
            });
        }

        function calculateToDate() {
            var numberOfLeaveDays = document.getElementById('jumlah_hari');
            var fromDate = document.getElementById('date');
            var toDate = document.getElementById('todate');
            var backOfficeDate = document.getElementById('backoffice');

            // Pastikan kedua input terisi
            if (numberOfLeaveDays.value && fromDate.value) {
                var leaveDays = parseInt(numberOfLeaveDays.value, 10) - 1;
                var fromDateValue = new Date(fromDate.value);

                var workingDaysCount = 0;
                var currentDate = new Date(fromDateValue);

                // Hitung jumlah hari kerja
                while (workingDaysCount < leaveDays) {
                    currentDate.setDate(currentDate.getDate() + 1);

                    if (!isWeekend(currentDate)) {
                        workingDaysCount++;
                    }
                }

                while (isWeekend(currentDate)) {
                    currentDate.setDate(currentDate.getDate() + 1);
                }

                // Setel tanggal "To Date" berdasarkan hasil perhitungan
                var formattedToDate = currentDate.toISOString().split('T')[0];
                toDate.value = formattedToDate;

                // Tambahkan tanggal "Date of Back to Office" (tambah 1 hari lagi dari tanggal akhir cuti)
                var backOfficeDateValue = new Date(currentDate);
                backOfficeDateValue.setDate(backOfficeDateValue.getDate() + 1);

                while (isWeekend(backOfficeDateValue)) {
                    backOfficeDateValue.setDate(backOfficeDateValue.getDate() + 1);
                }

                var formattedBackOfficeDate = backOfficeDateValue.toISOString().split('T')[0];
                backOfficeDate.value = formattedBackOfficeDate;

            } else {
                // Kosongkan input jika salah satu input lainnya kosong
                toDate.value = '';
                backOfficeDate.value = '';
            }
        }

        function isWeekend(date) {
            var day = date.getDay();
            return day === 0 || day === 6; // Minggu (0) dan Sabtu (6)
        }

        var toDate = document.getElementById('todate').value;
        var backOfficeDate = document.getElementById('backoffice').value;

        console.log('To Date:', toDate);
        console.log('Back to Office Date:', backOfficeDate);
    </script>
</section>

@endsection
