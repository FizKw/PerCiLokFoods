  
  
<x-app-layout>
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" >
        @csrf
        <div class="grid md:grid-cols-2 gap-4 pt-10 place-items-center container">
            <div>
                <input type="text" name="food" class="form-control" placeholder="Food">
            </div>
            <div>
                <input type="text" name="price" class="form-control" placeholder="Price" required>
            </div>

            <div>
                <!-- <input type="text" name="category" class="form-control" placeholder="Category" required> -->
                <div class="input-group">
                    <select class="select select-bordered" name="category" required>
                        <option disabled selected hidden value="">Category</option>
                        <option value="Makanan">Makanan</option>
                        <option value="Minuman">Minuman</option>
                        <option value="Snack">Snack</option>
                    </select>
                </div>
            </div>
            <div>
                <textarea class="form-control" name="description" placeholder="Descriptoin" required></textarea>
            </div>

            <div>
                <input type="file" name="food_image" placeholder="Food Image" required>
            </div>

            <div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</x-app-layout>