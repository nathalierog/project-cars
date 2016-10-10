@extends('layouts.backpanel')

@section('content')
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel-default">
				<div class="panel-heading">
					<h4>Overzicht van alle auto's</h4>
					<a href="{{ url('/backpanel/addcar') }}"></i>Auto toevoegen</a>
				</div>
				<div class="table-responsive">
				    <table class="table table-striped table-bordered tablesorter">
					    <thead>
					      	<tr>
						        <th>ID</th>
						        <th>Brand</th>
						        <th>Model</th>
						        <th>Jaar</th>
						        <th></th>
						        <th></th>
					      	</tr>
					    </thead>
					    <tbody>
						    @foreach ($cars as $car)
					        	<tr>
									<td>{{$car->id}}</td>
								    <td>{{$car->brand}}</td>
								    <td>{{$car->model}}</td>
								    <td>{{$car->year}}</td>
								    <td>
								    	<a href="{{ url('/backpanel/editcar/' . $car->id) }}">Bewerken</a>
							  		</td>
								    <td>
								    	<a href="{{ url('/backpanel/deletecar/' . $car->id) }}">Verwijderen</a>
								    </td>
								</tr>   
						    @endforeach
						</tbody>
					</table>
				</div>
		    </div>
		</div>
	</div>
@endsection