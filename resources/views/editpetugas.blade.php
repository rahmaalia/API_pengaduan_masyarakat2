@extends('layouts.master')
@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                @if ($message = Session::get('gagal'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>	
                    <strong>{{ $message }}</strong>
                </div>
                @endif

                @if ($message = Session::get('kurang'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>	
                    <strong>{{ $message }}</strong>
                </div>
                @endif

                @if ($message = Session::get('ada'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>	
                    <strong>{{ $message }}</strong>
                </div>
                @endif
                @foreach($petugas as $p)
                <form action="/update/{{$p->user_id}}" method="post">
                @csrf 
                <h3>Edit Petugas</h3>
                    <div class="panel panel-headline">
                        <div class="panel-body">
                        
                            <h5>Nama Petugas</h5>
                            <input class="form-control" placeholder="nama petugas" type="text" name="nama_petugas" value="{{$p->nama_petugas}}">
                            <h5>Nama Pengguna</h5>
                            <input class="form-control" placeholder="nama pengguna" type="text" name="username" value="{{$p->username}}">
                            <h5>No Telp</h5>
                            <input class="form-control" placeholder="no Telp" type="number" name="telp" value="{{$p->telp}}">
                            @endforeach
                        </div>
                    </div>
                    <input type="submit" value="edit data petugas" class="btn btn-primary btn-block" style="padding:10px">
                </form>
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection