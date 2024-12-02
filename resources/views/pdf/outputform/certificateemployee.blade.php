<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
</head>
<body style="padding: 12px;">
    <header style="width: 100%; display: flex; justify-content: space-between;" >
        <div class="header-image" style="margin-bottom: 20px;">
            <img src="{{'data:image/png;base64,'.base64_encode(file_get_contents(public_path('storage/images/LOGO DVE NEW.png'))) }}" style="width: 30%; height: auto; position: absolute; top: 5px;" alt="logo">
        </div>
        <div style="text-align: right; border-bottom: 1px solid;">
            <h2 style="color: blue; line-height: 0;">PT. DVE MARINE ENGINEERING</h2>
            <p>Management Office : <br>Menara Aria, Office Tower 11<sup>th</sup> FI, Harbour Bay Downtown <br> Jalan Duyung, Batu Ampar - Batam. Tel: 0778-4888898</p>
        </div>
    </header>
    <section style="width: 100%;">
        <div style="width: 100%; text-align: center;">
            <h3 style="margin-bottom: 5px; line-height: 1.2;"><i>SURAT KETERANGAN KERJA / <br><u>CERTIFICATE of EMPLOYMENT</u></i></h3>
            <span>No. {{ $certifform->form_number }}</span>
        </div>
        <div style="text-align: left;">
            <p><b><i>Dear Sir/Madam,</i></b></p>
            <p>Saya yang bertanda tangan di bawah ini menyatakan dengan sesungguhnua bahwa nama  yang tercantum di bawah ini adalah karyawan PT. DVE MARINE ENGINEERING sejak {{ \Carbon\Carbon::parse($certifform->user->date_hire)->translatedFormat('F j, Y') }} dan masih aktif dengan detail sebagai berikut. /
            <i>I, the undersigned, hereby solemnly declare assure and confirm as below name mentioned is employee of PT. DVE MARINE ENGINEERING since {{ \Carbon\Carbon::parse($certifform->user->date_hire)->translatedFormat('F j, Y') }} and still active with the following details:</i>
            </p>
            <table style="margin-left: 12px;">
                <tr>
                    <td>Nama / <i>Name</i></td>
                    <td>:</td>
                    <td>{{ $certifform->user->name }}</td>
                </tr>
                <tr>
                    <td>No. Karyawan / <i>Employee No.</i></td>
                    <td>:</td>
                    <td>{{ $certifform->user->employee_id }}</td>
                </tr>
                <tr>
                    <td>No.KTP / <i>ID Card Number</i></td>
                    <td>:</td>
                    <td>{{ $certifform->user->nik }}</td>
                </tr>
                <tr>
                    <td>Jabatan / <i>Position</i></td>
                    <td>:</td>
                    <td>{{ $certifform->user->position_name }}</td>
                </tr>
                <tr>
                    <td>Tujuan / <i>Purposes</i></td>
                    <td>:</td>
                    <td>{{ $certifform->keperluan }}</td>
                </tr>
            </table>
            <br>
            <br>
            <p>Thanks, and regards,</p>
            <b>PT. DVE MARINE ENGINEERING</b>
            <br>
            <br>
            <br>
            @php
                $imageExtensions = ['jpg', 'jpeg', 'png'];
                $extension = pathinfo($certifform->create_sign, PATHINFO_EXTENSION);
            @endphp

            @if(in_array($extension, $imageExtensions))
                <img class="image" src="{{ 'data:image/png;base64,' .base64_encode(file_get_contents(public_path('storage/images/Sign/'.$certifform->create_sign))) }}" alt="Sign_image" style="width: 30%; height: auto; position: absolute; bottom: 25%; left: 0%;">
            @endif
            <img class="image" src="{{ 'data:image/png;base64,' .base64_encode(file_get_contents(public_path('storage/images/DVE stamp PNG.png'))) }}" alt="Stamp" style="width: 30%; height: auto; position: absolute; bottom: 28%; left: 15%;">
            <br>
            <br>
            <br>
            <table style="border-top: 1px solid;">
                <tr>
                    <td>Date</td>
                    <td>:</td>
                    <td>{{ \Carbon\Carbon::parse($certifform->create_on)->translatedFormat('F j, Y') }}</td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td>:</td>
                    <td>{{ $certifform->create_name }}</td>
                </tr>
                <tr>
                    <td>Position</td>
                    <td>:</td>
                    <td>{{ $certifform->create_position }}</td>
                </tr>
                <tr>
                    <td>Phone No.</td>
                    <td>:</td>
                    <td>0778 4888898</td>
                </tr>
            </table>
        </div>
    </section>
    <footer style="border-top: 1px solid; position: absolute; bottom: 64px;">
        <h3 style="line-height: 0; color: blue;">PT DVE MARINE ENGINEERING</h3>
        <span><b><u>WORKSHOP : </u></b></span>
        <br>
        <span>Kawasan Indsutri Kampung Baru RT.03 RW.3, Tanjung Riau, Sekupang Batam <br> Tel: 0778-3541170</span>
    </footer>
    <div style="width: 100%; position: absolute; left: 0; bottom: 0;">
        <div style="padding: 2px 7px 0 8px; width: 100%; background-color: yellow;"><br></div>
        <div style="padding: 2px 7px 0 8px; width: 100%; background-color: blue;"><br></div>
    </div>
</body>
</html>
