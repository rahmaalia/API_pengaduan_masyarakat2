@extends('layouts.master')
@section('content')
<div class="main">
                <div class="main-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                            <div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Masyarakat</h3>
                                    <a href="/tambahmasyarakat" class="btn btn-primary right">Tambah masyarakat</a>
								</div>
								<div class="panel-body">
									<table class="table table-hover">
										<thead>
											<tr>
                                            <th>NO</th>
                                            <th>NIK</th>
                                            <th>NAMA</th>
                                            <th>USERNAME</th>
                                            <th>TELP</th>
                                            <th>AKSI</th>
											</tr>
										</thead>
										<tbody>
                                            @php $i=1 @endphp
                                            @foreach($masyarakat as $masy)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{$masy->nik}}</td>
                                                <td>{{$masy->nama}}</td>
                                                <td>{{$masy->username}}</td>
                                                <td>{{$masy->telp}}</td>
                                                <td><a href="/deleteMasyarakat/{{$masy->user_id}}" class="btn btn-danger btn-sm" onclick="return confirm('apakah anda yakin?')">
                                                <i class="fa fa-trash-o"></i></a>
                                                <a href="/" class="btn btn-warning btn-sm">
                                                <i class="lnr lnr-pencil"></i></a></td>
                                            </tr>
                                            @endforeach
										</tbody>
									</table>
                                    <div>
                                        menampilkan
                                        {{$masyarakat->firstitem()}}
                                        sampai
                                        {{$masyarakat->lastitem()}}
                                        dari
                                        {{$masyarakat->total()}}
                                    </div>
                                    <div class="pull-right">
                                        {{ $masyarakat->links() }}  
                                    </div>
								</div>
							</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @stop