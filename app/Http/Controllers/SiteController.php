<?php

namespace App\Http\Controllers;

use App\Article;
use App\Event;
use App\Mail\ContactFormSubmittedMail;
use App\Notifications\EventParticipationNotification;
use App\Notifications\EventParticipationRegistredEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\User;
use Illuminate\Support\Facades\Validator;

class SiteController extends Controller
{
    /*
    /* Page d'accueil
    */
    public function index()
    {
      $articles = Article::publiable()->take(5)->get();
      return view('welcome',compact('articles'));
    }
    /*
    /* Page d'accueil
    */
    public function contact()
    {
      return view('contact');
    }

    public function submitContact(Request $request)
    {
        $message = $request->except('_token');
        Mail::to('fouzi.noual@gmail.com')
            ->send(new ContactFormSubmittedMail($message));
        return redirect('/contact')->with('message','Votre message a été envoyé ! ');
    }

    /**
     * @param Event $event
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function participerEvenement( Event $event ) {
        return view('events.participer',compact('event'));
    }

    public function processParticipation( Event $event , Request $request ) {
        $credentials = $request->only('email','password');
        if(\App\User::where('email',$request->email)->first()->alreadyRegistred($event->id)){
            return back()->withInput()->with('login-error','Vous êtes déjà inscrit dans cet évènement, connectez vous pour voir le statut de votre inscription . ');
        }
        if(Auth::attempt($credentials)){
            $user = Auth::user();
            $user->events()->attach($event,['is_active' => false]);
            $user->notify(new EventParticipationNotification($event));
            return redirect('home')->with('message','Vous avez été correctement pré-inscrits à l\'évènement : ' . $event->nom . ' vous serez notifiés par email une fois que celle-ci aura été validée');
        }
        else {
            return back()->withInput()->with('login-error','Les coordonées entrés ne sont pas valides.');
        }
    }

    public function processRegisterParticipation( Event $event , Request $request ) {
        $validator = Validator::make($request->all(), [
            'email' => 'unique:users',
            'telephone' => 'unique:users',
            'password' => 'min:8|confirmed'
        ]);
        if($validator->fails()) {
         return back()->withErrors($validator, 'registerErrors')->withInput();
        }
        $attributes = $request->except('_token','password_confirmation');
        $attributes['role_id'] = 2;

        $user = User::create($attributes);

        $user->events()->attach($event,['is_active' => false]);

        $user->notify(new EventParticipationRegistredEvent($event));

        Auth::login($user);

        return redirect('home')->with('message','Votre compte a été créé avec succès , et votre demande de participation à l\'évènement : ' . $event->nom . ' a été prise en charge , vous serez notifiés par email une fois que celle-ci aura été validée.');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function adhesionMaj() {
        if(auth()->user()->estAdherent()){
            return redirect('/home')->with('message','Vous êtes déjà adhérent.');
        }
        return view('adhesion.maj');
    }

    public function adhesionMajSubmit(Request $request) {
        if($request->has('maj-required')) {
            auth()->user()->adhesions()->create([
                'date_start' => now(),
                'date_end' => now()->addYear(),
                'status' => false
            ]);
            return redirect('/home')->with('message','Votre demande d\'adhésion a bien été soumise, veuillez procéder au payment en espèce du montant de XXXX au siège du bureau . Une fois fait,  une réponse vous sera envoyé par e-mail vous confirmant l\'activation de votre adhésion');
        }
    }

    public function adhesion() {
        return view('adhesion.index');
    }

    public function showArticle( Article $article ) {
        return $article;
    }
}
