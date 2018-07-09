@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
		<div class="col-md-8">
    		<div class="card">
	            <div class="card-header"><h2>Atualização de procedimento</h2></div>
				<div class="card-body">
					<form method="post" action="{{ route('procedures.update', $procedure->id) }}">
						@csrf
						@method('PATCH')
						<div class="form-group row">
							<label for="name" class="col-md-2">Nome:</label>
							@if(Auth::user()->type==1)
								<input type="text" name="name" class="col-md-10 form-control" value="{{$procedure->name}}">
							@else
								<span class="col-md-10">{{$procedure->name}}</span>
							@endif
						</div>
						<div class="form-group row">
							<label for="price" class="col-md-2">Preço (R$):</label>
							<input type="text" name="price" class="col-md-10 form-control" value="{{$procedure->price}}">
						</div>
						<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
						<input type="submit" name="btnAtualizar" value="Atualizar" class="btn btn-success">
					</form>
				</div>
			</div>
		</div>
    </div>
</div>
@endsection