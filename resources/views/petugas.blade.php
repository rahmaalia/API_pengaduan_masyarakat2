@extends('layouts.master')
@section('content')
<div class="main">
                <div class="main-content">
                    <div class="container-fluid">
                        <div class="row">
                                <div class="col-md-12">
                                <div class="panel">
                                  <div class="panel-heading">
                                    <h3 class="panel-title">Petugas</h3>
                                    <a href="/tambahpetugas" class="btn btn-primary right">Tambah petugas</a>
                                  </div>
                                    <div class="panel-body">
                                      <table class="table table-hover">
                                        <thead>
                                          <tr>
                                            <th>NO</th>
                                            <th>NAMA</th>
                                            <th>USERNAME</th>
                                            <th>TELP</th>
                                            <th>AKSI</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                            @php $i=1 @endphp
                                            @foreach($petugas as $pet)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{$pet->nama_petugas}}</td>
                                                <td>{{$pet->username}}</td>
                                                <td>{{$pet->telp}}</td>
                                                <td><a href="/deletePetugas/{{$pet->user_id}}" class="btn btn-danger btn-sm" onclick="return confirm('apakah anda yakin?')">
                                                <i class="fa fa-trash-o"></i></a>
                                                <a href="/edit/{{$pet->user_id}}" class="btn btn-warning btn-sm">
                                                <i class="lnr lnr-pencil"></i></a>
                                                </td>
                                                 
                                            </tr>
                                            @endforeach
                                      </tbody>
                                    </table>
                                    <div>
                                        menampilkan
                                        {{$petugas->firstitem()}}
                                        sampai
                                        {{$petugas->lastitem()}}
                                        dari
                                        {{$petugas->total()}}
                                    </div>
                                    <div class="pull-right">
                                        {{ $petugas->links() }}  
                                    </div>
                                    
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          
        @stop
         
