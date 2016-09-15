@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
        @for ($i = 0; $i < 25; $i++)
        <a href="{{url('cars/details')}}">
            <div class="panel panel-default">
                <div class="panel-heading"><h2 class="h4"><b>volkSWAGen gulf</b></h2></div>

                <div class="panel-body">
                   <div class="col-md-4">
                            <img class="img-responsive center-block img-rounded" src="http://placehold.it/360x270" alt="plaatje">
                    
                    </div>
                    <div class="col-md-8">
                        <div class="col-md-12 col-xs-6">
                            <b>03/2012</b>
                        </div>
                        <div class="col-md-4 col-xs-6 col-md-push-8 text-right"><b>€54.000</b></div>
                        <div class="col-md-8 col-sm-12 col-md-pull-4"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum recusandae nostrum unde fugiat officia accusamus sequi. Voluptatem iure eius recusandae saepe vitae dolores ea, perferendis voluptas, similique aliquam velit ipsam.</p></div>
                        
                    </div> 
                </div>
            </div>
            </a>
        @endfor
        </div>
    </div>
</div>
@endsection

