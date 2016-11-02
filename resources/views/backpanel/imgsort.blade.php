@extends('layouts.backpanel')

@section('content')

        <ul id="sortable" class="row">
        	@foreach($images as $key => $image)
        	<li class="ui-state-default col-md-3 thumbnail" data-id="{{$image->id}}"><img src="{{url('files/car_'.$image->car_id.'_'.$image->img_number.'.'.$image->extension)}}" alt=""><div class="caption">
            <button data-id="{{$image->id}}" class="delete-button btn btn-default col-sm-12">Verwijder</a>
          </div></li>
			@endforeach
        </ul>

        <button id="add-button" class="col-sm-6 btn btn-default" data-toggle="modal" data-target="#myModal">Afbeelding toevoegen</button>
		<button id="save-button" class="col-sm-6 btn btn-default">Opslaan</button>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Afbeelding toevoegen</h4>
      </div>
      {{ Form::open(array('action' => array('AdminController@addImage',$id),'files' => true))}}
      <div class="modal-body">
        <div class="form-group row">
                  <label for="img_upload" class="col-sm-12 col-form-label">Upload image</label>
                  <div class="col-sm-12">
                    <input type="file" class="form-control" multiple accept="image/*" name="img_uploads[]" id="img_upload" placeholder="upload image" value="{{ old('img-uploads')}}">
                  </div>
              </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        {{ Form::submit('Afbeelding uploaden', array('class' => 'btn btn-primary')) }}
                                    {{ Form::close() }}
      </div>
    </div>
  </div>
</div>
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

    $(".delete-button").click(function () {
        var data = {};
        data['_token'] = "{{csrf_token()}}";
        data['id'] = $(this).attr('data-id');

        console.log(data);

        if (confirm('weet je zeker dat je deze afbeelding wil verwijderen?')) {
            $.ajax({
            data: data,
            type: 'POST',
            url: '{{url('backpanel/imgdelete')}}',
            success: function (result) {
              alert(result.message);
              location.reload();
         console.log(result);  
    }
        });
        }


        
    });
  </script>

@endsection