<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Doctrine\Inflector\Rules\English\Rules;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Nette\Utils\Html;

class BookController extends Controller
{
    public function index(){
        $books = Book::paginate(15);
        //select * from Book where stock > 0;
        return view('books.index')->with('books',$books);
    }
    public function show($id){
        $book = Book::find($id);

        if ($book) {
            return view('books.show')->with('book',$book);
        } else {
            return ("
                <h1>Books Not Found</h1>
                <br>
                <a href='/books' class='btn btn-primary'>Back to Home</a>
                "
            );
        }
    }

    public function edit($id){
        $book = Book::find($id);
        return view('books.update')->with('book',$book);
    }
    public function update(Request $request){

    $id = $request->id;
    // Define validation rules
    $validator = Validator::make($request->all(), [
        'title' => 'required|string|max:255',
        'author' => 'required|string|max:255', // Changed to 'alpha' for alphabetic validation
        'stock' => 'required|integer|min:0', // Ensures stock is a non-negative integer
        'price' => 'required|numeric|min:0', // Changed to 'numeric' to allow float values
        'isbn'  => 'required|digits:13|numeric', // Ensures ISBN is a 13-digit numeric value
    ]);
    // // Check if validation fails
    // if ($validator->fails()) {
    //     return view('books.update')->with('book',$book)->with('error',$error);
    // }
    if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator) // Pass the validation errors back
            ->withInput(); // Retain the old input
    }

    // Proceed with the update if validation passes
    DB::table('books')->where('id', '=', $id)->update([
        'title'  => $request->input('title'),
        'author' => $request->input('author'),
        'stock'  => $request->input('stock'),
        'price'  => $request->input('price'),
        'isbn'   => $request->input('isbn'),
    ]);
    $book = Book::find($id);
    return view('books.show')->with('book',$book);
    }
    public function create(){
        return view('books.addbook');
    }
    public function addbook(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'stock' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'isbn'  => 'required|digits:13|unique:books,isbn|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator) // Pass the validation errors back
                ->withInput(); // Retain the old input
        }

        DB::table('books')->insert([
        'title' => $request->input('title'),
        'author' => $request->input('author'),
        'stock' => $request->input('stock'),
        'price' => $request->input('price'),
        'isbn'  => $request->input('isbn'),
        ]);
        $id = Book::where('isbn', $request->input('isbn'))->pluck('id')->first();
        $books = Book::paginate(15);
        return redirect()->route('list')->with('success', 'Successfully added new book with ID: ' . $id)
            ->with('books', $books);
    }

    public function destroy($id){
        DB::table('books')->where('id','=',$id)->delete();
        $books = Book::paginate(15);
        return redirect()->route('list')->with('success', 'Successfully deleted the book with ID: ' . $id)
        ->with('books', $books);
    }
}
