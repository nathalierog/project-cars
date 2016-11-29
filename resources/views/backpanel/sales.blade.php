@extends('layouts.backpanel')

@section('content')
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel-default">
			<div class="panel-heading">
				<h4>Omzetlijst</h4>
			</div>
			<div class="table-responsive">
			    <table class="table table-striped table-bordered tablesorter">
				    <thead>
				      	<tr>
					        <th>Merk</th>
					        <th>Model</th>
					        <th>Uigegeven aan</th>
					        <th>Verkocht voor</th>
					        <th class="disabled">Winst</th>
				      	</tr>
				    </thead>
				    <tbody>
					@foreach ($sales as $sale)
						<tr>
						    <td>{{$sale->brand}}</td>
						    <td>{{$sale->model}}</td>
						    <td>{{$sale->spend_on}}</td>
						    <td>{{$sale->sold_for}}</td>
						    <td>{{$sale->car_sales}}</td>
						</tr>
					@endforeach
						<tr>
						    <td><b>Totaal</b></td>
						    <td></td>
						    <td></td>
						    <td></td>
						    <td>{{$total or '0'}}</td>
						</tr>
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