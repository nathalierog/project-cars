@extends('layouts.app')

@section('header')
    <link rel="stylesheet" href="{{ URL::asset('css/car.css') }}">
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
        @foreach ($cars as $car)
            <a href="{{ url('cars/details/' . $car->id)}}">
                <div class="col-md-12 col-sm-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2 class="h4 text-center-xs text-center-sm">
                                <b>{{ $car->brand }} {{$car->model}}</b>
                            </h2>
                        </div>
                        <div class="panel-body">
                            <div class="col-md-4">
                                <img class="img-responsive center-block img-rounded margin-sm" src="http://placehold.it/360x270" alt="plaatje">
                            </div>
                            <div class="col-md-8">
                                <div class="col-md-12 hidden-xs hidden-sm text-center-sm margin-sm">
                                    <b>{{$car->year}}</b>
                                </div>
                                <div class="col-md-4 col-md-push-8 text-right text-center-xs text-center-sm margin-sm">
                                    <b>€{{$car->price}}</b>
                                </div>
                                <div class="col-md-8 col-sm-12 col-md-pull-4 hidden-xs text-center-sm">
                                    <p>
                                        {{$car->description}}
                                    </p>
                                </div>   
                            </div> 
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
        </div>
    </div>
</div>
@endsection