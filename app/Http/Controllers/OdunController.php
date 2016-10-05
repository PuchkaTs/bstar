<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Odun;
use App\Oduncontent;
use App\Oduntag;
use Illuminate\Http\Request;

class OdunController extends Controller
{
    public function odun_show($id){


		$anews = Oduncontent::find($id);

		return view('pages.odunarticle')->with(compact('anews'));
    }

    public function odun_index($id){



		$tag = Oduntag::find($id);

		$tags = Oduntag::get();

		$news = $tag->contents()->latest()->paginate(20);

		$title = $tag->title;

		if($tag->contents()->count()){

        	$latestId = $tag->contents()->latest()->first()->id;

		}else{
			$latestId = 0;
		}

		return view('pages.odunarticle_index')->with(compact('news', 'title', 'latestId', 'tags'));
    }    
}
