<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeRequest;
use App\Mail\WelcomeMailGw;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class EmployeeController extends Controller
{
    public function index()
    {
        $employes = User::where('role','employe')->get();
        return view('employees.index',['employes'=>$employes]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  EmployeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeRequest $request)
    {
        $plainpass = Str::random(8);
        $params = ['role' => 'employe', 'password' => Hash::make($plainpass)];
        if ($image = $request->files->get('avatar')) {
            $destinationPath = 'assets/images/users/'; // upload path
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $params['avatar'] = $profileImage;
        }
        $employe = User::create(array_merge($request->all(), $params));
        Mail::to($employe->email)->send(new WelcomeMailGw($employe,$plainpass));
        return redirect()->route('employe.index')->with('success','Employe added ');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  mixed  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employe = User::find($id);
        return view('employees.edit', compact('employe'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  EmployeRequest $request
     * @param  mixed  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeRequest $request, $id)
    {
        $employe = User::find($id);
        $params = [];
        if ($image = $request->files->get('avatar')) {
            $destinationPath = 'assets/images/users/'; // upload path
            if ($employe->avatar && file_exists(public_path().'/assets/images/users/'.$employe->avatar)) {
                unlink(public_path().'/assets/images/users/'.$employe->avatar);
            }
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $params['avatar'] = $profileImage;
        }
        if ($password = $request->get('password'))
            $employe->password = Hash::make($password);
        $employe->update(array_merge($request->except(['privileges','password']),$params));

        return redirect()->route('employe.index')->with('success','Employee Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employe = User::find($id);
        if ($employe->avatar && file_exists(public_path().'/assets/images/users/'.$employe->avatar)) {
            unlink(public_path().'/assets/images/users/'.$employe->avatar);
        }
        $employe->delete();
        return redirect()->route('employe.index')->with('success','Employee Deleted');
    }
}
