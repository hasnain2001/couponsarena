<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DeleteStore;

class DeleteController extends Controller
{
    public function deletedStores()
    {
        $deletedStores = DeleteStore::with('deletedBy')->get();
        return view('admin.deleted.delete_stores', compact('deletedStores'));
    }
 
}
