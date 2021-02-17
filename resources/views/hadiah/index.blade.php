@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Daftar Hadiah Yang Bisa Ditukar</h3>
        </div>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <a class="btn btn-success mr-2" href="{{route('hadiah.create')}}">Tambah Daftar Hadiah</a>
            <table class="table table-bordered tabel-striped">
                <tr>
                    <th>Point</th>
                    <th>Daftar Hadiah</th>
                    <th>AKSI</th>
                </tr>
                @foreach($hadiah as $u)
                <tr>
                    <td>{{$u->point}}</td>
                    <td>{{$u->daftar_hadiah}}</td>
                    <td>
                        <ul class="nav">
                            <a class="btn btn-primary mr-2" href="{{route('hadiah.edit', $u->id_hadiah)}}">Edit</a>
                            <form action="{{route('hadiah.destroy', $u->id_hadiah)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-warning">Delete</button>
                            </form>
                        </ul>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>

</div>
@endsection