<?php

use App\Models\News;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['news' => News::filter(request(['search', 'category', 'author']))->latest()->get()]);
});

Route::get('/detail/{news:slug}', function (News $news) {
    return view('detail', ['news' => $news]);
});

Route::get('/authors/{user:username}', function (User $user) {
    // $news = $user->news->load('category', 'author');
    return view('home', ['title' => count($user->news) . ' Article by ' . $user->name, 'home' => $user->news]);
});

Route::get('/categories/{category:slug}', function (Category $category) {
    // $news = $category->news->load('category', 'author');
    return view('home', ['title' => 'Article in Category ' . $category->name, 'home' => $category->news]);
});

Route::get('/bisnis', function () {
    $category = Category::where('slug', 'bisnis')->firstOrFail();
    return view('business', ['news' => $category->news]);
});

Route::get('/olahraga', function () {
    $category = Category::where('slug', 'olahraga')->firstOrFail();
    return view('sport', ['news' => $category->news]);
});

Route::get('/kesehatan', function () {
    $category = Category::where('slug', 'kesehatan')->firstOrFail();
    return view('health', ['news' => $category->news]);
});
