<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Orderedproduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{
	public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(){
    	$orderedProducts = 0;
    	return view('pages.report_index')->with(compact('orderedProducts'));
    }

    public function show(Request $request){


    	$total = $request->total;
    	$from = $request->start_date;
    	$to = $request->end_date;

    	// $orderedProducts = Orderedproduct::with('product')->limit($total)->get();

    	// $orderedProducts = DB::table('orderedproducts')
     //            ->select('product_id', DB::raw('SUM(totalItems) as total_items'))
     //            ->groupBy('product_id')
     //            ->orderBy('total_items', 'dsc')
     //            ->limit($total)
     //            ->get();
    	if($total){
	    	$orderedProducts = Orderedproduct::with('product')
	                ->select('product_id', DB::raw('SUM(totalItems) as total_items'))
	                ->groupBy('product_id')
	                ->orderBy('total_items', 'dsc')
	                ->limit($total)
	                ->whereBetween('created_at', array($from, $to))
	                ->get();
	            } else{
	    			$orderedProducts = Orderedproduct::with('product')
	                ->select('product_id', DB::raw('SUM(totalItems) as total_items'))
	                ->groupBy('product_id')
	                ->whereBetween('created_at', array($from, $to))
	                ->orderBy('total_items', 'dsc')
	                ->get();	            	
	            }

        $totalAmount = 0;     

        foreach($orderedProducts as $product){
        	$totalAmount += $product->product->price * $product->total_items;
        }

    	return view('pages.report_index')->with(compact('orderedProducts', 'totalAmount', 'from', 'to'));
    }    
}
