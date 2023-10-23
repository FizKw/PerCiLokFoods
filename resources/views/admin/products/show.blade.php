<x-app-layout>
    <section class="max-w-screen-xl mx-auto px-6 my-1 ">
        <div class="flex flex-col mx-auto justify-center items-center h-screen">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-10">

                    {{-- left side --}}
                    <div class="mx-auto lg:mx-2 order-2 md:order-1 lg:order-1 flex flex-col justify-center">
                        <h1 class="text-center md:text-left lg:text-left text-3xl lg:text-4xl capitalize font-semibold pb-4 text-gray-700 select-none">{{ $product->food }}</h1>
                        <p class="text-center md:text-left lg:text-left text-sm text-gray-500 leading-relaxed select-none">{{ $product->description }}</p>

                        {{--  price and quantity  --}}
                        <div class="flex items-center justify-center md:justify-start lg:justify-start space-x-6 pt-8">
                            <h1 class="text-3xl font-bold text-black select-none">Rp {{ $product->price }}</h1>
                        </div>

                        <div class="flex">
                        @if (Auth()->user()->usertype === 'user')
                            {{-- quantity --}}
                                <div class="flex items-center justify-center md:justify-start lg:justify-start mt-2 mr-4 py-2 space-x-6 rounded-full">
                                    <button><a href="#" type="button" class="text-2xl bg-color1 w-10 h-10 rounded-full text-white hover:scale-105 transform transition duration-500 cursor-pointer p-2"><i data-feather="minus"></i> </a></button>
                                    <span class="text-xl text-gray-700 select-none">1</span>
                                    <button><a href="#" type="button" class="text-2xl bg-color1 w-10 h-10 rounded-full text-white hover:scale-105 transform transition duration-500 cursor-pointer p-2"><i data-feather="plus"></i> </a></button>
                                </div>

                            {{--  add button   --}}
                            <div class="mt-2 mr-4 flex items-center justify-center md:justify-start lg:justify-start">
                                <button><a href="#" class="flex items-center space-x-3 bg-color1 px-4 py-3 text-white rounded-full ring-red-300 focus:outline-none focus:ring-4 transform transition duration-700 hover:scale-105"><i data-feather="shopping-cart"></i><span class="text-xl">Add to cart</span></a></button>
                            </div>
                        @endif

                        {{-- home button --}}
                        <div class="mt-2 flex items-center justify-center md:justify-start lg:justify-start">
                            <button><a href="{{ route('home') }}" class="flex items-center space-x-3 bg-color4 px-4 py-3 text-black rounded-full  transform transition duration-700 hover:scale-105"><i data-feather="home"></i><span class="text-xl">Go to Home</span></a></button>
                        </div>
                    </div>
                        

                    </div>
                    {{-- right side --}}
                    <div class="order-1 md:order-2 lg:order-2">
                        <img src="{{ asset('storage/' . $product->food_image) }}" class="w-3/4 md:w-3/4 rounded lg:w-full mx-auto" alt="{{ $product->food }}" />
                    </div>
                </div>
            </div>
        

    </section>
</x-app-layout>