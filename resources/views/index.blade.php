
        @extends('layouts.master')
        @section('content')
            <div class="main">
                <div class="main-content">
                    <div class="container-fluid">
                        <div class="row">
                            
                            <div class="col-md-12">
                            <div class="panel">
								<div class="panel-heading">
                                <div class="col-md-4">
                                    <h3 class="panel-title">Pengaduan</h3>
                                </div>
                                <div class="col-md-4">
                                
                                </div>
								<div class="col-md-4">
                                    <form action="/search" method="post" class="row g-3">
                                        @csrf
                                        <!-- <input class="form-control" type="text" name="search">
                                        <input type="submit" value="cari" class="btn btn-warning btn-sm"> -->
                                        
                                        <div class="input-group">
										<input class="form-control" type="text" name="search">
										<span class="input-group-btn"><input type="submit" value="cari" class="btn btn-warning btn-sm"></span>
									</div>
                                    </form>
                                    </div>	
								</div>
								<div class="panel-body">
                                      
									<table class="table table-hover">
										<thead>
											<tr>
                                            <th>NO</th>
                                            <th>TANGGAL</th>
                                            <th>NAMA</th>
                                            <th>ISI LAPORAN</th>
                                            <th>STATUS</th>
                                            <th>FOTO</th>
                                            <th>AKSI</th>
											</tr>
										</thead>
										<tbody>
                                             @php $i=1 @endphp
                                            @foreach($pengaduan as $adu)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{$adu->tgl_pengaduan}}</td>
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
                                                        @endif</td>
                                                <td><img src="{{ asset('/foto/'.$adu->foto) }}" width="200" height="200"></td>
                                                <td><a href="/pengaduan/{{$adu->id_pengaduan}}/inputTanggapan" class="btn btn-info btn-sm">lihat</a></td>
                                            </tr>
                                            @endforeach
										</tbody>
									</table>
                                    <div>
                                        menampilkan
                                        {{$pengaduan->firstitem()}}
                                        sampai
                                        {{$pengaduan->lastitem()}}
                                        dari
                                        {{$pengaduan->total()}}
                                    </div>
                                    <div class="pull-right">
                                        {{ $pengaduan->links() }}  
                                    </div>
                                </div>
                                
							</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @stop
        
    


