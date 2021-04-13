<!DOCTYPE html>
<html>
<head>
	<title>Laporan Pengaduan Masyarakat</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
    <h5>PEMERINTAH PROVINSI JAWA BARAT</h4>
        <h5>PENGADUAN MASYARAKAT</h5>
        <h6>Jl. Diponegoro No.22, Citarum, Kec. Bandung Wetan, Kota Bandung, Jawa Barat </h6>
        <h6>40115</h6>
        <div style="width: 100%; background: #000; height: 3px; margin-bottom:20px"></div>
	</center>

	<table class='table table-bordered'>
		<thead>
			<tr>
                <th>NO</th>
                <th>TANGGAL</th>
                <th>NIK</th>
                <th>NAMA</th>
                <th>ISI LAPORAN</th>
                <th>STATUS</th>
			</tr>
		</thead>
		<tbody>
            @php $i=1 @endphp
			@foreach($pengaduan as $adu)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{$adu->tgl_pengaduan}}</td>
                    <td>{{$adu->nik}}</td>
                    <td>{{$adu->nama}}</td>
                    <td>{{$adu->isi_laporan}}</td>
                    <td>@if($adu->status =='proses')
                    <span
                    class="label label-danger">
                        {{ $adu->status }}
                    </span>
                    @elseif ($adu->status =='verifikasi')
                    <span
                    class="label label-warning">
                        {{ $adu->status }}
                    </span>
                    @else
                    <span
                    class="label label-success">
                        {{ $adu->status }}
                        </span>
                        @endif
                    </td>
                </tr>
                @endforeach
		</tbody>
	</table>
    <div>
            <br>
            <br>
            <h6>{{date('d-m-Y')}}</h6>
            <br>
            
            <h6>Admin</h6>   
          
    </div>
</body>
</html>