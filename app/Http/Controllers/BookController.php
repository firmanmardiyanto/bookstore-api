<?php

namespace App\Http\Controllers;

use App\Http\Resources\Book as BookResource;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    //
    public function print($title) {
        return $title;
    }

    public function index()
    {
        $books = DB::select('select * from books');
        return $books;
    }

    public function view($id)
    {
        /*
        $book = DB::select('select * from books where id = :id', ['id' => $id
        ]);
        */
        $book = new BookResource(Book::find($id));
        return $book;
    }
}
