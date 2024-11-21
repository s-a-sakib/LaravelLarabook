<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title></title>
</head>
<body>

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>