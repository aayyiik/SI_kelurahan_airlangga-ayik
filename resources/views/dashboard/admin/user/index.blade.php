@extends('templates.master')
@section('content')
    
<main id="main" class="main">

    <!-- Page Heading -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item">Pages</li>
        <li class="breadcrumb-item active">user</li>
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
            <h6 class="m-0 font-weight-bold text-primary">Data Pegawai Kelurahan</h6>
            <a href="" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#Medium-modal" type="button">
                Tambah Data
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIP/NIK</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Kelurahan</th>
                            <th>Alamat</th>
                            <th>No telp</th>
                            <th>Email</th>  
                            <th>Status</th>                        
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach ($user as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->nik_nip }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>
                                <span class="badge badge-primary">{{ $item->jabatan->nama_jabatan }}</span>
                            </td>
                            <td>{{ $item->kelurahan->nama_kelurahan}}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>{{ $item->no_telp }}</td>
                            <td>{{ $item->email }}</td>
                        @if ($item->status==1)
                            <td><span class="badge badge-success">PNS</span></td>
                        @else
                            <td><span class="badge badge-secondary">Non-PNS</span></td>
                        @endif
                           
                                <td>
                                    <a href="/daftar_pegawai/{{ $item->nik_nip }}/edit" class="btn-sm btn-warning "><i class="fas fa-fw fa-edit"></i></a>
                                    <a href="/daftar_pegawai/{{ $item->nik_nip }}/delete" class="btn-sm btn-danger "><i class="fas fa-fw fa-trash"></i></a>
                                </td>
                        </tr>
                        @endforeach
                    </tbody>
                    
                </table>
            </div>
        </div>
    </div> 
</main>

<div class="modal fade" id="Medium-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myLargeModalLabel">Tambah Daftar Kegiatan Baru</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>

      <div class="modal-body">
        <form action="/daftar_pegawai/create" method="POST">
            @csrf
            <div class="form-group">
                <label>Kelurahan</label>
                <input type="text" class="form-control" placeholder="Kelurahan Airlangga" disabled="">
            </div>
                
              <div class="form-group row">
                <label class="col-sm-12 col-md-6 col-form-label">No Identitas (NIK/NIP)</label>
                <div class="col-sm-12 col-md-12">
                  <input class="form-control " type="text" name="nik_nip"  
                  placeholder="Masukkan No Identitas(NIK/NIP)" >
           
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-12 col-md-4 col-form-label">Nama Lengkap</label>
                <div class="col-sm-12 col-md-12">
                  <input class="form-control " type="text" name="nama" placeholder="Masukkan Nama Jabatan" >
                
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-12 col-md-4 col-form-label">Jabatan</label>
                <div class="col-sm-12 col-md-12">
                <select name="id_jabatan" class="form-control " >
                      <option value="">- Pilih -</option>
                      @foreach ($jabatan as $item)
                      <option value="{{ $item->id_jabatan }} ">{{ $item->nama_jabatan }} </option>
                      @endforeach             
               </select>      
             
                </div>           
            </div>

              <div class="form-group row">
                <label class="col-sm-12 col-md-4 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-12 col-md-12">
                <select name="jenis_kelamin" class="form-control " >
                      <option value="">- Pilih -</option>
                      <option value="1">Laki-laki</option>        
                      <option value="2">Perempuan</option>               
               </select>      
            
                </div>           
            </div>


              <div class="form-group row">
                <label class="col-sm-12 col-md-4 col-form-label">Alamat</label>
                <div class="col-sm-12 col-md-12">
                  <input class="form-control " type="text" name="alamat" 
                   placeholder="Masukkan Alamat">
                  
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-12 col-md-6 col-form-label">No Telp (bisa dihubungi)</label>
                <div class="col-sm-12 col-md-12">
                  <input class="form-control " type="text" name="no_telp" 
                  placeholder="Masukkan No telp" >
              
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-12 col-md-4 col-form-label">Status Pegawai</label>
                <div class="col-sm-12 col-md-12">
                <select name="status" class="form-control" > 
                      <option value="">- Pilih Status -</option>
                      <option value="1">PNS</option>        
                      <option value="2">Non-PNS</option>               
               </select>        
             
                </div>           
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
