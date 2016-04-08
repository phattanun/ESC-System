<?php

namespace App\Http\Controllers;

use App\Activity;
use Carbon\Carbon;
use App\BorrowItem;
use App\BorrowList;
use App\Division;
use App\Inventory;
use App\Supplier;
use App\Permission;
use Faker\Provider\cs_CZ\DateTime;
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

    public function inventoryPageDefault(){
        return $this->inventoryPage(1);
    }

    public function inventoryPage($page){
        $user = $this->getUser();
        $items = Inventory::all();
        $itemAmount = count($items);
////        return $items;
//        $inventory = [];
//        foreach($items as $item){
//            $inventory[$item['inv_id']] = [];
//            $inventory[$item['inv_id']]['inv_id'] = $item['inv_id'];
//            $inventory[$item['inv_id']]['name'] = $item['name'];
//            $inventory[$item['inv_id']]['image'] = $item['image'];
//            $inventory[$item['inv_id']]['unit'] = $item['unit'];
//            $inventory[$item['inv_id']]['prive_per_unit'] = $item['prive_per_unit'];
//            $inventory[$item['inv_id']]['total_qty'] = $item['total_qty'];
//            $inventory[$item['inv_id']]['broken_qty'] = $item['broken_qty'];
//            $inventory[$item['inv_id']]['editor_id'] = $item['editor_id'];
//            $inventory[$item['inv_id']]['edit_at'] = $item['edit_at'];
//        }


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

        $tmp = Activity::all();
        $activity = [];
        $i = 0;
        foreach($tmp as $t){
            $activity[$i]['act_id'] = $t['act_id'];
            $activity[$i]['name'] = $t['name'];
            $i++;
        }

        $tmp = Division::all();
        $division = [];
        $i = 0;
        foreach($tmp as $t){
            $division[$i]['div_id'] = $t['div_id'];
            $division[$i]['name'] = $t['name'];
            $i++;
        }

//        return compact('page','itemAmount','activity','division');
        return view('supplies', compact('page','itemAmount','activity','division'));
    }

    public function changeToPage(Request $request){
        $page = $request->page;
        $KEYWORD = $request->word;


        if($KEYWORD != '') {
//            $LIMIT 		= isset($_REQUEST['limit']) 	? (int) 	$_REQUEST['limit'] 		: 30;
//            $KEYWORD 	= isset($_REQUEST['search']) 	? (string) 	$_REQUEST['search'] 	: null;
            $KEYWORD_splitted = explode(' ',$KEYWORD);

            $items=Inventory::
                where(function ($query) use ($KEYWORD_splitted) {
                    foreach($KEYWORD_splitted as $KEY)
                        $query->where('name', 'LIKE', '%'.$KEY.'%');
//                    $query->orWhere('name', 'LIKE', '%'.$KEYWORD.'%');
//                    $query->orWhere('surname', 'LIKE', '%'.$KEYWORD.'%');
                })
//                ->take($LIMIT)
                ->orderBy('inv_id', 'asc')
                ->get();

//            $array=[];
//            if(isset($user)&&$user != null){
//                foreach($user as $users){
//                    array_push($array,$users->student_id." ".$users->name." ".$users->surname);
//                }
//            }
//            $json = json_encode($array);
//            die($json);

        }
        else
        {
            $items = Inventory::all();
        }

        $count = count($items);

//        $news = News::orderBy('updated_at', 'desc')->skip(($page - 1) * 10)->take(10)->get();

//        $items = Inventory::all();
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

        return compact('inventory','count');
    }

    public function sendCart()
    {
        $user = $this->getUser();
        $items = Input::get('cart');
        $startDate = Input::get('startDate');
        $endDate = Input::get('endDate');
        $activity = Input::get('activity');
        $otherActivity = Input::get('otherActivity');
        $otherActivityFlag = Input::get('otherActivityFlag');
        $division = Input::get('division');
        $otherDivision = Input::get('otherDivision');
        $otherDivisionFlag = Input::get('otherDivisionFlag');
        $detail = Input::get('detail');

//        return $otherActivityFlag;
        if( ($otherActivityFlag=="false"&&$activity=='0') || ($otherActivityFlag=="true"&&$otherActivity=="") ){
            return 'noproject';
        }
        if( ($otherDivisionFlag=="false"&&$division=="0") || ($otherDivisionFlag=="true"&&$otherDivision=="") ){
            return 'nodivision';
        }

        $startDate = date('Y-m-d',strtotime($startDate));
        $endDate = date('Y-m-d',strtotime($endDate));
        if($startDate > $endDate){
            return "startAfterEnd";
        }

        foreach($items as $item){
            if($item['amount']<=0)
                return 'amountInvalid';
        }

        if($otherActivityFlag=="true")
            $activity = null;
        else
            $otherActivity = null;

        if($otherDivisionFlag=="true")
            $division = null;
        else
            $otherDivision = null;

        $nowDate = Carbon::now();
        BorrowList::create([
            'status'=> 0,
            'creator_id'=> $user['student_id'],
            'div_id'=> $division,
            'other_div'=> $otherDivision,
            'act_id'=> $activity,
            'other_act'=> $otherActivity,
            'reason' => $detail,
            'create_at'=> $nowDate,
            'borrow_date' => $startDate,
            'return_date' => $endDate
        ]);


        $list = BorrowList::where('create_at',$nowDate)->first();
        $listId = $list['list_id'];

        foreach($items as $item){
            BorrowItem::create([
                'list_id' => $listId,
                'inv_id' => $item['id'],
                'borrow_request_amount' => $item['amount'],
                'borrow_actual_amount' => null,
                'status' => 0,
                'approver_id' => null,
                'reason_if_not_approve' => null
                ]);
        }

//send data back

        foreach($items as $item){
            $tmp = Inventory::where('inv_id',$item['id'])->first();
            $items[$item['id']]['name'] = $tmp['name'];
            $items[$item['id']]['unit'] = $tmp['unit'];
        }

        if($otherActivityFlag=="true")
            $activity = $otherActivity;
        else {
            $tmp = Activity::where('act_id', $activity)->first();
            $activity = $tmp['name'];
        }

        if($otherDivisionFlag=="true")
            $division = $otherDivision;
        else{
            $tmp = Division::where('div_id', $division)->first();
            $division = $tmp['name'];
        }

        $startDate = date('d-m-Y',strtotime($startDate));
        $endDate = date('d-m-Y',strtotime($endDate));


//        return 'error';
        return compact('user','items','startDate','endDate','activity','otherActivity','otherActivityFlag','division','otherDivision','otherDivisionFlag','detail');
    }

    public function approve(){
        $user = $this->getUser();
        $inventory = Inventory::all();
        if(!isset($user['supplies'])) return redirect('/');
//
        return view('supplies-approve', compact('inventory'));
    }

    public function getApproveModal(Request $request){
        $user = $this->getUser();
        if(!isset($user['supplies'])) return response("noinfo", "500");
        $borrow_list_id = $request->input('id');
        $borrow_list_detail = BorrowList::where('list_id',$borrow_list_id)->first();
        $borrow_item_list = $borrow_list_detail->itemList()->withPivot('borrow_request_amount')->get();

        $creator = $borrow_list_detail->creator()->first();
        $div_info = $borrow_list_detail->division()->first();

        $send_data = [];
        $send_data['owner']['student_id'] = $creator['student_id'];
        $send_data['owner']['name'] = $creator['name'];
        $send_data['owner']['surname'] = $creator['surname'];
        $send_data['owner']['nickname'] = $creator['nickname'];
        $send_data['owner']['generation'] = $creator->generation()->first()['name'];
        $send_data['owner']['department'] = $creator->department()->first()['name'];
        $send_data['owner']['phone_number'] = $creator['phone_number'];
        $send_data['owner']['email'] = $creator['email'];
        $send_data['owner']['facebook_link'] = $creator['facebook_link'];
        $send_data['owner']['activity'] = $borrow_list_detail->activity()->first()['name'];
        if($div_info['type']=='Generation')
            $send_data['owner']['division'] = 'รุ่น'." ".$div_info['name'];
        if($div_info['type']=='Group')
            $send_data['owner']['division'] = 'กรุ๊ป'." ".$div_info['name'];
        if($div_info['type']=='Club')
            $send_data['owner']['division'] = 'ชมรม'." ".$div_info['name'];
        if($div_info['type']=='Department')
            $send_data['owner']['division'] = 'ภาควิชา'." ".$div_info['name'];

        $send_data['reserve'] = [];
        $count = 1;
        foreach($borrow_item_list as $b){
            $tmp = [];
            $tmp['name'] = $b['name'];
            $tmp['borrow_request'] = $b->pivot->borrow_request_amount;
            $send_data['reserve'][$count] = $tmp;
            $count++;
        }


        return $send_data;
    }

    public function getBorrowList(){
        $user = $this->getUser();
        if(!isset($user['supplies'])) return response("noinfo", "500");
        return $this->getBorrowListAtPage(1);
        /*$borrow_list = BorrowList::all();

        // Prepare Activity
        $activity = Activity::all();
        $activities = [];
        foreach($activity as $a){
            $activities[$a['act_id']] = $a['name'];
        }

        // Prepare Division
        $div = Division::all();
        $division = [];
        foreach($div as $d){
            if($d['type']=='Generation')
                $division[$d['div_id']] = 'รุ่น'." ".$d['name'];
            if($d['type']=='Group')
                $division[$d['div_id']] = 'กรุ๊ป'." ".$d['name'];
            if($d['type']=='Club')
                $division[$d['div_id']] = 'ชมรม'." ".$d['name'];
            if($d['type']=='Department')
                $division[$d['div_id']] = 'ภาควิชา'." ".$d['name'];
        }

        // Prepare User
        $stud = User::all();
        $student = [];
        foreach($stud as $s){
            $student[$s['student_id']] = $s['name']." ".$s['surname'];
        }



        $send_data = [];
        foreach($borrow_list as $b){
            $send_data[$b['list_id']]['activity_name'] = $activities[$b['act_id']];
            $send_data[$b['list_id']]['division_name'] = $division[$b['div_id']];
            $send_data[$b['list_id']]['creator_name'] = $student[$b['creator_id']];
            $send_data[$b['list_id']]['create_at'] = $b['create_at'];
            switch($b['status']){
                case 0 : $send_data[$b['list_id']]['status'] = "รออนุมัติ"; break;
                case 1 : $send_data[$b['list_id']]['status'] = "อนุมัติ"; break;
                case 2 : $send_data[$b['list_id']]['status'] = "กำลังดำเนินการ"; break;
                case 3 : $send_data[$b['list_id']]['status'] = "เกินกำหนดคืน"; break;
                case 4 : $send_data[$b['list_id']]['status'] = "ปิดรายการ"; break;
            }

        }
        return $send_data;*/
    }

    public function getBorrowListAtPage($page){
        $user = $this->getUser();
        if(!isset($user['supplies'])) return response("noinfo", "500");
        $borrow_list = BorrowList::orderBy('create_at','desc')->skip(($page-1)*10)->take(10)->get();

        // Prepare Activity
        $activity = Activity::all();
        $activities = [];
        foreach($activity as $a){
            $activities[$a['act_id']] = $a['name'];
        }

        // Prepare Division
        $div = Division::all();
        $division = [];
        foreach($div as $d){
            if($d['type']=='Generation')
                $division[$d['div_id']] = 'รุ่น'." ".$d['name'];
            if($d['type']=='Group')
                $division[$d['div_id']] = 'กรุ๊ป'." ".$d['name'];
            if($d['type']=='Club')
                $division[$d['div_id']] = 'ชมรม'." ".$d['name'];
            if($d['type']=='Department')
                $division[$d['div_id']] = 'ภาควิชา'." ".$d['name'];
        }

        // Prepare User
        $stud = User::all();
        $student = [];
        foreach($stud as $s){
            $student[$s['student_id']] = $s['name']." ".$s['surname'];
        }



        $send_data = [];
        foreach($borrow_list as $b){
            $send_data[$b['list_id']]['activity_name'] = $activities[$b['act_id']];
            $send_data[$b['list_id']]['division_name'] = $division[$b['div_id']];
            $send_data[$b['list_id']]['creator_name'] = $student[$b['creator_id']];
            $send_data[$b['list_id']]['create_at'] = $b['create_at'];
            switch($b['status']){
                case 0 : $send_data[$b['list_id']]['status'] = "รออนุมัติ"; break;
                case 1 : $send_data[$b['list_id']]['status'] = "อนุมัติ"; break;
                case 2 : $send_data[$b['list_id']]['status'] = "กำลังดำเนินการ"; break;
                case 3 : $send_data[$b['list_id']]['status'] = "เกินกำหนดคืน"; break;
                case 4 : $send_data[$b['list_id']]['status'] = "ปิดรายการ"; break;
            }

        }
        return $send_data;
    }

    public function supplierPage(){
        $user = $this->getUser();
        if(!isset($user['supplies']))
            return redirect('/');

        $all_supplier = Supplier::All();
        $new_id = '';
        return view('supplier',compact('all_supplier','new_id'));
    }

    public function deleteSupplier(Request $request) {
        $id = $request['id'];
        Supplier::where('supplier_id',$id)->delete();
    }

    public function editSupplier(Request $request) {
        $id = $request['id'];
        $name = $request['name'];
        $addr = $request['addr'];
        $phone = $request['phone'];
        Supplier::where('supplier_id',$id)->update(['name'=>$name,'address'=>$addr,'phone_no'=>$phone]);
    }

    public function addSupplier(Request $request) {
        $name = $request['name'];
        $addr = $request['addr'];
        $phone = $request['phone'];
        Supplier::insert(['name'=>$name,'address'=>$addr,'phone_no'=>$phone]);
        $new_id = Supplier::where(['name'=>$name,'address'=>$addr,'phone_no'=>$phone])->select('supplier_id')->get('supplier_id');
        return $new_id;
    }


}
