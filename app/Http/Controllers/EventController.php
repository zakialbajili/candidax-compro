<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    public function createEvent(Request $request)
    {
        $request->validate([
            "title" => "required|max:200",
            "description" => "required",
            "event_date" => "required",
            "foto" => "nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048"
        ],
        [
            "title.required" => "Title field must not fill",
            "title.max" => "Title must not more 200 characters",
            "description.required" => "Content Field must not fill",
            "event_date.required" => "Event date must fill",
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
        DB::table('events')->insert([
            "title"=>$request->title,
            "description"=>$request->description,
            "event_date"=>$request->event_date,
            "foto"=>$fileName
        ]);
        return redirect()->route('admin.index');
    }
    //
}
