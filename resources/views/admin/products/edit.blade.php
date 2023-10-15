<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Product
        </h2>
    </x-slot>
    <hr />
    <form action="{{ route('food.image', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="shrink-0 flex items-center">
            <img width="50" height="50" class="rounded-full" src="{{ asset('storage/' . $product->food_image) }}" alt="">   
            
        </div>
        <div class="col">
            <input type="file" name="food_image" placeholder="Food Image">
        </div>
        <div class="d-grid">
            <button class="btn btn-warning">Update</button>
        </div>
    </form>
    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Food</label>
                <input type="text" name="food" class="form-control" placeholder="Food" value="{{ $product->food }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">Price</label>
                <input type="text" name="price" class="form-control" placeholder="Price" value="{{ $product->price }}" >
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Category</label>
                <input type="text" name="category" class="form-control" placeholder="Category" value="{{ $product->category }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="description" placeholder="Descriptoin" >{{ $product->description }}</textarea>
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
</x-app-layout>