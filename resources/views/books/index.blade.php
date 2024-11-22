@extends('layout')
@section('title')
    <title>List of Books</title>
@endsection
@section('page-content')

  <div class="container mt-5">
      <div class="d-flex justify-content-between align-items-center p-1">
          <h2 class="mt-5">
              Book List
          </h2>
          <a class="btn btn-success mt-5" href="{{ route('book.create') }}">
              Add Book
          </a>
      </div>
      <form method="GET" action="{{route('list')}}" class="mb-3">
          <div class="input-group">
              <input type="text" id="search" name="search" class="form-control" placeholder="Search by title or author" aria-label="Search">
              <button class="btn btn-primary" type="submit">Search</button>
          </div>
      </form>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>ISBN</th>
                <th>Title</th>
                <th>Author</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
            <tr>
                <td>{{$book->id}}</td>
                <td>{{$book->isbn}}</td>
                <td>{{$book->title}}</td>
                <td>{{$book->author}}</td>
                <td>
                    <a href="{{route('show.book',$book->id)}}">View</a>
                </td>
            </tr>
           @endforeach

        </tbody>
    </table>
    {{$books->links()}}
    </div>
@endsection

