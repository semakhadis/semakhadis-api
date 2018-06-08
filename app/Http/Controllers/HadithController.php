<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Hadith;
use App\Http\Models\Narrator;
use App\Http\Models\Tag;
use App\Http\Models\HadithProgressStatus;
use App\Http\Models\HadithStatus;
use App\Http\Resources\HadithResource;
use App\Http\Requests\HadithRequest;

class HadithController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      // dd($request);
      // $hadith=Hadith::get();
      if(count($request->all())>0){
        $hadiths = new Hadith();
        if($request->has('progress-status')){
          $hps = HadithProgressStatus::where('status', $request->get('progress-status'))->first();
          if(!is_null($hps))
            $hadiths = $hadiths->where('hadith_progress_statuses_id', $hps->id);
        }

        if($request->has('status')){
          $hs = HadithStatus::where('slug', $request->get('status'))->first();
          if(!is_null($hs))
            $hadiths = $hadiths->where('hadith_statuses_id', $hs->id);
        }

        if($request->has('narrator')){
          $narr = Narrator::where('slug', $request->get('narrator'))->first();
          if(!is_null($narr))
            $hadiths = $hadiths->whereHas('Narrators', function($query) use ($narr) {
              $query->where('narrators_id', $narr->id);
            });
        }

        if($request->has('tags')){
          $tags_f = explode(',', $request->get('tags'));
          
          for ($i=0; $i < count($tags_f); $i++) { 
            $tag = Tag::where('slug', $tags_f[$i])->first();
            if(!is_null($tag))
              $hadiths = $hadiths->whereHas('Tags', function($query) use ($tag) {
                $query->where('tags_id', $tag->id);
              });
          }
        }
          
        $hadiths=$hadiths->get();
      }
      else
        $hadiths=Hadith::all();
      return HadithResource::collection($hadiths);
    }

    public function store(Request $request)
    {
      $hadith = $this->_save($request);
      return new HadithResource($hadith);
    }

    public function show($param)
    {
      $hadith = Hadith::where('id',$param)->orWhere('slug',$param)->with('Tags','Narrators','References','HadithStatus','HadithProgressStatus','CreatedBy')->firstOrFail();
      return new HadithResource($hadith);
    }

    public function update(HadithRequest $request, Hadith $hadith)
    {
      $hadith = $this->_save($request, $hadith);
      return new HadithResource($hadith);
    }

    public function destroy(Hadith $hadith)
    {
      $hadith->delete();

      return response()->json(["message"=>"Resouce has been deleted"], 200);
    }

    public function _save($request, $hadith=null)
    {
      if(is_null($hadith))
      {
        $hadith = new Hadith();
      }
      
      $hadith->title = $request->title;
      $hadith->text_malay = $request->text_malay;
      $hadith->text_arab = $request->text_arab;
      $hadith->description = $request->description;
      $hadith->hadith_statuses_id = $request->hadith_statuses_id;
      $hadith->hadith_progress_statuses_id = $request->hadith_progress_statuses_id;
      $hadith->created_by = $request->users_id; //use jwt kot, the app/requester need to send the token created after login, then the token will be validated from the user, so the user db need to token_login
      $hadith->save();

      $hadith->Tags()->detach();
      if($request->has('tags'))
        $hadith->Tags()->attach($request->get('tags'));
      
      $hadith->Narrators()->detach();
      if($request->has('narrators'))
        $hadith->Narrators()->attach($request->get('narrators'));


      $hadith->Tags;
      $hadith->Narrators;
      $hadith->CreatedBy;
      $hadith->HadithStatus;
      $hadith->HadithProgressStatus;

      return $hadith;
    }
}
