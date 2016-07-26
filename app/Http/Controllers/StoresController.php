<?php

namespace App\Http\Controllers;

use App\Company;
use App\CompanyType;
use App\Http\Requests;
use App\Message;
use App\Place;
use App\PlaceMenu;
use Illuminate\Http\Request;

class StoresController extends Controller
{
    public function show(){

		return view('pages.open-store');

    }

    public function store(Request $request){

	    $this->validate($request, [
	        'name' => 'required',
	        'phone' => 'required',
	    ]);

    	Message::create($request->all());

    	flash()->success('Амжилттай илгээгдлээ!', 'Баярлалаа');

    	return redirect()->back();
    }


    public function store_type($id)
    {

        $companyType = CompanyType::find($id);

        $companyTypes = CompanyType::orderBy('position', 'asc')->get();

        $menuName = $companyType->name;

        $companies = $companyType->companies()->paginate(50);

        if(CompanyType::where('name', 'LIKE', '%A-Z%')->first()->id == $companyType->id){

            $companies = Company::orderBy('name', 'asc')->paginate(50);
        }

        return view('pages.storemenu')->with(compact('companyType', 'companyTypes', 'menuName', 'ages', 'companies'));
    }    

    public function place_menu($id)
    {

        $placeMenu = PlaceMenu::with('placeTypes.places')->find($id);

        $menuName = $placeMenu->name;

        $paginate = false;

        $companies = $placeMenu->places;

        $placeMenus = PlaceMenu::orderBy('position', 'asc')->get();

        if(PlaceMenu::where('name', 'LIKE', '%A-Z%')->first()->id == $placeMenu->id){

            $companies = Place::orderBy('name', 'asc')->paginate(50);

            $paginate = 'true';

            return view('pages.placemenu')->with(compact('placeMenu', 'menuName', 'companies' ,'paginate', 'placeMenus'));

        }        

        return view('pages.placemenu')->with(compact('placeMenu', 'menuName', 'paginate', 'companies', 'placeMenus'));
    }       
}
