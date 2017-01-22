@extends('layouts.app')

@section('content')
<div id="advanced-search">
	<div class="container">
	 	<div class="col-md-8 col-md-push-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3>Uitgebreid zoeken</h3>
				</div>
				<div class="panel-body">
					<form id="filter-form" action="/cars" method="get">
						<div class="row">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
										    <label>Merk</label>
										    <select name="brand" id="brandSelect" class="form-control filter-select">
										    	<option value="---" id="allBrandsOption">Alle merken</option>
										    	<?php foreach ($brands as $brand): ?>
													<option value="{{ $brand['brand'] }}" id="brand_{{$brand['id']}}">{{ $brand['brand'] }}</option>
												<?php endforeach ?>
								    		</select>
								  		</div>
								  	</div>
								  	<div class="col-md-6">
										<div class="form-group">
										    <label>Model</label>
										    <select name="model" id="modelSelect" class="form-control filter-select">
												<option value="---" id="allModelsOption">Alle modellen</option>
								    		</select>
								  		</div>
								  	</div>
								</div>
								<div class="row">	
								  	<div class="col-md-12">
								  		<div class="row">
								  			<div class="col-md-6">
												<div class="form-group">
												    <label>Prijs tussen</label>
												    <select name="price-from"class="form-control filter-select">
														<option>---</option>
														@foreach($prices as $price)
															<option value="{{ $price }}">&euro;&nbsp;{{ $price }}</option>
														@endforeach								
										    		</select>
										  		</div>
										  	</div>
										  	<div class="col-md-6">
												<div class="form-group">
												    <label><br></label>
												    <select name="price-to" class="form-control filter-select">
														<option>---</option>
														@foreach($prices as $price)
															<option value="{{ $price }}">&euro;&nbsp;{{ $price }}</option>
														@endforeach	
													</select>
										  		</div>
										  	</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Kilometerstand tussen</label>
													<select name="mileage-from" class="form-control filter-select">
														<option>---</option>
														@foreach($mileage as $value)
															<option value="{{ $value }}">{{ $value }}</option>
														@endforeach											
										    		</select>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label><br></label>
													<select name="mileage-to" class="form-control filter-select">
														<option>---</option>
														@foreach($mileage as $value)
															<option value="{{ $value }}">{{ $value }}</option>
														@endforeach											
										    		</select>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Bouwjaar</label>
													<select name="year-from" class="form-control filter-select year-select"></select>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label><br></label>
													<select name="year-to" class="form-control filter-select year-select"></select>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Brandstof</label>
											<select class="form-control filter-select" name="fuel" id="fuel">
								        		<option>---</option>
								        		<option value="Benzine">Benzine</option>
								        		<option value="Diesel">Diesel</option>
								        		<option value="Elekstrisch">Elekstrisch</option>
								        		<option value="Hybryde">Hybryde</option>
												<option value="LPG">LPG</option>
								        		<option value="LPG-G3">LPG-G3</option>
								        		<option value="Aardgas (CNG)">Aardgas (CNG)</option>
								        	</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Transmissie</label>
											<select name="transmission" class="form-control filter-select">
												<option>---</option>
												<option value="Handgeschakeld">Handgeschakeld</option>
												<option value="Automaat">Automaat</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label>Sorteren op</label>
											<select name="sort" class="form-control filter-select">
												<option value="brand">Merk</option>
												<option value="mileage">Kilometerstand</option>
												<option value="price">Prijs</option>
											</select>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="panel-footer">
						<input id="filter-button" class="btn btn-primary" type="submit" value="Zoeken" />
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection