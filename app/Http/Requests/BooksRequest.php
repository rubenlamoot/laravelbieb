<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BooksRequest extends FormRequest
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
            'title' => 'required|string',
            'author_id' => 'required',
            'isbn' => 'required|min:13|max:13',
            'published' => 'required',
            'edition' => 'required',
            'description' => 'required',
            'aantal' => 'required'
        ];
    }

    public function messages(){
        return [
            'title.required' => 'Titel is verplicht',
            'author_id.required' => 'Auteur is verplicht',
            'isbn.required' => 'Isbn is verplicht',
            'isbn.min' => 'Isbn moet uit minstens 13 cijfers bestaan',
            'isbn.max' => 'Isbn mag maar uit 13 cijfers bestaan',
            'published.required' => 'Jaar van uitgave is verplicht',
            'edition.required' => 'Editie is verplicht',
            'description.required' => 'Beschrijving is verplicht',
            'aantal.required' => 'Aantal is verplicht',

        ];

    }
}
