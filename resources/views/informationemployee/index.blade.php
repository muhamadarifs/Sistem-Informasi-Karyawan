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
</style>
<div class="pagetitle">
    <h1>{{$title2}}</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">{{$title2}}</li>
      </ol>
    </nav>
</div>
<div class="container text-center">
    <div class="row g-2">
        <div class="col">
            <div class="p-0">
                <div class="card text-center mb-3" style="width: 17rem;">
                    <div class="card-body">
                    <p class="card-text p-0 m-0"><i class="fa-regular fa-rectangle-list" style=" font-size: 4rem; opacity: 0.5; margin-top: 20px; margin-bottom: 20px;"></i></p>
                    <a href="{{ route('hod.attendance') }}" class="btn btncolor btn-secondary">Attendance Employee <i class="bi bi-arrow-right-circle"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="p-0">
                <div class="card text-center mb-3" style="width: 17rem;">
                    <div class="card-body">
                    <p class="card-text p-0 m-0"><i class="fa-regular fa-clipboard" style=" font-size: 4rem; opacity: 0.5; margin-top: 20px; margin-bottom: 20px;"></i></p>
                    <a href="{{ route('hod.leave')}}" class="btn btncolor btn-secondary">Leave Employee <i class="bi bi-arrow-right-circle"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="p-0">
                <div class="card text-center mb-3" style="width: 17rem;">
                    <div class="card-body">
                    <p class="card-text p-0 m-0"><i class="fa-solid fa-business-time" style=" font-size: 4rem; opacity: 0.5; margin-top: 20px; margin-bottom: 20px;"></i></p>
                    <a href="{{ route('hod.overtime') }}" class="btn btncolor btn-secondary">Over Time Employee <i class="bi bi-arrow-right-circle"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

