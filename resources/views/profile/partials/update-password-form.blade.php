{{-- <section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>
    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')
        <div>
            <x-input-label for="current_password" :value="__('Current Password')" />
            <x-text-input id="current_password" name="current_password" type="password" class="mt-1 block w-full"
                autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password" :value="__('New Password')" />
            <x-text-input id="password" name="password" type="password" class="mt-1 block w-full"
                autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" name="password_confirmation" type="password"
                class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section> --}}


<form method="post" action="{{ route('password.update') }}" class="form-horizontal" role="form">
    @csrf
    @method('put')
    <div class="form-group">
        <label class="col-lg-3 control-label" for="current_password">Current Password:</label>
        <div class="col-lg-8">
            <input type="password" name="current_password" id="current_password"class="form-control">
            @php
                $messages = $errors->updatePassword->get('current_password');
            @endphp
            @if ($messages)
                @foreach ((array) $messages as $message)
                    <div class="text-danger mt-2">
                        {{ $message }}
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-3 control-label" for="password">New Password:</label>
        <div class="col-lg-8">
            <input class="form-control" type="password" name="password" id="password">
            @php
                $messages = $errors->updatePassword->get('password');
            @endphp
            @if ($messages)
                @foreach ((array) $messages as $message)
                    <div class="text-danger mt-2">
                        {{ $message }}
                    </div>
                @endforeach
            @endif
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-3 control-label" for="password_confirmation">Confirm Password:</label>
        <div class="col-lg-8">
            <input class="form-control" type="password" name="password_confirmation" id="password_confirmation">
            @php
                $messages = $errors->updatePassword->get('password_confirmation');
            @endphp
            @if ($messages)
                @foreach ((array) $messages as $message)
                    <div class="text-danger mt-2">
                        {{ $message }}
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    <button class="mt-3 btn btn__secondary btn__rounded" type="submit">Save</button>
</form>

{{-- moinhat --}}
{{-- <section>
    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')
        <div>
            <label for="current_password">Current Password</label>
            <input type="password" name="current_password" id="current_password"
                class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
            @php
                $messages = $errors->updatePassword->get('current_password');
            @endphp
            @if ($messages)
                @foreach ((array) $messages as $message)
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @endforeach
            @endif
        </div>

        <div>
            <label for="password">New Password</label>
            <input type="password" name="password" id="password"
                class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
            @php
                $messages = $errors->updatePassword->get('password');
            @endphp
            @if ($messages)
                @foreach ((array) $messages as $message)
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @endforeach
            @endif
        </div>

        <div>
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation"
                class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
            @php
                $messages = $errors->updatePassword->get('password_confirmation');
            @endphp
            @if ($messages)
                @foreach ((array) $messages as $message)
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @endforeach
            @endif
        </div>

        <div class="flex items-center gap-4">
            <button class="btn btn-primary mt-3 px-0 py-1 " style="height: 40px; width:20px; background-color: #21cdc0;"
                type="submit">Save</button>
            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section> --}}


{{-- <label for="current_password">Current Password</label>
            <input type="password" name="current_password" id="current_password" class="mt-1 block w-full">
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" /> --}}
{{-- <label for="password">New Password</label>
            <input type="password" name="password" id="password" class="mt-1 block w-full">
            @error('password')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror --}}
{{-- <label for="password_confirmation">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="mt-1 block w-full">
            @error('password_confirmation')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror --}}
{{-- <button class="mt-2 btn btn-primary">Save</button> --}}
