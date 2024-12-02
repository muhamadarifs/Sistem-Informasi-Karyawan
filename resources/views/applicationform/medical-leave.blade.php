@extends('layouts.header-sidebar')

@section('content1')
<style>
    .card{
        font-family: "Poppins", sans-serif;
    }
    .card-body{
        font-size: 17px;
        margin-top: 10px;
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
    .title{
        font-family: "Poppins", sans-serif;
        font-weight: 500;
        color: #012970;
        font-size: 18px;
        margin-top: 30px;
        margin-bottom: 15px;
    }
    @media (max-width: 767px) {
        .card-body{
            font-size: 16px;
            margin-top: 10px;
        }
        .card-title{
            font-size: 20px;
        }
    }
</style>
<div class="pagetitle">
    <h1>Medical Leave Application</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item">My Application Form</li>
            <li class="breadcrumb-item active">Create Medical Leave Application</li>
        </ol>
    </nav>
</div>

<section class="section dashboard">
    <div class="row">
        <!-- Left side columns -->
        <div class="col-lg-7 mx-auto">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title text-center">Medical Leave Application Form</h5>
                        </div>
                        <div class="card-body" >
                            <form class="row g-3" method="POST" action="{{ route('storeMedical') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="col-6">
                                    <label for="number" class="form-label">Number of Leave Days</label>
                                    <input type="number" class="form-control" id="jumlah_hari" name="jumlah_hari" oninput="calculateToDate()">
                                </div>
                                <div class="col-6">
                                    <label for="date" class="form-label">From Date</label>
                                    <input type="date" class="form-control" id="date" name="from_date" oninput="calculateToDate()">
                                </div>
                                <div class="col-6">
                                    <label for="todate" class="form-label">To Date</label>
                                    <input type="date" class="form-control" id="todate" name="to_date" readonly style="background-color: #e9ecef; opacity: 1; color: #495057; pointer-events: none;">
                                </div>
                                <div class="col-6">
                                    <label for="backoffice" class="form-label">Date Back to Office</label>
                                    <input type="date" class="form-control" id="backoffice" name="backoffice_date" readonly style="background-color: #e9ecef; opacity: 1; color: #495057; pointer-events: none;">
                                </div>
                                <h5 class="title">Pengajuan Izin / <em>Permit Submission</em> :</h5>
                                <div class="row mb-3 ">
                                    {{-- check medical leave --}}
                                    <div class="form-check" style="margin-right: 10px; margin-left: 10px;">
                                        <input class="form-check-input" type="checkbox" id="gridCheck1" name="cuti" value="Cuti Sakit (MC)">
                                        <label class="form-check-label" for="gridCheck1"> Cuti Sakit / <em> Sick Leave (MC)</em></label>
                                    </div>
                                    <div id="fileUpload1" style="display: none;" class="mb-3 mt-2">
                                        <input type="file" name="pdf_file">
                                    </div>
                                    <hr>
                                </div>
                                <div class="col-12">
                                    <label for="number" class="form-label">Nomor HP yang bisa dihubungi / <em>HP number can be contacted</em></label>
                                    <input type="number" class="form-control" id="number" name="telp" value="{{ Auth::user()->telp }}">
                                </div>
                                {{-- Button Form --}}
                                <div class="text-center">
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                    <button type="submit" class="btn btn-primary">Submit<i class="bi bi-send"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // document 1
        document.getElementById("gridCheck1").addEventListener("change", function() {
            var fileUpload1 = document.getElementById("fileUpload1");
            if (this.checked) {
                fileUpload1.style.display = "block";
            } else {
                fileUpload1.style.display = "none";
            }
        });

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
                document.getElementById('dateoutput');
            }
        }

        function isWeekend(date) {
            var day = date.getDay();
            return day === 0 || day === 6; // Minggu (0) dan Sabtu (6)
        }
    </script>
</section>

@endsection
