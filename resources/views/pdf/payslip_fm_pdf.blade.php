<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @if (isset($title))
            HRISPA | {{ $title }}
        @else
            HRISPA | Feen Marine
        @endif
    </title>
</head>
<style>
    body {
        font-family: 'Courier New', Courier, monospace;
        font-size: 10px;
        display: flex;
    }

    @page {
        margin-top: 1, 38cm;
        margin-bottom: 0, 49cm;
        margin-right: 1, 73cm;
        margin-left: 1, 59cm;
    }
</style>

<body>
    <div class="no-margin-top">
        <div style="background: #ffffff; height: 1000px; position: relative; overflow: hidden;">
            <div style="background: #ffffff; width: 738px; height: 1002px; position: absolute; left: 0px; top: -1px; overflow: hidden;">
                <img class="fm-logo-1-2" style="width: 95px; height: 95px; position: absolute; left: 61px; top: 48px; object-fit: cover;" src="{{'data:image/png;base64,'.base64_encode(file_get_contents(public_path('storage/images/1.png'))) }}"/>
                <div style="color: #05c3ff; text-align: center; font-size: 20px; font-weight: 700; position: absolute; left: 189px; top: 60px; width: 360px; height: 14px; align-items: center; justify-content: center;">
                    PT. xyz
                </div>
                <div style="color: #000000; text-align: center; font-weight: 400; position: absolute; left: 269px; top: 83px; width: 200px; height: 14px; align-items: center; justify-content: center;">
                    Management Office :
                </div>
                <div style="color: #000000; text-align: center; font-weight: 400; position: absolute; left: 169px; top: 98px; width: 400px; height: 14px;">
                    Menara xyz, Office Tower, Xyz Area<br/>Jalan Satu, Area Dua - London. Tel : 0000-1234567
                </div>
                <div style="color: #000000; text-align: center; font-weight: 700; position: absolute; left: 169px; top: 132px; width: 400px;">
                    Salary Statement For Period ending : 20 {{$data->periode}}
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 53px; top: 157px; width: 70px; align-items: center; justify-content: flex-start;">
                    Name
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 124px; top: 157px; width: 286px; align-items: center; justify-content: flex-start;">
                    : {{ $data->user->name }}
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 53px; top: 172px; width: 70px; align-items: center; justify-content: flex-start;">
                    Employee ID
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 124px; top: 172px; width: 286px; align-items: center; justify-content: flex-start;">
                    : {{ $data->user->employee_id }}
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 53px; top: 187px; width: 70px; align-items: center; justify-content: flex-start;">
                    Position
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 124px; top: 187px; width: 286px; align-items: center; justify-content: flex-start;">
                    : {{ $data->user->position_name}}
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 53px; top: 202px; width: 70px; align-items: center; justify-content: flex-start;">
                    Department
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 124px; top: 202px; width: 286px; align-items: center; justify-content: flex-start;">
                    : {{ $data->user->position->department}}
                </div>
                <div style=" color: #000000; text-align: left; font-weight: 400; position: absolute; left: 53px; top: 217px; width: 70px; align-items: center; justify-content: flex-start;">
                    Division
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 124px; top: 217px; width: 286px; align-items: center; justify-content: flex-start;">
                    : {{ $data->user->division ?? ''}}
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 53px; top: 232px; width: 70px; align-items: center; justify-content: flex-start;">
                    Section
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 124px; top: 232px; width: 260px; align-items: center; justify-content: flex-start;">
                    : {{ $data->user->section ?? ''}}
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 421px; top: 232px; width: 30px; align-items: center; justify-content: flex-start;">
                    Unit
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 452px; top: 232px; width: 208px; align-items: center; justify-content: flex-start;">
                    : {{ $data->user->unit ?? ''}}
                </div>
                <div style="background: #ffffff; border-style: dashed; border-color: #000000; border-width: 1px; width: 285px; height: 109px; position: absolute; left: 52px; top: 245px;"></div>
                <div style="color: #000000; text-align: left; font-weight: 700; position: absolute; left: 125px; top: 247px; align-items: center; justify-content: flex-start;">
                    Organization Assignment
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 57px; top: 263px; width: 76px; align-items: center; justify-content: flex-start;">
                    Base Area
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 143px; top: 263px; width: 190px; align-items: center; justify-content: flex-start;">
                    : {{ $data->user->home_base ?? '' }}
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 57px; top: 276px; width: 76px; align-items: center; justify-content: flex-start;">
                    Empl. Type
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 143px; top: 276px; width: 190px; align-items: center; justify-content: flex-start;">
                    : {{ $data->empl_type ?? ''}}
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 57px; top: 289px; width: 76px; align-items: center; justify-content: flex-start;">
                    Over Time
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 143px; top: 289px; width: 190px; align-items: center; justify-content: flex-start;">
                    : {{ $data->ot ?? ''}}
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 57px; top: 302px; width: 84px; align-items: center; justify-content: flex-start;">
                    Tax (NPWP) No
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 143px; top: 302px; width: 190px; align-items: center; justify-content: flex-start;">
                    : {{ $data->user->npwp ?? '0'}}
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 57px; top: 315px; width: 76px; align-items: center; justify-content: flex-start;">
                    BPJS TK No
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 143px; top: 315px; width: 190px; align-items: center; justify-content: flex-start;">
                    : {{ $data->user->bpjs_tk ?? '0'}}
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 57px; top: 328px; width: 76px; align-items: center; justify-content: flex-start;">
                    BPJS Kes No
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 143px; top: 328px; width: 190px; align-items: center; justify-content: flex-start;">
                    : {{ $data->user->bpjs_kesehatan ?? '0'}}
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 57px; top: 341px; align-items: center; justify-content: flex-start;">
                    Marital Status
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 143px; top: 341px; width: 190px; align-items: center; justify-content: flex-start;">
                    : {{ $data->user->status_keluarga ?? ''}}
                </div>
                <div style="background: #ffffff; border-style: dashed; border-color: #000000; border-width: 1px; width: 323px; height: 109px; position: absolute; left: 337px; top: 245px;"></div>
                <div style="color: #000000; text-align: left; font-weight: 700; position: absolute; left: 457px; top: 247px; align-items: center; justify-content: flex-start;">
                    Salary Summary
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 343px; top: 263px; width: 78px; align-items: center; justify-content: flex-start;">
                    Gross Salary
                </div>
                <div style="color: #000000; text-align: left; font-weight: 700; position: absolute; left: 436px; top: 263px; width: 220px; align-items: center; justify-content: flex-start;">
                    : {{ number_format($data->total_income ?? 0, 0, ',', '.') }}
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 343px; top: 280px; width: 68px; align-items: center; justify-content: flex-start;">
                    Retro Gross
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 436px; top: 280px; width: 220px; align-items: center; justify-content: flex-start;">
                    : {{ $data->retro_gross ?? ''}}
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 343px; top: 297px; width: 68px; align-items: center; justify-content: flex-start;">
                    Deduction
                </div>
                <div style="color: #000000; text-align: left; font-weight: 700; position: absolute; left: 436px; top: 297px; width: 220px; align-items: center; justify-content: flex-start;">
                    : {{ number_format($data->total_deduc ?? 0, 0, ',', '.') }}
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 343px; top: 314px; width: 84px; align-items: center; justify-content: flex-start;">
                    Retro Deduct
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 436px; top: 314px; width: 220px; align-items: center; justify-content: flex-start;">
                    : {{ $data->retro_deduct ?? ''}}
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 343px; top: 331px; width: 68px; align-items: center; justify-content: flex-start;">
                    Net. Salary
                </div>
                <div style="color: #000000; text-align: left; font-weight: 700; position: absolute; left: 436px; top: 331px; width: 220px; align-items: center; justify-content: flex-start;">
                    : {{ number_format($data->take_pay ?? 0, 0, ',', '.')  }}
                </div>
                <div style="background: #ffffff; border-style: dashed; border-color: #000000; border-width: 1px; width: 608px; height: 82px; position: absolute; left: 52px; top: 355px;"></div>
                <div style="color: #000000; text-align: left; font-weight: 700; position: absolute; left: 57px; top: 360px; align-items: center; justify-content: flex-start;">
                    Data Absent
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 57px; top: 373px; width: 114px; align-items: center; justify-content: flex-start;">
                    Working Day
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 185px; top: 373px; width: 114px; align-items: center; justify-content: flex-start;">
                    : {{ $data->work_day ?? '0'}}
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 57px; top: 386px; width: 114px; align-items: center; justify-content: flex-start;">
                    Absentizent/day
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 185px; top: 386px; width: 114px; align-items: center; justify-content: flex-start;">
                    : {{ $data->absent ?? '0'}}
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 57px; top: 399px; width: 114px; align-items: center; justify-content: flex-start; ">
                    Late/hour
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 185px; top: 399px; width: 114px; align-items: center; justify-content: flex-start;">
                    : {{ $data->late ?? '0'}}
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 57px; top: 412px; align-items: center; justify-content: flex-start;">
                    Annual Leave/MC/Other
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 185px; top: 412px; width: 114px; align-items: center; justify-content: flex-start;">
                    : {{ $data->cuti ?? '0'}}
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 57px; top: 425px; align-items: center; justify-content: flex-start;">
                    Total Overtime/hour
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 185px; top: 425px; width: 114px; align-items: center; justify-content: flex-start;">
                    : {{ $data->total_ot ?? '0'}}
                </div>
                <div style="background: #ffffff; border-style: dashed; border-color: #000000; border-width: 1px; width: 608px; height: 15px; position: absolute; left: 52px; top: 438px;"></div>
                <div style="color: #000000; text-align: left; font-weight: 700; position: absolute; left: 57px; top: 441px; align-items: flex-end; justify-content: flex-start;">
                    DESCRIPTION
                </div>
                <div style="background: #ffffff; border-style: dashed; border-color: #000000; border-width: 1px; width: 608px; height: 370px; position: absolute; left: 52px; top: 454px;"></div>
                <div
                    style="color: #000000; text-align: left; font-weight: 700; position: absolute; left: 117px; top: 469px; align-items: center; justify-content: flex-start;">
                    EARNINGS
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 146px; top: 482px; width: 256px; align-items: center; justify-content: flex-start;">
                    Basic Salary
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 482px; top: 482px; width: 150px; align-items: center; justify-content: flex-start;">
                    : Rp. {{ number_format($data->basic_salary ?? 0, 0, ',', '.') }}
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 146px; top: 495px; width: 256px; align-items: center; justify-content: flex-start;">
                    Allowance
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 482px; top: 495px; width: 150px; align-items: center; justify-content: flex-start;">
                    : Rp. {{ number_format($data->allowence ?? 0, 0, ',', '.') }}
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 146px; top: 508px; width: 256px; align-items: center; justify-content: flex-start;">
                    Foreman Allowance
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 482px; top: 508px; width: 150px; align-items: center; justify-content: flex-start;">
                    : Rp. {{ number_format($data->foreman_allow ?? 0, 0, ',', '.') }}
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 146px; top: 521px; width: 256px; align-items: center; justify-content: flex-start;">
                    Shift Allowance
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 482px; top: 521px; width: 150px; align-items: center; justify-content: flex-start;">
                    : Rp. {{ number_format($data->shift_allow ?? 0, 0, ',', '.') }}
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 146px; top: 534px; width: 256px; align-items: center; justify-content: flex-start;">
                    Additional Allowance
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 482px; top: 534px; width: 150px; align-items: center; justify-content: flex-start;">
                    : Rp. {{ number_format($data->addition_allow ?? 0, 0, ',', '.') }}
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 146px; top: 547px; width: 256px; align-items: center; justify-content: flex-start;">
                    Over Time
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 482px; top: 547px; width: 150px; align-items: center; justify-content: flex-start;">
                    : Rp. {{ number_format($data->overtime ?? 0, 0, ',', '.') }}
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 146px; top: 560px; width: 256px; align-items: center; justify-content: flex-start;">
                    Correction
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 482px; top: 560px; width: 150px; align-items: center; justify-content: flex-start;">
                    : Rp. {{ number_format($data->correction ?? 0, 0, ',', '.') }}
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 146px; top: 573px; width: 256px; align-items: center; justify-content: flex-start;">
                    Bonus
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 482px; top: 573px; width: 150px; align-items: center; justify-content: flex-start;">
                    : Rp. {{ number_format($data->bonus ?? 0, 0, ',', '.') }}
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 146px; top: 586px; width: 256px; align-items: center; justify-content: flex-start;">
                    THR
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 482px; top: 586px; width: 150px; align-items: center; justify-content: flex-start;">
                    : Rp. {{ number_format($data->thr ?? 0, 0, ',', '.') }}
                </div>
                <div style="color: #000000; text-align: left; font-weight: 700; position: absolute; left: 220px; top: 602px; width: 182px; align-items: center; justify-content: flex-start;">
                    Total Earnings
                </div>
                <div style="color: #000000; text-align: left; font-weight: 700; position: absolute; left: 482px; top: 602px; width: 150px; align-items: center; justify-content: flex-start;">
                    : Rp. {{ number_format($data->total_income ?? 0, 0, ',', '.') }}
                </div>
                <div style="color: #000000; text-align: left; font-weight: 700; position: absolute; left: 117px; top: 618px; align-items: center; justify-content: flex-start;">
                    DEDUCTION
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 146px; top: 631px; width: 256px; align-items: center; justify-content: flex-start;">
                    Absent
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 482px; top: 631px; width: 150px; align-items: center; justify-content: flex-start;">
                    : Rp. {{ number_format($data->pay_absent ?? 0, 0, ',', '.') }}
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 146px; top: 644px; width: 256px; align-items: center; justify-content: flex-start;">
                    Late
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 482px; top: 644px; width: 150px; align-items: center; justify-content: flex-start;">
                    : Rp. {{ number_format($data->pay_late ?? 0, 0, ',', '.') }}
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 146px; top: 657px; width: 256px; align-items: center; justify-content: flex-start;">
                    Annual Leave/MC
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 482px; top: 657px; width: 150px; align-items: center; justify-content: flex-start;">
                    : Rp. {{ number_format($data->pay_cuti ?? 0, 0, ',', '.') }}
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 146px; top: 670px; width: 256px; align-items: center; justify-content: flex-start;">
                    Other Deduct
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 482px; top: 670px; width: 150px; align-items: center; justify-content: flex-start;">
                    : Rp. {{ number_format($data->other_deduc ?? 0, 0, ',', '.') }}
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 146px; top: 683px; width: 256px; align-items: center; justify-content: flex-start;">
                    JHT
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 482px; top: 683px; width: 150px; align-items: center; justify-content: flex-start;">
                    : Rp. {{ number_format($data->jht ?? 0, 0, ',', '.') }}
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 146px; top: 696px; width: 256px; align-items: center; justify-content: flex-start;">
                    BPJS Health Care
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 482px; top: 696px; width: 150px; align-items: center; justify-content: flex-start;">
                    : Rp. {{ number_format($data->bpjs_kesehatan ?? 0, 0, ',', '.') }}
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 146px; top: 709px; width: 256px; align-items: center; justify-content: flex-start;">
                    BPJS Pension
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 482px; top: 709px; width: 150px; align-items: center; justify-content: flex-start;">
                    : Rp. {{ number_format($data->bpjs_tk ?? 0, 0, ',', '.') }}
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 146px; top: 722px; width: 256px; align-items: center; justify-content: flex-start;">
                    TAX
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 482px; top: 722px; width: 150px; align-items: center; justify-content: flex-start;">
                    : Rp. {{ number_format($data->tax ?? 0, 0, ',', '.') }}
                </div>
                <div style="color: #000000; text-align: left; font-weight: 700; position: absolute; left: 220px; top: 743px; width: 182px; align-items: center; justify-content: flex-start;">
                    Total Deductions
                </div>
                <div style="color: #000000; text-align: left; font-weight: 700; position: absolute; left: 482px; top: 743px; width: 150px; align-items: center; justify-content: flex-start;">
                    : Rp. {{ number_format($data->total_deduc ?? 0, 0, ',', '.') }}
                </div>
                <div style="color: #000000; text-align: left; font-weight: 700; position: absolute; left: 220px; top: 764px; width: 182px; align-items: center; justify-content: flex-start;">
                    Net Payment
                </div>
                <div style="color: #000000; text-align: left; font-weight: 700; position: absolute; left: 482px; top: 764px; width: 150px; align-items: center; justify-content: flex-start;">
                    : Rp. {{ number_format($data->take_pay ?? 0, 0, ',', '.')  }}
                </div>
                <div style="color: #000000; text-align: left; font-weight: 700; position: absolute; left: 57px; top: 785px; align-items: center; justify-content: flex-start;">
                    PAYMENT DETAIL
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 57px; top: 798px; width: 96px; align-items: center; justify-content: flex-start;">
                    Name of Bank
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 57px; top: 811px; align-items: center; justify-content: flex-start;">
                    PT. Bank Mandiri
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 198px; top: 798px; width: 96px; align-items: center; justify-content: flex-start;">
                    Account Number
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 198px; top: 811px; width: 96px; align-items: center; justify-content: flex-start;">
                    {{ $data->user->bank_account ?? '0'}}
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 339px; top: 798px; width: 96px; align-items: center; justify-content: flex-start;">
                    Amount
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 339px; top: 811px; width: 96px; align-items: center; justify-content: flex-start;">

                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 480px; top: 798px; width: 96px; align-items: center; justify-content: flex-start;">
                    Currency
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 480px; top: 811px; width: 96px; align-items: center; justify-content: flex-start;">
                    IDR.
                </div>
                <div style="background: #ffffff; border-style: dashed; border-color: #000000; border-width: 1px; width: 608px; height: 15px; position: absolute; left: 52px; top: 825px;"></div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 57px; top: 828px; align-items: center; justify-content: flex-start;">
                    Take Home Pay
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 488px; top: 828px; width: 144px; align-items: center; justify-content: flex-start;">
                    : IDR. <b>{{ number_format($data->take_pay ?? 0, 0, ',', '.')}}</b>
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 52px; top: 845px; align-items: center; justify-content: flex-start;">
                    Prepared and verified by
                </div>
                <div style="color: #000000; text-align: left; font-weight: 400; position: absolute; left: 52px; top: 857px; align-items: center; justify-content: flex-start;">
                    HR Department
                </div>
                <img class="whats-app-image-2023-12-27-at-08-21-2" style="width: 78px; height: 78px; position: absolute; left: 53px; top: 879px; object-fit: cover;" src="{{ 'data:image/png;base64,' . base64_encode(file_get_contents(public_path('storage/images/QRCodes/' . $data->qrpayslip->qrcode))) }}" />
                <div style="background: rgba(255, 255, 255, 0); border-radius: 5px; border-style: solid; border-color: #000000; border-width: 1px; width: 68px; height: 68px; position: absolute; left: 57px; top: 883px;"></div>
            </div>
        </div>
    </div>
</body>

</html>
