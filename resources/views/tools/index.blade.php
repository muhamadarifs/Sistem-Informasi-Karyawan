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
        <p class="pheader-card">Employee</p><hr>
        <div class="col">
            <div class="p-0">
                <div class="card text-center mb-3" style="width: 17rem;">
                    <div class="card-body">
                    <p class="card-text p-0 m-0"><i class="bi bi-people" style=" font-size: 4rem; opacity: 0.5;"></i></p>
                    <a href="{{ route('employee.index') }}" class="btn btncolor btn-secondary">Employee <i class="bi bi-arrow-right-circle"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="p-0">
                <div class="card text-center mb-3" style="width: 17rem;">
                    <div class="card-body">
                    <p class="card-text p-0 m-0"><i class="bi bi-journal-text" style=" font-size: 4rem; opacity: 0.5;"></i></p>
                    <a href="{{ route('index.absensi')}}" class="btn btncolor btn-secondary">Employee Attendance <i class="bi bi-arrow-right-circle"></i></a>
                    </div>
                </div>
            </div>
        </div>
        @if (Auth::user()->role == 'superadmin')
            <div class="col">
                <div class="p-0">
                    <div class="card text-center mb-3" style="width: 17rem;">
                        <div class="card-body">
                        <p class="card-text p-0 m-0"><i class="bi bi-wallet2" style=" font-size: 4rem; opacity: 0.5;"></i></p>
                        <a href="{{ route('payslip.index') }}" class="btn btncolor btn-secondary">Payslip <i class="bi bi-arrow-right-circle"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="col">
                <div class="p-0">
                    <div class="card text-center mb-3" style="width: 17rem;">
                        <div class="card-body">
                        <p class="card-text p-0 m-0"><i class="bi bi-briefcase" style=" font-size: 4rem; opacity: 0.5;"></i></p>
                        <a href="{{ route('job.index') }}" class="btn btncolor btn-secondary">Job Description <i class="bi bi-arrow-right-circle"></i></a>
                        </div>
                    </div>
                </div>
            </div> --}}
        @endif
        <div class="col">
            <div class="p-0">
                <div class="card text-center mb-3" style="width: 17rem;">
                    <div class="card-body">
                    <p class="card-text p-0 m-0"><i class="bi bi-journals" style=" font-size: 4rem; opacity: 0.5;"></i></p>
                    <a href="{{ route('cuti.index') }}" class="btn btncolor btn-secondary">Balance of Annual Leave <i class="bi bi-arrow-right-circle"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="p-0">
                <div class="card text-center mb-3" style="width: 17rem; opacity: 0.01;">
                    <div class="card-body">
                    <p class="card-text p-0 m-0"><i class="#" style=" font-size: 4rem; opacity: 0.5;"></i></p>
                    {{-- <a href="" class="btn btncolor btn-secondary"><i class="bi bi-arrow-right-circle"></i></a> --}}
                    </div>
                </div>
            </div>
        </div>

        <p class="pheader-card">Info and Announcement</p><hr>
        <div class="col">
            <div class="p-0">
                <div class="card text-center mb-3" style="width: 17rem; ">
                    <div class="card-body">
                    <p class="card-text p-0 m-0"><i class="bi bi-info-circle" style=" font-size: 4rem; opacity: 0.5;"></i></p>
                    <a href="{{ route('news')}}" class="btn btncolor btn-secondary">News & Info <i class="bi bi-arrow-right-circle"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="p-0">
                <div class="card text-center mb-3" style="width: 17rem; ">
                    <div class="card-body">
                    <p class="card-text p-0 m-0"><i class="bi bi-megaphone" style=" font-size: 4rem; opacity: 0.5;"></i></p>
                    <a href="{{ route('CA.index') }}" class="btn btncolor btn-secondary">Company Announcement <i class="bi bi-arrow-right-circle"></i></a>
                    </div>
                </div>
            </div>
        </div>
        @if (Auth::user()->role == "superadmin")
            <div class="col">
                <div class="p-0">
                    <div class="card text-center mb-3" style="width: 17rem;">
                        <div class="card-body">
                        <p class="card-text p-0 m-0"><i class="bi bi-buildings" style=" font-size: 4rem; opacity: 0.5;"></i></p>
                        <a href="{{ route('pp.index') }}" class="btn btncolor btn-secondary">Company Regulation <i class="bi bi-arrow-right-circle"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <div class="col">
            <div class="p-0">
                <div class="card text-center mb-3" style="width: 17rem; opacity: 0.01;">
                    <div class="card-body">
                    <p class="card-text p-0 m-0"><i class="#" style=" font-size: 4rem; opacity: 0.5;"></i></p>
                    {{-- <a href="" class="btn btncolor btn-secondary"><i class="bi bi-arrow-right-circle"></i></a> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="p-0">
                <div class="card text-center mb-3" style="width: 17rem; opacity: 0.01;">
                    <div class="card-body">
                    <p class="card-text p-0 m-0"><i class="#" style=" font-size: 4rem; opacity: 0.5;"></i></p>
                    {{-- <a href="" class="btn btncolor btn-secondary"><i class="bi bi-arrow-right-circle"></i></a> --}}
                    </div>
                </div>
            </div>
        </div>

        @if (Auth::user()->role == 'superadmin')
            <p class="pheader-card">Other</p><hr>
            <div class="col">
                <div class="p-0">
                    <div class="card text-center mb-3" style="width: 17rem;">
                        <div class="card-body">
                        <p class="card-text p-0 m-0"><i class="bi bi-clipboard2-data" style=" font-size: 4rem; opacity: 0.5;"></i></p>
                        <a href="{{ route('position.index') }}" class="btn btncolor btn-secondary">Position Data <i class="bi bi-arrow-right-circle"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="p-0">
                    <div class="card text-center mb-3" style="width: 17rem;">
                        <div class="card-body">
                        <p class="card-text p-0 m-0"><i class="bi bi-qr-code" style=" font-size: 4rem; opacity: 0.5;"></i></p>
                        <a href="{{ route('index.qr') }}" class="btn btncolor btn-secondary">QrCode Payslip <i class="bi bi-arrow-right-circle"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="p-0">
                    <div class="card text-center mb-3" style="width: 17rem;">
                        <div class="card-body">
                        <p class="card-text p-0 m-0"><i class="bi bi-person-vcard-fill" style=" font-size: 4rem; opacity: 0.5;"></i></p>
                    
                        <a href="{{ route('datachange.index') }}" class="btn btncolor btn-secondary">Request Data Change <i class="bi bi-arrow-right-circle"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @if (Auth::user()->level == 'Developer')
                <div class="col">
                    <div class="p-0">
                        <div class="card text-center mb-3" style="width: 17rem;">
                            <div class="card-body">
                            <p class="card-text p-0 m-0"><i class="bi bi-person-fill-check" style=" font-size: 4rem; opacity: 0.5;"></i></p>
                            <a href="{{ route('index.access') }}" class="btn btncolor btn-secondary">Access Permission (Beta Test) <i class="bi bi-arrow-right-circle"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="col">
                    <div class="p-0">
                        <div class="card text-center mb-3" style="width: 17rem; opacity: 0.01;">
                            <div class="card-body">
                            <p class="card-text p-0 m-0"><i class="#" style=" font-size: 4rem; opacity: 0.5;"></i></p>
                            {{-- <a href="" class="btn btncolor btn-secondary"><i class="bi bi-arrow-right-circle"></i></a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="col">
                <div class="p-0">
                    <div class="card text-center mb-3" style="width: 17rem; opacity: 0.01;">
                        <div class="card-body">
                        <p class="card-text p-0 m-0"><i class="#" style=" font-size: 4rem; opacity: 0.5;"></i></p>
                        {{-- <a href="" class="btn btncolor btn-secondary"><i class="bi bi-arrow-right-circle"></i></a> --}}
                        </div>
                    </div>
                </div>
            </div> 
        @endif
    </div>
</div>


@endsection

