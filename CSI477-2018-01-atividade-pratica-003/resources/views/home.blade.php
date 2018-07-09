@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                {{-- adm --}}
                @if(Auth::user()->type==1)
                    <div class="card-header">Bem vindo à área administrativa!</div>
                {{-- op --}}
                @elseif(Auth::user()->type==2)
                    <div class="card-header">Bem vindo à área do operador!</div>
                {{-- paciente --}}
                @else
                    <div class="card-header">Bem vindo à área do paciente!</div>
                @endif

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- adm --}}
                    @if(Auth::user()->type==1)
                        <p>Aqui você poderá cadastrar, editar, listar e excluir procedimentos e gerar relatório sobre os exames solicitados.</p>
                    {{-- op --}}
                    @elseif(Auth::user()->type==2)
                        <p>Aqui você poderá listar os procedimentos e alterar seus valores.</p>
                    {{-- paciente --}}
                    @else
                        <p>Aqui você poderá solictar exames e visualizar todos os exames já solicitados.</p>
                    @endif


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
