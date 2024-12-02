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
                <ol type="1">
                    <li class="textlist">Click download button.</li>
                    <div class="image mt-3 mb-3">
                        <img class="custom-image" src="{{asset('img/helpdesk/Payslip/1.jpg')}}" alt="1">
                    </div>

                    <li class="textlist">In select period, select the payslip period you want to download.</li>
                    <div class="image mt-3 mb-3">
                        <img class="custom-image" src="{{asset('img/helpdesk/Payslip/2.jpg')}}" alt="2">
                    </div>
                    <div class="image mt-3 mb-3">
                        <img class="custom-image" src="{{asset('img/helpdesk/Payslip/3.jpg')}}" alt="3">
                    </div>

                    <li class="textlist">If so, click the download button</li>
                    <div class="image mt-3 mb-3">
                        <img class="custom-image" src="{{asset('img/helpdesk/Payslip/4.jpg')}}" alt="4">
                    </div>

                    <li class="textlist">Then a preview will appear as follows.</li>
                    <div class="image mt-3 mb-3">
                        <img class="custom-image" src="{{asset('img/helpdesk/Payslip/5.jpg')}}" alt="5">
                    </div>

                    <li class="textlist">If you want to download, users can click the download button at the top right, Then it will be downloaded in .pdf file format.</li>
                    <div class="image mt-3 mb-3">
                        <img class="custom-image" src="{{asset('img/helpdesk/Payslip/6.jpg')}}" alt="6">
                    </div>

                    <li class="textlist">Users can also print documents directly by clicking the print button at the top right.</li>
                    <div class="image mt-3 mb-3">
                        <img class="custom-image" src="{{asset('img/helpdesk/Payslip/7.jpg')}}" alt="7">
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
