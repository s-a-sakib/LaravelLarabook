<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(){
        $books = Book::where('stock' , '>' , 45)->get();
        //select * from Book where stock > 0;
        return view('books.index')->with('books',$books);
    }
}
