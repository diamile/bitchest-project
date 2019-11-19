@extends('layouts.app')

{{--Page d'accueil de chaque client (portefeuille de chaque client)---}}
@section('content')
    <article class="container">
        <section class="row">

            @include('customer.partials.sidenav')

            <div class="col-md-8">
                <div class="panel panel-default">
                    
                    <div class="panel-body">
                            {{--Affichage de la valeur du crypto monnai quand il est vendu---}}
                            <div class="card text-white bg-primary mb-3" style="max-width: 50rem;">
                                    
                                        
                                 {{--Affichage de la valeur du crypto monnaie s'il est vendu sinon on affiche rien---}}
                                            @if(Session::get('prix_vente') =='')
                                            
                                            <h3 class="text-center">
                                               {{$title}}&nbsp;&nbsp;
                                            </h3>

                                            @else
                                            <h3 class="text-center">
                                                {{$title}}&nbsp;&nbsp;  <strong class="btn btn-info">VALEUR &nbsp; :&nbsp;{{Session::get('prix_vente')}} €</strong>
                                            </h3>
                                             
                                            @endif
                                        
                           </div>

                        @if(Session::has('flash_message'))
                            <div class="alert alert-success">
                                {{ Session::get('flash_message') }}
                            </div>
                        @endif
                        
                      {{--Affichage du portefeuille de chaque utilisateur---}}
                        <section class="col-md-12">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Crypto monnaie</th>
                                    <th>Quantité</th>
                                    <th>€</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($bought_list as $currency)

                                    <tr>
                                        <td>
                                            <a href="">
                                                <img src="{{URL::asset('/images')}}/{{$currency['currency']->logo}}"/>&nbsp;{{$currency['currency']->name}}
                                            </a>
                                        </td>
                                        <td>{{number_format($currency['quantity'])}}</td>
                                        <td id="bought">{{number_format($currency['bought'])}}€</td>
                                        <td>
                                            <a href="{{route('wallet_user_crypto_money', ['crypto_id' => $currency['currency']->id])}}"
                                               class="btn btn-default btn-xs">
                                             <input type="button" class="btn btn-primary" value="Historique des achats"/></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </section>

                    </div>
                </div>
            </div>
        </section>
    </article>
@endsection
