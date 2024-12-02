@extends('layouts.helpdesk')

@section('contenthelp')
<style>
    h4{
        text-align: center;
        font-weight: 700;
    }
    .button{
        text-align: center;
        margin-bottom: 30px;
    }
    .head-text-body{
        margin-bottom: 0px;
    }
    .image{
        text-align: center;
    }
    .custom-image {
        width: 100%;
        max-width: 800px;
        height: auto;
        outline: 1px solid rgba(0, 0, 0, 0.3);
    }
</style>

<h4 class="title mt-20">
    @if(isset($headercontent))
        {{ $headercontent }}
    @else
        Welcome to HRISPA Helpdesk
    @endif
</h4>
<div class="content">
    <div class="card mt-5 mb-5">
        <div class="card-body">
            <p class="text-body">
                <p class="head-text-body"><Strong>Upload</Strong></p>
                <ol type="1">
                    <li class="textlist">Click My Profile.</li>
                    <div class="image mt-3 mb-3">
                        <img class="custom-image" src="{{asset('img/helpdesk/Upload BPJS Health Care/1.jpg')}}" alt="1">
                    </div>
                    <div class="image mt-3 mb-3">
                        <img class="custom-image" src="{{asset('img/helpdesk/Upload BPJS Health Care/2.jpg')}}" alt="2">
                    </div>

                    <li class="textlist">In the overview section, click upload on BPJS Health Care.</li>
                    <div class="image mt-3 mb-3">
                        <img class="custom-image" src="{{asset('img/helpdesk/Upload BPJS Health Care/3.jpg')}}" alt="3">
                    </div>

                    <li class="textlist">Enter the link where the BPJS Health softcopy is stored. (best saved in gdrive).</li>
                    <div class="image mt-3 mb-3">
                        <img class="custom-image" src="{{asset('img/helpdesk/Upload BPJS Health Care/4.jpg')}}" alt="4">
                    </div>

                    <li class="textlist">Click Submit to save.</li>
                    <div class="image mt-3 mb-3">
                        <img class="custom-image" src="{{asset('img/helpdesk/Upload BPJS Health Care/5.jpg')}}" alt="5">
                    </div>

                    <li class="textlist">Click "Here to open" to open and view the file.</li>
                    <div class="image mt-3 mb-3">
                        <img class="custom-image" src="{{asset('img/helpdesk/Upload BPJS Health Care/6.jpg')}}" alt="6">
                    </div>
                </ol>
                <p class="head-text-body"><Strong>Update</Strong></p>
                <ol type="1">
                    <li class="textlist">Click My Profile.</li>
                    <div class="image mt-3 mb-3">
                        <img class="custom-image" src="{{asset('img/helpdesk/Upload BPJS Health Care/1.jpg')}}" alt="1">
                    </div>
                    <div class="image mt-3 mb-3">
                        <img class="custom-image" src="{{asset('img/helpdesk/Upload BPJS Health Care/2.jpg')}}" alt="2">
                    </div>

                    <li class="textlist">In the overview section, click Update on BPJS Health Care.</li>
                    <div class="image mt-3 mb-3">
                        <img class="custom-image" src="{{asset('img/helpdesk/Upload BPJS Health Care/7.jpg')}}" alt="7">
                    </div>

                    <li class="textlist">Enter the link where the BPJS Health softcopy is stored. (best saved in gdrive).</li>
                    <div class="image mt-3 mb-3">
                        <img class="custom-image" src="{{asset('img/helpdesk/Upload BPJS Health Care/8.jpg')}}" alt="8">
                    </div>

                    <li class="textlist">Click Submit to save.</li>
                    <div class="image mt-3 mb-3">
                        <img class="custom-image" src="{{asset('img/helpdesk/Upload BPJS Health Care/9.jpg')}}" alt="9">
                    </div>
                </ol>
            </p>
        </div>
    </div>
    <div class="button">
        <a href="{{ route('helpdesk.index')}}" class="button-back btn btn-danger"><i class="bi bi-arrow-left-circle" style="margin-right: 5px;"></i>Back to Helpdesk Index</a>
    </div>
</div>
@endsection
