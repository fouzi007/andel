@extends('layouts.app')

@section('content')
<div class="container mt-lg-5">
    <div class="row">
        <div class="col-md-4">
            <div class="card rounded-0">
                <div class="card-header">Ma page</div>

                <div class="card-body p-0">
                    <div class="card-body p-0">
                        @include('user-sidebar')
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card rounded-0">
                <div class="card-header">Informations</div>

                <div class="card-body p-0">
                    @if(Session::has('message'))
                        <div class="alert alert-success m-4">
                            {{ Session::get('message') }}
                        </div>
                    @endif
                    @if(!auth()->user()->estAdherent())
                        <div class="alert alert-warning m-4 shadow-sm alert-dismissible fade show">
                            <p><strong><i class="fal fa-info"></i> Attention</strong></p>
                            <p>Votre statut d'adhésion n'est pas encore défini .</p>
                            <a class="btn btn-outline-dark btn-sm mt-2" href="{{ route('site.adhesion.maj') }}"><i class="fal fa-pen"></i> Mettre à jour</a>

                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                        <div class="row">
                            <div class="col-md-6">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <strong>Type de compte :</strong> {{ Auth::user()->role->description }}
                                    </li>
                                    <li class="list-group-item">
                                        <strong>Nom :</strong> {{ Auth::user()->nom }}
                                    </li>
                                    <li class="list-group-item">
                                        <strong>Prénom(s) :</strong> {{ Auth::user()->prenom }}
                                    </li>
                                    <li class="list-group-item">
                                        <strong>Spécialité :</strong> {{ Auth::user()->specialite }}
                                    </li>
                                    <li class="list-group-item">
                                        <strong>Wilaya :</strong> {{ Auth::user()->wilaya->nom }}
                                    </li>
                                    <li class="list-group-item">
                                        <strong>Statut :</strong> {{ Auth::user()->statut }}
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <strong>Adresse e-mail :</strong> {{ Auth::user()->email }}
                                    </li>
                                    <li class="list-group-item">
                                        <strong>Télephone :</strong> {{ Auth::user()->telephone }}
                                    </li>
                                    <li class="list-group-item">
                                        <strong>Date d'inscription :</strong> {{ Auth::user()->created_at->format('d-m-Y') }}
                                    </li>

                                </ul>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
