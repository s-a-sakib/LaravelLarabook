@extends('layout')
@section('title')
    <title>Add Book</title>
@endsection
@section('page-content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a class="mt-5" href="{{route('list')}}"> Go Back </a>
                <div class="card">
                    <div class="card-header">Add Book</div>
                    <div class="card-body">
                        <form action="{{ route('book.addbook') }}" method="POST">
                            @csrf
                            @method('POST')

                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" id="title" name="title" value="{{ old('title') }}" placeholder="Enter book title" class="form-control @error('title') is-invalid @enderror">
                                @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="author" class="form-label">Author</label>
                                <input type="text" id="author" name="author" value="{{ old('author') }}" placeholder="Enter book author" class="form-control @error('author') is-invalid @enderror">
                                @error('author')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="numeric" id="price" name="price" value="{{ old('price') }}" placeholder="Enter book price" class="form-control @error('price') is-invalid @enderror">
                                @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="isbn" class="form-label">ISBN</label>
                                <input type="number" id="isbn" name="isbn" value="{{ old('isbn') }}" placeholder="Enter book ISBN" class="form-control @error('isbn') is-invalid @enderror">
                                @error('isbn')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="stock" class="form-label">Stock</label>
                                <input type="number" id="stock" name="stock" value="{{ old('stock') }}" placeholder="Enter book stock" class="form-control @error('stock') is-invalid @enderror">
                                @error('stock')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Add Book</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
