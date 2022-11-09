<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\News;

class NewsController extends Controller
{

    public function index(){

        $search = request('search');

        if($search){

            $news = News::where([
                ['title', 'like', '%'.$search.'%']
            ])->get();

        }else{
            $news = News::all();
        }
        
        return view('dashboard', ['news' => $news, 'search' => $search]);
    }

    public function create(){

        $news = News::all();        
        return view('news.create', ['news' => $news]);
    
    }

    public function store(Request $request){
        $new = new News;
        
        $new->title = $request->title;
        $new->description = $request->description;

        //upload de imagem
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now") . "." . $extension );

            
            $requestImage->move(public_path('img/news'), $imageName);  
            
            $new->image = $imageName;
        }


        $new->save();

        return redirect('/home')->with('msg', 'Notícia criada com sucesso!');
    }


    public function show($id){
        $new = News::findOrFail($id);
        return view('news.show', ['new' => $new]);
    }


}
