<?php

namespace API\Http\Controllers;

use API\Result;
use API\LogModel;
use API\Http\Requests;
use Illuminate\Http\Request;

class ResponseController extends Controller
{
    protected $resultModel;
    protected $incomingRequest;
    protected $logEntry;

    /*
     *Initializes the object for Result class 
     *and Request class.
	*/
    function __construct(Result $result, LogModel $logs,Request $request)
    {
    	$this->resultModel = $result;
    	$this->incomingRequest = $request;
        $this->logEntry = $logs;
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
    	$queryType = $this->incomingRequest->input('type');

    	//variables used for displaying the output.
    	$type = "results";
    	$view = "search"; 
       
        // switch case to handle the type of search made by user.
    	switch ($queryType) {
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

        $viewResponse = json_decode(($searchResponse),true);

        // gives the number of results in array.
        $count = count($viewResponse[$type]);

        // keeping track of search made by different users in database.
        $log = $this->logEntry->logTableEntry($src,$query);
        
        return view($view, compact('viewResponse','count','type'));
    }
}
