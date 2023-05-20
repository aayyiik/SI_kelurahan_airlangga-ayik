@extends('templates.master')
@section('content')


     <main id="main" class="main">

        <!-- Page Heading -->
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item">Pages</li>
            <li class="breadcrumb-item active">Edit Data Pegawai {{ $user->nama_user }}</li>
          </ol>

              <!-- Alert notifikasi -->
                 
                  <div class="card shadow mb-4">
                      
                      <div class="card-body">
                        <form action="/daftar_pegawai/{{ $user->nik_nip }}/update" method="POST">
                        @csrf

                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Nama Pegawai</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" type="disbale" name="nama" value="{{ $user->nama }}" readonly>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">NIK/NIP</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" type="text" name="nik_nip" value="{{ $user->nik_nip }}" required="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Status</label>
                                <div class="col-sm-12 col-md-10">
                                    <select class="custom-select col-12" name="status" required="">
                                            <option value="1" {{ $user->status == 1 ? 'selected' : '' }} >PNS</option>
                                            <option value="2"{{ $user->status == 2 ? 'selected' : '' }} >Non-PNS</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Jabatan</label>
                                <div class="col-sm-12 col-md-10">
                                    <select class="custom-select col-12" name="id_jabatan" required="">
                                        @foreach($jabatan as $item)
                                            <option value="{{ $item->id_jabatan }}" {{ $item->id_jabatan == $user->id_jabatan ? 'selected' : '' }}>{{ $item->nama_jabatan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <input class="form-control" type="hidden" name="id_kelurahan" value="{{ $user->id_kelurahan }}">
                            <input class="form-control" type="hidden" name="jenis_kelamin" value="{{ $user->jenis_kelamin }}">                   
                            <input class="form-control" type="hidden" name="alamat" value="{{ $user->alamat }}">
                            <input class="form-control" type="hidden" name="no_telp" value="{{ $user->no_telp }}">
                            <input class="form-control" type="hidden" name="email" value="{{ $user->email }}">
                            {{-- <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Status</label>
                                <div class="col-sm-12 col-md-10">
                                    <select class="custom-select col-12" name="id_status">
                                        @foreach ($status as $st)
                                        <option value="{{ $st->id_status }}" {{ $st->id_status == $kegiatan->id_status ? 'selected' : '' }} > {{ $st->id_status }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> --}}
                            <button type="submit" class="btn btn-primary float-right">Perbarui</button>
                        </form>
                      </div>
                  </div>
</main>


@endsection