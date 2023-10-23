<section>
    <header>
        <h2 class="text-lg font-bold text-black">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-black">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>


    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="f_name" :value="__('First Name')" />
            <x-text-input id="f_name" name="f_name" type="text" class="mt-1 block w-full" :value="old('f_name', $user->f_name)" required autofocus autocomplete="f_name" />
            <x-input-error class="mt-2" :messages="$errors->get('f_name')" />
        </div>
        <div>
            <x-input-label for="l_name" :value="__('Last Name')" />
            <x-text-input id="l_name" name="l_name" type="text" class="mt-1 block w-full" :value="old('l_name', $user->l_name)" required autofocus autocomplete="l_name" />
            <x-input-error class="mt-2" :messages="$errors->get('l_name')" />
        </div>
        <div>
            <x-input-label for="date_of_birth" :value="__('Birthday')" />
            <x-text-input id="date_of_birth" name="date_of_birth" type="date" class="mt-1 block w-full" :value="old('date_of_birth', $user->date_of_birth)" required autofocus autocomplete="date_of_birth" />
            <x-input-error class="mt-2" :messages="$errors->get('date_of_birth')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-black"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
