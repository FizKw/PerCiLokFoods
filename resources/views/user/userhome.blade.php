<x-app-layout>
    
        @if($product->count() > 0)
        <x-foodlist>
        @foreach($product as $rs)
                <div  class="card w-96 bg-color4 border border-color2 transition transform duration-700 hover:shadow-xl hover:scale-105 rounded-lg relative">
                    <figure class="px-10 pt-12  mx-auto">
                      <img src="{{ asset('storage/' . $rs->food_image) }}" alt="{{ $rs->food }}"  class="object-fill w-96 h-56 rounded-xl" />
                    </figure>
                    <div class="card-body items-center text-center">
                        <h2 class="card-title">
                            {{ $rs->food }}
                            <div class="badge badge-sm bg-color3">{{ $rs->category }}</div>
                        </h2>
                      <p>{{ $rs->description }}</p>
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