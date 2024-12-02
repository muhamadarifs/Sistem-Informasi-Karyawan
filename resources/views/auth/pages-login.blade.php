@extends('layouts.index-login')

@section('contents')
<div class="container">
    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-5 d-flex flex-column align-items-center justify-content-center">
            @if (session('status'))
                <div id="status-alert" class="alert alert-success mt-3" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            @if (session()->has('LoginError'))
                <div id="status-alert" class="alert alert-danger alerts-dismissible fade show" role="alert">
                    {{ session('LoginError') }}
                </div>
            @endif

            @if(session('message'))
                <div id="status-alert" class="alert alert-success">
                    {{session('message')}}
                </div>
            @endif

            <div class="d-flex justify-content-center py-4">
              <a href="#" class="logo d-flex align-items-center w-auto">
                <img src="{{ asset('img/1.png')}}" alt="">
              </a>
            </div>

            <div class="card mb-3">
                <div class="card-body">
                    <div class="pt-4 pb-2">
                        <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                    </div>

                    <form class="row g-3 needs-validation" method="POST" action="{{ Route('postlogin')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="col-12">
                            <label for="email" class="form-label">Email</label>
                            <div class="input-group has-validation">
                                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Example@gmail.com" id="email" value="{{ old('email') }}" required autofocus autocomplete="email">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="password" class="form-label">Password</label>
                            <div class="password-wrapper">
                                <input type="password" name="password" class="form-control" placeholder="Enter your password" id="password" class="password-input" required>
                                <i id="togglePassword" class="fa-solid fa-eye password-icon"></i>
                                {{-- <button class="btn" type="button" id="togglePassword">
                                    <i class="bi bi-eye"></i>
                                </button> --}}
                            </div>
                            <div class="invalid-feedback">Please enter your password!</div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary w-100" type="submit">Login</button>
                        </div>
                        <div class="col-12">
                            <p class="small mb-0">Forgot Your Password ? <a href="{{ route('password.forgot') }}">Reset Password </a></p>
                        </div>
                    </form>

                </div>
            </div>

            <div class="credits">
              <i class="bi bi-c-circle"></i> Copyright Human Resources | FEEN MARINE
            </div>

          </div>
        </div>
      </div>

    </section>

  </div>
  <script>
    setTimeout(function() {
            document.getElementById('status-alert');
    }, 5000);

    document.getElementById("togglePassword").addEventListener("click", function() {
        var passwordInput = document.getElementById("password");
        var icon = document.querySelector("#togglePassword");

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        } else {
            passwordInput.type = "password";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        }
    });
  </script>
@endsection
