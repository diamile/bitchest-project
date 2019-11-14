@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            @include('admin.layouts.partials._sidenav')

            <div class="col-md-8">
                <div class="panel panel-default">
                    
                        <div class="card text-white bg-primary mb-3" style="max-width: 50rem;">
                                <h3 class="text-center">{{$title}}</h3>
                       </div>

                    <div class="panel-body">


                        <div class="col-md-12">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Crypto monnaie</th>
                                    <th>Cours</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($crypto_history as $crypto)
                                    <tr>
                                        <td>
                                                <img src="{{URL::asset('/images')}}/{{ $crypto->logo }}"/>
                                                {{ $crypto->name }}
                                        </td>
                                        <td>  
                                                {{$crypto->rate}}

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
