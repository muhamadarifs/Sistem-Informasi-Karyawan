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
            /* transform: rotate(-29.566deg) scale(1, 1); */
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

        .employee_a {
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

        .fullname {
            color: #000000;
            text-align: left;
            font-family: "Nunito", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 70.46%;
            left: 16.4%;
            width: 43.14%;
            bottom: 84.19%;
            top: 14.03%;
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

        .position-name {
            color: #000000;
            text-align: left;
            font-family: "Nunito", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 55.03%;
            left: 16.4%;
            width: 43.14%;
            bottom: 82.18%;
            top: 16.04%;
            height: 1.78%;
        }

        .superior-name {
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

        .superior-name1 {
            color: #000000;
            text-align: left;
            font-family: "Nunito", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 55.03%;
            left: 16.4%;
            width: 43.14%;
            bottom: 80.18%;
            top: 18.04%;
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

        .department-fullname {
            color: #000000;
            text-align: left;
            font-family: "Nunito", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 40.51%;
            left: 16.4%;
            width: 43.14%;
            bottom: 78.17%;
            top: 20.04%;
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

        .identitas-kanan {
            position: absolute;
            inset: 0;
        }

        .position-code {
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

        .position-code2 {
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

        .employee-id {
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

        .employee-id2 {
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

        .position-code-direct {
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

        .position-code-direct2 {
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
            top: 225px;
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
            top: 26.07%;
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
            top: 26.07%;
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

        .unpaid-leave {
            width: 231px;
            height: 21px;
            position: static;
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
            top: 275px;
        }

        .ceklis {
            width: 19px;
            height: 19px;
            position: absolute;
            left: 13px;
            top: 271px;
            object-fit: cover;
        }

        .cuti-melahirkan {
            color: #000000;
            text-align: left;
            font-family: "Poppins-Regular", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 81.17%;
            left: 4.61%;
            width: 14.23%;
            bottom: 62.36%;
            top: 30.63%;
            height: 2%;
        }

        .maternity-leave {
            color: #000000;
            text-align: left;
            font-family: "Poppins-Italic", sans-serif;
            font-size: 12px;
            font-weight: 400;
            font-style: italic;
            position: absolute;
            right: 66.94%;
            left: 18.83%;
            width: 14.23%;
            bottom: 62.36%;
            top: 30.63%;
            height: 2%;
        }

        .number-leave-day {
            color: #000000;
            text-align: left;
            font-family: "Poppins-Regular", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 81.17%;
            left: 4.61%;
            width: 14.23%;
            bottom: 62.36%;
            top: 33.63%;
            height: 2%;
        }

        .d-day {
            color: #000000;
            text-align: left;
            font-family: "Poppins-Regular", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 81.17%;
            left: 20.61%;
            width: 8.23%;
            bottom: 62.36%;
            top: 33.63%;
            height: 2%;
        }

        .day {
            color: #000000;
            text-align: left;
            font-family: "Poppins-Regular", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 81.17%;
            left: 22.61%;
            width: 8.23%;
            bottom: 62.36%;
            top: 33.63%;
            height: 2%;
        }

        .start-date {
            color: #000000;
            text-align: left;
            font-family: "Poppins-Regular", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 81.17%;
            left: 4.61%;
            width: 14.23%;
            bottom: 62.36%;
            top: 35.63%;
            height: 2%;
        }

        .d-day2 {
            color: #000000;
            text-align: left;
            font-family: "Poppins-Regular", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 81.17%;
            left: 20.61%;
            width: 8.23%;
            bottom: 62.36%;
            top: 35.63%;
            height: 2%;
        }

        .day2 {
            color: #000000;
            text-align: left;
            font-family: "Poppins-Regular", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 81.17%;
            left: 22.61%;
            width: 15.23%;
            bottom: 62.36%;
            top: 35.63%;
            height: 2%;
        }

        .end-date {
            color: #000000;
            text-align: left;
            font-family: "Poppins-Regular", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 81.17%;
            left: 4.61%;
            width: 14.23%;
            bottom: 62.36%;
            top: 37.63%;
            height: 2%;
        }

        .d-day3 {
            color: #000000;
            text-align: left;
            font-family: "Poppins-Regular", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 81.17%;
            left: 20.61%;
            width: 8.23%;
            bottom: 62.36%;
            top: 37.63%;
            height: 2%;
        }

        .day3 {
            color: #000000;
            text-align: left;
            font-family: "Poppins-Regular", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 81.17%;
            left: 22.61%;
            width: 15.23%;
            bottom: 62.36%;
            top: 37.63%;
            height: 2%;
        }

        .date-back-office {
            color: #000000;
            text-align: left;
            font-family: "Poppins-Regular", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 81.17%;
            left: 4.61%;
            width: 14.23%;
            bottom: 62.36%;
            top: 39.63%;
            height: 2%;
        }

        .d-day4 {
            color: #000000;
            text-align: left;
            font-family: "Poppins-Regular", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 81.17%;
            left: 20.61%;
            width: 8.23%;
            bottom: 62.36%;
            top: 39.63%;
            height: 2%;
        }

        .day4 {
            color: #000000;
            text-align: left;
            font-family: "Poppins-Regular", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 81.17%;
            left: 22.61%;
            width: 15.23%;
            bottom: 62.36%;
            top: 39.63%;
            height: 2%;
        }

        .tujuan {
            color: #000000;
            text-align: left;
            font-family: "Poppins-Regular", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 81.17%;
            left: 4.61%;
            width: 14.23%;
            bottom: 62.36%;
            top: 41.63%;
            height: 2%;
        }

        .d-tujuan {
            color: #000000;
            text-align: left;
            font-family: "Poppins-Regular", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 81.17%;
            left: 20.61%;
            width: 8.23%;
            bottom: 62.36%;
            top: 41.63%;
            height: 2%;
        }

        .isitujuan {
            color: #000000;
            text-align: left;
            font-family: "Poppins-Regular", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 81.17%;
            left: 22.61%;
            width: 15.23%;
            bottom: 62.36%;
            top: 41.63%;
            height: 2%;
        }

        /*  */

        .datang-terlambat {
            width: 231px;
            height: 21px;
            position: static;
        }

        .rectangle-34 {
            background: #ffffff;
            border-style: solid;
            border-color: #000000;
            border-width: 1px;
            width: 15px;
            height: 15px;
            position: absolute;
            left: 374px;
            top: 275px;
        }

        .ceklis2 {
            width: 19px;
            height: 19px;
            position: absolute;
            left: 374px;
            top: 271px;
            object-fit: cover;
        }

        .datang-terlambat1 {
            color: #000000;
            text-align: left;
            font-family: "Poppins-Regular", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            /* right: 81.17%; */
            right: 11.25%;
            left: 53.52%;
            width: 25.23%;
            bottom: 62.36%;
            top: 30.63%;
            height: 2%;
        }

        .datang-terlambat2 {
            color: #000000;
            text-align: left;
            font-family: "Poppins-Italic", sans-serif;
            font-size: 12px;
            font-weight: 400;
            font-style: italic;
            position: absolute;
            right: 8.11%;
            left: 71.52%;
            width: 14.23%;
            bottom: 62.36%;
            top: 30.63%;
            height: 2%;
        }

        .ket {
            color: #000000;
            text-align: left;
            font-family: "Poppins-Regular", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 81.17%;
            left: 53.52%;
            width: 14.23%;
            bottom: 62.36%;
            top: 33.63%;
            height: 2%;
        }

        ._tik {
            color: #000000;
            text-align: left;
            font-family: "Poppins-Regular", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 81.17%;
            left: 69.61%;
            width: 8.23%;
            bottom: 62.36%;
            top: 33.53%;
            height: 2%;
        }

        .ket1 {
            color: #000000;
            text-align: left;
            font-family: "Poppins-Regular", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 14.20%;
            left: 71.52%;
            width: 30.23%;
            bottom: 62.36%;
            top: 33.63%;
            height: 2%;
        }

        .date {
            color: #000000;
            text-align: left;
            font-family: "Poppins-Regular", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 81.17%;
            left: 53.52%;
            width: 14.23%;
            bottom: 62.36%;
            top: 35.63%;
            height: 2%;
        }

        ._tik1 {
            color: #000000;
            text-align: left;
            font-family: "Poppins-Regular", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 81.17%;
            left: 69.61%;
            width: 8.23%;
            bottom: 62.36%;
            top: 35.53%;
            height: 2%;
        }

        .date1 {
            color: #000000;
            text-align: left;
            font-family: "Poppins-Regular", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 14.20%;
            left: 71.52%;
            width: 15.23%;
            bottom: 62.36%;
            top: 35.63%;
            height: 2%;
        }

        .time {
            color: #000000;
            text-align: left;
            font-family: "Poppins-Regular", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 50.17%;
            left: 53.52%;
            width: 14.23%;
            bottom: 62.36%;
            top: 37.63%;
            height: 2%;
        }

        ._tik3 {
            color: #000000;
            text-align: left;
            font-family: "Poppins-Regular", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 81.17%;
            left: 69.61%;
            width: 8.23%;
            bottom: 62.36%;
            top: 37.53%;
            height: 2%;
        }

        .time1 {
            color: #000000;
            text-align: left;
            font-family: "Poppins-Regular", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 14.20%;
            left: 71.52;
            width: 14.23%;
            bottom: 62.36%;
            top: 37.63%;
            height: 2%;
        }

        /*  */

        .pulang-cepat {
            width: 231px;
            height: 21px;
            position: static;
        }

        .rectangle-35 {
            background: #ffffff;
            border-style: solid;
            border-color: #000000;
            border-width: 1px;
            width: 15px;
            height: 15px;
            position: absolute;
            left: 374px;
            top: 400px;
        }

        .ceklis3 {
            width: 19px;
            height: 19px;
            position: absolute;
            left: 374px;
            top: 396px;
            object-fit: cover;
        }

        .pulang-cepat1 {
            color: #000000;
            text-align: left;
            font-family: "Poppins-Regular", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            /* right: 81.17%; */
            right: 11.25%;
            left: 53.52%;
            width: 25.23%;
            bottom: 62.36%;
            top: 44.43%;
            height: 2%;
        }

        .pulang-cepat2 {
            color: #000000;
            text-align: left;
            font-family: "Poppins-Italic", sans-serif;
            font-size: 12px;
            font-weight: 400;
            font-style: italic;
            position: absolute;
            right: 8.11%;
            left: 68.52%;
            width: 25.23%;
            bottom: 62.36%;
            top: 44.43%;
            height: 2%;
        }

        .ket-pulangcepat {
            color: #000000;
            text-align: left;
            font-family: "Poppins-Regular", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 81.17%;
            left: 53.52%;
            width: 14.23%;
            bottom: 62.36%;
            top: 47.63%;
            height: 2%;
        }

        ._1tik {
            color: #000000;
            text-align: left;
            font-family: "Poppins-Regular", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 81.17%;
            left: 69.61%;
            width: 8.23%;
            bottom: 62.36%;
            top: 47.53%;
            height: 2%;
        }

        .ket-pulangcepat1 {
            color: #000000;
            text-align: left;
            font-family: "Poppins-Regular", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 14.20%;
            left: 71.52%;
            width: 30.23%;
            bottom: 62.36%;
            top: 47.63%;
            height: 2%;
        }

        .date_pulangcepat {
            color: #000000;
            text-align: left;
            font-family: "Poppins-Regular", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 81.17%;
            left: 53.52%;
            width: 14.23%;
            bottom: 62.36%;
            top: 49.63%;
            height: 2%;
        }

        ._2tik {
            color: #000000;
            text-align: left;
            font-family: "Poppins-Regular", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 81.17%;
            left: 69.61%;
            width: 8.23%;
            bottom: 62.36%;
            top: 49.53%;
            height: 2%;
        }

        .date1_pulangcepat {
            color: #000000;
            text-align: left;
            font-family: "Poppins-Regular", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 14.20%;
            left: 71.52%;
            width: 15.23%;
            bottom: 62.36%;
            top: 49.63%;
            height: 2%;
        }

        .time_pulang {
            color: #000000;
            text-align: left;
            font-family: "Poppins-Regular", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 50.17%;
            left: 53.52%;
            width: 14.23%;
            bottom: 62.36%;
            top: 51.63%;
            height: 2%;
        }

        ._3tik {
            color: #000000;
            text-align: left;
            font-family: "Poppins-Regular", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 81.17%;
            left: 69.61%;
            width: 8.23%;
            bottom: 62.36%;
            top: 51.53%;
            height: 2%;
        }

        .time_pulang1 {
            color: #000000;
            text-align: left;
            font-family: "Poppins-Regular", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 14.20%;
            left: 71.52;
            width: 14.23%;
            bottom: 62.36%;
            top: 51.63%;
            height: 2%;
        }

        ._22 {
            width: 236px;
            height: 21px;
            position: static;
        }

        .rectangle-332 {
            background: #ffffff;
            border-style: solid;
            border-color: #000000;
            border-width: 1px;
            width: 15px;
            height: 15px;
            position: absolute;
            left: 13px;
            top: 349px;
        }

        /* .ceklis2 {
                width: 19px;
                height: 19px;
                position: absolute;
                left: 13px;
                top: 345px;
                object-fit: cover;
                } */
        .cuti-keguguran {
            color: #000000;
            text-align: left;
            font-family: "Poppins-Regular", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 81.17%;
            left: 4.61%;
            width: 14.23%;
            bottom: 59.24%;
            top: 38.75%;
            height: 2%;
        }

        .miscarriage-leave {
            color: #000000;
            text-align: left;
            font-family: "Poppins-Italic", sans-serif;
            font-size: 12px;
            font-weight: 400;
            font-style: italic;
            position: absolute;
            right: 66.26%;
            left: 18.83%;
            width: 14.91%;
            bottom: 59.24%;
            top: 38.75%;
            height: 2%;
        }

        ._3 {
            width: 331px;
            height: 41px;
            position: static;
        }

        .rectangle-333 {
            background: #ffffff;
            border-style: solid;
            border-color: #000000;
            border-width: 1px;
            width: 15px;
            height: 15px;
            position: absolute;
            left: 13px;
            top: 377px;
        }

        ._5 {
            width: 351px;
            height: 21px;
            position: static;
        }

        .rectangle-335 {
            background: #ffffff;
            border-style: solid;
            border-color: #000000;
            border-width: 1px;
            width: 15px;
            height: 15px;
            position: absolute;
            left: 13px;
            top: 453px;
        }

        .ceklis5 {
            width: 19px;
            height: 19px;
            position: absolute;
            left: 13px;
            top: 449px;
            object-fit: cover;
        }

        .pernikahan-anak-karyawan {
            color: #000000;
            text-align: left;
            font-family: "Poppins-Regular", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 71.68%;
            left: 4.61%;
            width: 23.71%;
            bottom: 47.66%;
            top: 50.33%;
            height: 2%;
        }

        .employee-child-wedding {
            color: #000000;
            text-align: left;
            font-family: "Poppins-Italic", sans-serif;
            font-size: 12px;
            font-weight: 400;
            font-style: italic;
            position: absolute;
            right: 50.68%;
            left: 28.32%;
            width: 21%;
            bottom: 47.66%;
            top: 50.33%;
            height: 2%;
        }

        ._6 {
            width: 326px;
            height: 41px;
            position: static;
        }

        .rectangle-336 {
            background: #ffffff;
            border-style: solid;
            border-color: #000000;
            border-width: 1px;
            width: 15px;
            height: 15px;
            position: absolute;
            left: 13px;
            top: 481px;
        }

        .ceklis6 {
            width: 19px;
            height: 19px;
            position: absolute;
            left: 13px;
            top: 477px;
            object-fit: cover;
        }

        .istri-karyawan-melahirkan-atau-keguguran {
            color: #000000;
            text-align: left;
            font-family: "Poppins-Regular", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 59.35%;
            left: 4.61%;
            width: 36.04%;
            bottom: 44.54%;
            top: 53.45%;
            height: 2%;
        }

        .employee-s-wife-delivery-baby-miscarriage-leave {
            color: #000000;
            text-align: left;
            font-family: "Poppins-Italic", sans-serif;
            font-size: 12px;
            font-weight: 400;
            font-style: italic;
            position: absolute;
            right: 54.07%;
            left: 4.61%;
            width: 41.33%;
            bottom: 42.32%;
            top: 55.68%;
            height: 2%;
        }

        ._7 {
            width: 281px;
            height: 41px;
            position: static;
        }

        .rectangle-337 {
            background: #ffffff;
            border-style: solid;
            border-color: #000000;
            border-width: 1px;
            width: 15px;
            height: 15px;
            position: absolute;
            left: 374px;
            top: 321px;
        }

        .ceklis7 {
            width: 19px;
            height: 19px;
            position: absolute;
            left: 374px;
            top: 317px;
            object-fit: cover;
        }

        .mengkhitankan-membaptiskan-anak {
            color: #000000;
            text-align: left;
            font-family: "Poppins-Regular", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 11.25%;
            left: 53.52%;
            width: 35.23%;
            bottom: 62.36%;
            top: 35.63%;
            height: 2%;
        }

        .circumcising-baptizing-the-child {
            color: #000000;
            text-align: left;
            font-family: "Poppins-Italic", sans-serif;
            font-size: 12px;
            font-weight: 400;
            font-style: italic;
            position: absolute;
            right: 19.11%;
            left: 53.52%;
            width: 27.37%;
            bottom: 60.13%;
            top: 37.86%;
            height: 2%;
        }

        ._8 {
            width: 351px;
            height: 69px;
            position: static;
        }

        .rectangle-338 {
            background: #ffffff;
            border-style: solid;
            border-color: #000000;
            border-width: 1px;
            width: 15px;
            height: 15px;
            position: absolute;
            left: 374px;
            top: 369px;
        }

        .ceklis8 {
            width: 19px;
            height: 19px;
            position: absolute;
            left: 374px;
            top: 365px;
            object-fit: cover;
        }

        .kematian-istri-suami-anak-menantu-orang-tua-mertua-saudara-kandung {
            color: #000000;
            text-align: left;
            font-family: "Poppins-Regular", sans-serif;
            font-size: 11px;
            font-weight: 400;
            position: absolute;
            right: 1.76%;
            left: 53.52%;
            width: 44.72%;
            bottom: 55.46%;
            top: 40.98%;
            height: 3.56%;
        }

        .death-of-wife-husband-son-daughter-in-law-parents-parents-in-law-siblings {
            color: #000000;
            text-align: left;
            font-family: "Poppins-Italic", sans-serif;
            font-size: 11px;
            font-weight: 400;
            font-style: italic;
            position: absolute;
            right: 1.76%;
            left: 53.52%;
            width: 44.72%;
            bottom: 51.67%;
            top: 44.77%;
            height: 3.56%;
        }

        ._9 {
            width: 326px;
            height: 41px;
            position: static;
        }

        .rectangle-339 {
            background: #ffffff;
            border-style: solid;
            border-color: #000000;
            border-width: 1px;
            width: 15px;
            height: 15px;
            position: absolute;
            left: 374px;
            top: 445px;
        }

        .ceklis9 {
            width: 19px;
            height: 19px;
            position: absolute;
            left: 374px;
            top: 441px;
            object-fit: cover;
        }

        .kematian-anggota-keluarga-dalam-satu-rumah {
            color: #000000;
            text-align: left;
            font-family: "Poppins-Regular", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 5.15%;
            left: 53.52%;
            width: 41.33%;
            bottom: 48.55%;
            top: 49.44%;
            height: 2%;
        }

        .death-of-a-family-member-in-the-same-household {
            color: #000000;
            text-align: left;
            font-family: "Poppins-Italic", sans-serif;
            font-size: 12px;
            font-weight: 400;
            font-style: italic;
            position: absolute;
            right: 5.15%;
            left: 53.52%;
            width: 41.33%;
            bottom: 46.33%;
            top: 51.67%;
            height: 2%;
        }

        ._10 {
            width: 326px;
            height: 21px;
            position: static;
        }

        .rectangle-3310 {
            background: #ffffff;
            border-style: solid;
            border-color: #000000;
            border-width: 1px;
            width: 15px;
            height: 15px;
            position: absolute;
            left: 374px;
            top: 493px;
        }

        .ceklis10 {
            width: 19px;
            height: 19px;
            position: absolute;
            left: 374px;
            top: 489px;
            object-fit: cover;
        }

        .dinas-training {
            color: #000000;
            text-align: left;
            font-family: "Poppins-Regular", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 32.93%;
            left: 53.52%;
            width: 13.55%;
            bottom: 43.21%;
            top: 54.79%;
            height: 2%;
        }

        .business-assignment-training {
            color: #000000;
            text-align: left;
            font-family: "Poppins-Italic", sans-serif;
            font-size: 12px;
            font-weight: 400;
            font-style: italic;
            position: absolute;
            right: 5.15%;
            left: 67.07%;
            width: 27.78%;
            bottom: 43.21%;
            top: 54.79%;
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
            top: 58.52%;
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
            top: 58.62%;
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
            top: 61.47%;
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
            width: 17.47%;
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
            font-size: 11px;
            font-weight: 400;
            position: absolute;
            right: 10.76%;
            left: 78.63%;
            width: 13.11%;
            bottom: 21.14%;
            top: 70.84%;
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

        .rectangle-greysign1 {
            background: #999999;
            margin-top: 30px;
            border-style: solid;
            border: none;
            border-width: 1px;
            width: 100%;
            height: 200%;
            /* position: absolute; */
            left: 0%;
            top: 87.99%;
            display: inline-block;
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

        .rectangle-343 {
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
            font-size: 12px;
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
            top: 95%;
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
                    @if ($leave->user->employee_id >= 200000)
                        <img class="dve-logo-1-1"
                            src="{{ 'data:image/png;base64,' . base64_encode(file_get_contents(public_path('storage/images/LOGO DVE NEW.png'))) }}" />
                    @else
                        <img class="fm-logo-1-1"
                            src="{{ 'data:image/png;base64,' . base64_encode(file_get_contents(public_path('storage/images/FM LOGO 1.png'))) }}" />
                    @endif
                    <div class="identitas-kiri">
                        <div class="employee_a">Name</div>
                        <div class="div">:</div>
                        <div class="fullname">{{ $leave->user->name }}</div>
                        <div class="position">Position</div>
                        <div class="div2">:</div>
                        <div class="position-name">{{ $leave->position_name }}</div>
                        <div class="superior-name">Direct Superior</div>
                        <div class="div3">:</div>
                        <div class="superior-name1">{{ $leave->superior_name }}</div>
                        <div class="department">Department</div>
                        <div class="div4">:</div>
                        <div class="department-fullname">{{ $leave->department }}</div>
                    </div>
                    <div class="identitas-kanan">
                        <div class="employee-id">Employee ID</div>
                        <div class="div9">:</div>
                        <div class="employee-id2">{{ $leave->user->employee_id }}</div>
                        <div class="position-code">Position Code</div>
                        <div class="div8">:</div>
                        <div class="position-code2">{{ $leave->position_code }}</div>
                        <div class="position-code-direct">Position Code</div>
                        <div class="div10">:</div>
                        <div class="position-code-direct2">{{ $leave->superior_code }}</div>
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
                        <div class="unpaid-leave">
                            <div class="rectangle-33"></div>
                            @if ($leave->permit == 'Unpaid Leave')
                                <img class="ceklis"
                                    src="{{ 'data:image/png;base64,' . base64_encode(file_get_contents(public_path('storage/images/Ceklis.png'))) }}" />
                            @endif
                            <div class="cuti-melahirkan">Cuti Tanpa Upah /</div>
                            <div class="maternity-leave">Unpaid Leave</div>
                            <div class="number-leave-day">Number Leave Day</div>
                            <div class="d-day">:</div>
                            <div class="day">{{ $leave->jumlah_hari }}</div>
                            <div class="start-date">Start Date</div>
                            <div class="d-day2">:</div>
                            <div class="day2">{{ $leave->from_date ? date('d-m-Y', strtotime($leave->from_date)) : '' }}</div>
                            <div class="end-date">End Date</div>
                            <div class="d-day3">:</div>
                            <div class="day3">{{ $leave->to_date ? date('d-m-Y', strtotime($leave->to_date)) : '' }}</div>
                            <div class="date-back-office">Date Back Office</div>
                            <div class="d-day4">:</div>
                            <div class="day4">{{ $leave->backoffice_date ? date('d-m-Y', strtotime($leave->backoffice_date)) : '' }}</div>
                            <div class="tujuan">Destination</div>
                            <div class="d-tujuan">:</div>
                            <div class="isitujuan">{{ $leave->tujuan }}</div>
                        </div>
                        <div class="datang-terlambat">
                            <div class="rectangle-34"></div>
                            @if ($leave->permit == 'Datang Terlambat')
                                <img class="ceklis2"
                                    src="{{ 'data:image/png;base64,' . base64_encode(file_get_contents(public_path('storage/images/Ceklis.png'))) }}" />
                            @endif
                            <div class="datang-terlambat1">Izin Datang Terlambat /</div>
                            <div class="datang-terlambat2">Late Arival Permit</div>
                            <div class="ket">Alasan / Reason</div>
                            <div class="_tik">:</div>
                            <div class="ket1">{{ $leave->ket_lambat }}</div>

                            <div class="date">Date</div>
                            <div class="_tik1">:</div>
                            <div class="date1">{{ $leave->tanggal_datang_lambat ? date('d-m-Y', strtotime($leave->tanggal_datang_lambat)) : '' }}</div>

                            <div class="time">Time</div>
                            <div class="_tik3">:</div>
                            @if ($leave->jam_datang_lambat)
                                <div class="time1">{{ date('H:i', strtotime($leave->jam_datang_lambat)) ?? '' }}</div>
                            @endif
                        </div>
                        <div class="pulang-cepat">
                            <div class="rectangle-35"></div>
                            @if ($leave->permit == 'Pulang Cepat')
                                <img class="ceklis3"
                                    src="{{ 'data:image/png;base64,' . base64_encode(file_get_contents(public_path('storage/images/Ceklis.png'))) }}" />
                            @endif
                            <div class="pulang-cepat1">Izin Pulang Cepat /</div>
                            <div class="pulang-cepat2">Permission to Leave Early</div>
                            <div class="ket-pulangcepat">Alasan / Reason</div>
                            <div class="_1tik">:</div>
                            <div class="ket-pulangcepat1">{{ $leave->ket_cepat }}</div>

                            <div class="date_pulangcepat">Date</div>
                            <div class="_2tik">:</div>
                            <div class="date1_pulangcepat">{{ $leave->tanggal_pulang_cepat ? date('d-m-Y', strtotime($leave->tanggal_pulang_cepat)) : '' }}</div>

                            <div class="time_pulang">Time</div>
                            <div class="_3tik">:</div>
                            @if ($leave->jam_pulang_cepat)
                                <div class="time_pulang1">{{ date('H:i', strtotime($leave->jam_pulang_cepat)) ?? '' }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="remarks">
                        <div class="rectangle-12"></div>
                        <div class="keterangan">Keterangan /</div>
                        <div class="remarks2">Remarks :</div>
                        <div class="remarks-isian">
                            {{ $leave->remarks }}
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
                        <div class="_081329189757">{{ $leave->telp }}</div>
                        <div class="line-22"></div>
                    </div>
                    <div class="batam">Batam,</div>
                    <div class="line-23"></div>
                    <div class="_29-september">
                        @if ($leave->approval_date_3)
                            {{ date('d F', strtotime($leave->approval_date_3)) }}
                        @endif
                    </div>
                    <div class="_2024">2024</div>
                    <div class="rectangle-sign-request"></div>
                    <div class="line-sign-request"></div>
                    <div class="line-sign-request2"></div>
                    <div class="request-by">Request by :</div>
                    <div class="request-sign">
                        @if ($leave && $leave->request_sign)
                            @php
                                $imageExtensions = ['jpg', 'jpeg', 'png'];
                                $extension = pathinfo($leave->request_sign, PATHINFO_EXTENSION);
                            @endphp

                            @if (in_array($extension, $imageExtensions))
                                <img class="image" src="{{ asset('storage/images/Sign/' . $leave->request_sign) }}"
                                    alt="Sign_image" style="width: 100px; height: auto; padding: 10px; margin: 0px; ">
                            @endif
                        @endif
                    </div>
                    <div class="employee-name">{{ $leave->user->name }}</div>

                    <div class="rectangle-sign-spv"></div>
                    <div class="line-sign-spv"></div>
                    <div class="line-sign-spv2"></div>
                    <div class="approved-by">Review by :</div>
                    <div class="approved2">
                        @if ($leave && $leave->approve1_sign)
                            @if ($leave->approve1_sign === 'Reject')
                                <p class="reject">Reject</p>
                            @elseif($leave->approve1_sign === $leave->request_sign)
                                <style>
                                    .rectangle-sign-spv {
                                        background: #B6B6B6;
                                    }
                                </style>
                            @else
                                @php
                                    $imageExtensions = ['jpg', 'jpeg', 'png'];
                                    $extension = pathinfo($leave->approve1_sign, PATHINFO_EXTENSION);
                                @endphp

                                @if (in_array($extension, $imageExtensions))
                                    <img class="image" src="{{ asset('storage/images/Sign/' . $leave->approve1_sign) }}"
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
                        @if ($leave && $leave->approve2_sign)
                            @if ($leave->approve2_sign === 'Reject')
                                <p class="reject">Reject</p>
                            @elseif($leave->approve2_sign === $leave->request_sign)
                                <style>
                                    .rectangle-sign-hod {
                                        background: #B6B6B6;
                                    }
                                </style>
                            @else
                                @php
                                    $imageExtensions = ['jpg', 'jpeg', 'png'];
                                    $extension = pathinfo($leave->approve2_sign, PATHINFO_EXTENSION);
                                @endphp

                                @if (in_array($extension, $imageExtensions))
                                    <img class="image" src="{{ asset('storage/images/Sign/' . $leave->approve2_sign) }}"
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
                        @if ($leave && $leave->approve_sign_3)
                            @if ($leave->approve_sign_3 === 'Reject')
                                <p class="reject">Reject</p>
                            @else
                                @php
                                    $imageExtensions = ['jpg', 'jpeg', 'png'];
                                    $extension = pathinfo($leave->approve_sign_3, PATHINFO_EXTENSION);
                                @endphp

                                @if (in_array($extension, $imageExtensions))
                                    <img class="image" src="{{ asset('storage/images/Sign/' . $leave->approve_sign_3) }}"
                                        alt="Sign_image" style="width: 100px; height: auto; padding: 10px; margin: 0px; ">
                                @endif
                            @endif
                        @endif
                    </div>
                    <div class="hrga">Asst. General Manager</div>
                    <div class="hrofficer-sign">
                        <div class="rectangle-343"></div>
                        <div class="line-30"></div>
                        <div class="line-31"></div>
                        <div class="review-by">Checked By :</div>
                        <div class="approve">
                            @if ($leave && $leave->review_sign)
                                @php
                                    $imageExtensions = ['jpg', 'jpeg', 'png'];
                                    $extension = pathinfo($leave->review_sign, PATHINFO_EXTENSION);
                                @endphp

                                @if (in_array($extension, $imageExtensions))
                                    <img class="image" src="{{ asset('storage/images/Sign/' . $leave->review_sign) }}"
                                        alt="Sign_image" style="width: 100px; height: auto; padding: 10px; margin: 0px; ">
                                @endif
                            @endif
                        </div>
                        <div class="hr-officer">HR Officer</div>
                    </div>
                </div>
            </div>

            <!-- Approve By Asst GM -->
            @if (Auth::user()->position->position_code == 'MGT5')
                @if ($leave->approve2_name === null)
                    <style>
                        .approval-section3 {
                            display: none;
                        }
                    </style>
                @endif
                @if (!$leave->approve3_name)
                    <style>
                        .approval-section {
                            display: none;
                        }
                    </style>
                    <div class="approval-section3">
                        <div class="row justify-content-center">
                            <div class="col-2">
                                <form action="{{ route('permit.rejectmgt5', $leave->id) }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Reject</button>
                                </form>
                            </div>
                            <div class="col-2">
                                <form action="{{ route('permit.approvemgt5', $leave->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Approve</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif
            @endif

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script></script>
@endsection
