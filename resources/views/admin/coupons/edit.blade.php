@extends('admin.master')
@section('title')
    Update
@endsection
@section('main-content')

<style>
    input, textarea {
        font-weight: bold; /* Makes the text bold */
        color: #333; /* Dark color for text, adjust as needed */
    }
    
    label {
        font-weight: bold; /* Makes the label text bold */
    }
</style>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Update Coupon</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            @if(session('success'))
                <div class="alert alert-success alert-dismissable">
                    <i class="fa fa-ban"></i>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <b>{{ session('success') }}</b>
                </div>
            @endif
            <form name="UpdateCoupon" id="UpdateCoupon" method="POST" action="{{ route('admin.coupon.update', $coupons->id) }}">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Coupon Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{ $coupons->name }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" class="form-control" cols="30" rows="5" style="resize: none;">{{ $coupons->description }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="code">Code</label>
                                    <input type="text" class="form-control" name="code" id="code" value="{{ $coupons->code }}">
                                </div>
                                <div class="form-group">
                                    <label for="destination_url">Destination URL <span class="text-danger">*</span></label>
                                    <input type="url" class="form-control" name="destination_url" id="destination_url" value="{{ $coupons->destination_url }}">
                                </div>
                                <div class="form-group">
                                    <label for="ending_date">Ending Date <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" name="ending_date" id="ending_date" value="{{ $coupons->ending_date }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="status">Status <span class="text-danger">*</span></label><br>
                                    <input type="radio" name="status" id="enable" {{ $coupons->status == 'enable' ? 'checked' : '' }} value="enable">&nbsp;<label for="enable">Enable</label>
                                    <input type="radio" name="status" id="disable" {{ $coupons->status == 'disable' ? 'checked' : '' }} value="disable">&nbsp;<label for="disable">Disable</label>
                                </div>
                                <div class="form-group">
                                    <label for="authentication">Authentication</label><br>
                                    <input type="checkbox" name="authentication[]" {{ (is_array($coupons->authentication) && in_array('never_expire', $coupons->authentication)) ? 'checked' : '' }} id="never_expire" value="never_expire">&nbsp;<label for="never_expire">Never Expire</label><br>
                                    <input type="checkbox" name="authentication[]" {{ (is_array($coupons->authentication) && in_array('featured', $coupons->authentication)) ? 'checked' : '' }} id="featured" value="featured">&nbsp;<label for="featured">Featured</label><br>
                                    <input type="checkbox" name="authentication[]" {{ (is_array($coupons->authentication) && in_array('free_shipping', $coupons->authentication)) ? 'checked' : '' }} id="free_shipping" value="free_shipping">&nbsp;<label for="free_shipping">Free Shipping</label><br>
                                    <input type="checkbox" name="authentication[]" {{ (is_array($coupons->authentication) && in_array('coupon_code', $coupons->authentication)) ? 'checked' : '' }} id="coupon_code" value="coupon_code">&nbsp;<label for="coupon_code">Coupon Code</label><br>
                                    <input type="checkbox" name="authentication[]" {{ (is_array($coupons->authentication) && in_array('top_deals', $coupons->authentication)) ? 'checked' : '' }} id="top_deals" value="top_deals">&nbsp;<label for="top_deals">Top Deals</label><br>
                                    <input type="checkbox" name="authentication[]" {{ (is_array($coupons->authentication) && in_array('valentine', $coupons->authentication)) ? 'checked' : '' }} id="valentine" value="valentine">&nbsp;<label for="valentine">Valentine</label>
                                </div>
                                <div class="form-group">
                                    <label for="store">Store <span class="text-danger">*</span></label>
                                    <select name="store" id="store" class="form-control fw-bold">
                                        <option value="" disabled selected>{{ $coupons->store }}</option>
                                        @foreach($stores as $store) 
                                            <option value="{{ $store->slug }}">{{ $store->slug }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="{{ route('admin.coupon') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>
@endsection
