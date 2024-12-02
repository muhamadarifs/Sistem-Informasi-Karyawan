<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @if(isset($title))
        {{ $title }} | HRISPA
        @else
        HRISPA | Human Resources Information System Personal Admin
        @endif
    </title>
    <style>
    .attendance-pdf,
    .attendance-pdf * {
        box-sizing: border-box;
    }
    .attendance-pdf {
        background: #ffffff;
        height: 190px;
        position: relative;
        overflow: hidden;
    }
    .logo {
        width: 20%;
        height: auto;
        position: absolute;
        right: 83.87%;
        left: 0;
        bottom: 62.63%;
        top: 0%;
        object-fit: cover;
    }
    .rectangle-6 {
        background: #36a4c0;
        width: 76.47%;
        height: 28.95%;
        position: absolute;
        right: 3.19%;
        left: 20.34%;
        bottom: 66.84%;
        top: 8.21%;
    }
    .attendance {
        color: #ffffff;
        text-align: center;
        font-family: "Poppins-Regular", sans-serif;
        font-size: 36px;
        font-weight: 400;
        position: absolute;
        right: 3.19%;
        left: 17.82%;
        width: 78.99%;
        bottom: 66.84%;
        top: 11%;
        height: 28.42%;
    }
    .employee-id {
        position: absolute;
        inset: 0;
    }
    .employee-id2 {
        color: #000000;
        text-align: left;
        font-family: "Poppins-Regular", sans-serif;
        font-size: 12px;
        font-weight: 400;
        position: absolute;
        right: 84.87%;
        left: 2.52%;
        width: 12.61%;
        bottom: 36.32%;
        top: 54.21%;
        height: 9.47%;
    }
    .div {
        color: #000000;
        text-align: left;
        font-family: "Poppins-Regular", sans-serif;
        font-size: 12px;
        font-weight: 400;
        position: absolute;
        right: 83.53%;
        left: 15.97%;
        width: 0.5%;
        bottom: 36.32%;
        top: 54.21%;
        height: 9.47%;
    }
    .employe-id {
        color: #000000;
        text-align: left;
        font-family: "Poppins-Regular", sans-serif;
        font-size: 12px;
        font-weight: 400;
        position: absolute;
        right: 66.72%;
        left: 18.15%;
        width: 15.13%;
        bottom: 36.32%;
        top: 54.21%;
        height: 9.47%;
    }
    .name-karyawan {
        position: absolute;
        inset: 0;
    }
    .name {
        color: #000000;
        text-align: left;
        font-family: "Poppins-Regular", sans-serif;
        font-size: 12px;
        font-weight: 400;
        position: absolute;
        right: 84.87%;
        left: 2.52%;
        width: 12.61%;
        bottom: 21.58%;
        top: 68.95%;
        height: 9.47%;
    }
    .div2 {
        color: #000000;
        text-align: left;
        font-family: "Poppins-Regular", sans-serif;
        font-size: 12px;
        font-weight: 400;
        position: absolute;
        right: 83.53%;
        left: 15.97%;
        width: 0.5%;
        bottom: 21.58%;
        top: 68.95%;
        height: 9.47%;
    }
    .name-of-employee {
        color: #000000;
        text-align: left;
        font-family: "Poppins-Regular", sans-serif;
        font-size: 12px;
        font-weight: 400;
        position: absolute;
        right: 48.24%;
        left: 18.15%;
        width: 33.61%;
        bottom: 21.58%;
        top: 68.95%;
        height: 9.47%;
    }
    .periode-attendance {
        position: absolute;
        inset: 0;
    }
    .periode {
        color: #000000;
        text-align: left;
        font-family: "Poppins-Regular", sans-serif;
        font-size: 12px;
        font-weight: 400;
        position: absolute;
        right: 84.87%;
        left: 2.52%;
        width: 12.61%;
        bottom: 6.84%;
        top: 83.68%;
        height: 9.47%;
    }
    .div3 {
        color: #000000;
        text-align: left;
        font-family: "Poppins-Regular", sans-serif;
        font-size: 12px;
        font-weight: 400;
        position: absolute;
        right: 83.53%;
        left: 15.97%;
        width: 0.5%;
        bottom: 6.84%;
        top: 83.68%;
        height: 9.47%;
    }
    ._21-mar-2024-20-apr-2024 {
        color: #000000;
        text-align: left;
        font-family: "Poppins-Regular", sans-serif;
        font-size: 12px;
        font-weight: 400;
        position: absolute;
        right: 48.24%;
        left: 18.15%;
        width: 33.61%;
        bottom: 6.84%;
        top: 83.68%;
        height: 9.47%;
    }
    .department {
        position: absolute;
        inset: 0;
    }
    .department2 {
        color: #000000;
        text-align: left;
        font-family: "Poppins-Regular", sans-serif;
        font-size: 12px;
        font-weight: 400;
        position: absolute;
        right: 32.27%;
        left: 55.13%;
        width: 12.61%;
        bottom: 36.32%;
        top: 54.21%;
        height: 9.47%;
    }
    .div4 {
        color: #000000;
        text-align: left;
        font-family: "Poppins-Regular", sans-serif;
        font-size: 12px;
        font-weight: 400;
        position: absolute;
        right: 30.92%;
        left: 68.57%;
        width: 0.5%;
        bottom: 36.32%;
        top: 54.21%;
        height: 9.47%;
    }
    .department-name {
        color: #000000;
        text-align: right;
        font-family: "Poppins-Regular", sans-serif;
        font-size: 12px;
        font-weight: 400;
        position: absolute;
        right: 2.52%;
        left: 70.76%;
        width: 26.72%;
        bottom: 36.32%;
        top: 54.21%;
        height: 9.47%;
    }
    .position {
        position: absolute;
        inset: 0;
    }
    .position2 {
        color: #000000;
        text-align: left;
        font-family: "Poppins-Regular", sans-serif;
        font-size: 12px;
        font-weight: 400;
        position: absolute;
        right: 32.27%;
        left: 55.13%;
        width: 12.61%;
        bottom: 21.58%;
        top: 68.95%;
        height: 9.47%;
    }
    .div5 {
        color: #000000;
        text-align: left;
        font-family: "Poppins-Regular", sans-serif;
        font-size: 12px;
        font-weight: 400;
        position: absolute;
        right: 30.92%;
        left: 68.57%;
        width: 0.5%;
        bottom: 21.58%;
        top: 68.95%;
        height: 9.47%;
    }
    .asst-general-manager-opeational {
        color: #000000;
        text-align: right;
        font-family: "Poppins-Regular", sans-serif;
        font-size: 12px;
        font-weight: 400;
        position: absolute;
        right: 2.52%;
        left: 70.76%;
        width: 26.72%;
        bottom: 12.11%;
        top: 68.95%;
        height: 18.95%;
    }
    .workingday {
        color: #000000;
        text-align: left;
        font-family: "Poppins-Regular", sans-serif;
        font-size: 12px;
        font-weight: 400;
        position: absolute;
        right: 32.27%;
        left: 55.13%;
        width: 12.61%;
        bottom: 21.58%;
        top: 83.69%;
        height: 9.47%;
    }
    .div6 {
        color: #000000;
        text-align: left;
        font-family: "Poppins-Regular", sans-serif;
        font-size: 12px;
        font-weight: 400;
        position: absolute;
        right: 30.92%;
        left: 68.57%;
        width: 0.5%;
        bottom: 21.58%;
        top: 83.69%;
        height: 9.47%;
    }
    .workingday2 {
        color: #000000;
        text-align: right;
        font-family: "Poppins-Regular", sans-serif;
        font-size: 12px;
        font-weight: 400;
        position: absolute;
        right: 2.52%;
        left: 68.56%;
        width: 29.52%;
        bottom: 12.11%;
        top: 83.69%;
        height: 18.95%;
    }
    table {
        border-collapse: collapse;
        border: 1px solid #dddddd;
        width: 100%;
        font-family: "Nunito", sans-serif;
        padding: 0px;
        font-size: 12px;
    }
    td {
        padding: 8px;
        text-align: center;
        border: 1px solid #dddddd;
    }
    th{
        border: 1px solid #dddddd;
        color: #ffffff;
        background-color: #36a4c0;
        padding: 5px 0 5px 0;
        height: 20px;
    }
    </style>
