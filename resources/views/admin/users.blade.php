@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            @include('admin.layouts.partials._sidenav')

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
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Statut</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>
                                            {{ $user->name }}
                                        </td>
                                        <td>
                                            @if ($user->admin)
                                                {{$statut[0]}}
                                            @else
                                                {{$statut[1]}}
                                            @endif
                                        </td>
                                        <td>
                                           
                                            <a href="" class="btn btn-warning btn-xs">
                                            <i class="fa fa-edit" aria-hidden="true"></i> Voir/Modifier
                                            </a>
                                            
                                             
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
