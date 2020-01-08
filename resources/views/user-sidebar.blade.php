<ul class="list-group list-group-flush">
    <li class="list-group-item d-flex justify-content-between align-items-center">
        <a href="{{ url('/home') }}" class="card-link text-dark {{ sideMenuActive('home') }}"><i class="fal fa-home"></i> Espace utilisateur</a>

    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center">

        @if(auth()->user()->adhesions->count() == 0)
            <a href="{{ route('site.adhesion.maj') }}" class="card-link text-dark {{ sideMenuActive('adhesion') }}"><i class="fal fa-thumbtack"></i> Adhésion</a>
            <span class="badge badge-pill badge-danger"><i class="fal fa-times"></i> Inactive</span>
        @elseif(auth()->user()->adhesions->first()->status == false)
            <a href="{{ route('site.adhesion') }}" class="card-link text-dark {{ sideMenuActive('adhesion') }}"><i class="fal fa-thumbtack"></i> Adhésion</a>
            <span class="badge badge-pill badge-warning"><i class="fal fa-minus"></i> En attente</span>
        @else
            <a href="{{ route('site.adhesion') }}" class="card-link text-dark {{ sideMenuActive('adhesion') }}"><i class="fal fa-thumbtack"></i> Adhésion</a>
            <span class="badge badge-pill badge-success"><i class="fal fa-check"></i> Active</span>
        @endif
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center">
        <a href="#" class="card-link text-dark"><i class="fal fa-calendar-alt"></i> Mes évènements</a>

    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center">
        <a href="#" class="card-link text-dark"><i class="fal fa-user"></i> Mon profil</a>

    </li>
    @if(auth()->user()->role_id == 1)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <a href="{{ route('admin.index') }}" class="card-link text-dark"><i class="fal fa-cogs"></i> Gestion</a>

        </li>
    @endif
    <li class="list-group-item d-flex justify-content-between align-items-center">
        <a href="#" class="card-link text-dark"><i class="fal fa-sign-out-alt"></i> Déconnexion</a>

    </li>
</ul>
