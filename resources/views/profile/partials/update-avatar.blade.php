<section>
    
    
    <header>
        <h2 class="text-lg pb-3 font-bold text-black">
            Avatar
        </h2>
        @if($user->avatar)
        <img width="150" height="150" class="rounded-full" src="{{ "/storage/$user->avatar" }}" alt="">
        @endif
        <p class="pt-4 text-sm text-black">
            Add or Update Avatar
        </p>
    </header>


    <form method="post" action="{{ route('profile.avatar') }}" class="space-y-2" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div>
            <x-text-input id="avatar" name="avatar" type="file" class="block w-full" required autofocus autocomplete="avatar" />
            <x-input-error class="" :messages="$errors->get('avatar')" />
        </div>

        
        <div class="flex items-center pt-4 gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('message'))
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-black"
                >{{ __('Avatar Updated.') }}</p>
            @endif
        </div>
    </form>
</section>
