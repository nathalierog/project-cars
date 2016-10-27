@extends('layouts.backpanel')
@section('header')
<style>
  #sortable { list-style-type: none; margin: 0; padding: 0; max-width: 100%;}
/*  #sortable li { margin: 3px 3px 3px 0; padding: 1px; float: left; width: 100px; height: 90px; font-size: 4em; text-align: center; }*/
#sortable li {/*max-height: 10em;*/}
#sortable li img {
	height: 15em;
	object-fit: contain;
	overflow: hidden;
}
</style>


@endsection

@section('content')
        <ul id="sortable" class="row">
        	@foreach($images as $key => $image)
        	<li class="ui-state-default col-md-3 thumbnail" data-id="{{$image->id}}"><img src="{{url('files/car_'.$image->car_id.'_'.$image->img_number.'.'.$image->extension)}}" alt=""></li>
			@endforeach
        </ul>
		<button id="save-button" class="col-sm-12 btn btn-default">opslaan</button>
@endsection

@section('script')
<script>
  $( function() {
    $( "#sortable" ).sortable();
    $( "#sortable" ).disableSelection();
  } );

  $("#save-button").click(function (event, ui) {
        var data = {};
        data['_token'] = "{{csrf_token()}}";
        $('#sortable').children().each(function() {
            data['priorities['+$(this).attr('data-id')+']'] = $(this).index();
        });
        $.ajax({
            data: data,
            type: 'POST',
            url: '{{url('backpanel/imgorder')}}'
        });
    });
  </script>
@endsection