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

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
