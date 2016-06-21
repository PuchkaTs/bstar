<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class CardController extends Controller
{
    public function post()
    {

		$request = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>
		<TKKPG>
		  <Request>
		   <Operation>CreateOrder</Operation> 
		   <Language>EN</Language>
		   <Order>
		     <Merchant>TESTECOM</Merchant>
		     <Amount>1230</Amount>
		     <Currency>496</Currency>
		     <Description>Description</Description>
		     <ApproveURL>https://www.babystar.mn</ApproveURL>
		     <CancelURL>https://www.babystar.mn</CancelURL>
		      <DeclineURL>https://www.babystar.mn</DeclineURL>
		      <AddParams>
		        <p1>p1 Value<h2>hhh</h2></p1>
		        <p2>p2 Value</p2>
			  </AddParams>
		    </Order>
		  </Request>
		 </TKKPG>";
		  $xml = $this->httpsPost("https://202.131.225.149:2233/Exec",($request),$_REQUEST['username'],$_REQUEST['password']);

		  return redirect($xml);
    }

	public function httpsPost($Url, $strRequest,$user,$pwd)
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

				return $myUrl;

			}
			else 
				echo 'The Error! Status ->'.$xml->Response->Status;
		}   
		return $xml;
	}
    
}
