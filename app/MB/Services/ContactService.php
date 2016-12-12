<?php
/**
 * Created by Seun S. Lawal
 * User: laolusrael
 * Date: 12/11/2016
 * Time: 7:55 PM
 */

namespace App\MB\Services;


use App\MB\Interfaces\IContactService;
use Carbon\Carbon;

class ContactService implements IContactService
{

    private $db;
    private $db_name = "database.db";
    function __construct()
    {
        $this->db = new \SQLite3(database_path($this->db_name));
    }

    function createContact($name, $email)
    {
        $date = Carbon::now();
        $stmt = $this->db->prepare("INSERT INTO contacts (name, email, created_at, updated_at) VALUES (:name, :email, :c_date, :u_date )");

        $stmt->bindValue(':name', $name, SQLITE3_TEXT);
        $stmt->bindValue(':email', $email, SQLITE3_TEXT);
        $stmt->bindValue(':c_date', $date, SQLITE3_TEXT);
        $stmt->bindValue(':u_date', $date, SQLITE3_TEXT);

        $result = $stmt->execute();

        if ( $result != null){
            $contact = (object)["name" => "$name", "email" => "$email", "created_at" => "$date", "updated_at" => "$date"];
            return $contact;
        }

        return null;

    }

    function getAll()
    {
        $query = "SELECT * FROM contacts";
        $result = $this->db->query($query);
        if($result != null){

            $row = array();
            $i = 0;
            while($res = $result->fetchArray(SQLITE3_ASSOC)){
                if(!isset($res['Id'])) continue;


                $row[$i] = (object) [
                        'Id' => $res['Id'],
                        'Name' => $res['Name'],
                        'Email' => $res['Email'],
                        'Created_At' => $res['Created_At'],
                        'Updated_At' => $res['Updated_At']
                ];

                $i++;
            }

          return $row;
        }

        return array();
    }

    function getContactByName($name)
    {

        $stmt = $this->db->prepare( "SELECT * FROM contacts WHERE name = :name");
        $stmt->bindValue(":name", $name);

        $result = $stmt->execute();

        var_dump($result);

        if($result != null){
            return $result;
        }

        return null;
    }

    function getContactByEmail($email)
    {

        $stmt = $this->db->prepare("SELECT * FROM contacts WHERE email = :email");
        $stmt->bindValue(":email",$email);

        $result = $stmt->execute();

        var_dump($result);

        if($result != null){
            return $result;
        }

        return null;
    }
}