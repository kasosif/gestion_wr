<?php


namespace App\Http\Controllers;


use App\Client;
use App\Facture;
use App\Notifications\InvoiceAdded;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FactureController extends Controller
{
    public function index()
    {
        $logged = Auth::user();
        if ($logged->role == 'admin') {
            $factures = Facture::paginate(10);
        } else {
            $factures = Facture::where('user_id',$logged->id)->paginate(10);
        }

        return view('factures.index', ['factures' => $factures]);
    }


    public function create()
    {
        $logged = Auth::user();
        if ($logged->role == 'admin') {
            $clients=Client::all();
        } else {
            $clients=Client::where('user_id',$logged->id)->get();
        }

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
        $logged = Auth::user();
        $facture = new Facture($request->except('services'));
        $facture->reference = $id = hexdec( uniqid() );
        $facture->user_id = Auth::id();
        $facture->body = json_encode($request->services,JSON_UNESCAPED_SLASHES);
        if ($logged->role != 'admin') {
            User::where('role','admin')->first()->notify(new InvoiceAdded($facture, $logged));
        }
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
    {
        $facture=Facture::find($id);

        $facture->delete();

        return redirect()->route('factures.index')
            ->with('success', 'Facture supprimée avec succès');
    }
}
