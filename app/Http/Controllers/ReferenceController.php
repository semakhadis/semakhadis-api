<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Reference;
use App\Http\Resources\ReferenceResource;
use App\Http\Requests\ReferenceRequest;

class ReferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return ReferenceResource::collection(Reference::all());
    }

    public function store(ReferenceRequest $request)
    {
      $reference = Reference::create([
        'title' => $request->title,
        'slug' => $request->slug,
        'description' => $request->description,
        'author' => $request->author,
      ]);
    
      return new ReferenceResource($reference);
    }

    public function show($param)
    {
      $reference = Reference::where('id',$param)->orWhere('slug',$param)->firstOrFail();
      return new ReferenceResource($reference);
    }

    public function update(Request $request, Reference $reference)
    {
      $reference->update([
        'title' => $request->title,
        'slug' => $request->slug,
        'description' => $request->description,
        'author' => $request->author,
      ]);

      return new ReferenceResource($reference);
    }

    public function destroy(Reference $reference)
    {
      $reference->delete();

      return response()->json(null, 204);
    }
}
