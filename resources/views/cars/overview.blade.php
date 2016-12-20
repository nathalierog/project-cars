@extends('layouts.app')

@section('header')
    <link rel="stylesheet" href="{{ URL::asset('css/car.css') }}">
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="results-info">

                    @if(!empty($input['term']))
                        @if($cars->count() >= 1)
                            <div class="alert alert-info text-center">
                                There are <b>{{$cars->count()}}</b> result(s) with <b>{{$input['term']}}</b> found.
                            </div>
                        
                        @else 
                            <div class="alert alert-danger text-center">
                                <strong>Let op!</strong><br>
                                Er zijn geen zoek resultaten gevonden op <b>{{$input['term']}}</b>.<br>
                                Klik <a href="/">hier</a> om naar de uitgebreide zoek pagina te gaan.
                            </div>
                        @endif
                    @endif
            </div>
        @foreach ($cars as $car)
            <a href="{{ url('cars/details/' . $car->id)}}">
                <div class="col-md-12 col-sm-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2 class="h4 text-center-xs text-center-sm">
                                <b>{{ $car->brand->brand }} {{$car->model->model}}</b>
                            </h2>
                        </div>
                        
                        <div class="panel-body">
                            <div class="col-md-4">
                                <img class="img-responsive center-block img-rounded margin-sm" src="{{isset($car->images[0]) && File::exists('files/car_'.$car->images[0]->car_id.'_'.$car->images[0]->img_number.'.'.$car->images[0]->extension) ? 'files/car_'.$car->images[0]->car_id.'_'.$car->images[0]->img_number.'.'.$car->images[0]->extension : 'http://placehold.it/600x400?text='.$car->model}}" alt="plaatje">
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
            <div class="text-center">
                {{ $cars->appends(Request::only('term'))->links() }}
            </div>
        </div>
    </div>
</div>
@endsection