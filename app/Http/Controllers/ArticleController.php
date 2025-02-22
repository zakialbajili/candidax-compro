<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    public function listArticle()
    {
        $article = Article::all();
        return view();
    }
    public function createArticle(Request $request)
    {
        $request->validate([
            "title" => "required|max:200",
            "description" => "required",
            "foto" => "nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048"
        ],
        [
            "title.required" => "Title field must not null",
            "title.max" => "Title must not more 200 characters",
            "description.required" => "Content Field must not null",
            'foto.max' => 'Maximal size for photo is 2 MB',
            "foto.mimes" => "File extension only jpg, png, jpeg, gif, svg",
            "foto.image" => "File type must image"
        ]);
        if(!empty($request->foto)){
            $fileName = 'images-'.uniqid().'.'.$request->foto->extension();
            $request->foto->move(public_path('/storage/image'), $fileName);
        }else{
            $fileName = null;
        }
        DB::table('articles')->insert([
            "title"=>$request->title,
            "description"=>$request->description,
            "foto"=>$fileName
        ]);
        return redirect()->route('admin.index');
    }
    //
}
