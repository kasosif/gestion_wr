<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ContratRequest extends FormRequest
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
            'date_debut'=>'required|date' ,
            'date_fin'=> 'required|date|after:date_debut',
            'montant'=>'required|numeric|min:1' ,
            'modalite_paiement'=>['required','regex:(monthly|weekly|per year|per project)'],
            'type_paiement'=> ['required','regex:(check|cash)'],
            'type_service_id'=> 'required|numeric',
            'client_id'=> 'required|numeric',
            'employe_id'=> Auth::user()->role == 'admin' ?  'required|numeric' : 'nullable',
            'etat'=> ['required','regex:(Active|Renewed|Stopped)'],


        ];
    }
}
