<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use App\Models\Categories;
use App\Models\Coupons;
use App\Models\Stores;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
public function notfound()
{
$Coupons  = Coupons::whereIn('id', function($query) {
$query->select(DB::raw('MAX(id)'))
->from('coupons')
->groupBy('store');
})
->orderBy('created_at', 'desc')
->paginate(24);
return view('errors.404', compact('Coupons'));
}

    public function index() {

    $stores = Stores::latest()->paginate(24);
    $topstores = Stores::where('top_store', '!=', 0)->orderByRaw('CAST(`top_store` AS SIGNED) desc')->paginate(10) ;
    $topcoupon = Coupons::where('top_coupons', '!=', 0)
    ->whereNotNull('code')
    ->where('code', '!=', '')
    ->orderByRaw('CAST(`top_coupons` AS SIGNED) desc')
    ->limit(8) ->get();
    $categories = Categories::all();
    $blogs = Blog::latest()->paginate(10);
    $Coupons = Coupons::whereIn('id', function($query) {
    $query->select(DB::raw('MAX(id)'))
    ->from('coupons')
    ->groupBy('store');
    })
    ->whereNull('code')
    ->orderBy('created_at', 'desc')
    ->paginate(8);

    return view('welcome', compact('stores', 'categories', 'blogs', 'Coupons','topstores','topcoupon'));
    }


public function topStores(Request $request)
{
$topstores = Stores::latest()->paginate(30);
return view('home', compact('topstores'));
}

public function search(Request $request) {
$query = $request->input('query');
$store = Stores::where('name', $query)->first();
if ($store) {
return redirect()->route('store.details', ['name' => $store->name]);
}
$stores = Stores::where('name', 'like', "$query%")->latest()->get();

return view('search_results', compact('stores'));
}



public function blog_home()
{
$blogs = Blog::paginate(5);
$chunks = Stores::latest()->limit(25)->get();
return view('blog', compact('blogs', 'chunks'));
}



public function blog_show($name) {
$slug = Str::slug($name);
$title = ucwords(str_replace('-', ' ', $slug));
$blog = Blog::where('slug', $title)->first();
if (!$blog) {
return redirect('404');
}
$chunks = Stores::latest()->limit(20)->get();

return view('blog_details', compact('blog', 'chunks'));
}


public function stores(Request $request)
{
$letter = $request->input('letter');
$storesQuery = Stores::query();

if ($letter) {
$storesQuery->where('name', 'like', $letter.'%');
}

$categories = Categories::all();
$stores = $storesQuery->orderBy('name')->paginate(100);

return view('stores', compact('stores','categories'));
}


public function StoreDetails($name, Request $request) {
    $slug = Str::slug($name);
    $title = ucwords(str_replace('-', ' ', $slug));
    $store = Stores::where('slug', $title)->first();
    if (!$store) {
        return redirect('404');
        }

    // Sort coupons based on query parameter
    $sort = $request->query('sort', 'all');

    if ($sort === 'codes') {
        $coupons = Coupons::where('store', $title)->whereNotNull('code')->orderByRaw('CAST(`order` AS SIGNED) ASC')->get();
    } elseif ($sort === 'deals') {
        $coupons = Coupons::where('store', $title)->whereNull('code')->orderByRaw('CAST(`order` AS SIGNED) ASC')->get();
    } else {
        $coupons = Coupons::where('store', $title)->orderByRaw('CAST(`order` AS SIGNED) ASC')->get();
    }

    $codeCount = Coupons::where('store', $title)->whereNotNull('code')->count();
    $dealCount = Coupons::where('store', $title)->whereNull('code')->count();

    $blogs = Blog::all();

    // Fetch related stores
    $relatedStores = Stores::where('category', $store->category)
                           ->where('id', '!=', $store->id)
                           ->get();

    return view('store_details', compact('store', 'coupons', 'relatedStores', 'blogs', 'codeCount', 'dealCount'));
}

public function categories() {
$categories = Categories::all();
$stores = Stores::paginate(5)->groupBy('category')->take(5);
return view('categories', compact('categories', 'stores'));
}


public function viewcategory($name) {
    $slug = Str::slug($name);
    $title = ucwords(str_replace('-', ' ', $slug));

    // Fetch the store
    $category = Categories::where('slug', $title)->first();


    if (!$category) {
return redirect('404');
    }

    // Fetch related coupons and stores
    $stores = Stores::where('category', $title)->get();


    return view('related_category', compact('category', 'stores' ));
}

}
