<?php


namespace App\Http\Controllers;


use App\Client;
use App\Facture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FactureController extends Controller
{
    public function index()
    {


        $factures = Facture::paginate(5);

        return view('factures.index', ['factures' => $factures]);
    }


    public function create()
    {
        $clients=Client::all();
         return view('factures.create',compact('clients'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'client_id'=>'required',
            'objet' => 'required'
        ]);


         $facture = new Facture([
             'client_id' => $request->get('client_id'),

            'objet' => $request->get('objet')
        ]);
        $facture->save();
        return redirect()->route('factures.index')
            ->with('success', 'Facture ajoutée avec succès.');
    }


    public function show($id)
    {
        $facture=Facture::find($id);
         return view('factures.details', compact('facture'));
    }


    public function edit($id)
    {        $facture=Facture::find($id);
        $clients=Client::all();

        return view('factures.edit', compact('facture','clients'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'objet' => 'required',

        ]);
        $facture=Facture::find($id);
        $facture->objet=$request->objet;
        $facture->save();
        return redirect()->route('factures.index')
            ->with('success', 'Facture modifiée avec succès');
    }

    public function destroy($id)
    {        $facture=Facture::find($id);

        $facture->delete();

        return redirect()->route('factures.index')
            ->with('success', 'Facture supprimée avec succès');
    }
}
