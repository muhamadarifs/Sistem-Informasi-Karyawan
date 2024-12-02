@extends('layouts.header-sidebar')

@section('content1')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css">
    <style>
        .card {
            font-family: "Nunito", sans-serif;
            font-size: 16px;
        }

        .card-title {
            font-family: "Nunito", sans-serif;
            padding: 0;
            margin: 0;
        }

        .margin-custom {
            margin-left: 30px;
            margin-top: 10px;
        }

        .bi {
            margin-right: 7px;
        }

        .cust-back {
            margin-top: 10px;
        }

        .border {
            border: 2px solid #080808;
            border-radius: 10px;
            padding: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #f8f9fa;
        }

        @media (max-width: 767px) {
            .margin-custom {
                margin-left: 30px;
            }
        }
    </style>


    <section class="section profile">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Profile Detail</h5>
                </div>
                <div class="card-body pt-3">
                    <div class="tab-content pt-2">
                        <div class="tab-pane fade show active profile-overview" id="profile-overview">
                            <div class="row">
                                <div class="col">
                                    <div class="col-md-3 col-12">NIK (KTP)</div>
                                    <div class="col-md-10 col-12 border"> {{ Auth::user()->nik }}</div>
                                </div>
                                <div class="col">
                                    <div class="col-md-4 col-12">Employee ID</div>
                                    <div class="col-md-10 col-12 border"> {{ Auth::user()->employee_id ?? '-' }}</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="col-md-4 col-12">Name</div>
                                    <div class="col-md-10 col-12 border"> {{ Auth::user()->name }}</div>
                                </div>
                                <div class="col">
                                    <div class="col-md-4 col-12">Position</div>
                                    <div class="col-md-10 col-12 border"> {{ Auth::user()->position->position_code ?? '-' }}
                                        - {{ Auth::user()->position->position_name ?? '-' }}</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="col-md-5 col-12">Place, Date of Birth</div>
                                    <div class="col-md-10 col-12 border"> {{ Auth::user()->tempat_lahir ?? '-' }} ,
                                        {{ Auth()->user()->tgl_lahir ? \Carbon\Carbon::parse(Auth()->user()->tgl_lahir)->format('d - F - Y') : '-' }}
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="col-md-4 col-12">Home Base</div>
                                    <div class="col-md-10 col-12 border"> {{ Auth::user()->home_base ?? '-' }}</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="col-md-4 col-12">Age</div>
                                    <div class="col-md-10 col-12 border"> {{ Auth::user()->umur ?? '-' }}</div>
                                </div>
                                <div class="col">
                                    <div class="col-md-4 col-12">Gender</div>
                                    <div class="col-md-10 col-12 border"> {{ Auth::user()->jenis_kelamin ?? '-' }}</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="col-md-4 col-12">Address</div>
                                    <div class="col-md-10 col-12 border"> {{ Auth::user()->alamat ?? '-' }}</div>
                                </div>
                                <div class="col">
                                    <div class="col-md-4 col-12">Phone Number</div>
                                    <div class="col-md-10 col-12 border"> {{ Auth::user()->telp ?? '-' }}</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="col-md-4 col-12">Mother Name</div>
                                    <div class="col-md-10 col-12 border"> {{ Auth::user()->mother_name ?? '-' }}</div>
                                </div>
                                <div class="col">
                                    <div class="col-md-6 col-12">Family Certificate No</div>
                                    <div class="col-md-10 col-12 border"> {{ Auth::user()->family_certificate_no ?? '-' }}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="col-md-4 col-12">Family Status</div>
                                    <div class="col-md-10 col-12 border"> {{ Auth::user()->status_keluarga ?? '-' }}</div>
                                </div>
                                <div class="col">
                                    <div class="col-md-4 col-12">Child</div>
                                    <div class="col-md-10 col-12 border"> {{ Auth::user()->anak ?? '-' }}</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="col-md-4 col-12">Bank Account</div>
                                    <div class="col-md-10 col-12 border"> {{ Auth::user()->bank_account ?? '-' }}</div>
                                </div>
                                <div class="col">
                                    <div class="col-md-4 col-12">NPWP</div>
                                    <div class="col-md-10 col-12 border"> {{ Auth::user()->npwp ?? '-' }}</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="col-md-4 col-12">BPJS Health Care</div>
                                    <div class="col-md-10 col-12 border"> {{ Auth::user()->bpjs_kesehatan ?? '-' }} </div>
                                </div>
                                <div class="col">
                                    <div class="col-md-5 col-12">BPJS Employment</div>
                                    <div class="col-md-10 col-12 border"> {{ Auth::user()->bpjs_tk ?? '-' }}</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="col-md-4 col-12">Email</div>
                                    <div class="col-md-10 col-12 border"> {{ Auth::user()->email ?? '-' }}</div>
                                </div>
                                <div class="col">
                                    <div class="col-md-4 col-12">Group</div>
                                    <div class="col-md-10 col-12 border"> {{ Auth::user()->group ?? '-' }}</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="col-md-4 col-12">Education</div>
                                    <div class="col-md-10 col-12 border"> {{ Auth::user()->education ?? '-' }}</div>
                                </div>
                                <div class="col">
                                    <div class="col-md-4 col-12">Ras</div>
                                    <div class="col-md-10 col-12 border"> {{ Auth::user()->ras ?? '-' }}</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="col-md-4 col-12">Religion</div>
                                    <div class="col-md-10 col-12 border"> {{ Auth::user()->agama ?? '-' }}</div>
                                </div>
                                <div class="col">
                                    <div class="col-md-4 col-12">Size Baju</div>
                                    <div class="col-md-10 col-12 border"> {{ Auth::user()->size_baju ?? '-' }}</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="col-md-4 col-12">Size Sepatu</div>
                                    <div class="col-md-10 col-12 border"> {{ Auth::user()->size_sepatu ?? '-' }}</div>
                                </div>
                                <div class="col">
                                    <div class="col-md-4 col-12">Date of Hire</div>
                                    <div class="col-md-10 col-12 border">
                                        {{ Auth::user()->date_hire ? date('d-m-Y', strtotime(Auth::user()->date_hire)) : '-' }}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="col-md-4 col-12">Start Contract</div>
                                    <div class="col-md-10 col-12 border">
                                        {{ Auth::user()->contract_start ? date('d-m-Y', strtotime(Auth::user()->contract_start)) : '-' }}
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="col-md-4 col-12">Finish Contract</div>
                                    <div class="col-md-10 col-12 border">
                                        {{ Auth::user()->finish_contract ? date('d-m-Y', strtotime(Auth::user()->finish_contract)) : '-' }}
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                            </div>

                            <div class="card-footer">
                                <div class="text-center cust-back">
                                    <button type="submit" class="btn btn-danger"
                                        onclick="window.location.href='{{ route('showProfile') }}'"><i
                                            class="bi bi-arrow-left-circle-fill"></i>Back</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.js"></script> --}}
        <script></script>
    </section>
@endsection
