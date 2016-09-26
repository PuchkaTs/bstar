<?php

namespace App\Http\Controllers;

use App\Article;
use App\Company;
use App\CompanySubType;
use App\CompanyType;
use App\Http\Requests;
use App\Menu;
use App\Message;
use App\Place;
use App\PlaceMenu;
use Illuminate\Http\Request;

class StoresController extends Controller
{
    public function show($type){

        $article = Article::where('url', $type)->first();

        if($type == ''){

        }else{

        }

		return view('pages.open-store')->with(compact('article'));

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

        $placeMenu = PlaceMenu::with(['placeTypes.places'=>function($query){
            $query->orderBy('position', 'asc');
        }])->with(['places'=>function($query){
            $query->orderBy('position', 'asc');
        }])->find($id);

        $menuName = $placeMenu->name;

        $AZ = false;

        $companies = $placeMenu->places;

        $placeMenus = PlaceMenu::orderBy('position', 'asc')->get();

        if(PlaceMenu::where('name', 'LIKE', '%A-Z%')->first()){
            if(PlaceMenu::where('name', 'LIKE', '%A-Z%')->first()->id == $placeMenu->id){

                $companies = Place::orderBy('name', 'asc')->paginate(50);

                $AZ = 'true';

                return view('pages.placemenu')->with(compact('placeMenu', 'menuName', 'companies' ,'AZ', 'placeMenus'));

            }              
        }
      

        return view('pages.placemenu')->with(compact('placeMenu', 'menuName', 'AZ', 'companies', 'placeMenus'));
    } 
    public function store_menu($id)
    {

        $companyMenu = Menu::with(['companyTypes.companies'=>function($query){
            $query->orderBy('position', 'asc');
        }])->with(['companies'=>function($query){
            $query->orderBy('position', 'asc');
        }])->find($id);

        $menuName = $companyMenu->name;

        $AZ = false;

        $companies = $companyMenu->companies;

        $companyMenus = Menu::orderBy('position', 'asc')->get();

        if(Menu::where('name', 'LIKE', '%A-Z%')->first()){
            if(Menu::where('name', 'LIKE', '%A-Z%')->first()->id == $companyMenu->id){

            $companies = Company::orderBy('name', 'asc')->paginate(50);

            $AZ = 'true';

            return view('pages.storemenu')->with(compact('companyMenu', 'menuName', 'companies' ,'AZ', 'companyMenus'));

        }   
        }

        return view('pages.storemenu')->with(compact('companyMenu', 'menuName', 'AZ', 'companies', 'companyMenus'));
    }   

    public function store_subtype($id)
    {

        $companySubType = CompanySubType::with('companies')->find($id);

        $companyType = CompanyType::where('id', '=', $companySubType->companytype_id)->with('companySubTypes')->first();

        $menuName = $companySubType->name;

        return view('pages.storesubtype')->with(compact('companySubType', 'menuName', 'companyType'));
    }            
}
