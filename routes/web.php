<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    if (\Illuminate\Support\Facades\Auth::id()) {

        $favs = \App\Models\Favorite::where('user_id', \Illuminate\Support\Facades\Auth::id())->pluck('category_id')->toArray();

        $posts = \App\Models\Post::whereIn('category_id', $favs)
            ->orderBy('id', 'desc')
            ->paginate(9);
    } else {
        $posts = \App\Models\Post::where('is_active', true)
            ->orderBy('id', 'desc')
            ->paginate(9);
    }


    $categories = \App\Models\Category::get();

    $settings = \App\Models\Setting::first();

    if ($settings && $settings->is_maintenance) {
        return view('maintenance');
    }

    return view('index')->with([
        'posts' => $posts,
        'categories' => $categories,
    ]);
});

Route::get('register', function () {
    return view('auth.register');
})->name('register-ui');

Route::get('login', [\App\Http\Controllers\Auth\LoginController::class, 'loginUI'])->name('loginUI');
Route::get('logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::post('login', [\App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::post('register', [\App\Http\Controllers\Auth\LoginController::class, 'register'])->name('register');


Route::group(['middleware' => 'auth'], function () {

    Route::get('maintenance', function () {

        $setting = \App\Models\Setting::first();
        if (!$setting) {
            \App\Models\Setting::create([
                'is_maintenance' => true
            ]);
        } else {
            $setting->update([
                'is_maintenance' => !$setting->is_maintenance
            ]);
        }

        return \Illuminate\Support\Facades\Redirect::back();
    })->name('handle-maintenance');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
        ->name('home');

    Route::get('favorite/{id}', [App\Http\Controllers\HomeController::class, 'favorite'])
        ->name('favorite');

    Route::get('favorites', [App\Http\Controllers\HomeController::class, 'favoriteIndex'])
        ->name('favorites.index');


    Route::get('favorites/delete/{id}', [App\Http\Controllers\HomeController::class, 'favoriteDelete'])
        ->name('favorites.delete');


    Route::group(['prefix' => 'permissions'], function () {
        Route::get('index', [App\Http\Controllers\PermissionController::class, 'index'])->name('permissions.index');
        Route::get('create', [App\Http\Controllers\PermissionController::class, 'create'])->name('permissions.create');
        Route::post('store', [App\Http\Controllers\PermissionController::class, 'store'])->name('permissions.store');
        Route::get('activate/{id}', [App\Http\Controllers\PermissionController::class, 'activate'])->name('permissions.activate');
    });


    Route::group(['prefix' => 'posts'], function () {
        Route::get('detail/{id}', [App\Http\Controllers\PostController::class, 'detail'])->name('posts.detail');
    });


    Route::group(['prefix' => 'history'], function () {
        Route::get('index', [App\Http\Controllers\HistoryController::class, 'index'])->name('history.index');
    });

    Route::group(['prefix' => 'logs'], function () {
        Route::get('index', [App\Http\Controllers\LogController::class, 'index'])->name('logs.index');
    });

    Route::group(['prefix' => 'profile'], function () {
        Route::get('list', [App\Http\Controllers\ProfileController::class, 'list'])->name('profile.list');
        Route::get('delete_reqs', [App\Http\Controllers\ProfileController::class, 'delete_reqs'])->name('profile.delete_reqs');
        Route::get('complete_req/{id}', [App\Http\Controllers\ProfileController::class, 'complete_req'])->name('profile.complete_req');
        Route::get('index', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.index');
        Route::get('create', [App\Http\Controllers\ProfileController::class, 'create'])->name('profile.create');
        Route::post('store', [App\Http\Controllers\ProfileController::class, 'store'])->name('profile.store');
        Route::get('comments', [App\Http\Controllers\ProfileController::class, 'comments'])->name('profile.comments.index');
        Route::post('update', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
        Route::get('deactivate', [App\Http\Controllers\ProfileController::class, 'deactivate'])->name('profile.deactivate');
        Route::get('activate/{id}', [App\Http\Controllers\ProfileController::class, 'activate'])->name('profile.activate');

    });
    Route::group(['prefix' => 'news'], function () {
        Route::get('index', [App\Http\Controllers\NewsController::class, 'index'])->name('news.index');
        Route::get('create', [App\Http\Controllers\NewsController::class, 'create'])->name('news.create');
        Route::post('store', [App\Http\Controllers\NewsController::class, 'store'])->name('news.store');
        Route::post('update/{id}', [App\Http\Controllers\NewsController::class, 'update'])->name('news.update');
        Route::get('edit/{id}', [App\Http\Controllers\NewsController::class, 'edit'])->name('news.edit');
        Route::get('activate/{id}', [App\Http\Controllers\NewsController::class, 'activate'])->name('news.activate');
    });


    Route::group(['prefix' => 'comments'], function () {
        Route::get('index', [App\Http\Controllers\CommentController::class, 'index'])->name('comments.index');
        Route::post('store', [App\Http\Controllers\CommentController::class, 'store'])->name('comments.store');
        Route::get('edit/{id}', [App\Http\Controllers\CommentController::class, 'edit'])->name('comments.edit');
        Route::get('activate/{id}', [App\Http\Controllers\CommentController::class, 'activate'])->name('comments.activate');
        Route::post('update/{id}', [App\Http\Controllers\CommentController::class, 'update'])->name('comments.update');
    });


});

