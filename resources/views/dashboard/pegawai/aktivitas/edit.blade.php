@extends('templates.master')
@section('content')


     <main id="main" class="main">

        <!-- Page Heading -->
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item">Pages</li>
            <li class="breadcrumb-item active">Edit Aktivitas {{ $log->nama_aktivitas }}</li>
          </ol>

              <!-- Alert notifikasi -->
                 
                  <div class="card shadow mb-4">
                      
                      <div class="card-body">
                        <form action="/log_aktivitas/{{ $log->id_aktivitas }}/update" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Nama Admin</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" type="text" name="no_pegawai" value="{{ $log->no_pegawai }}" required="" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Nama aktivitas</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" type="text" name="nama_aktivitas" value="{{ $log->nama_aktivitas }}" required="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Tanggal</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" type="datetime-local" name="tanggal" value="{{ $log->tanggal }}" required="">
                                </div>
                            </div>
 
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Foto Aktivitas</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" type="file" name="foto" required="">
                                    <img src="{{ asset('assets/img/log/'.$log->foto) }}" width="100px" height="100px" alt="image" >
                                </div>
                            </div>

                         <button type="submit" class="btn btn-primary float-right">Perbarui</button>
                        </form>
                      </div>
                  </div>
</main>


@endsection