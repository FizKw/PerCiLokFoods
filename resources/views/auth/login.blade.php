<x-guest-layout>
    <!-- Session Status bisa diilangin -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Captcha')" />
            {!! captcha_img() !!}
            <x-text-input id="captcha" class="block mt-1 w-full" type="text" name="captcha" :value="old('captcha')" required autocomplete="captcha" />
            @if($errors->has('captcha'))
                <span class="text-danger">
                    Captcha Is Incorrect
                </span>
            @endif
        </div>

        <!-- Remember Me blm bisa wir -->
        <!-- <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded bg-color3 border-gray-300  text-color2 shadow-sm focus:text-color2 " name="remember">
                <span class="ml-2 text-sm text-black">{{ __('Remember me') }}</span>
            </label>
        </div> -->


        
        
        <div class="flex items-center justify-end mt-4">
            <!-- Blm ada fitur ini jadi ilangin bentar  -->
            <!--
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
            -->
            {{-- Register --}}
            <a class="underline text-sm text-black hover:text-white  rounded-md " href="{{ route('register') }}">
                {{ __('Create an account') }}
            </a>
            <x-primary-button class="ml-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
