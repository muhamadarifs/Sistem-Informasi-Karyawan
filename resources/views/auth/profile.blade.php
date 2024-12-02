@extends('layouts.header-sidebar')

@section('content1')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.css" integrity="sha512-zxBiDORGDEAYDdKLuYU9X/JaJo/DPzE42UubfBw9yg8Qvb2YRRIQ8v4KsGHOx2H1/+sdSXyXxLXv5r7tHc9ygg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    .card{
        font-family: "Nunito", sans-serif;
        font-size: 16px;
    }
    .label{
        font-family: "Nunito", sans-serif;
    }
    .filter{
        margin-top: auto!important;
    }
    .col{
        margin-top: -5px;
        margin-bottom: -10px;
    }
    .card-title
    {
        padding: 0;
        font-size: 20px;
    }
    .customY{
        padding: 5px;
    }
    .sign-span
    {
        font-size: 16px;
    }
    .rounded {
        border-radius: 10px;
    }
    .swal-title {
        font-family: "Nunito", sans-serif ;
    }
    .alert svg {
        width: 1em;
        height: 1em;
        vertical-align: middle;
        fill: currentColor;
    }
    .alert .icon-wrapper {
        display: flex;
        align-items: center;
    }
</style>
<section class="section profile">
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
        <symbol id="exclamation-triangle-fill" viewBox="0 0 16 16">
          <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </symbol>
      </svg>
    @if (is_null(Auth::user()->file_ktp))
        <div class="alert alert-warning d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
            <div>You haven't added an ID card file.</div>
        </div>
    @endif
    @if (is_null(Auth::user()->bpjs_filelinks))
        <div class="alert alert-warning d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
            <div>You haven't added the BPJS Health Care file.</div>
        </div>
    @endif
    @if (is_null(Auth::user()->bpjstk_filelinks))
        <div class="alert alert-warning d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
            <div>You haven't added the BPJS Employee file.</div>
        </div>
    @endif
    <div class="row">
      <div class="col-xl-4">
        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
            @if(Auth::user()->image)
            <img class="image rounded-circle" src="{{asset('/storage/images/UserProfile/'. Auth::user()->image)}}" alt="profile_image" style="width: 80px;height: 80px; padding: 10px; margin: 0px; ">
            @endif
            <h2 class="customY">{{ Auth()->user()->name }}</h2>
            <h3 class="customY">{{ Auth()->user()->position_name ?? '-'}}</h3>
          </div>
        </div>
        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
            @if($sign)
                <img class="image" src="{{ asset('storage/images/Sign/'. $sign->sign) }}" alt="Sign_image" style="width: 100px;height: auto; padding: 5px; margin: 0px; ">
                <span class="sign-span">Your signature has been uploaded.</span>
                <a href="" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#sign">Update Signature</a>
            @else
                <p>No signature set.</p>
                <a href="" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#sign">Upload Signature</a>
            @endif
            <div class="modal fade" id="sign" tabindex="-1" aria-labelledby="signLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="signLabel">Upload Your Sign</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('sign.store')}}" method="POST"  enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input type="file" name="sign" id="">
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                      </div>
                    </form>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
        <div class="col-xl-8">
            <div class="card">
                <ul class="nav nav-tabs nav-tabs-bordered">
                    <li class="nav-item">
                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('change.password')}}" class="nav-link">Password</a>
                    </li>
                </ul>
                <div class="card-body pt-3">
                    <div class="tab-content pt-2">
                        <!-- profile overview -->
                        <div class="tab-pane fade show active profile-overview" id="profile-overview">
                            <div class="row">
                                <div class="col-md-4 col-4 label">NIK ( KTP )</div>
                                <div class="col-md-8 col-8">: {{ Auth::user()->nik }}
                                    @if (Auth::user()->file_ktp)
                                        <a href="{{ Auth::user()->file_ktp }}" target="_blank">Click Here to Open.</a> Or
                                        <a href="#" id="uploadLink" data-bs-toggle="modal" data-bs-target="#uploadandupdatektpfile" >Update</a>
                                    @else
                                        <a href="#" id="uploadLink" data-bs-toggle="modal" data-bs-target="#uploadandupdatektpfile">Upload</a>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-4 label">BPJS Health Care</div>
                                <div class="col-md-8 col-8">: {{Auth::user()->bpjs_kesehatan ?? ''}} -
                                    @if (Auth::user()->bpjs_filelinks)
                                        <a href="{{ Auth::user()->bpjs_filelinks }}" target="_blank">Click Here to Open.</a> Or
                                        <a href="#" id="uploadLink" data-bs-toggle="modal" data-bs-target="#uploadandupdate" >Update</a>
                                    @else
                                        <a href="#" id="uploadLink" data-bs-toggle="modal" data-bs-target="#uploadandupdate">Upload</a>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-4 label">BPJS Employee</div>
                                <div class="col-md-8 col-8">: {{Auth::user()->bpjs_tk ?? ''}} -
                                    @if (Auth::user()->bpjstk_filelinks)
                                        <a href="{{ Auth::user()->bpjstk_filelinks }}" target="_blank">Click Here to Open.</a> Or
                                        <a href="#" id="uploadLinkbpjstk" data-bs-toggle="modal" data-bs-target="#uploadupdateBpjs">Update</a>
                                    @else
                                        <a href="#" id="uploadLinkbpjstk" data-bs-toggle="modal" data-bs-target="#uploadupdateBpjs">Upload</a>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-4 label">Employee ID</div>
                                <div class="col-md-8 col-8">:  {{Auth::user()->employee_id}}</div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-4 label">Name</div>
                                <div class="col-md-8 col-8">: {{Auth::user()->name}}</div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-4 label">Place and Date of Birth</div>
                                <div class="col-md-8 col-8">: {{Auth::user()->tempat_lahir}}, {{ \Carbon\Carbon::parse(Auth()->user()->tgl_lahir)->format('d M Y') }}</div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-4 label">Gender</div>
                                <div class="col-md-8 col-8">: {{Auth::user()->jenis_kelamin}}</div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-4 label">Phone Number</div>
                                <div class="col-md-8 col-8">: {{Auth::user()->telp}}</div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-4 label">Emergency Number</div>
                                <div class="col-md-8 col-8">: {{ Auth::user()->emergency_contact ?? '0'}}</div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-4 label">Email</div>
                                <div class="col-md-8 col-8">: {{ Auth::user()->email }}</div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-4 label">Address</div>
                                <div class="col-md-8 col-8">: {{ Auth::user()->alamat }}</div>
                            </div>
                            <div class="col" style="text-align: center;">
                                <a href="{{ route ('detailsProfile')}}" class="btn btn-primary mt-3"><i class="fa-regular fa-eye" style="margin-right: 5px;"></i>Details</a>
                            </div>
                            <!-- upload link file KTP-->
                            <div class="modal fade" id="uploadandupdatektpfile" tabindex="-1" aria-labelledby="uploadandupdatektpfileLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="uploadandupdatektpfileLabel">Upload KTP</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('store.KtpFile', ['id' => $user->id]) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <label for="links" class="form-label">Input Your Link here <i class="fa-solid fa-link"></i></label>
                                            <input type="text" name="file_ktp" class="form-control mb-3" id="links" placeholder="https://drive.google.com/......">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- upload & update links BPJS Health Care-->
                            <div class="modal fade" id="uploadandupdate" tabindex="-1" aria-labelledby="uploadandupdateLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="uploadandupdateLabel">Upload BPJS Health Care</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('store.BPJShealth', ['id' => $user->id])}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <label for="links" class="form-label">Input Your Link here <i class="fa-solid fa-link"></i></label>
                                            <input type="text" name="bpjs_filelinks" class="form-control mb-3" id="links" placeholder="https://drive.google.com/......">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- upload links BPJS TK-->
                            <div class="modal fade" id="uploadupdateBpjs" tabindex="-1" aria-labelledby="uploadupdateBpjsLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="uploadupdateBpjsLabel">Upload BPJS Employee</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('store.BPJSemployee', ['id' => $user->id])}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <label for="links" class="form-label">Input Your Link here <i class="fa-solid fa-link"></i></label>
                                            <input type="text" name="bpjstk_filelinks" class="form-control mb-3" id="links" placeholder="https://drive.google.com/......">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- change password -->
                        <div class="tab-pane fade pt-3" id="profile-change-password">
                            <form>
                                <div class="row mb-3">
                                    <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="password" type="password" class="form-control" id="currentPassword">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="newpassword" type="password" class="form-control" id="newPassword">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Change Password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.js" integrity="sha512-vUJTqeDCu0MKkOhuI83/MEX5HSNPW+Lw46BA775bAWIp1Zwgz3qggia/t2EnSGB9GoS2Ln6npDmbJTdNhHy1Yw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>

</script>
@endsection
