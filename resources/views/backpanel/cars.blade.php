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
			    @for ($i = 0; $i < 20; $i++)
		        	<li class="list-group-item">
		        	{{$i}}
		        		<a href="{{ url('/backpanel/deletecar') }}"><span class="pull-right fa fa-trash fa-btn"></span>
		        		<a href="{{ url('/backpanel/editcar') }}"><span class="pull-right fa fa-pencil fa-btn"></span>
		        	</li>
			    @endfor
			    </ol>
		    </div>
		</div>
	</div>
@endsection