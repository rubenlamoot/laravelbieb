<?php

namespace App\Http\Controllers;

use App\Book;
use App\Http\Requests\RentalsRequest;
use App\Rental;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class AdminRentalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $rentals = Rental::paginate(15);

        return view('admin.rentals.index', compact('rentals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $users = User::pluck('name', 'id')->all();
        $books = Book::pluck('title', 'id')->all();

        $users = Arr::sort($users);
        $books = Arr::sort($books);

        return view('admin.rentals.create', compact('users', 'books'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RentalsRequest $request)
    {
        //
        $input = $request->all();
        $user_rentals = Rental::where('user_id', $input['user_id'])->get();
        $total_rentals = count($user_rentals);
        if($total_rentals >= 7){
            echo("Deze gebruiker heeft reeds zeven boeken ontleend. Dit is het maximum.");
        }else{
            $input['book_out'] = now();
            Rental::create($input);
            return redirect('admin\rentals');
        }

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
        $rental = Rental::findOrFail($id);
        return view('admin.rentals.edit', compact('rental'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $rental = Rental::findOrFail($id);
        $rental->book_in = now();
        $rental->update();

        return redirect('admin/rentals');

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

    /** Toon alle openstaande ontleningen */
    public function open(){
        $rentals = Rental::where('book_in', NULL)->paginate(15);


        return view('admin.rentals.open', compact('rentals'));
    }
}
