@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    	<div class="col-md-8">
    		<div class="card">
	            <div class="card-header"><h2>Atualização de agendamento de exame</h2></div>
				<div class="card-body">
					<form method="post" action="{{ route('tests.update', $test->id) }}">
						@csrf
						@method('PATCH')
						<div class="form-group row">
							<label for="procedure_id" class="col-md-3">Procedimento:</label>
							<select name="procedure_id" class="col-md-9 form-control">
								<option value="">Selecione</option>
								@foreach($procedures as $p)
									<option value="{{$p->id}}"
										@if($p->id == $test->procedure_id)
											selected
										@endif 
										>{{$p->name}}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group row">
							<label for="date" class="col-md-3">Data:</label>
							<input type="date" name="date" class="col-md-9 form-control" value="{{$test->date}}">
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