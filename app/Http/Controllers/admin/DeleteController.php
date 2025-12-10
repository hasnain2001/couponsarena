<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DeleteStore;

class DeleteController extends Controller
{
    public function deletedStores()
    {
        $deletedStores = DeleteStore::with('deletedBy')->orderBy('created_at','desc')->get();
        return view('admin.deleted.delete_stores', compact('deletedStores'));

    }
    public function restoreStore($id)
    {
        $store = DeleteStore::find($id);
        $store->restore();
        return redirect()->back()->with('success', 'Store restored successfully!');
    }
    public function delete($id)
    {
        $store = DeleteStore::find($id);
        $store->forceDelete();
        return redirect()->back()->with('success', 'Store deleted permanently!');
    }


}
