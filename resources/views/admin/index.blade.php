@extends('layouts.app')


@section('content')
    <div class="container py-4">
        <div class="card rounded-0 border-light shadow">
            <div class="card-body">
                @include('admin.menu')

                <div class="row mt-4">
                    <div class="col-md-3 border-right">
                        <h4>Utilisateurs</h4>
                        <h5 class="text-muted">{{ \App\User::count() }} </h5>
                    </div>
                    <div class="col-md-3 border-right">
                        <h4>Evenements</h4>
                        <h5 class="text-muted">{{ \App\Event::count() }} </h5>
                    </div>
                    <div class="col-md-3 border-right">
                        <h4>Articles</h4>
                        <h5 class="text-muted">{{ \App\Article::count() }} </h5>
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col-md-12">
                        <h4>Demandes d'adhésion en attente</h4>
                        {{ \App\Adhesion::pending()->get() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
