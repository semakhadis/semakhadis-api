<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Narrator;
use App\Http\Resources\NarratorResource;
use App\Http\Requests\NarratorRequest;

class NarratorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return NarratorResource::collection(Narrator::all());
    }

    public function store(NarratorRequest $request)
    {
      $narrator = Narrator::create([
        'name' => $request->name,
        'full_name' => $request->full_name,
        'info' => $request->info,
        'slug' => $request->slug,
      ]);
    
      return new NarratorResource($narrator);
    }

    public function show($param)
    {
      $narrator = Narrator::where('id',$param)->orWhere('slug',$param)->firstOrFail();
      return new NarratorResource($narrator);
    }

    public function update(Request $request, Narrator $narrator)
    {
      $narrator->update([
        'name' => $request->name,
        'full_name' => $request->full_name,
        'info' => $request->info,
        'info' => $request->slug,
      ]);

      return new NarratorResource($narrator);
    }

    public function destroy(Narrator $narrator)
    {
      $narrator->delete();

      return response()->json(null, 204);
    }
}
