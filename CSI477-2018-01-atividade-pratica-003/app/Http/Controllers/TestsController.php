<?php

namespace App\Http\Controllers;

use App\Test;
use App\Procedure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TestsController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->type==0){
            $tests = Test::join('procedures', 'procedures.id', '=', 'tests.procedure_id')
                           ->orderBy('tests.date', 'desc')
                           ->orderBy('procedures.name')
                           ->where('tests.user_id', Auth::user()->id)
                           ->get();
        }
        else{
            $tests = Test::orderBy('date')->get();
        }
        
        $amount_tests = Test::where('user_id', Auth::user()->id)->count();
        $total_payable_tests = Test::join('procedures', 'procedures.id', '=', 'tests.procedure_id')
                                     ->where('tests.user_id', Auth::user()->id)
                                     ->sum('price');
        
        return view('tests.index')->with('tests',$tests)
                                  ->with('amount_tests', $amount_tests)
                                  ->with('total_payable_tests', $total_payable_tests);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->type==0){
            $procedures = Procedure::orderBy('name')->get();
            return view('tests.create')->with('procedures', $procedures);
        }
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
        if(Auth::user()->type==0){
            Test::create($request->all());
            session()->flash('mensagem', 'Exame agendado com sucesso!');
            return redirect()->route('tests.index');
        }
        else{
            session()->flash('mensagem', 'Acesso Negado!');
            return redirect()->route('user.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function show(Test $test)
    {
        if(!Auth::user()->type==2){
            return view('tests.show')->with('test', $test); 
        }
        else{
            session()->flash('mensagem', 'Acesso Negado!');
            return redirect()->route('user.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function edit(Test $test)
    {
        if(Auth::user()->type==0){
            $procedures = Procedure::orderBy('name')->get();
            return view('tests.edit')->with('test', $test)
                                     ->with('procedures', $procedures);    
        }
        else{
            session()->flash('mensagem', 'Acesso Negado!');
            return redirect()->route('user.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Test $test)
    {
        if(Auth::user()->type==0){
            $test->fill($request->all());
            $test->save();
            session()->flash('mensagem','Atualização de agendamento realizada com sucesso!');
            return redirect()->route('tests.show', $test->id);
        }
        else{
            session()->flash('mensagem', 'Acesso Negado!');
            return redirect()->route('user');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function destroy(Test $test)
    {
        if(Auth::user()->type==0){
            $test->delete();
            session()->flash('mensagem', 'Agendamento de exame excluído com sucesso!');
            return redirect()->route('tests.index');
        }
        else{
            session()->flash('mensagem', 'Acesso Negado!');
            return redirect()->route('user');
        }
    }
}
