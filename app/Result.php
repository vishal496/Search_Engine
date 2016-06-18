<?php 
namespace API;

use Illuminate\Database\Eloquent\Model;


class Result extends Model
{

    function __construct()
    {
    	
    }

    /*
     * This method gets the search result for the query made by the user from the faroo search api. 
     *
     * @param string     src        type of search made by user. 
     * @param string     query      query made by user.
     * @return json response received from the faroo search api.
     *
     */
    public function getFarooResponse($src,$query)
    {
 		
        //formating the url using php function.
        $data = ['q'=>$query,
                 'start'=>'1',
                 'length'=>'10',
                 'l'=>'en',
                 'src'=>$src,
                 'i'=>'false',
                 'f'=>'json'];

        // api key and api url in .env file
        // Url to be hit for the search.
        $url = env('API_URL').http_build_query($data)."&key=".env('API_KEY');
        
		// Curl request handling.
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$farooResponse = curl_exec($ch);
		curl_close($ch);

		return $farooResponse;
    }
}
