@extends('layouts.app')


@section('content')
    <div class="container py-4">
        <div class="card rounded-0 border-light shadow">
            <div class="card-body">
                @include('admin.menu')

                <div class="row m-3">
                    <h3>Liste des articles </h3>
                    @if(Session::has('message'))
                        <div class="alert alert-success">
                            {{ Session::get('message') }}
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-sm table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Titre</th>
                                <th></th>
                                <th>Type</th>
                                <th>Rédigé par</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($articles as $a)
                                <tr>
                                    <td>{{ $a->id }}</td>
                                    <td>{{ Str::limit($a->titre, 50, '...') }}</td>
                                    <td>
                                        @if($a->is_published)
                                            <i class="fas fa-badge-check text-success" data-toggle="tooltip" data-placement="top" title="Publié"></i>
                                        @else
                                            <i class="fas fa-times-hexagon text-danger" data-toggle="tooltip" data-placement="top" title="Non publié"></i>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="badge badge-sm rounded-0 badge-info">{{ $a->type }}</span>
                                    </td>
                                    <td>{{ $a->auteur }}</td>
                                    <td>{{ $a->created_at->format('d-m-Y') }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-andel">Actions</button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">Aucun article dans la base de données</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>

                        {{ $articles->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
