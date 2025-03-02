<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    public function listEvents()
    {
        $listEvents = Event::orderBy('event_date', 'desc')->get();
        return view('events', compact('listEvents'));
    }
    public function detailEvent(string $id)
    {
        $event = Event::where('id', $id)->first();
        return view('detailEvent', compact('event'));
    }
    public function indexEditArticle(string $id)
    {
        $detailEvent = Event::where('id', $id)->firstOrFail(); // Ambil data artikel atau tampilkan 404 jika tidak ditemukan
        // dd($detailEvent);
        return view('editEvent', compact('detailEvent'));
    }
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
        Event::create([
            "title"=>$request->title,
            "description"=>$request->description,
            "event_date"=>$request->event_date,
            "foto"=>$fileName,
            "created_at"=>now(),
            "updated_at"=>now()
        ]);
        return redirect()->route('admin.index');
    }
    public function editEvent(Request $request, string $id)
    {
        // dd($request->hasDelete);
        $oldUrl = DB::table('events')->where('id', '=', $id)->value('foto');
        $request->validate(
            [
                "title" => "required|max:200",
                "description" => "required",
                "event_date" => "required",
                "foto" => "nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048"
            ],
            [
                "title.required" => "Title field must not null",
                "title.max" => "Title must not more 200 characters",
                "description.required" => "Content Field must not null",
                "event_date.required" => "Event date must fill",
                'foto.max' => 'Maximal size for photo is 2 MB',
                "foto.mimes" => "File extension only jpg, png, jpeg, gif, svg",
                "foto.image" => "File type must image"
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
        Event::where('id', $id)->update([
            "title" => $request->title,
            "event_date" => $request->event_date,
            "description" => $request->description,
            "foto" => $fileName
        ]);
        return redirect()->route('admin.index');
    }
    public function deleteEvent(string $id)
    {
        Event::destroy($id);
        return redirect()->route('admin.index');
    }
    //
}
