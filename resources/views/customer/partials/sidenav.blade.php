<div class="col-md-4 SideNav">
        <ul class="list-group">
            @foreach($users as $user)
            <li class="list-group-item"><a href=""><i class="fa fa-user" aria-hidden="true"></i>&nbsp;Données personnelles</a></li>
            @endforeach
        </ul>
        <ul class="list-group">
            <li class="list-group-item"><a href=""><i class="fa fa-credit-card" aria-hidden="true"></i>&nbsp;Portefeuille</a></li>
            <li class="list-group-item"><a href=""><i class="fa fa-download" aria-hidden="true"></i>&nbsp;Acheter</a></li>
            <li class="list-group-item"><a href=""><i class="fa fa-list" aria-hidden="true"></i>&nbsp;Cours des crypto monnaies</a></li>
        </ul>
        <ul class="list-group">
            @foreach($users as $user)
                <li class="list-group-item">Mon solde en Euros : <strong>{{($total_wallet)}} €</strong></li>
            @endforeach
        </ul>
    </div>
    
    