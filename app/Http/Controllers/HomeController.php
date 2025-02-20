<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use App\Models\Categories;
use App\Models\Coupons;
use App\Models\Language;
use App\Models\Stores;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
public function coupons()
{
$coupons = Coupons::orderBy('created_at', 'desc')->paginate(10);
return view('coupons', compact('coupons'));

 }

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

public function contact($lang = null)
{
    $languageCode = $lang ;
    app()->setLocale($languageCode);
return view('contact', compact('Coupons'));
}


public function index(Request $request,$lang = null) {
$languageCode = $lang ?? 'en';
app()->setLocale($languageCode);
     // Fetch the language, or default to English
     $language = Language::where('code', $languageCode)->firstOr(function () {
        abort(404, 'Language not found');
    });
$stores = Stores::select('name','store_image','slug')->where('language_id', $language->id)->orderBy('created_at','desc')->limit(24)->get();
$topcouponcode = Coupons::select('id', 'name', 'language_id', 'created_at','name','ending_date','store','clicks','destination_url','authentication')->where('language_id', $language->id)->where('top_coupons','>', 0 )->whereNotNull('code')->orderBy('created_at','desc')->limit(6)->get();
$Couponsdeals = Coupons::whereNull('code')->where('language_id', $language->id)->where('top_coupons', '>', 0)->orderBy('created_at','desc')->limit(6)->get();
$blogs = Blog::where('language_id', $language->id)->limit(12)->get();
// $todayblogs = Blog::orderBy('created_at', 'desc')->paginate(12);
$topblogs = Blog::where('language_id', $language->id)->where('top', '>', 0)->orderBy('created_at', 'desc')->limit(10)->get();
    return view('welcome', compact('blogs','topblogs','stores','topcouponcode','Couponsdeals'));
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



public function blog_home(Request $request, $lang = null)
{
    $languageCode = $lang ?? 'en';
    app()->setLocale($languageCode);
         // Fetch the language, or default to English
         $language = Language::where('code', $languageCode)->firstOr(function () {
            abort(404, 'Language not found');
        });
    // Paginate blogs as usual
    $blogs = Blog::where('language_id', $language->id)->paginate(5);
    $chunks = Stores::select('name','store_image','slug')->where('language_id', $language->id)->orderBy('created_at','desc')->limit(24)->get();


    return view('blog', compact('blogs', 'chunks'));
}

public function blog_show($lang = 'en', $slug, Request $request)
{
    // Set the app locale to the provided language or default to 'en'
    app()->setLocale($lang);

    // Normalize the slug
    $slug = Str::slug($slug);
    $title = ucwords(str_replace('-', ' ', $slug));

    // Fetch the store by slug and eager load the language relation
    $blog = Blog::with('language')->where('slug', $title)->first();

    if (!$blog) {
        abort(404); // Store not found
    }

    // Check if the store has an associated language
    if (!$blog->language) {
        return response()->json(['error' => 'No language select for this store.'], 404);
    }

    // Redirect if the language code doesn't match the store's language
    if ($lang !== $blog->language->code) {
        return redirect()->route('blog-details.withLang', [ 'lang' => $blog->language->code,
            'slug' => $slug
        ]);
    }



    // Fetch related stores based on the same category
    $chunks = Stores::where('category', $blog->category)
                                               ->where('language_id', $blog->language_id)
                           ->get();

    return view('blog_details', compact('blog', 'chunks',));
}




public function stores(Request $request, $lang = null)
{

    $languageCode = $lang ?? 'en';
    app()->setLocale($languageCode);
         // Fetch the language, or default to English
         $language = Language::where('code', $languageCode)->firstOr(function () {
            abort(404, 'Language not found');
        });
        $stores = Stores::where('language_id', $language->id)
        ->orderBy('name', 'asc') // Sort alphabetically by store name
        ->paginate(100);

    return view('stores', compact('stores'));
}




public function StoreDetails($lang = 'en', $slug, Request $request)
{
    // Set the app locale to the provided language or default to 'en'
    app()->setLocale($lang);

    // Normalize the slug
    $slug = Str::slug($slug);
    $title = ucwords(str_replace('-', ' ', $slug));

    // Fetch the store by slug and eager load the language relation
    $store = Stores::with('language')->where('slug', $title)->first();

    if (!$store) {
        abort(404); // Store not found
    }

    // Check if the store has an associated language
    if (!$store->language) {
        return response()->json(['error' => 'No language select for this store.'], 404);
    }

    // Redirect if the language code doesn't match the store's language
    if ($lang !== $store->language->code) {
        return redirect()->route('store_details.withLang', [
            'lang' => $store->language->code,
            'slug' => $slug
        ]);
    }

    // Sorting and fetching coupons
    $sort = $request->query('sort', 'all');
    if ($sort === 'codes') {
        $coupons = Coupons::where('store', $store->slug)
                          ->whereNotNull('code')
                          ->orderByRaw('CAST(`order` AS SIGNED) ASC')
                          ->where('language_id', $store->language_id)
                          ->get();
    } elseif ($sort === 'deals') {
        $coupons = Coupons::where('store', $store->slug)
                          ->whereNull('code')
                          ->orderByRaw('CAST(`order` AS SIGNED) ASC')
                          ->where('language_id', $store->language_id)
                          ->get();
    } else {
        $coupons = Coupons::where('store', $store->slug)
                          ->orderByRaw('CAST(`order` AS SIGNED) ASC')
                          ->get();
    }

    // Count the number of codes and deals
    $codeCount = Coupons::where('store', $store->slug)
                        ->whereNotNull('code')
                        ->where('language_id', $store->language_id)
                        ->count();
    $dealCount = Coupons::where('store', $store->slug)
                        ->whereNull('code')
                        ->where('language_id', $store->language_id)
                        ->count();

    // Fetch related stores based on the same category
    $relatedStores = Stores::where('category', $store->category)
                           ->where('id', '!=', $store->id)
                           ->where('language_id', $store->language_id)
                           ->get();

    return view('store_details', compact('store', 'coupons', 'relatedStores', 'codeCount', 'dealCount'));
}





public function categories(Request $request, $lang = null) {
$categories = Categories::all();
return view('categories', compact('categories', ));
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
    $stores = Stores::where('category', $title)->orderBy('created_at','desc')->get();


    return view('related_category', compact('category', 'stores' ));
}



}
