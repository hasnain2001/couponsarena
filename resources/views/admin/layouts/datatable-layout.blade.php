<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('datatable-title', 'Admin Panel')</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap5.min.css">

    <!-- Custom Admin CSS -->
    <link rel="stylesheet" href="{{ asset('admin/css/admin-styles.css') }}">

    <!-- Page Specific Styles -->
    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
            --accent-color: #4cc9f0;
            --sidebar-bg: #1a1a2e;
            --sidebar-hover: #16213e;
            --sidebar-active: #4361ee;
            --content-bg: #f8f9fa;
            --card-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
        }

        /* DataTables Custom Styling */
        .dataTables_wrapper {
            padding: 0;
        }

        .dataTables_wrapper .dataTables_length,
        .dataTables_wrapper .dataTables_filter,
        .dataTables_wrapper .dataTables_info,
        .dataTables_wrapper .dataTables_processing,
        .dataTables_wrapper .dataTables_paginate {
            color: #6c757d;
            font-size: 0.875rem;
        }

        .dataTables_wrapper .dataTables_filter input {
            border: 1px solid #dee2e6;
            border-radius: 0.375rem;
            padding: 0.5rem 0.75rem;
            font-size: 0.875rem;
            transition: all 0.3s ease;
        }

        .dataTables_wrapper .dataTables_filter input:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(67, 97, 238, 0.25);
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding: 0.375rem 0.75rem;
            margin-left: 2px;
            border: 1px solid #dee2e6;
            border-radius: 0.375rem;
            color: #495057;
            transition: all 0.3s ease;
            font-size: 0.875rem;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background: var(--primary-color) !important;
            color: white !important;
            border-color: var(--primary-color) !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background: #e9ecef !important;
            border-color: #dee2e6 !important;
            color: #495057 !important;
        }

        .dataTables_wrapper .dataTables_length select {
            border: 1px solid #dee2e6;
            border-radius: 0.375rem;
            padding: 0.375rem 2rem 0.375rem 0.75rem;
            font-size: 0.875rem;
        }

        /* Buttons Styling */
        .dt-buttons .btn {
            margin-right: 5px;
            font-size: 0.875rem;
            padding: 0.375rem 0.75rem;
        }

        /* Table Styling */
        .table {
            margin-bottom: 0;
        }

        .table th {
            font-weight: 600;
            color: #495057;
            background-color: #f8f9fa;
            border-bottom: 2px solid #dee2e6;
            padding: 1rem;
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .table td {
            padding: 1rem;
            vertical-align: middle;
            font-size: 0.875rem;
            border-top: 1px solid #f1f3f4;
        }

        .table-hover tbody tr:hover {
            background-color: rgba(67, 97, 238, 0.05);
        }

        /* Card Styling */
        .card {
            border: none;
            box-shadow: var(--card-shadow);
            border-radius: 0.5rem;
            margin-bottom: 1.5rem;
        }

        .card-header {
            background-color: white;
            border-bottom: 1px solid #e3e6f0;
            padding: 1rem 1.5rem;
        }

        .card-body {
            padding: 1.5rem;
        }

        /* Alert Styling */
        .alert {
            border: none;
            border-radius: 0.5rem;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.1);
        }

        /* Badge Styling */
        .badge {
            font-weight: 500;
            padding: 0.35em 0.65em;
            font-size: 0.75em;
        }

        /* Form Control Styling */
        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(67, 97, 238, 0.25);
        }

        /* Button Styling */
        .btn {
            border-radius: 0.375rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-primary:hover {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
            transform: translateY(-1px);
        }

        .btn-outline-primary {
            color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-outline-primary:hover {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            transform: translateY(-1px);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .dataTables_wrapper .dataTables_length,
            .dataTables_wrapper .dataTables_filter {
                text-align: left;
                margin-bottom: 1rem;
            }

            .dataTables_wrapper .dataTables_filter input {
                width: 100% !important;
            }

            .dt-buttons {
                text-align: center;
                margin-top: 1rem;
            }

            .dt-buttons .btn {
                margin-bottom: 0.5rem;
            }

            .table-responsive {
                border: none;
            }
        }

        /* Loading Animation */
        .dataTables_processing {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color)) !important;
            color: white !important;
            border-radius: 0.5rem;
            padding: 1rem !important;
            border: none !important;
            box-shadow: var(--card-shadow);
        }

        /* Custom Scrollbar for Tables */
        .table-responsive::-webkit-scrollbar {
            height: 8px;
        }

        .table-responsive::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 4px;
        }

        .table-responsive::-webkit-scrollbar-thumb {
            background: #c1c1c1;
            border-radius: 4px;
        }

        .table-responsive::-webkit-scrollbar-thumb:hover {
            background: #a8a8a8;
        }
    </style>

    @stack('styles')
