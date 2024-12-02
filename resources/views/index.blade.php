@extends('layouts.index-header')

@section('content')
<style>
    .hispa-img {
        width: 675px;
        height: auto;
        margin-top: 150px;

    }
    .titlesection{
        color: #000000;
        text-align: center;
        font-family: "Nunito", sans-serif;
        font-size: 24px;
        font-weight: 400;
    }
    .card{
        border: none;
    }
    @media only screen and (max-width: 600px) {
        .hispa-img {
            width: 400px;
            height: auto;
            margin-top: 100px;
        }
        .titlesection{
            color: #000000;
            text-align: center;
            font-family: "Nunito", sans-serif;
            font-size: 14px;
            font-weight: 400;
            margin-top: 5px;
        }
    }
    @media only screen and (min-width: 601px) and (max-width: 1024px) {
        .hispa-img {
            width: 80%;
            height: auto;
            margin-top: 50px;
        }
        .titlesection {
            color: #000000;
            text-align: center;
            font-family: "Nunito", sans-serif;
            font-size: 18px;
            margin-top: 20px;
        }
    }
</style>
<div class="container">
    <div class="row ">
        <div class="card">
            <img class="hispa-img mx-auto " src="{{ asset('storage/images/HRISPA.png' ) }}" alt="">
            <p class="titlesection">Human Resources Information System and Personnel Admin</p>
        </div>
    </div>
</div>
@endsection
