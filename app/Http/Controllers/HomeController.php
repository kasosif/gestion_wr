<?php

namespace App\Http\Controllers;

use App\Client;
use App\Contrat;
use App\Facture;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $logged = Auth::user();
        if ($logged->role == 'admin') {
            $nb_clients = Client::count();
            $nb_employes = User::where('role','employe')->count();
            $nb_factures = Facture::count();
            $nb_contrats = Contrat::count();
        } else {
            $nb_clients = Client::where('user_id',$logged->id)->count();
            $nb_employes = 0;
            $nb_factures = Facture::where('user_id',$logged->id)->count();
            $nb_contrats = Contrat::where('employe_id',$logged->id)->count();
        }
        return view('dashboard',compact('nb_clients','nb_employes','nb_factures','nb_contrats'));
    }
}
