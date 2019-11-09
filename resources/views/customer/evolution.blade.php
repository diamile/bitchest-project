@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            @include('customer.partials.sidenav')

            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading"><h1><img src="{{URL::asset('/images')}}/{{$crypto->logo}}"/>&nbsp;{{$crypto->name}}{{$title}}</h1></div>
                    <div class="panel-body">
                               
                                {!! $chart->html() !!}
                        <div class="row text-center Pt30">
                            <a href="{{route('buy.index')}}" class="btn btn-primary ">Acheter</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {!! Charts::scripts() !!}
    {!! $chart->script() !!}
@endsection













