@extends('templates.master')
@section('content')

       <main id="main" class="main">
          <!-- Page Heading -->
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item">Pages</li>
                        <li class="breadcrumb-item active">Aktiviitas</li>
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
{{-- 
                        <div class="col-lg-12 mb-4">
                            <div class="card bg-primary text-white shadow">
                                <div class="card-body">
                                    <p>
                                        NAMA    : {{ Auth::user()->nama }}
                                    </p>
                                    <p>
                                        NIP     : {{ Auth::user()->nik_nip }}
                                    </p>
                                    <p>
                                        JABATAN : {{ Auth::user()->jabatan->nama_jabatan }}
                                    </p>

                                </div>
                            </div>
                        </div>

                       --}}


                     <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Aktivitas Hari ini</h6>

                            {{-- authentitakasi tambah data untuk pegawai --}}
                            @if(auth()->user()->id_jabatan !='14')
                            <a href="" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#Medium-modal" type="button">
                                Tambah Data
                            </a>
                            @endif
                            {{-- endauth --}}

                        </div>
                        
                        <div class="card-body">
                         <div class="table-responsive">
                                <table class="table table-bordered" width="100%" cellspacing="0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Nama Aktivitas</th>
                                            <th>Foto Aktivitas</th>
                                            @if(auth()->user()->id_jabatan !='14')
                                              <th>Aksi</th>
                                            @endif
                                        </tr>
                                    </thead>
                                @if(auth()->user()->id_jabatan == '14')
                                    @php $no = 1; @endphp
                                    @foreach ($aktivitas as $item)
                                    <tbody>
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                                            <td>{{ $item->nama_aktivitas }}</td>
                                            <td>
                                              <img src="{{ asset('assets/img/log/'.$item->foto) }}" width="120px" height="120px" alt="image">
                                            </td>
                                            @if(auth()->user()->id_jabatan !='14')
                                              <td>
                                                  <a href="/log_aktivitas/{{ $item->id_aktivitas }}/edit" class="btn-sm btn-warning "><i class="fas fa-fw fa-edit"></i></a>
                                                  <a href="/log_aktivitas/{{ $item->id_aktivitas }}/delete" class="btn-sm btn-danger "><i class="fas fa-fw fa-trash"></i></a>
                                              </td>
                                            @endif
                                        </tr>
                                        @endforeach
                                    </tbody>
                                

                                    @else

                                    @php $no = 1; @endphp
                                    
                                    <tbody>
                                      @foreach ($lihatAktivitas as $item)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y H:i:s') }}</td>
                                            <td>{{ $item->nama_aktivitas }}</td>
                                            <td>
                                              <img src="{{ asset('assets/img/log/'.$item->foto) }}" width="100px" height="100px" alt="image">
                                            </td>
                                            <td>
                                                <a href="/log_aktivitas/{{ $item->id_aktivitas }}/edit" class="btn-sm btn-warning "><i class="fas fa-fw fa-edit"></i></a>
                                                <a href="/log_aktivitas/{{ $item->id_aktivitas }}/delete" class="btn-sm btn-danger "><i class="fas fa-fw fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                  
                                  @endif
                                </table>
                             
                            </div>
                          
                        
                        </div>
                        
                    </div>
                </main>


<!-- modal -->

<div class="modal fade" id="Medium-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myLargeModalLabel">Tambah Daftar Aktivitas Baru</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
  
        <div class="modal-body">
          <form action="/log_aktivitas/create" method="POST" enctype="multipart/form-data">
            @csrf

            
            <div class="form-group row">
              <label class="col-sm-12 col-md-4 col-form-label">Nama Pegawai</label>
              <div class="col-sm-12 col-md-12">
                <input class="form-control" type="text" name="no_pegawai" value="{{ Auth::user()->nik_nip }} - {{ Auth::user()->nama }}" readonly>
              </div>
            </div>

          
              <div class="form-group row">
                <label class="col-sm-12 col-md-4 col-form-label">Nama Aktivitas</label>
                <div class="col-sm-12 col-md-12">
                  <input class="form-control" type="text" name="nama_aktivitas"  placeholder="Masukkan Deskripsi Aktivitas" required="" >
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-12 col-md-4 col-form-label">Tanggal</label>
                <div class="col-sm-12 col-md-12">
                  <input class="form-control" type="datetime-local" name="tanggal" value="{{ Auth::user()->nik_nip }} - {{ Auth::user()->nama }}"  placeholder="Masukkan Nama Pegawai" disable="">
                </div>
              </div>
           
                <label class="form-label" for="customFile">Foto Aktivitas (JPG, PNG, JPEG)</label>
                  <input type="file" class="form-control" id="customFile" name="foto" required=""/>
  
            </div> 
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
        </form>
      </div>
    </div>
  </div>

@endsection
