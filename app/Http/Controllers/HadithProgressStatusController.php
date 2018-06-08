<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\HadithProgressStatus;
use App\Http\Resources\HadithProgressStatusResource;

class HadithProgressStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return HadithProgressStatusResource::collection(HadithProgressStatus::all());
    }

    public function store(Request $request)
    {
      $HadithProgressStatus = HadithProgressStatus::create([
        'status' => $request->status,
      ]);
    
      return new HadithProgressStatusResource($HadithProgressStatus);
    }

    public function show($param)
    {
      $HadithProgressStatus = HadithProgressStatus::where('id',$param)->orWhere('slug',$param)->firstOrFail();
      return new HadithProgressStatusResource($HadithProgressStatus);
    }

    public function update(Request $request, HadithProgressStatus $HadithProgressStatus)
    {
      $HadithProgressStatus->update([
        'status' => $request->status,
      ]);

      return new HadithProgressStatusResource($HadithProgressStatus);
    }

    public function destroy(HadithProgressStatus $HadithProgressStatus)
    {
      $HadithProgressStatus->delete();

      return response()->json(["message"=>"Resouce has been deleted"], 200);
    }
}
