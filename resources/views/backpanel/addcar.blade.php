@extends('layouts.backpanel')

@section('content')
	<div class="row">
		<div class="col-md-10 col-md-offset-1">

			{{ Form:: open(array('action' => 'AdminController@setCar')) }} 

				<div class="panel panel-default">
  					<div class="panel-heading">
  						Auto invoeren
  					</div>
  					<div class="panel-body">
					    <div class="form-group row">
					    	<div class="col-sm-6">
					    		<div class="row">
							      	<label for="brand" class="col-sm-12 col-form-label">Merk</label>
							      	<div class="col-sm-12">
							        	<input type="text" class="form-control" id="brand" placeholder="Merk">
							      	</div>
							    </div>
						    </div>
						    <div class="col-sm-6">
						    	<div class="row">
							      	<label for="model" class="col-sm-12 col-form-label">Model</label>
							      	<div class="col-sm-12">
							        	<input type="text" class="form-control" id="model" placeholder="Model">
							      	</div>
							    </div>
							</div>
					    </div>
					    <div class="form-group row">
				      		<label for="keyword" class="col-sm-12 col-form-label">Keyword(s)</label>
					      	<div class="col-sm-12">
					        	<input type="text" class="form-control" id="keyword" placeholder="Keyword(s)">
					      	</div>
					    </div>
					    <hr>
					    <div class="form-group row">
					    	<div class="col-sm-3">
					    		<div class="row">
							      	<label for="price" class="col-sm-12 col-form-label">Prijs</label>
							      	<div class="col-sm-12">
							        	<input type="number" class="form-control" id="price" placeholder="Prijs (€)">
							      	</div>
							    </div>
							</div>
							<div class="col-sm-3">
					    		<div class="row">
						    		<label for="mileage" class="col-sm-12 col-form-label">Kilometerstand</label>
							      	<div class="col-sm-12">
							        	<input type="number" class="form-control" id="mileage" placeholder="Kilometerstand (km)">
							      	</div>
					    		</div>
					    	</div>
					    	<div class="col-sm-3">
					    		<div class="row">
						    		<label for="year" class="col-sm-12 col-form-label">Bouwjaar</label>
							      	<div class="col-sm-12">
							        	<input type="number" class="form-control" id="year" placeholder="Bouwjaar">
							      	</div>
					    		</div>
					    	</div>
					    	<div class="col-sm-3">
					    		<div class="row">
					    			<label for="color" class="col-sm-12 col-form-label">Kleur</label>
							      	<div class="col-sm-12">
							        	<input type="text" class="form-control" id="color" placeholder="kleur">
							      	</div>
					    		</div>
					    	</div>
					    </div>
					    <div class="form-group row">
					    	<div class="col-sm-3">
					    		<div class="row">
					    			<label for="transmission" class="col-sm-12 col-form-label">Transmissie</label>
							      	<div class="col-sm-12">
							        	<select class="form-control" id="transmission">
							        		<option value="Automaat">Automaat</option>
							        		<option value="Handgeschakeld">Handgeschakeld</option>
							        	</select>
					      			</div>
					    		</div>
					    	</div>
					    	<div class="col-sm-3">
					    		<div class="row">
						    		<label for="body" class="col-sm-12 col-form-label">Carrosserie</label>
							      	<div class="col-sm-12">
							        	<input type="text" class="form-control" id="body" placeholder="Carrosserie">
							      	</div>
					    		</div>
					    	</div>
					    	<div class="col-sm-3">
					    		<div class="row">
						    		<label for="fuel" class="col-sm-12 col-form-label">Brandstof</label>
							      	<div class="col-sm-12">
							        	<select class="form-control" id="fuel">
							        		<option value="Benzine">Benzine</option>
							        		<option value="Benzine">Diesel</option>
							        		<option value="Elekstrisch">Elekstrisch</option>
							        		<option value="Hybryde">Hybryde</option>
											<option value="LPG">LPG</option>
							        		<option value="LPG-G3">LPG-G3</option>
							        		<option value="Aardgas (CNG)">Aardgas (CNG)</option>
							        	</select>
							      	</div>
					    		</div>
					    	</div>
					    	<div class="col-sm-3">
					    		<div class="row">
						    		<label for="license_plate" class="col-sm-12 col-form-label">Nummerplaat</label>
							      	<div class="col-sm-12">
							        	<input type="text" class="form-control" id="license_plate" placeholder="Nummerplaat">
							      	</div>
					    		</div>
					    	</div>
					    </div>
					    <hr>
					    <div class="form-group row">
					      	<label for="main_img" class="col-sm-12 col-form-label">Main image</label>
					      	<div class="col-sm-12">
					        	<input type="text" class="form-control" id="main_img" placeholder="Main image">
					      	</div>
					    </div>
					    <div class="form-group row">
					      	<label for="description" class="col-sm-12 col-form-label">Beschrijving</label>
					      	<div class="col-sm-12">
					        	<textarea class="form-control" id="description" placeholder="Beschrijving"></textarea>
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