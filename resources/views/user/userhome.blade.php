<x-app-layout>
    <div class="hero min-h-screen" style="background-image: url(https://daisyui.com/images/stock/photo-1507358522600-9f71e620c44e.jpg);">
        <div class="hero-overlay bg-opacity-60"></div>
        <div class="hero-content text-center text-neutral-content">
          <div class="max-w-md">
            <h1 class="mb-5 text-5xl font-bold">Best food to fulfill your belly.</h1>
            <button class="btn rounded-full bg-color1 hover:bg-red-400 text-white">Get Started</button>
          </div>
        </div>
      </div>  
        @if($product->count() > 0)
        <x-foodlist>
        @foreach($product as $rs)
                <div  class="card w-96 bg-color4 border border-color2 transition transform duration-700 hover:shadow-xl hover:scale-105 rounded-lg relative">
                    <figure class="px-10 pt-12  mx-auto">
                      <img src="{{ asset('storage/' . $rs->food_image) }}" alt="{{ $rs->food }}"  class="object-fill w-96 h-56 rounded-xl" />
                    </figure>
                    <div class="card-body items-center text-center">
                        <h2 class="card-title text-2xl">
                            {{ $rs->food }}
                            <div class="badge badge-sm bg-color3">{{ $rs->category }}</div>
                        </h2>
                      <p>{{ $rs->description }}</p>
                      <h2 class="text-gray-900 text-xl font-bold">Rp{{ $rs->price }}</h2>
                      <div class="card-action flex px-auto">
                        <button><a href="{{ route('products.show', $rs->id) }}" type="button" class=" flex btn rounded-full bg-color2 hover:text-black">See details</a></button>
                        <button><a href="{{ route('addtocart', $rs->id) }}" type="button" class="btn rounded-full bg-color1 text-white hover:text-black active:text-black">Add to cart</a></button>
                      </div>
                    </div>
                </div>
            @endforeach
        </x-foodlist>
        @else 
                <td class="text-center" colspan="5">Product not found</td>
        @endif

        

</x-app-layout>