<?php

namespace App\Http\Controllers;

use App\Procedure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProceduresController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth',['except' => ['index']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prodecures = Procedure::orderBy('name')->get();
        return view('procedures.index')->with('procedures',$prodecures);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->type==1){
            return view('procedures.create');
        }
        //usuário comum
        else{
            session()->flash('mensagem', 'Acesso Negado!');
            return redirect()->route('user.index');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::user()->type==1){
            Procedure::create($request->all());
            session()->flash('mensagem', 'Procedimento inserido com sucesso!');
            return redirect()->route('procedures.index');
        }
        else{
            session()->flash('mensagem', 'Acesso Negado!');
            return redirect()->route('user.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Procedure  $procedure
     * @return \Illuminate\Http\Response
     */
    public function show(Procedure $procedure)
    {
        //administrador
        if(!Auth::user()->type==0){
            return view('procedures.show')->with('procedure', $procedure); 
        }
        //usuário comum
        else{
            session()->flash('mensagem', 'Acesso Negado!');
            return redirect()->route('user.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Procedure  $procedure
     * @return \Illuminate\Http\Response
     */
    public function edit(Procedure $procedure)
    {
        //administrador
        if(!Auth::user()->type==0){
            return view('procedures.edit')->with('procedure', $procedure);    
        }
        //usuário comum
        else{
            session()->flash('mensagem', 'Acesso Negado!');
            return redirect()->route('user.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Procedure  $procedure
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Procedure $procedure)
    {
        if(Auth::user()->type==0){
            session()->flash('mensagem', 'Acesso Negado!');
            return redirect()->route('user');
        }
        else{
            $procedure->fill($request->all());
            $procedure->save();
            session()->flash('mensagem','Procedimento atualizado com sucesso!');
            return redirect()->route('procedures.show', $procedure->id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Procedure  $procedure
     * @return \Illuminate\Http\Response
     */
    public function destroy(Procedure $procedure)
    {
        //administrador
        if(!Auth::user()->type==1){
            session()->flash('mensagem', 'Acesso Negado!');
            return redirect()->route('user.index');
        }
        else{
            $tests = $procedure->tests()->get();
            if($tests->isEmpty()){
                $procedure->delete();
                session()->flash('mensagem', 'Procedimento excluído com sucesso!');
                return redirect()->route('procedures.index');
            }
            else{
                session()->flash('mensagem', 'Não foi possivel excluir o procedimento, pois existem exames relacionados a ele.');
                return redirect()->route('procedures.index');
            }


            
        }
    }
}
