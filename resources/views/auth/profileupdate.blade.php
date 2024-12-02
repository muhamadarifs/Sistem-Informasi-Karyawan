@extends('layouts.header-sidebar')

@section('content1')
<style>
    .card{
        font-family: "Nunito", sans-serif;
    }
    .label{
        font-family: "Poppins", sans-serif;
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css">

<section class="section profile">
    <div class="row">
      <div class="col-xl-4">

        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

            @if(Auth::user()->image)
            <img class="image rounded-circle" src="{{asset('/storage/images/'.Auth::user()->image)}}" alt="profile_image" style="width: 80px;height: 80px; padding: 10px; margin: 0px; ">
            @endif
            <h2>{{ Auth()->user()->name }}</h2>
            <h3>{{ Auth()->user()->position->position_name }}</h3>
            {{-- <div class="social-links mt-2">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div> --}}
          </div>
        </div>

      </div>

      <div class="col-xl-8">
        <div class="card">
          <div class="card-body pt-3">
            <div class="tab-content pt-2">

              <div class="tab-pane fade show active profile-overview" id="profile-overview">
                <h5 class="card-title">Edit Profile - {{ Auth()->user()->name }}</h5>
                <!-- Profile Edit Form -->
                <div class="row mb-3">
                    <label for="imageUploadInput" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                    <div class="col-md-8 col-lg-9">
                        @if(Auth::user()->image && Auth::user()->image != 'user.png')
                            <img class="image rounded-circle" src="{{ asset('/storage/images/' . Auth::user()->image) }}" alt="profile_image" style="width: 80px; height: 80px; padding: 10px; margin: 0px;">
                        @else
                            <img class="image rounded-circle" src="{{ asset('/storage/images/user.png') }}" alt="default_image" style="width: 80px; height: 80px; padding: 10px; margin: 0px;">
                        @endif
                      <div class="pt-2">
                        <!-- Button untuk mengupload gambar -->
                        <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image" id="uploadButton" data-bs-toggle="modal" data-bs-target="#cropModal">
                            <i class="bi bi-upload"></i> Upload
                        </a>
                        <!-- Modal untuk crop foto -->
                        {{-- <div class="modal fade" id="cropModal" tabindex="-1" role="dialog" aria-labelledby="cropModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="cropModalLabel">Select Your Image</h5>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Form untuk mengunggah dan memotong gambar -->
                                        <form action="{{ route('uploadImage') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="file" name="image" id="imageUploadInput"  accept="image/*">
                                            <img id="imagePreview" style="max-width: 100%;">
                                        </form>
                                        <!-- End Form untuk mengunggah dan memotong gambar -->
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <button type="button" class="btn btn-success" id="cropButton">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <!-- End Button untuk mengupload gambar -->
                        <div id="uploadForm" style="display: none;">
                            <!-- Form untuk mengunggah gambar -->
                            <form action="{{ route('uploadImage') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="image" id="imageUploadInput" style="display: none;" accept="image/*" onchange="this.form.submit()">
                                {{-- <button type="button" class="btn btn-success btn-sm" id="cropButton">
                                    <i class="bi bi-check"></i> Save
                                </button> --}}
                                {{-- <button type="button" class="btn btn-secondary btn-sm" id="cancelButton">
                                    <i class="bi bi-x"></i> Cancel
                                </button> --}}
                                <img id="imagePreview" style="max-width: 100%;">
                            </form>
                            <!-- End Form untuk mengunggah gambar -->
                        </div>

                        <!-- Button untuk menghapus gambar -->
                        <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image" id="removeButton">
                            <i class="bi bi-trash"></i> Remove
                        </a>
                        <form id="removeImageForm" action="{{ route('removeImage', $user->name) }}" method="POST">
                            @csrf
                        </form>
                        <!-- End Button untuk menghapus gambar -->
                      </div>
                    </div>
                </div>
                <!-- End Profile Edit Form -->

                {{-- update Data User --}}
                <form method="POST" action="{{ route('updateProfile') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                  <div class="row mb-3">
                    <label for="nik" class="col-md-4 col-lg-3 col-form-label">Employee ID</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="nik" type="text" class="form-control" id="nik" value="{{Auth()->user()->employe_id }}" disabled>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="employe_id" class="col-md-4 col-lg-3 col-form-label">NIK</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="employe_id" type="text" class="form-control" id="employe_id" value="{{Auth()->user()->nik}}" disabled>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="warga_negara" class="col-md-4 col-lg-3 col-form-label">Kewarganegaraan</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="warga_negara" type="text" class="form-control" id="warga_negara" value="{{ Auth()->user()->warga_negara, old('warga_negara')}}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="name" class="col-md-4 col-lg-3 col-form-label">Name</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="name" type="text" class="form-control" id="name" value="{{ Auth()->user()->name, old('name')}}">
                      @error('name')
                        <div class="invalid-feedback">
                            {{ $message}}
                        </div>
                      @enderror
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="tgl_lahir" class="col-md-4 col-lg-3 col-form-label">Tanggal Lahir</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="tgl_lahir" type="date" class="form-control" id="tgl_lahir" value="{{ Auth()->user()->tgl_lahir, old('tgl_lahir')}}">
                      @error('tgl_lahir')
                        <div class="invalid-feedback">
                            {{ $message}}
                        </div>
                      @enderror
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="jenis_kelamin" class="col-md-4 col-lg-3 col-form-label">Jenis Kelamin</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="jenis_kelamin" type="text" class="form-control" id="jenis_kelamin" value="{{ Auth()->user()->jenis_kelamin, old('jenis_kelamin')}}">
                      @error('jenis_kelamin')
                        <div class="invalid-feedback">
                            {{ $message}}
                        </div>
                      @enderror
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="email" type="email" class="form-control" id="email" value="{{ Auth()->user()->email, old('email')}}">
                      @error('email')
                        <div class="invalid-feedback">
                            {{ $message}}
                        </div>
                      @enderror
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="telp" class="col-md-4 col-lg-3 col-form-label">No. HP</label>
                    <div class="col-md-8 col-lg-9">
                        <input name="telp" type="number" class="form-control" id="telp" value="{{ Auth()->user()->telp, old('telp')}}">
                        @error('telp')
                        <div class="invalid-feedback">
                            {{ $message}}
                        </div>
                      @enderror
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="alamat" class="col-md-4 col-lg-3 col-form-label">Alamat</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="alamat" type="text" class="form-control" id="alamat" value="{{ Auth()->user()->alamat, old('alamat')}}">
                      @error('alamat')
                        <div class="invalid-feedback">
                            {{ $message}}
                        </div>
                      @enderror
                    </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                  </div>
                </form><!-- End Profile Edit Form -->

              </div>
            </div><!-- End Bordered Tabs -->
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
    <script>
        // Tombol upload
        document.getElementById('uploadButton').addEventListener('click', function () {
        //   // Membuka dialog pemilihan file ketika tombol upload diklik
          document.getElementById('imageUploadInput').click();
        });

//

        // Input file untuk mengunggah gambar
        document.getElementById('imageUploadInput').addEventListener('change', function () {
          var file = this.files[0];
          if (file) {
            Swal.fire({
                icon: 'success',
                title: 'Gambar berhasil diunggah',
                text: file.name,
            });
          }
        });

        document.addEventListener("DOMContentLoaded", function () {
            const removeButton = document.getElementById("removeButton");
            const removeImageForm = document.getElementById("removeImageForm");

            removeButton.addEventListener("click", function (e) {
                e.preventDefault();
                const confirmed = confirm("Are you sure you want to remove your profile image?");

                if (confirmed) {
                    removeImageForm.submit();
                }
            });
        });

      </script>
</section>
@endsection
