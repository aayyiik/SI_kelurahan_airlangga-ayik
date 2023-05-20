@extends('templates.master')
@section('content')

<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Pegawai PNS</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pns }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Total Pegawai Non-PNS</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $non_pns }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Kegiatan Yang Telah Selesai
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $selesai }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Kegiatan Yang Sedang Berjalan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $berjalan }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-success">Kegiatan Internal</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" >
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Rapat</th>
                                <th>Tanggal</th>
                                <th>Tempat</th>
                                <th>Penyelenggara</th>  
                                <th>Jenis Pesrta</th>            
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @foreach ($internal as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->nama_kegiatan }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                                <td>{{ $item->tempat }}</td>
                                <td>{{ $item->penyelenggara }}</td>
                                <td>{{ $item->jenis_peserta }}</td>
                            </tr>                         
                            @endforeach                      
                        </tbody>
                      </table>
                      <br/>
                      {{-- Halaman : {{ $internal->currentPage() }} <br/>
                      Jumlah Data : {{ $internal->total() }} <br/>
                      Data Per Halaman : {{ $internal->perPage() }} <br/>
                   --}}
                  
                </div>

            </div>
        </div>

      
    </div>

    <div class="col-lg-6 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-success">Kegiatan Eksternal</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable2" >
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Rapat</th>
                                <th>Tanggal</th>
                                <th>Tempat</th>
                                <th>Penyelenggara</th>
                                <th>Jenis Peserta</th>              
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @foreach ($eksternal as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->nama_kegiatan }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                                <td>{{ $item->tempat }}</td>
                                <td>{{ $item->penyelenggara }}</td>
                                <td>{{ $item->jenis_peserta }}</td>
                            </tr>                         
                            @endforeach     
                        </tbody>
                      </table>
                      <br/>
                     
                  
                    
                     
                </div>

            </div>
        </div>

      
    </div>
</div>
   

    
@endsection