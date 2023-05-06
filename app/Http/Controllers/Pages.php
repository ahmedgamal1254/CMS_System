<?php

namespace App\Http\Controllers;

use App\models\Page;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Pages extends Controller
{
    public function show(){
        $profile=User::where('email',request()->session()->get('admin'))->get();
        $pages=Page::where('soft_delete',1)->orderBy('id','desc')->paginate(10);
        $count=DB::table('contact_us')->where('see',0)->count();
        $msg=DB::table('contact_us')->select('username','id')->orderBy('id','DESC')->limit(5)->get();
        return view('dashboard.pages.pages',
            [
                'profile' => $profile,
                'pages' => $pages,
                'count' => $count,
                'message'   => $msg
            ]
        );
    }

    public function delete($id){
        $page=Page::find($id);
        $page->soft_delete='0';
        $page->save();

        return redirect()->route('page');
    }

    public function edit($id){
        $profile=User::where('email',request()->session()->get('admin'))->get();
        $count=DB::table('contact_us')->where('see',0)->count();
        $edit=Page::find($id);
        $msg=DB::table('contact_us')->select('username','id')->orderBy('id','DESC')->limit(5)->get();
        return view('dashboard.pages.edit',[
                'profile' => $profile,
                'data' => $edit,
                'count' => $count,
                'message' => $msg
            ]
        );
    }

    public function update(Request $request){
        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'content' => 'required',
        ]);

        $name=Request('name');
        $title=Request('title');
        $content=Request('content');

        $page=Page::find(Request('id'));
        $page->name=$name;
        $page->title=$title;
        $page->content=$content;
        $page->save();

        session()->flash('message', 'Post successfully updated.');

        return redirect()->route('page');
    }

    public function add(){
        $profile=User::where('email',request()->session()->get('admin'))->get();
        $count=DB::table('contact_us')->where('see',0)->count();
        $msg=DB::table('contact_us')->select('username','id')->orderBy('id','DESC')->limit(5)->get();
        return view('dashboard.pages.add',['profile' => $profile,'count' => $count,'message' => $msg ]);
    }

    public function save(Request $request){
        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'content' => 'required',
        ]);

        $name=Request('name');
        $title=Request('title');
        $content=Request('content');

        $profile=User::where('email',request()->session()->get('admin'))->first();

        $page=new Page;
        $page->name=$name;
        $page->title=$title;
        $page->content=$content;
        $page->user_id=$profile->id;
        $page->save();

        session()->flash('message', 'Post successfully add.');

        return redirect()->route('page');
    }
}
