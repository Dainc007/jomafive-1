<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class ArticleController extends Controller
{
    public function index()
    {
        return view('articles.index', [
            'allArticles'      => DB::table('articles')->orderBy('id', 'DESC')->limit(4)->get(),
            'leagueHeader'     => 'w Jomafive'
        ]);
    }

    public function business()
    {
        return view('articles.business', [
            'leagueHeader' => 'w lidze Biznesowej',
            'league'       => 'Biznesowa',
            'businessArticles' => Article::where('league', Article::getLeague('Business'))->orderBy('id', 'DESC')->limit(3)->get()
        ]);
    }

    public function weekend()
    {
        return view('articles.weekend', [
            'leagueHeader' => 'w lidze Weekendowej',
            'league'       => 'Weekendowa',
            'weekendArticles'  => Article::where('league', Article::getLeague('Weekend'))->orderBy('id', 'DESC')->limit(3)->get(),
        ]);
    }

    public function kid()
    {
        return view('articles.kid', [
            'leagueHeader' => 'w lidze Dziecięcej',
            'league'       => 'Dziecięca',
            'kidArticles'      => Article::where('league', Article::getLeague('Kid'))->orderBy('id', 'DESC')->limit(3)->get()
        ]);
    }

    public function add()
    {
        return view('articles.add');
    }

    public function store(StoreArticleRequest $request)
    {
               //adding gallery
               if ($request->hasFile('photos')) {

                $galleryName = $request->input('galleryName');
    
                foreach ($request->photos as $photo) {
    
                    $photoName = $photo->getClientOriginalName();
    
                    $path = $photo->storeAs('/images/gallery', $photoName);
    
                    $model = new Photo;
    
                    $model->name = $photoName;
                    $model->galleryName = $galleryName;
                    $model->path = $path;
                    $model->save();
                }
            }  
    
            if ($request->hasFile('photo')) {
    
                $photoName = $request->file('photo')->getClientOriginalName();
                $photoPath = $request->file('photo')->storeAs('/images/gallery', $photoName, '');
                $request['photoName'] = $photoName;
                $request['photoPath'] = $photoPath;

               
    
            }
    
             return redirect(
                route(
                    'articles.show',
                    [
                        'article' => Article::create($request->all())
                    ]
                )
            );  
    }


    public function show(Article $article)
    {
        return view('articles.show', [
            'article' => $article,
            'photos' => Photo::where('galleryName', $article->galleryName)->limit(4)->pluck('path')
        ]);
    }

    public function edit(Article $article)
    {
        return view('articles.edit', [
            'article' => $article
        ]);
    }

    public function update(UpdateArticleRequest $request, Article $article)
    {
        if ($article->update($request->validated())) {
            $request->session()->flash('status', [
                'success' => true,
                'message' => 'Twoj artykuł został edytowany'
            ]);
        } else {
            $request->session()->flash('status', [
                'success' => true,
                'message' => 'Twoj artykuł nie mógł zostać zaktualizowany :('
            ]);
        }

        return redirect(
            route(
                'articles.show',
                ['article' => $article]
            )
        );
    }

    public function delete(Request $request, Article $article)
    {
        if ($article->delete()) {
            $request->session()->flash('status', [
                'success' => true,
                'message' => 'Twoj artykuł został usunięty'
            ]);
        } else {
            $request->session()->flash('status', [
                'success' => true,
                'message' => 'Twoj artykuł nie mógł zostać usunięty :('
            ]);
        }

        return redirect(
            route(
                'articles.index'
            )
        );
    }
}
