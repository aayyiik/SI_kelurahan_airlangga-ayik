@extends('templates.master')
@section('content')

        @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        {{-- @if (session()->has('errors'))
        <div class="alert alert-danger">
            <ul>
                {{session('error')}}
            </ul>
        </div>
    @endif --}}
        @if($errors)
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">{{ $error }}</div>
        @endforeach
        @endif



 <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Reset Password</h6>
    </div>



    <div class="card-body">
        
        <form action="/change_password/{{ Auth::user()->nik_nip }}/update" method="POST" >
            @csrf

            <div class="form-group">
                <label for="new-password" class="col-md-4 control-label">Password Lama</label>

                <div class="col-md-6">
                    <input id="old_password" type="password" class="form-control {{ $errors->has('old_password') ? ' is-invalid' : '' }}" name="old_password" required>

              
                    @if($errors->has('old_password'))
                        <span class="invalid-feedback">{{ $errors->first('old_password') }}</span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="new-password" class="col-md-4 control-label">Password Baru </label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                    @if($errors->has('password'))
                        <span class="invalid-feedback">{{ $errors->first('password') }}</span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="new-password-confirm" class="col-md-4 control-label">Konfirmasi Password</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Ubah Password
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection