<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    //
    public function search(Request $request){

        if(!$request->searchAuthor == ''){
            $books = Book::join('authors', 'books.author_id', '=', 'authors.id')->select('books.*')->where([['authors.name', 'like', '%' . $request->searchAuthor . '%'], ['books.aantal', '>', 0]])->paginate(5);
        }elseif(!$request->searchTitle == ''){
            $books = Book::select('books.*')->where([['books.title', 'like', '%' . $request->searchTitle . '%'], ['books.aantal', '>', 0]])->paginate(5);
        }elseif(!$request->searchWords == ''){
            $books = Book::select('books.*')->where([['books.description', 'like', '%' . $request->searchWords . '%'], ['books.aantal', '>', 0]])->simplePaginate(5);
        }else{
            $books = '';
        }
        if(Auth::check()){
            return view('admin.books.result', compact('books'));
        }
        return view('result', compact('books'));
    }

}
