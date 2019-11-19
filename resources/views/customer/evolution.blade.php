@extends('layouts.app')

@section('content')
    <article class="container">
        <section class="row">

            @include('customer.partials.sidenav')

            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3><img src="{{URL::asset('/images')}}/{{$crypto->logo}}"/>&nbsp;{{$crypto->name}}{{$title}}</h3></div>
                    <div class="panel-body">
                             {{-- Affichae du graph montrant l'evolution du crypto monnaie--}}  
                                {!! $chart->html() !!}
                        <div class="row text-center Pt30">
                            <a href="{{route('buy.index')}}" class="btn btn-primary ">Acheter</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </article>

    {!! Charts::scripts() !!}
    {!! $chart->script() !!}
@endsection













