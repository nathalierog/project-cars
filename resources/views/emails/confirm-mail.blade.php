@extends('emails.layout.mail-main')

@section('content')
		<tr>
			<td>Goedendag, {{$name}}</td>
		</tr>
		<tr>
			<td>Dit is een bevestiging van u mail op project-cars</td>
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