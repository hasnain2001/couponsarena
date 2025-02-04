<section class="py-1 ">
    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white">
            <h2 class="text-lg mb-0">{{ __('Delete Account') }}</h2>
        </div>
        <div class="card-body">
            <p class="text-muted">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
            </p>

            <button 
                type="button" 
                class="btn btn-dark" 
                data-bs-toggle="modal" 
                data-bs-target="#confirmDeleteModal"
            >
                {{ __('Delete Account') }}
            </button>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade " id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark text-white">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">{{ __('Are you sure you want to delete your account?') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body bg-dark">
                    <p class="text-muted">
                        {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                    </p>
                    <form method="post" action="{{ route('profile.destroy') }}" class="bg-dark">
                        @csrf
                        @method('delete')

                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input 
                                type="password" 
                                class="form-control" 
                                id="password" 
                                name="password" 
                                placeholder="{{ __('Enter your password') }}" 
                                required
                            >
                            @if ($errors->userDeletion->get('password'))
                                <div class="text-dark mt-1">
                                    {{ $errors->userDeletion->get('password')[0] }}
                                </div>
                            @endif
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">
                                {{ __('Cancel') }}
                            </button>
                            <button type="submit" class="btn btn-dark">
                                {{ __('Delete Account') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
