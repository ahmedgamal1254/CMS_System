<?php

use App\models\Page;
use App\models\Posts;
use App\models\Role;
use App\models\Theme;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
######################## dasboard route #################################
Route::middleware(['admin'])->group(function () {
    Route::get('dashboard/themes','Themes@show')->name('show_themes');
    Route::get('dashboard/theme/active/{id}','Themes@active')->name('active_themes');
    Route::get('dashboard/theme/{id}','Themes@theme')->name('theme');

    Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
    Route::get('/dashboard/profile', 'HomeController@profileAdmin')->name('profile');
    Route::get('/dashboard/recycle', 'RecycleBin@show_recycle')->name('show_recycle');

    Route::get('/dashboard/recycle/post/resore/{id}', 'RecycleBin@restore_post')->name('restore_post');
    Route::get('/dashboard/recycle/post/delete/{id}', 'RecycleBin@delete_post')->name('delete_post');
    Route::get('/dashboard/recycle/post/search','Posts@search_post_delete')->name('search_delete');

    Route::get('/dashboard/recycle/comment/restore/{id}', 'RecycleBin@restore_comment')->name('restore_comment');
    Route::get('/dashboard/recycle/comment/delete/{id}', 'RecycleBin@delete_comment')->name('delete_comment');

    Route::get('/dashboard/contact_us/', 'Contacts@show_contact_us')->name('show_contact_us');
    Route::get('/dashboard/contact_us/msg/{id}', 'Contacts@msg')->name('show_msg');
    Route::get('/dashboard/contact_us/delete/{id}', 'Contacts@del_msg')->name('del_msg');


    Route::get('/dashboard/comments/', 'Comments@show_comments')->name('show_comments');
    Route::get('/dashboard/comments/block/{id}', 'Comments@block_comment')->name('block_comment');
    Route::get('/dashboard/comments/delete/{id}', 'Comments@delete_comment')->name('delete_comment');


    Route::get('/dashboard/page','Pages@show')->name('page');
    Route::get('/dashboard/page/delete/{id}','Pages@delete')->name('del_page');
    Route::get('/dashboard/page/edit/{id}','Pages@edit')->name('edit_page');
    Route::post('/dashboard/page/update','Pages@update')->name('update_page');
    Route::get('/dashboard/page/add/','Pages@add')->name('add_page');
    Route::post('/dashboard/page/save','Pages@save')->name('save_page');

    Route::get('/dashboard/catogeries','Catogeries@show')->name('show_categories');
    Route::get('/dashboard/catogery/delete/{id}','Catogeries@delete')->name('del_cat');
    Route::get('/dashboard/catogery/edit/{id}','Catogeries@edit')->name('edit_cat');
    Route::post('/dashboard/catogery/update','Catogeries@update')->name('update_cat');
    Route::get('/dashboard/catogery/add/','Catogeries@add')->name('add_cat');
    Route::post('/dashboard/catogery/save','Catogeries@save')->name('save_cat');

    Route::get('/dashboard/users','Users@show')->name('show_user');
    Route::get('/dashboard/user/delete/{id}','Users@delete')->name('del_user');
    Route::get('/dashboard/user/active/{id}','Users@active')->name('active');
    Route::get('/dashboard/user/admin/{id}','Users@admin')->name('admin');
    Route::get('/dashboard/user/add/','Users@add')->name('add_user');
    Route::post('/dashboard/user/save','Users@save')->name('save_user');
    Route::get('/dashboard/user/edit/{id}','Users@edit')->name('edit_user');
    Route::post('/dashboard/user/update','Users@update')->name('update_user');

    Route::get('/dashboard/roles','Roles@show')->name('show_role');
    Route::get('/dashboard/role/edit/{id}','Roles@edit')->name('edit_role');
    Route::post('/dashboard/role/update','Roles@update')->name('save_role');

    Route::get('/dashboard/posts','Posts@show')->name('posts_show');
    Route::get('/dashboard/post/delete/{id}','Posts@delete')->name('del_post');
    Route::get('/dashboard/post/edit/{id}','Posts@edit')->name('edit_post');
    Route::post('/dashboard/post/update','Posts@update')->name('update_post');
    Route::get('/dashboard/post/add/','Posts@add')->name('add_post');
    Route::post('/dashboard/post/save/','Posts@save')->name('save_post');
    Route::get('/dashboard/post/search','Posts@search')->name('search');
    Route::get('/dashboard/post/catogeries/{id}','Posts@cat_post')->name('cat_post');
    Route::get('/dashboard/post/filter','Posts@filter_post')->name('filter_post');

    Route::get('/dashboard/contact_us/see/','Contacts@see_msg')->name('see_msg');
    
    Route::get('/dashboard/notification/read','HomeController@read_notification')->name('notification');
});

Route::get('dashboard.login',function (){
    return view('dashboard.login');
})->middleware('login')->name('dashboard_login');

Route::post('login_admin','HomeController@login_admin')->name('login_admin');
Route::get('signout_admin','HomeController@signout_admin')->name('signout');
######################## dasboard route #################################


######################## site route #################################
Route::get('expact','Site\PostsController@posts');
Route::get('/','Site\PostsController@index')->name('home');
Route::get('/post/{id}','Site\PostsController@show_post')->name('post_single');
Route::get('/post/author/{name}','Site\PostsController@show_author')->name('author');
Route::get('/page/{id}','Site\PostsController@show_page')->name('page_single');
Route::get('/post/catogery/{name}','Site\PostsController@show_cat')->name('cat');
Route::post('/post/comment/add','Site\PostsController@add_comment')->name('add_comment');
Route::get('/posts/search/','Site\PostsController@search')->name('search_post');
Route::get('/contact','Site\PostsController@contact')->name('contact_us');
Route::post('/contact/send','Site\PostsController@send_contact')->name('send_contact');
######################## site route #################################


Route::get('test1', function () {
    $users = User::where('email',request()->session()->get('admin'))->first();
    $notify = DB::table('notifications')->where('notifiable_id',$users->id)->get();
    return $notify;
});

Route::get('test2', function () {
    $post=Posts::where('soft_delete',1)->count();
    $allpost=Posts::count();
    $delete_post=Posts::where('soft_delete',0)->count();

    return $post . "   "  .  $allpost . "  " . $delete_post;
});