<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Message;
use Illuminate\Http\Request;

class StoresController extends Controller
{
    public function show(){

		return view('pages.open-store');

    }

    public function store(Request $request){

    	Message::create($request->all());

    	flash()->success('Амжилттай илгээгдлээ!', 'Баярлалаа');

    	return view('pages.open-store');
    }
}
