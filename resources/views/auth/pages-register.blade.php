<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Feen Marine | Register</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="css/login.css" rel="stylesheet">

  {{-- BOOTSTRAP ICON --}}
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="img/logo.png" alt="">
                  <span class="d-none d-lg-block">XYZ</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                    <p class="text-center small">Enter your personal details to create account</p>
                  </div>

                    @if(session('message'))
                        <div class="alert alert-success">
                            {{session('message')}}
                        </div>
                    @endif
                  <form class="row g-3 needs-validation"  action="{{ Route ('postregist')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- <div class="col-12">
                      <label for="youridkaryawan" class="form-label">ID Karyawan</label>
                      <input type="text" name="id_karyawan" class="form-control" id="youridkaryawan" required>
                      <div class="invalid-feedback">Please, enter your Karyawan ID!</div>
                    </div> --}}
                    <div class="col-12">
                      <label for="yournik" class="form-label">NIK</label>
                      <input type="number" name="nik" class="form-control" id="yournik" required>
                      <div class="invalid-feedback">Please, enter your NIK!</div>
                    </div>

                    <div class="col-12">
                      <label for="yournik" class="form-label">Employee ID</label>
                      <input type="number" name="employee_id" class="form-control" id="youremployeid" required>
                      <div class="invalid-feedback">Please, enter your Employe ID!</div>
                    </div>


                    {{-- <div class="col-12">
                      <label for="position-option">Posisi</label>
                      <select class="form-select" id="position-option" name="position_id">

                        @if(isset($positions))
                        @foreach ($positions as $position)
                            <option value="{{ $position->id }}">{{ $position->position_name }}</option>
                        @endforeach
                        @endif

                      </select>
                      <div class="invalid-feedback">Please, Choose your position!</div>
                    </div> --}}

                    {{-- name --}}
                    <div class="col-12">
                      <label for="yourName" class="form-label">Your Name</label>
                      <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="yourName" required value="{{old('name')}}">
                      @error('name')
                        <div class="invalid-feedback">
                            {{ $message}}
                        </div>
                      @enderror
                      {{-- <div class="invalid-feedback">Please, enter your name!</div> --}}
                    </div>

                    {{-- email --}}
                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Your Email</label>
                      <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="yourEmail" required value="{{old('email')}}">
                      @error('email')
                        <div class="invalid-feedback">
                            {{ $message}}
                        </div>
                      @enderror
                      {{-- <div class="invalid-feedback">Please, enter a valid Email adddress!</div> --}}
                    </div>

                    {{-- pass --}}
                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <div class="input-group has-validation">
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" required>
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message}}
                        </div>
                      @enderror
                      </div>
                    </div>

                    <div class="col-12 mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select name="role" class="form-select" id="role" required>
                            <option selected disabled>Select Option</option>
                            <option value="nonstaff">Non Staff</option>
                            <option value="staff">Staff</option>
                            <option value="admin">Admin</option>
                            <option value="superadmin">Super Admin</option>
                        </select>
                        <div class="invalid-feedback">Mohon, Isi role !</div>
                    </div>

                    {{-- <div class="col-12">
                      <label for="yourConfirmPassword" class="form-label">Confirm Password</label>
                      <input type="password" name="ConfirmPassword" class="form-control" id="yourConfirmPassword" required>
                      <div class="invalid-feedback">Please enter your Confirm Password!</div>
                    </div> --}}

                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Create Account</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Already have an account? <a href="/login">Log in</a></p>
                    </div>
                  </form>

                </div>
              </div>
              <div class="credits">
                <i class="bi bi-c-circle"></i> Copyright Developer | UserUnknown
              </div>
            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="vendor/apexcharts/apexcharts.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/chart.js/chart.umd.js"></script>
  <script src="vendor/echarts/echarts.min.js"></script>
  <script src="vendor/quill/quill.min.js"></script>
  <script src="vendor/simple-datatables/simple-datatables.js"></script>
  <script src="vendor/tinymce/tinymce.min.js"></script>
  <script src="vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
