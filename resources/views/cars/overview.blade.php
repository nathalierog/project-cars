@extends('layouts.app')

@section('header')
    <link rel="stylesheet" href="{{ URL::asset('css/car.css') }}">
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
        @for ($i = 0; $i < 20; $i++)
            <a href="{{url('cars/details')}}">
                <div class="col-md-12 col-sm-6 col-xs-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2 class="h4 text-center-xs text-center-sm">
                                <b>Naam auto</b>
                            </h2>
                        </div>
                        <div class="panel-body">
                            <div class="col-md-4">
                                <img class="img-responsive center-block img-rounded margin-sm" src="http://placehold.it/360x270" alt="plaatje">
                            </div>
                            <div class="col-md-8">
                                <div class="col-md-12 hidden-xs hidden-sm text-center-sm margin-sm">
                                    <b>Jaargetal</b>
                                </div>
                                <div class="col-md-4 col-md-push-8 text-right text-center-xs text-center-sm margin-sm">
                                    <b>Prijs auto</b>
                                </div>
                                <div class="col-md-8 col-sm-12 col-md-pull-4 hidden-xs text-center-sm">
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                                        Voluptatum recusandae nostrum unde fugiat officia accusamus sequi. 
                                        Voluptatem iure eius recusandae saepe vitae dolores ea, perferendis voluptas, 
                                        similique aliquam velit ipsam.
                                    </p>
                                </div>   
                            </div> 
                        </div>
                    </div>
                </div>
            </a>
        @endfor
        </div>
    </div>
</div>
@endsection