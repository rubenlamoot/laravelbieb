<?php

namespace App\Http\Controllers;

use App\Address;
use App\Http\Requests\UsersEditRequest;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $user = User::findOrFail($id);
        $roles = Role::pluck('name', 'id')->all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersEditRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $address1 = Address::findOrFail($user->address_id);

        $address = new Address();
        $address->street = $request['street'];
        $address->house_nr = $request['house_nr'];
        $address->bus_nr = $request['bus_nr'];
        $address->postal_code = $request['postal_code'];
        $address->city = $request['city'];

        if($address1 == $address){
            $new_address = $address->id;
        }else{
            $aantal = DB::table('users')->where('address_id', $user->address_id)->count();
            if($aantal > 1){
                $address->create();
                $new_address = $address->id;
            }else{
                $address->save();
                $new_address = $address->id;
            }
        }

        if(trim($request->password) == ''){
            $input = $request->except('password', 'street', 'house_nr', 'bus_nr', 'postal_code', 'city');
        }else{
            $input = $request->except('street', 'house_nr', 'bus_nr', 'postal_code', 'city');
            $input['password'] = Hash::make($request['password']);
        }
        $input['address_id'] = $new_address;
        $user->update($input);

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
}
