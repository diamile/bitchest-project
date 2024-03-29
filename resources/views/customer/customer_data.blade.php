@extends('layouts.app')

@section('content')
    <article class="container PersonnalData">
        <section class="row">

            @include('customer.partials.sidenav')

            <div class="col-md-8">
                <div class="panel panel-default">
                    
                    <div class="panel-body">


                        <div class="col-md-12 card text-white bg-primary mb-3">
                               
                           @foreach($users as $user)

                                 {{-- Affichage des données personnelles du client encours--}}
                                 
                                 <form  method="post" action="{{ route('customer_data.update',$user->id) }}" >
                                    @csrf
                                    @method('PATCH')

                                    <div class="panel-heading"><h3 class="text-center">{{$title}}</h3></div><br>

                                    <hr style="background-color:white;">

                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="Name">Nom</label>
                                        <div class="col-md-5">                            
                                            <input type="text" name="name" class="form-control" value="{{$user->name}}"/>
                                            @if ($errors->has('Nom'))
                                                <p class="help-block">{{ $errors->first('Nom') }}</p>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="email" value="value="{{$user->email}}>Email</label>
                                        <div class="col-md-5">                            
                                                <input type="email" name="email" class="form-control"/>
                                        </div>
                                    </div>

                                    
                                    
                                    <div class="form-group">
                                            <label class="col-md-4 control-label" for="email">Mot de passe</label>
                                            <div class="col-md-5">                            
                                                    <input type="password" name="password" class="form-control"/>
                                            </div>
                                    </div>

                                    <!-- Actions -->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="validation"></label>
                                        <div class="col-md-8">
                        
                                            <input type="submit" value="Modifier mes données" class="btn btn-success" />

                                        </div>
                                    </div>


                                
                                </form>
                            @endforeach

                        </div>

                    </div>
                </div>
            </div>
        </section>
    </article>
@endsection
