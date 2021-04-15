@extends('layouts.master')
@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                @foreach($masyarakat as $p)
                <form action="/updatemasyarakat/{{$p->user_id}}" method="post">
                @csrf 
                <h3>Edit Masyarakat</h3>
                    <div class="panel panel-headline">
                        <div class="panel-body">
                            <h5>NIK</h5>
                            <input class="form-control" placeholder="nik" type="text" name="nik" value="{{$p->nik}}">
                            <h5>Nama</h5>
                            <input class="form-control" placeholder="nama" type="text" name="nama" value="{{$p->nama}}">
                            <h5>Nama Pengguna</h5>
                            <input class="form-control" placeholder="nama pengguna" type="text" name="username" value="{{$p->username}}">
                            <h5>No Telp</h5>
                            <input class="form-control" placeholder="no Telp" type="number" name="telp" value="{{$p->telp}}">
                            @endforeach
                        </div>
                    </div>
                    <input type="submit" value="edit data masyarakat" class="btn btn-primary btn-block" style="padding:10px">
                </form>
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection