<?php

namespace App\Http\Controllers;

use App\User;
use App\models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\AssignOp\Concat;

class Contacts extends Controller
{
    public function show_contact_us(){
        $profile=User::where('email',request()->session()->get('admin'))->get();
        $contact=DB::table('contact_us')->where('soft_delete',1)->orderBy('id','desc')->paginate(10);
        $count=DB::table('contact_us')->where('see',0)->count();
        $msg=DB::table('contact_us')->select('username','id')->orderBy('id','DESC')->limit(5)->get();
        return view('dashboard.msg.show',
            [
                'profile' => $profile,
                'contact' => $contact,
                'count'   => $count,
                'message'     => $msg
            ]
        );
    }

    public function msg($id){
        $profile=User::where('email',request()->session()->get('admin'))->get();
        $count=DB::table('contact_us')->where('see',0)->count();
        $contact=Contact::find($id);
        $msg=DB::table('contact_us')->select('username','id')->orderBy('id','DESC')->limit(5)->get();
        return view('dashboard.msg.msg',
            [
                'profile' => $profile,
                'contact' => $contact,
                'count'   => $count,
                'message'     => $msg
            ]
        );        
    }

    public function del_msg($id){
        $msg=Contact::find($id);
        $msg->soft_delete='0';
        $msg->save();

        return redirect()->route('show_contact_us');
    }

    public function see_msg(){
        DB::update('update contact_us set see = 1');

        $count=DB::table('contact_us')->where('see',0)->count();
        return $count;
    }
}
