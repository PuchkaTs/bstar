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
use App\Product;
use App\ProductMenu;
use App\ProductSubType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class WelcomeController extends Controller
{
    public function index(Request $request)
	{

		if(! Auth::user()){
			return Redirect::to('login');
		}
        $products = Product::with('images', 'colors')->limit(10)->latest()->get();

		return view('pages.home')->with(compact('map', 'menus', 'products'));
	}

	public function product($id)
	{

		$productType = Product::find($id)->productSubType->productType;

		$productSubTypes = $productType->subtypes;

        $product = Product::with('images', 'brand', 'colors', 'sizes')->find($id);

		return view('pages.product')->with(compact('product', 'productSubTypes', 'productType'));
	}

	public function subType($id)
	{

		$productType = ProductSubType::with('products')->find($id);

		$products = $productType->products()->paginate(20);

		$type = $productType->producttype;

		$subtypes = $type->subtypes;

		$arrayOfId = array_pluck($productType->products, 'brand_id');	

		$brands = Brand::whereIn("id", $arrayOfId)->get();

		$subTypeName = $productType->name;

		$ages = Age::latest()->get();

		return view('pages.subtype')->with(compact('products', 'brands', 'subTypeName', 'subtypes', 'ages'));
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

		$transactionNumber = $date->day . $date->hour . $date->minute . $date->second;

		return view('pages.cart')->with(compact('transactionNumber'));
	}



	public function success()
	{
		return view('pages.success');
	}

	public function store_index()
	{
		$companies = Company::orderBy('position', 'asc')->paginate(100);

		$companyTypes = CompanyType::orderBy('position', 'asc')->with('menu')->get();

		return view('pages.store_index')->with(compact('companies', 'companyTypes'));
	}

	public function store_show($companyUrl)
	{

        $company = Company::where('url', '=', $companyUrl)->with('products')->first();

        $products = $company->products()->paginate(20);

		return view('pages.store')->with(compact('company', 'products'));
	}

	public function store_menu($id)
	{

		$companyMenu = Menu::with('companyTypes.companies')->find($id);

		$menuName = $companyMenu->name;

		return view('pages.storemenu')->with(compact('companyMenu', 'menuName', 'ages'));
	}	

	public function place_show($companyUrl)
	{

        $place = Place::where('url', '=', $companyUrl)->first();

		return view('pages.place')->with(compact('place'));
	}	

	public function place_menu($id)
	{

        $placeMenu = PlaceMenu::with('placeTypes.places')->find($id);

        $menuName = $placeMenu->name;

		return view('pages.placemenu')->with(compact('placeMenu', 'menuName'));
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

		$products = Product::where('name', 'LIKE', '%'.$search.'%')->paginate(20);

		return view('pages.search')->with(compact('products', 'title'));
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
}
