<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PartnerController extends Controller
{
    public function createPartner(Request $request)
    {
        $request->validate(
            [
                "name" => "required|max:200",
                "testimony" => "required",
                "rating" => "required",
                "foto" => "nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048"
            ],
            [
                "name.required" => "Name field must fill",
                "name.max" => "Name must not more 200 characters",
                "testimony.required" => "Content Field must fill",
                "rating.required" => "Rating must fill",
                "foto.max" => "Maximal size for photo is 2 MB",
                "foto.mimes" => "File extension only jpg, png, jpeg, gif, svg",
                "foto.image" => "File type must image"
            ]
        );
        if(!empty($request->foto)){
            $fileName = 'partner-image-'.uniqid().'.'.$request->foto->extension();
            $request->foto->move(public_path('/storage/image'), $fileName);
        }else{
            $fileName = null;
        }
        DB::table('partners')->insert([
            "name" => $request->name,
            "testimony" => $request->testimony,
            "rating" => $request->rating,
            "foto" => $fileName
        ]);
        return redirect()->route('admin.index');
    }
    //
}
