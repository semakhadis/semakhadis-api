<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Tag;
use App\Http\Resources\TagResource;
use App\Http\Requests\TagRequest;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return TagResource::collection(Tag::all());
    }

    public function store(TagRequest $request)
    {
      $tag = Tag::create([
        'tag' => $request->tag,
        'slug' => $request->slug
      ]);
    
      return new TagResource($tag);
    }

    public function show($param)
    {
      $tag = Tag::where('id',$param)->orWhere('slug',$param)->firstOrFail();
      return new TagResource($tag);
    }

    public function update(Request $request, Tag $tag)
    {
      $tag->update([
        'tag' => $request->tag,
        'slug' => $request->slug
      ]);

      return new TagResource($tag);
    }

    public function destroy(Tag $tag)
    {
      $tag->delete();

      return response()->json(["Content has been deleted"], 204);
    }
}
