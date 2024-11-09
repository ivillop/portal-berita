<?php

use App\Models\News;
use App\Models\User;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('home', ['news' => News::filter(request(['search', 'category', 'author']))->latest()->get()]);
});

Route::get('/bisnis', function () {
    $category = Category::where('slug', 'bisnis')->firstOrFail();
    return view('business', ['news' => $category->news()->latest()->get()]);
});

Route::get('/olahraga', function () {
    $category = Category::where('slug', 'olahraga')->firstOrFail();
    return view('sport', ['news' => $category->news()->latest()->get()]);
});

Route::get('/kesehatan', function () {
    $category = Category::where('slug', 'kesehatan')->firstOrFail();
    return view('health', ['news' => $category->news()->latest()->get()]);
});

Route::get('/authors/{user:username}', function (User $user) {
    return view('home', ['title' => count($user->news) . ' Article by ' . $user->name, 'home' => $user->news]);
});

Route::get('/categories/{category:slug}', function (Category $category) {
    return view('home', ['title' => 'Article in Category ' . $category->name, 'home' => $category->news]);
});

Route::get('/detail/{news:slug}', function (News $news) {
    $news->increment('views');
    $comments = $news->comments()->paginate(5);
    $totalComments = $news->comments()->count();
    return view('detail', [
        'news' => $news,
        'comments' => $comments,
        'allComment' =>$totalComments
    ]);
});

Route::get('/dashboard', function () {
    if (Auth::check()) {
        $news = News::latest()->paginate(5);
        $totalNews = News::count();
        $totalViews = News::sum('views');
        $totalComments = Comment::count();
        $user = Auth::user();

        return view('dashboard', [
            'user' => $user,
            'news' => $news,
            'totalNews' => $totalNews,
            'totalViews' => $totalViews,
            'totalComments' => $totalComments,
        ]);
    }

    return redirect()->route('login');
})->middleware('auth')->name('dashboard');

Route::post('/detail/{news:slug}/comment', function (Request $request, News $news) {
    $request->validate([
        'comment' => 'required|string',
        'name' => 'nullable|max:255',
    ]);

    if ($request->input('name') == null) {
        Comment::create([
            'news_id' => $news->id,
            'comment' => $request->input('comment'),
            'name' => 'Anonim',
        ]);
    } else {
        Comment::create([
            'news_id' => $news->id,
            'comment' => $request->input('comment'),
            'name' => $request->input('name'),
        ]);
    }
    return redirect()->back();
});

Route::post('/dashboard', function (Request $request) {
    $slug = $request->input('title');

    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'slug' => 'nullable',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'body' => 'required',
        'author_id' => 'required',
        'category_id' => 'required',
    ]);

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('images', 'public');
        $validatedData['image'] = $imagePath;
    }

    $validateData['slug'] = $slug;

    News::create($validatedData);

    return redirect('/dashboard')->with('success', 'News added successfully!');
})->middleware('auth');

Route::put('/detail/{id}', function (Request $request, $id) {
    $validatedData = $request->validate([
        'title' => 'required|max:255',
        'slug' => '',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'body' => 'required',
        'author_id' => 'required',
        'category_id' => 'required',
    ]);

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('images', 'public');
        $validatedData['image'] = $imagePath;
    }

    News::where('id', $id)->update($validatedData);

    return redirect('/dashboard')->with('success', 'News updated successfully!');
})->middleware('auth');

Route::delete('/detail/{id}', function ($id) {
    $news = News::findOrFail($id);
    $news->delete();

    return redirect('/dashboard')->with('success', 'News deleted successfully!');
})->middleware('auth');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
