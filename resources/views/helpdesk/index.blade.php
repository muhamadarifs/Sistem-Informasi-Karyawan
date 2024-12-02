@extends('layouts.helpdesk')

@section('contenthelp')
<style>
    .title{
        text-align: center;
        font-size: 50px;
        font-weight: 500;
        margin-bottom: 100px;
    }
    h4{
        margin-top: 60px;
    }
    .content{
        font-family: 'Nunito', sans-serif;
        margin-top: 10px;
    }
    .accordion-item{
        border: none;
    }
    a{
        text-decoration: none;
        color: #000000;
    }
    a:hover{
        background-color: #36a4c0;
        color: #ffffff;
        /* color: #36a4c0; */
    }
    .accordion-body{
        background-color: #f8f8f8;
    }
    li{
        margin-bottom: 5px;
    }
    .card-header{
        background-color: #d1ecfd;
    }
    .card-header h4 {
        margin-top: 0;
        margin-bottom: 0;
        text-align: center;
        font-weight: bold;
    }
    .text-body{
        text-align: center;
        font-size: 20px;
        margin-top: 20px;
    }
    .text-address{
        font-size: 16px;
    }
    .cardincard{
        text-decoration: none;
    }
    .card-contact{
        margin-top: 100px;
        margin-bottom: 50px;
    }
    .card-contact1{
        width: 80%;
        border
        : none;
        margin: 0 auto;
        float: none;
    }
    .card-email{
        text-decoration: none;
    }
    .button{
        text-align: center;
        margin-bottom: 30px;
    }
    @media (max-width: 767px) {
        .title{
            text-align: center;
            font-size: 20px;
            margin-bottom: 50px;
        }
        h4{
            margin-top: 20px;
        }
        .card-contact1{
            width: 100%;
            border: none;
        }
    }
</style>
    <h4 class="title">Welcome to HRISPA Helpdesk</h4>
    <div class="content">
        <div class="card">
            <div class="category-content">
                <div class="accordion" id="accordionPanelsStayOpenExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                <strong>Question About Profile</strong>
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                <ul>
                                    <li><a href="{{ route('helpdesk.changepass')}}" target="_blank">How to Change Password ?</a> </li>
                                    <li><a href="{{ route('helpdesk.forgetpass')}}">What If I Forget My Password ?</a> </li>
                                    <li><a href="{{ route('helpdesk.uploadsignature')}}">How to Upload a Signature ?</a> </li>
                                    <li><a href="{{ route('helpdesk.changeprofile')}}">How to Change Profile Photo ?</a> </li>
                                    <li><a href="{{ route('helpdesk.uploadktplink')}}">How to Upload Identity Card Link ?</a> </li>
                                    <li><a href="{{ route('helpdesk.uploadbpjslink')}}">How to Upload BPJS Health Care Link ?</a> </li>
                                    <li><a href="{{ route('helpdesk.uploadbpjsemployeelink')}}">How to Upload BPJS Employee Link ?</a> </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                <strong>Question About My Info</strong>
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                <ul>
                                    <li><a href="{{ route('helpdesk.downloadattend')}}">How to Download Attendance Report ?</a></li>
                                    <li><a href="{{ route('helpdesk.filterattend')}}">How to Filter Attendance Report ?</a></li>
                                    <li><a href="{{ route('helpdesk.viewdownloadpayslip')}}">How to View or Download Payslip ?</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                Accordion Item #3
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
        <div class="card card-contact">
            <div class="card-header">
                <h4 class="card-title">Contact us</h4>
            </div>
            <div class="card-body">
                <p class="text-body">If you have questions or problems, please contact us at :</p>
                <br>
                <div class="card card-contact1">
                    <div class="card-body card-email">
                        <div class="row">
                            <div class="col-3 col-md-2">
                                <p class="text-address">Email</p>
                            </div>
                            <div class="col-9 col-md-10">
                                <p class="text-address">: xyz.adm@gmail.com</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3 col-md-2">
                                <p class="text-address">Phone</p>
                            </div>
                            <div class="col-9 col-md-10">
                                <p class="text-address">: (0000) 1234567</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3 col-md-2">
                                <p class="text-address">Address</p>
                            </div>
                            <div class="col-9 col-md-10">
                                <p class="text-address">: Menara xyz, Office Tower, Xyz Area, Jalan Satu, Area Dua, London.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="button">
            <a href="{{ route('dashboard')}}" class="button-back btn btn-danger"><i class="bi bi-arrow-left-circle" style="margin-right: 5px;"></i>Back to Dashboard</a>
        </div>
    </div>
@endsection
