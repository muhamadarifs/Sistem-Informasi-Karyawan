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

        .empl-id {
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

        .fullname {
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

        .dep-name {
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

        .pos-name {
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

        .sup-name {
            color: #000000;
            text-align: left;
            font-family: "Nunito", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 45.93%;
            left: 16.4%;
            width: 43.14%;
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

        .pos-code {
            color: #000000;
            text-align: left;
            font-family: "Nunito", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 76.88%;
            left: 16.4%;
            width: 43.14%;
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

        .sup-code {
            color: #000000;
            text-align: left;
            font-family: "Nunito", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 77.39%;
            left: 16.4%;
            width: 43.14%;
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
            top: 32.07%;
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
            top: 32.07%;
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

        /* .rectangle-33 {
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
                } */
        ._1 {
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
            top: 321px;
        }

        .ceklis {
            width: 19px;
            height: 19px;
            position: absolute;
            left: 13px;
            top: 317px;
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
            top: 35.63%;
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
            top: 35.63%;
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

        .ceklis2 {
            width: 19px;
            height: 19px;
            position: absolute;
            left: 13px;
            top: 345px;
            object-fit: cover;
        }

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

        .ceklis3 {
            width: 19px;
            height: 19px;
            position: absolute;
            left: 13px;
            top: 373px;
            object-fit: cover;
        }

        .anggota-keluarga-pekerja-dirawat-di-rumah-sakit {
            color: #000000;
            text-align: left;
            font-family: "Poppins-Regular", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 53.39%;
            left: 4.61%;
            width: 42.01%;
            bottom: 56.12%;
            top: 41.87%;
            height: 2%;
        }

        .worker-s-family-members-admitted-in-hospital {
            color: #000000;
            text-align: left;
            font-family: "Poppins-Italic", sans-serif;
            font-size: 12px;
            font-weight: 400;
            font-style: italic;
            position: absolute;
            right: 54.74%;
            left: 4.61%;
            width: 40.65%;
            bottom: 53.9%;
            top: 44.1%;
            height: 2%;
        }

        ._42 {
            width: 287px;
            height: 21px;
            position: static;
        }

        .rectangle-334 {
            background: #ffffff;
            border-style: solid;
            border-color: #000000;
            border-width: 1px;
            width: 15px;
            height: 15px;
            position: absolute;
            left: 13px;
            top: 425px;
        }

        .ceklis4 {
            width: 19px;
            height: 19px;
            position: absolute;
            left: 13px;
            top: 421px;
            object-fit: cover;
        }

        .pernikahan-karyawan {
            color: #000000;
            text-align: left;
            font-family: "Poppins-Regular", sans-serif;
            font-size: 12px;
            font-weight: 400;
            position: absolute;
            right: 76.42%;
            left: 4.61%;
            width: 18.97%;
            bottom: 50.78%;
            top: 47.22%;
            height: 2%;
        }

        .employee-wedding {
            color: #000000;
            text-align: left;
            font-family: "Poppins-Italic", sans-serif;
            font-size: 12px;
            font-weight: 400;
            font-style: italic;
            position: absolute;
            right: 59.35%;
            left: 23.71%;
            width: 16.94%;
            bottom: 50.78%;
            top: 47.22%;
            height: 2%;
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
                    {{-- <img class="fm-logo-1-1" src="{{'data:image/png;base64,'.base64_encode(file_get_contents(public_path('storage/images/FM LOGO 1.png'))) }}" /> --}}
                    <div class="identitas-kiri">
                        <div class="employee-id">Employee ID</div>
                        <div class="div">:</div>
                        <div class="empl-id">{{ $leave->user->employee_id }}</div>
                        <div class="name">Name</div>
                        <div class="div2">:</div>
                        <div class="fullname">{{ $leave->user->name }}</div>
                        <div class="department">Department</div>
                        <div class="div3">:</div>
                        <div class="dep-name">{{ $leave->department }}</div>
                        <div class="position">Position</div>
                        <div class="div4">:</div>
                        <div class="pos-name">{{ $leave->position_name }}</div>
                        <div class="position-code">Position Code</div>
                        <div class="div6">:</div>
                        <div class="pos-code">{{ $leave->position_code }}</div>
                        <div class="direct-superior">Direct Superior</div>
                        <div class="div5">:</div>
                        <div class="sup-name">{{ $leave->superior_name }}</div>
                        <div class="position-code2">Position Code</div>
                        <div class="div7">:</div>
                        <div class="sup-code">{{ $leave->superior_code }}</div>
                    </div>
                    <div class="identitas-kanan">
                        <div class="from-date">From Date</div>
                        <div class="div8">:</div>
                        <div class="_21-jan-2024">{{ \Carbon\Carbon::parse($leave->from_date)->format('d M Y') }}</div>
                        <div class="number-of-leave-days">Number of Leave Days</div>
                        <div class="div9">:</div>
                        <div class="_4">{{ $leave->jumlah_hari }}</div>
                        <div class="to-date">To Date</div>
                        <div class="div10">:</div>
                        <div class="_24-jan-2024">{{ \Carbon\Carbon::parse($leave->to_date)->format('d M Y') }}</div>
                        <div class="back-office-date">Back Office Date</div>
                        <div class="div11">:</div>
                        <div class="_25-jan-2024">{{ \Carbon\Carbon::parse($leave->backoffice_date)->format('d M Y') }}
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
                        <div class="_1">
                            <div class="rectangle-33"></div>
                            @if ($leave->cuti == 'Cuti Melahirkan')
                                <img class="ceklis"
                                    src="{{ 'data:image/png;base64,' . base64_encode(file_get_contents(public_path('storage/images/Ceklis.png'))) }}" />
                            @endif
                            <div class="cuti-melahirkan">Cuti Melahirkan /</div>
                            <div class="maternity-leave">Maternity Leave</div>
                        </div>
                        <div class="_22">
                            <div class="rectangle-332"></div>
                            @if ($leave->cuti == 'Cuti Keguguran')
                                <img class="ceklis2"
                                    src="{{ 'data:image/png;base64,' . base64_encode(file_get_contents(public_path('storage/images/Ceklis.png'))) }}" />
                            @endif
                            <div class="cuti-keguguran">Cuti Keguguran /</div>
                            <div class="miscarriage-leave">Miscarriage Leave</div>
                        </div>
                        <div class="_3">
                            <div class="rectangle-333"></div>
                            @if ($leave->cuti == 'Anggota Keluarga Pekerja dirawat di Rumah Sakit')
                                <img class="ceklis3"
                                    src="{{ 'data:image/png;base64,' . base64_encode(file_get_contents(public_path('storage/images/Ceklis.png'))) }}" />
                            @endif
                            <div class="anggota-keluarga-pekerja-dirawat-di-rumah-sakit">
                                Anggota Keluarga Pekerja dirawat di Rumah Sakit /
                            </div>
                            <div class="worker-s-family-members-admitted-in-hospital">
                                Worker&#039;s Family Members admitted in Hospital
                            </div>
                        </div>
                        <div class="_42">
                            <div class="rectangle-334"></div>
                            @if ($leave->cuti == 'Pernikahan Karyawan')
                                <img class="ceklis4"
                                    src="{{ 'data:image/png;base64,' . base64_encode(file_get_contents(public_path('storage/images/Ceklis.png'))) }}" />
                            @endif
                            <div class="pernikahan-karyawan">Pernikahan Karyawan /</div>
                            <div class="employee-wedding">Employee Wedding</div>
                        </div>
                        <div class="_5">
                            <div class="rectangle-335"></div>
                            @if ($leave->cuti == 'Pernikahan anak karyawan')
                                <img class="ceklis5"
                                    src="{{ 'data:image/png;base64,' . base64_encode(file_get_contents(public_path('storage/images/Ceklis.png'))) }}" />
                            @endif
                            <div class="pernikahan-anak-karyawan">Pernikahan Anak Karyawan /</div>
                            <div class="employee-child-wedding">Employee Child Wedding</div>
                        </div>
                        <div class="_6">
                            <div class="rectangle-336"></div>
                            @if ($leave->cuti == 'Istri Karyawan Melahirkan, Keguguran')
                                <img class="ceklis6"
                                    src="{{ 'data:image/png;base64,' . base64_encode(file_get_contents(public_path('storage/images/Ceklis.png'))) }}" />
                            @endif
                            <div class="istri-karyawan-melahirkan-atau-keguguran">
                                Istri Karyawan Melahirkan atau Keguguran -
                            </div>
                            <div class="employee-s-wife-delivery-baby-miscarriage-leave">
                                Employee’s Wife Delivery Baby/Miscarriage Leave
                            </div>
                        </div>
                        <div class="_7">
                            <div class="rectangle-337"></div>
                            @if ($leave->cuti == 'Mengkhitankan atau Membaptiskan Anak')
                                <img class="ceklis7"
                                    src="{{ 'data:image/png;base64,' . base64_encode(file_get_contents(public_path('storage/images/Ceklis.png'))) }}" />
                            @endif
                            <div class="mengkhitankan-membaptiskan-anak">
                                Mengkhitankan/Membaptiskan Anak -
                            </div>
                            <div class="circumcising-baptizing-the-child">
                                Circumcising/Baptizing the Child
                            </div>
                        </div>
                        <div class="_8">
                            <div class="rectangle-338"></div>
                            @if ($leave->cuti == 'Kematian (Istri,Suami,Anak,Menantu,Orang Tua,Mertua,Saudara Kandung)')
                                <img class="ceklis8"
                                    src="{{ 'data:image/png;base64,' . base64_encode(file_get_contents(public_path('storage/images/Ceklis.png'))) }}" />
                            @endif
                            <div class="kematian-istri-suami-anak-menantu-orang-tua-mertua-saudara-kandung">
                                Kematian Istri/Suami/Anak/Menantu/Orang Tua/Mertua/Saudara Kandung -
                            </div>
                            <div class="death-of-wife-husband-son-daughter-in-law-parents-parents-in-law-siblings">
                                Death of
                                wife/husband/son/daughter-in-law/parents/parents-in-law/siblings
                            </div>
                        </div>
                        <div class="_9">
                            <div class="rectangle-339"></div>
                            @if ($leave->cuti == 'Kematian anggota keluarga dalam satu rumah')
                                <img class="ceklis9"
                                    src="{{ 'data:image/png;base64,' . base64_encode(file_get_contents(public_path('storage/images/Ceklis.png'))) }}" />
                            @endif
                            <div class="kematian-anggota-keluarga-dalam-satu-rumah">
                                Kematian Anggota Keluarga dalam Satu Rumah /
                            </div>
                            <div class="death-of-a-family-member-in-the-same-household">
                                Death of a Family Member in the Same Household
                            </div>
                        </div>
                        <div class="_10">
                            <div class="rectangle-3310"></div>
                            @if ($leave->cuti == 'Dinas,Training')
                                <img class="ceklis10"
                                    src="{{ 'data:image/png;base64,' . base64_encode(file_get_contents(public_path('storage/images/Ceklis.png'))) }}" />
                            @endif
                            <div class="dinas-training">Dinas/Training -</div>
                            <div class="business-assignment-training">
                                Business Assignment/Training
                            </div>
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
                                <span class="nomor-hp-yang-bisa-dihubungi-hp-number-can-be-contacted-span2">HP Number Can
                                    be Contacted :</span>
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
                    <div class="approvedhr1">Checked by :</div>
                    <div class="approved4">
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
                    <div class="hrga">HR Officer</div>
                </div>
            </div>
            <!-- Approve By Supervisor -->
            @if (
                ($leave->position_code === 'ITD1' && $leave->superior_code === 'MGT2') ||
                    ($leave->position_code === 'ITD2' && $leave->superior_code === 'ITD1') ||
                    ($leave->position_code === 'ITD3' && $leave->superior_code === 'ITD1') ||
                    ($leave->position_code === 'ITD4' && $leave->superior_code === 'ITD1') ||
                    ($leave->position_code === 'HRGA1' && $leave->superior_code === 'MGT5') ||
                    ($leave->position_code === 'HRGA2' && $leave->superior_code === 'HRGA1') ||
                    ($leave->position_code === 'HRGA3' && $leave->superior_code === 'HRGA1') ||
                    ($leave->position_code === 'FAC1' && $leave->superior_code === 'MGT4') ||
                    ($leave->position_code === 'FAC2' && $leave->superior_code === 'FAC1') ||
                    ($leave->position_code === 'FAC3' && $leave->superior_code === 'FAC1') ||
                    ($leave->position_code === 'FAC4' && $leave->superior_code === 'FAC1') ||
                    ($leave->position_code === 'FAC5' && $leave->superior_code === 'FAC1') ||
                    ($leave->position_code === 'FAC6' && $leave->superior_code === 'FAC1') ||
                    ($leave->position_code === 'FAC7' && $leave->superior_code === 'FAC1') ||
                    ($leave->position_code === 'FAC8' && $leave->superior_code === 'FAC1') ||
                    ($leave->position_code === 'MGT6' && $leave->superior_code === 'MGT4') ||
                    ($leave->position_code === 'SAS2' && $leave->superior_code === 'MGT6') ||
                    ($leave->position_code === 'SAS3' && $leave->superior_code === 'MGT6') ||
                    ($leave->position_code === 'SAS4' && $leave->superior_code === 'MGT6') ||
                    ($leave->position_code === 'SAS5' && $leave->superior_code === 'MGT6') ||
                    ($leave->position_code === 'SED1' && $leave->superior_code === 'MGT6') ||
                    ($leave->position_code === 'SED2' && $leave->superior_code === 'MGT6') ||
                    ($leave->position_code === 'SED3' && $leave->superior_code === 'MGT6') ||
                    ($leave->position_code === 'PUR1' && $leave->superior_code === 'MGT7') ||
                    ($leave->position_code === 'PUR2' && $leave->superior_code === 'PUR1') ||
                    ($leave->position_code === 'PUR3' && $leave->superior_code === 'PUR1') ||
                    ($leave->position_code === 'LOG1' && $leave->superior_code === 'MGT7') ||
                    ($leave->position_code === 'LOG2' && $leave->superior_code === 'LOG1') ||
                    ($leave->position_code === 'LOG3' && $leave->superior_code === 'LOG1') ||
                    ($leave->position_code === 'LOG4' && $leave->superior_code === 'LOG1') ||
                    ($leave->position_code === 'WHD1' && $leave->superior_code === 'MGT7') ||
                    ($leave->position_code === 'WHD2' && $leave->superior_code === 'WHD1') ||
                    ($leave->position_code === 'WHD3' && $leave->superior_code === 'WHD1') ||
                    ($leave->position_code === 'WHD5' && $leave->superior_code === 'WHD1') ||
                    ($leave->position_code === 'ENI1' && $leave->superior_code === 'MGT9') ||
                    ($leave->position_code === 'ENI2' && $leave->superior_code === 'ENI1') ||
                    ($leave->position_code === 'AUT1' && $leave->superior_code === 'MGT9') ||
                    ($leave->position_code === 'AUT2' && $leave->superior_code === 'MGT9') ||
                    ($leave->position_code === 'AUT3' && $leave->superior_code === 'MGT9') ||
                    ($leave->position_code === 'AUT4' && $leave->superior_code === 'MGT9') ||
                    ($leave->position_code === 'ENG1' && $leave->superior_code === 'MGT3') ||
                    ($leave->position_code === 'ENG2' && $leave->superior_code === 'MGT3') ||
                    ($leave->position_code === 'ENG3' && $leave->superior_code === 'MGT3') ||
                    ($leave->position_code === 'ENG4' && $leave->superior_code === 'MGT3') ||
                    ($leave->position_code === 'ENG5' && $leave->superior_code === 'MGT3') ||
                    ($leave->position_code === 'ENG6' && $leave->superior_code === 'MGT3') ||
                    ($leave->position_code === 'ENG7' && $leave->superior_code === 'MGT3') ||
                    ($leave->position_code === 'QAQC1' && $leave->superior_code === 'MGT10') ||
                    ($leave->position_code === 'HSE1' && $leave->superior_code === 'MGT10') ||
                    ($leave->position_code === 'HSE2' && $leave->superior_code === 'HSE1') ||
                    ($leave->position_code === 'HSE3' && $leave->superior_code === 'HSE1') ||
                    ($leave->position_code === 'HSE4' && $leave->superior_code === 'HSE1') ||
                    ($leave->position_code === 'HSE5' && $leave->superior_code === 'HSE1') ||
                    ($leave->position_code === 'MCN1' && $leave->superior_code === 'MGT8') ||
                    ($leave->position_code === 'MCN2' && $leave->superior_code === 'MCN1') ||
                    ($leave->position_code === 'DVD1' && $leave->superior_code === 'MGT8') ||
                    ($leave->position_code === 'DVD2' && $leave->superior_code === 'DVD1') ||
                    ($leave->position_code === 'MPD1' && $leave->superior_code === 'MGT8') ||
                    ($leave->position_code === 'MPD2' && $leave->superior_code === 'MGT8') ||
                    ($leave->position_code === 'MPD3' && $leave->superior_code === 'MGT8') ||
                    ($leave->position_code === 'MPD4' && $leave->superior_code === 'MGT8') ||
                    ($leave->position_code === 'MPD5' && $leave->superior_code === 'MGT8') ||
                    ($leave->position_code === 'MPD15' && $leave->superior_code === 'MGT8') ||
                    ($leave->position_code === 'MPD16' && $leave->superior_code === 'MGT8') ||
                    ($leave->position_code === 'MPD20' && $leave->superior_code === 'MGT8') ||
                    ($leave->position_code === 'MPD24' && $leave->superior_code === 'MGT8') ||
                    ($leave->position_code === 'MPD28' && $leave->superior_code === 'MGT8') ||
                    ($leave->position_code === 'MPD32' && $leave->superior_code === 'MGT8'))
                <style>
                    .approval-sectionspv {
                        display: none;
                    }
                </style>
            @endif
            @if (!$leave->approve1_name && $leave->position_code != 'HR02')
                <div class="approval-sectionspv">
                    <div class="row justify-content-center">
                        <div class="col-3">
                            <form action="{{ route('specialleave.reject', $leave->id) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-danger">Reject Supervisor</button>
                            </form>
                        </div>
                        <div class="col-3">
                            <form action="{{ route('specialleave.approve', $leave->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <button type="submit" class="btn btn-success">Approve Supervisor</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Approve By Manager -->
            @if (
                ($leave->position_code === 'ITD1' && $leave->superior_code === 'MGT2') ||
                    ($leave->position_code === 'ITD2' && $leave->superior_code === 'ITD1') ||
                    ($leave->position_code === 'ITD3' && $leave->superior_code === 'ITD1') ||
                    ($leave->position_code === 'ITD4' && $leave->superior_code === 'ITD1') ||
                    ($leave->position_code === 'HRGA1' && $leave->superior_code === 'MGT5') ||
                    ($leave->position_code === 'HRGA2' && $leave->superior_code === 'HRGA1') ||
                    ($leave->position_code === 'HRGA3' && $leave->superior_code === 'HRGA1') ||
                    ($leave->position_code === 'FAC1' && $leave->superior_code === 'MGT4') ||
                    ($leave->position_code === 'FAC2' && $leave->superior_code === 'FAC1') ||
                    ($leave->position_code === 'FAC3' && $leave->superior_code === 'FAC1') ||
                    ($leave->position_code === 'FAC4' && $leave->superior_code === 'FAC1') ||
                    ($leave->position_code === 'FAC5' && $leave->superior_code === 'FAC1') ||
                    ($leave->position_code === 'FAC6' && $leave->superior_code === 'FAC1') ||
                    ($leave->position_code === 'FAC7' && $leave->superior_code === 'FAC1') ||
                    ($leave->position_code === 'FAC8' && $leave->superior_code === 'FAC1') ||
                    ($leave->position_code === 'MGT6' && $leave->superior_code === 'MGT4') ||
                    ($leave->position_code === 'SAS2' && $leave->superior_code === 'MGT6') ||
                    ($leave->position_code === 'SAS3' && $leave->superior_code === 'MGT6') ||
                    ($leave->position_code === 'SAS4' && $leave->superior_code === 'MGT6') ||
                    ($leave->position_code === 'SAS5' && $leave->superior_code === 'MGT6') ||
                    ($leave->position_code === 'SED1' && $leave->superior_code === 'MGT6') ||
                    ($leave->position_code === 'SED2' && $leave->superior_code === 'MGT6') ||
                    ($leave->position_code === 'SED3' && $leave->superior_code === 'MGT6') ||
                    ($leave->position_code === 'PUR1' && $leave->superior_code === 'MGT7') ||
                    ($leave->position_code === 'PUR2' && $leave->superior_code === 'PUR1') ||
                    ($leave->position_code === 'PUR3' && $leave->superior_code === 'PUR1') ||
                    ($leave->position_code === 'LOG1' && $leave->superior_code === 'MGT7') ||
                    ($leave->position_code === 'LOG2' && $leave->superior_code === 'LOG1') ||
                    ($leave->position_code === 'LOG3' && $leave->superior_code === 'LOG1') ||
                    ($leave->position_code === 'LOG4' && $leave->superior_code === 'LOG1') ||
                    ($leave->position_code === 'WHD1' && $leave->superior_code === 'MGT7') ||
                    ($leave->position_code === 'WHD2' && $leave->superior_code === 'WHD1') ||
                    ($leave->position_code === 'WHD3' && $leave->superior_code === 'WHD1') ||
                    ($leave->position_code === 'WHD5' && $leave->superior_code === 'WHD1') ||
                    ($leave->position_code === 'ENI1' && $leave->superior_code === 'MGT9') ||
                    ($leave->position_code === 'ENI2' && $leave->superior_code === 'ENI1') ||
                    ($leave->position_code === 'AUT1' && $leave->superior_code === 'MGT9') ||
                    ($leave->position_code === 'AUT2' && $leave->superior_code === 'MGT9') ||
                    ($leave->position_code === 'AUT3' && $leave->superior_code === 'MGT9') ||
                    ($leave->position_code === 'AUT4' && $leave->superior_code === 'MGT9') ||
                    ($leave->position_code === 'ENG1' && $leave->superior_code === 'MGT3') ||
                    ($leave->position_code === 'ENG2' && $leave->superior_code === 'MGT3') ||
                    ($leave->position_code === 'ENG3' && $leave->superior_code === 'MGT3') ||
                    ($leave->position_code === 'ENG4' && $leave->superior_code === 'MGT3') ||
                    ($leave->position_code === 'ENG5' && $leave->superior_code === 'MGT3') ||
                    ($leave->position_code === 'ENG6' && $leave->superior_code === 'MGT3') ||
                    ($leave->position_code === 'ENG7' && $leave->superior_code === 'MGT3') ||
                    ($leave->position_code === 'QAQC1' && $leave->superior_code === 'MGT10') ||
                    ($leave->position_code === 'HSE1' && $leave->superior_code === 'MGT10') ||
                    ($leave->position_code === 'HSE2' && $leave->superior_code === 'HSE1') ||
                    ($leave->position_code === 'HSE3' && $leave->superior_code === 'HSE1') ||
                    ($leave->position_code === 'HSE4' && $leave->superior_code === 'HSE1') ||
                    ($leave->position_code === 'HSE5' && $leave->superior_code === 'HSE1') ||
                    ($leave->position_code === 'MCN1' && $leave->superior_code === 'MGT8') ||
                    ($leave->position_code === 'MCN2' && $leave->superior_code === 'MCN1') ||
                    ($leave->position_code === 'DVD1' && $leave->superior_code === 'MGT8') ||
                    ($leave->position_code === 'DVD2' && $leave->superior_code === 'DVD1') ||
                    ($leave->position_code === 'MPD1' && $leave->superior_code === 'MGT8') ||
                    ($leave->position_code === 'MPD2' && $leave->superior_code === 'MGT8') ||
                    ($leave->position_code === 'MPD3' && $leave->superior_code === 'MGT8') ||
                    ($leave->position_code === 'MPD4' && $leave->superior_code === 'MGT8') ||
                    ($leave->position_code === 'MPD5' && $leave->superior_code === 'MGT8') ||
                    ($leave->position_code === 'MPD15' && $leave->superior_code === 'MGT8') ||
                    ($leave->position_code === 'MPD16' && $leave->superior_code === 'MGT8') ||
                    ($leave->position_code === 'MPD20' && $leave->superior_code === 'MGT8') ||
                    ($leave->position_code === 'MPD24' && $leave->superior_code === 'MGT8') ||
                    ($leave->position_code === 'MPD28' && $leave->superior_code === 'MGT8') ||
                    ($leave->position_code === 'MPD32' && $leave->superior_code === 'MGT8'))
                <div class="approval-section">
                    <div class="row justify-content-center">
                        <div class="col-3">
                            <form action="{{ route('specialleave.rejecthod', $leave->id) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-danger">Reject Manager</button>
                            </form>
                        </div>
                        <div class="col-3">
                            <form action="{{ route('specialleave.approvehod', $leave->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <button type="submit" class="btn btn-success">Approve Manager</button>
                            </form>
                        </div>
                    </div>
                </div>
            @else
                @if ($leave->approve1_name === null)
                    <style>
                        .approval-section {
                            display: none;
                        }
                    </style>
                @endif
                @if (!$leave->approve2_name)
                    <div class="approval-section">
                        <div class="row justify-content-center">
                            <div class="col-3">
                                <form action="{{ route('specialleave.rejecthod', $leave->id) }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Reject Manager</button>
                                </form>
                            </div>
                            <div class="col-3">
                                <form action="{{ route('specialleave.approvehod', $leave->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Approve Manager</button>
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
