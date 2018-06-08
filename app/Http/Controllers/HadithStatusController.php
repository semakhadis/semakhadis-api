<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\HadithStatus;
use App\Http\Resources\HadithStatusResource;

class HadithStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return HadithStatusResource::collection(HadithStatus::all());
    }

    public function store(Request $request)
    {
      $HadithStatus = HadithStatus::create([
        'status' => $request->status,
      ]);
    
      return new HadithStatusResource($HadithStatus);
    }

    public function show($param)
    {
      $HadithStatus = HadithStatus::where('id',$param)->orWhere('slug',$param)->firstOrFail();
      return new HadithStatusResource($HadithStatus);
    }

    public function update(Request $request, HadithStatus $HadithStatus)
    {
      $HadithStatus->update([
        'status' => $request->status,
      ]);

      return new HadithStatusResource($HadithStatus);
    }

    public function destroy(HadithStatus $HadithStatus)
    {
      $HadithStatus->delete();

      return response()->json(["message"=>"Resouce has been deleted"], 200);
    }
}
