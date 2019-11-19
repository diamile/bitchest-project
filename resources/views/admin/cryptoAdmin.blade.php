@extends('layouts.app')

@section('content')
    <article class="container">
        <section class="row">

            @include('admin.layouts.partials._sidenav')

            <section class="col-md-8">
                <section class="panel panel-default">
                    
                        <div class="card text-white bg-primary mb-3" style="max-width: 50rem;">
                                <h3 class="text-center">{{$title}}</h3>
                       </div>

                    <section class="panel-body">


                        <section class="col-md-12">
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
                        </section>

                    </section>
                </section>
            </section>
        </section>
    </article>
@endsection
