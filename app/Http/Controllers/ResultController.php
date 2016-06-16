<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ResultController extends Controller
{
    public function search()
    {
    	switch ($_POST['search']) {
    		case 'SEARCH':
    			$src = "web";
    			$type = "results";
    			
    			// Query made by user.
				$raw_query = $_POST['query'];

				// Encoded query for url.
				$encoded_query = rawurlencode($raw_query);

				// Url to be hit for the search.
				$url = "http://www.faroo.com/api?q=".$encoded_query."&start=1&length=10&l=en&src=".$src."&i=false&f=json&key=Tf9@y14AptkXcnmoTCxyt@UDFCs_";

				// Curl request handling.
				$ch = curl_init($url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				$maps_json = curl_exec($ch);
				curl_close($ch);

				// Converting the JSON response to a PHP array.
				$response = json_decode(($maps_json),true);
				$count = count($response[$type]);
				return view('search', compact('response','count','type'));
				break;

    		case 'NEWS':
    			$src = "news";
    			$type = "results";
    			
    			// Query made by user.
    			$raw_query = $_POST['query'];

				// Encoded query for url.
				$encoded_query = rawurlencode($raw_query);

				// Url to be hit for the search.
				$url = "http://www.faroo.com/api?q=".$encoded_query."&start=1&length=10&l=en&src=".$src."&i=false&f=json&key=Tf9@y14AptkXcnmoTCxyt@UDFCs_";

				// Curl request handling.
				$ch = curl_init($url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				$maps_json = curl_exec($ch);
				curl_close($ch);

				// Converting the JSON response to a PHP array.
				$response = json_decode(($maps_json),true);
				$count = count($response[$type]);
				return view('search', compact('response','count','type'));
    			break;

    		case 'TRENDING':
    			$src = "topics";
    			$type = "topics";

    			// Query made by user.
    			$raw_query = $_POST['query'];

				// Encoded query for url.
				$encoded_query = rawurlencode($raw_query);

				// Url to be hit for the search.
				$url = "http://www.faroo.com/api?q=".$encoded_query."&start=1&length=10&l=en&src=".$src."&i=false&f=json&key=Tf9@y14AptkXcnmoTCxyt@UDFCs_";

				// Curl request handling.
				$ch = curl_init($url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				$maps_json = curl_exec($ch);
				curl_close($ch);

				// Converting the JSON response to a PHP array.
				$response = json_decode(($maps_json),true);
				$topic_count = count($response[$type]);
				return view('trending', compact('response','topic_count','type'));
				break;
    	}
    }
}
