<?php

namespace App\Http\Controllers;

use App\Address;
use App\Http\Requests\UsersEditRequest;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
        $users = User::orderBy('id', 'desc')->paginate(15);
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
        $user = User::findOrFail($id);
        return view('admin.users.show', compact('user'));
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
        $address1 = $user->addresses;

        $input_address = $request->except('name', 'email', 'password', 'first_name', 'last_name', 'insurance_nr', 'role_id', 'is_active');

        if(trim($request->password) == ''){
            $input = $request->except('password', 'street', 'house_nr', 'bus_nr', 'postal_code', 'city');
        }else{
            $input = $request->except('street', 'house_nr', 'bus_nr', 'postal_code', 'city');
            $input['password'] = Hash::make($request['password']);
        }
        $user->update($input);
        if(($address1[0]->street == $input_address['street']) && ($address1[0]->house_nr == $input_address['house_nr']) && ($address1[0]->bus_nr == $input_address['bus_nr']) && ($address1[0]->postal_code == $input_address['postal_code']) && ($address1[0]->city == $input_address['city'])){

        }else{
            if($address2 = Address::where([['street', '=', $input_address['street']], ['house_nr', '=', $input_address['house_nr']], ['bus_nr', '=', $input_address['bus_nr']], ['postal_code', '=', $input_address['postal_code']], ['city', '=', $input_address['city']]])->first()) {
                $address2->update_address_user($user->id, $address1[0]->id, $address2->id);
            }else{
                $aantal = DB::table('address_user')->where('address_id', $address1[0]->id)->count();
                if($aantal > 1){
                    $address = Address::create($input_address);
                    $address->update_address_user($user->id, $address1[0]->id, $address->id);
                }else{
                    $address1[0]->update($input_address);
                }
            }
        }

        return redirect('admin/users');
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
