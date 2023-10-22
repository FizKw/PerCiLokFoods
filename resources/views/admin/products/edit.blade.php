<x-app-layout>
    <form action="{{ route('food.image', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="grid md:grid-cols-2 gap-4 pt-10 place-items-center container">
            <img width="50" height="50" class="rounded-full" src="{{ asset('storage/' . $product->food_image) }}" alt="">   
            <div>
            <input type="file" name="food_image" placeholder="Food Image">
            <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
    <hr />
    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="grid md:grid-cols-2 gap-4 pt-10 place-items-center container">
            <div class="col mb-3">
                <label class="form-label">Food</label>
                <input type="text" name="food" class="form-control" placeholder="Food" value="{{ $product->food }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">Price</label>
                <input type="text" name="price" class="form-control" placeholder="Price" value="{{ $product->price }}" >
            </div>
            <!-- <div class="col mb-3">
                <label class="form-label">Category</label>
                <input type="text" name="category" class="form-control" placeholder="Category" value="{{ $product->category }}" >
            </div> -->
            <div class="input-group">
                <select class="select select-bordered" name="category" required>
                    <option disabled selected hidden value="">Category</option>
                    <option value="Makanan" {{ $product->category === 'Makanan' ? 'selected' : '' }} >Makanan</option>
                    <option value="Minuman" {{ $product->category === 'Minuman' ? 'selected' : '' }} >Minuman</option>
                    <option value="Snack" {{ $product->category === 'Snack' ? 'selected' : '' }} >Snack</option>
                </select>
            </div>
            <div class="col mb-3">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="description" placeholder="Descriptoin" >{{ $product->description }}</textarea>
            </div>
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
</x-app-layout>