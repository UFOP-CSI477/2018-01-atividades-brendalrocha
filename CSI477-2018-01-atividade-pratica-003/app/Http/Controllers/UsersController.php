<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }

    public function list_patients()
    {
        
        $adm = array();
        $op = array();

        if(Auth::user()->type==1){
            $patients = User::orderBy('name')->where('type', 0)->get();
            return view('users.index')->with('patients', $patients)
                                      ->with('adm', $adm)
                                      ->with('op', $op)
                                      ->with('list', 0);
        }else{
            session()->flash('mensagem', 'Acesso Negado!');
            return redirect()->route('user.index');
        }
    }

    public function list_employees()
    {
        $patients = array();
        if(Auth::user()->type==1){
            $adm = User::orderBy('name')->where('type', 1)->get();
            $op = User::orderBy('name')->where('type', 2)->get();
            return view('users.index')->with('patients', $patients)
                                      ->with('adm', $adm)
                                      ->with('op', $op)
                                      ->with('list', 1);
        }else{
            session()->flash('mensagem', 'Acesso Negado!');
            return redirect()->route('user.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('usuario.user.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('usuario.user.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->type = $request->type;

        //$user->fill($request->has('password') ? $request->all() : $request->except(['password']));
        $user->save();
        session()->flash('mensagem','Usuário atualizado com sucesso!');
        return redirect()->route('user.show', $user->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
