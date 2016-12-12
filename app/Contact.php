<?php
/**
 * Created by Seun S. Lawal.
 * User: laolusrael
 * Date: 12/10/2016
 * Time: 1:19 AM
 */

namespace App;

use Illuminate\Http\Request;

class Contact extends Request
{
    protected $table = "contacts";
    protected $fillable = ['name','email'];


}