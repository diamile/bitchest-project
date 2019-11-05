@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            @include('customer.partials.sidenav')

            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading"><h1>{{$title}}</h1></div>

                    <div class="panel-body">

                        @if(Session::has('flash_message'))
                            <div class="alert alert-success">
                                {{ Session::get('flash_message') }}
                            </div>
                        @endif
                        <div class="col-md-12">
                            <p>Voici la liste de vos crypto monnaies.</p>
                        </div>

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
                                            <a href=""
                                               class="btn btn-default btn-xs"><i class="fa fa-eye"
                                                                                 aria-hidden="true"></i>&nbsp;Historique d'achats</a>
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
