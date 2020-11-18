<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class EmployeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->role == 'admin';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()){
            case 'POST':
            {
                return [
                    'avatar.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2200',
                    'telephone' => ['required','numeric','digits:8','regex:/^0*(?:[1-9]|[1-9]\d\d*)$/'],
                    'nom' => 'required|min:2',
                    'prenom' => 'required|min:2',
                    'date_embauche' => 'required|date|before:today',
                    'poste' => 'required|min:2',
                    'adresse' => 'nullable|min:2',
                    'email' => 'required|unique:users|email',
                ];
            }
            case 'PUT':
            {
                $user = User::find($this->route('id'));
                return [
                    'avatar.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2200',
                    'telephone' => ['required','numeric','digits:8','regex:/^0*(?:[1-9]|[1-9]\d\d*)$/'],
                    'nom' => 'required|min:2',
                    'prenom' => 'required|min:2',
                    'date_embauche' => 'required|date|before:today',
                    'poste' => 'required|min:2',
                    'adresse' => 'nullable|min:2',
                    'email' => [
                        'required',
                        Rule::unique('users')->ignore($user->id),
                        'email'
                    ],
                ];
            }
        }
    }
}
