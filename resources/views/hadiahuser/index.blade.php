@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-5">
        <div class="card">
            <div class="card-header">
                <h3>Point Anda</h3>
            </div>
            <div class="card-body">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-thumbs-up"></i></span>
      
                    <div class="info-box-content">
                      <span class="info-box-text">Point Anda Saat Ini</span>
                      <span class="info-box-number">{{$datapoint}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
            </div>
        </div>
    </div>
    <div class="col-7">
        <div class="card">
            <div class="card-header">
                <h3>Daftar Hadiah Yang Bisa Ditukar</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered tabel-striped">
                    <tr>
                        <th>Point</th>
                        <th>Daftar Hadiah</th>
                    </tr>
                    @foreach($hadiah as $u)
                    <tr>
                        <td>{{$u->point}}</td>
                        <td>{{$u->daftar_hadiah}}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection