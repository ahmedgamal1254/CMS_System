<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Users extends Controller
{
    public function show(){
        $profile=User::where('email',request()->session()->get('admin'))->get();
        $users=User::orderBy('id','desc')->paginate(10);
        $count=DB::table('contact_us')->where('see',0)->count();
        $msg=DB::table('contact_us')->select('username','id')->orderBy('id','DESC')->limit(5)->get();
        return view('dashboard.users.show',
            [
                'profile' => $profile,
                'users' => $users,
                'count' => $count,
                'message' => $msg
            ]
        );
    }

    public function active($id){
        $page=User::find($id);
        $page->active='1';
        $page->save();

        return redirect()->route('show_user');
    }

    public function admin($id){
        $page=User::find($id);
        $page->admin='1';
        $page->save();

        return redirect()->route('show_user');
    }

    public function delete($id){
        $user=User::find($id);
        $user->delete();

        return redirect()->route('show_user');
    }

    public function add(){
        $profile=User::where('email',request()->session()->get('admin'))->get();
        $count=DB::table('contact_us')->where('see',0)->count();
        $msg=DB::table('contact_us')->select('username','id')->orderBy('id','DESC')->limit(5)->get();
        return view('dashboard.users.add',['profile' => $profile,'count' => $count,'message' => $msg]);
    }

    public function save(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:6'
        ]);

        $name=Request('name');
        $email=Request('email');
        $pass=Request('password');

        $page=new User;
        $page->name=$name;
        $page->email=$email;
        $page->password=Hash::make($pass);
        $page->save();

        session()->flash('message', 'User successfully add.');

        return redirect()->route('show_user');
    }

    public function edit($id){
        $profile=User::where('email',request()->session()->get('admin'))->get();
        $data=User::find($id);
        $count=DB::table('contact_us')->where('see',0)->count();
        $msg=DB::table('contact_us')->select('username','id')->orderBy('id','DESC')->limit(5)->get();
        return view('dashboard.users.edit',['profile' => $profile,'data' => $data,'count' => $count,'message' => $msg]);
    }

    public function update(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $name=Request('name');
        $email=Request('email');
        $pass=null;

        if( empty(Request('password')) ){
            $pass=Request('pass');
        }else{
            $pass=Hash::make(Request('password'));
        }

        $page=User::find(Request('id'));
        $page->name=$name;
        $page->email=$email;
        $page->password=$pass;
        $page->save();

        session()->flash('message', 'User successfully updated.');

        return redirect()->route('show_user');
    }
}
