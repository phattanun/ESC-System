<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Setting;
use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ContactController extends Controller
{
    public function contactPage() {
        $user = $this->getUser();
        $admin = true;
        if(is_null($user)||!isset($user['admin'])||!$user['admin'])
            $admin = false;

        $year = Setting::all()->first();
        $year = $year['year'];

        $all_contact = Contact::join('users','contacts.student_id','=','users.student_id')
            ->select('contacts.student_id','contacts.position','users.name','users.surname','users.nickname','users.phone_number',
                'users.email','users.facebook_link','users.line_id')
            ->get();
        return view('contact',compact('admin','year','all_contact'));
    }

    public function addNewContact(Request $request) {
        if($request->input('data')){
            $user = explode(' ',$request->input('data'));
            if(sizeof($user)<3) return 'fail';
            if(sizeof($user)==3){
                if(User::where(['student_id'=>$user[0],'name'=>$user[1],'surname'=>$user[2]])->exists()){
                    return User::select(['student_id','name','surname','nickname','phone_number','email','line_id','facebook_link'])->find($user[0]);
                }
                else {
                    return 'fail';
                }
            }
            else if (sizeof($user)>3){
                if(User::where(function ($query) use ($user) {
                    $query->where(['student_id'=>$user[0],'name'=>$user[1]]);
                    for($i = 2;$i<sizeof($user);$i++)
                        $query->where('surname', 'LIKE', '%'.$user[$i].'%');
                })->exists()){
                    return User::select(['student_id','name','surname','nickname','phone_number','email','line_id','facebook_link'])->find($user[0]);
                }
                else {
                    return 'fail';
                }
            }
        }
        else return 'fail';
    }

    public function updateContact() {
        $user = $this->getUser();
        if(!isset($user['admin'])||!$user['admin']||is_null($user))
            return redirect('/');
        $contact = Input::get('contact');
        $sid = array_unique(Input::get('sid'));
        Contact::truncate();
        if(isset($sid)) {
            foreach($sid as $id) {
                if(isset($contact[$id])){
                    foreach($contact[$id] as $position)
                    Contact::create(['student_id'=>$id,'position'=>$position]);
                }
            }
        }
    }

    public function dropContact() {
        Contact::truncate();
    }
}