</head>

<body class="admin-body">
    <div class="container-fluid">
        <!-- Navigation -->
        <header>
            @include('admin.layouts.navigation')
        </header>

        <div class="row">
            <!-- Sidebar -->
                @include('admin.layouts.sidebar')
            <!-- End Sidebar -->
            <!-- Main Content -->
            <main class="col-md-10 ms-sm-auto px-4 py-4">
                <div class="content-wrapper">
                    @yield('datatable-content')
                </div>
            </main>
        </div>

        <!-- Footer -->
        <footer class="admin-footer mt-auto py-3 border-top">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-6 text-center text-md-start">
                        <strong>Copyright &copy; {{ date('Y') }} <a href="#" class="text-primary">CouponsArena</a>.</strong> All rights reserved.
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <span class="text-muted">Version 3.2.0</span>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    @stack('scripts')
    <!-- Bootstrap 5 Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.colVis.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>

    <!-- Admin Scripts -->
    <script src="{{ asset('admin/js/admin-scripts.js') }}"></script>

    <!-- DataTables Initialization -->
    <script>
        $(document).ready(function() {
            // Initialize all tables with id starting with SearchTable
            $('table[id^="SearchTable"]').each(function() {
                var tableId = $(this).attr('id');

                // Check if DataTable is already initialized
                if (!$.fn.DataTable.isDataTable('#' + tableId)) {
                    $(this).DataTable({
                        "responsive": true,
                        "lengthChange": true,
                        "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
                        "autoWidth": false,
                        "buttons": [
                            {
                                extend: 'copy',
                                className: 'btn btn-sm btn-outline-dark',
                                text: '<i class="fas fa-copy me-1"></i>Copy'
                            },
                            {
                                extend: 'csv',
                                className: 'btn btn-sm btn-outline-dark',
                                text: '<i class="fas fa-file-csv me-1"></i>CSV'
                            },
                            {
                                extend: 'excel',
                                className: 'btn btn-sm btn-outline-dark',
                                text: '<i class="fas fa-file-excel me-1"></i>Excel'
                            },
                            {
                                extend: 'pdf',
                                className: 'btn btn-sm btn-outline-dark',
                                text: '<i class="fas fa-file-pdf me-1"></i>PDF'
                            },
                            {
                                extend: 'print',
                                className: 'btn btn-sm btn-outline-dark',
                                text: '<i class="fas fa-print me-1"></i>Print'
                            },
                            {
                                extend: 'colvis',
                                className: 'btn btn-sm btn-outline-dark',
                                text: '<i class="fas fa-columns me-1"></i>Columns'
                            }
                        ],
                        "language": {
                            "search": "_INPUT_",
                            "searchPlaceholder": "Search...",
                            "lengthMenu": "Show _MENU_ entries",
                            "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                            "infoEmpty": "Showing 0 to 0 of 0 entries",
                            "infoFiltered": "(filtered from _MAX_ total entries)",
                            "zeroRecords": "No matching records found",
                            "paginate": {
                                "first": "First",
                                "last": "Last",
                                "next": "Next",
                                "previous": "Previous"
                            },
                            "processing": '<div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div>'
                        },
                        "order": [[1, 'asc']],
                        "drawCallback": function(settings) {
                            // Initialize tooltips after table is drawn
                            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
                            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                                return new bootstrap.Tooltip(tooltipTriggerEl);
                            });

                            // Update badge colors and styles
                            $('.badge').each(function() {
                                var badge = $(this);
                                var text = badge.text().toLowerCase();

                                // Set badge colors based on content
                                if (text.includes('active') || text.includes('success') || text.includes('published')) {
                                    badge.addClass('bg-success bg-opacity-10 text-success border border-success border-opacity-25');
                                } else if (text.includes('inactive') || text.includes('warning') || text.includes('draft')) {
                                    badge.addClass('bg-warning bg-opacity-10 text-warning border border-warning border-opacity-25');
                                } else if (text.includes('suspended') || text.includes('danger') || text.includes('archived')) {
                                    badge.addClass('bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25');
                                } else if (text.includes('admin')) {
                                    badge.addClass('bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25');
                                } else if (text.includes('editor')) {
                                    badge.addClass('bg-warning bg-opacity-10 text-warning border border-warning border-opacity-25');
                                } else if (text.includes('user')) {
                                    badge.addClass('bg-success bg-opacity-10 text-success border border-success border-opacity-25');
                                } else if (text.includes('info')) {
                                    badge.addClass('bg-info bg-opacity-10 text-info border border-info border-opacity-25');
                                }
                            });
                        },
                        "initComplete": function(settings, json) {
                            // Add custom classes after initialization
                            $(this).closest('.dataTables_wrapper').find('.dataTables_length').addClass('mb-3');
                            $(this).closest('.dataTables_wrapper').find('.dataTables_filter').addClass('mb-3');

                            // Move buttons to a better position
                            var buttons = $(this).closest('.dataTables_wrapper').find('.dt-buttons');
                            if (buttons.length) {
                                buttons.addClass('mb-3');
                            }
                        }
                    }).buttons().container().appendTo('#' + tableId + '_wrapper .col-md-6:eq(0)');
                }
            });

            // Common notification function
            window.showNotification = function(message, type = 'info') {
                const alertClass = type === 'success' ? 'alert-success' :
                                 type === 'error' ? 'alert-danger' :
                                 type === 'warning' ? 'alert-warning' : 'alert-info';

                const icon = type === 'success' ? 'check-circle' :
                            type === 'error' ? 'exclamation-circle' :
                            type === 'warning' ? 'exclamation-triangle' : 'info-circle';

                const notification = $(`
                    <div class="alert ${alertClass} alert-dismissible fade show position-fixed shadow-lg"
                         style="top: 20px; right: 20px; z-index: 1060; min-width: 300px; max-width: 400px;"
                         role="alert">
                        <div class="d-flex">
                            <i class="fas fa-${icon} me-3 fs-4"></i>
                            <div class="flex-grow-1">
                                <p class="mb-0">${message}</p>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    </div>
                `);

                $('body').append(notification);

                setTimeout(() => {
                    notification.alert('close');
                }, 5000);
            };

            // Common confirmation function
            window.confirmAction = function(message) {
                return confirm(message);
            };

            // Initialize all tooltips
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });

            // Auto-hide alerts after 5 seconds
            $('.alert:not(.alert-permanent)').delay(5000).fadeOut('slow');

            // Add row hover effect
            $('table').on('mouseenter', 'tbody tr', function() {
                $(this).addClass('table-active');
            }).on('mouseleave', 'tbody tr', function() {
                $(this).removeClass('table-active');
            });

            // Handle delete forms with confirmation
            $(document).on('submit', 'form[method="DELETE"]', function(e) {
                if (!confirm('Are you sure you want to delete this item?')) {
                    e.preventDefault();
                }
            });

            // Handle bulk delete forms
            $(document).on('submit', 'form[id*="bulk"]', function(e) {
                const checkedCount = $(this).find('input[type="checkbox"]:checked').length;
                if (checkedCount === 0) {
                    e.preventDefault();
                    showNotification('Please select at least one item.', 'warning');
                    return false;
                }
                return confirm(`Are you sure you want to delete ${checkedCount} selected item(s)?`);
            });

            // Select all functionality for tables
            $(document).on('click', '[id*="select-all"]', function() {
                const tableId = $(this).closest('table').attr('id');
                const isChecked = $(this).prop('checked');
                $(`#${tableId} tbody input[type="checkbox"]`).prop('checked', isChecked);
            });

            // Update select all when individual checkboxes change
            $(document).on('change', 'table tbody input[type="checkbox"]', function() {
                const tableId = $(this).closest('table').attr('id');
                const totalCheckboxes = $(`#${tableId} tbody input[type="checkbox"]`).length;
                const checkedCount = $(`#${tableId} tbody input[type="checkbox"]:checked`).length;

                $(`#${tableId} [id*="select-all"]`).prop('checked', totalCheckboxes === checkedCount);
            });
        });
    </script>
</body>
</html>
