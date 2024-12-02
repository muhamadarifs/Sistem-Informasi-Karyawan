@extends('layouts.export-temp')

@section('content2')
    <style>
        .card {
            text-align: center;
            width: 210mm;
            height: 297mm;
        }

        .reject {
            color: #FFDADA;
            font-family: "Nunito", sans-serif;
            font-size: 20px;
            margin-top: 30px;
            padding: 5px 10px;
            background-color: #FF5555;
            /* Atur warna latar belakang */
            display: inline-block;
        }

        .desktop-2,
        .desktop-2 * {
            box-sizing: border-box;
        }

        .desktop-2 {
            background: #ffffff;
            width: 738px;
            height: 1000px;
            position: relative;
            overflow: hidden;
        }

        .a-4-1 {
            background: #ffffff;
            width: 738px;
            height: 898px;
            position: absolute;
            left: 0px;
            top: 0px;
            overflow: hidden;
        }

        .rectangle-6 {
            background: #012970;
            position: absolute;
            right: 1.9%;
            left: 19.45%;
            width: 82%;
            bottom: 90.42%;
            top: 1.67%;
            height: 7.91%;
        }

        .judul-head {
            color: #ffffff;
            text-align: center;
            font-family: "Nunito", sans-serif;
            font-size: 36px;
            font-weight: 400;
            position: absolute;
            right: 1.9%;
            left: 19.45%;
            width: 82%;
            bottom: 90.42%;
            top: 2%;
            height: 7.91%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .fm-logo-1-1 {
            width: 100px;
            height: auto;
            position: absolute;
            left: 15px;
            top: 1px;
            object-fit: cover;
        }

        .dve-logo-1-1 {
            width: 130px;
            height: auto;
            position: absolute;
            left: 1px;
            top: 3px;
            object-fit: cover;
        }

        .identitas-kiri {
            position: absolute;
            inset: 0;
        }

        .employee-id {
            color: #000000;
            text-align: left;
            font-family: "Nunito", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 85.77%;
            left: 1.36%;
            width: 12.87%;
            bottom: 84.19%;
            top: 14.03%;
            height: 1.78%;
        }

        .div {
            color: #000000;
            text-align: left;
            font-family: "Nunito", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 84.96%;
            left: 14.77%;
            width: 0.27%;
            bottom: 84.19%;
            top: 14.03%;
            height: 1.78%;
        }

        ._600024 {
            color: #000000;
            text-align: left;
            font-family: "Nunito", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 70.46%;
            left: 16.4%;
            width: 16.14%;
            bottom: 84.19%;
            top: 14.03%;
            height: 1.78%;
        }

        .name {
            color: #000000;
            text-align: left;
            font-family: "Nunito", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 85.77%;
            left: 1.36%;
            width: 12.87%;
            bottom: 82.18%;
            top: 16.04%;
            height: 1.78%;
        }

        .div2 {
            color: #000000;
            text-align: left;
            font-family: "Nunito", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 84.96%;
            left: 14.77%;
            width: 0.27%;
            bottom: 82.18%;
            top: 16.04%;
            height: 1.78%;
        }

        .muhamad-arif-solikin {
            color: #000000;
            text-align: left;
            font-family: "Nunito", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 55.03%;
            left: 16.4%;
            width: 28.57%;
            bottom: 82.18%;
            top: 16.04%;
            height: 1.78%;
        }

        .department {
            color: #000000;
            text-align: left;
            font-family: "Nunito", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 85.77%;
            left: 1.36%;
            width: 12.87%;
            bottom: 80.18%;
            top: 18.04%;
            height: 1.78%;
        }

        .div3 {
            color: #000000;
            text-align: left;
            font-family: "Nunito", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 84.96%;
            left: 14.77%;
            width: 0.27%;
            bottom: 80.18%;
            top: 18.04%;
            height: 1.78%;
        }

        .production {
            color: #000000;
            text-align: left;
            font-family: "Nunito", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 55.03%;
            left: 16.4%;
            width: 60.57%;
            bottom: 80.18%;
            top: 18.04%;
            height: 1.78%;
        }

        .position {
            color: #000000;
            text-align: left;
            font-family: "Nunito", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 85.77%;
            left: 1.36%;
            width: 12.87%;
            bottom: 78.17%;
            top: 20.04%;
            height: 1.78%;
        }

        .div4 {
            color: #000000;
            text-align: left;
            font-family: "Nunito", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 84.96%;
            left: 14.77%;
            width: 0.27%;
            bottom: 78.17%;
            top: 20.04%;
            height: 1.78%;
        }

        .mechanical-oh-and-production-machine-supervisor {
            color: #000000;
            text-align: left;
            font-family: "Nunito", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 40.51%;
            left: 16.4%;
            width: 43.09%;
            bottom: 78.17%;
            top: 20.04%;
            height: 1.78%;
        }

        .direct-superior {
            color: #000000;
            text-align: left;
            font-family: "Nunito", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 85.77%;
            left: 1.36%;
            width: 12.87%;
            bottom: 74.17%;
            top: 24.05%;
            height: 1.78%;
        }

        .div5 {
            color: #000000;
            text-align: left;
            font-family: "Nunito", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 84.96%;
            left: 14.77%;
            width: 0.27%;
            bottom: 74.17%;
            top: 24.05%;
            height: 1.78%;
        }

        .production-manager {
            color: #000000;
            text-align: left;
            font-family: "Nunito", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 45.93%;
            left: 16.4%;
            width: 37.94%;
            bottom: 74.16%;
            top: 24.05%;
            height: 1.78%;
        }

        .position-code {
            color: #000000;
            text-align: left;
            font-family: "Nunito", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 85.77%;
            left: 1.36%;
            width: 12.87%;
            bottom: 76.17%;
            top: 22.05%;
            height: 1.78%;
        }

        .div6 {
            color: #000000;
            text-align: left;
            font-family: "Nunito", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 84.96%;
            left: 14.77%;
            width: 0.27%;
            bottom: 76.17%;
            top: 22.05%;
            height: 1.78%;
        }

        .pro-02 {
            color: #000000;
            text-align: left;
            font-family: "Nunito", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 76.88%;
            left: 16.4%;
            width: 6.72%;
            bottom: 76.17%;
            top: 22.05%;
            height: 1.78%;
        }

        .position-code2 {
            color: #000000;
            text-align: left;
            font-family: "Nunito", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 85.77%;
            left: 1.36%;
            width: 12.87%;
            bottom: 72.16%;
            top: 26.06%;
            height: 1.78%;
        }

        .div7 {
            color: #000000;
            text-align: left;
            font-family: "Nunito", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 84.96%;
            left: 14.77%;
            width: 0.27%;
            bottom: 72.16%;
            top: 26.06%;
            height: 1.78%;
        }

        .pro-01 {
            color: #000000;
            text-align: left;
            font-family: "Nunito", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 77.39%;
            left: 16.4%;
            width: 6.22%;
            bottom: 72.16%;
            top: 26.06%;
            height: 1.78%;
        }

        .identitas-kanan {
            position: absolute;
            inset: 0;
        }

        .from-date {
            color: #000000;
            text-align: left;
            font-family: "Nunito", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 18.83%;
            left: 62.2%;
            width: 18.97%;
            bottom: 82.18%;
            top: 16.04%;
            height: 1.78%;
        }

        .div8 {
            color: #000000;
            text-align: left;
            font-family: "Nunito", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 17.75%;
            left: 81.84%;
            width: 0.41%;
            bottom: 82.18%;
            top: 16.04%;
            height: 1.78%;
        }

        ._21-jan-2024 {
            color: #000000;
            text-align: right;
            font-family: "Nunito", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 1.49%;
            left: 82.93%;
            width: 15.58%;
            bottom: 82.18%;
            top: 16.04%;
            height: 1.78%;
        }

        .number-of-leave-days {
            color: #000000;
            text-align: left;
            font-family: "Nunito", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 18.83%;
            left: 62.2%;
            width: 18.97%;
            bottom: 84.19%;
            top: 14.03%;
            height: 1.78%;
        }

        .div9 {
            color: #000000;
            text-align: left;
            font-family: "Nunito", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 17.75%;
            left: 81.84%;
            width: 0.41%;
            bottom: 84.19%;
            top: 14.03%;
            height: 1.78%;
        }

        ._4 {
            color: #000000;
            text-align: right;
            font-family: "Nunito", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 1.49%;
            left: 82.93%;
            width: 15.58%;
            bottom: 84.19%;
            top: 14.03%;
            height: 1.78%;
        }

        .to-date {
            color: #000000;
            text-align: left;
            font-family: "Nunito", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 18.83%;
            left: 62.2%;
            width: 18.97%;
            bottom: 80.18%;
            top: 18.04%;
            height: 1.78%;
        }

        .div10 {
            color: #000000;
            text-align: left;
            font-family: "Nunito", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 17.75%;
            left: 81.84%;
            width: 0.41%;
            bottom: 80.18%;
            top: 18.04%;
            height: 1.78%;
        }

        ._24-jan-2024 {
            color: #000000;
            text-align: right;
            font-family: "Nunito", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 1.49%;
            left: 82.93%;
            width: 15.58%;
            bottom: 80.18%;
            top: 18.04%;
            height: 1.78%;
        }

        .back-office-date {
            color: #000000;
            text-align: left;
            font-family: "Nunito", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 18.83%;
            left: 62.2%;
            width: 18.97%;
            bottom: 78.17%;
            top: 20.04%;
            height: 1.78%;
        }

        .div11 {
            color: #000000;
            text-align: left;
            font-family: "Nunito", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 17.75%;
            left: 81.84%;
            width: 0.41%;
            bottom: 78.17%;
            top: 20.04%;
            height: 1.78%;
        }

        ._25-jan-2024 {
            color: #000000;
            text-align: right;
            font-family: "Nunito", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 1.49%;
            left: 82.93%;
            width: 15.58%;
            bottom: 78.17%;
            top: 20.04%;
            height: 1.78%;
        }

        .ketleave {
            position: absolute;
            inset: 0;
        }

        .rectangle-30 {
            background: #000000;
            width: 730px;
            height: 3px;
            position: absolute;
            left: 4px;
            top: 275px;
        }

        .pengajuan-izin {
            color: #000000;
            text-align: left;
            font-family: "Nunito", sans-serif;
            font-size: 14px;
            font-weight: 700;
            position: absolute;
            right: 83.06%;
            left: 0.95%;
            width: 15.99%;
            bottom: 65.37%;
            top: 32.63%;
            height: 2%;
        }

        .permit-submission {
            color: #000000;
            text-align: left;
            font-family: "-", sans-serif;
            font-size: 14px;
            font-weight: 400;
            position: absolute;
            right: 58.4%;
            left: 16.48%;
            width: 24.12%;
            bottom: 65.37%;
            top: 32.63%;
            height: 2%;
        }

        .permit-submission-span {
            color: #000000;
            font-family: "Poppins", sans-serif;
            font-size: 11px;
            font-weight: 400;
            font-style: italic;
        }

        .permit-submission-span2 {
            color: #000000;
            font-family: "Nunito", sans-serif;
            font-size: 14px;
            font-weight: 700;
        }

        .rectangle-33 {
            background: #ffffff;
            border-style: solid;
            border-color: #000000;
            border-width: 1px;
            width: 15px;
            height: 15px;
            position: absolute;
            left: 13px;
            top: 334px;
        }

        .ceklis {
            width: 19px;
            height: 19px;
            position: absolute;
            left: 13px;
            top: 330px;
            object-fit: cover;
        }

        .cuti-tahunan {
            color: #000000;
            text-align: left;
            font-family: "Nunito", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 83.06%;
            left: 5.61%;
            width: 12.33%;
            bottom: 60.91%;
            top: 37.38%;
            height: 2%;
        }

        .medical-leave {
            color: #000000;
            text-align: left;
            font-family: "Poppins", sans-serif;
            font-size: 11px;
            font-weight: 400;
            font-style: italic;
            position: absolute;
            right: 70.6%;
            left: 14.07%;
            width: 12.33%;
            bottom: 60.91%;
            top: 37.48%;
            height: 2%;
        }

        .remarks {
            position: absolute;
            inset: 0;
        }

        .rectangle-12 {
            background: #fffdfd;
            border-style: solid;
            border-color: #000000;
            border-width: 1px;
            position: absolute;
            right: 0.14%;
            left: 0.14%;
            width: 99.8%;
            bottom: 32.74%;
            top: 57.91%;
            height: 7.35%;
        }

        .keterangan {
            color: #000000;
            text-align: left;
            font-family: "Nunito", sans-serif;
            font-size: 12px;
            font-weight: 700;
            position: absolute;
            right: 88.62%;
            left: 1.14%;
            width: 11.25%;
            bottom: 39.98%;
            top: 57.92%;
            height: 2%;
        }

        .remarks2 {
            color: #000000;
            text-align: left;
            font-family: "Poppins", sans-serif;
            font-size: 11px;
            font-weight: 400;
            font-style: italic;
            position: absolute;
            right: 77.1%;
            left: 11.65%;
            width: 11.25%;
            bottom: 39.98%;
            top: 57.98%;
            height: 2%;
        }

        .remarks-isian {
            color: #000000;
            text-align: left;
            font-family: "Nunito", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 2.85%;
            left: 2.85%;
            width: 94.31%;
            bottom: 33.41%;
            top: 60.67%;
            height: 6.12%;
        }

        .telpn {
            position: absolute;
            inset: 0;
        }

        .nomor-hp-yang-bisa-dihubungi-hp-number-can-be-contacted {
            color: #000000;
            text-align: left;
            font-family: "-", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 40.38%;
            left: 1%;
            width: 59.62%;
            bottom: 29.4%;
            top: 66.55%;
            height: 2.23%;
        }

        .nomor-hp-yang-bisa-dihubungi-hp-number-can-be-contacted-span {
            color: #000000;
            font-family: "Nunito", sans-serif;
            font-size: 12px;
            font-weight: 400;
        }

        .nomor-hp-yang-bisa-dihubungi-hp-number-can-be-contacted-span2 {
            color: #000000;
            font-family: "Poppins", sans-serif;
            font-size: 11px;
            font-weight: 400;
            font-style: italic;
        }

        ._081329189757 {
            color: #000000;
            text-align: left;
            font-family: "Nunito", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 38.35%;
            left: 49.19%;
            width: 12.47%;
            bottom: 29.4%;
            top: 66.55%;
            height: 2.23%;
        }

        .line-22 {
            border-style: solid;
            border-color: #000000;
            border-width: 1px 0 0 0;
            position: absolute;
            right: 32.5%;
            left: 48.83%;
            width: 19.66%;
            bottom: 29.4%;
            top: 68.5%;
            height: 0%;
            transform-origin: 0 0;
            transform: rotate(0deg) scale(1, 1);
        }

        .batam {
            color: #000000;
            text-align: left;
            font-family: "Nunito", sans-serif;
            font-size: 12px;
            font-weight: 700;
            position: absolute;
            right: 24.37%;
            left: 72.57%;
            width: 7.06%;
            bottom: 21.14%;
            top: 70.84%;
            height: 2.02%;
        }

        .line-23 {
            border-style: solid;
            border-color: #000000;
            border-width: 1px 0 0 0;
            position: absolute;
            right: 9.08%;
            left: 78.13%;
            width: 12.1%;
            bottom: 21.14%;
            top: 72.36%;
            height: 0%;
            transform-origin: 0 0;
            transform: rotate(0deg) scale(1, 1);
        }

        ._29-september {
            color: #000000;
            text-align: left;
            font-family: "Nunito", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 10.76%;
            left: 78.63%;
            width: 13.11%;
            bottom: 21.14%;
            top: 70.6%;
            height: 2.02%;
        }

        ._2024 {
            color: #000000;
            text-align: left;
            font-family: "Nunito", sans-serif;
            font-size: 11px;
            font-weight: 700;
            position: absolute;
            right: 4.37%;
            left: 89.9%;
            width: 4.71%;
            bottom: 21.14%;
            top: 70.84%;
            height: 2.02%;
        }

        .rectangle-sign-request {
            background: #ffffff;
            border-style: solid;
            border-color: #000000;
            border-width: 1px;
            position: absolute;
            width: 25.05%;
            height: 12%;
            left: 0.14%;
            bottom: 1.89%;
            top: 74.74%;
        }

        .line-sign-request {
            border-style: solid;
            border-color: #000000;
            border-width: 1px 0 0 0;
            width: 184px;
            height: 0px;
            position: absolute;
            left: 0.14%;
            top: 77.56%;
            opacity: 0.3;
        }

        .line-sign-request2 {
            border-style: solid;
            border-color: #000000;
            border-width: 1px 0 0 0;
            width: 184px;
            height: 0px;
            position: absolute;
            left: 0.14%;
            top: 84.2%;
            opacity: 0.3;
        }

        .request-by {
            color: #000000;
            text-align: center;
            font-family: "Nunito", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 75.47%;
            left: 0.68%;
            width: 23.85%;
            bottom: 14.59%;
            top: 75.20%;
            height: 2%;
        }

        .request-sign {
            color: #000000;
            text-align: center;
            font-family: "Poppins-Regular", sans-serif;
            font-size: 11px;
            font-weight: 400;
            position: absolute;
            right: 75.47%;
            left: 0.68%;
            width: 23.85%;
            bottom: 15.46%;
            top: 75.20%;
            height: 2%;
        }

        .employee-name {
            color: #000000;
            text-align: center;
            font-family: "Nunito", sans-serif;
            font-size: 11px;
            font-weight: 400;
            position: absolute;
            right: 75.47%;
            left: 0.68%;
            width: 23.85%;
            bottom: 2.56%;
            top: 84.60%;
            height: 1.78%;
        }

        .rectangle-sign-spv {
            background: #ffffff;
            border-style: solid;
            border-color: #000000;
            border-width: 1px;
            position: absolute;
            width: 25.05%;
            height: 12%;
            left: 25.06%;
            bottom: 1.89%;
            top: 74.74%;
        }

        .line-sign-spv {
            border-style: solid;
            border-color: #000000;
            border-width: 1px 0 0 0;
            width: 184px;
            height: 0px;
            position: absolute;
            left: 25.06%;
            top: 77.56%;
            opacity: 0.3;
        }

        .line-sign-spv2 {
            border-style: solid;
            border-color: #000000;
            border-width: 1px 0 0 0;
            width: 184px;
            height: 0px;
            position: absolute;
            left: 25.06%;
            top: 84.2%;
            opacity: 0.3;
        }

        .approved-by {
            color: #000000;
            text-align: center;
            font-family: "Nunito", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 50.54%;
            left: 25.61%;
            width: 23.85%;
            bottom: 14.59%;
            top: 75.20%;
            height: 2%;
        }

        .approved2 {
            color: #000000;
            text-align: center;
            font-family: "Poppins-Regular", sans-serif;
            font-size: 11px;
            font-weight: 400;
            position: absolute;
            right: 50.54%;
            left: 25.61%;
            width: 23.85%;
            bottom: 15.46%;
            top: 75.20%;
            height: 2%;
        }

        .supervisor-name {
            color: #000000;
            text-align: center;
            font-family: "Nunito", sans-serif;
            font-size: 11px;
            font-weight: 400;
            position: absolute;
            right: 50.54%;
            left: 25.61%;
            width: 23.85%;
            bottom: 2.45%;
            top: 84.60%;
            height: 1.78%;
        }

        .rectangle-sign-hod {
            background: #ffffff;
            border-style: solid;
            border-color: #000000;
            border-width: 1px;
            position: absolute;
            width: 25.05%;
            height: 12%;
            left: 49.97%;
            bottom: 1.89%;
            top: 74.74%;
        }

        .line-sign-hod {
            border-style: solid;
            border-color: #000000;
            border-width: 1px 0 0 0;
            width: 184px;
            height: 0px;
            position: absolute;
            left: 49.97%;
            top: 77.56%;
            opacity: 0.3;
        }

        .line-sign-hod2 {
            border-style: solid;
            border-color: #000000;
            border-width: 1px 0 0 0;
            width: 184px;
            height: 0px;
            position: absolute;
            left: 49.97%;
            top: 84.2%;
            opacity: 0.3;
        }

        .approved-by2 {
            color: #000000;
            text-align: center;
            font-family: "Nunito", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 25.61%;
            left: 50.54%;
            width: 23.85%;
            bottom: 14.59%;
            top: 75.20%;
            height: 2%;
        }

        .approved3 {
            color: #000000;
            text-align: center;
            font-family: "Poppins-Regular", sans-serif;
            font-size: 11px;
            font-weight: 400;
            position: absolute;
            right: 25.61%;
            left: 50.54%;
            width: 23.85%;
            bottom: 15.46%;
            top: 75.20%;
            height: 2%;
        }

        .hod-manager-name {
            color: #000000;
            text-align: center;
            font-family: "Nunito", sans-serif;
            font-size: 11px;
            font-weight: 400;
            position: absolute;
            right: 25.61%;
            left: 50.54%;
            width: 23.85%;
            bottom: 2.56%;
            top: 84.60%;
            height: 1.78%;
        }

        .rectangle-sign-asstGM {
            background: #ffffff;
            border-style: solid;
            border-color: #000000;
            border-width: 1px;
            position: absolute;
            width: 25.05%;
            height: 12%;
            left: 74.89%;
            bottom: 1.89%;
            top: 74.74%;
        }

        .line-sign-asstGM {
            border-style: solid;
            border-color: #000000;
            border-width: 1px 0 0 0;
            width: 184px;
            height: 0px;
            position: absolute;
            left: 74.89%;
            top: 77.56%;
            opacity: 0.3;
        }

        .line-sign-asstGM2 {
            border-style: solid;
            border-color: #000000;
            border-width: 1px 0 0 0;
            width: 184px;
            height: 0px;
            position: absolute;
            left: 74.89%;
            top: 84.2%;
            opacity: 0.3;
        }

        .approvedhr1 {
            color: #000000;
            text-align: center;
            font-family: "Nunito", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 0.68%;
            left: 75.47%;
            width: 23.85%;
            bottom: 14.59%;
            top: 75.20%;
            height: 2%;
        }

        .approved4 {
            color: #000000;
            text-align: center;
            font-family: "Poppins-Regular", sans-serif;
            font-size: 11px;
            font-weight: 400;
            position: absolute;
            right: 0.68%;
            left: 75.47%;
            width: 23.85%;
            bottom: 15.46%;
            top: 75.20%;
            height: 2%;
        }

        .hrga {
            color: #000000;
            text-align: center;
            font-family: "Nunito", sans-serif;
            font-size: 11px;
            font-weight: 400;
            position: absolute;
            right: 19.38%;
            left: 75.25%;
            width: 23.85%;
            bottom: 2.56%;
            top: 84.60%;
            height: 1.78%;
        }

        .hrofficer-sign {
            position: absolute;
            inset: 0;
        }

        .rectangle-34 {
            background: #ffffff;
            border-style: solid;
            border-color: #000000;
            border-width: 1px;
            width: 25.05%;
            height: 12%;
            position: absolute;
            left: 37.66%;
            top: 87.99%;
        }

        .line-30 {
            border-style: solid;
            border-color: #000000;
            border-width: 1px 0 0 0;
            width: 184px;
            height: 0px;
            position: absolute;
            left: 278px;
            top: 97.50%;
            opacity: 0.3;
        }

        .line-31 {
            border-style: solid;
            border-color: #000000;
            border-width: 1px 0 0 0;
            width: 184px;
            height: 0px;
            position: absolute;
            left: 278px;
            top: 90.50%;
            opacity: 0.3;
        }

        .review-by {
            color: #000000;
            text-align: center;
            font-family: "Nunito", sans-serif;
            font-size: 11px;
            font-weight: 400;
            position: absolute;
            right: 38.08%;
            left: 38.08%;
            width: 23.85%;
            bottom: -2%;
            top: 88.35%;
            ;
            height: 2%;
        }

        .approve {
            color: #000000;
            text-align: center;
            font-family: "Nunito", sans-serif;
            font-size: 11px;
            font-weight: 400;
            position: absolute;
            right: 38.08%;
            left: 38.08%;
            width: 23.85%;
            bottom: -8.24%;
            top: 88.5%;
            height: 2%;
        }

        .hr-officer {
            color: #000000;
            text-align: center;
            font-family: "Nunito", sans-serif;
            font-size: 11px;
            font-weight: 400;
            position: absolute;
            right: 38.08%;
            left: 38.08%;
            width: 23.85%;
            bottom: -14.25%;
            top: 97.85%;
            height: 2%;
        }

        @page {
            margin: 25px;
        }
    </style>
    <div class="card mx-auto">
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="card-body">
            <div class="desktop-2">
                <div class="a-4-1">
                    <div class="rectangle-6"></div>
                    <div class="judul-head">APPLICATION OF PERMIT</div>
                    @if ($medical->user->employee_id >= 200000)
                        <img class="dve-logo-1-1"
                            src="{{ 'data:image/png;base64,' . base64_encode(file_get_contents(public_path('storage/images/LOGO DVE 2.png'))) }}" />
                    @else
                        <img class="fm-logo-1-1"
                            src="{{ 'data:image/png;base64,' . base64_encode(file_get_contents(public_path('storage/images/FM LOGO 1.png'))) }}" />
                    @endif
                    <div class="identitas-kiri">
                        <div class="employee-id">Employee ID</div>
                        <div class="div">:</div>
                        <div class="_600024">{{ $medical->user->employee_id }}</div>
                        <div class="name">Name</div>
                        <div class="div2">:</div>
                        <div class="muhamad-arif-solikin">{{ $medical->user->name }}</div>
                        <div class="department">Department</div>
                        <div class="div3">:</div>
                        <div class="production">{{ $medical->department }}</div>
                        <div class="position">Position</div>
                        <div class="div4">:</div>
                        <div class="mechanical-oh-and-production-machine-supervisor">{{ $medical->position_name }}</div>
                        <div class="position-code">Position Code</div>
                        <div class="div6">:</div>
                        <div class="pro-02">{{ $medical->position_code }}</div>
                        <div class="direct-superior">Direct Superior</div>
                        <div class="div5">:</div>
                        <div class="production-manager">{{ $medical->superior_name }}</div>
                        <div class="position-code2">Position Code</div>
                        <div class="div7">:</div>
                        <div class="pro-01">{{ $medical->superior_code }}</div>
                    </div>
                    <div class="identitas-kanan">
                        <div class="from-date">From Date</div>
                        <div class="div8">:</div>
                        <div class="_21-jan-2024">{{ \Carbon\Carbon::parse($medical->from_date)->format('d M Y') }}</div>
                        <div class="number-of-leave-days">Number of Leave Days</div>
                        <div class="div9">:</div>
                        <div class="_4">{{ $medical->jumlah_hari }}</div>
                        <div class="to-date">To Date</div>
                        <div class="div10">:</div>
                        <div class="_24-jan-2024">{{ \Carbon\Carbon::parse($medical->to_date)->format('d M Y') }}</div>
                        <div class="back-office-date">Back Office Date</div>
                        <div class="div11">:</div>
                        <div class="_25-jan-2024">{{ \Carbon\Carbon::parse($medical->backoffice_date)->format('d M Y') }}
                        </div>
                    </div>
                    <div class="ketleave">
                        <div class="rectangle-30"></div>
                        <div class="pengajuan-izin">Pengajuan Izin /</div>
                        <div class="permit-submission">
                            <span>
                                <span class="permit-submission-span">Permit Submission</span>
                                <span class="permit-submission-span2">:</span>
                            </span>
                        </div>
                        <div class="rectangle-33"></div>
                        <img class="ceklis"
                            src="{{ 'data:image/png;base64,' . base64_encode(file_get_contents(public_path('storage/images/Ceklis.png'))) }}" />
                        <div class="cuti-tahunan">Cuti Sakit /</div>
                        <div class="medical-leave">Medical Leave</div>
                    </div>
                    <div class="remarks">
                        <div class="rectangle-12"></div>
                        <div class="keterangan">Keterangan /</div>
                        <div class="remarks2">Remarks :</div>
                        <div class="remarks-isian">
                            {!! nl2br(e($medical->remarks)) !!}
                        </div>
                    </div>
                    <div class="telpn">
                        <div class="nomor-hp-yang-bisa-dihubungi-hp-number-can-be-contacted">
                            <span>
                                <span class="nomor-hp-yang-bisa-dihubungi-hp-number-can-be-contacted-span">Nomor HP yang
                                    bisa dihubungi /</span>
                                <span class="nomor-hp-yang-bisa-dihubungi-hp-number-can-be-contacted-span2">HP Number Can be
                                    Contacted :</span>
                            </span>
                        </div>
                        <div class="_081329189757">{{ $medical->telp }}</div>
                        <div class="line-22"></div>
                    </div>
                    <div class="batam">Batam,</div>
                    <div class="line-23"></div>
                    <div class="_29-september">
                        @if ($medical->review_date)
                            {{ date('d F', strtotime($medical->review_date)) }}
                        @endif
                    </div>
                    <div class="_2024">2024</div>
                    <div class="rectangle-sign-request"></div>
                    <div class="line-sign-request"></div>
                    <div class="line-sign-request2"></div>
                    <div class="request-by">Request by :</div>
                    <div class="request-sign">
                        @if ($medical && $medical->request_sign)
                            @php
                                $imageExtensions = ['jpg', 'jpeg', 'png'];
                                $extension = pathinfo($medical->request_sign, PATHINFO_EXTENSION);
                            @endphp

                            @if (in_array($extension, $imageExtensions))
                                <img class="image" src="{{ asset('storage/images/Sign/' . $medical->request_sign) }}"
                                    alt="Sign_image" style="width: 100px; height: auto; padding: 10px; margin: 0px; ">
                            @endif
                        @endif
                    </div>
                    <div class="employee-name">{{ $medical->user->name }}</div>

                    <div class="rectangle-sign-spv"></div>
                    <div class="line-sign-spv"></div>
                    <div class="line-sign-spv2"></div>
                    <div class="approved-by">Approved by :</div>
                    <div class="approved2">
                        @if ($medical && $medical->approve1_sign)
                            @if ($medical->approve1_sign === 'Reject')
                                <p class="reject">Reject</p>
                            @elseif($medical->approve1_sign === $medical->request_sign)
                                <style>
                                    .rectangle-sign-spv {
                                        background: #B6B6B6;
                                    }
                                </style>
                            @else
                                @php
                                    $imageExtensions = ['jpg', 'jpeg', 'png'];
                                    $extension = pathinfo($medical->approve1_sign, PATHINFO_EXTENSION);
                                @endphp

                                @if (in_array($extension, $imageExtensions))
                                    <img class="image" src="{{ asset('storage/images/Sign/' . $medical->approve1_sign) }}"
                                        alt="Sign_image" style="width: 100px; height: auto; padding: 10px; margin: 0px; ">
                                @endif
                            @endif
                        @endif
                    </div>
                    <div class="supervisor-name">Supervisor</div>

                    <div class="rectangle-sign-hod"></div>
                    <div class="line-sign-hod"></div>
                    <div class="line-sign-hod2"></div>
                    <div class="approved-by2">Approved by :</div>
                    <div class="approved3">
                        @if ($medical && $medical->approve2_sign)
                            @if ($medical->approve2_sign === 'Reject')
                                <p class="reject">Reject</p>
                            @elseif($medical->approve2_sign === $medical->request_sign)
                                <style>
                                    .rectangle-sign-hod {
                                        background: #B6B6B6;
                                    }
                                </style>
                            @else
                                @php
                                    $imageExtensions = ['jpg', 'jpeg', 'png'];
                                    $extension = pathinfo($medical->approve2_sign, PATHINFO_EXTENSION);
                                @endphp

                                @if (in_array($extension, $imageExtensions))
                                    <img class="image" src="{{ asset('storage/images/Sign/' . $medical->approve2_sign) }}"
                                        alt="Sign_image" style="width: 100px; height: auto; padding: 10px; margin: 0px; ">
                                @endif
                            @endif
                        @endif
                    </div>
                    <div class="hod-manager-name">HOD/Manager</div>

                    <div class="rectangle-sign-asstGM"></div>
                    <div class="line-sign-asstGM"></div>
                    <div class="line-sign-asstGM2"></div>
                    <div class="approvedhr1">Approved by :</div>
                    <div class="approved4">
                        @if ($medical && $medical->review_sign)
                            @if ($medical && $medical->review_sign)
                                @php
                                    $imageExtensions = ['jpg', 'jpeg', 'png'];
                                    $extension = pathinfo($medical->review_sign, PATHINFO_EXTENSION);
                                @endphp

                                @if (in_array($extension, $imageExtensions))
                                    <img class="image" src="{{ asset('storage/images/Sign/' . $medical->review_sign) }}"
                                        alt="Sign_image" style="width: 100px; height: auto; padding: 10px; margin: 0px; ">
                                @endif
                            @endif
                        @endif
                    </div>
                    <div class="hrga">HR Officer</div>
                </div>
            </div>

            <!-- Review HR -->
            @if (!$medical->review_sign)
                <div class="row justify-content-center">
                    <div class="col-2">
                        <form action="{{ route('medicalleave.check', $medical->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <button type="submit" class="btn btn-success">Accepted</button>
                        </form>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script></script>
@endsection
