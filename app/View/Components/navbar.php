<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Categories;
use App\Models\Stores;

class Navbar extends Component
{
    public $categories;
    public $stores;

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

        $categories = Categories::paginate(10);
        $stores = Stores::paginate(10);

        // Pass paginated data to the view
        return view('components.navbar', compact('categories', 'stores'));
    }
}
