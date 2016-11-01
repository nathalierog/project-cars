@extends('layouts.backpanel')

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
    $("#save-button").on('click', function (event, ui){
        var data = {};
        data['_token'] = "{{csrf_token()}}";
        $('#sortable').children().each(function() {
            data['priorities['+$(this).attr('data-id')+']'] = $(this).index();
        });
        $.ajax({
            data: data,
            type: 'POST',
            url: '{{url('backpanel/imgorder')}}',
            success: function (result){
                window.location.replace('{{url('backpanel/cars')}}');  
            }
        });
    });
</script>
@endsection