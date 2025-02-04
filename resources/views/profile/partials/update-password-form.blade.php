
<style>
    .bg-dark {
    background-color: #212529 !important;
}

.bg-secondary {
    background-color: #343a40 !important;
}

.text-light {
    color: #f8f9fa !important;
}

.text-muted {
    color: #6c757d !important;
}

.btn-dark {
    background-color: #2d3036;
    border-color: #3b424d;
}

.btn-secondary {
    background-color: #6c757d;
    border-color: #6c757d;
}
</style>
<section>
    <header class="mb-4">
        <h2 class="h5 text-light">
            {{ __('Update Password') }}
        </h2>
        <p class="text-muted">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="p-4 border rounded shadow-sm bg-dark text-light">
        @csrf
        @method('put')

        <!-- Current Password -->
        <div class="mb-3">
            <label for="update_password_current_password" class="form-label">{{ __('Current Password') }}</label>
            <div class="input-group">
                <input 
                    type="password" 
                    id="update_password_current_password" 
                    name="current_password" 
                    class="form-control bg-secondary text-light border-secondary @error('current_password', 'updatePassword') is-invalid @enderror" 
                    autocomplete="current-password">
                <button type="button" class="btn btn-secondary toggle-password" data-target="update_password_current_password">
                    <i class="fas fa-eye"></i>
                </button>
            </div>
            @error('current_password', 'updatePassword')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- New Password -->
        <div class="mb-3">
            <label for="update_password_password" class="form-label">{{ __('New Password') }}</label>
            <div class="input-group">
                <input 
                    type="password" 
                    id="update_password_password" 
                    name="password" 
                    class="form-control bg-secondary text-light border-secondary @error('password', 'updatePassword') is-invalid @enderror" 
                    autocomplete="new-password">
                <button type="button" class="btn btn-secondary toggle-password" data-target="update_password_password">
                    <i class="fas fa-eye"></i>
                </button>
            </div>
            @error('password', 'updatePassword')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div class="mb-3">
            <label for="update_password_password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
            <div class="input-group">
                <input 
                    type="password" 
                    id="update_password_password_confirmation" 
                    name="password_confirmation" 
                    class="form-control bg-secondary text-light border-secondary @error('password_confirmation', 'updatePassword') is-invalid @enderror" 
                    autocomplete="new-password">
                <button type="button" class="btn btn-secondary toggle-password" data-target="update_password_password_confirmation">
                    <i class="fas fa-eye"></i>
                </button>
            </div>
            @error('password_confirmation', 'updatePassword')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Save Button -->
        <div class="">
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-dark">
                    {{ __('Save') }}
                </button>
              </div>
         

            @if (session('status') === 'password-updated')
                <p 
                    class="text-success mb-0 ms-3"
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                >
                    {{ __('Saved.') }}
                </p>
            @endif
        </div>
    </form>
</section>
<script>
    document.querySelectorAll('.toggle-password').forEach(button => {
        button.addEventListener('click', function () {
            const target = document.getElementById(this.dataset.target);
            const isPassword = target.type === 'password';
            target.type = isPassword ? 'text' : 'password';
            this.innerHTML = `<i class="fas fa-eye${isPassword ? '-slash' : ''}"></i>`;
        });
    });
</script>
