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
        margin-bottom: 5px;
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
    <h1>Special Leave Application</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
        <li class="breadcrumb-item">My Application Form</li>
        <li class="breadcrumb-item active">Create Special Leave Application</li>
      </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">
        <!-- Left side columns -->
      <div class="col-lg-7 mx-auto">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title ct-custom text-center">Special Leave Application Form</h5>
                    </div>
                    <div class="card-body" >
                        <!-- Vertical Form -->
                        <form class="row g-3" method="POST" action="{{ route('storeSpecialLeave') }}" enctype="multipart/form-data" >
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

                            {{-- Pengajuan Cuti --}}
                            <h5 class="title">Pengajuan Izin / <em>Permit Submission</em> :</h5>
                            <div class="col-12">
                                <select class="form-select " id="changeSection" name="cuti" required >
                                    <option value="-" disabled selected>- Pilih Opsi -</option>
                                    <option value="Cuti Melahirkan"  >Cuti Melahirkan</option>
                                    <option value="Cuti Keguguran"  >Cuti Keguguran</option>
                                    <option value="Anggota Keluarga Pekerja dirawat di Rumah Sakit"  >Anggota Keluarga Pekerja dirawat di Rumah Sakit</option>
                                    <option value="Pernikahan Karyawan" >Pernikahan Karyawan</option>
                                    <option value="Pernikahan anak karyawan"  >Pernikahan anak karyawan</option>
                                    <option value="Istri Karyawan Melahirkan, Keguguran" >Istri Karyawan Melahirkan/Keguguran</option>
                                    <option value="Mengkhitankan atau Membaptiskan Anak" >Mengkhitankan/Membaptiskan Anak</option>
                                    <option value="Kematian (Istri,Suami,Anak,Menantu,Orang Tua,Mertua,Saudara Kandung)" >Kematian Istri/Suami/Anak/Menantu/Orang Tua/Mertua/Saudara Kandung</option>
                                    <option value="Kematian anggota keluarga dalam satu rumah"  >Kematian anggota keluarga dalam satu rumah</option>
                                    <option value="Dinas,Training"  >Dinas/Training</option>
                                </select>
                                @error('cuti')
                                    <div class="invalid-feedback">
                                        {{ $message}}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group" id="lokasi-section" style="display: none;">
                                <label for="location_batam">Lokasi Tujuan :</label>
                                <div class="form-check">
                                    <input type="radio" name="location" value="Batam" id="location_batam" class="form-check-input">
                                    <label class="form-check-label" for="location_batam">Batam</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="location" value="Luar Batam" id="location_luar_batam" class="form-check-input">
                                    <label class="form-check-label" for="location_luar_batam">Luar Batam</label>
                                    <input type="text" name="tujuan" id="tujuan" class="form-control" style="display: none;" placeholder="Tujuan (jika luar Batam)">
                                </div>
                            </div>
                            {{-- Attachment PDF untuk validasi --}}
                            <div class="form-group" id="pdfAttachment" style="display: none;">
                                <label >Lampiran bukti berupa PDF
                                    <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="bi bi-question-circle"></i>
                                    </button>
                                </label>
                                <br>
                                <input type="file" name="pdf_file" accept=".pdf" class="form-control-file mt-2">
                            </div>

                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Pelajari Selengkapnya</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h6 class="model-title"><p>Silahkan lampirkan file untuk validasi dengan format : "Keterangan_NIK_Nama".</p>
                                            <p>Contoh ( Cuti Melahirkan_600024_Tuminah ).</p>
                                            <p>* Keterangan mengikuti dengan cuti yang diambil.</p>
                                            </h6>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
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
                        <!-- Vertical Form -->
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const cutiDropdown = document.getElementById("changeSection");
            const pdfAttachment = document.getElementById("pdfAttachment");
            const lokasiSection = document.getElementById("lokasi-section");
            const locationRadioLuarBatam = document.getElementById("location_luar_batam");
            const tujuanInput = document.getElementById("tujuan");
            const locationRadioBatam = document.getElementById("location_batam");

            cutiDropdown.addEventListener("change", function () {
                const selectedValue = cutiDropdown.value;

                if (selectedValue === "Kematian (Istri,Suami,Anak,Menantu,Orang Tua,Mertua,Saudara Kandung)") {
                    pdfAttachment.style.display = "block";
                    lokasiSection.style.display = "block";
                } else {
                    pdfAttachment.style.display = "block";
                    lokasiSection.style.display = "none";
                    tujuanInput.style.display = "none";
                    locationRadioBatam.checked = true;
                }
            });

            locationRadioLuarBatam.addEventListener("change", function () {
                if (locationRadioLuarBatam.checked) {
                    tujuanInput.style.display = "block";
                } else {
                    tujuanInput.style.display = "none";
                }
            });
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

        var toDate = document.getElementById('todate').value;
        var backOfficeDate = document.getElementById('backoffice').value;

        // Sekarang variabel toDate dan backOfficeDate berisi nilai dari masing-masing elemen input
        console.log('To Date:', toDate);
        console.log('Back to Office Date:', backOfficeDate);

        // Panggil fungsi calculateAndUpdateDates saat ada perubahan dalam elemen radio atau input
        var radioInputs = document.querySelectorAll('input[type="radio"]');
        radioInputs.forEach(function(input) {
            input.addEventListener('change', calculateAndUpdateDates);
        });

        // check 8 + radio button
        document.addEventListener("DOMContentLoaded", function () {
            const luarBatamRadio = document.getElementById("location_luar_batam");
            const tujuanLuarBatamInput = document.getElementById("tujuan");
            const batamRadio = document.getElementById("location_batam");

            if (luarBatamRadio && tujuanLuarBatamInput && batamRadio) {
                luarBatamRadio.addEventListener("change", function () {
                    if (luarBatamRadio.checked) {
                        tujuanLuarBatamInput.style.display = "inline";
                    } else {
                        tujuanLuarBatamInput.style.display = "none";
                    }
                });

                batamRadio.addEventListener("change", function () {
                    tujuanLuarBatamInput.style.display = "none";
                });
            }
        });

        function calculateAndUpdateDates() {
            var toDate = document.getElementById('todate');
            var backOfficeDate = document.getElementById('backoffice');
            var luarBatamRadio = document.getElementById('location_luar_batam');
            var batamRadio = document.getElementById('location_batam');

            // Dapatkan nilai radio button "location8"
            var locationRadio = document.querySelector('input[name="location"]:checked');

            // Pastikan kedua input terisi
            if (toDate && backOfficeDate && locationRadio) {
                var toDateValue = toDate.value;
                var backOfficeDateValue = backOfficeDate.value;
                // Ambil nilai dari radio button "Luar Batam" dan "Batam"
                var isLuarBatam = luarBatamRadio.checked;
                var isBatam = batamRadio.checked;

                if (isLuarBatam && toDateValue && backOfficeDateValue) {
                    if (!toDate.dataset.originalValue) {
                        // Simpan nilai asli toDate saat pertama kali memilih "Luar Batam"
                        toDate.dataset.originalValue = toDateValue;
                        backOfficeDate.dataset.originalValue = backOfficeDateValue;
                    }
                    // Jika "Luar Batam" dipilih, tambahkan 1 hari ke toDate dan backOfficeDate
                    var toDateDate = new Date(toDateValue);
                    var backOfficeDateDate = new Date(backOfficeDateValue);
                    toDateDate.setDate(toDateDate.getDate() + 1);
                    backOfficeDateDate.setDate(backOfficeDateDate.getDate() + 1);
                    while (isWeekend(toDateDate)) {
                        toDateDate.setDate(toDateDate.getDate() + 1);
                    }

                    // Konversi tanggal yang sudah diperbarui ke format yang sesuai
                    var updatedToDate = toDateDate.toISOString().split('T')[0];
                    var updatedBackOfficeDate = backOfficeDateDate.toISOString().split('T')[0];

                    // Update nilai toDate dan backOfficeDate di form
                    toDate.value = updatedToDate;
                    backOfficeDate.value = updatedBackOfficeDate;
                } else if (isBatam) {
                    // Jika "Batam" dipilih, pastikan toDate dan backOfficeDate kembali ke nilai asli
                    if (toDate.dataset.originalValue && backOfficeDate.dataset.originalValue) {
                        toDate.value = toDate.dataset.originalValue;
                        backOfficeDate.value = backOfficeDate.dataset.originalValue;
                        // Hapus data originalValue untuk menghindari pemrosesan berulang
                        delete toDate.dataset.originalValue;
                        delete backOfficeDate.dataset.originalValue;
                    }
                }
            }
        }
    </script>
</section>

@endsection
