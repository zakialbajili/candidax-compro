<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PartnerController extends Controller
{
    public function indexEditPartner(string $id)
    {
        $detailPartner = Partner::where('id', $id)->firstOrFail(); // Ambil data artikel atau tampilkan 404 jika tidak ditemukan
        // dd($detailPartner['rating']);
        return view('editPartner', compact('detailPartner'));
    }
    public function createPartner(Request $request)
    {
        $request->validate(
            [
                "name" => "required|max:200",
                "testimony" => "required",
                "rating" => "required",
                "foto" => "nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048",
                "position" => "required|max:255",
                "status" => "required"
            ],
            [
                "name.required" => "Name field must fill",
                "name.max" => "Name must not more 200 characters",
                "position.required" => "Position field must fill",
                "position.max" => "Position must not more 255 characters",
                "testimony.required" => "Content Field must fill",
                "rating.required" => "Rating must fill",
                "foto.max" => "Maximal size for photo is 2 MB",
                "foto.mimes" => "File extension only jpg, png, jpeg, gif, svg",
                "foto.image" => "File type must image",
                "status.required" => "Status must selected"
            ]
        );
        if(!empty($request->foto)){
            $fileName = 'partner-image-'.uniqid().'.'.$request->foto->extension();
            $request->foto->move(public_path('/storage/image'), $fileName);
        }else{
            $fileName = null;
        }
        Partner::create([
            "name" => $request->name,
            "testimony" => $request->testimony,
            "rating" => $request->rating,
            "position" => $request->position,
            "isShow" => $request->status,
            "foto" => $fileName
        ]);
        return redirect()->route('admin.index');
    }
    public function editPartner(Request $request, string $id)
    {
        // dd($request->hasDelete);
        $oldUrl = DB::table('partners')->where('id', '=', $id)->value('foto');
        $request->validate(
            [
                "name" => "required|max:200",
                "testimony" => "required",
                "rating" => "required",
                "foto" => "nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048",
                "position" => "required|max:255",
                "status" => "required"
            ],
            [
                "name.required" => "name field must not null",
                "name.max" => "name must not more 200 characters",
                "testimony.required" => "Content Field must not null",
                "rating.required" => "Event date must fill",
                "position.required" => "Position field must fill",
                "position.max" => "Position must not more 255 characters",
                'foto.max' => 'Maximal size for photo is 2 MB',
                "foto.mimes" => "File extension only jpg, png, jpeg, gif, svg",
                "foto.image" => "File type must image",
                "status.required" => "Status must selected"
            ]
        );
        $hasDelete = $request->input('hasDelete') === 'true';
        if($request->hasFile('foto')){
                $fileName = 'images-' . uniqid() . '.' . $request->foto->extension();
                $request->foto->move(public_path('/storage/image'), $fileName);
        }else{
            if($hasDelete == true){
                unlink(public_path('/storage/image/' . $oldUrl));
                $fileName = null;
            }
            else {
                $fileName = $oldUrl;
            }
        }
        Partner::where('id', $id)->update([
            "name" => $request->name,
            "rating" => $request->rating,
            "testimony" => $request->testimony,
            "position" => $request->position,
            "isShow" => $request->status,
            "foto" => $fileName
        ]);
        return redirect()->route('admin.index');
    }
    public function deletePartner(string $id)
    {
        Partner::destroy($id);
        return redirect()->route('admin.index');
    }
    //
}