</head>
<body>
    <div class="attendance-pdf">
        <img class="logo" src="{{'data:image/png;base64,'.base64_encode(file_get_contents(public_path('storage/images/1.png'))) }}" />
        <div class="rectangle-6"></div>
        <div class="attendance">Attendance Report</div>
        <div class="employee-id2">Employee ID</div>
        <div class="div">:</div>
        <div class="employe-id">{{$data->employee_id ?? Auth::user()->employee_id}}</div>
        <div class="name">Name</div>
        <div class="div2">:</div>
        <div class="name-of-employee">{{$data->user->name ?? Auth::user()->name}}</div>
        <div class="periode">Periode</div>
        <div class="div3">:</div>
        <div class="_21-mar-2024-20-apr-2024">{{ \Carbon\Carbon::parse($start_date)->format('d M Y') ?? '-'}} - {{ \Carbon\Carbon::parse($end_date)->format('d M Y') ?? '-'}}</div>
        <div class="department2">Department</div>
        <div class="div4">:</div>
        <div class="department-name">{{ Auth::user()->position->department}}</div>
        <div class="position2">Position</div>
        <div class="div5">:</div>
        <div class="asst-general-manager-opeational">
            {{ Auth::user()->position->position_name}}
        </div>
        <div class="workingday">Working Day</div>
        <div class="div6">:</div>
        <div class="workingday2">
            {{ $countworkingday - $countharilibur }}
        </div>
    </div>
    <hr>
    <table id="example" class="display">
        <thead>
            <tr>
                <th>No</th>
                <th>Date</th>
                <th>Day</th>
                <th>In</th>
                <th>Out</th>
                <th>Total WH</th>
                <th>Late</th>
                <th>Absent</th>
                <th>OT</th>
                <th>Remarks</th>
            </tr>
        </thead>
        @forelse ($absensi as $data)
        @php
            $day = \Carbon\Carbon::parse($data->tanggal)->format('D');

            $jamMasuk = date('H:i', strtotime($data->jam_masuk ));
            $jamKeluar = date('H:i', strtotime($data->jam_keluar ));
            $isJamMasukInvalid = is_null($data->jam_masuk) || $jamMasuk == '00:00';
            $isJamKeluarInvalid = is_null($data->jam_keluar) || $jamKeluar == '00:00';
            $isInvalid = $isJamMasukInvalid && $isJamKeluarInvalid;
        @endphp
        <tbody>
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ date('d-m-Y', strtotime($data->tanggal)) }}</td>
                <td style="color: {{ in_array($day, ['Sat', 'Sun']) ? 'red' : 'black'}}; color: {{ $isInvalid ? 'red' : 'black' }};">
                    {{ $day }}
                </td>
                <td>{{ $data->jam_masuk ? date('H:i', strtotime($data->jam_masuk)) : '-' }}</td>
                <td>{{ $data->jam_keluar ? date('H:i', strtotime($data->jam_keluar)) : '-' }}</td>
                <td>{{ $data->total_wh }}</td>
                <td>{{ $data->late }}</td>
                <td>{{ $data->absent }}</td>
                <td>{{ $data->ot }}</td>
                <td>{{ $data->remarks }}</td>
            </tr>
        </tbody>
        @empty
        <tr>
            <td colspan="10">No data available</td>
        </tr>
        @endforelse
    </table>

</body>
</html>
