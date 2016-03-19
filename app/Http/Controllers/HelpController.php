<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HelpController extends Controller
{
    public function showHelp()
    {
        $help_content = Setting::all()->first();
        $help_content = $help_content['help_content'];

        return view('help',['help_content' => $help_content]);
    }

    public function saveHelp(Request $request)
    {
        $user = $this->getUser();
        if(!isset($user['admin'])||!$user['admin']||is_null($user))
            return redirect('/');

        $new = Setting::all()->first();
        $new->help_content = $request->input('new_help_content');
        $new->save();
        return $request->input('new_help_content');
    }
}
