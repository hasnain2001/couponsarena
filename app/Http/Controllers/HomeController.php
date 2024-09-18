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
        $topstores = Stores::where('top_store', '!=', 0)->orderByRaw('CAST(`top_store` AS SIGNED) desc')     ->paginate(10);
        $categories = Categories::all();
        $blogs = Blog::latest()->paginate(10);
        $Coupons = Coupons::whereIn('id', function($query) {
        $query->select(DB::raw('MAX(id)'))->from('coupons')
                ->groupBy('store');
        })
        ->orderBy('created_at', 'desc')
        ->paginate(21);

        return view('main', compact('stores', 'categories', 'blogs', 'Coupons','topstores'));
        }

public function topStores(Request $request)
{
    $topstores = Stores::latest()->paginate(30); // Assuming your store model is named Store

    return view('home', compact('topstores'));
}

       public function search(Request $request) {
        $query = $request->input('query');

        // Check if there is a store with a matching name
        $store = Stores::where('name', $query)->first();

        if ($store) {
            // If a store is found, redirect to the store details page
            return redirect()->route('store.details', ['name' => $store->name]);
        }


        // If no store or category is found, display the regular search results page
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

    $stores = $storesQuery->orderBy('name')->paginate(100);

    return view('stores', compact('stores'));
}

    public function StoreDetails($name) {
        $slug = Str::slug($name);
        $title = ucwords(str_replace('-', ' ', $slug));
        $store = Stores::where('slug', $title)->first();
        if (!$store) {
            return redirect('404');
        }
     $coupons = Coupons::where('store', $title)->orderByRaw('CAST(`order` AS SIGNED) ASC')->get();
     $relatedStores = Stores::where('category', $store->category)->where('id', '!=', $store->id)->get();

        return view('store_details', compact('store', 'coupons', 'relatedStores'));
    }


     public function categories() {
        $categories = Categories::all();
        return view('categories', compact('categories'));
    }
      public function popularcategories() {
        $category = Categories::all();
        return view('categories', compact('category'));
    }


public function viewcategory($name) {
    $slug = Str::slug($name);
    $title = ucwords(str_replace('-', ' ', $slug));

    // Fetch the store
    $category = Categories::where('title', $title)->first();


    if (!$category) {
return redirect('404');
    }

    // Fetch related coupons and stores
    $stores = Stores::where('category', $title)->get();


    return view('related_category', compact('category', 'stores' ));
}

}
