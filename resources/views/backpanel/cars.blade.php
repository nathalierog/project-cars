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
						        <th data-toggle="tooltip" title="Klik hier om op ID te sorteren">ID</th>
						        <th data-toggle="tooltip" title="Klik hier om op Brand te sorteren">Brand</th>
						        <th data-toggle="tooltip" title="Klik hier om op Model te sorteren">Model</th>
						        <th data-toggle="tooltip" title="Klik hier om op Jaar te sorteren">Jaar</th>
						        <th></th>
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
							  		<td><a href="{{url('/backpanel/imgorder/' . $car->id)}}">afbeeldingen beheren</a></td>
								    <td>
								    	<a href="{{ url('/backpanel/deletecar/' . $car->id) }}">Verwijderen</a>
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
@endsection