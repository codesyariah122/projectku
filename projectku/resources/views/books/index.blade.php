@extends('books.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb mt-3 mb-3">
            <div class="text-left">
                <h2>Kelola Data Buku</h2>
            </div>
            <div class="text-right">
                <a class="btn btn-success" href="{{ route('books.create') }}">Tambah Buku</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong><p>{{ $message }}</p></strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif
   
    <table class="table table-striped table-bordered">
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Penerbit</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($books as $key => $book)
        <tr>
          
            <td>{{ $key+1 }}</td>
            <td>{{ $book->title }}</td>
            <td>{{ $book->writer }}</td>
            <td>{{ $book->publisher }}</td>
            <td>
                <form action="{{ route('books.destroy',$book->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('books.show',$book->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('books.edit',$book->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
      
@endsection