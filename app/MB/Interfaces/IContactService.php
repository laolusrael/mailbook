<?php
/**
 * Created by PhpStorm.
 * User: laolu
 * Date: 12/11/2016
 * Time: 7:52 PM
 */

namespace App\MB\Interfaces;


interface IContactService
{
    function createContact($name, $email);
    function getAll();
    function getContactByName($name);
    function getContactByEmail($email);
}