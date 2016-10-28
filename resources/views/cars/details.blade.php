@extends('layouts.app')

@section('header')
<link rel="stylesheet" href="{{ URL::asset('css/car.css') }}">
 <style>
.carousel .carousel-inner img {
  width: 100%;
  height: 25em;
  object-fit: contain;
  overflow: hidden;
}
 </style>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2 class="h4 text-center-xs text-center-sm">
                            <b>{{$car->brand}} {{$car->model}}</b>
                        </h2>
                    </div>
                    <div class="panel-body">
                    <div id="carousel-example-generic" class="col-sm-6 carousel" data-ride="carousel">
                          <!-- Indicators -->
                          <ol class="carousel-indicators">
                            @for ($i = 0; $i < count($car->images); $i++)
                                @if ($i == 0)
                                    <li data-target="#carousel-example-generic" data-slide-to="{{$i}}" class="active"></li>
                                @else
                                    <li data-target="#carousel-example-generic" data-slide-to="{{$i}}"></li>
                                @endif
                            @endfor
                        </ol> 

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            @foreach ($car->images as $key => $image)
                                @if($key == 0)
                                <div class="item active">
                                <img src="{{url('files/car_'.$image->car_id.'_'.$image->img_number.'.'.$image->extension)}}" alt="...">
                                
                                @else
                                <div class="item">
                                <img src="{{url('files/car_'.$image->car_id.'_'.$image->img_number.'.'.$image->extension)}}" alt="...">
                                
                                @endif
                                

                            </div>
                                
                            @endforeach

                            <!-- Controls -->
                            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        
                    </div>
                    <div class="col-sm-2 text-right col-sm-push-4">
                        <p class="h2">€{{$car->price}},-</p>
                        <button class="btn btn-primary col-xs-12" type="button" data-toggle="modal" data-target="#myModal">Reageer</button>
                    </div>
                    <div class="col-sm-4 col-sm-pull-2">
                        <div class="row">
                            <div class="col-xs-6"><strong>merk:</strong></div>
                            <div class="col-xs-6">{{$car->brand}}</div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6"><strong>type:</strong></div>
                            <div class="col-xs-6">{{$car->model}}</div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6"><strong>kilometerstand:</strong></div>
                            <div class="col-xs-6">{{$car->mileage}}</div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6"><strong>bouwjaar:</strong></div>
                            <div class="col-xs-6">{{$car->year}}</div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6"><strong>kleur:</strong></div>
                            <div class="col-xs-6">{{$car->color}}</div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6"><strong>koppeling:</strong></div>
                            <div class="col-xs-6">{{$car->transmission}}</div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6"><strong>body:</strong></div>
                            <div class="col-xs-6">{{$car->body}}</div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6"><strong>brandstof:</strong></div>
                            <div class="col-xs-6">{{$car->fuel}}</div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6"><strong>kenteken:</strong></div>
                            <div class="col-xs-6">{{$car->license_plate}}</div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <strong>beschrijving:</strong>
                        <p>{{$car->description}}</p>
                    </div>
                    
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Reageer op {{$car->brand}} {{$car->model}}</h4>
                                </div>
                                <div class="modal-body">
                                    {{ Form::open(array('url' => 'react_car'))}}
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="name">Name</label>
                                                <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                                            </div>
                                                <input type="hidden" name="id" value="{{$car->id}}">
                                            <div class="form-group col-md-6">
                                                <label for="email">Email address</label>
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="message">Question/Comment</label>
                                                <textarea class="form-control" id="message" name="message" rows="3" placeholder="Question/Comment"></textarea>
                                            </div>
                                            <div class="form-group col-md-12">
                                                {!! Recaptcha::render() !!}
                                            </div>
                                        </div>
                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Annuleren</button>
                                    {{ Form::submit('Reactie versturen', array('class' => 'btn btn-primary')) }}
                                    {{ Form::close() }}
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection

