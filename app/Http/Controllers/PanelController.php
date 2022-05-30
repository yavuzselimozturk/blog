<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Http\Response;
//models
use App\Models\Article;
use App\Models\Post;

class PanelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles=Article::orderBy('created_at' , 'ASC')->get();
        return view("panel.articles.index",compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategoriler=Post::all();
        return view('panel.articles.create',compact('kategoriler'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
          'baslik'=>'min:3',
          'resim'=>'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $article=new Article;
        $article->baslik=$request->baslik;
        $article->category_id=$request->kategori;
        $article->icerik=$request->content;
        $article->slug=Str::slug($request->baslik ,'-');

        if($request->hasFile('resim')){
          $imageName=Str::slug($request->baslik, '-').'.'.$request->resim->getClientOriginalExtension();
          $request->resim->move(public_path('Images'),$imageName);
          $article->resim='/Images/'.$imageName;
        }
        $article->save();
        toastr()->success('Başarılı!', 'Makale Başarı ile Oluşturuldu...');
        return redirect()->route('makaleler.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $article=Article::findOrFail($id);

      $kategoriler=Post::all();
      return view('panel.articles.edit',compact('kategoriler' , 'article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $request->validate([
        'baslik'=>'min:3',
        'resim'=>'image|mimes:jpeg,png,jpg|max:2048'
      ]);

      $article=Article::findOrFail($id);
      $article->baslik=$request->baslik;
      $article->category_id=$request->kategori;
      $article->icerik=$request->content;
      $article->slug=Str::slug($request->baslik ,'-');

      if($request->hasFile('resim')){
        $imageName=Str::slug($request->baslik, '-').'.'.$request->resim->getClientOriginalExtension();
        $request->resim->move(public_path('Images'),$imageName);
        $article->resim='/Images/'.$imageName;
      }
      $article->save();
      toastr()->success('Başarılı!', 'Makale Başarı ile Güncellendi...');
      return redirect()->route('makaleler.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function switch(Request $request)
    {
      $article=Article::findOrFail($request->id);
      $article->status=$request->statu="true" ? 1 : 0;
      $article->save();
    }

    public function destroy($id)
    {
      Article::where('id', $id)->delete();
      toastr()->success('Başarılı!', 'Makale Başarı ile Geri Dönüşüm Kutusuna Taşındı...');
      return redirect()->route('makaleler.index');
    }

    public function trash()
    {
      $articles=Article::onlyTrashed()->orderBy('deleted_at' , 'ASC')->get();
      return view('panel.articles.trash',compact('articles'));
    }

    public function recover($id)
    {
      $article= Article::onlyTrashed()->findOrFail($id);
      $article->restore();
      toastr()->success('Başarılı!', 'Makale Başarı ile kurtarıldı...');
      return redirect()->back();
    }

    public function forceDeleted($id)
    {
      Article::onlyTrashed()->where('id', $id)->forceDelete();
      toastr()->success('Başarılı!', 'Makale Başarı ile Silindi...');
      return redirect()->route('makaleler.index');
    }

}
