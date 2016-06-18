<?php 
namespace API;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;


class Result extends Model
{
    protected $response;

    function __construct(Request $request)
    {
    	$this->response = $request;
    }

    /*
     * This method gets the search result for the query made by the user. 
     *
     * @param param_type param_name param_description
     * @param string     src        type of search made by user 

     * @return php array 
     */
    public function getFarooResponse($src)
    {
    	// Query made by user.
    	 $query = $this->response->input('query');
 		
        //formating the url using php function.
        $data = array('q'=>$query,
                      'start'=>'1',
                      'length'=>'10',
                      'l'=>'en',
                      'src'=>$src,
                      'i'=>'false',
                      'f'=>'json');

        $rawUrl = http_build_query($data);

        // api key and api url in .env file
        // Url to be hit for the search.
        $url = env('API_URL').$rawUrl."&key=".env('API_KEY');

		// Curl request handling.
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$maps_json = curl_exec($ch);
		curl_close($ch);

		// Converting the JSON response to a PHP array.
		$response = json_decode(($maps_json),true);

		return $response;
    }
}
