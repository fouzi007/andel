<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function index() {
        return view('admin.index');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function articles (  ) {
        $articles = Article::orderBy('created_at','desc')->paginate(15);
        return view('admin.articles',compact('articles'));

    }

    public function articlesRediger() {
        return view('admin.articles-rediger');
    }

    public function articlesStore( Request $request ) {
        $attributes = $request->all();
        $attributes['is_published'] = $request->has('is_published');
        $attributes['slug'] = Str::slug($request->titre) . '_' . now()->format('d-m');
        auth()->user()->articles()->create($attributes);

        return redirect('/admin/articles')->with('message','Article enregistré.');
    }
}
