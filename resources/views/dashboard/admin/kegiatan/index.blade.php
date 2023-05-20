@extends('templates.master')
@section('content')
    
<main id="main" class="main">

    <!-- Page Heading -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item">Pages</li>
        <li class="breadcrumb-item active">Daftar kegiatan</li>
      </ol>

      <!-- Alert notifikasi -->
      @if ($message = Session::get('sukses'))
      <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>{{ $message }}</strong>
        </div>
      @endif

      @if ($message = Session::get('update'))
      <div class="alert alert-warning" role="alert">
          <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>{{ $message }}</strong>
        </i>
        </div>
      @endif

      @if ($message = Session::get('hapus'))
      <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>{{ $message }}</strong>
        </div>
      @endif
      
     <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data kegiatan Acara Kelurahan Airlangga</h6>
            <a href="" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#Medium-modal" type="button">
                Tambah Data
            </a>
        </div>
        <!--table start-->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kegiatan</th>
                            <th>Tanggal</th>
                            <th>Tempat</th>
                            <th>Kategori Kegiatan</th>
                            <th>Penyelenggara</th>
                            <th>Jenis Peserta</th>
                            <th>Deskripsi</th>               
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach ($kegiatan as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->nama_kegiatan }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                            <td>{{ $item->tempat }}</td>
                          @if ($item->kategori == 1)
                            <td>Kegiatan Internal/Dalam Kelurahan</td>
                          @else
                            <td>Kegiatan Eksternal/Luar Kelurahan</td> 
                          @endif
                            <td>{{ $item->penyelenggara }}</td>
                            <td>{{ $item->jenis_peserta }}</td>
                            <td>{{ $item->deskripsi }}</td>
                            <td>
                                <a href="/daftar_kegiatan/{{ $item->id_kegiatan }}/edit" class="btn-sm btn-warning "><i class="fas fa-fw fa-edit"></i></a>
                                <a href="/daftar_kegiatan/{{ $item->id_kegiatan }}/delete" class="btn-sm btn-danger "><i class="fas fa-fw fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
        <!--End table-->
    </div> 
</main>



<!-- modal -->

<div class="modal fade" id="Medium-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myLargeModalLabel">Tambah Daftar Kegiatan Baru</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
  
        <div class="modal-body">
          <div class="form-group row">
            <label class="col-sm-12 col-md-4 col-form-label">Nama Admin</label>
            <div class="col-sm-12 col-md-12">
              <input class="form-control {{ $errors->has('no_admin') ? ' is-invalid' : '' }}" type="text" name="no_admin" value="{{ Auth::user()->nik_nip }} - {{ Auth::user()->nama }}" placeholder="Masukkan Nama Jabatan" disabled="">
            </div>
          </div>

          <form action="/daftar_kegiatan/create" method="POST">
            @csrf

              <input class="form-control" type="hidden" name="no_admin" value="{{ Auth::user()->nik_nip }}" placeholder="Masukkan Nama Jabatan" >


              <div class="form-group row">
                <label class="col-sm-12 col-md-4 col-form-label">Nama Kegiatan</label>
                <div class="col-sm-12 col-md-12">
                  <input class="form-control {{ $errors->has('nama_kegiatan') ? ' is-invalid' : '' }}" type="text" name="nama_kegiatan" placeholder="Masukkan Nama Jabatan">
                  @if($errors->has('nama_kegiatan'))
                    <span class="invalid-feedback">{{ $errors->first('nama_kegiatan') }}</span>
                  @endif
                </div>  
              </div>

              <div class="form-group row">
                <label class="col-sm-12 col-md-4 col-form-label">Tanggal</label>
                <div class="col-sm-12 col-md-12">
                  <input class="form-control {{ $errors->has('tanggal') ? ' is-invalid' : '' }}" type="datetime-local" name="tanggal" placeholder="Masukkan Nama Jabatan">
                  @if($errors->has('tanggal'))
                    <span class="invalid-feedback">{{ $errors->first('tanggal') }}</span>
                  @endif
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-12 col-md-4 col-form-label">Penyelenggara</label>
                <div class="col-sm-12 col-md-12">
                  <input class="form-control {{ $errors->has('penyelenggara') ? ' is-invalid' : '' }}" type="text" name="penyelenggara" placeholder="Masukkan Lembaga Penyelenggara">
                  @if($errors->has('penyelenggara'))
                    <span class="invalid-feedback">{{ $errors->first('penyelenggara') }}</span>
                  @endif
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-12 col-md-4 col-form-label">Jenis Peserta</label>
                <div class="col-sm-12 col-md-12">
                  <input class="form-control{{ $errors->has('jenis_peserta') ? ' is-invalid' : '' }}" type="text" name="jenis_peserta" placeholder="Masukkan Peserta">
                  @if($errors->has('jenis_peserta'))
                    <span class="invalid-feedback">{{ $errors->first('jenis_peserta') }}</span>
                  @endif
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-12 col-md-4 col-form-label">Kategori</label>
                <div class="col-sm-12 col-md-12">
                <select name="kategori" class="form-control {{ $errors->has('kategori') ? ' is-invalid' : '' }}">
                      <option value="">- Pilih Kategori-</option>
                      <option value="1">Kegiatan Internal/Dalam Kelurahan</option>        
                      <option value="2">Kegiatan Eksternal/Luar</option>               
               </select>        
                @if($errors->has('kategori'))
                  <span class="invalid-feedback">{{ $errors->first('kategori') }}</span>
                @endif  
              </div>           
            </div>

              <div class="form-group row">
                <label class="col-sm-12 col-md-4 col-form-label">Tempat</label>
                <div class="col-sm-12 col-md-12">
                  <input class="form-control {{ $errors->has('tempat') ? ' is-invalid' : '' }}" type="text" name="tempat" placeholder="Masukkan Nama Tempat">
                  @if($errors->has('tempat'))
                    <span class="invalid-feedback">{{ $errors->first('tempat') }}</span>
                  @endif
                </div>
              </div>

            <div class="form-group">
              <label for="exampleFormControlTextarea3">Deskripsi</label>
              
              <textarea class="form-control" name="deskripsi" id="exampleFormControlTextarea3"  >

              </textarea>
            </div>

         

            </div> 
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
        </form>
      </div>
    </div>
  </div>
@endsection