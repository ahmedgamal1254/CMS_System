<?php

namespace App\Http\Controllers;

use App\models\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Roles extends Controller
{
    public function show(){
        $profile=User::where('email',request()->session()->get('admin'))->get();
        $roles=DB::select('SELECT users.*,roles.name as role_name from users INNER JOIN roles ON users.role_id = roles.id');
        $users=User::where('role_id',null)->get();
        $count=DB::table('contact_us')->where('see',0)->count();
        $msg=DB::table('contact_us')->select('username','id')->orderBy('id','DESC')->limit(5)->get();
        return view('dashboard.roles.show',
            [
                'profile' => $profile,
                'rules' => $roles,
                'users' => $users,
                'count' => $count,
                'message' => $msg
            ]
        );
    }

    public function edit($id){
        $profile=User::where('email',request()->session()->get('admin'))->get();
        $roles=Role::all();
        $user=USer::find($id);
        $count=DB::table('contact_us')->where('see',0)->count();
        $msg=DB::table('contact_us')->select('username','id')->orderBy('id','DESC')->limit(5)->get();
        return view('dashboard.roles.edit',['roles' => $roles,'profile' => $profile,'user' => $user,'count' => $count,'message' => $msg]);
    }

    public function update(){
        $page=User::find(Request('id'));
        $page->role_id=Request('role');
        $page->save();

        session()->flash('message', 'Roles successfully updated.');

        return redirect()->route('show_role');
    }
}
