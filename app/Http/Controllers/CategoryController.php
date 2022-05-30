<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

//models
use App\Models\Post;
use App\Models\Article;

class CategoryController extends Controller
{
    public function index()
    {
      $categories=Post::all();
      return view("panel.categories.index", compact('categories'));
    }

    public function create(Request $request)
    {
      $isExist=Post::whereSlug(Str::slug($request->category))->first();
      if($isExist){
        toastr()->error($request->category.' adında zaten bir kategori var...');
        return redirect()->back();
      }
      $category=new Post;
      $category->isim=$request->category;
      $category->slug=Str::slug($request->category);
      $category->save();
      toastr()->success('Kategori Başarıyla Oluşturuldu');
      return redirect()->back();
    }

    public function update(Request $request)
    {
      $isExist=Post::whereSlug(Str::slug($request->category))->first();
      if($isExist){
        toastr()->error($request->category.' adında zaten bir kategori var...');
        return redirect()->back();
      }

      $category=Post::find($request->id);
      $category->isim=$request->category;
      $category->slug=Str::slug($request->slug);
      $category->save();
      toastr()->success('Kategori Başarıyla Güncellendi');
      return redirect()->back();
    }

    public function delete(Request $request)
    {
      $category=Post::findOrFail($request->id);
      if($category->id==1){
        toastr()->error('Bu Kategori Silinemez');
        return redirect()->back();
      }
      $count=$category->articleCount();
      if($count>0){
        Article::where('category_id', $category->id)->update(['category_id'=>1]);
        $defaultCategory=Post::find(1);
        toastr()->success('Bu kategoriye ait ' .$count.' makale ' .$defaultCategory->isim. ' kategorisine taşındı.');
      }
      $category->delete();
      toastr()->success('Kategori Başarıyla Silindi');
      return redirect()->back();
    }

    public function getData(Request $request)
    {
      $category=Post::findOrFail($request->id);
      return response()->json($category);
    }
}
