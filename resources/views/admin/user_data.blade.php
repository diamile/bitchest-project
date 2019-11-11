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
                            @foreach($users as $user)

                            
                           
                             <form method="POST" action="{{route('user_data.update',$user->id)}}">
                                 @csrf
                               @method('PATCH')
                                

                                <legend>Modification des données</legend>

                                <div class="form-group">
                                        <label class="col-md-4 control-label" for="Name">Nom</label>
                                        <div class="col-md-5">
                                            <input id="Name" name="name" class="form-control input-md" type="text" value="{{ $user->name }}">
                                            @if ($errors->has('Nom'))
                                                <p class="help-block">{{ $errors->first('Nom') }}</p>
                                            @endif
                                        </div>
                                    </div>
    
                                    <div class="form-group">
                                            <label class="col-md-4 control-label" for="email">Email</label>
                                            <div class="col-md-5">
                                                <input id="email" name="email" class="form-control input-md" type="email" value="{{ $user->email }}">
                                                 @if ($errors->has('Email'))
                                                    <p class="help-block">{{ $errors->first('Email') }}</p>
                                                @endif

                                            </div>
                                        </div>


                                        <div class="form-group">
                                                <label class="col-md-4 control-label" for="selectbasic">Statut</label>
                                                <div class="col-md-5">
                                                    <select id="selectbasic" name="admin" class="form-control">
                                                        <option value="1">{{ $statut[0]}}</option>
                                                        <option value="0">{{$statut[1]}}</option>
                                                    </select>
                                                </div>
                                            </div>

                                        <!-- Actions -->
                                        <div class="form-group">
                                                <label class="col-md-4 control-label" for="validation"></label>
                                                <div class="col-md-8">
                                                    <button type="submit" class="btn btn-primary">Modifier</button>
                                                </div>
                                            </div>
                                @endforeach

                                
                        </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
