<?php

namespace App\Http\Controllers;

use App\Age;
use App\Article;
use App\Brand;
use App\Company;
use App\CompanyType;
use App\Http\Requests;
use App\Menu;
use App\Order;
use App\Place;
use App\PlaceMenu;
use App\PlaceSubType;
use App\PlaceType;
use App\Product;
use App\ProductMenu;
use App\ProductSubType;
use App\ProductType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class WelcomeController extends Controller
{
    public function index(Request $request)
	{
		
        $products = Product::with('images', 'colors')->limit(10)->latest()->get();

		return view('pages.home')->with(compact('map', 'menus', 'products'));
	}

	public function product($id)
	{

		$productSubType = Product::find($id)->productSubType()->first();
		
		$productType = $productSubType->producttype;

		$productSubTypes = $productType->subtypes;


        $product = Product::with('images', 'brand', 'colors', 'sizes')->find($id);

        $sameProducts = $this->getRandomSameProducts($productSubType);

		return view('pages.product')->with(compact('product', 'productSubTypes', 'productType', 'sameProducts'));
	}

	public function subType($id)
	{

		$productType = ProductSubType::with('products')->find($id);

		$products = $productType->products()->paginate(20);

		$count = $products->count();

		$type = $productType->producttype;

		$subtypes = $type->subtypes;

		$arrayOfId = array_pluck($productType->products, 'brand_id');	

		$brands = Brand::whereIn("id", $arrayOfId)->get();

		$subTypeName = $productType->name;

		$ages = Age::orderBy('position', 'asc')->get();

		return view('pages.subtype')->with(compact('products', 'brands', 'subTypeName', 'subtypes', 'ages', 'id', 'count'));
	}

	public function menu($id)
	{

		$productMenu = ProductMenu::with('productTypes.subtypes')->find($id);

		$menuName = $productMenu->name;

		return view('pages.menu')->with(compact('productMenu', 'menuName', 'ages'));
	}

	public function brand($id)
	{
		$brand = Brand::with('products')->find($id);

		$brands = Brand::latest()->get();

		$products = $brand->products;

		$brandName = $brand->name;

		return view('pages.brand')->with(compact('products', 'brandName', 'brands'));
	}	

	public function cart()
	{
		$date = Carbon::now();

		$condition = Article::where('url', '=', 'service-condition')->first();

		$transactionNumber = $date->day . $date->hour . $date->minute . $date->second;

		return view('pages.cart')->with(compact('transactionNumber', 'condition'));
	}



	public function success()
	{
		return view('pages.success');
	}

	public function store_index()
	{
		$companies = Company::orderBy('name', 'asc')->paginate(100);

		$companyTypes = CompanyType::orderBy('position', 'asc')->with('menu')->get();

		return view('pages.store_index')->with(compact('companies', 'companyTypes'));
	}

	public function store_show($companyUrl)
	{

        $company = Company::where('url', '=', $companyUrl)->with('products')->first();

        $products = $company->products()->paginate(20);

		return view('pages.store')->with(compact('company', 'products'));
	}
	

	public function place_show($companyUrl)
	{

        $place = Place::where('url', '=', $companyUrl)->first();

		return view('pages.place')->with(compact('place'));
	}	

	public function place_subtype($id)
	{

        $placeSubType = PlaceSubType::with('places')->find($id);

        $placeType = PlaceType::where('id', '=', $placeSubType->placetype_id)->with('placeSubTypes')->first();

        $menuName = $placeSubType->name;

		return view('pages.placesubtype')->with(compact('placeSubType', 'menuName', 'placeType'));
	}			

	public function article($url)
	{
		$article = Article::where('url', $url)->first();

		return view('pages.article')->with(compact('article'));
	}

	public function career()
	{
		$article = Article::where('url', 'career')->first();

		return view('pages.career')->with(compact('article'));
	}	

	public function search(Request $request)
	{
		$title = "Хайлт";

		$search = $request->request->get('q');

		$products = Product::where('searchWord', 'LIKE', '%'.$search.'%')->paginate(20);

		$stores = Company::where('searchWord', 'LIKE', '%'.$search.'%')->paginate(20);

		return view('pages.search')->with(compact('products', 'title', 'stores'));
	}

	public function filterProducts(Request $request)
	{

		$title = "Хайлт";

		$gender = $request->request->get('gender');

		$subtype = ProductSubType::find($request->request->get('subtype_id'));

		$age = Age::find($request->request->get('age'));

		$brand = Brand::find($request->request->get('brand'));

		$price = explode(',', $request->request->get('price'));

		if($gender){
			if($gender == 'Хүү, Охин'){
				$genderIds = $subtype->products()->lists('id')->all();		
			}else{
				$genderIds = $subtype->products()->where('gender', 'LIKE', '%'.$gender.'%')->lists('id')->all();
			}
		}else{
			$genderIds = $subtype->products()->lists('id')->all();
		}

		if($age){
			$ageIds = $age->products->lists('id')->all();
		}else{
			$ageIds = Product::lists('id')->all();
		}

		if($brand){
			$brandIds = $brand->products->lists('id')->all();

		}else{
			$brandIds = Product::lists('id')->all();
		}
		if($price == null){
			$priceIds = Product::lists('id')->all();
		}else{
			$priceIds = Product::whereBetween('price', [$price])->lists('id')->all();			
		}


		$products = Product::whereIn('id', $genderIds)->whereIn('id', $ageIds)->whereIn('id', $brandIds)->whereIn('id', $priceIds)->paginate(20);

		$count = $products->count();

		$id = $request->request->get('subtype_id');

		$productType = ProductSubType::with('products')->find($id);

		$type = $productType->producttype;

		$subtypes = $type->subtypes;

		$arrayOfId = array_pluck($productType->products, 'brand_id');	

		$brands = Brand::whereIn("id", $arrayOfId)->get();

		$subTypeName = $productType->name;

		$ages = Age::latest()->get();

		return view('pages.subtype')->with(compact('products', 'brands', 'subTypeName', 'subtypes', 'ages', 'id', 'count'));
	}	

	public function saleProducts()
	{
		$title = "Хямдарсан бараа";

		$products = Product::where('sale', true)->paginate(20);

		return view('pages.search')->with(compact('products', 'title'));
	}

	public function newProducts()
	{
		$title = "Шинэ бараа";

		$products = Product::where('new', true)->paginate(20);

		return view('pages.search')->with(compact('products', 'title'));
	}	

	public function otherProducts()
	{
		$title = "Бусад бараа";

		$productSubType = ProductSubType::where('name', '=', 'Бусад бараа')->first();
		
		$products = $productSubType->products()->paginate(20);

		return view('pages.search')->with(compact('products', 'title'));
	}		

	public function type($id){

		$productType = ProductType::with('subtypes')->find($id);

		$productTypes = ProductType::where('productmenu_id', '=', $productType->productmenu_id)->get();

		$menuName = $productType->productmenu->name;

		$typeName = $productType->name;

		return view('pages.type')->with(compact('productType', 'menuName', 'productTypes', 'typeName'));
	}	

	public function getRandomSameProducts($productSubType){

		if($sameProducts = $productSubType->products->count() >= 6){

	        return $productSubType->products->random(6);

        }
		if($sameProducts = $productSubType->products->count() >= 5){

	        return $productSubType->products->random(5);

        }  
		if($sameProducts = $productSubType->products->count() >= 4){

	        return $productSubType->products->random(4);

        }              
		if($sameProducts = $productSubType->products->count() >= 3){

	        return $productSubType->products->random(3);

        }
		if($sameProducts = $productSubType->products->count() >= 2){

	        return $productSubType->products->random(2);

        }    

        return null;    
	}
}
