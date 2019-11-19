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

                    <div class="panel-body">

                       @if(Session::has('flash_message'))
                            <div class="alert alert-success">
                                {{ Session::get('flash_message') }}
                            </div>
                        @endif

                        @if(Session::has('danger_message'))
                            <div class="alert alert-danger">
                                {{ Session::get('danger_message') }}
                            </div>
                        @endif

                        <section class="col-md-12">
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
                                           
                                                {!! Form::open([
                                                    'method' => 'DELETE',
                                                    'route' => ['user_data.destroy', $user->id]
                                                ]) !!}
                                                <a href="{{ route('user_data.edit',$user->id) }}" class="btn btn-warning btn-xs">
                                                <i class="fa fa-edit" aria-hidden="true"></i> Voir/Modifier
                                                </a>
                                                
                                                    {!! Form::submit('Supprimer', ['class' => 'btn btn-danger btn-xs']) !!}
                                                {!! Form::close() !!}
                                             
                                        </td>
                                    </tr>
                                @endforeach
                               
                                </tbody>
                            </table>

                            {{--affichage de ma pagination --}}

                            {{$users->links()}}

                        </section>



                    </div>
                </section>
            </section>
           

        </section>
    </article>
@endsection
