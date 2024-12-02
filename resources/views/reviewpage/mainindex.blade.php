@extends('layouts.header-sidebar')

@section('content1')
<style>
    .card{
        border-radius: 20px;
        border-color: #0DDEFF;
    }
    .btncolor{
      background-color: #36a4c0;
      border: none;
    }
    .btncolor:hover{
      background-color: #34bfdb;
    }
    .pheader-card{
        font-family: "Nunito", sans-serif;
        font-size: 24px;
        text-align: center;
        color: #B4B4B8;
    }
    @media (max-width: 767px) {
        .card{
        margin-left: auto;
        margin-right: auto;
        }
    }
</style>
<div class="pagetitle">
    <h1>Review Form</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
        <li class="breadcrumb-item">Review Form</li>
      </ol>
    </nav>
</div>
<div class="container text-center">
    <div class="row g-2">
        <div class="col">
            <div class="p-0">
                <div class="card text-center mb-3" style="width: 17rem;">
                    <div class="card-body">
                    <p class="card-text p-0 m-0"><i class="bi bi-clipboard2-fill" style=" font-size: 4rem; opacity: 0.5;"></i></p>
                    <a href="{{ route('review.annual') }}" class="btn btncolor btn-secondary">Annual Leave <i class="bi bi-arrow-right-circle"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="p-0">
                <div class="card text-center mb-3" style="width: 17rem;">
                    <div class="card-body">
                    <p class="card-text p-0 m-0"><i class="bi bi-clipboard2-pulse-fill" style=" font-size: 4rem; opacity: 0.5;"></i></p>
                    <a href="{{ route('review.medical')}}" class="btn btncolor btn-secondary">Medical Leave <i class="bi bi-arrow-right-circle"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="p-0">
                <div class="card text-center mb-3" style="width: 17rem;">
                    <div class="card-body">
                    <p class="card-text p-0 m-0"><i class="bi bi-clipboard2-fill" style=" font-size: 4rem; opacity: 0.5;"></i></p>
                    <a href="{{ route('review.special') }}" class="btn btncolor btn-secondary">Special Leave <i class="bi bi-arrow-right-circle"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="p-0">
                <div class="card text-center mb-3" style="width: 17rem;">
                    <div class="card-body">
                    <p class="card-text p-0 m-0"><i class="bi bi-clipboard2-fill" style=" font-size: 4rem; opacity: 0.5;"></i></p>
                    <a href="{{ route('review.permit') }}" class="btn btncolor btn-secondary">Permit <i class="bi bi-arrow-right-circle"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="p-0">
                <div class="card text-center mb-3" style="width: 17rem;">
                    <div class="card-body">
                    <p class="card-text p-0 m-0"><i class="bi bi-clipboard2-fill" style=" font-size: 4rem; opacity: 0.5;"></i></p>
                    <a href="{{ route('review.certificate') }}" class="btn btncolor btn-secondary">Employee Certificate <i class="bi bi-arrow-right-circle"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="p-0">
                <div class="card text-center mb-3" style="width: 17rem; opacity: 0.01;">
                    <div class="card-body">
                    {{-- <p class="card-text p-0 m-0"><i class="#" style=" font-size: 4rem; opacity: 0.5;"></i></p>
                    <a href="" class="btn btncolor btn-secondary"><i class="bi bi-arrow-right-circle"></i></a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

