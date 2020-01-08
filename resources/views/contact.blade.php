@extends('layouts.app')

@section('content')

<div class="jumbotron bg-andel text-white">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <h4 class="display-3">
          Contact
        </h4>

      </div>
      <div class="col-md-4">

      </div>
    </div>
  </div>
</div>
<div class="container mt-4">
  <div class="row">
    <div class="col-md-12">
        @if(Session::has('message'))
            <div class="alert alert-success rounded-0">
                {{ Session::get('message') }}
            </div>
        @endif
      <div class="card rounded-0 border-light shadow">
        <div class="card-body">
          <div class="text-center">
            <h3 class="mb-3">Nous écrire</h3>
            <div class="row justify-content-center">
              <div class="col-md-8 text-center">
                <form action="{{ route('site.contact.send') }}" method="post">
                  @csrf
                  <div class="form-group">
                    <input type="text" name="nom" class="form-control rounded-0 shadow-sm" placeholder="Votre nom" required>
                  </div>
                  <div class="form-group">
                    <input type="email" name="email" class="form-control rounded-0 shadow-sm" placeholder="Votre adresse e-mail" required>
                  </div>
                  <div class="form-group">
                    <textarea class="form-control  rounded-0 shadow-sm" name="message" minlength="10" placeholder="Votre message" required></textarea>
                  </div>
                  <div class="form-group">
                    <button class="btn btn-andel rounded-0">Envoyer</button>
                  </div>

                </form>
              </div>
            </div>
          </div>
          <div class="text-center">
            <h3 class="mb-3">Coordonnées</h3>
          </div>
          <div class="row">
            <div class="col-md-4 text-center p-auto">
              <i class="fal fa-phone text-andel fa-5x"></i>
              <p class="lead mt-4">+213 (0) 555 98 98 98</p>
            </div>
            <div class="col-md-4 text-center p-auto">
              <i class="fal fa-at text-andel fa-5x"></i>
              <p class="lead mt-4">contact@andel.dz</p>
            </div>
            <div class="col-md-4 text-center p-auto">
              <i class="fal fa-map-marker text-andel fa-5x"></i>
              <p class="lead mt-4">13 , Rue ..., Alger.</p>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
@endsection
