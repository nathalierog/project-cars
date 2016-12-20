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
						        <th>Merk</th>
						        <th>Model</th>
						        <th>Jaar</th>
						        <th></th>
						        <th></th>
						        <th></th>
					      	</tr>
					    </thead>
					    <tbody>
						    @foreach ($cars as $car)
					        	<tr>
								    <td>{{$car->brand->brand}}</td>
								    <td>{{$car->model->model}}</td>
								    <td>{{$car->year}}</td>
								    <td>
								    	<a href="{{ url('/backpanel/editcar/' . $car->id) }}">Bewerken</a>
							  		</td>
							  		<td><a href="{{url('/backpanel/imgorder/' . $car->id)}}">Afbeeldingen beheren</a></td>
								    <td>
								    	<a data-toggle="modal" href="#myModal-{{ $car->id }}">Verwijderen</a>
								    </td>

								</tr>   
						    @endforeach
						</tbody>
						<tfoot>
							<tr>
							  	<th colspan="7" class="ts-pager form-horizontal">
							    	<button type="button" class="btn first"><i class="icon-step-backward glyphicon glyphicon-step-backward"></i></button>
							    	<button type="button" class="btn prev"><i class="icon-arrow-left glyphicon glyphicon-backward"></i></button>
								    <span class="pagedisplay"></span>
								    <button type="button" class="btn next"><i class="icon-arrow-right glyphicon glyphicon-forward"></i></button>
								    <button type="button" class="btn last"><i class="icon-step-forward glyphicon glyphicon-step-forward"></i></button>
								    <select class="pagesize input-mini" title="Select page size">
									    <option selected="selected" value="10">10</option>
									    <option value="20">20</option>
									    <option value="30">30</option>
									    <option value="40">40</option>
									    <option value="50">50</option>
								    </select>
							  	</th>
							</tr>
						</tfoot>
					</table>
				</div>
		    </div>
		</div>
	</div>
	@if (count($errors) > 0)
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
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

<script src="{{ URL::asset('js/backpanel.js') }}"></script>

@foreach ($cars as $car)

<?php 
	$id = $car->id 
?>

	<!-- Modal -->
	<div style="display:none;" class="modal fade" id="myModal-{{ $car->id }}" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			{{ Form::open(['action' => ['AdminController@deleteCar', $id]]) }}
			{{ Form::token() }}
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Auto verwijderen</h4>
				</div>
				<div class="modal-body">
					<p>Als de auto verkocht is vul dan dit formulier in.</p>
					<div class="row">
						<div class="form-group col-md-6">
							{{ Form::label('spend-on', 'Uitgegeven aan:') }}
							{{ Form::text('spend-on', null, ['class' => 'form-control', 'data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => 'Vul hier in hoeveel je aan deze auto hebt uitgegeven.']) }}
						</div>
						<div class="form-group col-md-6">
							{{ Form::label('sold-for', 'Verkocht voor:') }}
							{{ Form::text('sold-for', null, ['class' => 'form-control', 'data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => 'Vul hier in voor hoeveel je de auto hebt verkocht.']) }}
						</div>
						<div class="form-group col-md-12">
							{{ Form::checkbox('hard-delete', 'yes') }}
							{{ Form::label('hard-delete', 'Verwijderen zonder dat hij opgeslagen word voor de omzet berekening.') }}
							<p><small><strong>Let op! </strong>Als je de checkbox aanvinkt word de auto uit de database verwijderd en is hij niet meer terug te halen.</small></p>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					{{ Form::submit('Verzenden', array('class' => 'btn btn-primary')) }}
					<button type="button" class="btn btn-danger" data-dismiss="modal">Sluiten</button>
				</div>
			</div>
			{!! Form::close() !!}
		</div>
	</div>
@endforeach
@endsection