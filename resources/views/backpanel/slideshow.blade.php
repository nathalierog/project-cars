@extends('layouts.backpanel')

@section('content')
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel-default">
				<div class="panel-heading">
					<h4>Instellingen slideshow</h4>
					<a href="{{ url('/backpanel/addsliderule') }}"></i>regel toevoegen</a>
				</div>
				<div class="table-responsive">
				    <table class="table table-striped table-bordered tablesorter">
					    <thead>
					      	<tr>
						        <th>ID</th>
						        <th>type</th>
						        <th>val</th>
						        <th></th>
						        <th></th>
					      	</tr>
					    </thead>
					    <tbody>
						    {{-- @foreach ($rules as $rule) --}}
					        	<tr>
									<td>23</td>
								    <td>random</td>
								    <td>0</td>
								    <td>
								    	<a href="{{ url('/backpanel/slideshow/1') }}">Bewerken</a>
							  		</td>
								    <td>
								    	<a href="{{ url('/backpanel/slideshow/1') }}">Verwijderen</a>
								    </td>

								</tr>
								<tr>
									<td>24</td>
								    <td>meest recent</td>
								    <td>0</td>
								    <td>
								    	<a href="{{ url('/backpanel/slideshow/1') }}">Bewerken</a>
							  		</td>
								    <td>
								    	<a href="{{ url('/backpanel/slideshow/1') }}">Verwijderen</a>
								    </td>

								</tr>
								<tr>
									<td>23</td>
								    <td>meest bekeken</td>
								    <td>0</td>
								    <td>
								    	<a href="{{ url('/backpanel/slideshow/1') }}">Bewerken</a>
							  		</td>
								    <td>
								    	<a href="{{ url('/backpanel/slideshow/1') }}">Verwijderen</a>
								    </td>

								</tr>
								<tr>
									<td>23</td>
								    <td>minst bekeken</td>
								    <td>0</td>
								    <td>
								    	<a href="{{ url('/backpanel/slideshow/1') }}">Bewerken</a>
							  		</td>
								    <td>
								    	<a href="{{ url('/backpanel/slideshow/1') }}">Verwijderen</a>
								    </td>

								</tr>
								<tr>
									<td>23</td>
								    <td>auto</td>
								    <td>5</td>
								    <td>
								    	<a href="{{ url('/backpanel/slideshow/1') }}">Bewerken</a>
							  		</td>
								    <td>
								    	<a href="{{ url('/backpanel/slideshow/1') }}">Verwijderen</a>
								    </td>

								</tr>               
						    {{-- @endforeach --}}
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
@endsection