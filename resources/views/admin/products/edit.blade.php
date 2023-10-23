<x-app-layout>
    
    <section class="py-12 px-4 lg:px-0 container mx-auto">
        <h2 class="text-center font-bold text-2xl p-3">Edit Menu</h2>
        <div class="p-12 sm:p-8 bg-color4 shadow rounded-lg">
            <div class="max-w-xl">
                <form action="{{ route('food.image', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                        <figure class=" flex-shrink-0 flex-grow-0 mx-8 w-72 h-56 justify-center rounded-lg ">
                            <img class="object-fill object-center  flex-shrink-0 flex-grow-0 h-full max-w-full mx-auto rounded-lg mb-4 justtify-center" src="{{ asset('storage/' . $product->food_image) }}" alt="">   
                        </figure>
                        <div class="mt-4">
                            <x-text-input type="file" name="food_image" placeholder="Food Image" />
                            <x-primary-button>Update</x-primary-button>
                        </div>
                </form>
                <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="pt-3">
                        <div class="mb-3">
                            <x-input-label class="form-label">Food</x-input-label>
                            <x-text-input type="text" name="food" class="mt-1 block w-full" placeholder="Food" value="{{ $product->food }}" />
                        </div>
                        <div class="mb-3">
                            <x-input-label class="form-label">Price</x-input-label>
                            <x-text-input type="text" name="price" class="mt-1 block w-full" placeholder="Price" value="{{ $product->price }}" />
                        </div>
                        <div class="input-group">
                            <select class="select select-bordered text-md text-black" name="category" required>
                                <option disabled selected hidden value="">Category</option>
                                <option value="Makanan" {{ $product->category === 'Makanan' ? 'selected' : '' }} >Makanan</option>
                                <option value="Minuman" {{ $product->category === 'Minuman' ? 'selected' : '' }} >Minuman</option>
                                <option value="Snack" {{ $product->category === 'Snack' ? 'selected' : '' }} >Snack</option>
                            </select>
                        </div>
                            <div class="mb-3 relative w-full min-w-[200px]">
                                <x-input-label class="mt-1 ">Description</x-input-label>
                                <textarea class="px-3 py-2.5 mt-1 block resize-none peer min-h-[100px] w-full h-full border  ring-1 ring-orange-950 bg-color3 focus:border-orange-950  focus:ring-orange-950 text-black rounded-sm mr-4" name="description" placeholder="Food Description" value="{{ $product->description }}"></textarea>
                            </div>
                        <div class="">
                            <x-primary-button class="btn btn-warning">Update</x-primary-button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-app-layout>