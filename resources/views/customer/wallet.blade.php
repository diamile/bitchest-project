@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            @include('customer.partials.sidenav')

            <div class="col-md-8">
                <div class="panel panel-default">

                    <div class="panel-body">

                            <div class="card text-white bg-primary mb-3" style="max-width: 50rem;">
                                    <h3 class="text-center">{{$title}}</h3>
                           </div>

                        @if(Session::has('flash_message'))
                            <div class="alert alert-success">
                                {{ Session::get('flash_message') }}
                            </div>
                        @endif
                        

                        <div class="col-md-12">
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
                                        <td>{{number_format($currency['bought'])}}€</td>
                                        <td>
                                            <a href="{{route('wallet_user_crypto_money', ['crypto_id' => $currency['currency']->id])}}"
                                               class="btn btn-default btn-xs">
                                                <input type="button" class="btn btn-primary" value="Historique des achats"/></a>
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
