<?php

use App\Models\News;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('home', ['news' => News::filter(request(['search', 'category', 'author']))->latest()->get()]);
});

// Route::get('/', function () {
//     // Cek apakah pengguna sudah login
//     if (Auth::check()) {
//         return view('home', [
//             'news' => News::filter(request(['search', 'category', 'author']))->latest()->get()
//         ]);
//     } else {
//         return redirect()->route('login');
//     }
// });

Route::get('/detail/{news:slug}', function (News $news) {
    return view('detail', ['news' => $news]);
});

Route::post('/', function (Request $request) {
    News::create($request->validate([
        'title' => 'required|string|max:255',
        'body' => 'required',
        'author' => 'required|string|max:255',
        'category' => 'required|in:Berita,Bisnis,Olahraga,Kesehatan', // Validasi kategori
    ]));

    return redirect('/dashboard')->with('success', 'News added successfully!');
})->middleware('auth');

Route::put('/detail/{id}', function (Request $request, $id) {
    $validatedData = $request->validate([
        'title' => 'required|max:255',
        'body' => 'required|string',
        'author_id' => 'required',
        'category_id' => 'required',
    ]);

    News::where('id', $id)->update($validatedData);

    return redirect('/dashboard')->with('success', 'News updated successfully!');
})->middleware('auth');

Route::delete('/detail/{id}', function ($id) {
    $news = News::findOrFail($id);
    $news->delete();

    return redirect('/dashboard')->with('success', 'News deleted successfully!');
})->middleware('auth');

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

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/dashboard', function () {
    if (Auth::check()) {
        // Mengambil semua data berita dan menghitung jumlah berita
        $news = News::all();
        $totalNews = $news->count();
        $user = Auth::user();

        return view('dashboard', [
            'user' => $user,
            'news' => $news,
            'totalNews' => $totalNews,
        ]);
    }

    return redirect()->route('login');
})->middleware('auth')->name('dashboard');
