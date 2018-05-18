<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Hadith;
use App\Http\Resources\HadithResource;
use App\Http\Requests\HadithRequest;

class HadithController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return HadithResource::collection(Hadith::all());
    }

    public function store(HadithRequest $request)
    {
      $hadith = Hadith::create([
        'title' => $request->title,
        'slug' => $request->slug,
        'text_malay' => $request->text_malay,
        'text_arab' => $request->text_arab,
        'description' => $request->description,
        'hadith_statuses_id' => $request->hadith_statuses_id,
        'hadith_progress_statuses_id' => $request->hadith_progress_statuses_id,
        'created_by' => 1, //use Auth::user->id
      ]);
    
      return new HadithResource($hadith);
    }

    public function show($param)
    {
      $hadith = Hadith::where('id',$param)->orWhere('slug',$param)->firstOrFail();
      return new HadithResource($hadith);
    }

    public function update(HadithRequest $request, Hadith $hadith)
    {
      $hadith->update([
        'title' => $request->title,
        'slug' => $request->slug,
        'text_malay' => $request->text_malay,
        'text_arab' => $request->text_arab,
        'description' => $request->description,
        'hadith_statuses_id' => $request->hadith_statuses_id,
        'hadith_progress_statuses_id' => $request->hadith_progress_statuses_id,
        'created_by' => 1, //use Auth::user->id
      ]);

      return new HadithResource($hadith);
    }

    public function destroy(Hadith $hadith)
    {
      $hadith->delete();

      return response()->json(null, 204);
    }
}
