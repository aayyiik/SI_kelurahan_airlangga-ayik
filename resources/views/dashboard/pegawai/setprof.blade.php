@extends('templates.master')
@section('content')



<main id="main" class="main">

    <!-- Page Heading -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item">Pages</li>
        <li class="breadcrumb-item active">Edit Profil</li>
      </ol>

      @if ($message = Session::get('update'))
      <div class="alert alert-warning" role="alert">
          <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>{{ $message }}</strong>
        </i>
        </div>
      @endif

      <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary"> Form Ubah Data Pegawai </h6>
                </div>
                <!-- Card Body -->
            <form action="/profile/{{ Auth::user()->nik_nip }}/update" method="POST">
                @csrf
                <div class="card-body">

                    <div class="form-group">
                        <input class="form-control" type="hidden" name="id_kelurahan"  value="{{ $user->id_kelurahan }}">
                    </div>

                    <div class="form-group">
                        <label>NIK / NIP</label>
                        <input class="form-control" type="text" name="nik_nip"  value="{{ $user->nik_nip }}" readonly="">
                    </div>

                    <div class="form-group">
                        <label>Jabatan</label>
                        <select class="form-control" name="id_jabatan" disabled="">
                            @foreach($jabatan as $item)
                                <option value="{{ $item->id_jabatan }}" {{ $item->id_jabatan == $user->id_jabatan ? 'selected' : '' }} >{{ $item->nama_jabatan }} </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status" disabled="" >
                            <option value="1" {{ $user->status == 1 ? 'selected' : '' }} >PNS</option>
                            <option value="2"{{ $user->status == 2 ? 'selected' : '' }} >Non-PNS</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>NAMA</label>
                        <input class="form-control {{ $errors->has('nama') ? ' is-invalid' : '' }}" name="nama" type="text" value="{{ $user->nama }}">
                        @if($errors->has('nama'))
                            <span class="invalid-feedback">{{ $errors->first('nama') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select class="form-control" name="jenis_kelamin" >
                            <option value="1" {{ $user->jenis_kelamin == 1 ? 'selected' : '' }} >Laki-Laki</option>
                            <option value="2"{{ $user->jenis_kelamin == 2 ? 'selected' : '' }} >Perempuan</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <input class="form-control {{ $errors->has('alamat') ? ' is-invalid' : '' }}" name="alamat" type="text" value="{{ $user->alamat }}">
                        @if($errors->has('alamat'))
                            <span class="invalid-feedback">{{ $errors->first('alamat') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>No Telp</label>
                        <input class="form-control {{ $errors->has('no_telp') ? ' is-invalid' : '' }}" name="no_telp" type="text" value="{{ $user->no_telp }}">
                        @if($errors->has('no_telp'))
                            <span class="invalid-feedback">{{ $errors->first('no_telp') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" name="email" value="{{ $user->email }}" type="email">
                    </div>

                    {{-- form password yang tidak diperlihatkan --}}
                    <div class="form-group">
                        <input class="form-control" name="password" value="{{ $user->password }}" type="hidden">
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Ubah Profil</button>
            </div>
        </form>
    </div>
</div>

        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary"> Data Pegawai </h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <ul>
                        <li>
                            <span>NIk / NIP :</span>
                        {{ Auth::user()->nik_nip }}
                        </li>
                        <li>
                            <span>Nama :</span>
                            {{ Auth::user()->nama }}
                        </li>
                        <li>
                            <span>Jabatan :</span>
                            {{ Auth::user()->jabatan->nama_jabatan }}
                        </li>
                        <li>
                            <span>Status Pekerja :</span>
                            @if (Auth::user()->status == 1 )
                                PNS
                            @else
                                Non-PNS
                            @endif
                        </li>
                        <li>
                            <span>Alamat :</span>
                            {{ Auth::user()->alamat }}
                        </li>
                        <li>
                            <span>No telp :</span>
                            {{ Auth::user()->no_telp }}
                        </li>
                        <li>
                            <span>Jenis Kelamin:</span>
                            @if (Auth::user()->jenis_kelamin == 1) Laki-Laki 
                            @else Perempuan
                            @endif
                 
                        </li>
                        <li>
                            <span>Email :</span>
                            {{ Auth::user()->email }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection