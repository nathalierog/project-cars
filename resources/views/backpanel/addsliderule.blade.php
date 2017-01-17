@extends('layouts.backpanel')

@section('content')
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
		{{ Form:: open(array('action' => 'AdminController@addsliderule')) }} 
			<div class="panel panel-default">
				<div class="panel-heading">
					Slideshow regel toevoegen
				</div>
				<div class="panel-body">
				    <div class="form-group row">
					    <div class="col-sm-6">
					    	<label for="regel">regel</label>
					    	<select class="form-control col-sm-6" id="regel">
					    		<option value="1">Random</option>
					    		<option value="2">Meest gezien</option>
					    		<option value="3">Minst Gezien</option>
					    		<option value="4">Meest recent</option>
					    		<option value="5">Minst recent</option>
					    		<option value="6">Afbeelding van auto</option>
					    		<option value="7">url</option>
					    	</select>
					    </div>
				    </div>
		    	</div>
		    	<div class="panel-footer">
		    	{{ Form::submit('Invoeren', array('class' => 'btn btn-primary')) }}
		    	</div>
		    </div>		
		{{ Form:: close() }}
		</div>
		<div class="col-sm-10 col-sm-offset-1">
        @if (count($errors) > 0)
            <div class="row">
                <div class="col-sm-12">
                    <div class="alert alert-danger">
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif
        </div>
	</div>      
@endsection