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
                <form action="/tambah" method="post">
                @csrf 
                <h3>Tambah Petugas</h3>
                    <div class="panel panel-headline">
                        <div class="panel-body">
                            <h5>Nama Petugas</h5>
                            <input class="form-control" placeholder="nama petugas" type="text" name="nama_petugas">
                            <h5>Nama Pengguna</h5>
                            <input class="form-control" placeholder="nama pengguna" type="text" name="username">
                            <h5>No Telp</h5>
                            <input class="form-control" placeholder="no Telp" type="number" name="telp">
                            <h5>Password</h5>
                            <input type="password" class="form-control" name="password" minLength="8" id="validationDefaultUsername"  aria-describedby="inputGroupPrepend2" required>
                            <h5>Konfirmasi Password</h5>
                            <input type="password" class="form-control" name="k_password" >
                        </div>
                    </div>
                    <input type="submit" value="tambah petugas" class="btn btn-primary btn-block" style="padding:10px">
                </form>
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection