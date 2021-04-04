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
								</div>
								<div class="panel-body">
									<table class="table table-hover">
										<thead>
											<tr>
                                            <th>NIK</th>
                                            <th>NAMA</th>
                                            <th>USERNAME</th>
                                            <th>TELP</th>
											</tr>
										</thead>
										<tbody>
                                            @foreach($masyarakat as $masy)
                                            <tr>
                                                <td>{{$masy->nik}}</td>
                                                <td>{{$masy->nama}}</td>
                                                <td>{{$masy->username}}</td>
                                                <td>{{$masy->telp}}</td>
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