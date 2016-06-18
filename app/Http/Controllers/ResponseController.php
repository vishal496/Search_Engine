<?php

namespace API\Http\Controllers;

use API\Result;
use API\Http\Requests;
use Illuminate\Http\Request;

class ResponseController extends Controller
{
    protected $resultModel;
    protected $incomingRequest;

    /*
     *Initializes the object for Result class 
     *and Request class.
	*/
    function __construct(Result $result, Request $request)
    {
    	$this->resultModel = $result;
    	$this->incomingRequest = $request;
    }

   /*
    * Returns the response of user search query 
    * @return view helper function which has two parameters i.e. view to be called and an array that has data required for the view to display.
   */

   public function search()
    {
    	// Query made by user.
    	$query = $this->incomingRequest->input('query');

    	// type of query made by user.
    	$queryParam = $this->incomingRequest->input('search');

    	//variables used for displaying the output.
    	$type = "results";
    	$view = "search"; 
       
        // switch case to handle the type of search made by user.
    	switch ($queryParam) {
    		case 'SEARCH':
    			$src = "web";
    			break;

    		case 'NEWS':
    			$src = "news";
    			break;

    		case 'TRENDING':
    			$src = "topics";
    			$type = "topics";
    			$view = "trending";
				break;
		}		
        
        // gets the data response to be displayed in view.
        $searchResponse = $this->resultModel->getFarooResponse($src,$query);

        // gives the number of results in array.
        $count = count($searchResponse[$type]);
        
        return view($view, compact('searchResponse','count','type'));
    }
}
