@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="min-height:85vh">
                <div class="card-header bg-white">
                    <form action="{{ url('/transaksi') }}" method="get">
                        <div class="row">
                            <div class="col">
                                <h4 class="font-weight-bold">Produk</h4>
                            </div>
                            <div class="col text-right">
                                <select name="" id="" class="form-control from-control-sm" style="font-size: 12px">
                                    <option value="" holder>Filter Category</option>
                                    <option value="1">All Category...</option>
                                    
                                </select>
                            </div>
                            <div class="col"><input type="text" name="search"
                                    class="form-control form-control-sm col-sm-12 float-right"
                                    placeholder="Search Produk..." onblur="this.form.submit()"></div>
                            <div class="col-sm-3">
                                <button type="submit" class="btn btn-primary btn-sm float-right btn-block">Cari Product</button>
                            </div>
                        
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        @foreach ($products as $product)
                        <div style="width: 16.66%;border:1px solid rgb(243, 243, 243)" class="mb-4">
                            <div class="productCard">
                                <div class="view overlay">
                                   
                                </div>
                                <div class="card-body">
                                    <label class="card-text text-center font-weight-bold"
                                        style="text-transform: capitalize;">
                                        {{ Str::words($product->nama) }} ({{$product->qty}}) </label>
                                    <p class="card-text text-center">Rp. {{ number_format($product->harga,2,',','.') }}
                                    </p>
                                    <a href="{{url('/trans/'.$product->id_produk)}}" class="btn btn-success btn-sm float-right btn-block" style="padding:1rem!important">Beli Produk</a>
                                </div>
                            </div>
                            
                        </div>
                        @endforeach
                    </div>
                </div>
                <div>{{ $products->links() }}</div>
                
            </div>
        </div>
        
    </div>
    <script type="text/javascript">
		function total() {
		var valgoritma = $harga * parseInt(document.getElementById('jumlah').value);


		var jumlah_harga = valgoritma;

		document.getElementById('total').value = jumlah_harga;
		}
		
		</script>
    @endsection
    
    
