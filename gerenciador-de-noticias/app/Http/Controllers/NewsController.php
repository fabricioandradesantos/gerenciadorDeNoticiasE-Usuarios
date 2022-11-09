<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\News;
use App\Models\User;

class NewsController extends Controller
{

    public function index(){

        $search = request('search');

        if($search){

            $user = auth()->user();

            //retorna a noticia buscada se existir e pertencer ao usuario logado
            //usei a doc pra saber usar where composto
            $news = News::where([
                ['title', 'like', '%'.$search.'%']
            ])
            ->where('user_id', $user->id)
            ->get();
           
        }else{
            $user = auth()->user();
            $news = $user->news;
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

        $user = auth()->user();
        $new->user_id = $user->id;


        $new->save();

        return redirect('/home')->with('msg', 'Notícia criada com sucesso!');
    }


    public function show($id){
        $new = News::findOrFail($id);
        return view('news.show', ['new' => $new]);
    }

    public function destroy($id){
        News::findOrFail($id)->delete();
        return redirect('/home')->with('msg', 'Notícia excluída com sucesso!');
    }

    public function edit($id){
        $new = News::findOrFail($id);

        return view('news.edit', ['new' => $new]);

    }

    public function update(Request $request){
        
        $data = $request->all();

        //upload de imagem
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now") . "." . $extension );

            
            $requestImage->move(public_path('img/news'), $imageName);  
            
            $data['image'] = $imageName;
        }

        

        News::findOrFail($request->id)->update($data);

        return redirect('/home')->with('msg', 'Notícia editada com sucesso!');

    }


}
