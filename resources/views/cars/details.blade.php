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
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi suscipit adipisci est, assumenda aspernatur praesentium, iusto fugiat dolorum similique, vero quod provident hic quaerat numquam, doloribus dolores. Rerum, minus, pariatur. ipsum dolor sit amet, consectetur adipisicing elit. Asperiores illum neque, magni repudiandae animi quisquam unde nostrum dolorem labore nihil expedita aliquam aspernatur suscipit tenetur possimus officia modi laboriosam soluta? ipsum dolor sit amet, consectetur adipisicing elit. Fugit hic vel quos eaque quo perferendis repudiandae illo, quis dicta atque voluptatibus voluptatem iusto distinctio, blanditiis, impedit necessitatibus. Consectetur, maxime quos. ipsum dolor sit amet, consectetur adipisicing elit. Illum amet inventore voluptatem quo harum similique odio cum et, culpa quam repellendus deleniti est voluptate, vitae a magnam tenetur maxime natus! ipsum dolor sit amet, consectetur adipisicing elit. Vitae dolores eos animi at, aliquam. Dignissimos itaque eaque culpa non voluptates nemo laboriosam rerum veritatis voluptatibus nihil, porro, dolorum iste! Fuga! ipsum dolor sit amet, consectetur adipisicing elit. Eligendi, reprehenderit natus quaerat! Aperiam, sequi omnis accusantium fuga dolorem quis vero mollitia, laborum illum incidunt tempore perspiciatis atque distinctio nisi eius! ipsum dolor sit amet, consectetur adipisicing elit. Porro assumenda fuga, similique, numquam rerum, eveniet esse quasi qui mollitia consequatur voluptatem iste illum officia necessitatibus doloremque aperiam. Obcaecati iste, reprehenderit? ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, nemo. Ipsum laboriosam, ex repellat voluptas minima repudiandae quas totam modi illo nobis suscipit dignissimos incidunt veniam, voluptatibus, facere, recusandae aspernatur.</p></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

