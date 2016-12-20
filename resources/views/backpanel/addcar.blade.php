@extends('layouts.backpanel')

@section('content')
	<div class="row">
		<div class="col-md-10 col-md-offset-1">

			{{ Form:: open(array('action' => 'AdminController@setCar','files' => true)) }} 

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
						        		<select class="form-control" name="brand_id" id="brand">
						        		@foreach ($carBrands as $carBrand)
									  		<option value="{{$carBrand->id}}">{{$carBrand->brand}}</option>
										@endforeach
										</select> 
							      	</div>
							    </div>
						    </div>
						    <div class="col-sm-6">
						    	<div class="row">
							      	<label for="model" class="col-sm-12 col-form-label">Model</label>
							      	<div class="col-sm-12">
							      		<select class="form-control" name="model_id" id="model">
										</select> 
							      	</div>
							    </div>
							</div>
					    </div>
					    <div class="form-group row">
				      		<label for="keyword" class="col-sm-12 col-form-label">Keyword(s)</label>
					      	<div class="col-sm-12">
					        	<input type="text" class="form-control" name="keyword" id="keyword" placeholder="Keyword(s)" value="{{ old('keyword')}}">
					      		<br>
					      		<div class="alert alert-info">
								  	<strong>Let op!</strong> Als de auto meerdere keywords heeft scheid ze dan met een comma.
								</div>
					      	</div>
					    </div>
					    <hr>
					    <div class="form-group row">
					    	<div class="col-sm-3">
					    		<div class="row">
							      	<label for="price" class="col-sm-12 col-form-label">Prijs</label>
							      	<div class="col-sm-12">
							        	<input type="number" class="form-control" name="price" id="price" placeholder="Prijs (€)" value="{{ old('price')}}">
							      	</div>
							    </div>
							</div>
							<div class="col-sm-3">
					    		<div class="row">
						    		<label for="mileage" class="col-sm-12 col-form-label">Kilometerstand</label>
							      	<div class="col-sm-12">
							        	<input type="number" class="form-control" name="mileage" id="mileage" placeholder="Kilometerstand (km)" value="{{ old('mileage')}}">
							      	</div>
					    		</div>
					    	</div>
					    	<div class="col-sm-3">
					    		<div class="row">
						    		<label for="year" class="col-sm-12 col-form-label">Bouwjaar</label>
							      	<div class="col-sm-12">
							        	<input type="number" class="form-control" name="year" id="year" placeholder="Bouwjaar" value="{{ old('year')}}">
							      	</div>
					    		</div>
					    	</div>
					    	<div class="col-sm-3">
					    		<div class="row">
					    			<label for="color" class="col-sm-12 col-form-label">Kleur</label>
							      	<div class="col-sm-12">
							        	<input type="text" class="form-control" name="color" id="color" placeholder="kleur"  value="{{ old('color')}}">
							      	</div>
					    		</div>
					    	</div>
					    </div>
					    <div class="form-group row">
					    	<div class="col-sm-3">
					    		<div class="row">
					    			<label for="transmission" class="col-sm-12 col-form-label">Transmissie</label>
							      	<div class="col-sm-12">
							        	<select class="form-control" name="transmission" id="transmission">
							        		<option value="Automaat" {{ old('transmission') == "Automaat" ? "selected" : ""  }}>Automaat</option>
							        		<option value="Handgeschakeld" {{ old('transmission') == "Handgeschakeld" ? "selected" : ""  }}>Handgeschakeld</option>
							        	</select>
					      			</div>
					    		</div>
					    	</div>
					    	<div class="col-sm-3">
					    		<div class="row">
						    		<label for="body" class="col-sm-12 col-form-label">Carrosserie</label>
							      	<div class="col-sm-12">
							        	<input type="text" class="form-control" name="body" id="body" placeholder="Carrosserie" value="{{ old('body')}}">
							      	</div>
					    		</div>
					    	</div>
					    	<div class="col-sm-3">
					    		<div class="row">
						    		<label for="fuel" class="col-sm-12 col-form-label">Brandstof</label>
							      	<div class="col-sm-12">
							        	<select class="form-control" name="fuel" id="fuel">
							        		<option value="Benzine" {{ old('fuel') == "Benzine" ? "selected" : ""  }}>Benzine</option>
							        		<option value="Diesel" {{ old('fuel') == "Diesel" ? "selected" : ""  }}>Diesel</option>
							        		<option value="Elekstrisch" {{ old('fuel') == "Elekstrisch" ? "selected" : ""  }}>Elekstrisch</option>
							        		<option value="Hybryde" {{ old('fuel') == "Hybryde" ? "selected" : ""  }}>Hybryde</option>
											<option value="LPG" {{ old('fuel') == "LPG" ? "selected" : ""  }}>LPG</option>
							        		<option value="LPG-G3" {{ old('fuel') == "LPG-G3" ? "selected" : ""  }}>LPG-G3</option>
							        		<option value="Aardgas (CNG)" {{ old('fuel') == "Aardgas (CNG)" ? "selected" : ""  }}>Aardgas (CNG)</option>
							        	</select>
							      	</div>
					    		</div>
					    	</div>
					    	<div class="col-sm-3">
					    		<div class="row">
						    		<label for="license_plate" class="col-sm-12 col-form-label">Nummerplaat</label>
							      	<div class="col-sm-12">
							        	<input type="text" class="form-control" name="license_plate" id="license_plate" placeholder="Nummerplaat" value="{{ old('license_plate')}}">
							      	</div>
					    		</div>
					    	</div>
					    </div>
					    <hr>
					    <div class="form-group row">
					      	<label for="img_upload" class="col-sm-12 col-form-label">Afbeelding Uploaden</label>
					      	<div class="col-sm-12">
					        	<input type="file" class="form-control" multiple accept="image/*" name="img_uploads[]" id="img_upload" placeholder="upload image" value="{{ old('img-uploads')}}">
					      	</div>
					    </div>
					    <div class="form-group row">
					      	<label for="description" class="col-sm-12 col-form-label">Beschrijving</label>
					      	<div class="col-sm-12">
					        	<textarea class="form-control" name="description" id="description" placeholder="Beschrijving">{{ old('description')}}</textarea>
					      	</div>
			    		</div>
			    		<div class="form-group row">
					      	<label for="accessories" class="col-sm-12 col-form-label">Accessoires</label>
					      	<div class="col-sm-12">
					        	<textarea class="form-control" name="accessories" id="accessories" placeholder="Accessoires">{{ old('accessories')}}</textarea>
					      		<br>
					      		<div class="alert alert-info">
								  	<strong>Let op!</strong> Als de auto meerdere accessoires heeft scheid ze dan met een comma.
								</div>
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