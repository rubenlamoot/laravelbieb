<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\Http\Requests\BooksRequest;
use App\Photo;
use Illuminate\Http\Request;

class AdminBooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $books = Book::orderBy('id', 'desc')->paginate(15);
        return view('admin.books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $authors = Author::pluck('name', 'id')->all();
        return view('admin.books.create', compact('authors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BooksRequest $request)
    {
        //
        $input = $request->all();

        if($file = $request->file('photo_id')){
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['filename' => $name]);
            $input['photo_id'] = $photo->id;
        }
        Book::create($input);

        return redirect('admin/books');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $book = Book::findOrFail($id);
        $authors = Author::pluck('name', 'id')->all();

        return view('admin.books.edit', compact('book', 'authors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BooksRequest $request, $id)
    {
        //
        $book = Book::findOrFail($id);
        $input = $request->all();

        if($file = $request->file('photo_id')){
            $old_photo = Photo::findOrFail($book->photo_id);
            if($old_photo){
                $old_file = "images/" . $old_photo->filename;
                if (file_exists($old_file)) {
                    @unlink($old_file);
                }
                $name = time() . $file->getClientOriginalName();
                $file->move('images', $name);
                $old_photo->update(['filename' => $name]);
                $input['photo_id'] = $old_photo->id;
            }else{
                $name = time() . $file->getClientOriginalName();
                $file->move('images', $name);
                $photo = Photo::create(['filename' => $name]);
                $input['photo_id'] = $photo->id;
            }
        }
        $book->update($input);

        return redirect('admin/books');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function search(){


        return view('admin.books.search');
    }
}
