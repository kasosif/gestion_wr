<?php

namespace App\Http\Controllers;

use App\Client;
use App\Http\Requests\ClientRequest;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::orderBy('created_at','desc')->paginate(10);
        return view('clients.index',['clients'=>$clients]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ClientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $request)
    {
        $params = [];
        if ($image = $request->files->get('avatar')) {
            $destinationPath = 'assets/images/users/'; // upload path
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $params['avatar'] = $profileImage;
        }
        Client::create(array_merge($request->all(),$params));
        return redirect()->route('clients.index')->with('success','Client added ');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  mixed  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::find($id);
        return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ClientRequest $request
     * @param  mixed  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClientRequest $request, $id)
    {
        $client = Client::find($id);
        $params = [];
        if ($image = $request->files->get('avatar')) {
            $destinationPath = 'assets/images/users/'; // upload path
            if ($client->avatar && file_exists(public_path().'/assets/images/users/'.$client->avatar)) {
                unlink(public_path().'/assets/images/users/'.$client->avatar);
            }
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $params['avatar'] = $profileImage;

        }

        $client->update(array_merge($request->all(),$params));

        return redirect()->route('clients.index')->with('success','Client Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::find($id);
        if ($client->avatar && file_exists(public_path().'/assets/images/users/'.$client->avatar)) {
            unlink(public_path().'/assets/images/users/'.$client->avatar);
        }
        $client->delete();
        return redirect()->route('clients.index')->with('success','Client Deleted');
    }
}
