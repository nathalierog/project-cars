@extends('emails.layout.mail-main')

@section('content')
		<tr>
			<td>Goedendag, {{$name}}</td>
		</tr>
		<tr>
			<td>Dit is een bevestiging van uw reactie op de {{$car->brand}} {{$car->model}}.</td>
		</tr>
		<tr>
			<td>Hieronder vind u uw bericht.</td>
		</tr>
		<tr>
			<td ><hr></td>
		</tr>
		<tr>
			<td>
				<h2>{{$title}}</h1>
			</td>
		</tr>
		<tr>
			<td>{{$content}}</td>
		</tr>

@endsection