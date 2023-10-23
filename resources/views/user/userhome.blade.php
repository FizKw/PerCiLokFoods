<x-app-layout>
    <div class="hero min-h-screen relative" style="background-image: url(https://daisyui.com/images/stock/photo-1507358522600-9f71e620c44e.jpg);">
        <div class="hero-overlay bg-opacity-60"></div>
        <div class="hero-content text-center text-neutral-content">
          <div class="max-w-md">
            <h1 class="mb-5 text-5xl font-bold">Best food to fulfill your belly.</h1>
            <a href="#foodcart" class=" btn rounded-full bg-color1 hover:bg-red-400 text-white"> Get Started</a>
            <p id="foodcart" class="opacity-0 text-3xl absolute bottom-7">asdas</p>
          </div>
        </div>
      </div>  
        @if($product->count() > 0)
        <div class="mb-6"></div>
        <div class="flex items-center justify-center space-x-3 ">
          <button><a href="{{ route('category', 'Makanan') }}" class="btn rounded-full capitalize text-lg {{ $btnActive === 'Makanan' ? 'bg-color1 hover:bg-red-400 text-white' : '' }}">Makanan</a></button>
          <button><a href="{{ route('category', 'Minuman') }}" class="btn rounded-full capitalize text-lg {{ $btnActive === 'Minuman' ? 'bg-color1 hover:bg-red-400 text-white' : '' }}">Minuman</a></button>
          <button><a href="{{ route('category', 'Snack') }}" class="btn rounded-full capitalize text-lg {{ $btnActive === 'Snack' ? 'bg-color1 hover:bg-red-400 text-white' : '' }}">Snack</a></button>
        </div>
        
        <x-foodlist>
            @foreach($product as $rs)
            <div  class="card card-compact mx-auto w-96 lg:w-80 xl:w-96 mb-6 bg-color4 border border-color2 transition transform duration-700 shadow-md hover:shadow-xl hover:scale-105 rounded-lg relative">
                <a href="{{ route('products.show', $rs->id) }}">
                    <figure class="mx-auto"><img src="{{ asset('storage/' . $rs->food_image) }}" alt="{{ $rs->food }}" class="w-96 h-56 rounded-xl object-cover object-center" /></figure>
                    <div class="card-body text-center items-center">
                        <h2 class="card-title  text-2xl capitalize">{{ $rs->food }}
                            <span class="badge badge-sm bg-color3">{{ $rs->category }}</span>
                        </h2>
                        <p class="text-gray-900 items-center text-xl font-bold">Rp{{ $rs->price }}</p>
                        <div class="card-actions">
                            <button class="justify-end flex-end"><a href="{{ route('addtocart', $rs->id) }}" type="button" class="btn rounded-full capitalize text-lg bg-color1 hover:bg-red-400 text-white">Add</a></button>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </x-foodlist>
        @else 
                <td class="text-center" colspan="5">Product not found</td>
        @endif

        
@if(isset($scroll))
<script>
    
    var elementToScrollTo = document.getElementById("{{ $scroll }}");
    if (elementToScrollTo) {
        elementToScrollTo.scrollIntoView({ behavior: "instant"});
    }
</script>
@endif
</x-app-layout>