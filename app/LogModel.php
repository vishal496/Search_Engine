<?php

namespace API;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\DatabaseManager as DB;

class LogModel extends Model
{
    protected $database;

    //Instantiate new object for Result class
    function __construct(DB $db)
    {
    	$this->database = $db;
    }

    /*
     *This function is used to make an entry in database 
     *to keep a record of all the search made by different user.
     *@param string---src-----type of search made by user.
     *@param string---query---actual query made by the user.
     *@param int------userId--user id of logged in user.
    */
    public function logTableEntry($src, $query, $userId)
    {                   
        $updateQuery = $this->database
                       ->update('UPDATE users SET totalqueries = totalqueries+1 WHERE id = ?', [$userId]);

        $insertQuery = $this->database
                       ->table('searchlogs')
                       ->insert([
                            'user_id'=>$userId,
                            'query'=>$query,
                            'query_type'=>$src,
                            'created_at'=>new DateTime,
                            'updated_at'=>new DateTime]
                        );		
    }
}
