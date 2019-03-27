<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersEditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
//            'name' => 'required|string',
//            'email' => 'required',
//            'first_name' => 'required|string',
//            'last_name' => 'required|string',
//            'insurance_nr' => 'required|string',
//            'street' => 'required|string',
//            'house_nr' => 'required',
//            'postal_code' => 'required',
//            'city' => 'required|string',

//            'name' => ['required', 'string', 'max:255'],
//            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
//            'first_name' => ['required', 'string', 'max:255'],
//            'last_name' => ['required', 'string', 'max:255'],
//            'insurance_nr' => ['required', 'string', 'min:11', 'max:11', 'unique:users'],
//            'street' => ['required', 'string', 'max:255'],
//            'house_nr' => ['required', 'max:10'],
//            'bus_nr' => ['max:10'],
//            'postal_code' => ['required', 'string', 'max:20'],
//            'city' => ['required', 'string', 'max:255'],
        ];
    }

    public function messages(){
        return [
            'email.required' => 'Email is verplicht',
            'name.required' => 'Gebruikersnaam is verplicht',
            'first_name.required' => 'Voornaam is verplicht',
            'last_name.required' => 'Familienaam is verplicht',
            'insurance_nr.required' => 'Rijksregisternummer is verplicht',
            'street.required' => 'Straat is verplicht',
            'house_nr.required' => 'Huisnummer is verplicht',
            'postal_code.required' => 'Postcode is verplicht',
            'city.required' => 'Stad is verplicht'
        ];

    }
}
