<aside class="col-md-4 SideNav">
        <ul class="list-group">
            <li class="list-group-item"><a href="{{ route('personnal_data_admin') }}"><i class="fa fa-address-card" aria-hidden="true"></i> Données personnelles</a></li>
        </ul>
        <ul class="list-group">
            <li class="list-group-item"><a href="{{ route('users') }}"><i class="fa fa-street-view" aria-hidden="true"></i> Clients</a></li>
            <li class="list-group-item"><a href="{{route('crypto')}}"><i class="fa fa-list" aria-hidden="true"></i> Crypto monnaies</a></li>
        </ul>

        <ul class="list-group">
                <li class="list-group-item"><a href="{{route('AdminUser.create')}}"><i class="fa fa-user-plus" aria-hidden="true"></i> Création d'utilisateurs</a></li> 
        </ul>
    </aside>