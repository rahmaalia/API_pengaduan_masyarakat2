@extends('layouts.master')
@section('content')
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                <div class="col-md-12">
                    <form action="/kirim/{{$p->id_pengaduan}}" method="post">
                        @csrf             
                        <!-- PANEL HEADLINE -->
                        <div class="panel panel-headline">
                            <div class="panel-heading">
                                <h3 class="panel-title">Isi Tanggapan</h3>
                            </div>
                            <div class="panel-body">
                            <h5>tanggapan</h5>
                                <textarea class="form-control" placeholder="isi tanggapan anda" rows="10" name="tanggapan"></textarea>

                            <h5>Status</h5>
                                <select class="form-control" name="status">
                                    <option value="proses">proses</option>
                                    <option value="verifikasi">verifikasi</option>
                                    <option value="selesai  ">selesai</option>
                                </select>
                            </div>
                        </div>
                        <input type="submit" value="Kirim Tanggapan" class="btn btn-primary btn-block">
                    </form>
							<!-- END PANEL HEADLINE -->
						</div>
                </div>
            </div>
        </div>
    </div>
    @endsection