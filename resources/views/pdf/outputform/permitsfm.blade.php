<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            @if(isset($title))
            HRIS Application | {{ $title }}
            @else
            HRIS Application | Feen Marine
            @endif
        </title>
        <style>
            .reject{
                color: #FFDADA;
                font-family: "Nunito", sans-serif;
                font-size: 20px;
                margin-top: 44px;
                /* transform: rotate(-29.566deg) scale(1, 1); */
                padding: 5px 10px;
                background-color: #FF5555; /* Atur warna latar belakang */
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
            left: 15.45%;
            width: 82.66%;
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
            left: 15.45%;
            width: 82.66%;
            bottom: 90.42%;
            top: 3.27%;
            height: 7.91%;
            display: flex;
            align-items: center;
            justify-content: center;
            }
            .fm-logo-1-1 {
            width: 100px;
            height: 100px;
            position: absolute;
            left: 1px;
            top: 1px;
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
            width: 16.14%;
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
            width: 60.57%;
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
            width: 60.57%;
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
            width: 43.09%;
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
            top: 33.53%;
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
            top: 35.53%;
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
            top: 37.53%;
            height: 2%;
            }
            .date-back-office{
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
            top: 39.53%;
            height: 2%;
            }

            .datang-terlambat {
            width: 231px;
            height: 21px;
            position: static;
            }
            .rectangle-44 {
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
            left: 71.52%;
            width: 7.23%;
            bottom: 62.36%;
            top: 37.63%;
            height: 2%;
            }

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
            left: 71.52%;
            width: 14.23%;
            bottom: 62.36%;
            top: 51.63%;
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
            width: 99.33%;
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
            top: 58.42%;
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
            top: 58.48%;
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
            left: 47.19%;
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
            left: 45.83%;
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
            left:  78.13%;
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
            .rectangle-29 {
            background: #ffffff;
            border-style: solid;
            border-color: #000000;
            border-width: 1px;
            position: absolute;
            right: 0.14%;
            left: 0.14%;
            width: 99.33%;
            bottom: 1.89%;
            top: 74.74%;
            height: 12%;
            }
            .line-25 {
            border-style: solid;
            border-color: rgba(0, 0, 0, 0.3);
            border-width: 1px 0 0 0;
            position: absolute;
            right: -100%;
            left: 99.75%;
            width: 99.50%;
            bottom: 5.01%;
            top: 84.2%;
            height: 0%;
            transform-origin: 0 0;
            transform: rotate(180deg) scale(1, 1);
            }
            .line-26 {
            border-style: solid;
            border-color: rgba(0, 0, 0, 0.3);
            border-width: 1px 0 0 0;
            position: absolute;
            right: -100%;
            left: 99.75%;
            width: 99.50%;
            bottom: 14.14%;
            top:77.46%;
            height: 0%;
            transform-origin: 0 0;
            transform: rotate(180deg) scale(1, 1);
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
            top:75.30%;
            height: 2%;
            }
            .request-sign{
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
                top: 74.3%;
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
            top: 84.80%;
            height: 1.78%;
            }
            .line-27 {
            border-style: solid;
            border-color: #000000;
            border-width: 1px 0 0 0;
            position: absolute;
            right: 55.96%;
            left: 25.07%;
            width: 14.70%;
            bottom: 17.37%;
            top: 74.73%;
            height: 0%;
            transform-origin: 0 0;
            transform: rotate(90deg) scale(1, 1);
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
            top: 75.30%;
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
            top: 74.3%;
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
            top: 84.80%;
            height: 1.78%;
            }
            .line-28 {
            border-style: solid;
            border-color: #000000;
            border-width: 1px 0 0 0;
            position: absolute;
            right: 31.03%;
            left: 50%;
            width: 14.70%;
            bottom: 17.37%;
            top: 74.73%;
            height: 0%;
            transform-origin: 0 0;
            transform: rotate(90deg) scale(1, 1);
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
            top: 75.30%;
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
            top: 74.3%;
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
            top: 84.80%;
            height: 1.78%;
            }
            .line-29 {
            border-style: solid;
            border-color: #000000;
            border-width: 1px 0 0 0;
            position: absolute;
            right: 6.23%;
            left: 74.93%;
            width: 14.70%;
            bottom: 17.26%;
            top: 74.73%;
            height: 0%;
            transform-origin: 0 0;
            transform: rotate(90deg) scale(1, 1);
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
            top: 75.30%;
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
            top: 74.3%;
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
            top: 84.80%;
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
        top: 87.59%;
    }
    .line-30 {
        border-style: solid;
        border-color:rgba(0, 0, 0, 0.3);
        border-width: 1px 0 0 0;
        width: 186px;
        height: 0px;
        position: absolute;
        left: 278px;
        top: 97%;
    }
    .line-31 {
        border-style: solid;
        border-color:rgba(0, 0, 0, 0.3);
        border-width: 1px 0 0 0;
        width: 186px;
        height: 0px;
        position: absolute;
        left: 278px;
        top: 90.3%;
    }
    .review-by {
        color: #000000;
        text-align: center;
        font-family: "Nunito", sans-serif;
        font-size: 12px;
        font-weight: 400;
        position: absolute;
        right: 38.08%;
        left: 38.20%;
        width: 23.85%;
        bottom: -2%;
        top: 88.10%;
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
        top: 86.85%;
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
        left: 38.20%;
        width: 23.85%;
        bottom: -14.25%;
        top: 97.65%;
        height: 2%;
    }

            @page {
                margin: 25px;
            }

        </style>
    </head>
    <body>
        <div class="desktop-2">
            <div class="a-4-1">
              <div class="rectangle-6"></div>
              <div class="judul-head">APPLICATION OF PERMIT</div>
              <img class="fm-logo-1-1" src="{{'data:image/png;base64,'.base64_encode(file_get_contents(public_path('storage/images/FM LOGO 1.png'))) }}" />
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
                        <img class="ceklis" src="{{'data:image/png;base64,'.base64_encode(file_get_contents(public_path('storage/images/Ceklis.png'))) }}" />
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
                </div>
                <div class="datang-terlambat">
                    <div class="rectangle-44"></div>
                    @if ($leave->permit == 'Datang Terlambat')
                        <img class="ceklis2" src="{{'data:image/png;base64,'.base64_encode(file_get_contents(public_path('storage/images/Ceklis.png'))) }}" />
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
                        <div class="time1">{{ date('H:i', strtotime($leave->jam_datang_lambat)) ?? ''}}</div>
                    @endif
                </div>
                <div class="pulang-cepat">
                    <div class="rectangle-35"></div>
                    @if ($leave->permit == 'Pulang Cepat')
                        <img class="ceklis3" src="{{'data:image/png;base64,'.base64_encode(file_get_contents(public_path('storage/images/Ceklis.png'))) }}" />
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
                        <div class="time_pulang1">{{ date('H:i', strtotime($leave->jam_pulang_cepat)) ?? ''}}</div>
                    @endif
                </div>
              </div>
              <div class="remarks">
                <div class="rectangle-12"></div>
                <div class="keterangan">Keterangan /</div>
                <div class="remarks2">Remarks :</div>
                <div class="remarks-isian">
                    {!! nl2br(e($leave->remarks)) !!}? date('d-m-Y', strtotime()) : ''
                </div>
              </div>
              <div class="telpn">
                <div class="nomor-hp-yang-bisa-dihubungi-hp-number-can-be-contacted">
                  <span>
                    <span class="nomor-hp-yang-bisa-dihubungi-hp-number-can-be-contacted-span">Nomor HP yang bisa dihubungi /</span>
                    <span class="nomor-hp-yang-bisa-dihubungi-hp-number-can-be-contacted-span2">HP Number Can be Contacted :</span>
                  </span>
                </div>
                <div class="_081329189757">{{ $leave->telp }}</div>
                <div class="line-22"></div>
              </div>
              <div class="batam">Batam,</div>
              <div class="line-23"></div>
              <div class="_29-september">
                @if($leave->review_date)
                    {{ date('d F', strtotime($leave->review_date)) }}
                @endif
              </div>
              <div class="_2024">2024</div>
              <div class="rectangle-29"></div>
              <div class="line-25"></div>
              <div class="line-26"></div>
              <div class="request-by">Request by :</div>
              <div class="request-sign">
                @if($leave && $leave->request_sign)
                    @php
                        $imageExtensions = ['jpg', 'jpeg', 'png'];
                        $extension = pathinfo($leave->request_sign, PATHINFO_EXTENSION);
                    @endphp

                    @if(in_array($extension, $imageExtensions))
                        <img class="image" src="{{ 'data:image/png;base64,' .base64_encode(file_get_contents(public_path('storage/images/Sign/' .$leave->request_sign))) }}" alt="Sign_image" style="width: 100px; height: auto; padding: 10px; margin: 0px; ">
                    @endif
                @endif
              </div>
              <div class="employee-name">{{ $leave->user->name }}</div>
              <div class="line-27"></div>
              <div class="approved-by">Approved by :</div>
              <div class="approved2">
                @if($leave && $leave->approve1_sign)
                    @if($leave->approve1_sign === 'Reject')
                        <p class="reject">Reject</p>
                    @else
                        @php
                            $imageExtensions = ['jpg', 'jpeg', 'png'];
                            $extension = pathinfo($leave->approve1_sign, PATHINFO_EXTENSION);
                        @endphp

                        @if(in_array($extension, $imageExtensions))
                            <img class="image" src="{{ 'data:image/png;base64,' .base64_encode(file_get_contents(public_path('storage/images/Sign/'.$leave->approve1_sign))) }}" alt="Sign_image" style="width: 100px; height: auto; padding: 10px; margin: 0px; ">
                        @endif
                    @endif
                @endif
              </div>
              <div class="supervisor-name">Supervisor</div>
              <div class="line-28"></div>
              <div class="approved-by2">Approved by :</div>
              <div class="approved3">
                @if($leave && $leave->approve2_sign)
                    @if($leave->approve2_sign === 'Reject')
                        <p class="reject">Reject</p>
                    @else
                        @php
                            $imageExtensions = ['jpg', 'jpeg', 'png'];
                            $extension = pathinfo($leave->approve2_sign, PATHINFO_EXTENSION);
                        @endphp

                        @if(in_array($extension, $imageExtensions))
                            <img class="image" src="{{ 'data:image/png;base64,' .base64_encode(file_get_contents(public_path('storage/images/Sign/'.$leave->approve2_sign))) }}" alt="Sign_image" style="width: 100px; height: auto; padding: 10px; margin: 0px; ">
                        @endif
                    @endif
                @endif
              </div>
              <div class="hod-manager-name">HOD/Manager</div>
              <div class="line-29"></div>
              <div class="approvedhr1">Approved By :</div>
              <div class="approved4">
                    {{-- @if($leave && $leave->review_sign)
                        @php
                            $imageExtensions = ['jpg', 'jpeg', 'png'];
                            $extension = pathinfo($leave->review_sign, PATHINFO_EXTENSION);
                        @endphp

                        @if(in_array($extension, $imageExtensions))
                            <img class="image" src="{{ 'data:image/png;base64,' .base64_encode(file_get_contents(public_path('storage/images/Sign/'.$leave->review_sign))) }}" alt="Sign_image" style="width: 100px; height: auto; padding: 10px; margin: 0px; ">
                        @endif
                    @endif --}}
                @if($leave && $leave->approve3_sign)
                    @if($leave->approve3_sign === 'Reject')
                        <p class="reject">Reject</p>
                    @else
                        @php
                            $imageExtensions = ['jpg', 'jpeg', 'png'];
                            $extension = pathinfo($leave->approve3_sign, PATHINFO_EXTENSION);
                        @endphp

                        @if(in_array($extension, $imageExtensions))
                            <img class="image" src="{{ 'data:image/png;base64,' .base64_encode(file_get_contents(public_path('storage/images/Sign/'.$leave->approve3_sign))) }}" alt="Sign_image" style="width: 100px; height: auto; padding: 10px; margin: 0px; ">
                        @endif
                    @endif
                @endif
              </div>
              <div class="hrga">Asst. General Manager-Operational</div>
              <div class="hrofficer-sign">
                <div class="rectangle-34"></div>
                <div class="line-30"></div>
                <div class="line-31"></div>
                <div class="review-by">Review By :</div>
                <div class="approve">
                    @if($leave && $leave->review_sign)
                        @php
                            $imageExtensions = ['jpg', 'jpeg', 'png'];
                            $extension = pathinfo($leave->review_sign, PATHINFO_EXTENSION);
                        @endphp

                        @if(in_array($extension, $imageExtensions))
                            <img class="image" src="{{ 'data:image/png;base64,' .base64_encode(file_get_contents(public_path('storage/images/Sign/'.$leave->review_sign))) }}" alt="Sign_image" style="width: 100px; height: auto; padding: 10px; margin: 0px; ">
                        @endif
                    @endif
                </div>
                <div class="hr-officer">HR Officer</div>
              </div>
            </div>
        </div>
    </body>
</html>
