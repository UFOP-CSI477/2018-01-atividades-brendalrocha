@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    	<div class="col-md-8">
    		<div class="card">
	            <div class="card-header"><h2>Detalhes do agendamento</h2></div>
				<div class="card-body">
					<p><strong>Procedimento agendado: </strong>{{$test->procedure->name}}</p>
					<p><strong>Preço: </strong>{{$test->procedure->price}}</p>
					<p><strong>Data do exame: </strong>{{$test->date}}</p>
					<p><strong>Data do solicitação: </strong>{{$test->created_at}}</p>
					<p><strong>Última atualização: </strong>{{$test->updated_at}}</p>
					@if(Auth::user()->type==0)
						<div class="row">
	                        <div class="col-md-6">
	                            <a href="{{ route('tests.edit', $test->id) }}" class="btn btn-primary btn-sm" style="width:100%;">Editar</a>
	                        </div>
                        
                            <div class="col-md-6">
                                <form method="post" action="{{ route('tests.destroy', $test->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-danger btn-sm" value="Excluir" style="width:100%;">
                                </form>
                            </div>
                    	</div>
                    @endif
				</div>
			</div>
		</div>		
    </div>
</div>
@endsection