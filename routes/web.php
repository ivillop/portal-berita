<?php

use App\Models\News;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('home', ['news' => News::filter(request(['search', 'category', 'author']))->latest()->get()]);
});

Route::get('/detail/{news:slug}', function (News $news) {
    return view('detail', ['news' => $news]);
});

Route::post('/dashboard', function (Request $request) {
    $slug = $request->input('title');

    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'slug' => 'nullable',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk gambar
        'body' => 'required',
        'author_id' => 'required',
        'category_id' => 'required',
    ]);

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('images', 'public'); // Simpan di storage/public/images
        $validatedData['image'] = $imagePath; // Simpan path gambar ke database
    }

    $validateData['slug'] = $slug;

    News::create($validatedData);

    return redirect('/dashboard')->with('success', 'News added successfully!');
})->middleware('auth');

Route::put('/detail/{id}', function (Request $request, $id) {
    $validatedData = $request->validate([
        'title' => 'required|max:255',
        'slug' => '',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
        'body' => 'required',
        'author_id' => 'required',
        'category_id' => 'required',
    ]);

    // Menangani upload gambar
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

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::post('/update-comment-count', function (Request $request) {
    $newsId = $request->input('newsId');
    $commentCount = $request->input('count');

    // Simpan total komentar di session (atau di database jika perlu)
    session()->put("comments_count_{$newsId}", $commentCount);

    return response()->json(['success' => true]);
});


Route::get('/dashboard', function () {
    if (Auth::check()) {
        // Mengambil semua data berita dan menghitung jumlah berita
        $news = News::latest()->paginate(5);
        $totalNews = News::count();
        $user = Auth::user();

        return view('dashboard', [
            'user' => $user,
            'news' => $news,
            'totalNews' => $totalNews,
        ]);
    }

    return redirect()->route('login');
})->middleware('auth')->name('dashboard');
