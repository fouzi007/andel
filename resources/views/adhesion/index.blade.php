@extends('layouts.app')

@section('content')
    <div class="container mt-lg-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card rounded-0">
                    <div class="card-header">Ma page</div>

                    <div class="card-body p-0">
                        @include('user-sidebar')
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card rounded-0">
                    <div class="card-header">Adhérent</div>

                    <div class="card-body p-0">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <strong>Votre statut d'adhésion est :</strong> <span class="badge badge-pill badge-success"><i class="fal fa-check"></i> Actif</span>
                            </li>
                            <li class="list-group-item">
                                <strong>Date d'adhésion :</strong> {{ auth()->user()->active_adhesion->date_start->format('d-m-Y') }} ( {{ auth()->user()->active_adhesion->date_start->diffForHumans() }} )
                            </li>
                            <li class="list-group-item">
                                <strong>Date d'expiration :</strong> {{ auth()->user()->active_adhesion->date_end->format('d-m-Y') }} ( {{ auth()->user()->active_adhesion->date_end->diffForHumans() }} )
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
