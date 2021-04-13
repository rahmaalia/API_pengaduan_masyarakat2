@extends('layouts.master')
@section('content')

<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <h3 >Laporan</h3>
                    <div class="panel">
                    <div class="panel-heading">
                                    
                                    <a href="/laporan/cetak" class="btn btn-primary right" target="_blank">Eksport PDF</a>
                                    <a href="/laporan/cetak/proses" class="btn btn-danger " target="_blank">PDF "proses"</a>
                                    <a href="/laporan/cetak/selesai" class="btn btn-success " target="_blank">PDF "selesai"</a>
                                    <a href="/laporan/cetak/ver" class="btn btn-warning " target="_blank">PDF "verifikasi"</a>
                                  </div>
                        <div class="panel-body">
                        <table class="table table-hover">
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
                                                    @endif</td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div>
                                                                menampilkan
                                                                {{$pengaduan->firstitem()}}
                                                                sampai
                                                                {{$pengaduan->lastitem()}}
                                                                dari
                                                                {{$pengaduan->total()}}
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
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
    </div>
</div>

@stop