@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Form Edit Daftar Hadiah</h3>
        </div>
        
        <div class="card-body">
            <a href="{{route('hadiah.index')}}" class="btn btn-primary">Kembali</a>
            <form action="{{route('hadiah.update', $hadiah->id_hadiah)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="point">Point</label>
                    <input id="point" class="form-control" type="number" name="point" value="{{$hadiah->point}}"/>
                </div>
                <div class="form-group">
                    <label for="daftar_hadiah">Daftar Hadiah</label>
                    <input id="daftar_hadiah" class="form-control" type="text" name="daftar_hadiah" value="{{$hadiah->daftar_hadiah}}" />
                </div>
            
                <input type="submit" value="Save" class="btn btn-success">
            </form>
        </div>
    </div>
</div>
@endsection
