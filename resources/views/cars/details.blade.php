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
                            <b>Naam auto</b>
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
                        <p class="h2">€34543,-</p>
                    </div>
                    <div class="col-sm-4 col-sm-pull-2">
                        <div class="row">
                            <div class="col-xs-6"><strong>merk:</strong></div>
                            <div class="col-xs-6">Fiat</div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6"><strong>type:</strong></div>
                            <div class="col-xs-6">Multipla</div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6"><strong>kilometerstand:</strong></div>
                            <div class="col-xs-6">354464</div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6"><strong>bouwjaar:</strong></div>
                            <div class="col-xs-6">2142</div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6"><strong>kleur:</strong></div>
                            <div class="col-xs-6">oranje</div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6"><strong>koppeling:</strong></div>
                            <div class="col-xs-6">handgeschakeld</div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6"><strong>body:</strong></div>
                            <div class="col-xs-6">uhm idk</div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6"><strong>brandstof:</strong></div>
                            <div class="col-xs-6">jet fuel</div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6"><strong>kenteken:</strong></div>
                            <div class="col-xs-6">12-asd-1</div>
                        </div>
                    </div>
                    <div class="col-xs-12"><strong>beschrijving:</strong>
                    <p class="lead">My money's in that office, right? If she start giving me some bullshit about it ain't there, and we got to go someplace else and get it, I'm gonna shoot you in the head then and there. Then I'm gonna shoot that bitch in the kneecaps, find out where my goddamn money is. She gonna tell me too. Hey, look at me when I'm talking to you, motherfucker. You listen: we go in there, and that nigga Winston or anybody else is in there, you the first motherfucker to get shot. You understand? </p>

<p>Look, just because I don't be givin' no man a foot massage don't make it right for Marsellus to throw Antwone into a glass motherfuckin' house, fuckin' up the way the nigger talks. Motherfucker do that shit to me, he better paralyze my ass, 'cause I'll kill the motherfucker, know what I'm sayin'? </p>

<p>You think water moves fast? You should see ice. It moves like it has a mind. Like it knows it killed the world once and got a taste for murder. After the avalanche, it took us a week to climb out. Now, I don't know exactly when we turned on each other, but I know that seven of us survived the slide... and only five made it out. Now we took an oath, that I'm breaking now. We said we'd say it was the snow that killed the other two, but it wasn't. Nature is lethal but it doesn't hold a candle to man. </p></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

