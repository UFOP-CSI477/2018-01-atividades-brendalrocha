@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		@if($list==1)
			<div class="col-md-6">
				<h2>Administradores</h2>
				<table class="table table-borderless table-striped">
	                <thead>
	                    <tr>
	                        <th>Nome</th>
	                        <th>E-mail</th>
	                    </tr>
	                </thead>
	                <tbody>
	                    @foreach($adm as $item)
	                    <tr>
	                        <td>{{$item->name}}</td>
	                        <td>{{$item->email}}</td>
	                    </tr>
	                    @endforeach
	                </tbody>
	            </table>
	        </div>
	        <div class="col-md-6">
				<h3>Operadores</h3>
				<table class="table table-borderless table-striped">
	                <thead>
	                    <tr>
	                        <th>Nome</th>
	                        <th>E-mail</th>
	                    </tr>
	                </thead>
	                <tbody>
	                    @foreach($op as $item)
	                    <tr>
	                        <td>{{$item->name}}</td>
	                        <td>{{$item->email}}</td>
	                    </tr>
	                    @endforeach
	                </tbody>
	            </table>
	        </div>
		@else
			<div class="col-md-12">
				<h2>Pacientes</h2>
				<table class="table table-borderless table-striped">
	                <thead>
	                    <tr>
	                        <th>Nome</th>
	                        <th>E-mail</th>
	                    </tr>
	                </thead>
	                <tbody>
	                    @foreach($patients as $item)
	                    <tr>
	                        <td>{{$item->name}}</td>
	                        <td>{{$item->email}}</td>
	                    </tr>
	                    @endforeach
	                </tbody>
	            </table>
	        </div>
	    @endif
    </div>
</div>
@endsection