<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\TweetController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserNotificationsController;

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

// app()->bind(App\Sample::class, function(){
//     $sample_config = config('services.sample_config');
//     $dep = new App\SampleDependency;

//     return new App\Sample($dep, $sample_config);
// });

Route::get('/', function (App\Sample $sample) {

    $ctr = new App\Container;

    $ctr->bind('example', function(){

        $dep = new App\SampleDependency();

        return new App\Sample($dep, 'some value');
    });

    $sample_1 = $ctr->resolve('example');
    $sample_2 = $sample;

    //ddd($sample_2);
    return view('welcome');
});

Route::get('/about', function () {

    $param = request('param');

    return view('about', [
        'title' => $param
    ]);
});

Route::get('/freak-posts/{post}', function ($post) {
    
    $posts = [
        'fst' => [
            'title' => 'First One',
            'content' => 'The content of the first post here'
        ],
        'scd' => [
            'title' => 'The Second',
            'content' => 'The second is the weird one to read. Pls Don\'t read))'
        ]
    ];

    if (! array_key_exists($post, $posts) ) {

        abort(404, 'No posts like that');
    }

    $resData = [
        'title' => $posts[$post]['title'],
        'content' => $posts[$post]['content']
    ];

    return view('post', $resData);
});

Route::get('posts', [PostsController::class, 'index'])->name('posts.index');
Route::post('posts', [PostsController::class, 'store']);
Route::get('posts/create', [PostsController::class, 'create']);
Route::get('posts/{post}', [PostsController::class, 'show'])->name('posts.show');
Route::get('posts/{post}/edit', [PostsController::class, 'edit']);
Route::put('posts/{post}', [PostsController::class, 'update']);

Route::get('pages/{page_id}', [PageController::class, 'index']);

Route::get('tweets/{slug}', [TweetController::class, 'single']);

Route::get('tweets', [TweetController::class, 'all']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/contact', [ContactController::class, 'show']);
Route::post('/contact', [ContactController::class, 'store']);

Route::get('payments/create', [PaymentController::class, 'create'])->middleware('auth');
Route::post('payments', [PaymentController::class, 'store'])->middleware('auth');
Route::get('notifications', [UserNotificationsController::class, 'show'])->middleware('auth');