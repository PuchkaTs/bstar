<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Odun;
use Illuminate\Http\Request;

class OdunController extends Controller
{
    public function odun_show($id){


		$article = Odun::find($id);

		return view('pages.odunarticle')->with(compact('article'));
    }
}
