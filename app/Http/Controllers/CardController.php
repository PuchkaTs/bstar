<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CardController extends Controller
{
	public $sessionID = "";

	public function checkout(Request $request)
	{
		$this->validate($request, [
	        'phone' => 'required',
	        'address' => 'required',
	        'agreement' => 'size:4',
	    ]);
		$cart=$request->request->all();

		$order = Order::create($request->all());	
		$grandTotal = 0;
		$body = "";

		for($i=1; $i < $cart['itemCount'] + 1; $i++) {
		$name = 'item_name_'.$i;
		$options = 'item_options_'.$i;
		$quantity = 'item_quantity_'.$i;
		$price = 'item_price_'.$i;
		$total = $cart[$quantity] * $cart[$price];
		$grandTotal += $total;

		$others = $this->calculateParams($cart[$options]);

		$body .= 'Захиалга #'.$i.': '.$cart[$name].' --- Тоо x '
		.$cart[$quantity].' --- нгж үнэ ₮'
		.number_format($cart[$price], 2, '.', '') 
		.' --- Нийт $'.number_format($total, 2, '.', '')."</br>"
		.$others."</br>";
		$body .= '========================================================'."</br>";
		}

		$body .= 'Нийт дүн : ₮<b>' . number_format($grandTotal, 2, '.', '') . '</b>';

		$order->body = $body;

		$order->save();
		if(Auth::user()){
			Auth::user()->orders()->save($order);
		}

    	flash()->success('Таны захиалга бүртгэгдлээ!', 'Баярлалаа');
		if($request->metod == 'card'){
			return $this->post($order->id);

		}

		return Redirect::route('success_path');
	}
	
	public function calculateParams($string){
		$returnedOptions = "";
		$string = str_replace(' ', '', $string);		
		$myArray = explode(',', $string);
		foreach ($myArray as $value) {
			if (0 === strpos($value, 'color:')) {
				$returnedOptions .= "--- Өнгө/" . $value;
			}
			if (0 === strpos($value, 'size:')) {
				$returnedOptions .= "--- Хэмжээ/" . $value;

			}			
		}
		return $returnedOptions;
	}

	public function approve(Request $request){
		$response = $request->request->all();
		$orderID = simplexml_load_string($response['xmlmsg'])->OrderID->__toString();
		$xmlStatus = $this->butsaaj_shalgah($orderID);
		if(intval($xmlStatus)==0){
	    	flash()->success('Таны захиалга бүртгэгдлээ!', 'Баярлалаа');
			return Redirect::route('success_path');				
		}else{
			flash()->error('Буцааж шалгахад алдаа гарлаа.');
			return Redirect::route('success_path');	
		}
	
	}

	public function cancel(){
		return "cancel";
	}

	public function decline(){
		return "decline";
	}	

	public function butsaaj_shalgah($orderID){

		$order = Order::where('orderID', '=', $orderID)->first();
		$request = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>	
		<TKKPG>
		<Request>
		<Operation>GetOrderStatus</Operation>
		<Language>EN</Language>
		<Order>
		<Merchant>TESTECOM</Merchant>
		<OrderID>".$orderID."</OrderID>
		</Order>
		<SessionID>".$order->sessionID."</SessionID>
		</Request>
		</TKKPG>";	
		$xmlStatus = $this->httpsPost("https://202.131.225.149:2233/Exec",($request),'name','password');
		var_dump($xml);
		return $xmlStatus;
	}

    public function post($id)
    {

		$request = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>
		<TKKPG>
		  <Request>
		   <Operation>CreateOrder</Operation> 
		   <Language>EN</Language>
		   <Order>
		     <Merchant>TESTECOM</Merchant>
		     <Amount>150000</Amount>
		     <Currency>496</Currency>
		     <Description>Description</Description>
		     <ApproveURL>https://www.babystar.mn/card/approve</ApproveURL>
		     <CancelURL>https://www.babystar.mn/card/cancel</CancelURL>
		      <DeclineURL>https://www.babystar.mn/card/decline</DeclineURL>
		      <AddParams>
		        <p1>p1 Value</p1>
		        <p2>p2 Value</p2>
			  </AddParams>
		    </Order>
		  </Request>
		 </TKKPG>";
		  $xml = $this->httpsPost("https://202.131.225.149:2233/Exec",($request),'name','password',$id);
		  return redirect($xml);
    }

	public function httpsPost($Url, $strRequest,$user,$pwd, $id=NULL)
	{ // Initialisation echo $Url;
		//echo $Url."<br>";
		$ch=curl_init();
		// Set parameters
		echo '<br>curl_init <pre>'.print_r($ch,true).'</pre>'; 
		curl_setopt($ch, CURLOPT_URL, $Url);
		// Return a variable instead of posting it directly
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		// Active the POST method
		curl_setopt($ch, CURLOPT_POST, 1) ;
		// Request				
		curl_setopt($ch, CURLOPT_ENCODING, 'UTF-8');
		curl_setopt($ch, CURLOPT_POSTFIELDS, $strRequest);
		curl_setopt($ch, CURLOPT_VERBOSE, true);

		//$verbose = fopen('C://temp//php.txt', 'rw+');
		//curl_setopt($ch, CURLOPT_STDERR, $verbose);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0 );
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

		//********UPDATED ROWS****************************
		curl_setopt($ch, CURLOPT_SSLVERSION,1);
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
		curl_setopt($ch, CURLOPT_USERPWD, $user.":".$pwd);  
		//********UPDATED ROWS****************************

		// execute the connexion
		$ret = curl_exec($ch);

		//$result = curl_exec($ch);
		if ($ret === FALSE) {
			printf("cUrl error (#%d): %s<br>\n", curl_errno($ch),
				   htmlspecialchars(curl_error($ch)));
		} 
		else {
			$xml = simplexml_load_string($ret); 
			if ($xml->Response->Status == "00")
			{
				$myUrl=$xml->Response->Order->URL."?ORDERID=".$xml->Response->Order->OrderID."&SESSIONID=".$xml->Response->Order->SessionID;
				if($id){
					$order = Order::find($id);
					$order->sessionID = $xml->Response->Order->SessionID;
					$order->orderID = $xml->Response->Order->OrderID;
					$order->save();
				}else{
					return $xml->Response->Status;
				}
				return $myUrl;

			}
			else 
				echo 'The Error! Status ->'.$xml->Response->Status;
		}   
		return $xml;
	}
    
}
