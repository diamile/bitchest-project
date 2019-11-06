@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            @include('customer.partials.sidenav')

            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading"><h1>{{$title}}</h1></div>

                    <div class="panel-body">

                        <div class="col-md-12">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Crypto monnaie</th>
                                    <th>Cours</th>
                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($crypto_history as $crypto)
                                    <tr>
                                        <td>
                                           {{--lien vers page du graphique de la crypto monnaie--}}
                                            <a href="">
                                                <img src="{{URL::asset('/images')}}/{{ $crypto->logo }}"/> {{$crypto->name}}
                                            </a>
                                        </td>
                                        <td>{{$crypto->rate}}</td>
                                        <td>
                                            <a href="" class="btn btn-default btn-xs"><i class="fa fa-eye" aria-hidden="true"></i>Évolution</a>
                                            <a href="{{route('buy.index')}}" class="btn btn-primary btn-xs">Acheter</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
