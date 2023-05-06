<?php

namespace App\Http\Controllers;

use App\models\Theme;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Themes extends Controller
{
    public function show() {
        $profile=User::where('email',request()->session()->get('admin'))->get();
        $themes=DB::table('users')->join('themes','user_id','=','users.id')
        ->select('users.name as username','themes.*')->get();

        $count=DB::table('contact_us')->where('see',0)->count();
        $msg=DB::table('contact_us')->select('username','id')->orderBy('id','DESC')->limit(5)->get();
        return view('dashboard.theme.theme',[
            'profile' => $profile,
            'themes'  => $themes,
            'count'   => $count,
            'message' => $msg
        ]);
    }

    public function active($id){
        DB::update('update themes set active = 0 where active = ?', [1]);
        $theme=Theme::find($id);
        $theme->active='1';
        $theme->save();

        return redirect()->route('show_themes');
    }

    public function theme($id){
        $profile=User::where('email',request()->session()->get('admin'))->get();
        $themes=DB::table('users')->join('themes','user_id','=','users.id')
        ->select('users.name as username','themes.*')->where('themes.id',$id)->first();

        $count=DB::table('contact_us')->where('see',0)->count();
        $msg=DB::table('contact_us')->select('username','id')->orderBy('id','DESC')->limit(5)->get();
        return view('dashboard.theme.show',[
            'profile' => $profile,
            'themes'  => $themes,
            'count'   => $count,
            'message' => $msg
        ]);
    }
}
