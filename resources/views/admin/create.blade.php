@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            @include('admin.layouts.partials._sidenav')

            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading"><h1>{{$title}}</h1></div>

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


                                <legend>Création d'utilisateurs</legend>

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
                </div>
            </div>
        </div>
    </div>
@endsection
