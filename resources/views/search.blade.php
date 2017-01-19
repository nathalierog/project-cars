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
					<div class="row">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
									    <label>Merk</label>
									    <select name="brand" id="brandSelect" class="form-control">
									    	<option id="allBrandsOption">Alle merken</option>
									    	<?php foreach ($brands as $brand): ?>
												<option id="brand_{{$brand['id']}}">{{ $brand['brand'] }}</option>
											<?php endforeach ?>
							    		</select>
							  		</div>
							  	</div>
							  	<div class="col-md-6">
									<div class="form-group">
									    <label>Model</label>
									    <select name="model" id="modelSelect" class="form-control">
											<option id="allModelsOption">Alle modellen</option>
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
											    <select class="form-control">
													<option>---</option>
													@foreach($prices as $price)
														<option>&euro;&nbsp;{{ $price }}</option>
													@endforeach								
									    		</select>
									  		</div>
									  	</div>
									  	<div class="col-md-6">
											<div class="form-group">
											    <label><br></label>
											    <select class="form-control">
													<option>---</option>
													@foreach($prices as $price)
														<option>&euro;&nbsp;{{ $price }}</option>
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
												<select class="form-control">
													<option>---</option>
													@foreach($mileage as $value)
														<option>{{ $value }}</option>
													@endforeach											
									    		</select>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label><br></label>
												<select class="form-control">
													<option>---</option>
													@foreach($mileage as $value)
														<option>{{ $price }}</option>
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
												<select class="form-control">
													<option>---</option>
												</select>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label><br></label>
												<select class="form-control">
													<option>---</option>
												</select>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Brandstof</label>
										<select class="form-control" name="fuel" id="fuel">
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
										<select class="form-control">
											<option>Handgeschakeld</option>
											<option>Automaat</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Sorteren op</label>
										<select class="form-control">
											<option>Merk</option>
											<option>Kilometerstand</option>
											<option>Prijs</option>
										</select>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="panel-footer">
					<button class="btn btn-primary">
						Zoeken
					</button>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection