<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
//Models
use App\Models\Post;
use App\Models\Article;
use App\Models\Page;
use App\Models\Contact;

class BlogController extends Controller
{
    public function __construct(){
      view()->share('pages',Page::orderBy('order','ASC')->get());
      view()->share('kategoriler',Post::inRandomOrder()->get());
    }

    public function index()
    {
      $data['articles']=Article::orderBy('created_at' , 'DESC')->paginate(2);
      return view("include.anasayfa",$data);
    }

    public function post($slug)
    {
      $data['article']=Article::where('slug',$slug)->first() ?? abort(403,'Yazi bulunamadı.');
      return view('include.post',$data);
    }

    public function kategori($slug)
    {
      $category=Post::whereSlug($slug)->first() ?? abort(403,'Kategori bulunamadı.');
      $data['articles']=Article::where('category_id',$category->id)->orderBy('created_at' , 'DESC')->get();
      return view("include.kategori",$data);
    }

    public function page($slug)
    {
      $page=Page::whereSlug($slug)->first() ?? abort(403,'Sayfa bulunamadı.');
      $data['page']=$page;
      return view("include.page",$data);
    }

    public function contact()
    {
      return view("include.contact");
    }

    public function contactpost(Request $request)
    {
      $request->validate([
        'name'=>'required',
        'email'=>'required|email:rfc,dns',
      ]);
      Contact::create([
        'name'=>$request->name,
        'email'=>$request->email,
        'subject'=>$request->subject,
        'message'=>$request->message,
      ]);
      return redirect()->route('contact')->with('success' , 'Mesajınız başarıyla gönderildi.');
    }


}
