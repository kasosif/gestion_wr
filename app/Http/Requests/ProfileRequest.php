<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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

        switch ($this->method()){
            case 'PATCH':
            {
                return [
                    'image' => 'required',
                    'image.*' => 'required|image|mimes:jpeg,png,jpg|max:2200'
                ];
            }
            case 'PUT':
            {
                return [
                    'image.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2200',
                    'telephone' => ['required','numeric','digits:8','regex:/^0*(?:[1-9]|[1-9]\d\d*)$/'],
                    'nom' => 'required|min:2',
                    'prenom' => 'required|min:2',
                    'adresse' => 'nullable|min:2',
                ];
            }
        }
        return [];
    }
}
