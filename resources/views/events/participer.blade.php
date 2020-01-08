@extends('layouts.app')

@section('content')
    <div class="container mt-lg-5">
        <div class="card rounded-0 border-light shadow">
            <div class="card-body">
                <div class="text-center">
                    <h4>Participer à l'évènement : {{ $event->nom }}</h4>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" id="account-exists" name="account-status" class="custom-control-input">
                    <label
                        class="custom-control-label"
                        for="account-exists">
                        J'ai un compte utilisateur </label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" id="account-new" name="account-status" class="custom-control-input">
                    <label class="custom-control-label" for="account-new">Je suis nouveau ( créer un compte )</label>
                </div>

                <div class="collapse mt-4" id="login-panel">
                    <h5>Connectez-vous</h5>
                    @if (Session::has('login-error'))
                        <div class="alert alert-warning">
                            {{ Session::get('login-error') }}
                        </div>
                    @endif
                    <form action="{{ route('site.events.login',$event) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="email">Adresse e-mail</label>
                            <input type="email" class="form-control rounded-0" id="email" name="email" value="{{ old('email') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Mot de passe</label>
                            <input type="password" class="form-control rounded-0" id="password" name="password" value="{{ old('password') }}" required>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-outline-dark rounded-0"><i class="fal fa-sign-in-alt"></i> S'inscrire à l'évènement</button>
                        </div>
                    </form>
                </div>

                <div class="collapse mt-4" id="register-panel">
                    <div class="form-group">
                        <label for="i-am">Je suis</label>
                        <select id="i-am" class="form-control">
                            <option value="" selected disabled>Choisissez ...</option>
                            <option value="1">Médecin</option>
                            <option value="2">Laboratoire</option>
                            <option value="3">Agence</option>
                        </select>
                    </div>
                </div>

                <div class="collapse mt-4" id="medecin-panel">
                    <h4>Inscription</h4>
                    @if (!$errors->registerErrors->isEmpty())
                        <div class="alert alert-warning">
                            Il y a des erreurs dans le formulaire :
                            @foreach ($errors->registerErrors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    @endif
                    <form action="{{ route('site.events.register',$event) }}" method="post">
                        @csrf
                        <div class="row">

                            <div class="col-md-6 border-right">
                                <h4>Informations personnelles</h4>
                                <div class="form-group">
                                    <label for="nom">Nom</label>
                                    <input type="text" name="nom" class="form-control rounded-0" id="nom" required value="{{ old('nom') }}">
                                </div>
                                <div class="form-group">
                                    <label for="prenom">Prénom</label>
                                    <input type="text" name="prenom" class="form-control rounded-0" id="prenom" required value="{{ old('prenom') }}">
                                </div>
{{--                                <div class="form-group">--}}
{{--                                    <label for="date_naissance">Date de naissance</label>--}}
{{--                                    <input type="date" max="{{ now()->format('Y-m-d') }}" name="date_naissance" class="form-control rounded-0" id="date_naissance" required value="{{ old('date_naissance') }}">--}}
{{--                                </div>--}}
                                <div class="form-group">
                                    <label for="specialite">Spécialité</label>
                                    <select name="specialite" id="specialite" class="form-control rounded-0" required>
                                        <option value="" selected disabled>Choisissez votre spécialité</option>
                                        <option value="Endocrinologie">Endocrinologie</option>
                                        <option value="Diabétologie">Diabétologie</option>
                                        <option value="Médecine Interne">Médecine Interne</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="wilaya_id">Wilaya</label>
                                    <select name="wilaya_id" id="wilaya_id" class="form-control rounded-0" required>
                                        <option value="" selected disabled>Sélectionnez votre wilaya</option>
                                        @foreach(\App\Wilaya::all() as $wilaya)
                                            <option value="{{ $wilaya->id }}">{{ $wilaya->code }} - {{ $wilaya->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="statut">Statut</label>
                                    <select name="statut" id="statut" class="form-control rounded-0" required>
                                        <option value="" selected disabled>Sélectionnez votre statut</option>
                                        <option value="Libéral">Libéral</option>
                                        <option value="Public">Public</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h4>Compte utilisateur</h4>
                                <div class="form-group">
                                    <label for="email">Adresse E-Mail</label>
                                    <input type="email" name="email" id="email" class="form-control rounded-0" required value="{{ old('email') }}">
                                </div>
                                <div class="form-group">
                                    <label for="telephone">Numéro de télephone</label>
                                    <input type="tel" name="telephone" id="telephone" class="form-control rounded-0" required value="{{ old('telephone') }}">
                                </div>
                                <div class="form-group">
                                    <label for="password">Mot de passe</label>
                                    <input type="password" name="password" id="password" class="form-control rounded-0" required value="{{ old('password') }}">
                                </div>
                                <div class="form-group">
                                    <label for="password_confirmation">Confirmer le mot de passe</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control rounded-0" required>
                                </div>

                            </div>
                        </div>
                        <button class="btn btn-outline-dark rounded-0"><i class="fal fa-user-plus"></i> S'inscrire et participer à l'évènement</button>
                    </form>

                </div>

                <div class="collapse mt-4" id="soon-panel">
                    <div class="alert alert-info">
                        Les inscriptions pour les laboratoires et les agences seront ouvertes bientôt .
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('#account-exists').change(function () {
            if(this.checked){
                $('#register-panel').collapse('hide');
                $('#login-panel').collapse('show');
            }
        })
        $('#account-new').change(function () {
            if(this.checked){
                $('#login-panel').collapse('hide');
                $('#register-panel').collapse('show')
            }
        });
        $('#i-am').change(function () {
            if($(this).val() == 1) {
                $(this).prop('disabled',true);
                $('#medecin-panel').collapse('show');
                $('#soon-panel').collapse('hide');
            }
            else {
                $('#soon-panel').collapse('show');
            }
        })
    </script>
    @if (!$errors->registerErrors->isEmpty())
        <script>
            $('#account-new').prop('checked',true);
            $('#medecin-panel').collapse('show')
        </script>
    @endif
    @if (Session::has('login-error'))
        <script>
            $('#account-exists').prop('checked',true);
            $('#login-panel').collapse('show')
        </script>
    @endif
@endsection
