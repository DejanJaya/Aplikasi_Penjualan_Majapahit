@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>History Transaksi</h3>
        </div>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            
            <table class="table table-bordered tabel-striped">
                <tr>
                    <th>No Invoice</th>
                    <th>Nama Customer</th>
                    <th>Produk</th>
                    <th>Total Harga</th>
                    <th>Pembayaran</th>
                </tr>
                @foreach($history as $h)
                <tr>
                    <td>{{$h->no_invoice}}</td>
                    <td>{{$h->nama_user}}</td>
                    <td>{{$h->nama_produk}}</td>
                    <td>{{$h->subtotal}}</td>
                    <td>{{$h->bayar}}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>

</div>
@endsection