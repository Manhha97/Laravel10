<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
//route blog giao dien bai viet
//
Route::get('/xoa',function(){
    $user = App\user::withTrashed()->find(10)->restore();
    //$user = App\user::find(10)->delete();//xoa ban ghi so 4
    /*$user = App\user::withTrashed()->find(10);//tim ban ghi da xoa so 4
    $user = App\user::withTranshed()->find(10)->restore();//khoi phuc ban ghi xoa

    $user = App\user::onlyTrashed()->first();//lay ban ghi o trong thug rac
    */
    dd($user);
});
Route::get('/vd1',function(){
    return view('vd');
});
//upload anh
Route::post('upload',function(Request $request){
    // dd($request);
    foreach ($request->images as $image) {
        $url=$image->store('fileanh');
        return $url;
    };

});


//xoa anh
/*Route::post('upload',function(Request $request){ 
       Storage::delete('');

});*/



Route::get('/', 'PostsController@index');	
Route::resource('/posts', 'PostsController');
//Route::resource('/posts/{slug}', 'HomeController@show');
Route::get('/category/{slug}', 'CategoriesController@index')->name('category');

Route::get('/users/list','HomeController@getlist')->name('users.list');
Route::get('/users/{id}','HomeController@show')->name('users.show');
Route::get('/admin/addpost','HomeController@create')->name('users.create');

Route::delete('/users/{id}','HomeController@destroy')->name('users.delete');
Route::post('/admin/store','HomeController@store')->name('user.store');
Route::get('/admin/editpost/{id}','HomeController@edit')->name('users.edit');
Route::put('/admin/update/{id}','HomeController@update')->name('user.update');

Route::get('/admin/createtag','PostsController@create')->name('tag.create');
Route::post('/admin/storetag','PostsController@storetag')->name('tag.storetag');

Route::get('/admin/tags','PostsController@index2')->name('tag.index2');
Route::get('/admin/edittag/{id}','PostsController@edit')->name('tag.edit');
Route::put('/admin/updatetag/{id}','PostsController@update')->name('tag.update');




/*Route::get('/admin/addpost',function(){
	return view('posts.adm_addpost');
});*/

Route::get('/admin',function(){
	return view('layouts.admin');
});

Route::prefix('/admin')->group(function(){
	/*Auth::routes();*/
	Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');

    // Registration Routes...
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Auth\RegisterController@register');

    // Password Reset Routes...
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');
    Route::middleware('auth')->group(function(){
		Route::get('/dashboard','HomeController@index')->name('home');
    });

});
	




