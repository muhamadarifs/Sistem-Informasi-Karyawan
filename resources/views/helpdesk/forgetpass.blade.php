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
                    <li class="textlist">Click reset password on the login page.</li>
                    <div class="image mt-3 mb-3">
                        <img class="custom-image" src="{{asset('img/helpdesk/Forget Pass/1.jpg')}}" alt="1">
                    </div>

                    <li class="textlist">Enter email account.</li>
                    <div class="image mt-3 mb-3">
                        <img class="custom-image" src="{{asset('img/helpdesk/Forget Pass/2.jpg')}}" alt="2">
                    </div>

                    <li class="textlist">Click "Email Password Reset Link".</li>
                    <div class="image mt-3 mb-3">
                        <img class="custom-image" src="{{asset('img/helpdesk/Forget Pass/3.jpg')}}" alt="3">
                    </div>

                    <li class="textlist">If the following message appears, check your email.</li>
                    <div class="image mt-3 mb-3">
                        <img class="custom-image" src="{{asset('img/helpdesk/Forget Pass/4.jpg')}}" alt="4">
                    </div>

                    <li class="textlist">Open the message.</li>
                    <div class="image mt-3 mb-3">
                        <img class="custom-image" src="{{asset('img/helpdesk/Forget Pass/5.jpg')}}" alt="5">
                    </div>

                    <li class="textlist">Click "reset password".</li>
                    <div class="image mt-3 mb-3">
                        <img class="custom-image" src="{{asset('img/helpdesk/Forget Pass/6.jpg')}}" alt="6">
                    </div>

                    <li class="textlist">Enter a new password.</li>
                    <div class="image mt-3 mb-3">
                        <img class="custom-image" src="{{asset('img/helpdesk/Forget Pass/7.jpg')}}" alt="7">
                    </div>

                    <li class="textlist">Confirm new password.</li>
                    <div class="image mt-3 mb-3">
                        <img class="custom-image" src="{{asset('img/helpdesk/Forget Pass/8.jpg')}}" alt="8">
                    </div>

                    <li class="textlist">Click "Reset Password".</li>
                    <div class="image mt-3 mb-3">
                        <img class="custom-image" src="{{asset('img/helpdesk/Forget Pass/9.jpg')}}" alt="9">
                    </div>

                    <li class="textlist">Please log in using your email address and the new password you created.</li>
                    <div class="image mt-3 mb-3">
                        <img class="custom-image" src="{{asset('img/helpdesk/Forget Pass/10.jpg')}}" alt="10">
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
