<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <style>
        /* table,
   th,
   td {
      border: 1px solid black;
      border-collapse: collapse;
      text-align: center;
   } */

   body{
       margin: 40px;
   }
   .line-tittle{
       border: 0;
       border-style:inset;
       border-top: 1px solid #000;
   }
    </style>
   
   <table style="width: 100%">
    <tr>
        <td align="center">
            <span style="line-height: 2; font-weight: bold; " > Rincian Aktivitas Tenaga Honorer/Tenaga Operasional/Tenaga Keamanan
            <br> Kegiatan Penyediaan Barang dan Jasa Perkantoran Perangkat daerah
            <br> Bagian Administrasi Pembangunan
        </span>
        </td>
    </tr>
   </table>

   <hr class="line-tittle">
   <p> Nama : {{ Auth::user()->nama }}
   <p> Jabatan : {{ Auth::user()->jabatan->nama_jabatan }}</p>
   <p>           Berdasarkan Surat Perintah Kerja Nomor {{ $nomor }} Tanggal {{ \Carbon\Carbon::parse($tgl_mulai)->format('d/m/Y') }}</p>
   <p> Bulan : {{ $bulan }}
        <table class="table table-bordered" width="100%" cellspacing="0">
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
                    @php $no = 1; @endphp
                    @foreach ($displayLaporan as $display)
                    <tr >
                        <td>{{ $no++ }}</td>
                        <td>{{ $display->nama_aktivitas }}</td>
                        <td>{{ \Carbon\Carbon::parse($display->tanggal)->format('d-m-Y') }}</td>
                        <td><img src="{{ asset('assets/img/log/'.$display->foto) }}" width="120px" height="120px" alt="image"></td>
                    </tr>
                    @endforeach
                </tbody>
                @endif
            
          </table>

          <table style="width: 100%" >
            <tr>
                <td colspan="3">Surabaya, {{ $tanggal }}</td>
            </tr>
            <tr>
               <br>
                <th style="text-align: center">Yang Melaporkan,</th>
           
                <th></th>
                <th style="text-align: center">Sekretaris Kelurahan</th>
            </tr>
            <tr></tr>
            <tr>
                <td>
                    <br>
                    <br>
                    <br>
                    <br>
                    <p style="text-align: center">{{ Auth::user()->nama }}</p>
                </td>
                <td>
                    <br>
                    <br>
                    <br>
                    <br>
                </td>
                <td>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    @foreach ($sekretaris as $item)
                    <p style="text-align: center"> 
                        {{ $item->user->nama }}
                    </p>
                    <p style="text-align: center"> 
                        {{ $item->jabatans->nama_jabatan }}
                    </p>
                    <p style="text-align: center"> 
                        NIP: {{ $item->no_pegawai }}
                    </p>

                    @endforeach
                </td>
            </tr>
            <tr>
                <br>
            </tr>
            <tr>
                <th colspan="3" style="text-align: center" >Lurah</th>
            </tr>
            <tr>
                <td colspan="3" style="text-align: center">
                    <br>
                    <br>
                    <br>    
                    <br>
                    @foreach ($lurah as $item)
                    <p style="text-align: center"> 
                        {{ $item->user->nama }}
                    </p>
                    <p style="text-align: center"> 
                        {{ $item->jabatans->nama_jabatan }}
                    </p>
                    <p style="text-align: center"> 
                        NIP: {{ $item->no_pegawai }}
                    </p>

                    @endforeach
                </td>
            </tr>
         </table>
    
       <script type="text/javascript">
    
        window.print();
        </script>
</body>
</html>

