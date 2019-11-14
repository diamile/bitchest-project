<div class="col-md-4 SideNav">
        <ul class="list-group">
            @foreach($users as $user)
            <li class="list-group-item"><a href="{{ route('customer_data.edit',$user->id) }}"><i class="fa fa-address-card" ></i>&nbsp;Données personnelles</a></li>
            @endforeach
        </ul>
        <ul class="list-group">
            <li class="list-group-item"><a href="{{ route('wallet') }}"><i class="fa fa-briefcase" aria-hidden="true"></i>&nbsp;Portefeuille</a></li>
            <li class="list-group-item"><a href="{{route('buy.index')}}"><i class="fa fa-cc-visa" aria-hidden="true"></i>&nbsp;Acheter</a></li>
            <li class="list-group-item"><a href="{{ route('cours_cryptos') }}"><i class="fa fa-list" aria-hidden="true"></i>&nbsp;liste des Cours des crypto monnaies</a></li>
        </ul>
        <ul class="list-group">
            @foreach($users as $user)
                <li class="list-group-item card text-white bg-primary mb-3"><strong>SOLDE</strong> :&nbsp; &nbsp;<strong>{{($total_wallet)}} €</strong></li>
            @endforeach
        </ul>
    </div>
    
    