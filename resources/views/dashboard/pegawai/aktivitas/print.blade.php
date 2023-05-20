@extends('templates.master')
@section('content')

{{-- composer require barryvdh/laravel-dompdf --ignore-platform-reqs --}}

    <main id="main" class="main">

    <!-- Page Heading -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item">Pages</li>
        <li class="breadcrumb-item active">Print Aktivitas</li>
    </ol>

        <!-- Alert notifikasi -->
                 
    <div class="card shadow mb-4">
       <div class="card-body">
        <div class="panel-body">
            <form method="GET" action="" enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                    <label for="tgl_awal">Tanggal Awal</label>
                    <input type="date" class="form-control" id="tgl_awal" name="tgl_awal" value=""
                        required>
                    @error('tgl_awal')
                    <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="tgl_akhir">Tanggal Akhir</label>
                    <input type="date" class="form-control" id="tgl_akhir" name="tgl_akhir" value=""
                        required>
                    @error('tgl_akhir')
                    <div class="error">{{ $message }}</div>
                    @enderror
                </div>


                <button type="submit" class="btn btn-default">Cari</button>
                <a class="btn btn-info" href="">Reset</a>
            </form>
        </div>
    </div>
</div>

@if($displayLaporan->isNotEmpty())
<form action="/cetak_laporan/{{ $tgl_awal }}/{{ $tgl_akhir }}" method="GET" target="_blank" enctype="multipart/form-data" >
    @csrf
    @foreach ($displayLaporan as $display)
    <input type="hidden" name="no_pegawai[]" value="{{ $display }}">

    @endforeach

    <div class="form-group row">
        <label class="col-sm-12 col-md-4 col-form-label">Tanggal Mulai</label>
        <div class="col-sm-12 col-md-12">
          <input class="form-control" type="date" name="tgl_mulai"  placeholder="Masukkan tanggal mulai aktivitas pada bulan yang akan dicetak" required="">
        </div>
    </div>
    
    <div class="form-group row">
        <label class="col-sm-12 col-md-4 col-form-label">Nomor</label>
        <div class="col-sm-12 col-md-12">
          <input class="form-control" type="text" name="nomor"  placeholder="Masukkan Nomor" required="">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-12 col-md-4 col-form-label">Bulan</label>
        <div class="col-sm-12 col-md-12">
          <input class="form-control" type="text" name="bulan"  placeholder="Masukkan Bulan Aktivitas yang ingin dicetak" required="">
        </div>
    </div>
      
    <button type="submit" class="btn btn-primary">Cetak Laporan</button>
    
</form>
<br><br>
@endif

<div class="row">
    <div class="col-md-12">
        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
            {{ session()->get('success') }}
        </div>
        @endif

        <div class="panel panel-primary">
            <!-- Default panel contents -->
            <div class="panel-heading text-center">Data Aktivitas Pegawai</div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Aktivitas</th>
                                <th>Tanggal</th>
                                <th>Foto</th>
                            </tr>
                        </thead>
                            @if ($displayLaporan->isNotEmpty())
                            <tbody>
                                @foreach ($displayLaporan as $display)
                                <tr>
                                    <td>{{ $display->id_aktivitas }}</td>
                                    <td>{{ $display->nama_aktivitas }}</td>
                                    <td>{{ $display->tanggal }}</td>
                                    <td><img src="{{ asset('assets/img/log/'.$display->foto) }}" width="120px" height="120px" alt="image"></td>
                                </tr>
                                @endforeach
                            </tbody>
                            @endif
                        
                      </table>
                </div>
                
            </div>
        </div>
    </div>
</div>

</main>

@endsection