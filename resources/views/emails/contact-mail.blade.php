@extends('emails.layout.mail-main')

@section('content')
		<tr>
			<td>mail via contact formulier van: {{$name}}</td>
		</tr>
		<tr>
			<td>
				<hr>
			</td>
		</tr>
		<tr>
			<td>
				<h2>{{$title}}</h1>
			</td>
		</tr>
		<tr>
			<td>
				<p>{{$content}}</p>
			</td>
		</tr>
@endsection