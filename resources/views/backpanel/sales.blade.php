@extends('layouts.backpanel')

@section('content')
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel-default">
				<div class="panel-heading">
					<h4>Omzetlijst</h4>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12">
							<strong>Omzet weergeven van periode:</strong>
							<div class="row">
								<div class="col-md-4"> 
								{{ Form::selectRange('year_from', 2016, strftime('%Y'), strftime('%Y'), ['class' => 'form-control']) }}
								</div>
								<div class="col-md-4">
					    		{{ Form::selectMonth('month_from', strftime('%m'), ['class' => 'form-control']) }}	
						    	</div>
						    	<div class="col-md-4">
						    	{{ Form::selectRange('day_from', 1, 31, strftime('%d'), ['class' => 'form-control']) }}
						    	</div>
						    </div>
				    	</div>
				    </div>
			    	<div class="row">
			    		<div class="col-md-12">
							<strong>Omzet weergeven tot periode:</strong>
							<div class="row">
								<div class="col-md-4">
								{{ Form::selectRange('year_to', 2016, strftime('%Y'), strftime('%Y'), ['class' => 'form-control']) }} 
				    			</div>
				    			<div class="col-md-4"> 
				    			{{ Form::selectMonth('month_to', strftime('%m'), ['class' => 'form-control']) }}
				    			</div>
				    			<div class="col-md-4">
						    	{{ Form::selectRange('day_to', 1, 31, strftime('%d'), ['class' => 'form-control']) }}
						    	</div>
						    </div>
						 </div>
			    	</div>
				</div>
				<div class="table-responsive">
				    <table class="table table-striped table-bordered tablesorter" id="salestable">
					    <thead>
					      	<tr>
						        <th>Merk</th>
						        <th>Model</th>
						        <th>Uigegeven aan</th>
						        <th>Verkocht voor</th>
						        <th data-sorter="false" data-filter="false">Omzet</th>
					      	</tr>
					    </thead>
					    <tbody>
						@foreach ($sales as $sale)
							<tr>
							    <td>{{ $sale->brand->brand }}</td>
							    <td>{{ $sale->model->model }}</td>
							    <td>&euro; {{ $sale->spend_on }}</td>
							    <td>&euro; {{ $sale->sold_for }}</td>
							    <td>&euro; {{ $sale->car_sales }}</td>
							</tr>
						@endforeach
						</tbody>
						<tfoot>
							<tr>
							    <td><strong>Totaal</strong></td>
							    <td></td>
							    <td></td>
							    <td></td>
							    <td class="total">&euro; {{ $total or '0' }}</td>
							</tr>
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