@extends('layouts.app')

@section('content')
    <article class="container">
        <section class="row">

            @include('admin.layouts.partials._sidenav')

            <section class="col-md-8 card text-white bg-primary mb-3">
                <section class="panel panel-default">
                        <div class="panel-heading"><h3 class="text-center">{{$title}}</h3></div><br>

                        <hr style="background-color:white;">
                    <div class="panel-body">

                         @foreach($errors->all() as $error)
                            <div>
                               {{$error}}
                            </div>
                       @endforeach
                        <div class="col-md-12">
                           
                           
                                <form method="POST" action="{{route('AdminUser.store')}}">
                                @csrf
                                @method('PATCH')


                                

                                 <div class="form-group">
                                    <label class="col-md-4 control-label" for="Name">Nom</label>
                                    <div class="col-md-5">
                                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                                        @if ($errors->has('Nom'))

                                            <p class="help-block">{{ $errors->first('Nom') }}</p>
                                        @endif
                                    </div>
                                </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="email">Email</label>
                                            <div class="col-md-5">
                                               {!! Form::text('email', null, ['class' => 'form-control']) !!}
                                                 @if ($errors->has('Email'))
                                                    <p class="help-block">{{ $errors->first('Email') }}</p>
                                                @endif

                                            </div>
                                        </div>


                                        <div class="form-group">
                                                <label class="col-md-4 control-label" for="password">Mot de pass</label>
                                                <div class="col-md-5">
                                                   {!! Form::text('password', null, ['class' => 'form-control']) !!}
                                                     @if ($errors->has('Pasword'))
                                                        <p class="help-block">{{ $errors->first('Password') }}</p>
                                                    @endif
    
                                                </div>
                                            </div>



                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="selectbasic">Statut</label>
                                            <div class="col-md-5">
                                                {!! Form::select('admin',['1' => 'Aministrateur', '0' => 'Client'],null, ['class' => 'form-control']) !!}
                                            </div>
                                        </div>

                                        <!-- Actions -->
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="validation"></label>
                                            <div class="col-md-8">
                                                <input type="submit" class="btn btn-success" value="Créer"/>
                                            </div>
                                        </div>
                               

                                
                            </form>
                        </div>

                    </div>
                </section>
            </section>
        </section>
    </article>
@endsection
