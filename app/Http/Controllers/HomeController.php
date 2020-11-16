<?php

namespace App\Http\Controllers;

use App\Client;
use App\Contrat;
use App\Facture;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $nb_clients = Client::count();
        $nb_employes = User::where('role','employe')->count();
        $nb_factures = Facture::count();
        $nb_contrats = Contrat::count();
        return view('dashboard',compact('nb_clients','nb_employes','nb_factures','nb_contrats'));
    }
}
