<?php

namespace App\Http\Controllers;

use App\Client;
use App\Contrat;
use App\Http\Requests\ContratRequest;
use App\Notifications\ClientAdded;
use App\Notifications\ContractAdded;
use App\Notifications\ContractDeleted;
use App\Notifications\InvoiceAdded;
use App\TypeService;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContratController extends Controller
{
    public function index()
    {
        $contrats = Contrat::all();

        return view('contrats.index',['contrats'=>$contrats]);
    }



    public function create()
    {
        $clients=Client::all();
        $employes = User::where('role','employe')->get();
        $type_services=TypeService::all();
        return view('contrats.add',compact('clients','employes','type_services'));
    }


    public function store(ContratRequest $request)
    {
        $logged = Auth::user();
        if ($logged->role == 'admin') {
            Contrat::create($request->all());
        } else {
            $contrat = new Contrat($request->all());
            $contrat->employe_id = $logged->id;
            $contrat->save();
            User::where('role','admin')->first()->notify(new ContractAdded($contrat, $logged));
        }
        return redirect()->route('contrats.index')->with('success','Contract added ');
    }


    public function edit($id)
    {
        $contrat = Contrat::find($id);
        $clients=Client::all();
        $employes = User::where('role','employe')->get();
        $type_services=TypeService::all();
        return view('contrats.edit', ['contrat' => $contrat,'clients'=>$clients,'employes'=>$employes,'type_services'=>$type_services]);
    }


    public function update(ContratRequest $request, $id)
    {
        $logged = Auth::user();
        $contrat = Contrat::find($id);
        if ($logged->role == 'admin') {
            $contrat->update($request->all());
        } else {
            $contrat->update($request->except('employe_id'));
            $contrat->employe_id = $logged->id;
            $contrat->save();
        }


        return redirect()->route('contrats.index')->with('success','Contract Updated');
    }


    public function destroy($id)
    {
        $contrat = Contrat::find($id);

        $logged = Auth::user();
        if ($logged->role != 'admin') {
            User::where('role','admin')->first()->notify(new ContractDeleted($contrat, $logged));
        }
        $contrat->delete();
        return redirect()->route('contrats.index')->with('success','Contract Deleted');
    }
}
