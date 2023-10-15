<section>
    
    
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            Avatar
        </h2>
        @if($user->avatar)
        <img width="150" height="150" class="rounded-full" src="{{ "/storage/$user->avatar" }}" alt="">
        @endif
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            Add or Update Avatar
        </p>
    </header>


    <form method="post" action="{{ route('profile.avatar') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" value="Avatar" />
            <x-text-input id="avatar" name="avatar" type="file" class="mt-1 block w-full" required autofocus autocomplete="avatar" />
            <!--  :value="old('avatar', $user->avatar)" -->
            <x-input-error class="mt-2" :messages="$errors->get('avatar')" />
        </div>

        
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('message'))
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Avatar Updated.') }}</p>
            @endif
        </div>
    </form>
</section>
