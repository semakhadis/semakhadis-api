<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReferenceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
        // return [
        //     'id' => $request->id,
        //     'title' => $request->title,
        //     'slug' => $requestis->slug,
        //     'description' => (string) $request->description,
        //     'author' => (string) $request->author,
        //     'created_at' => $request->created_at,
        //     'updated_at' => $request->updated_at,
        //   ];
    }
}
