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
                    <li class="textlist">Click Download Button.</li>
                    <div class="image mt-3 mb-3">
                        <img class="custom-image" src="{{asset('img/helpdesk/Attendance Report - Download/1.jpg')}}" alt="1">
                    </div>

                    <li class="textlist">Click Start Date.</li>
                    <div class="image mt-3 mb-3">
                        <img class="custom-image" src="{{asset('img/helpdesk/Attendance Report - Download/2.jpg')}}" alt="2">
                    </div>

                    <li class="textlist">Select the period you want to download data, There is no need to select the End Date because the system will adjust.</li>
                    <div class="image mt-3 mb-3">
                        <img class="custom-image" src="{{asset('img/helpdesk/Attendance Report - Download/3.jpg')}}" alt="3">
                    </div>

                    <li class="textlist">Click Download.</li>
                    <div class="image mt-3 mb-3">
                        <img class="custom-image" src="{{asset('img/helpdesk/Attendance Report - Download/4.jpg')}}" alt="4">
                    </div>

                    <li class="textlist">Then it will appear like this.</li>
                    <div class="image mt-3 mb-3">
                        <img class="custom-image" src="{{asset('img/helpdesk/Attendance Report - Download/5.jpg')}}" alt="5">
                    </div>

                    <li class="textlist">Click the icon on the sign as shown to download the file in .pdf format.</li>
                    <div class="image mt-3 mb-3">
                        <img class="custom-image" src="{{asset('img/helpdesk/Attendance Report - Download/6.jpg')}}" alt="6">
                    </div>

                    <li class="textlist">If you want to print the file directly, click the icon on the sign drawn to print the file.</li>
                    <div class="image mt-3 mb-3">
                        <img class="custom-image" src="{{asset('img/helpdesk/Attendance Report - Download/7.jpg')}}" alt="7">
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
