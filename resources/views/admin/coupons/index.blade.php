@extends('admin.layouts.datatable_master')

@section('datatable-title', 'Coupons Management')

@section('datatable-content')
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="page-header d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 mb-0 text-gray-800">
                    <i class="fas fa-ticket-alt text-primary me-2"></i>Coupons Management
                </h1>
                <p class="text-muted mb-0">Manage all coupons in your system</p>
            </div>
            <div>
                <a href="{{ route('admin.coupon.create') }}" class="btn btn-primary btn-lg shadow-sm">
                    <i class="fas fa-plus-circle me-2"></i>Add New Coupon
                </a>
            </div>
        </div>

        <!-- Store Filter Card -->
        <div class="store-filter mb-4">
            <h6 class="text-white mb-3">
                <i class="fas fa-filter me-2"></i>Filter by Store
            </h6>
            <form method="GET" action="{{ route('admin.coupon.index') }}">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <select class="form-select form-select-lg" name="store_id" id="category-select" onchange="this.form.submit()">
                            <option value="">All Stores</option>
                            @foreach($couponstore as $coupon)
                                <option value="{{ $coupon->store_id }}" {{ $selectedCoupon == $coupon->store_id ? 'selected' : '' }}>
                                    {{ $coupon->stores->name ?? $coupon->store }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 text-end">
                        <span class="badge bg-light text-dark px-3 py-2">
                            <i class="fas fa-store me-1"></i>
                            {{ $coupons->count() }} Coupons
                        </span>
                    </div>
                </div>
            </form>
        </div>

        <!-- Success Message -->
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
            <i class="fas fa-check-circle me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        <!-- Bulk Actions -->
        <form id="bulk-delete-form" action="{{ route('admin.coupon.deleteSelected') }}" method="POST">
                @csrf
                <div class="bulk-actions mb-4">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="select-all">
                                <label class="form-check-label fw-bold" for="select-all">
                                    Select All
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4 text-end">
                            <button type="submit" id="bulk-delete-btn" class="btn btn-danger" disabled>
                                <i class="fas fa-trash-alt me-2"></i>Delete Selected
                            </button>
                        </div>
                    </div>
                </div>

                <!-- DataTable -->
                <div class="card shadow-sm border-0">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table id="SearchTable" class="table table-hover mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th width="50" class="text-center">
                                            <input type="checkbox" id="select-all-footer" class="form-check-input">
                                        </th>
                                        <th width="60">ID</th>
                                        <th width="50" class="text-center"><i class="fas fa-sort"></i></th>
                                        <th>Coupon Name</th>
                                        <th>Store</th>
                                        <th width="100" class="text-center">Type</th>
                                        <th width="100" class="text-center">Status</th>
                                        <th width="160">Created At</th>
                                        <th width="160">Last Updated</th>
                                        <th width="140" class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="tablecontents">
                                    @foreach ($coupons as $coupon)
                                        <tr class="row1 align-middle" data-id="{{ $coupon->id }}">
                                            <td class="text-center">
                                                <input type="checkbox" name="selected_coupons[]" value="{{ $coupon->id }}"
                                                    class="form-check-input row-checkbox">
                                            </td>
                                            <td>
                                                <span class="badge bg-secondary">#{{ $coupon->id }}</span>
                                            </td>
                                            <td class="text-center text-muted">
                                                <i class="fas fa-sort cursor-move"></i>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="me-3">
                                                        <i class="fas fa-ticket-alt text-primary"></i>
                                                    </div>
                                                    <div>
                                                        <strong>{{ $coupon->name }}</strong>
                                                        @if($coupon->code)
                                                        <div class="text-muted small">Code: {{ $coupon->code }}</div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="badge bg-info bg-opacity-10 text-info border border-info border-opacity-25 px-3 py-1">
                                                    <i class="fas fa-store me-1"></i>{{ $coupon->stores->name ?? 'N/A' }}
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                @if ($coupon->code)
                                                    <span class="badge-status bg-primary text-white">
                                                        <i class="fas fa-code me-1"></i>Code
                                                    </span>
                                                @else
                                                    <span class="badge-status bg-success text-white">
                                                        <i class="fas fa-percent me-1"></i>Deal
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if ($coupon->status == "disable")
                                                    <span class="badge-status inactive">
                                                        <i class="fas fa-times-circle me-1"></i>Disabled
                                                    </span>
                                                @else
                                                    <span class="badge-status active">
                                                        <i class="fas fa-check-circle me-1"></i>Active
                                                    </span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column">
                                                    <span class="small text-muted">{{ $coupon->created_at->format('M d, Y') }}</span>
                                                    <span class="text-muted smaller">
                                                        <i class="fas fa-clock me-1"></i>{{ $coupon->created_at->format('h:i A') }}
                                                    </span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column">
                                                    <span class="small text-muted">{{ $coupon->updated_at->format('M d, Y') }}</span>
                                                    <span class="text-muted smaller">
                                                        <i class="fas fa-clock me-1"></i>{{ $coupon->updated_at->format('h:i A') }}
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('admin.coupon.edit', $coupon->id) }}"
                                                    class="btn btn-sm btn-outline-primary"
                                                    data-bs-toggle="tooltip"
                                                    title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="{{ route('admin.coupon.delete', $coupon->id) }}"
                                                    onclick="return confirm('Are you sure you want to delete this coupon?')"
                                                    class="btn btn-sm btn-outline-danger"
                                                    data-bs-toggle="tooltip"
                                                    title="Delete">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th class="text-center">
                                            <input type="checkbox" id="select-all-footer-bottom" class="form-check-input">
                                        </th>
                                        <th>ID</th>
                                        <th class="text-center"><i class="fas fa-sort"></i></th>
                                        <th>Coupon Name</th>
                                        <th>Store</th>
                                        <th class="text-center">Type</th>
                                        <th class="text-center">Status</th>
                                        <th>Created At</th>
                                        <th>Last Updated</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                    <!-- Table Footer -->
                    <div class="card-footer bg-light d-flex justify-content-between align-items-center">
                        <div>
                            <span class="text-muted small">
                                Showing {{ $coupons->count() }} entries
                            </span>
                        </div>
                        <div>
                            <button type="submit" id="bulk-delete-btn-bottom" class="btn btn-danger btn-sm" disabled>
                                <i class="fas fa-trash-alt me-1"></i>Delete Selected
                            </button>
                        </div>
                    </div>
                </div>
        </form>
    </div>
@endsection

@push('scripts')
<script>
    // Additional JavaScript for coupon management
    $(document).ready(function() {
        // Row click to select checkbox
        $('#SearchTable tbody').on('click', 'tr', function(e) {
            if (!$(e.target).is('a, button, .form-check-input')) {
                const checkbox = $(this).find('.row-checkbox');
                checkbox.prop('checked', !checkbox.prop('checked'));
                checkbox.trigger('change');
            }
        });

        // Confirm delete for single item
        $('.btn-outline-danger').on('click', function(e) {
            if (!confirm('Are you sure you want to delete this coupon?')) {
                e.preventDefault();
            }
        });

        // Initialize all tooltips
        $('[data-bs-toggle="tooltip"]').tooltip();
    });
</script>
@endpush
