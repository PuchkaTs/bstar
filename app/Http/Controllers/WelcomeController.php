<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Requests;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class WelcomeController extends Controller
{
    public function index(Request $request)
	{

        $products = Product::with('images')->limit(10)->latest()->get();

		return view('pages.home')->with(compact('map', 'menus', 'products'));
	}

	public function product($id)
	{
        $product = Product::with('images')->find($id);

		return view('pages.product')->with(compact('product'));
	}

	public function cart()
	{
		return view('pages.cart');
	}

	public function checkout(Request $request)
	{
		$cart=$request->request->all();

		return Redirect::route('success_path');
	}

	public function success()
	{
		return view('pages.success');
	}

	public function store_show($companyUrl)
	{

        $company = Company::where('url', '=', $companyUrl)->with('products')->first();

		return view('pages.store')->with(compact('company'));
	}
}
