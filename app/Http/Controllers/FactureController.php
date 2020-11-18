<?php


namespace App\Http\Controllers;


use App\Client;
use App\Facture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            'client_id'=>'required|numeric',
            'contrat_id'=>'nullable|numeric',
            'objet' => 'required',
            "services"    => "required|array|min:1",
            'services.*.title' => 'required|string',
            'services.*.qty' => 'required|integer',
            'services.*.unity'    => 'required|string',
            'services.*.price'    => 'required|numeric',
        ]);

        $facture = new Facture($request->except('services'));
        $facture->reference = $id = hexdec( uniqid() );
        $facture->user_id = Auth::id();
        $facture->body = json_encode($request->services,JSON_UNESCAPED_SLASHES);
        $facture->save();
        return redirect()->route('factures.index')
            ->with('success', 'Invoice Added');
    }


    public function show($id)
    {
        $facture= Facture::find($id);
        return view('factures.details', compact('facture'));
    }

    public function destroy($id)
    {        $facture=Facture::find($id);

        $facture->delete();

        return redirect()->route('factures.index')
            ->with('success', 'Facture supprimée avec succès');
    }
}
