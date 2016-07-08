<?php

namespace App\Http\Controllers;

use Image;
use App\Ads;
use App\Adsimage;
use App\Adslocation;
use App\Adstag;
use App\Age;
use App\Http\Requests;
use App\Http\Requests\CreateAdsRequest;
use Illuminate\Http\Request;

class AdsController extends Controller
{
    public function index()
    {
        $ads = Ads::latest()->paginate(10);

        $adstags = Adstag::latest()->get();

        $ages = Age::latest()->get();

        $locations = Adslocation::lists('name', 'name');

		return view('pages.ads_index')->with(compact('ads', 'adstags', 'ages', 'locations'));
    }

    public function create()
    {
    	$tagnames = Adstag::lists('name', 'name');

    	$ages = Age::lists('title', 'title');

    	$locations = Adslocation::lists('name', 'name');

		return view('pages.createad')->with(compact('tagnames', 'ages', 'locations'));
    } 

    public function store(CreateAdsRequest $request)
    {
        // validate the user-entered Captcha code when the form is submitted
        $code = $request->input('CaptchaCode');
        $isHuman = captcha_validate($code);

        if ($isHuman) {

        $ip = $request->ip();

        $photos = Adsimage::where('ip', $ip)->latest()->limit(4)->get();

    	$tagname = $request->input('adstag');

    	$locationname = $request->input('location');

    	$agetitle = $request->input('age');

    	$tag = Adstag::where('name', $tagname)->first();

    	$age = Age::where('title', $agetitle)->first();

    	$location = Adslocation::where('name', $locationname)->first();

    	$newads = Ads::create($request->all());

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
        else {
        // TODO: Captcha validation failed, show error message

            flash()->error('Капча буруу байна!', 'Та дахин оролдоно уу');

            return redirect()->back()->withInput();;
        }        
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
