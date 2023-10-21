<div class="navbar bg-color4 fixed shadow-lg">
    <div  class="flex-1 max-w-7xl px-1 sm:px-6 lg:px-8">
        @auth
        <a href="{{ route('home') }}"  class=" font-bold px-2 text-xl">
        @else
        <a href="{{ route('index') }}"  class=" font-bold px-2 text-xl">
        @endauth
            <p class="text-color1">PerCilok
            <span class="text-slate-950">Foods</span>.</p>
        </a>
    </div>
    <div class="flex-none">

            {{-- Cartlist --}}
            @auth
            @if (Auth()->user()->usertype === 'user')
            <a href="{{ route('cartlist')}}">
                <div  tabindex="0" class="btn btn-ghost btn-circle  mr-3">
                    <div class="indicator">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                        <span class="badge badge-base border-none text-white bg-color1 indicator-item">8</span>
                    </div>
                </div>
            </a>
            @endif
            @endauth

        @auth    
        <div class="dropdown dropdown-end ">
            
            {{-- Avatar Logo --}}
            <div class="flex group">
                @if (isset(Auth()->user()->avatar))  
                <label tabindex="0" class="btn group-hover:cursor-pointer  focus:ring-2 focus:ring-color2 btn-circle avatar">
                    <div class="rounded-full">
                        <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="user photo"></img>
                    </div>
                </label>
                @else
                <div tabindex="0" class="btn group-hover:cursor-pointer  focus:ring-2 focus:ring-color2 btn-circle avatar">
                    <label class="rounded-full">
                        <i data-feather="user"></i> 
                    </label>
                </div>
                @endif

                {{-- Username --}}
                <label tabindex="0" class="group-hover:cursor-pointer pt-3 pl-4 text-black hidden md:block ">{{ Auth::user()->name }}</label>
            </div>

            {{-- Dropdown Avatar --}}
            <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-color4 text-black rounded-box w-52">
                <li><a href="{{route('profile.edit')}}" class="hover:text-color1 active:bg-color3 focus:bg-color3 ">Profile Settings</a></li>
                <li><form method="POST" action="{{ route('logout') }}" class="hover:text-color1">
                    @csrf

                    <a href="{{route('logout')}}"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();" >
                        {{ __('Log Out') }}
                    </a>
                </form></li>
            </ul>
        </div>

        {{-- Non logged-in --}}
        @else
        <div class="flex-none md:px-12 ">
            <a href="{{ route('login') }}" class="pr-1 font-bold text-black hover:text-grey-400">Login</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="btn border-none bg-color1 hover:bg-red-700 text-base text-white capitalize rounded-full ml-4 font-semibold ">Register</a>
            @endif
        </div>
        @endauth
    </div>
</div>

