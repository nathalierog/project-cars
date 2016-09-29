@extends('layouts.backpanel')

@section('content')
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel-default">
				<div class="panel-heading">
					<h4>Overzicht van alle auto's</h4>
					<a href="{{ url('/backpanel/addcar') }}"><i class="fa fa-plus fa-btn" aria-hidden="true"></i>Auto toevoegen</a>
				</div>
			    <ol class="list-group">
			    @foreach ($cars as $car)
		        	<li class="list-group-item">
		        	{{$car->id}}
		        	{{$car->brand}}
		        	{{$car->model}}
		        	uit {{$car->year}}
		        		<a href="{{ url('/backpanel/deletecar/' . $car->id) }}"><span class="pull-right fa fa-trash fa-btn"></span>
		        		<a href="{{ url('/backpanel/editcar/' . $car->id) }}"><span class="pull-right fa fa-pencil fa-btn"></span>
		        	</li>
			    @endforeach
			    </ol>
		    </div>
		</div>
	</div>
@endsection