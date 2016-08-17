<?php

namespace App\Http\Controllers;

use App\Ads;
use App\Adsimage;
use App\Adslocation;
use App\Adstag;
use App\Age;
use App\Article;
use App\Http\Requests;
use App\Http\Requests\CreateAdsRequest;
use Illuminate\Http\Request;
use Image;

class AdsController extends Controller
{
    public function index()
    {
        $ads = Ads::latest()->paginate(10);

        $adstags = Adstag::orderBy('position', 'asc')->get();

        $ages = Age::latest()->get();

        $locations = Adslocation::lists('name', 'name');

		return view('pages.ads_index')->with(compact('ads', 'adstags', 'ages', 'locations'));
    }

    public function create()
    {
    	$tagnames = Adstag::lists('name', 'name');

        $condition = Article::where('url', '=', 'ads-service-condition')->first();

    	$ages = Age::lists('title', 'title');

    	$locations = Adslocation::lists('name', 'name');

		return view('pages.createad')->with(compact('tagnames', 'ages', 'locations', 'condition'));
    } 

    public function store(CreateAdsRequest $request)
    {
        dd($request);
        $ip = $request->ip();

        $photos = Adsimage::where('ip', $ip)->latest()->limit(4)->get();

    	$tagname = $request->input('adstag');

    	$locationname = $request->input('location');

    	$agetitle = $request->input('age');

    	$tag = Adstag::where('name', $tagname)->first();

    	$age = Age::where('title', $agetitle)->first();

    	$location = Adslocation::where('name', $locationname)->first();

    	$newads = Ads::create($request->all());

        $newads->price = (float)  str_replace('.','',$request->input('price'));

        foreach ($photos as $photo)
        {
            $newads->images()->save($photo);
        }        
        foreach ($photos as $photo)
        {
            $photo->ip = "";
            $photo->save();
        }

    	$tag->ads()->save($newads);

    	$age->ads()->save($newads);

    	$location->ads()->save($newads);

        $ads = Ads::latest()->get();

        flash()->success('Таны зар амжилттай орлоо!', 'Баярлалаа');

        return redirect()->route('ads_path');
        
    }   

    public function show($id){

        $ads = Ads::with('location', 'adsage', 'adstag', 'images')->find($id);

        $adstags = Adstag::latest()->get();

        $ages = Age::latest()->get();

        $locations = Adslocation::lists('name', 'name');        

        return view('pages.ads_show')->with(compact('ads', 'adstags', 'ages', 'locations'));
    }   
// store photos
    public function photos(Request $request){

        $this->validate($request, [
            'photo' => 'require|mimes:jpg, jpeg, png, bmp'
        ]);

        $ip = $request->ip();

        $file = $request->file('file');

        $name = time() . $file->getClientOriginalName();

        $imagepath = 'assets/ads/' . $name;

        $thumbpath = 'assets/ads/thumbs/' . $name;

        $file->move('assets/ads', $name);

        Image::make($imagepath)->fit(100)->save($thumbpath);

        $img = Image::make($imagepath);
        // prevent possible upsizing
        $img->resize(700, null, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->save($imagepath);

        Adsimage::create([
            'ip'=>$ip,
            'image' => $name
        ]);

        return $ip;

    }   

}
