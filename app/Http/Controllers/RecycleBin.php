<?php

namespace App\Http\Controllers;

use App\models\Comment;
use Illuminate\Http\Request;
use App\User;
use App\models\Posts;
use Illuminate\Support\Facades\DB;

class RecycleBin extends Controller
{
    public function show_recycle(){
        $count_post=Posts::where('soft_delete',0)->count();
        $profile=User::where('email',request()->session()->get('admin'))->get();
        $count_comment=Comment::where('soft_delete',0)->count();
        $posts=Posts::where('soft_delete',0)->paginate(15);
        $comments=Comment::where('soft_delete',0)->paginate(15);
        $count=DB::table('contact_us')->where('see',0)->count();
        $msg=DB::table('contact_us')->select('username','id')->orderBy('id','DESC')->limit(5)->get();

        return view('dashboard.Recycle.show',
            [
                'profile' => $profile,
                'count_posts' => $count_post,
                'count_comments' => $count_comment,
                'posts' => $posts,
                'comments' => $comments,
                'count' => $count,
                'message' => $msg
            ]
        );
    }

    public function restore_post($id){
        $posts=PostS::find($id);
        $posts->soft_delete='1';
        $posts->save();

        return redirect()->route('show_recycle');
    }

    public function delete_post($id){
        $post=PostS::find($id);
        $post->delete();

        return redirect()->route('show_recycle');
    }

    public function restore_comment($id){
        $posts=Comment::find($id);
        $posts->soft_delete='1';
        $posts->save();

        return redirect()->route('show_recycle');
    }

    public function delete_comment($id){
        $post=Comment::find($id);
        $post->delete();

        return redirect()->route('show_recycle');
    }
}
