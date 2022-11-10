<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function index(News $news)
    {
        return view('dashboard', ['news' => $news->paginate(2)]);
    }
    
    
    public function user(){
        return $this->belongsTo('App\Models\News');
    }




}
