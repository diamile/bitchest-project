@extends('layouts.app')

@section('content')
    <article class="container">
        <section class="row">

            @include('customer.partials.sidenav')

            <div class="col-md-8">
                <div class="panel panel-default">
                     
                        <div class="panel-body">

                            <div class="card text-white bg-primary mb-3" style="max-width: 50rem;">
                                <h3 class="text-center">{{$title}}</h3>
                           </div>

                        <section class="col-md-12">
                            {{-- Affichage de l'historique de  mes achats--}}
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Quantité</th>
                                    <th>Cours</th>
                                    <th>Plus value*</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($transactions as $transaction)
                                    <tr>
                                        <td>{{$transaction->buy_date}}</td>
                                        <td>{{$transaction->quantity}}</td>
                                        <td>{{$rate}}</td>
                                        
                                        <td>{{$capital_gain}} €</td>
                                    
                                    <td><a href="{{route('destroyCrypto',$transaction->id)}}" class="btn btn-primary btn-xs">Vendre</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <p>Total : <strong>{{$total}} {{$title}}</strong></p>
                            

                        </section>

                    </div>
                </div>
            </div>
        </section>
    </article>
    {{--Javascript permettant d'afficher la courbe de progression de la crypto monnaie--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
@endsection
