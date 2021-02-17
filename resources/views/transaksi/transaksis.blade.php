@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Form Transaksi</h3>
        </div>
        
        <div class="card-body">
            <a href="{{route ('transaksi.index')}}" class="btn btn-primary">Kembali</a>
            <form action="{{route('transaksi.store')}}" method="POST">
                @csrf
                
                <div class="form-group">
                    <label for="nama">Produk</label>
                    <input id="nama" class="form-control" type="text" name="nama" readonly value="{{$produk->nama}}"/>
                    <input type="hidden" id="point" name="point" value="5">
                    <input type="hidden" id="no_invoice" name="no_invoice" value="<?php $no =0001; echo "no".$no++ ?>">
                </div>
                <div class="form-group">
                    <label for="harga">Harga Satuan</label>
                    <input id="harga" class="form-control" type="number" name="harga" readonly value="{{$produk->harga}}" />
                </div>
                <div class="form-group">
                    <label for="jumlah">Jumlah yang dibeli</label>
                    <input id="jumlah" class="form-control" type="number" onchange="total()" name="jumlah" value="" />
                </div>
                
                <div class="form-group">
                    <label for="oke">Total Harga</label>
                    <input id="subtotal" class="form-control" type="number" name="subtotal" value="" />
                </div>
                <div class="form-group">
                    <label for="bayar">Bayar</label>
                    <input id="bayar" class="form-control" type="number" onkeyup="bayaran()" name="bayar" value="" autofocus />
                </div>
                <div class="form-group">
                    <label for="kembalian">Kembalian</label>
                    <input id="kembalian" class="form-control" type="number" name="kembalian" value="" autofocus />
                </div>
            
                <input type="submit" value="Save Transaksi" class="btn btn-success">
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    function total() {
    var harga = parseInt(document.getElementById('harga').value);
    var jumlah = parseInt(document.getElementById('jumlah').value);

    var jumlah_harga = harga * jumlah;

    document.getElementById('subtotal').value = jumlah_harga;
    }

    function bayaran() {
    var bayar = parseInt(document.getElementById('bayar').value);
    var subtotal = parseInt(document.getElementById('subtotal').value);

    var pembayaran = (bayar - subtotal);

    document.getElementById('kembalian').value = pembayaran;
    }
    
    </script>
@endsection
