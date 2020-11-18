<?php

namespace App\Http\Controllers;

use App\Client;
use App\Contrat;
use App\Http\Requests\ContratRequest;
use App\TypeService;
use App\User;
use Illuminate\Http\Request;

class ContratController extends Controller
{
    public function index()
    {
        $contrats = Contrat::all();

        return view('contrats.index',['contrats'=>$contrats]);
    }



    public function create()
    { $clients=Client::all();
        $employes = User::where('role','employe')->get();
            $type_services=TypeService::all();
        return view('contrats.add',compact('clients','employes','type_services'));
    }


    public function store(ContratRequest $request)
    {
       Contrat::create($request->all());
         return redirect()->route('contrats.index')->with('success','Contract added ');
    }


    public function edit($id)
    {
        $contrat = Contrat::find($id);
        $clients=Client::all();
        $employes = User::where('role','employe')->get();
        $type_services=TypeService::all();
        return view('contrats.edit', compact(['contrat','clients'=>$clients,'employes'=>$employes,'type_services'=>$type_services]));
    }


    public function update(ContratRequest $request, $id)
    {
        $contrat = Contrat::find($id);
        $contrat->update($request->all());

        return redirect()->route('contrats.index')->with('success','Contract Updated');
    }


    public function destroy($id)
    {
        $employe = Contrat::find($id);

        $employe->delete();
        return redirect()->route('contrats.index')->with('success','Contract Deleted');
    }
}
