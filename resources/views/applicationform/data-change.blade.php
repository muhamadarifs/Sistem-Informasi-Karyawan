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
    <h1>Data Change</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
        <li class="breadcrumb-item">My Application Form</li>
        <li class="breadcrumb-item active">Create Submission of Data Change</li>
      </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">
        <!-- Left side columns -->
      <div class="col-lg-5 mx-auto">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title text-center">Submission of Data Change Form</h5>
                    </div>
                    <div class="card-body" >
                        <!-- Vertical Form -->
                        <form class="row g-3" id="data-change-form" method="post" action="{{ route('storeDataChange') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="col-12">
                                <label for="changeSection" class="form-label">Data yang ingin di ubah</label>
                                <select class="form-select @error('data_change') is-invalid @enderror" id="changeSection" name="data_change" value="{{old('data_change')}}">
                                    <option value="-" disabled selected>- Pilih Opsi -</option>
                                    <option value="Alamat" @if(old('data_change') == 'Alamat') selected @endif >Alamat</option>
                                    <option value="Email" @if(old('data_change') == 'Email') selected @endif >Email</option>
                                    <option value="No-KK" @if(old('data_change') == 'No-KK') selected @endif >Nomor Kartu Keluarga</option>
                                    <option value="Telepon" @if(old('data_change') == 'Telepon') selected @endif >Nomor Telepon</option>
                                    <option value="Rekening" @if(old('data_change') == 'Rekening') selected @endif >Nomor Rekening</option>
                                    <option value="Anggota-Keluarga" @if(old('data_change') == 'Anggota-Keluarga') selected @endif >Anggota Keluarga</option>
                                    <option value="Size-Wearpack" @if(old('data_change') == 'Size-Wearpack') selected @endif >Size Wearpack</option>
                                    <option value="Size-Sepatu" @if(old('data_change') == 'Size-Sepatu') selected @endif >Size Sepatu</option>
                                    <option value="Emergency-Contact" @if(old('data_change') == 'Emergency-Contact') selected @endif >Emergency Contact</option>
                                    <option value="Family Status" @if(old('data_change') == 'Family Status') selected @endif >Family Status</option>
                                </select>
                                @error('data_change')
                                    <div class="invalid-feedback">
                                        {{ $message}}
                                    </div>
                                @enderror
                            </div>
                            {{--  --}}
                            <!-- Input mengambang untuk data yang akan diubah -->
                            <div class="col-12" id="" >
                                <label for="inputField" class="form-label">Masukkan Data Baru</label>
                                <input type="text" class="form-control @error('newdata') is-invalid @enderror" id="inputField" name="newdata" required value="{{old('newdata')}}">
                                @error('newdata')
                                    <div class="invalid-feedback">
                                        {{ $message}}
                                    </div>
                                @enderror
                            </div>
                            {{-- Attachment PDF untuk validasi --}}
                            <div id="pdfAttachment" style="display: none;">
                                <label for="pdfFile">Lampiran bukti berupa PDF
                                    <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="bi bi-question-circle"></i>
                                    </button>
                                </label>
                                <input type="file" class="form-control-file mt-2 @error('pdf_file') is-invalid @enderror"  id="pdfFile" name="pdf_file"  value="{{old('pdf_file')}}">
                                @error('pdf_file')
                                    <div class="invalid-feedback">
                                        {{ $message}}
                                    </div>
                                @enderror
                            </div>

                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Pelajari Selengkapnya</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h6 class="model-title"><p>Silahkan lampirkan file untuk validasi data dengan format : "NamaData_NIK_Nama".</p>
                                            <p>Contoh ( Rekening_600024_Gita Sekar Andarini )</p>
                                            </h6>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Button Form --}}
                            <div class="text-center">
                                <button type="reset" class="btn btn-secondary">Reset</button>
                                <button type="submit" class="btn btn-primary" >Submit<i class="bi bi-send"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>

</section>
    {{-- Using Sweetalert2 --}}
    <script src="js/sweetalert2@10.js"></script>
    <script src="js/jquery-3.7.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
    var changeSectionSelect = document.getElementById("changeSection");
    var inputForm = document.getElementById("inputForm");
    var inputField = document.getElementById("inputField");
    var errorText = document.getElementById("errorText");
    var oldValue = inputField.value;

    changeSectionSelect.addEventListener("change", function () {
        var selectedOption = changeSectionSelect.value;

        if (selectedOption === "Alamat") {
            inputField.type = "text";
            inputField.placeholder = "e.g. Perum. Green Land , Tlk. Tering, Kec. Batam Kota, Kota Batam, Kepulauan Riau 29444";

        } else if (selectedOption === "Telepon") {
            inputField.type = "number";
            inputField.placeholder = "e.g. 0812xxxxxxxx";

        } else if (selectedOption === "No-KK") {
            inputField.type = "number";
            inputField.placeholder = "e.g. 217xxxxxxxxxxxxx";

        } else if (selectedOption === "Rekening") {
            inputField.type = "number";
            inputField.placeholder = "e.g. 109xxxxxxxxxx";

        } else if (selectedOption === "Email") {
            inputField.type = "email";
            inputField.placeholder = "e.g. Example@gmail.com";

        } else if (selectedOption === "Anggota-Keluarga") {
            inputField.type = "text";
            inputField.placeholder = "e.g. Suami/Istri : Nama atau Anak : nama";

        } else if (selectedOption === "Size-Wearpack") {
            inputField.type = "text";
            inputField.placeholder = "e.g. XL";

        } else if (selectedOption === "Size-Sepatu") {
            inputField.type = "number";
            inputField.placeholder = "e.g. 38";

        } else if (selectedOption === "Emergency-Contact") {
            inputField.type = "number";
            inputField.placeholder = "e.g. 0812xxxxxxxx";
        }
    });

    inputField.addEventListener("blur", function () {
        if (changeSectionSelect.value === "email") {
            var emailValue = inputField.value;
            if (!isValidEmail(emailValue)) {
                errorText.textContent = "Alamat email tidak valid!";
                inputField.value = oldValue;
            } else {
                errorText.textContent = "";
            }
        }
    });

    function isValidEmail(email) {
        var pattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        return pattern.test(email);
    }

    document.getElementById('changeSection').addEventListener('change', function() {
    var changeSectionSelect = document.getElementById("changeSection");
    var pdfAttachment = document.getElementById('pdfAttachment');
    var pdfFileInput = document.getElementById('pdfFile');

    var selectedValue = changeSectionSelect.value;

    if (selectedValue === 'Rekening' || selectedValue === 'No-KK' || selectedValue === 'Anggota-Keluarga' || selectedValue === 'Family Status') {
        pdfAttachment.style.display = 'block';
    } else {
        pdfFileInput.value = '';
        pdfAttachment.style.display = 'none';
    }
});


    document.getElementById('data-change-form').addEventListener('reset', function() {
        var pdfFileInput = document.getElementById('pdfFile');
        pdfFileInput.value = '';
    });

    </script>

@endsection
