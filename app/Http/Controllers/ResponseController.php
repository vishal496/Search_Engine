<?php

namespace API\Http\Controllers;

use API\Result;
use API\Http\Requests;
use Illuminate\Http\Request;

class ResponseController extends Controller
{
    protected $resultModel;
    protected $response;

    function __construct(Result $result, Request $request)
    {
    	$this->resultModel = $result;
    	$this->response = $request;
    }

   /*
    * This method is used to call the different type of search made by the user. 
    *
    * @param param_type param_name param_description
    *  

    * @return view to be called.
    */

   public function search()
    {
    	$queryParam = $this->response->input('search'); 
       
        // switch case to handle the type of search made by user.
    	switch ($queryParam) {
    		case 'SEARCH':
    			$src = "web";
    			$type = "results";
    			$view = "search";
  
    			$searchResponse = $this->resultModel->getFarooResponse($src);
				
				break;

    		case 'NEWS':
    			$src = "news";
    			$type = "results";
    			$view = "search";

    			$searchResponse = $this->resultModel->getFarooResponse($src);
    			
    			break;

    		case 'TRENDING':
    			$src = "topics";
    			$type = "topics";
    			$view = "trending";
    			
    			$searchResponse = $this->resultModel->getFarooResponse($src);
				
				break;
		}		
        
        // gives the number of results in array.
        $count = count($searchResponse[$type]);
        
        return view($view, compact('searchResponse','count','type'));
    }
}
