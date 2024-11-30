<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Categories;
use App\Models\Language;
use Illuminate\Support\Facades\Session;

class Navbar extends Component
{
    public $categories;
    public $langs;
    public $currentLang;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->categories = Categories::all();
        $this->langs = Language::all();
        $this->currentLang = Session::get('language', 'EN');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navbar', [
            'categories' => $this->categories,
            'langs' => $this->langs,
            'currentLang' => $this->currentLang,
        ]);
    }
}
