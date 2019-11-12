@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            @include('admin.layouts.partials._sidenav')

            <div class="col-md-8 card text-white bg-primary mb-3">
                <div class="panel panel-default">
                    <div class="panel-heading"><h1>{{$title}}</h1></div>

                    <div class="panel-body">

                         @foreach($errors->all() as $error)
                            <div>
                               {{$error}}
                            </div>
                       @endforeach
                        <div class="col-md-12">
                            @foreach($users as $user)

                            
                            {!! Form::model($user, [
                                'method' => 'PATCH',
                                'route' => ['user_data.update',$user->id]
                            ]) !!}
                                

                                <legend>Modification des données</legend>

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
                                            <label class="col-md-4 control-label" for="selectbasic">Statut</label>
                                            <div class="col-md-5">
                                                {!! Form::select('admin',['1' => 'Aministrateur', '0' => 'Client'],null, ['class' => 'form-control']) !!}
                                            </div>
                                        </div>

                                        <!-- Actions -->
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="validation"></label>
                                            <div class="col-md-8">
                                                {!! Form::submit('Modifier', ['class' => 'btn btn-success']) !!}
                                            </div>
                                        </div>
                                @endforeach

                                
                           {!! Form::close() !!}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
