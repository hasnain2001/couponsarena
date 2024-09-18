@extends('admin.master')
@section('title')
    Create
@endsection
@section('main-content')
<style>

</style>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Coupon</h1>
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
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form name="CreateCoupon" id="CreateCoupon" method="POST" action="{{ route('admin.coupon.store') }}">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Coupon Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" id="name" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description <span class="text-danger">*</span></label>
                            <textarea name="description" id="description" class="form-control" cols="30" rows="5" style="resize: none;" required></textarea>
                        </div>
                       <div class="form-group">
                                    <label for="code">Code</label>
                                    <input type="text" class="form-control" name="code" id="code">
                                </div>
                        <div class="form-group">
                            <label for="destination_url">Destination URL <span class="text-danger">*</span></label>
                            <input type="url" class="form-control" name="destination_url" id="destination_url" required>
                        </div>

                     <div class="form-group">

</div>

                        <div class="form-group">
                            <label for="ending_date">Ending Date <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="ending_date" id="ending_date" required>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="status">Status <span class="text-danger">*</span></label><br>
                            <input type="radio" name="status" id="enable" value="enable" required>&nbsp;<label for="enable">Enable</label>
                            <input type="radio" name="status" id="disable" value="disable" required>&nbsp;<label for="disable">Disable</label>
                        </div>
                        <div class="form-group">
                            <label for="authentication">Authentication</label><br>
                            <input type="checkbox" name="authentication[]" id="never_expire" value="never_expire">&nbsp;<label for="never_expire">Never Expire</label><br>
                            <input type="checkbox" name="authentication[]" id="featured" value="featured">&nbsp;<label for="featured">Featured</label><br>
                            <input type="checkbox" name="authentication[]" id="free_shipping" value="free_shipping">&nbsp;<label for="free_shipping">Free Shipping</label><br>
                            <input type="checkbox" name="authentication[]" id="coupon_code" value="coupon_code">&nbsp;<label for="coupon_code">Coupon Code</label><br>
                            <input type="checkbox" name="authentication[]" id="top_deals" value="top_deals">&nbsp;<label for="top_deals">Top Deals</label><br>
                            <input type="checkbox" name="authentication[]" id="valentine" value="valentine">&nbsp;<label for="valentine">Valentine</label>
                        </div>
                        <div class="form-group">
                            <label for="store">Store <span class="text-danger">*</span></label>
                            <select name="store" id="store" class="form-control" required>
                                <option value="" disabled selected>--Select Store--</option>
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
