<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupons;
use App\Models\Stores;

class CouponsController extends Controller
{
    public function coupon(Request $request) {
        if ($request->ajax()) {
            $coupons = Coupons::get();
            return response()->json($coupons);
        }

        // Get distinct store names only
        $couponstore = Coupons::select('store')->distinct()->get();
        $selectedCoupon = $request->input('store');

        // Initialize query
        $productsQuery = Coupons::query();

        // Filter by selected store if any
        if ($selectedCoupon) {
            $productsQuery->where('store', $selectedCoupon);
        }


        $coupons = $productsQuery->orderBy('created_at', 'desc')
        ->orderBy('store')
        ->orderByRaw('CAST(`order` AS SIGNED) ASC')
        ->limit(1000)
        ->get();
        return view('admin.coupons.index', compact('coupons','couponstore','selectedCoupon'));

    }

public function openCoupon($couponId)
{
    $coupon = Coupons::find($couponId);
    if ($coupon) {
        // Increment click count
        $coupon->clicks++;
        $coupon->save();

        // Assuming you have a route named 'store.detail' that shows the store detail page
        return redirect()->route('store.detail', ['id' => $coupon->store_id]);
    }
    // Handle case where coupon is not found
    return redirect()->back()->with('error', 'Coupon not found.');
}

public function updateClicks(Request $request)
{
    $couponId = $request->input('coupon_id');
    $coupon = Coupons::find($couponId);
    if ($coupon) {
        $coupon->clicks++;
        $coupon->save();
        return redirect()->back()->with('success', 'Coupon Click added');
    }
    return response()->json(['success' => false, 'message' => 'Coupon not found.']);
}


public function update(Request $request)
{
    try {
        $orderData = $request->order;

        // Loop through the order data and update the order column for each coupon
        foreach ($orderData as $order) {
            $coupon = Coupons::find($order['id']);
            $coupon->order = $order['position'];
            $coupon->save();
        }

        return response()->json(['status' => 'success', 'message' => 'Update Successfully.']);
    } catch (\Exception $e) {
        return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
    }
}
    public function create_coupon() {
        $stores = Stores::all();
        return view('admin.coupons.create', compact('stores'));
    }

    public function store_coupon(Request $request) {
        Coupons::create([
            'name' => $request->name,
            'description' => $request->description,
            'code' => $request->code,
            'destination_url' => $request->destination_url,
            'ending_date' => $request->ending_date,
            'status' => $request->status,
            'authentication' => isset($request->authentication) ? json_encode($request->authentication) : "No Auth",
            'store' => $request->store,
        ]);

        return redirect()->back()->with('success', 'Coupon Created Successfully');
    }

    public function edit_coupon($id) {
        $coupons = Coupons::find($id);
        $stores = Stores::all();
        return view('admin.coupons.edit', compact('coupons', 'stores'));
    }

    public function update_coupon(Request $request, $id) {
        $coupons = Coupons::find($id);

        $coupons->update([
            'name' => $request->name,
            'description' => $request->description,
            'code' => $request->code,
            'destination_url' => $request->destination_url,
            'ending_date' => $request->ending_date,
            'status' => $request->status,
            'authentication' => isset($request->authentication) ? json_encode($request->authentication) : "No Auth",
            'store' => isset($request->store) ? $request->store : $coupons->store,
        ]);

        return redirect()->back()->with('success', 'Coupon Updated Successfully');
    }

    public function delete_coupon($id) {
        Coupons::find($id)->delete();
        return redirect()->back()->with('success', 'Coupon Deleted Successfully');
    }

public function deleteSelected(Request $request)
{
    $couponIds = $request->input('selected_coupons');

    if ($couponIds) {
        Coupons::whereIn('id', $couponIds)->delete();
        return redirect()->back()->with('success', 'Selected coupons deleted successfully');
    } else {
        return redirect()->back()->with('error', 'No coupons selected for deletion');
    }
}


}
