<?php

namespace API;

use DateTime;
use Illuminate\Database\DatabaseManager as DB;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class LogModel extends Model
{
    protected $authenticate;
    protected $database;

    function __construct(Request $auth,DB $db)
    {
    	$this->authenticate = $auth;
    	$this->database = $db;
    }

    /*
     *This function is used to make an entry in database to keep a record of all the search made by different user.
     *@param string   src     type of search made by user.
     *@param string   query   actual query made by the user.
    */
    public function logTableEntry($src,$query)
    {
    	$user_id = $this->authenticate->user()->id;
    	$insertQuery = $this->database->table('logs')->insert(['user_id'=>$user_id,'query'=>$query,'query_type'=>$src,'created_at'=>new DateTime, 'updated_at'=>new DateTime]);		
    }
}
