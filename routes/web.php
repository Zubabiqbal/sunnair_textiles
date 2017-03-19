<?php

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

Route::post('send-email', function (\Illuminate\Http\Request $request){
    $email = filter_var($request->get('from'), FILTER_VALIDATE_EMAIL);
    $message = $request->get('message');
    $name = $request->get('name');
    if(!$email && !$message && !is_string($message)){

        $request->session()->flash('status', 'fail');
        $request->session()->flash('message', 'required fields missing');
        return redirect()->back();
    }

    $mail = \Illuminate\Support\Facades\Mail::to(config('custom.contact_us_email'))
        ->cc(config('custom.contact_us_cc_email'))
        ->send(new \App\Mail\ContactUs($email, $message));
        $request->session()->flash('status', 'success');
        $request->session()->flash('message', 'your message have been received, will contact you soon');

    return redirect()->back();
});

/* website */
Route::get('/', 'admin\PagesController@home');
/*Route::get('/', function (){
    return view('sample_layout');
});*/

Route::get('/home', 'HomeController@index');

Route::get('/product/{product}', 'admin\PagesController@product');

Route::get('/category-products/{category}', 'admin\PagesController@products');
Route::get('/blog-list', 'admin\PagesController@blogList');
Route::get('/blog/{slogan_title}', 'admin\PagesController@blog');

Route::get('/page/{page_slug}', 'admin\PagesController@getPageWithSlug');



Route::get('admin/home', 'admin\PagesController@admin');

Route::get('admin/default-page/{page_slug}', 'admin\PagesController@defaultPage');


/* website */

Route::post('/photo', function (\Illuminate\Http\Request $request) {
    $path = $request->file('file')->store('photoes');
});

Route::get('admin/images/{image}', function($image = null)
{
    $path = storage_path('app')."\\photoes\\" . $image;
        return response()->download($path);
});


Route::auth();

Route::get('/register', function (){
    return redirect()->back();
});


Route::post('/register', function (){
    return redirect()->back();
});



Route::get('/admin',function (){
    return redirect()->route('login');
});

/* slider admin*/
Route::get('admin/sliders', 'admin\SlidersController@index');

Route::get('admin/sliders/create', 'admin\SlidersController@create');

Route::get('admin/sliders/{sliderImage}', 'admin\SlidersController@show');

Route::get('admin/sliders/{sliderImage}/edit', 'admin\SlidersController@edit');

Route::post('admin/sliders', 'admin\SlidersController@store');

Route::put('admin/sliders/{sliderImage}', 'admin\SlidersController@update');

Route::put('admin/sliders/{sliderImage}/status', 'admin\SlidersController@setStatus');

Route::delete('admin/sliders/{sliderImage}', 'admin\SlidersController@destroy');

/* slider admin*/

Route::resource('admin/category', 'CategoriesController');

Route::put('admin/category/{category}/status', 'CategoriesController@setStatus');

Route::get('admin/category/{category}/sub-category', 'CategoriesController@createChild');
Route::post('admin/category/{category}/sub-category', 'CategoriesController@saveChild');

Route::resource('admin/category/{category}/product', 'admin\ProductsController');

Route::put('admin/category/{category}/product/{product}/status', 'admin\ProductsController@setStatus');


Route::get('products/{image}', function($image = null) {
    $path = storage_path('app')."\\products\\" . $image;
    return response()->download($path);
});


Route::resource('admin/page', 'admin\PagesController');

Route::get('admin/page/slug/{slug}', 'admin\PagesController@page');

Route::put('admin/page/{page}/status', 'admin\PagesController@setStatus');

Route::put('admin/page/{page}/remove-image', 'admin\PagesController@removeImage');

Route::get('pages/{image}', function($image = null) {
    $path = storage_path('app')."\\pages\\" . $image;
    return response()->download($path);
});
