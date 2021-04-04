
        @extends('layouts.master')
        @section('content')
            <div class="main">
                <div class="main-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                            <div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Pengaduan</h3>
								</div>
								<div class="panel-body">
									<table class="table table-hover">
										<thead>
											<tr>
                                            <th>TGL PENGADUAN</th>
                                            <th>NAMA</th>
                                            <th>ISI LAPORAN</th>
                                            <th>STATUS</th>
                                            <th>FOTO</th>
                                            <th>AKSI</th>
											</tr>
										</thead>
										<tbody>
                                            @foreach($pengaduan as $adu)
                                            <tr>
                                                <td>{{$adu->tgl_pengaduan}}</td>
                                                <td>{{$adu->nama}}</td>
                                                <td>{{$adu->isi_laporan}}</td>
                                                <td>{{$adu->status}}</td>
                                                <td><img src="{{ asset('/foto/'.$adu->foto) }}" width="200" height="200"></td>
                                                <td><a href="/pengaduan/{{$adu->id_pengaduan}}/inputTanggapan" class="btn btn-outline-primary btn-sm">tanggapi</a></td>
                                            </tr>
                                            @endforeach
										</tbody>
									</table>
								</div>
							</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @stop
        
    


