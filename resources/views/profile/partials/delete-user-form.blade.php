<section class="card border-0 shadow rounded-3 mb-4">
    <div class="card-header bg-danger text-white rounded-top">
        <h2 class="h5 mb-0">{{ __('Delete Account') }}</h2>
    </div>
    <div class="card-body">
        <p class="mb-4 text-dark">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>

        <form method="post" action="{{ route('profile.destroy') }}">
            @csrf
            @method('delete')

            <!-- Password -->
            <div class="mb-3">
                <label for="delete_password" class="form-label fw-bold">{{ __('Password') }}</label>
                <div class="input-group">
                    <input id="delete_password" name="password" type="password"
                           class="form-control bg-light border @error('password', 'userDeletion') is-invalid @enderror"
                           placeholder="{{ __('Enter your password to confirm') }}"
                           autocomplete="current-password">
                    <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('delete_password', this)">
                        <i class="bi bi-eye"></i>
                    </button>
                    @error('password', 'userDeletion')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="d-flex align-items-center">
                <button type="submit" class="btn btn-danger">
                    {{ __('Delete Account') }}
                </button>
            </div>
        </form>
    </div>
</section>
