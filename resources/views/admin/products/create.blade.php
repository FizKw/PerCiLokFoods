  
@section('title', 'Create Product')
  
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Add Product
        </h2>
    </x-slot>
    <hr />
    
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="food" class="form-control" placeholder="Food">
            </div>
            <div class="col">
                <input type="text" name="price" class="form-control" placeholder="Price" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="category" class="form-control" placeholder="Category" required>
            </div>
            <div class="col">
                <textarea class="form-control" name="description" placeholder="Descriptoin" required></textarea>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="file" name="food_image" placeholder="Food Image" required>
            </div>
        </div>
        
 
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</x-app-layout>