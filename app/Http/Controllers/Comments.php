<?php

namespace App\Http\Controllers;

use App\models\Comment;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Comments extends Controller
{
    public function show_comments(){
        $profile=User::where('email',request()->session()->get('admin'))->get();
        $comments=DB::table('users')->join('comments','user_id','=','users.id')->join('posts','posts.id','=','comments.post_id')
        ->select('users.name as name_user','comments.*','posts.title')->where('comments.active','1')->where('comments.soft_delete',1)
        ->orderBy('comments.id','DESC')->paginate(10);

        $count=DB::table('contact_us')->where('see',0)->count();
        $msg=DB::table('contact_us')->select('username','id')->orderBy('id','DESC')->limit(5)->get();
        return view('dashboard.comment.show',
            [
                'profile' => $profile,
                'comments' => $comments,
                'count'    => $count,
                'message'      => $msg
            ]
        );
    }

    public function block_comment($id){
        $msg=Comment::find($id);
        $msg->active='0';
        $msg->save();

        return redirect()->route('show_comments');
    }

    public function delete_comment($id){
        $msg=Comment::find($id);
        $msg->soft_delete='0';
        $msg->save();

        return redirect()->route('show_comments');
    }
}
