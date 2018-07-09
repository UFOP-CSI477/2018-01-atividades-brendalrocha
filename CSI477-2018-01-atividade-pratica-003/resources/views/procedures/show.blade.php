@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    	<div class="col-md-8">
    		<div class="card">
	            <div class="card-header"><h2>{{$procedure->name}}</h2></div>
				<div class="card-body">
					<p><strong>Preço: </strong>{{$procedure->price}}</p>
					<p><strong>Data de criação: </strong>{{$procedure->created_at}}</p>
					<p><strong>Última atualização: </strong>{{$procedure->updated_at}}</p>
					<p><strong>Atualização feita por: </strong>{{$procedure->user->name}}</p>

					<div class="row">
                        <div class="col-md-6">
                            <a href="{{ route('procedures.edit', $procedure->id) }}" class="btn btn-primary btn-sm" style="width:100%;">Editar</a>
                        </div>
                        @if(Auth::user()->type==1)
                            <div class="col-md-6">
                                <form method="post" action="{{ route('procedures.destroy', $procedure->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-danger btn-sm" value="Excluir" style="width:100%;">
                                </form>
                            </div>
                        @endif
                    </div>
				</div>
			</div>
		</div>		
    </div>
</div>
@endsection