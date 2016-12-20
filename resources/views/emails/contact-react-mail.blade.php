@extends('emails.layout.mail-main')

@section('content')
		<tr>
			<td>Reactie van: {{$name}}</td>
		</tr>
		<tr>
			<td>Betreft: {{$car->brand->brand}} {{$car->model->model}}.</td>
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