<?php

namespace App\Http\Controllers;

use App\BorrowList;
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
        $items = Inventory::all();
//        return $items;
        $inventory = [];
        foreach($items as $item){
            $inventory[$item['inv_id']] = [];
            $inventory[$item['inv_id']]['inv_id'] = $item['inv_id'];
            $inventory[$item['inv_id']]['name'] = $item['name'];
            $inventory[$item['inv_id']]['image'] = $item['image'];
            $inventory[$item['inv_id']]['unit'] = $item['unit'];
            $inventory[$item['inv_id']]['prive_per_unit'] = $item['prive_per_unit'];
            $inventory[$item['inv_id']]['total_qty'] = $item['total_qty'];
            $inventory[$item['inv_id']]['broken_qty'] = $item['broken_qty'];
            $inventory[$item['inv_id']]['editor_id'] = $item['editor_id'];
            $inventory[$item['inv_id']]['edit_at'] = $item['edit_at'];
        }
//        $detail=[];
//        $detail['name'] = 'name';
//        $detail2 = [];
//        $detail2['name'] = 'name2';
//        $list = [];
//        $list['1000'] = $detail;
//        $list['2000'] = $detail2;
//        $tmp = json_encode($list);
//        return $tmp;
//
//        return $inventory;
        return view('supplies', compact('inventory'));
    }

    public function changeToPage(Request $request){
        $page = $request->page;

        $items = Inventory::all();
        $inventory = [];
        foreach($items as $item){
            $inventory[$item['inv_id']] = [];
            $inventory[$item['inv_id']]['inv_id'] = $item['inv_id'];
            $inventory[$item['inv_id']]['name'] = $item['name'];
            $inventory[$item['inv_id']]['image'] = $item['image'];
            $inventory[$item['inv_id']]['unit'] = $item['unit'];
            $inventory[$item['inv_id']]['prive_per_unit'] = $item['prive_per_unit'];
            $inventory[$item['inv_id']]['total_qty'] = $item['total_qty'];
            $inventory[$item['inv_id']]['broken_qty'] = $item['broken_qty'];
            $inventory[$item['inv_id']]['editor_id'] = $item['editor_id'];
            $inventory[$item['inv_id']]['edit_at'] = $item['edit_at'];
        }

        return $inventory;
    }

    public function sendCart()
    {
        $items = Input::get('cart');
        $startDate = Input::get('startDate');
        $endDate = Input::get('endDate');
        $activity = Input::get('activity');
        $otherActivity = Input::get('otherActivity');
        $division = Input::get('division');
        $otherDivision = Input::get('otherDivision');
        $detail = Input::get('detail');

        return compact('items','startDate','endDate','activity','otherActivity','division','otherDivision','detail');
    }

    public function approve(){
        $user = $this->getUser();
        $inventory = Inventory::all();
        if(!isset($user['supplies'])) return redirect('/');
//
        return view('supplies-approve', compact('inventory'));
    }

    public function getApproveModal(Request $request){
        /*$borrow_list_id = $request->input('id');
        $user = $this->getUser();
        if(!isset($user['supplies'])) return redirect('/');
        $borrow_list_detail = BorrowList::where('list_id',$borrow_list_id)->itemList()->get();*/

    }
}
