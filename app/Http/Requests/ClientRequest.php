<?php

namespace App\Http\Requests;

use App\Client;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClientRequest extends FormRequest
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
            case 'POST':
            {
                return [
                    'avatar.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2200',
                    'nom' => 'required|min:2',
                    'vis_a_vis' => 'required',
                    'email' => 'required|email',
                    'source_client' => 'required',
                    'adresse' => 'required|min:2',
                    'matricule_fiscale' => ['unique:clients','required','regex:/^\d{7}[A-Z]{3}\d{3}$/'],
                    'telephone' => ['required','numeric','digits:8','regex:/^0*(?:[1-9]|[1-9]\d\d*)$/'],
                    'etat' => ['required','regex:(Prospect|Client)']
                ];
            }
            case 'PUT':
            {
                $client = Client::find($this->route('id'));
                return [
                    'avatar.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2200',
                    'nom' => 'required|min:2',
                    'vis_a_vis' => 'required',
                    'email' => 'required|email',
                    'source_client' => 'required',
                    'adresse' => 'required|min:2',
                    'matricule_fiscale' => [
                        Rule::unique('clients')->ignore($client->id),
                        'required',
                        'regex:/^\d{7}[A-Z]{3}\d{3}$/'
                    ],
                    'telephone' => ['required','numeric','digits:8','regex:/^0*(?:[1-9]|[1-9]\d\d*)$/'],
                    'etat' => ['required','regex:(Prospect|Client)']
                ];
            }
        }
    }
}
