@extends('layouts.header-sidebar')

@section('content1')
<style>
    .form-label{
        font-family: "Poppins", sans-serif;
    }
    .form-control,
    .btn{
        font-family: "Nunito", sans-serif;
    }
    .model-title{
        font-family: "Nunito", sans-serif;
    }
    .modal-footer {
        text-align: center;
    }
    h6{
        font-family: "Poppins", sans-serif;
    }
    .card-title{
        padding: 10px 0 0 0;
        font-size: 20px;
    }
    .card-body{
        font-size: 17px;
        margin-top: 10px;
    }
    @media (max-width: 767px) {
        .card-body{
        font-size: 16px;
        }
    }
</style>
<div class="pagetitle">
    <h1>Employment Certificate</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
        <li class="breadcrumb-item">My Application Form</li>
        <li class="breadcrumb-item active">Apply for Employment Certificate</li>
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
                        <h5 class="card-title text-center">Request for Employment Certificate</h5>
                    </div>
                    <div class="card-body" >
                        <!-- Vertical Form -->
                        <form class="row g-3" id="" method="post" action="{{ route('storeEmploycertificate') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="col-12">
                                <label for="newValue" class="form-label">Purpose
                                    <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="bi bi-question-circle"></i>
                                    </button>
                                </label>
                                <input type="text" class="form-control" name="keperluan" id="newValue" required>
                            </div>

                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Pelajari Selengkapnya...</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h6 class="model-title"><p>Isikan keperluan untuk apa SKK ini di perlukan misalkan :</p>
                                            <p>"Untuk Keperluan administrasi bank"</p>
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
                                <button type="submit" class="btn btn-primary" id="submit-button">Submit</button>
                            </div>
                        </form><!-- Vertical Form -->


                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
</section>

@endsection
