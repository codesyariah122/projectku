@extends('books.layout')
  
@section('content')
   
<div class="container mt-5">
   
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
            Edit Buku
            </div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="post" action="{{ route('books.update',$book->id) }}" id="myForm">
            @csrf
            @method('PUT')
                <div class="form-group">
                    <label for="title">Judul</label>                    <input type="text" name="title" class="form-control" id="title" value="{{ $book->title }}" aria-describedby="title" placeholder="Masukkan Judul Buku">                </div>
                <div class="form-group">
                    <label for="writer">Penulis</label>                    <input type="text" name="writer" class="form-control" id="writer" value="{{ $book->writer }}" aria-describedby="writer" placeholder="Masukkan Nama Penulis">                </div>
                <div class="form-group">
                    <label for="publisher">Penerbit</label>                    <input type="text" name="publisher" class="form-control" id="publisher" value="{{ $book->publisher }}" aria-describedby="publisher" placeholder="Masukkan Nama Penerbit">
                </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection