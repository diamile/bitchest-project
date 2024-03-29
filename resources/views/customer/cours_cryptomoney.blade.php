@extends('layouts.app')

@section('content')
    <article class="container">
        <section class="row">

            @include('customer.partials.sidenav')

            <section class="col-md-8">
                <section class="panel panel-default">
                

                    <div class="panel-body">

                        <div class="col-md-12">

                                <div class="card text-white bg-primary mb-3" style="max-width: 50rem;">
                                        <h3 class="text-center">{{$title}}</h3>
                               </div>

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
                                        <a href="{{route('evolution', $crypto->id)}}">
                                                <img src="{{URL::asset('/images')}}/{{ $crypto->logo }}"/> {{$crypto->name}}
                                            </a>
                                        </td>
                                        <td>{{$crypto->rate}}</td>
                                        <td>
                                            <a href="{{route('evolution',['crypto_id' => $crypto->id])}}" class="btn btn-default btn-xs"><i class="fa fa-line-chart"></i>
                                                    <input type="submit" class="btn btn-success" value="Évolution"/>
                                            </a>
                                            <a href="{{route('buy.index')}}" class="btn btn-primary btn-xs">Acheter</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>


                        </div>

                    </div>
                </section>
            </section>
        </section>
    </article>
@endsection
