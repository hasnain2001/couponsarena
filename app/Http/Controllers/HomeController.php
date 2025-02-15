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
$coupons = Coupons::orderBy('created_at', 'desc')->paginate(15);
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
$blogs = Blog::limit(12)->get();
$todayblogs = Blog::orderBy('created_at', 'desc')->paginate(12);
$topblogs = Blog::where('top', '>', 0)->orderBy('created_at', 'desc')->limit(10)->get();

    return view('welcome', compact('blogs','todayblogs','topblogs'));
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
    // Paginate blogs as usual
    $blogs = Blog::paginate(5);

    // Check if a language code is provided
    if ($lang) {
        // Find the language by the code in the URL
        $language = Language::where('code', $lang)->first();

        if ($language) {
            // Get stores filtered by language and paginate
            $chunks = Stores::where('language_id', $language->id)
                ->paginate(25)
                ->map(function($store) use ($language) {
                    // Append language code to the store's URL
                    $store->url_with_language = url($language->code . '/blog/' . $store->id);
                    return $store;
                });
        } else {
            abort(404, 'Language not found');
        }
    } else {
        // Default to English or a fallback if no language code is provided
        $chunks = Stores::paginate(25)->map(function($store) {
            $language = Language::find($store->language_id);
            $store->url_with_language = $language ? url($language->code . '/blog/' . $store->id) : url('en/store/' . $store->id);
            return $store;
        });
    }

    return view('blog', compact('blogs', 'chunks'));
}




public function blog_show($name) {
$slug = Str::slug($name);
$title = ucwords(str_replace('-', ' ', $slug));
$blog = Blog::where('slug', $title)->first();
if (!$blog) {
return redirect('404');
}
$chunks = Stores::where('category',$blog->category)->latest()->limit(20)->get();

return view('blog_details', compact('blog', 'chunks'));
}


public function stores(Request $request, $lang = null)
{
    $languageCode = $lang ?? 'en';
    app()->setLocale($languageCode);
    if ($lang) {
       $language = Language::where('code', $lang)->first();

        if ($language) {
            $stores = Stores::where('language_id', $language->id)->paginate(100)->map(function($store) use ($language) {
                $store->url_with_language = url($language->code . '/store/' . $store->id);
                return $store;
            });
        } else {
            abort(404, 'Language not found');
        }
    } else {
        $stores = Stores::paginate(100)->map(function($store) {
            $language = Language::find($store->language_id);
            $store->url_with_language = $language ? url($language->code . '/store/' . $store->id) : url('en/store/' . $store->id);
            return $store;
        });
    }

    return view('stores', compact('stores', ));
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
        $coupons = Coupons::where('store', $store->name)
                          ->whereNotNull('code')
                          ->orderByRaw('CAST(`order` AS SIGNED) ASC')
                          ->where('language_id', $store->language_id)
                          ->get();
    } elseif ($sort === 'deals') {
        $coupons = Coupons::where('store', $store->name)
                          ->whereNull('code')
                          ->orderByRaw('CAST(`order` AS SIGNED) ASC')
                          ->where('language_id', $store->language_id)
                          ->get();
    } else {
        $coupons = Coupons::where('store', $store->name)
                          ->orderByRaw('CAST(`order` AS SIGNED) ASC')
                          ->get();
    }

    // Count the number of codes and deals
    $codeCount = Coupons::where('store', $store->name)
                        ->whereNotNull('code')
                        ->where('language_id', $store->language_id)
                        ->count();
    $dealCount = Coupons::where('store', $store->name)
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
