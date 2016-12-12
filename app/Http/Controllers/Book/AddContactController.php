<?php
/**
 * Created by PhpStorm.
 * User: laolu
 * Date: 12/10/2016
 * Time: 12:58 AM
 */

namespace App\Http\Controllers\Book;


use App\Http\Controllers\Controller;
use App\Http\Middleware\VerifyCsrfToken;
use App\Contact;
use App\MB\Interfaces\IContactService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class AddContactController extends  Controller
{
    private $contactService;
    function __construct(IContactService $contactService)
    {
        $this->contactService = $contactService;
        // Allow guests
        $this->middleware('guest');
    }

    public function add(){
        return view('contact.add');
    }

    public function save(Request $request){

        $contact = null;

        // Validate request data against rules.
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255'
        ] );

        try{
            $contact =  $this->contactService->createContact( $request->input('name'), $request->input('email'));

            if($contact != null){
                $nm  = $request->input('name');
                session::flash('message', "new contact ($nm), added.");
            }
            else{
                session::flash('message', "Unable to add contact to database");
            }
        }
        catch(\Exception $e){
            Session::flash('message', "Error while saving contact :: " . $e->getMessage());
        }

        return view('contact.add')->with("contact", $contact);
    }
}