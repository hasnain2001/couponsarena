@extends('admin.layouts.master')

@section('title', 'Create Blog')

@section('main-content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="page-header d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">
                <i class="fas fa-plus-circle text-primary me-2"></i>Create New Blog
            </h1>
            <p class="text-muted mb-0">Fill in the details to create a new blog post</p>
        </div>
        <div>
            <a href="{{ route('admin.blog.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-2"></i>Back to Blogs
            </a>
        </div>
    </div>

    <!-- Main Form Card -->
    <div class="row justify-content-center">
        <div class="col-xl-10">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white py-3">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="icon-circle bg-primary bg-opacity-10 text-primary">
                                <i class="fas fa-edit fs-4"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5 class="mb-1">Blog Information</h5>
                            <p class="text-muted small mb-0">Enter blog details below</p>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <!-- Success Message -->
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-check-circle me-3 fs-4"></i>
                            <div>
                                <h5 class="alert-heading mb-1">Success!</h5>
                                <p class="mb-0">Blog created successfully.</p>
                            </div>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    @endif

                    <!-- Validation Errors -->
                    @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-exclamation-circle me-3 fs-4"></i>
                            <div>
                                <h5 class="alert-heading mb-1">Validation Error(s)</h5>
                                <ul class="mb-0 ps-3">
                                    @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    @endif

                    <form method="POST" action="{{ route('admin.blog.store') }}" enctype="multipart/form-data" id="blogForm">
                        @csrf

                        <!-- Main Content Row -->
                        <div class="row">
                            <!-- Left Column - Main Content -->
                            <div class="col-lg-8">
                                <!-- Title & Slug -->
                                <div class="card border-0 shadow-sm mb-4">
                                    <div class="card-header bg-light">
                                        <h6 class="mb-0"><i class="fas fa-heading me-2"></i>Basic Information</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-8 mb-3">
                                                <label for="title" class="form-label fw-medium">
                                                    <i class="fas fa-pen me-1 text-primary"></i>Title <span class="text-danger">*</span>
                                                </label>
                                                <input type="text"
                                                       class="form-control form-control-lg @error('title') is-invalid @enderror"
                                                       name="title"
                                                       id="title"
                                                       value="{{ old('title') }}"
                                                       required
                                                       placeholder="Enter blog title">
                                                @error('title')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-4 mb-3">
                                                <label for="language_id" class="form-label fw-medium">
                                                    <i class="fas fa-language me-1 text-primary"></i>Language <span class="text-danger">*</span>
                                                </label>
                                                <select name="language_id"
                                                        id="language_id"
                                                        class="form-select form-select-lg @error('language_id') is-invalid @enderror"
                                                        required>
                                                    <option value="" disabled {{ old('language_id') ? '' : 'selected' }}>Select Language</option>
                                                    @foreach ($langs as $lang)
                                                    <option value="{{ $lang->id }}" {{ old('language_id') == $lang->id ? 'selected' : '' }}>
                                                        {{ strtoupper($lang->code) }} - {{ $lang->name ?? $lang->code }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                @error('language_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-12 mb-3">
                                                <label for="slug" class="form-label fw-medium">
                                                    <i class="fas fa-link me-1 text-primary"></i>Slug / URL <span class="text-danger">*</span>
                                                </label>
                                                <div class="input-group input-group-lg">
                                                    <span class="input-group-text bg-light">/blog/</span>
                                                    <input type="text"
                                                           class="form-control @error('slug') is-invalid @enderror"
                                                           name="slug"
                                                           id="slug"
                                                           value="{{ old('slug') }}"
                                                           required
                                                           placeholder="blog-url-slug">
                                                    <button class="btn btn-outline-secondary" type="button" id="generateSlug">
                                                        <i class="fas fa-magic"></i>
                                                    </button>
                                                </div>
                                                <div id="slug-message" class="form-text mt-1">
                                                    <i class="fas fa-info-circle me-1"></i>URL-friendly version of the title
                                                </div>
                                                @error('slug')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Blog Content -->
                                <div class="card border-0 shadow-sm mb-4">
                                    <div class="card-header bg-light d-flex justify-content-between align-items-center">
                                        <h6 class="mb-0"><i class="fas fa-edit me-2"></i>Blog Content</h6>
                                        <small class="text-muted"><i class="fas fa-lightbulb me-1"></i>Rich text editor</small>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="editor" class="form-label fw-medium">
                                                <i class="fas fa-align-left me-1 text-primary"></i>Main Content <span class="text-danger">*</span>
                                            </label>
                                            <textarea id="editor"
                                                      name="content"
                                                      class="form-control @error('content') is-invalid @enderror"
                                                      rows="10">{{ old('content') }}</textarea>
                                            @error('content')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Meta Information -->
                                <div class="card border-0 shadow-sm">
                                    <div class="card-header bg-light">
                                        <h6 class="mb-0"><i class="fas fa-search me-2"></i>SEO Meta Information</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="meta_title" class="form-label fw-medium">
                                                    <i class="fas fa-tag me-1 text-primary"></i>Meta Title
                                                </label>
                                                <input type="text"
                                                       class="form-control @error('meta_title') is-invalid @enderror"
                                                       name="meta_title"
                                                       id="meta_title"
                                                       value="{{ old('meta_title') }}"
                                                       placeholder="SEO title for search engines">
                                                @error('meta_title')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="meta_keyword" class="form-label fw-medium">
                                                    <i class="fas fa-key me-1 text-primary"></i>Meta Keywords
                                                </label>
                                                <input type="text"
                                                       class="form-control @error('meta_keyword') is-invalid @enderror"
                                                       name="meta_keyword"
                                                       id="meta_keyword"
                                                       value="{{ old('meta_keyword') }}"
                                                       placeholder="Keywords separated by commas">
                                                @error('meta_keyword')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-12 mb-3">
                                                <label for="meta_description" class="form-label fw-medium">
                                                    <i class="fas fa-file-alt me-1 text-primary"></i>Meta Description
                                                </label>
                                                <textarea name="meta_description"
                                                          id="meta_description"
                                                          class="form-control @error('meta_description') is-invalid @enderror"
                                                          rows="3"
                                                          placeholder="Brief description for search results">{{ old('meta_description') }}</textarea>
                                                <div class="form-text">Recommended: 150-160 characters</div>
                                                @error('meta_description')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-12 mb-3">
                                                <label for="meta_tag" class="form-label fw-medium">
                                                    <i class="fas fa-tags me-1 text-primary"></i>Meta Tags
                                                </label>
                                                <input type="text"
                                                       class="form-control @error('meta_tag') is-invalid @enderror"
                                                       name="meta_tag"
                                                       id="meta_tag"
                                                       value="{{ old('meta_tag') }}"
                                                       placeholder="Tags separated by commas">
                                                @error('meta_tag')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Right Column - Sidebar -->
                            <div class="col-lg-4">
                                <!-- Image Upload -->
                                <div class="card border-0 shadow-sm mb-4">
                                    <div class="card-header bg-light">
                                        <h6 class="mb-0"><i class="fas fa-image me-2"></i>Featured Image</h6>
                                    </div>
                                    <div class="card-body text-center">
                                        <div class="image-upload-area mb-3" id="imageUploadArea">
                                            <div class="upload-placeholder rounded border-3 border-dashed p-5">
                                                <i class="fas fa-cloud-upload-alt fa-3x text-muted mb-3"></i>
                                                <p class="text-muted mb-2">Drag & drop or click to upload</p>
                                                <p class="text-muted small">Recommended: 1200×630 pixels</p>
                                            </div>
                                            <input type="file"
                                                   class="form-control d-none"
                                                   name="category_image"
                                                   id="blog_image"
                                                   accept="image/*"
                                                   required>
                                        </div>

                                        <div id="imagePreview" class="mb-3">
                                            <!-- Preview will appear here -->
                                        </div>

                                        <div class="form-text">
                                            <i class="fas fa-info-circle me-1"></i>Upload a high-quality featured image
                                        </div>
                                        @error('category_image')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Category & Settings -->
                                <div class="card border-0 shadow-sm mb-4">
                                    <div class="card-header bg-light">
                                        <h6 class="mb-0"><i class="fas fa-cog me-2"></i>Settings</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="category_id" class="form-label fw-medium">
                                                <i class="fas fa-folder me-1 text-primary"></i>Category <span class="text-danger">*</span>
                                            </label>
                                            <select class="form-select @error('category') is-invalid @enderror"
                                                    name="category"
                                                    id="category_id"
                                                    required>
                                                <option value="">Select Category</option>
                                                @foreach ($categories as $category)
                                                <option value="{{ $category->slug }}" {{ old('category') == $category->slug ? 'selected' : '' }}>
                                                    {{ ucfirst($category->slug) }}
                                                </option>
                                                @endforeach
                                            </select>
                                            @error('category')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input"
                                                       type="checkbox"
                                                       name="top"
                                                       id="top"
                                                       value="1"
                                                       {{ old('top') ? 'checked' : '' }}
                                                       role="switch">
                                                <label class="form-check-label fw-medium" for="top">
                                                    <i class="fas fa-star me-1 text-warning"></i>Mark as Top Blog
                                                </label>
                                            </div>
                                            <div class="form-text">
                                                <i class="fas fa-info-circle me-1"></i>Featured on homepage
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Status & Actions -->
                                <div class="card border-0 shadow-sm">
                                    <div class="card-header bg-light">
                                        <h6 class="mb-0"><i class="fas fa-paper-plane me-2"></i>Publish</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-grid gap-2">
                                            <button type="submit" class="btn btn-primary btn-lg">
                                                <i class="fas fa-save me-2"></i>Create Blog
                                            </button>
                                            <button type="reset" class="btn btn-outline-secondary">
                                                <i class="fas fa-redo me-2"></i>Reset Form
                                            </button>
                                            <a href="{{ route('admin.blog.index') }}" class="btn btn-outline-danger">
                                                <i class="fas fa-times me-2"></i>Cancel
                                            </a>
                                        </div>

                                        <div class="mt-3 text-center">
                                            <small class="text-muted">
                                                <i class="fas fa-clock me-1"></i>Created automatically
                                            </small>
                                        </div>
                                    </div>
                                </div>

                                <!-- Quick Tips -->
                                <div class="card border-0 shadow-sm mt-4">
                                    <div class="card-header bg-light">
                                        <h6 class="mb-0"><i class="fas fa-lightbulb me-2"></i>Quick Tips</h6>
                                    </div>
                                    <div class="card-body">
                                        <ul class="list-unstyled mb-0">
                                            <li class="mb-2">
                                                <i class="fas fa-check-circle text-success me-2"></i>
                                                <small>Use clear, descriptive titles</small>
                                            </li>
                                            <li class="mb-2">
                                                <i class="fas fa-check-circle text-success me-2"></i>
                                                <small>Add relevant images for engagement</small>
                                            </li>
                                            <li class="mb-2">
                                                <i class="fas fa-check-circle text-success me-2"></i>
                                                <small>Optimize for SEO with keywords</small>
                                            </li>
                                            <li>
                                                <i class="fas fa-check-circle text-success me-2"></i>
                                                <small>Categorize properly for organization</small>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    /* Custom Styles for Blog Create Form */
    .icon-circle {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .border-dashed {
        border-style: dashed !important;
    }

    .image-upload-area {
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .image-upload-area:hover {
        border-color: var(--primary-color) !important;
        background-color: rgba(67, 97, 238, 0.05);
    }

    .upload-placeholder {
        transition: all 0.3s ease;
    }

    .upload-placeholder:hover {
        transform: translateY(-2px);
    }

    .image-preview {
        max-width: 100%;
        border-radius: 0.5rem;
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    .image-preview:hover {
        transform: scale(1.02);
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
    }

    .form-switch .form-check-input {
        width: 3em;
        height: 1.5em;
    }

    .form-switch .form-check-input:checked {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
    }

    .card {
        border-radius: 0.75rem;
        overflow: hidden;
    }

    .card-header {
        border-bottom: 1px solid rgba(0,0,0,0.05);
        padding: 1rem 1.25rem;
    }

    .card-body {
        padding: 1.5rem;
    }

    .form-control-lg, .form-select-lg {
        font-size: 1rem;
        padding: 0.75rem 1rem;
    }

    .btn-lg {
        padding: 0.75rem 1.5rem;
        font-size: 1rem;
        font-weight: 500;
    }

    /* Form control focus states */
    .form-control:focus, .form-select:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.25rem rgba(67, 97, 238, 0.25);
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .page-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 1rem;
        }

        .btn-lg {
            width: 100%;
        }

        .card-body {
            padding: 1rem;
        }

        .input-group-lg {
            flex-wrap: wrap;
        }

        .input-group-lg .input-group-text {
            width: 100%;
            justify-content: center;
            margin-bottom: 0.5rem;
        }
    }

    /* Animation for alerts */
    .alert {
        animation: slideIn 0.3s ease;
    }

    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Loading animation for slug check */
    .loading {
        display: inline-block;
        width: 20px;
        height: 20px;
        border: 2px solid #f3f3f3;
        border-top: 2px solid var(--primary-color);
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>
@endpush

@push('scripts')
<script>
    $(document).ready(function() {
        // Initialize tooltips
        $('[data-bs-toggle="tooltip"]').tooltip();

        // Image upload area click handler
        $('#imageUploadArea').on('click', function() {
            $('#blog_image').click();
        });

        // Image preview functionality
        $('#blog_image').on('change', function() {
            var file = this.files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function(event) {
                    var preview = `
                        <div class="image-preview-container position-relative">
                            <img src="${event.target.result}"
                                 class="img-fluid rounded image-preview mb-2"
                                 alt="Preview">
                            <button type="button"
                                    class="btn btn-sm btn-danger position-absolute top-0 end-0 m-2 remove-image"
                                    data-bs-toggle="tooltip"
                                    title="Remove image">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    `;
                    $('#imagePreview').html(preview);
                    $('.upload-placeholder').hide();

                    // Re-initialize tooltips
                    $('[data-bs-toggle="tooltip"]').tooltip();
                }
                reader.readAsDataURL(file);
            }
        });

        // Remove image preview
        $(document).on('click', '.remove-image', function() {
            $('#blog_image').val('');
            $('#imagePreview').html('');
            $('.upload-placeholder').show();
        });

        // Generate slug from title
        $('#generateSlug').on('click', function() {
            var title = $('#title').val();
            if (title) {
                var slug = title.toLowerCase()
                    .replace(/[^\w\s]/gi, '')
                    .replace(/\s+/g, '-')
                    .replace(/--+/g, '-')
                    .trim();
                $('#slug').val(slug);
                checkSlugExistence(slug);
            }
        });

        // Auto-generate slug on title change
        $('#title').on('input', function() {
            var title = $(this).val();
            var slug = title.toLowerCase()
                .replace(/[^\w\s]/gi, '')
                .replace(/\s+/g, '-')
                .replace(/--+/g, '-')
                .trim();
            $('#slug').val(slug);
            checkSlugExistence(slug);
        });

        // Check slug existence
        function checkSlugExistence(slug) {
            if (!slug) {
                $('#slug-message').html('<i class="fas fa-info-circle me-1"></i>Please enter a slug').removeClass('text-success text-danger').addClass('text-muted');
                return;
            }

            $('#slug-message').html('<div class="loading me-2"></div>Checking...').removeClass('text-success text-danger').addClass('text-muted');

            $.ajax({
                url: '{{ route('admin.blog.check.slug') }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    slug: slug
                },
                success: function(response) {
                    if (response.exists) {
                        $('#slug-message').html('<i class="fas fa-times-circle me-1"></i>Blog with this slug already exists').removeClass('text-success text-muted').addClass('text-danger');
                        $('#slug').addClass('is-invalid');
                    } else {
                        $('#slug-message').html('<i class="fas fa-check-circle me-1"></i>Slug is available').removeClass('text-danger text-muted').addClass('text-success');
                        $('#slug').removeClass('is-invalid');
                    }
                },
                error: function() {
                    $('#slug-message').html('<i class="fas fa-exclamation-triangle me-1"></i>Error checking slug').removeClass('text-success text-muted').addClass('text-danger');
                }
            });
        }

        // Check slug on manual input
        $('#slug').on('keyup', function() {
            var slug = $(this).val();
            checkSlugExistence(slug);
        });

        // Auto-fill meta title from blog title
        $('#title').on('blur', function() {
            if ($('#meta_title').val() === '') {
                $('#meta_title').val($(this).val());
            }
        });

        // Auto-fill meta description from first 160 chars of content
        $('#editor').on('blur', function() {
            if ($('#meta_description').val() === '') {
                var content = $(this).val().replace(/<[^>]*>/g, '').substring(0, 160);
                $('#meta_description').val(content);
            }
        });

        // Character counter for meta description
        $('#meta_description').on('input', function() {
            var length = $(this).val().length;
            var counter = $(this).next('.form-text');
            if (counter.length === 0) {
                $(this).after('<div class="form-text character-count"></div>');
                counter = $(this).next('.character-count');
            }

            var color = 'text-muted';
            if (length < 120) {
                color = 'text-warning';
            } else if (length > 160) {
                color = 'text-danger';
            }

            counter.html(`<i class="fas fa-ruler me-1"></i>${length}/160 characters <span class="${color}">(${160 - length} remaining)</span>`);
        }).trigger('input');

        // Form submission validation
        $('#blogForm').on('submit', function(e) {
            var title = $('#title').val();
            var slug = $('#slug').val();
            var category = $('#category_id').val();
            var language = $('#language_id').val();
            var image = $('#blog_image').val();
            var content = $('#editor').val();

            var isValid = true;

            // Reset previous error states
            $('.is-invalid').removeClass('is-invalid');

            if (!title.trim()) {
                $('#title').addClass('is-invalid');
                isValid = false;
            }

            if (!slug.trim()) {
                $('#slug').addClass('is-invalid');
                isValid = false;
            }

            if (!category) {
                $('#category_id').addClass('is-invalid');
                isValid = false;
            }

            if (!language) {
                $('#language_id').addClass('is-invalid');
                isValid = false;
            }

            if (!image) {
                $('#imageUploadArea').addClass('border-danger');
                isValid = false;
            }

            if (!content.trim()) {
                $('#editor').addClass('is-invalid');
                isValid = false;
            }

            if (!isValid) {
                e.preventDefault();
                showNotification('Please fill in all required fields correctly.', 'warning');
                $('html, body').animate({
                    scrollTop: $('.is-invalid').first().offset().top - 100
                }, 500);
            }
        });

        // Notification function
        function showNotification(message, type = 'info') {
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
        }
    });
</script>
@endpush
