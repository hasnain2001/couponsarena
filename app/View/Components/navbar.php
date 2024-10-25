<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Categories;
use App\Models\Language;


class Navbar extends Component
{
    public $categories;
   
    public $Langs;
    public $languageCode;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {

        $categories = Categories::all();
        $Langs = Language::all();
        $languageCode = $lang ?? 'en';
        app()->setLocale($languageCode);
  
        return view('components.navbar', compact('categories', ));
    }
}
