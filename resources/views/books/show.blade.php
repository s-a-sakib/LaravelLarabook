@extends('layout')
@section('title')
    <title>Book Details</title>
@endsection
@section('page-content')

    <div class="container mt-5">
    <!-- <h2 class="mt-5">Book List</h2> -->
    <a class="mt-5" href="{{route('list')}}"> Go Back </a>
    <caption><h1>BOOK DETAILS</h1></caption>
    <table class="table table-bordered table-hover">
        <tr>
            <th><h3>Key</h3></th>
            <th><h3>Value</h3></th>
        </tr>
        <tr>
            <td>Book Title</td>
            <td>{{$book->title}}</td>
        </tr>
        <tr>
            <td>Book Author</td>
            <td>{{$book->author}}</td>
        </tr>
        <tr>
            <td>ISBN</td>
            <td>{{$book->isbn}}</td>
        </tr>
        <tr>
            <td>Book Price</td>
            <td>{{$book->price}}</td>
        </tr>
        <tr>
            <td>Book Stock</td>
            <td>{{$book->stock}}</td>
        </tr>
        <tr>
            <td>Actions</td>
            <td>
                <!-- <a type="submit" name="deleteBook" class="btn btn-danger btn-sm">Delete</button> -->
                <a href="{{ route('book.edit', $book->id) }}" class="btn btn-warning btn-sm">Update</a>
                <a href="{{ route('book.delete', $book->id) }}" class="btn btn-danger btn-sm">Delete</a>
            </td>
        </tr>
    </table>
</div>
@endsection
