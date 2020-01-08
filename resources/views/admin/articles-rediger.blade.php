@extends('layouts.app')


@section('content')
    <div class="container py-4">
        <div class="card rounded-0 border-light shadow">
            <div class="card-body">
                @include('admin.menu')

                <div class="row m-3">
                    <h3>Rédiger un article </h3>

                    <div class="table-responsive">
                        <form action="{{ route('admin.articles.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="titre">Titre</label>
                                <input type="text" name="titre" id="titre" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="type">Type</label>
                                <select name="type" id="type" class="form-control" required>
                                    <option value="Actualité">Actualité</option>
                                    <option value="Communiqué">Communiqué</option>
                                    <option value="Condoléances">Condoléances</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <textarea name="article" id="article"
                                          class="form-control" placeholder="Votre article" required></textarea>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="is_published" name="is_published">
                                <label class="custom-control-label" for="is_published">Est publié (affiché sur le site)</label>
                            </div>
                            <div class="form-group mt-2">
                                <button class="btn btn-outline-andel"><i class="fal fa-save"></i> Enregistrer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
