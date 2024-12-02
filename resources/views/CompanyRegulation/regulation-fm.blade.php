@extends('layouts.header-sidebar')

@section('content1')
<div class="pagetitle">
    <h1>Company Regulation</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
        <li class="breadcrumb-item">My Info</li>
        <li class="breadcrumb-item active">View Company Regulation</li>
      </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">
        <!-- Left side columns -->
      <div class="col-lg-12 mx-auto">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Company Regulation FM</h5>
                    </div>
                    <div class="card-body" >

                        @if(isset($latestFile))
                            <embed src="{{ route('viewCompanyRegFM') }}" type="application/pdf" width="100%" height="600px">
                        @endif

                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
</section>

@endsection
