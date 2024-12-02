@extends('layouts.header-sidebar')

@section('content1')
<style>
.card-title{
    padding: 10px 0 0 0;
    font-size: 20px;
}
.card-body{
    font-family: "Nunito", sans-serif;
}
</style>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <h5 class="card-title text-center">Change Password</h5>
            </div>
        </div>
    </div>
    <div class="card-body pt-3">
        {{-- Simple Alert --}}
        {{-- @if (session('status'))
            <div id="status-alert" class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @elseif (session('error'))
            <div id="status-alert" class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif --}}

        <!-- Change Password Form -->
        <form action="{{ route('update.password') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                <div class="col-md-8 col-lg-9">
                    <input name="current_password" type="password" class="form-control" id="currentPassword" placeholder="Current Password">
                </div>
                @error('current_password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="row mb-3">
                <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                <div class="col-md-8 col-lg-9">
                    <input name="new_password" type="password" class="form-control" id="newPassword" placeholder="New Password">
                        @error('new_password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>

            </div>
            <div class="row mb-3">
                <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Confirm New Password</label>
                <div class="col-md-8 col-lg-9">
                    <input name="new_password_confirmation" type="password" class="form-control" id="renewPassword" placeholder="Confirm Password">
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Change Password</button>
            </div>
        </form>
            <!-- End Change Password Form -->
  </div>
</div>
<script>
    setTimeout(function() {
            document.getElementById('status-alert').style.display = 'none';
    }, 5000);

</script>
@endsection
