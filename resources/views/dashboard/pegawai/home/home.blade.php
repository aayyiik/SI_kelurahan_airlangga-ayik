@extends('templates.master')
@section('content')

<div class="row">

    <!-- Earnings (Monthly) Card Example -->
   

    <!-- Earnings (Monthly) Card Example -->
   

    <!-- Earnings (Monthly) Card Example -->
    

    <!-- Pending Requests Card Example -->
   
</div>

<div class="row">
    <div class="col-lg-6 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-success">Kegiatan Internal</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable">
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
                </div>

            </div>
        </div>

      
    </div>
</div>
   

    
@endsection