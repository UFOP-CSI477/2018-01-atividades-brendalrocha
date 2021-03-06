@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    	<div class="col-md-8">
    		<div class="card">
	            <div class="card-header"><h2>Cadastro de procedimentos</h2></div>
				<div class="card-body">
					<form method="post" action="{{ route('procedures.store') }}">
						@csrf
						<div class="form-group row">
							<label for="name" class="col-md-2">Nome:</label>
							<input type="text" name="name" class="col-md-10 form-control">
						</div>
						<div class="form-group row">
							<label for="price" class="col-md-2">Preço (R$):</label>
							<input type="text" name="price" class="col-md-10 form-control">
						</div>
						<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
						<input type="submit" name="btnAdicionar" value="Adicionar" class="btn btn-success">
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection