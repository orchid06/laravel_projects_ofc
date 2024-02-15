<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Books;
use Illuminate\Http\Request;
use App\Models\Post;

class BookController extends Controller
{
    public function index()
    {
        return view('homepage', [
            "books" => Book::latest()->get()
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'book_name' => 'required|max:100',
            'author'   => 'required',
            'review'   => 'required',
        ]);

        Book::create([
            'book_name' => $request->input('book_name'),
            'author' => $request->input('author'),
            'review' => $request->input('review'),
        ]);

        return back()->with('success', 'success');
    }

    public function edit($id)
    {
        $book = Book::find($id);
        return view('edit', compact('book'));
    }

    public function update(Request $request, $id)
    {
        $book = Book::find($id);
        $book->book_name = $request->input('book_name');
        $book->author = $request->input('author');
        $book->review = $request->input('review');

        $book->save();
        return back()->with('success', 'Book updated successfully');
    }

    public function delete($id)
    {
        $book = Book::find($id);
        $book->delete();
        return view('delete');
    }
}
