@extends('layouts.master')
@section('content')
   <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
							<!-- PANEL HEADLINE -->
							<div class="panel panel-headline">
								<div class="panel-heading">
									<h3 class="panel-title">Detail Pengaduan</h3>
									
								</div>
								<div class="panel-body">
                                <h4>Nama : {{ $p->nama }}</h4>
                                <h4 class="mt-4">NIK : {{ $p->nik }}</h4>
                                <h4 class="mt-4">No Telepon : {{ $p->telp }}</h4>
                                <h4 class="mt-4">Tanggal : {{ $p->tgl_pengaduan }}</h4>
                                <h4 class="mt-4">Status : 
                                @if($p->status =='proses')
                                <span
                                 class="label label-danger">
                                    {{ $p->status }}
                                </span>
                                @elseif ($p->status =='verifikasi')
                                <span
                                class="label label-warning">
                                    {{ $p->status }}
                                </span>
                                @else
                                <span
                                class="label label-success">
                                    {{ $p->status }}
                                    </span>
                                    @endif
                                    </h4>
								</div>
							</div>
							<!-- END PANEL HEADLINE -->
                    </div>

                    <div class="col-md-12">
							<!-- PANEL HEADLINE -->
							<div class="panel panel-headline">
                            <table class="table ">
										<thead>
											<tr>
                                            <th>FOTO</th>
                                            <th>LAPORAN</th>
											</tr>
										</thead>
										<tbody>
                                            <tr>
                                                <td><img src="{{ asset('/foto/'.$p->foto) }}" width="200" height="200"></td>
                                                <td>{{$p->isi_laporan}}</td>
                                            </tr>
										</tbody>
									</table>
							</div>
							<!-- END PANEL HEADLINE -->
                    </div>

                    <div class="col-md-12">
							<!-- PANEL HEADLINE -->
							<div class="panel panel-headline">
                            <table class="table ">
										<thead>
											<tr>
                                            <th>TANGGAPAN</th>
											</tr>
										</thead>
										<tbody>
                                            @foreach($t as $ta)
                                            <tr>
                                                <td>
                                                @if (!empty($ta->tanggapan))
                                                {{ $ta->tanggapan}}
                                                @else
                                                Belum ada tanggapan
                                                @endif
                                                </td>
                                            </tr>
                                            @endforeach
										</tbody>
									</table>
							</div>
							<!-- END PANEL HEADLINE -->
                    </div>

                    @if ($p->status != 'selesai')
                    <div class="col-md-4">
                    <a href="/isitanggapan/{{$p->id_pengaduan}}" class="btn btn-primary">Berikan Tanggapan</a>
                    </div>
                    @endif
                    <div class="flex justify-center my-6">
                    </div>
                </div>
            </div>
        </div>
   </div>

   @stop
