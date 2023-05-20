@extends('templates.master')
@section('content')


     <main id="main" class="main">

        <!-- Page Heading -->
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item">Pages</li>
            <li class="breadcrumb-item active">Edit Kegiatan {{ $kegiatan->nama_kegiatan }}</li>
          </ol>

              <!-- Alert notifikasi -->
                 
                  <div class="card shadow mb-4">
                      
                      <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Nama Admin</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" name="no_admin" value=" {{ $kegiatan->no_admin }} - {{ $kegiatan->user->nama }}" readonly>
                            </div>
                        </div>

                        <form action="/daftar_kegiatan/{{ $kegiatan->id_kegiatan }}/update" method="POST">
                        @csrf
                   
                            <input class="form-control" type="hidden" name="no_admin" value="{{ $kegiatan->no_admin }}" >
                            

                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Nama kegiatan</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" type="text" name="nama_kegiatan" value="{{ $kegiatan->nama_kegiatan }}" required="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Tanggal</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" type="datetime-local" name="tanggal" value="{{ $kegiatan->tanggal }}" required="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Penyelenggara</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" type="text" name="penyelenggara" value="{{ $kegiatan->penyelenggara }}" required="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Jenis Peserta</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" type="text" name="jenis_peserta" value="{{ $kegiatan->jenis_peserta }}" required="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Tempat</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" type="text" name="tempat" value="{{ $kegiatan->tempat }}" required="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Kategori</label>
                                <div class="col-sm-12 col-md-10">
                                    <select class="custom-select col-12" name="kategori" required="">
                                            <option value="1" {{($kegiatan->kategori ==1) ? 'selected' : ''}} >Kegiatan Internal/Dalam Kelurahan</option>
                                            <option value="2"{{($kegiatan->kategori ==2) ? 'selected' : ''}}>Kegiatan Eksternal/Luar</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Deskripsi</label>
                                <div class="col-sm-12 col-md-10">
                                    <textarea name="deskripsi" class="form-control " id="exampleFormControlTextarea3" rows="5" >{{ $kegiatan->deskripsi }}</textarea>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary float-right">Perbarui</button>
                        </form>
                      </div>
                  </div>
</main>


@endsection