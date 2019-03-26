<?php

namespace App\Http\Controllers\Auth;

use App\Address;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'insurance_nr' => ['required', 'string', 'min:11', 'max:11', 'unique:users'],
            'street' => ['required', 'string', 'max:255'],
            'house_nr' => ['required', 'max:10'],
            'bus_nr' => ['max:10'],
            'postal_code' => ['required', 'string', 'max:20'],
            'city' => ['required', 'string', 'max:255'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $address = new Address();
        $address->street = $data['street'];
        $address->house_nr = $data['house_nr'];
        $address->bus_nr = $data['bus_nr'];
        $address->postal_code = $data['postal_code'];
        $address->city = $data['city'];
        $address = Address::firstOrCreate([
            'street' => $address->street,
            'house_nr' => $address->house_nr,
            'bus_nr' => $address->bus_nr,
            'postal_code' => $address->postal_code,
            'city' => $address->city
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'insurance_nr' => $data['insurance_nr'],
//            'address_id' => $address->id,
//            'street' => $data['street'],
//            'house_nr' => $data['house_nr'],
//            'bus_nr' => $data['bus_nr'],
//            'postal_code' => $data['postal_code'],
//            'city' => $data['city'],
        ]);
        $user->addresses()->save($address);
        $address->users()->save($user);

        return $user;
    }
}
