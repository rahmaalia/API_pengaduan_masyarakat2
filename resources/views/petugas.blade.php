@extends('layouts.master')
@section('content')
<div class="main">
                <div class="main-content">
                    <div class="container-fluid">
                        <div class="row">
                        
                            <div class="panel-heading">
									            <h3 class="panel-title">Petugas</h3>
                                    <div class="right">
                                      <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
                                    </div>  
							                </div>
                                <div class="col-md-12">
                                  <div class="panel">
                                    <div class="panel-body">
                                      <table class="table table-hover">
                                        <thead>
                                          <tr>
                                            <th>NAMA</th>
                                            <th>USERNAME</th>
                                            <th>TELP</th>
                                            <th>LEVEL</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($petugas as $pet)
                                            <tr>
                                                <td>{{$pet->nama_petugas}}</td>
                                                <td>{{$pet->username}}</td>
                                                <td>{{$pet->telp}}</td>
                                                <td>{{$pet->level}}</td>
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
         
