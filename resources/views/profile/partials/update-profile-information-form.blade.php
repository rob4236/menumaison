<section class="card border-0 shadow rounded-3 mb-4">
    <div class="card-header bg-primary text-white rounded-top">
        <h2 class="h5 mb-0">{{ __('Profile Information') }}</h2>
    </div>
    <div class="card-body">
        <p class="mb-4 text-dark">
            {{ __("Update your account's profile information and email address.") }}
        </p>

        <!-- Email Verification Form -->
        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
            @csrf
        </form>

        <!-- Update Profile Form -->
        <form method="post" action="{{ route('profile.update') }}">
            @csrf
            @method('patch')

            <!-- Name -->
            <div class="mb-3">
                <label for="name" class="form-label fw-bold">{{ __('Name') }}</label>
                <input id="name" name="name" type="text"
                       class="form-control bg-light border @error('name') is-invalid @enderror"
                       value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label fw-bold">{{ __('Email') }}</label>
                <input id="email" name="email" type="email"
                       class="form-control bg-light border @error('email') is-invalid @enderror"
                       value="{{ old('email', $user->email) }}" required autocomplete="username">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div class="mt-2">
                        <p class="text-dark small mb-2">
                            {{ __('Your email address is unverified.') }}
                            <button form="send-verification" class="btn btn-sm btn-outline-primary ms-2">
                                {{ __('Click here to re-send the verification email.') }}
                            </button>
                        </p>

                        @if (session('status') === 'verification-link-sent')
                            <div class="alert alert-success mt-2 py-1 px-2 small mb-0">
                                {{ __('A new verification link has been sent to your email address.') }}
                            </div>
                        @endif
                    </div>
                @endif
            </div>

            <!-- Save button -->
            <div class="d-flex align-items-center">
                <button type="submit" class="btn btn-primary">
                    {{ __('Save') }}
                </button>

                @if (session('status') === 'profile-updated')
                    <span class="ms-3 text-success small">
                        {{ __('Saved.') }}
                    </span>
                @endif
            </div>
        </form>
    </div>
</section>
