@extends('layouts.backpanel')

@section('content')
<div class="row">
	<div class="col-md-5 col-md-offset-1">
		<div class="panel-default">
			<div class="panel-heading">
				<h4>Overzicht van alle merken</h4>
			</div>
			<div class="table-responsive">
			    <table class="table table-striped table-bordered tablesorter" id="car-brands">
				    <thead>
				      	<tr>
					        <th>Merk</th>
					        <th data-sorter="false" class="filter-false"></th>
				      	</tr>
				    </thead>
				    <tbody>
				    	@foreach ($carBrands as $carBrand)
			        	<tr id="{{$carBrand->id}}">
						    <td class="brand-field">{{$carBrand->brand}}</td>
						    <td>
						    	<a href="{{ url('/backpanel/deletebrand/' . $carBrand->id) }}" onclick="return confirm('Weet je het zeker dat je dit merk wilt verwijderen? Alle modellen gekoppeld aan dit merk worden ook verwijderd.');">Verwijderen</a>
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
				<button class="btn btn-primary pull-right" data-toggle="modal" data-target="#addBrandModal">Merk toevoegen</button>
			</div>
		</div>
	</div>
	<div class="col-md-5">
		<div class="panel-default">
			<div class="panel-heading">
				<h4>Overzicht van alle modellen</h4>
			</div>
			<div class="table-responsive">
			    <table class="table table-striped table-bordered tablesorter" id="car-models">
				    <thead>
				      	<tr>
					        <th>Model</th>
					        <th data-sorter="false" class="filter-false"></th>
				      	</tr>
				    </thead>
				    <tbody>
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
				<button id="addModel" class="btn btn-primary pull-right" data-toggle="modal" data-target="#addModelModal">Model toevoegen</button>
			</div>
		</div>
	</div>
</div>
<!-- Brand Modal -->
<div id="addBrandModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Brand Modal content-->
		{{ Form:: open(array('action' => 'AdminController@setBrand')) }}
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Merk toevoegen</h4>
			</div>
			<div class="modal-body"> 
				<div class="row">
					<div class="col-md-12">
						<input type="text" class="form-control" name="brand" id="brand" placeholder="Merk" value="{{ old('brand')}}">
					</div>
				</div>
			</div>
			<div class="modal-footer">
				{{ Form::submit('Invoeren', array('class' => 'btn btn-primary')) }}
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
		{{ Form:: close() }}
	</div>
</div>
<!-- Model Modal -->
<div id="addModelModal" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Model Modal content-->
		{{ Form:: open(array('action' => 'AdminController@setModel')) }}
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Model toevoegen</h4>
			</div>
			<div class="modal-body"> 
				<div class="row">
					<div class="col-md-12">
						<input type="text" class="form-control" name="model" id="model" placeholder="Model" value="{{ old('model')}}">
						<input type="hidden" class="form-control" name="brand_id" id="brand_id" value="">
					</div>
				</div>
			</div>
			<div class="modal-footer">
			{{ Form::submit('Invoeren', array('class' => 'btn btn-primary')) }}
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
		{{ Form:: close() }}
	</div>
</div>
<br>
<div class="col-sm-10 col-sm-offset-1">
@if (count($errors) > 0)
    <div class="row">
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
	<div class="row" id="input-error" style="display:none;">
	    <div class="alert alert-danger">
		    <ul>
		        <li>dubbele invoer.</li>
		    </ul>
	    </div>
	</div>
	<div class="row" id="input-success" style="display:none;">
	    <div class="alert alert-success">
		    <ul>
		        <li>opgeslagen!</li>
		    </ul>
	    </div>
	</div>
</div>
@endsection