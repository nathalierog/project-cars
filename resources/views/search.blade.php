@extends('layouts.app')

@section('content')
<div id="advanced-search">
	<div class="container">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3>Uitgebreid zoeken</h3>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-3">
								<div class="form-group">
								    <label>Merk</label>
								    <select class="form-control">
										<option>1</option>
										<option>2</option>
										<option>3</option>
										<option>4</option>
										<option>5</option>							
						    		</select>
						  		</div>
						  	</div>
						  	<div class="col-sm-3">
								<div class="form-group">
								    <label>Model</label>
								    <select class="form-control">
										<option>1</option>
										<option>2</option>
										<option>3</option>
										<option>4</option>
										<option>5</option>
						    		</select>
						  		</div>
						  	</div>
						  	<div class="col-sm-3">
						  		<div class="row">
						  			<div class="col-sm-6">
										<div class="form-group">
										    <label>Prijs</label>
										    <select class="form-control">
												<option>Prijs van</option>
												<option>&euro;&nbsp;250</option>
												<option>&euro;&nbsp;500</option>
												<option>&euro;&nbsp;750</option>
												<option>&euro;&nbsp;1.000</option>
												<option>&euro;&nbsp;1.250</option>
												<option>&euro;&nbsp;1.500</option>
												<option>&euro;&nbsp;2.000</option>	
												<option>&euro;&nbsp;2.500</option>	
												<option>&euro;&nbsp;3.000</option>	
												<option>&euro;&nbsp;4.000</option>
												<option>&euro;&nbsp;5.000</option>	
												<option>&euro;&nbsp;7.500</option>	
												<option>&euro;&nbsp;10.000</option>
												<option>&euro;&nbsp;15.000</option>	
												<option>&euro;&nbsp;20.000</option>	
												<option>&euro;&nbsp;25.000</option>
												<option>&euro;&nbsp;30.000</option>												
								    		</select>
								  		</div>
								  	</div>
								  	<div class="col-sm-6">
										<div class="form-group">
										    <label><br></label>
										    <select class="form-control">
												<option>Prijs tot</option>
												<option>&euro;&nbsp;250</option>
												<option>&euro;&nbsp;500</option>
												<option>&euro;&nbsp;750</option>
												<option>&euro;&nbsp;1.000</option>
												<option>&euro;&nbsp;1.250</option>
												<option>&euro;&nbsp;1.500</option>
												<option>&euro;&nbsp;2.000</option>	
												<option>&euro;&nbsp;2.500</option>	
												<option>&euro;&nbsp;3.000</option>	
												<option>&euro;&nbsp;4.000</option>
												<option>&euro;&nbsp;5.000</option>	
												<option>&euro;&nbsp;7.500</option>	
												<option>&euro;&nbsp;10.000</option>
												<option>&euro;&nbsp;15.000</option>	
												<option>&euro;&nbsp;20.000</option>	
												<option>&euro;&nbsp;25.000</option>
												<option>&euro;&nbsp;30.000</option>
												<option>&euro;&nbsp;40.000</option>	
												<option>&euro;&nbsp;50.000</option>			
											</select>
								  		</div>
								  	</div>
								</div>
							</div>
							<div class="col-sm-3">
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
							<div class="col-sm-3">
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label>Kilometerstand</label>
											<select class="form-control">
												<option>Kilometerstand van</option>
												<option>5.000</option>
												<option>10.000</option>
												<option>15.000</option>
												<option>20.000</option>
												<option>40.000</option>
												<option>60.000</option>
												<option>80.000</option>	
												<option>100.000</option>	
												<option>120.000</option>	
												<option>140.000</option>
												<option>160.000</option>	
												<option>180.000</option>	
												<option>200.000</option>
												<option>250.000</option>											
								    		</select>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label><br></label>
											<select class="form-control">
												<option>Kilometerstand tot</option>
												<option>5.000</option>
												<option>10.000</option>
												<option>15.000</option>
												<option>20.000</option>
												<option>40.000</option>
												<option>60.000</option>
												<option>80.000</option>	
												<option>100.000</option>	
												<option>120.000</option>	
												<option>140.000</option>
												<option>160.000</option>	
												<option>180.000</option>	
												<option>200.000</option>
												<option>250.000</option>	
												<option>500.000</option>											
								    		</select>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label>Bouwjaar</label>
											<input class="form-control" type="number" placeholder="van">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label><br></label>
											<input class="form-control" type="number" placeholder="tot">
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
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
							<div class="col-sm-3">
								<div class="form-group">
									<label>Sorteer op</label>
									<select class="form-control">
										<option>Bouwjaar</option>
										<option>Merk en model</option>
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
@endsection