<?php

namespace App\Http\Controllers;

use App\models\Catogesies;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Catogeries extends Controller
{
    public function show(){
        $profile=User::where('email',request()->session()->get('admin'))->get();
        $cat=Catogesies::where('soft_delete',1)->orderBy('id','desc')->paginate(10);
        $count=DB::table('contact_us')->where('see',0)->count();
        $msg=DB::table('contact_us')->select('username','id')->orderBy('id','DESC')->limit(5)->get();
        return view('dashboard.catogery.show',
            [
                'profile' => $profile,
                'cat' => $cat,
                'count' => $count,
                'message'  => $msg
            ]
        );
    }

    public function edit($id){
        $profile=User::where('email',request()->session()->get('admin'))->get();
        $edit=Catogesies::find($id);
        $count=DB::table('contact_us')->where('see',0)->count();
        $msg=DB::table('contact_us')->select('username','id')->orderBy('id','DESC')->limit(5)->get();
        return view('dashboard.catogery.edit',[
                'profile' => $profile,
                'data' => $edit,
                'count' => $count,
                'message'   => $msg
            ]
        );
    }

    public function update(Request $request){
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $name=Request('name');
        $content=Request('description');

        $page=Catogesies::find(Request('id'));
        $page->name=$name;
        $page->description=$content;
        $page->save();

        session()->flash('message', 'catogeries successfully updated.');

        return redirect()->route('show_categories');
    }

    public function delete($id){
        $page=Catogesies::find($id);
        $page->soft_delete='0';
        $page->save();

        return redirect()->route('show_categories');
    }

    public function add(){
        $profile=User::where('email',request()->session()->get('admin'))->get();
        $count=DB::table('contact_us')->where('see',0)->count();
        $msg=DB::table('contact_us')->select('username','id')->orderBy('id','DESC')->limit(5)->get();
        return view('dashboard.catogery.add',['profile' => $profile,'count' => $count,'message' => $msg]);
    }

    public function save(Request $request){
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $name=Request('name');
        $description=Request('description');

        $profile=User::where('email',request()->session()->get('admin'))->first();

        $page=new Catogesies;
        $page->name=$name;
        $page->description=$description;
        $page->user_id=$profile->id;
        $page->save();

        session()->flash('message', 'Catogery successfully add.');

        return redirect()->route('show_categories');
    }
}
