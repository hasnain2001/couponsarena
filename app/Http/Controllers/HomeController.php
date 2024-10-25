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

public function index(Request $request, $lang = null) {
    $languageCode = $lang ?? 'en';
    app()->setLocale($languageCode);
    // Determine the language or default to English
    if ($lang) {
        $language = Language::where('code', $lang)->first();
        
        if (!$language) {
            abort(404, 'Language not found');
        }
    } else {
        // Default to English if no language is specified
        $language = Language::where('code', 'en')->first();
        
        if (!$language) {
            abort(404, 'Default language not found');
        }
    }
    
    // Fetch stores for the specified language
    $stores = Stores::where('language_id', $language->id)
        ->paginate(100)
        ->map(function($store) use ($language) {
            $store->url_with_language = url($language->code . '/store/' . $store->id);
            return $store;
        });
    
    // Fetch top coupon codes for the specified language
    $topcouponcode = Coupons::where('top_coupons', '!=', 0)
        ->whereNotNull('code')
        ->where('code', '!=', '')
        ->where('language_id', $language->id) // Filter by language
        ->orderByRaw('CAST(`top_coupons` AS SIGNED) desc')
        ->limit(8)
        ->get();

    // Fetch top deals for the specified language
    $Couponsdeals = Coupons::select('*')
        ->whereIn('id', function($query) use ($language) {
            $query->select(DB::raw('MAX(id)'))
                  ->from('coupons')
                  ->where('top_coupons', '>', 0)
                  ->where('language_id', $language->id) // Filter by language
                  ->groupBy('store')
                  ->union(
                      Coupons::select(DB::raw('MAX(id)'))
                      ->from('coupons')
                      ->whereNull('top_coupons')
                      ->where('language_id', $language->id) // Filter by language
                      ->groupBy('store')
                  );
        })
        ->whereNull('code') // Ensure no coupon code
        ->orderBy('top_coupons', 'desc')
        ->orderBy('created_at', 'desc')
        ->paginate(8);

    // Return the welcome view with the required data
    return view('welcome', compact('stores', 'Couponsdeals', 'topcouponcode'));
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
$chunks = Stores::latest()->limit(20)->get();

return view('blog_details', compact('blog', 'chunks'));
}


public function stores(Request $request, $lang = null)
{
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



public function StoreDetails($lang = null, $slug, Request $request) 
{
     // Normalize the slug
    $slug = Str::slug($slug); // Ensure the slug is in the correct format
    $title = ucwords(str_replace('-', ' ', $slug));
    
    // Fetch the store by slug and eager load the language relation
    $store = Stores::with('language')->where('slug', $title)->first();

     // Check if the language code from the URL matches the store's language code
    if ($lang !== $store->language->code) {
        return redirect("/{$store->language->code}/store/{$slug}");
    }

    // Sorting coupons based on the query parameter
    $sort = $request->query('sort', 'all');

    // Fetch coupons based on the selected sort method
    if ($sort === 'codes') {
        $coupons = Coupons::where('store', $store->name)
                          ->whereNotNull('code')
                          ->orderByRaw('CAST(`order` AS SIGNED) ASC')
                          ->get();
    } elseif ($sort === 'deals') {
        $coupons = Coupons::where('store', $store->name)
                          ->whereNull('code')
                          ->orderByRaw('CAST(`order` AS SIGNED) ASC')
                          ->get();
    } else {
        $coupons = Coupons::where('store', $store->name)
                          ->orderByRaw('CAST(`order` AS SIGNED) ASC')
                          ->get();
    }

    // Count the number of codes and deals
    $codeCount = Coupons::where('store', $store->name)
                        ->whereNotNull('code')
                        ->count();
    $dealCount = Coupons::where('store', $store->name)
                        ->whereNull('code')
                        ->count();

    // Fetch related stores based on the same category, excluding the current store
    $relatedStores = Stores::where('category', $store->category)
                           ->where('id', '!=', $store->id)
                           ->get();

    // Return the view with all the necessary data
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
    $stores = Stores::where('category', $title)->paginate(12);


    return view('related_category', compact('category', 'stores' ));
}

}
