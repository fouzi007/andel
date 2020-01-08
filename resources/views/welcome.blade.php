@extends('layouts.app')

@section('content')

<div class="jumbotron jumbotron-fluid bg-andel text-white">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
          @if(settings('featured_event_id') !== null)
            <h4 class="display-6">
              Evenement à la une
            </h4>
            <h4 class="display-3">
                {{ featured_event()->nom }}
            </h4>
            <p>
              <i class="fal fa-map-marker"></i> {{ featured_event()->lieu }} <i class="fal fa-calendar-alt"></i> du {{ featured_event()->date_start->formatLocalized('%d %B') }} au {{ featured_event()->date_end->formatLocalized("%d %B %Y") }} .
            </p>
            <a href="{{ route('site.events.participer',featured_event()) }}" class="btn btn-outline-light rounded-0"><i class="fal fa-calendar-plus"></i> PARTICIPER</a>
          @else
              <h4 class="display-6">
                  <img src="{{ asset('img/logo-w.png') }}" alt="">
              </h4>
              <p class="lead">
                  Association Nationale des Diabétologues Endocrinologues Libéraux
              </p>
          @endif

      </div>
      <div class="col-md-6">
          @if(settings('featured_event_id') !== null)
              <iframe
                  class="mt-4"
                  width="100%"
                  height="200"
                  frameborder="0"
                  scrolling="no"
                  marginheight="0"
                  marginwidth="0"
                  src="https://maps.google.com/maps?q={{ featured_event()->latitude }}+,+{{ featured_event()->longitude }}&hl=fr&z=14&amp;output=embed"
              >
              </iframe>
          @endif
      </div>
    </div>
  </div>
</div>
<div class="container mt-4">
    <div class="row">
        <div class="col-md-4">
            <div class="card rounded-0 border-light shadow">
                <div class="card-header">
                    Actualité
                </div>
                <div class="card-body">
                    <ul class="fa-ul ml-4">
                        @foreach($articles as $article)
                            <li>
                                <span class="fa-li"><i class="fal fa-newspaper"></i></span>
                                <a href="{{ route('site.articles.show',$article) }}" class="text-andel">{{ $article->titre }}</a> dans <a href="#" class="text-andel">{{ $article->type }}</a> publié le <i class="text-muted">{{$article->created_at->format('d L Y')}}</i>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card rounded-0 border-light shadow">
                <div class="card-header">
                    À la une
                </div>
                <div class="card-head1 text-white text-center bg-andel p-0" style="height:180px">
                    Image de l'article
                </div>
                <div class="card-body">
                    <h5>Titre de l'article</h5>
                    <p class="text-muted"><i class="fal fa-calendar-alt"></i> 12-12-2019 à 13:08</p>
                </div>
            </div>
        </div>
</div>
</div>
@endsection
