@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10">
			<h2>Exames agendados</h2>
		</div>
		<div class="col-md-2">
			@if(Auth::user()->type == 0)
				<div class="col-md-2">
			    	<a href="{{ route('tests.create') }}" class="btn btn-success">Solicitar exame</a>
			    </div>
			@endif
		</div>
		
	</div>
	<div class="row">
		<div class="col-md-12">
			<table class="table table-borderless table-striped">
                <thead>
                    <tr>
                        <th>Data</th>
                        @if(Auth::user()->type == 1)
                        	<th>Paciente</th>
                        @endif
                        <th>Procedimento</th>
                        <th>Preço</th>
                        @if(Auth::user()->type == 0)
                        	<th>Ações</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach($tests as $item)
                    <tr>
                        <td>{{$item->date}}</td>
                        @if(Auth::user()->type == 1)
                        	<td>{{$item->user->name}}</td>
                        @endif
                        <td>{{$item->procedure->name}}</td>
                        <td>{{$item->procedure->price}}</td>
                        @if(Auth::user()->type == 0)
	                        <td style="padding:12px 22px;text-align:center;">
	                            <div class="row">
	                            	<div class="col-md-4">
	                                    <a href="{{ route('tests.show', $item->id) }}" class="btn btn-primary btn-sm" style="width:100%;">Detalhes</a>
	                                </div>
	                                <div class="col-md-4">
	                                    <a href="{{ route('tests.edit', $item->id) }}" class="btn btn-primary btn-sm" style="width:100%;">Editar</a>
	                                </div>
	                                <div class="col-md-4">
	                                    <form method="post" action="{{ route('tests.destroy', $item->id) }}">
	                                        @csrf
	                                        @method('DELETE')
	                                        <input type="submit" class="btn btn-danger btn-sm" value="Excluir" style="width:100%;">
	                                    </form>
	                                </div>
	                            </div>
	                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
	</div>
	@if(Auth::user()->type == 0)
		<div class="row">
			<div class="col-md-6">
				<p><strong>Quantidade de exames agendados: </strong>{{$amount_tests}}</p>
			</div>
			<div class="col-md-6">
				<p><strong>Total a pagar: </strong>{{$total_payable_tests}}</p>
			</div>
		</div>
	@endif

</div>
@endsection