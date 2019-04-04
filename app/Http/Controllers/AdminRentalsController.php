<?php

namespace App\Http\Controllers;

use App\Book;
use App\Http\Requests\RentalsRequest;
use App\Rental;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

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
        $user_rentals = Rental::where([['user_id', $input['user_id']], ['book_in', NULL]])->get();
        $total_rentals = count($user_rentals);
        $book_rentals = Rental::where([['book_id', $input['book_id']], ['book_in', NULL]])->get();
        $total_books_rented = count($book_rentals);
        $total_books = Book::findOrFail($input['book_id']);
        if($total_rentals >= 7){
            return redirect()->back()->with('alert', 'Sorry, deze gebruiker heeft reeds zeven boeken ontleend. Dit is het maximum.');
        }elseif($total_books_rented >= $total_books->aantal){
            return redirect()->back()->with('alert', 'Sorry, alle exemplaren van dit boek zijn reeds uitgeleend.');
        }else{
            $input['book_out'] = now();
            Rental::create($input);
            return redirect('admin/rentals');
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

        return redirect('admin/rentals/open');

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
    /** Toon alle openstaande ontleningen die te laat binnen zijn*/
    public function late(){
        $date = Carbon::now();

        if(Auth::check()){
            if(Auth::user()->isAdmin()){
                $rentals = Rental::where([['book_in', NULL], ['book_out', '<', $date->subDays(14)]])->paginate(15);
            }else{
                $rentals = Rental::where([['user_id', Auth::user()->id],['book_in', NULL], ['book_out', '<', $date->subDays(14)]])->paginate(15);
            }
        }
        return view('admin.rentals.late', compact('rentals'));
    }
    /** Toon alle ontleningen van een bepaalde user */
    public function user(){
        $rentals = Rental::where('user_id', Auth::user()->id)->orderBy('book_out', 'desc')->paginate(15);

        return view('admin.rentals.user', compact('rentals'));
    }
    /** Toon alle ontlening van een user die te laat binnen zijn */
    public function user_late(){
        $date = Carbon::now();

        $rentals = Rental::where([['user_id', Auth::user()->id],['book_in', NULL], ['book_out', '<', $date->subDays(14)]])->paginate(15);

        return view('admin.rentals.user_late', compact('rentals'));
    }

    public function user_rent(Request $request){
        $input = $request->all();
        $user_rentals = Rental::where([['user_id', $input['user_id']], ['book_in', NULL]])->get();
        $total_rentals = count($user_rentals);
        $book_rentals = Rental::where([['book_id', $input['book_id']], ['book_in', NULL]])->get();
        $total_books_rented = count($book_rentals);
        $total_books = Book::findOrFail($input['book_id']);
        if($total_rentals >= 7){
            return redirect()->back()->with('alert', 'Sorry, je hebt reeds zeven boeken ontleend. Dit is het maximum.');
        }elseif($total_books_rented >= $total_books->aantal){
            return redirect()->back()->with('alert', 'Sorry, alle exemplaren van dit boek zijn reeds uitgeleend.');
        }else{
            $input['book_out'] = now();
            Rental::create($input);
            return redirect('admin/rentals/user');
        }
    }

    public function user_rent_back(Request $request){

        $rental = Rental::findOrFail($request->id);
        $rental->book_in = now();
        $rental->update();

        return redirect('admin/rentals/user');
    }

}
