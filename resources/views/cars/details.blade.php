@extends('layouts.app')

@section('header')
<link rel="stylesheet" href="{{ URL::asset('css/car.css') }}">
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
                    <div id="carousel-example-generic" class="col-sm-6 carousel slide" data-ride="carousel">
                          <!-- Indicators -->
                          <ol class="carousel-indicators">
                            @for ($i = 0; $i < 10; $i++)
                                @if ($i == 0)
                                    <li data-target="#carousel-example-generic" data-slide-to="{{$i}}" class="active"></li>
                                @else
                                    <li data-target="#carousel-example-generic" data-slide-to="{{$i}}"></li>
                                @endif
                            @endfor
                        </ol> 

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            @for ($i = 0; $i < 10; $i++)
                                @if ($i == 0)
                                    <div class="item active">
                                <img src="http://placehold.it/360x270/{{dechex($i)}}00/?text=plaatje {{$i}}" alt="...">
                                <div class="carousel-caption">
                                    plaatje {{$i}}
                                </div>
                            </div>
                                @else
                                    <div class="item">
                                <img src="http://placehold.it/360x270/{{dechex($i)}}00/?text=plaatje {{$i}}" alt="...">
                                <div class="carousel-caption">
                                    plaatje {{$i}}
                                </div>

                            </div>
                                @endif
                            @endfor

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
                    <div class="col-xs-12"><strong>beschrijving:</strong>
                    <p>{{$car->description}}</p></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

