<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Comments;
use App\Http\Controllers\Controller;
use App\Mail\Contact as MailContact;
use App\models\Catogesies;
use App\models\Comment;
use App\models\Contact;
use App\models\Page;
use App\models\Posts;
use App\models\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class PostsController extends Controller
{
    public function posts(){
        $data=Theme::where('active',1)->first();
        $name=$data->name;
        return view($name.'.theme1');
    }

    public function index(){
        $cat=Catogesies::all();
        $data=Theme::where('active',1)->first();
        $name=$data->name;

        $latest_post=Posts::orderBy('id','desc')->limit(5)->get();
        $post=Posts::orderBy('id','desc')->paginate(6);
        return view($name.'.index',['post' => $post,'cat' => $cat,
            'latest' => $latest_post,'name' => $name]);
    }

    public function show_author($name){
        $cat=Catogesies::all();
        $data=Theme::where('active',1)->first();
        $nameTheme=$data->name;
        $latest_post=Posts::orderBy('id','desc')->limit(5)->get();
        $post=DB::table('users')->join('posts','users_id','=','users.id')
        ->select('users.id as user','users.name','posts.*')->where('users.name',$name)->paginate(15);

        return view($nameTheme.'.author',['post' => $post,'name' => $name,'cat' => $cat,
            'latest' => $latest_post]);
    }

    public function show_cat($name){
        $cat=Catogesies::all();
        $data=Theme::where('active',1)->first();
        $nameTheme=$data->name;

        $latest_post=Posts::orderBy('id','desc')->limit(5)->get();

        $post=DB::table('users')->join('posts','users_id','=','users.id')
        ->join('catogeries','catogeries.id','=','cat_id')
        ->select('users.id as user','users.name','posts.*')
        ->where('catogeries.name',$name)->paginate(15);
        
        return view($nameTheme.'.cat',['post' => $post,'name' => $name,'cat' => $cat,
            'latest' => $latest_post]);
    }

    public function show_post($id){
        $cat=Catogesies::all();
        $data=Theme::where('active',1)->first();
        $name=$data->name;

        $post=DB::table('users')->join('posts','users_id','=','users.id')
        ->select('users.id as user','users.name','posts.*')->where('posts.id',$id)->first();

        $comments=DB::table('users')->join('comments','user_id','=','users.id')
        ->select('users.name as username','comments.*')->orderBy('comments.id','desc')->limit(15)->get();
        $comments2=Comment::where('user_id',null)->orderBy('id','DESC')->limit(15)->get();

        $count_comments=Comment::count();

        $latest_post=Posts::orderBy('id','desc')->limit(5)->get();

        return view($name.'.post_single',['post' => $post,'comments' => $comments,
        'comments2' => $comments2,'count_comments' => $count_comments,'cat' => $cat,
        'latest' => $latest_post]);
    }

    public function show_page($id){
        $cat=Catogesies::all();
        $data=Theme::where('active',1)->first();
        $name=$data->name;

        $latest_post=Posts::orderBy('id','desc')->limit(5)->get();
        $page=Page::find($id);

        return view($name.'.page',['cat' => $cat,
        'latest' => $latest_post,'page_single' => $page]);
    }

    public function search(){
        $data=Theme::where('active',1)->first();
        $name=$data->name;

        $search=Request('search');

        $cat=Catogesies::all();
        
        $latest_post=Posts::orderBy('id','desc')->limit(5)->get();

        $posts=Posts::query()->where('title','LIKE',"%{$search}%")->where('soft_delete',1)
        ->orWhere('tags','LIKE',"%{$search}%")->orWhere('content','LIKE',"%{$search}%")->paginate(15);
        return view($name.'.search',[
            'cat' => $cat,'latest' => $latest_post,'posts' => $posts
        ]);
    }

    public function add_comment(Request $request){
        $user_name=null;$name=null;$email=null;
        $post=Request('post_id');  
        $content=Request('content');
        if($request->has('name')){
            $name=Request('name');
            $email=Request('email');  
        }else{
            $user_name=Request('user');
        }

        $comment=new Comment;
        $comment->name=$name;
        $comment->email=$email;
        $comment->content=$content;
        $comment->post_id=$post;
        $comment->user_id=$user_name;
        $comment->save();
        return redirect()->back();
    }

    public function contact(){
        $data=Theme::where('active',1)->first();
        $name=$data->name;
        $cat=Catogesies::all();
        $latest_post=Posts::orderBy('id','desc')->limit(5)->get();
        return view($name.'.contact_us',[
            'cat' => $cat,'latest' => $latest_post
        ]);
    }

    public function send_contact(Request $request){
        $request->validate([
            'username' => 'required|min:6',
            'email'    => 'required|unique:contact_us',
            'phone'    => 'required',
            'content'  => 'required'
        ]);

        $data=[
            'name' => Request('username'),
            'email' => Request('email'),
            'phone' => Request('phone'),
            'content' => Request('content'),
        ];

        $contact=new Contact;
        $contact->username=Request('username');
        $contact->email=Request('email');
        $contact->phone=Request('phone');
        $contact->content=Request('content');
        $contact->save();

        session()->flash('message', 'success.');

        Mail::to('ag1088768@gmail.com')->send(new MailContact($data));
        return redirect()->route('contact_us');
    }
}
