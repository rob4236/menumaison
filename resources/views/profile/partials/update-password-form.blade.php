<section class="card border-0 shadow rounded-3 mb-4">
    <div class="card-header bg-primary text-white rounded-top">
        <h2 class="h5 mb-0">{{ __('Update Password') }}</h2>
    </div>
    <div class="card-body">
        <p class="mb-4 text-dark">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>

        <form method="post" action="{{ route('password.update') }}">
            @csrf
            @method('put')

            <!-- Current Password -->
            <div class="mb-3">
                <label for="current_password" class="form-label fw-bold">{{ __('Current Password') }}</label>
                <div class="input-group">
                    <input id="current_password" name="current_password" type="password"
                           class="form-control bg-light border @error('current_password', 'updatePassword') is-invalid @enderror"
                           autocomplete="current-password">
                    <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('current_password', this)">
                        <i class="bi bi-eye"></i>
                    </button>
                    @error('current_password', 'updatePassword')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- New Password -->
            <div class="mb-3">
                <label for="password" class="form-label fw-bold">{{ __('New Password') }}</label>
                <div class="input-group">
                    <input id="password" name="password" type="password"
                           class="form-control bg-light border @error('password', 'updatePassword') is-invalid @enderror"
                           autocomplete="new-password">
                    <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('password', this)">
                        <i class="bi bi-eye"></i>
                    </button>
                    @error('password', 'updatePassword')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Confirm Password -->
            <div class="mb-3">
                <label for="password_confirmation" class="form-label fw-bold">{{ __('Confirm Password') }}</label>
                <div class="input-group">
                    <input id="password_confirmation" name="password_confirmation" type="password"
                           class="form-control bg-light border"
                           autocomplete="new-password">
                    <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('password_confirmation', this)">
                        <i class="bi bi-eye"></i>
                    </button>
                </div>
            </div>

            <div class="d-flex align-items-center">
                <button type="submit" class="btn btn-primary">
                    {{ __('Save') }}
                </button>

                @if (session('status') === 'password-updated')
                    <span class="ms-3 text-success small">
                        {{ __('Saved.') }}
                    </span>
                @endif
            </div>
        </form>
    </div>
</section>
