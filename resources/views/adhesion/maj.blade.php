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
                    <div class="card-header">Mise à jour du statut adhérent</div>

                    <div class="card-body">
                        <form action="{{ route('site.adhesion.maj.submit') }}" method="post">
                            @csrf
                            <div class="alert alert-light border">
                                [[ ici texte informatif : avantages et conditions d'adhésion , tarif durée ... ]]
                            </div>

                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="maj-required" name="maj-required">
                                <label class="custom-control-label" for="maj-required">Je souhaite soumettre une demande d'adhésion .</label>
                            </div>
                            <div class="form-group mt-2">
                                <button class="btn btn-outline-dark btn-outline-andel">
                                    Envoyer
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
