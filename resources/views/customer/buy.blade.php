@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            @include('customer.partials.sidenav')

            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>{{$title}}</h3></div>

                    <div class="panel-body">
                    @foreach($errors->all() as $error)
                            <div>
                               {{$error}}
                            </div>
                       @endforeach
                        <div class="col-md-12 card text-white bg-primary mb-3">
                            @foreach($users as $user)

                            <form  method="post" action="{{ route('buy.create') }}" >
                                    @csrf
                                    @method('PATCH')
                                    <legend>Achat : </legend><br>
                                    <hr style="background-color:white">


                                    <div class="form-group">
                                            <label class="col-md-4 control-label" for="quantity">Quantité</label>
                                            <div class="col-md-5">
                                               <input type="text" name="quantity" class="form-control"/>
                                            </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="selectbasic">Crypto monnaie</label>
                                        <div class="col-md-5">
                                            <select id="selectbasic" name="selectbasic" class="form-control">
                                                @foreach($crypto_currency as $crypto)
                                                    <option value="{{ $crypto->id }}">{{ $crypto->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <!-- validation -->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="validate"></label>
                                        <div class="col-md-4">
                                           <input type="submit" class="btn btn-success"/>
                                        </div>
                                    </div>

                                </form>
                               @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection