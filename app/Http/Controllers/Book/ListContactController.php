<?php
/**
 * Created by PhpStorm.
 * User: laolu
 * Date: 12/10/2016
 * Time: 8:11 AM
 */

namespace App\Http\Controllers\Book;


use App\Http\Controllers\Controller;
use App\Contact;
use App\MB\Interfaces\IContactService;
use Illuminate\Support\Facades\Session;


class ListContactController extends Controller
{

    private $contactService;

    function __construct(IContactService $contactService)
    {
        $this->contactService = $contactService;
    }

    public function listContacts(){
        $contacts = $this->contactService->getAll();
        return view('contact.list')->with('contacts', $contacts);
    }
}