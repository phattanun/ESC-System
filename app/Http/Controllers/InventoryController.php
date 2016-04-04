<?php

namespace App\Http\Controllers;

use App\Division;
use App\Inventory;
use App\Permission;
use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class InventoryController extends Controller
{

    public function inventoryPage(){
        $user = $this->getUser();
        $inventory = Inventory::all();

//        return $inventory;
        return view('supplies', compact('inventory'));
    }

    public function approved(){
        $user = $this->getUser();
        $inventory = Inventory::all();
        if(!isset($user['supplies'])) return redirect('/');
//
        return view('supplies-approved', compact('inventory'));
    }
}
