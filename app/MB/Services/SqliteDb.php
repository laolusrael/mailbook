<?php
/**
 * Created by PhpStorm.
 * User: laolu
 * Date: 12/11/2016
 * Time: 8:14 PM
 */

namespace App\MB\Services;

use App\MB\Interfaces\ISqliteDb;

class SqliteDb implements ISqliteDb
{
    protected $db_name;
    protected $db;
    function __construct()
    {
        $this->db_name = database_path("database.db");
        $this->db =  new \SQLite3($this->db_name);
        var_dump(($this->db_name));
    }

    function getDatabase()
    {
        // TODO: Implement getDatabase() method.

        return $this->db;
    }
}