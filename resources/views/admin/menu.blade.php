<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link {{ tabMenuActive('admin') }}">Accueil </a>
    </li>

    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle {{ tabMenuActive('admin/articles') }}" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Site</a>
        <div class="dropdown-menu">
            <span class="dropdown-header">Articles</span>
            <a class="dropdown-item {{ tabMenuActive('admin/articles') }}" href="{{ route('admin.articles') }}"><i class="fal fa-newspaper"></i> Liste</a>
            <a class="dropdown-item {{ tabMenuActive('admin/articles/rediger') }}" href="{{ route('admin.articles.rediger') }}"><i class="fal fa-pen-square"></i> Rédiger </a>
            <div class="dropdown-divider"></div>
            <span class="dropdown-header">L'association</span>
            <a class="dropdown-item" href="#"><i class="fal fa-info-circle"></i> Présentation</a>
            <a class="dropdown-item" href="#"><i class="fal fa-users-medical"></i> Membres du bureau</a>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Evenements</a>
        <div class="dropdown-menu">
            <a class="dropdown-item"><i class="fal fa-calendar-alt"></i> Liste</a>
            <a class="dropdown-item" href="#"><i class="fal fa-calendar-plus"></i> Créer</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#"><i class="fal fa-calendar-star"></i> Statistiques</a>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">Médias</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">Paramètres</a>
    </li>
</ul>
