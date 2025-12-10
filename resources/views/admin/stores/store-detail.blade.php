@extends('admin.layouts.datatable_master')
@section('datatable-title')
    Coupons
@endsection
@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 34px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }

        input:checked + .slider {
            background-color: #2196F3;
        }

        input:checked + .slider:before {
            transform: translateX(26px);
        }

        .switch-container {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .switch-label {
            margin-left: 10px;
            font-weight: bold;
        }

        .form-section {
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eaeaea;
        }

        .top-coupons-group {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .top-coupon-option {
            display: flex;
            align-items: center;
        }

        .top-coupon-option input {
            margin-right: 5px;
        }

        .radio-group {
            display: flex;
            gap: 20px;
        }

        .radio-option {
            display: flex;
            align-items: center;
        }

        .radio-option input {
            margin-right: 5px;
        }

        .required-field:after {
            content: " *";
            color: red;
        }

        .modal-lg-custom {
            max-width: 900px;
        }

        .store-image-small {
            width: 40px;
            height: 40px;
            object-fit: cover;
        }
    </style>
@endpush
@section('datatable-content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Coupons</h1>
                    </div>
                    <div class="col-sm-6 d-flex justify-content-end">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#couponModal">
                            <i class="fas fa-plus mr-2"></i>Add New Coupon
                        </button>
                    </div>
                    <div class="col-12 mt-3">
                        <div class="d-flex align-items-center">
                            <h5 class="text-title mb-0"><strong>Store : </strong>{{ $store->name }}</h5>
                            <img class="img-thumbnail rounded-circle ml-3 store-image-small"
                                 src="{{ $store->store_image ? asset('uploads/stores/' . $store->store_image) : asset('front/assets/images/no-image-found.jpg') }}"
                                 alt="{{ $store->name }}">
                                 <span class="ml-3"><strong>Language :</strong> {{ $store->language->name ?? 'No language' }}</span>
                                 <span class="ml-3"><strong>Network :</strong> {{ $store->networks->title ?? 'No Network' }}</span>
                                 <span class="ml-3"><strong>Category :</strong> {{ $store->categories->title ?? 'No category' }}</span>
                                 <span  class="ml-3">created at<small>{{$store->created_at->format('Y-m-d-')}}</small></span>
                                   <a href="{{ route('admin.store.edit', $store->id) }}" class="btn btn-sm btn-info ml-3">
                                                                edit store
                                                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fa fa-check-circle" aria-hidden="true"></i>
                        <strong>Success!</strong> {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form id="bulk-delete-form" action="{{ route('admin.coupon.deleteSelected') }}" method="POST">
                                    @csrf
                                    <div class="table-responsive">
                                        <table id="SearchTable" class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th><input type="checkbox" id="select-all"></th>
                                                    <th>id</th>
                                                    <th width="30px">#</th>
                                                    <th>Coupon Name</th>
                                                    <th>Store</th>
                                                    <th>Deal/Code</th>
                                                    <th>lang</th>
                                                    <th>Status</th>
                                                    <th>create at</th>
                                                    <th>Last Updated</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tablecontents">
                                                @foreach ($coupons as $coupon)
                                                    <tr class="row1" data-id="{{ $coupon->id }}">
                                                        <td><input type="checkbox" name="selected_coupons[]" value="{{ $coupon->id }}"></td>
                                                        <th scope="row">{{ $loop->iteration }}</th>
                                                        <td class="pl-3"><i class="fa fa-sort"></i></td>
                                                        <td>{{ $coupon->name }}</td>
                                                        <td>{{ $coupon->store }}</td>
                                                        <td>
                                                            @if ($coupon->code)
                                                                <span>Code</span>
                                                            @else
                                                                <span>Deal</span>
                                                            @endif
                                                        </td>
                                                        <td>{{ $store->language->code ??'No language' }}</td>
                                                        <td>
                                                            @if ($coupon->status == "disable")
                                                                <i class="fa fa-fw fa-times-circle" style="color: blue;"></i>
                                                            @else
                                                                <i class="fa fa-fw fa-check-circle" style="color: green;"></i>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <span class="badge bg-info text-dark" data-bs-toggle="tooltip" title="{{ $coupon->created_at->setTimezone('Asia/Karachi')->format('l, F j, Y h:i A') }}">
                                                                {{ $coupon->created_at->setTimezone('Asia/Karachi')->format('M d, Y h:i A') }}
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <span class="badge bg-warning text-dark" data-bs-toggle="tooltip" title="{{ $coupon->updated_at->setTimezone('Asia/Karachi')->format('l, F j, Y h:i A') }}">
                                                                {{ $coupon->updated_at->setTimezone('Asia/Karachi')->format('M d, Y h:i A') }}
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('admin.coupon.edit', $coupon->id) }}" class="btn btn-info btn-sm">Edit</a>
                                                            <a href="{{ route('admin.coupon.delete', $coupon->id) }}" onclick="return confirm('Are you sure you want to delete this!')" class="btn btn-danger btn-sm">Delete</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th><input type="checkbox" id="select-all-footer"></th>
                                                    <th>id</th>
                                                    <th width="30px">#</th>
                                                    <th>Coupon Name</th>
                                                    <th>Store</th>
                                                    <th>Deal/Code</th>
                                                    <th>lang</th>
                                                    <th>Status</th>
                                                    <th>created at</th>
                                                    <th>Last Updated</th>
                                                    <th>Action</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>

                                    <div class="d-flex justify-content-end mt-3">
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete the selected coupons?')">Delete Selected</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Coupon Modal -->
    <div class="modal fade" id="couponModal" tabindex="-1" aria-labelledby="couponModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-lg-custom">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="couponModalLabel">Add New Coupon</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form name="CreateCoupon" id="CreateCoupon" method="POST" action="{{ route('admin.coupon.store') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <!-- Left Column -->
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Coupon Information</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-section">
                                            <div class="form-group">
                                                <label for="name" class="required-field">Coupon Name</label>
                                                <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" required placeholder="Enter coupon name">
                                            </div>

                                            <div class="form-group">
                                                <label for="description" class="required-field">Description</label>
                                                <textarea name="description" id="description" class="form-control" rows="3" style="resize: none;" placeholder="Enter coupon description" required>{{ old('description') }}</textarea>
                                            </div>
                                        </div>

                                        <div class="form-section">
                                            <div class="switch-container">
                                                <label class="switch">
                                                    <input type="checkbox" id="toggleCodeCheckbox" onchange="toggleCodeInput(this)" {{ old('code') ? 'checked' : '' }}>
                                                    <span class="slider"></span>
                                                </label>
                                                <span class="switch-label">Enable Coupon Code</span>
                                            </div>
                                            <div id="codeInputGroup" style="display: {{ old('code') ? 'block' : 'none' }}; margin-top: -0.5rem;">
                                                <input type="text" class="form-control" name="code" id="code" value="{{ old('code') }}" placeholder="Enter coupon code">
                                            </div>
                                        </div>

                                        <div class="form-section">
                                            <div class="form-group">
                                                <label for="ending_date" class="required-field">Ending Date</label>
                                                <input type="date" class="form-control" name="ending_date" id="ending_date" value="{{ old('ending_date') }}" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Right Column -->
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Settings</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-section">
                                            <div class="form-group">
                                                <label for="store_id" class="required-field">Store</label>
                                                <select name="store_id" id="store_id" class="form-control" required>
                                                    <option value="" disabled {{ old('store_id') ? '' : 'selected' }}>-- Select Store --</option>
                                                    @foreach($stores as $storeOption)
                                                        <option value="{{ $storeOption->id }}"
                                                    data-language-id="{{ $storeOption->language_id }}"
                                                    {{ $storeOption->id == $store->id ? 'selected' : (old('store_id') == $storeOption->id ? 'selected' : '') }}>
                                                            {{ $storeOption->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="language_id" class="required-field">Language</label>
                                                <select name="language_id" id="language_id" class="form-control" required>
                                                    <option disabled selected>-- Select Language --</option>
                                                    @foreach ($langs as $language)
                                                        <option value="{{ $language->id }}" {{ ($language->id == $store->language_id) ? 'selected' : (old('language_id') == $language->id ? 'selected' : '') }}>{{ $language->name }} ({{ $language->code }})</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-section">
                                            <div class="form-group">
                                                <label class="required-field">Top Coupons Ranking</label>
                                                <div class="top-coupons-group">
                                                    @for ($i = 0; $i <= 7; $i++)
                                                        <div class="top-coupon-option">
                                                            <input type="radio" name="top_coupons" id="top_{{ $i }}" value="{{ $i }}" {{ old('top_coupons') == $i ? 'checked' : '' }}>
                                                            <label for="top_{{ $i }}">{{ $i }}</label>
                                                        </div>
                                                    @endfor
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-section">
                                            <div class="form-group">
                                                <label class="required-field">Status</label>
                                                <div class="radio-group">
                                                    <div class="radio-option">
                                                        <input type="radio" name="status" id="enable" value="enable" {{ old('status', 'enable') == 'enable' ? 'checked' : '' }} required>
                                                        <label for="enable">Enable</label>
                                                    </div>
                                                    <div class="radio-option">
                                                        <input type="radio" name="status" id="disable" value="disable" {{ old('status') == 'disable' ? 'checked' : '' }} required>
                                                        <label for="disable">Disable</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="fas fa-times mr-2"></i> Cancel
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save mr-2"></i> Save Coupon
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>

    <script>
        // JavaScript to handle the select all functionality
        document.getElementById('select-all').addEventListener('click', function(event) {
            let checkboxes = document.querySelectorAll('input[name="selected_coupons[]"]');
            checkboxes.forEach(checkbox => {
                checkbox.checked = event.target.checked;
            });
        });

        document.getElementById('select-all-footer').addEventListener('click', function(event) {
            let checkboxes = document.querySelectorAll('input[name="selected_coupons[]"]');
            checkboxes.forEach(checkbox => {
                checkbox.checked = event.target.checked;
            });
        });

        // Toggle code input visibility
        function toggleCodeInput(checkbox) {
            const codeInputGroup = document.getElementById('codeInputGroup');
            if (checkbox.checked) {
                codeInputGroup.style.display = 'block';
            } else {
                codeInputGroup.style.display = 'none';
                document.getElementById('code').value = '';
            }
        }

        // Update language based on selected store
        document.getElementById('store_id').addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            const languageId = selectedOption.getAttribute('data-language');

            if (languageId) {
                document.getElementById('language_id').value = languageId;
            }
        });



        // Reset form when modal is closed
        document.getElementById('couponModal').addEventListener('hidden.bs.modal', function () {
            document.getElementById('CreateCoupon').reset();
            document.getElementById('codeInputGroup').style.display = 'none';
        });
    </script>
@endpush
