<?php

namespace App\Http\Controllers;

use App\Contrat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AjaxController extends Controller
{
    public function contracts($client_id = null) {
        $logged = Auth::user();

        if (!$logged) { return response()->json(['error' => 'Unauthorized']);}

        if (!$client_id) {
            if ( $logged->role != 'admin' ) {return response()->json(['error' => 'Client missing']);}
            $contracts = Contrat::all();
            return response()->json(['success' => true,'contracts' => $contracts]);
        }

        $contracts = Contrat::where('client_id',$client_id)->get();
        return response()->json(['success' => true,'contracts' => $contracts]);

    }
}
