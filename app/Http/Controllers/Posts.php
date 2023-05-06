<?php

namespace App\Http\Controllers;

use App\models\Catogesies;
use Illuminate\Support\Facades\Storage;
use App\models\Posts as ModelsPosts;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Posts extends Controller
{
    public function show(){
        $profile=User::where('email',request()->session()->get('admin'))->get();
        $post=ModelsPosts::where('soft_delete',1)->orderBy('id','desc')->paginate(10);
        $count=DB::table('contact_us')->where('see',0)->count();
        $msg=DB::table('contact_us')->select('username','id')->orderBy('id','DESC')->limit(5)->get();

        return view('dashboard.posts.show',
            [
                'profile' => $profile,
                'post' => $post,
                'count' => $count,
                'message' => $msg
            ]
        );
    }

    public function delete($id){
        $page=ModelsPosts::find($id);
        $page->soft_delete='0';
        $page->save();

        return redirect()->route('posts_show');
    }

    public function edit($id){
        $profile=User::where('email',request()->session()->get('admin'))->get();
        $cat=Catogesies::all();
        $post=ModelsPosts::find($id);
        $count=DB::table('contact_us')->where('see',0)->count();
        $msg=DB::table('contact_us')->select('username','id')->orderBy('id','DESC')->limit(5)->get();

        return view('dashboard.posts.edit',['profile' => $profile,'cat' => $cat,'post' => $post,'count' => $count,'message' => $msg]);
    }

    public function update(Request $request){
        $request->validate([
            'title' => 'required',
            'tags' => 'required',
            'content' => 'required'
        ]);

        $img='';
        if(request()->hasFile('img')){
            $img=request('img')->store('images','public');
        }else{
            $img=request('img_old');
        }

        $cat='';
        if(Request('cat')){
            $cat=Request('cat');
        }else{
            $cat=Request('cat_old');
        }

        $post=ModelsPosts::find(Request('id'));
        $post->title=Request('title');
        $post->tags=Request('tags');
        $post->content=Request('content');
        $post->img=$img;
        $post->cat_id=$cat;
        $post->save();

        session()->flash('message', 'Posts successfully update.');
        return redirect()->route('posts_show');
    }

    public function add(){
        $profile=User::where('email',request()->session()->get('admin'))->get();
        $cat=Catogesies::all();
        $count=DB::table('contact_us')->where('see',0)->count();
        $msg=DB::table('contact_us')->select('username','id')->orderBy('id','DESC')->limit(5)->get();
        return view('dashboard.posts.add',['profile' => $profile,'cat' => $cat,'count' => $count,'message'=> $msg]);
    }

    public function save(Request $request){
        $request->validate([
            'title' => 'required',
            'tags' => 'required',
            'cat'  => 'required',
            'img'  => 'required',
            'content' => 'required'
        ]);

        $profile=User::where('email',request()->session()->get('admin'))->first();
        $img=request('img')->store('images','public');

        $page=new ModelsPosts;
        $page->title=Request('title');
        $page->tags=Request('tags');
        $page->content=Request('content');
        $page->img=$img;
        $page->cat_id=Request('cat');
        $page->users_id=$profile->id;
        $page->save();

        session()->flash('message', 'Posts successfully add.');
        return redirect()->route('posts_show');
    }

    public function search(){
        $profile=User::where('email',request()->session()->get('admin'))->get();
        $search=Request('search');

        $post=ModelsPosts::query()->where('title','LIKE',"%{$search}%")->where('soft_delete',1)
        ->orWhere('tags','LIKE',"%{$search}%")->orWhere('content','LIKE',"%{$search}%")->paginate(15);

        $count=DB::table('contact_us')->where('see',0)->count();
        $msg=DB::table('contact_us')->select('username','id')->orderBy('id','DESC')->limit(5)->get();
        return view('dashboard.posts.search',['post' => $post,'profile' => $profile,'count' => $count,'message' => $msg]);
    }

    public function search_post_delete(){
        $profile=User::where('email',request()->session()->get('admin'))->get();
        $search_del=Request('search');

        $post=ModelsPosts::query()->where('title','LIKE',"%{$search_del}%")
        ->orWhere('tags','LIKE',"%{$search_del}%")->orWhere('content','LIKE',"%{$search_del}%")->where('soft_delete','=',0)->paginate(15);
        $count=DB::table('contact_us')->where('see',0)->count();
        $msg=DB::table('contact_us')->select('username','id')->orderBy('id','DESC')->limit(5)->get();
        return view('dashboard.Recycle.search',['post' => $post,'profile' => $profile,'count' => $count,'message' => $msg]);
    }

    public function cat_post($id){
        $profile=User::where('email',request()->session()->get('admin'))->get();
        $cat=Catogesies::find($id);
        $post_cat=DB::table('posts')->join('catogeries','catogeries.id','=','posts.cat_id')
        ->select('posts.id as post_id','posts.*','catogeries.*')->where('posts.soft_delete',1)->where('catogeries.id',$id)
        ->orderBy('posts.id','DESC')->paginate(10);

        $count=DB::table('contact_us')->where('see',0)->count();
        $msg=DB::table('contact_us')->select('username','id')->orderBy('id','DESC')->limit(5)->get();
        return view('dashboard.posts.cat_post',
            [
                'profile' => $profile,
                'post' => $post_cat,
                'cat'  => $cat,
                'count' => $count,
                'message' => $msg
            ]
        );
    }

    public function filter_post(){
        $profile=User::where('email',request()->session()->get('admin'))->get();
        $data=DB::table('posts')->whereBetween('created_at',[Request('start_date'),Request('end_date')],'and')->where('soft_delete',1)->paginate(10);
        $count=DB::table('contact_us')->where('see',0)->count();
        $msg=DB::table('contact_us')->select('username','id')->orderBy('id','DESC')->limit(5)->get();
        return view('dashboard.posts.filter',
            [
                'profile' => $profile,
                'post' => $data,
                'count' => $count,
                'message' => $msg
            ]
        );
    }
}