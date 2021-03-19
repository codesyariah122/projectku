@extends('books.layout')
  
@section('content')

<div class="container mt-5">
   
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
            Detail Buku
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>Judul: </b>{{$book->title}}</li>
                    <li class="list-group-item"><b>Penulis: </b>{{$book->writer}}</li>
                    <li class="list-group-item"><b>Penerbut: </b>{{$book->publisher}}</li>
                </ul>
            </div>
            <a class="btn btn-success" href="{{ route('books.index') }}">Kembali</a>

        </div>
    </div>
</div>
@endsection
