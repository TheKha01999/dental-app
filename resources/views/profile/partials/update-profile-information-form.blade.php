{{-- <section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)"
                required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)"
                required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification"
                            class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>
                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section> --}}


{{-- <form id="send-verification" method="post" action="{{ route('verification.send') }}">
    @csrf
</form>

<form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
    @csrf
    @method('patch')
    <div>
        <label class="block font-medium text-sm text-gray-700" for="name">Name</label>
        <input type="text" name="name" id="name"
            class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
            value="{{ old('name', $user->name) }}" autofocus>
        @error('name')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label class="block font-medium text-sm text-gray-700" for="email">Email</label>
        <input type="email" name="email" id="email"
            class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
            value="{{ old('email', $user->email) }}">
        @error('email')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
        @enderror

        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
            <div>
                <p class="text-sm mt-2 text-gray-800">
                    {{ __('Your email address is unverified.') }}

                    <button form="send-verification"
                        class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </p>
                @if (session('status') === 'verification-link-sent')
                    <p class="mt-2 font-medium text-sm text-green-600">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                @endif
            </div>
        @endif
    </div>
    <div class="flex items-center gap-4">
        
        <button class="btn btn-primary mt-3 px-0 py-1 " style="height: 40px; width:20px; background-color: #21cdc0;"
            type="submit">Save</button>
        @if (session('status') === 'profile-updated')
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                class="text-sm text-gray-600">{{ __('Saved.') }}</p>
        @endif
    </div>
</form> --}}


<form id="send-verification" method="post" action="{{ route('verification.send') }}">
    @csrf
</form>

<form method="post" action="{{ route('profile.update') }}" class="form-horizontal" role="form">
    @csrf
    @method('patch')
    <div class="form-group">
        <label class="col-lg-3 control-label" for="name">Name:</label>
        <div class="col-lg-8">
            <input name="name" id="name" class="form-control" type="text" value="{{ $user->name }}"
                autofocus>
            @error('name')
                <div class="text-danger mt-2">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-3 control-label" for="email">Email:</label>
        <div class="col-lg-8">
            <input class="form-control" type="text" name="email" id="email" value="{{ $user->email }}">
            @error('email')
                <div class="text-danger mt-2">
                    {{ $message }}
                </div>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        Your email address is unverified
                        <button form="send-verification" class="underline text-sm text-gray-600 ">
                            Click here to re-send the verification email.
                        </button>
                    </p>
                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            A new verification link has been sent to your email address.
                        </p>
                    @endif
                </div>
            @endif
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-3 control-label" for="phone">Phone:</label>
        <div class="col-lg-8">
            <input name="phone" id="phone" class="form-control" type="text" value="{{ $user->phone }}">
            @error('phone')
                <div class="text-danger mt-2">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>

    <button class="mt-3 btn btn__secondary btn__rounded" type="submit">Save</button>
</form>



{{-- <label for="name">Name</label>
            <input type="text" name="name" id="name" class="mt-1 block w-full"
                value="{{ old('name', $user->name) }}" required autofocus>
            @error('name')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror --}}

{{-- <label for="email">Email</label>
            <input type="email" name="email" id="email" class="mt-1 block w-full"
                value="{{ old('email', $user->email) }}" required>
            @error('email')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror --}}
{{-- <button class="btn btn-primary mt-2" type="submit">Save</button> --}}
