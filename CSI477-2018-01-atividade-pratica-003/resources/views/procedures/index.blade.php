@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
	    <div class="col-md-10">
            <h2>Procedimentos</h2>
	    </div>
	    @if(!Auth::user()->type==0)
		    <div class="col-md-2">
		    	<a href="{{ route('procedures.create') }}" class="btn btn-success">Adicionar procedimento</a>
		    </div>
		@else
			<div class="col-md-2">
		    	<a href="{{ route('tests.create') }}" class="btn btn-success">Solicitar exame</a>
		    </div>
	    @endif
	</div>
	<div class="row">
		<div class="col-md-12">
			<table class="table table-borderless table-striped">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Preço (R$)</th>
                        <th>Atualizado em</th>
                        @auth
                        	@if(!Auth::user()->type==0)
		                        <th>Responsável pelo cadastro</th>
		                        <th style="padding: 22px 22px;text-align: center;">Ações</th>
		                    @endif
                        @endauth
                    </tr>
                </thead>
                <tbody>
                    @foreach($procedures as $item)
                    <tr>
                        <td>{{$item->name}}</td>
                        <td>{{$item->price}}</td>                        
                        <td>{{$item->updated_at}}</td>
                        @auth
                        	@if(!Auth::user()->type==0)
                        		<td>{{$item->user->name}}</td>
		                        <td style="padding:12px 22px;text-align:center;">
		                            <div class="row">
		                            	@if(Auth::user()->type==1)
		                                	<div class="col-md-4">
		                                @else
		                                	<div class="col-md-6">
		                                @endif
		                                    <a href="{{ route('procedures.show', $item->id) }}" class="btn btn-primary btn-sm" style="width:100%;">Detalhes</a>
		                                </div>
		                                @if(Auth::user()->type==1)
		                                	<div class="col-md-4">
		                                @else
		                                	<div class="col-md-6">
		                                @endif
		                                    <a href="{{ route('procedures.edit', $item->id) }}" class="btn btn-primary btn-sm" style="width:100%;">Editar</a>
		                                </div>
		                                @if(Auth::user()->type==1)
			                                <div class="col-md-4">
			                                    <form method="post" action="{{ route('procedures.destroy', $item->id) }}">
			                                        @csrf
			                                        @method('DELETE')
			                                        <input type="submit" class="btn btn-danger btn-sm" value="Excluir" style="width:100%;">
			                                    </form>
			                                </div>
		                                @endif
		                            </div>
		                        </td>
		                  	@endif
		                @endauth
                    </tr>
                    @endforeach
                </tbody>
            </table>
		</div>
	</div>
		
    </div>
</div>
@endsection