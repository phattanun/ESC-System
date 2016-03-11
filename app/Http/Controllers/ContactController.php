<?php

namespace App\Http\Controllers;

use App\Http\Requests;

class ContactController extends Controller
{
    public function contactPage() {
        return view('contact');
    }

    public function addNewMember() {
    }
}
