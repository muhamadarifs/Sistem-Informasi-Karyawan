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
            font-size: 18px;
        }
    }

</style>
<div class="pagetitle">
    <h1>Annual Leave</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item">My Application Form</li>
            <li class="breadcrumb-item active">Create Annual Leave Application</li>
        </ol>
    </nav>
</div>

<section class="section dashboard">

    <div class="row">
        <div class="col-lg-7 mx-auto">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title text-center">Create Annual Leave Application Form</h5>
                        </div>
                        <div class="card-body" >
                            <form id="leaveForm" class="row g-3" method="post" action="{{ route('storeCreateAnnual')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="col-6">
                                    <label for="number" class="form-label">Number of Leave Days</label>
                                    <input type="number" class="form-control" id="jumlah_hari" name="jumlah_hari" oninput="calculateLeaveBalance(); calculateToDate(); checkLeaveBalance();" required>
                                    <div id="warning_message" class="alert alert-danger mt-2" role="alert" style="color: red; display: none;">The number of leave days exceeds the leave balance you have!</div>
                                </div>
                                <div class="col-6">
                                    <label for="annualbalance" class="form-label">Balance of Annual Leave</label>
                                    <input type="text" class="form-control" id="annualbalance" name="leave_balance" value="{{ Auth()->user()->saldo_cuti }}" readonly style="background-color: #e9ecef; opacity: 1; color: #495057; pointer-events: none;">
                                </div>
                                <div class="col-6">
                                    <label for="date" class="form-label">From Date</label>
                                    <input type="date" class="form-control" id="date" name="from_date" oninput="calculateToDate()" required>
                                </div>
                                <div class="col-6">
                                    <label for="todate" class="form-label">To Date</label>
                                    <input type="date" class="form-control" id="todate" name="to_date" readonly style="background-color: #e9ecef; opacity: 1; color: #495057; pointer-events: none;">
                                </div>
                                <div class="col-12">
                                    <label for="destination" class="form-label">Leave Destination</label>
                                    <input type="text" class="form-control" id="destination" name="tujuan" >
                                </div>
                                <div class="col-12">
                                    <label for="backoffice" class="form-label">Date Back to Office</label>
                                    <input type="date" class="form-control" id="backoffice" name="backoffice_date" readonly style="background-color: #e9ecef; opacity: 1; color: #495057; pointer-events: none;">
                                </div>
                                <h5 class="title">Pengajuan Izin / <em>Permit Submission</em> :</h5>
                                <div class="row mb-3">
                                    {{-- checkleave --}}
                                    <div class="form-check">
                                        <input type="checkbox" name="cuti" value="Cuti Tahunan" class="form-check-input"  id="Check" >
                                        <label class="form-check-label" for="Check">
                                            Cuti Tahunan / <em>Annual Leave</em>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="number" class="form-label">Nomor HP yang bisa dihubungi / <em>HP number can be contacted</em></label>
                                    <input type="number" class="form-control" id="number" name="telp" value="{{ Auth::user()->telp}}">
                                </div>
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
        function calculateLeaveBalance() {
            var jumlahHariInput = document.getElementById("jumlah_hari").value;
            var annualBalanceInput = document.getElementById("annualbalance");
            var warning_message = document.getElementById('warning_message');
            var initialBalance = {{ Auth()->user()->saldo_cuti }};
            var calculatedBalance = initialBalance - parseInt(jumlahHariInput);

            if (jumlahHariInput.trim() !== "") {
                if (calculatedBalance >= 0) {
                    annualBalanceInput.value = calculatedBalance;
                    warning_message.style.display = 'none';
                } else {
                    annualBalanceInput.value = initialBalance;
                    warning_message.style.display = 'block';
                }
            } else {
                annualBalanceInput.value = initialBalance;
                warning_message.style.display = 'none';
            }
        }
        document.getElementById("leaveForm").onsubmit = function() {
            var warning_message = document.getElementById('warning_message');
            if (warning_message.style.display === 'block') {
                return false;
            }
        };

        // FIXED
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
        // Sekarang variabel toDate dan backOfficeDate berisi nilai dari masing-masing elemen input
        console.log('To Date:', toDate);
        console.log('Back to Office Date:', backOfficeDate);
    </script>
</section>
@endsection
