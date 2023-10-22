<x-app-layout>
    <section class="py-12 px-4 lg:px-0 container mx-auto">
        <h2 class="text-center font-bold text-2xl p-3">Create Menu</h2>
        <div class="p-12 sm:p-8 bg-color4 shadow rounded-lg">
            <div class="max-w-xl">
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <x-input-label class="form-label">Image</x-input-label>
                    <div class="mt-4">
                        <x-text-input type="file" name="food_image" placeholder="Food Image" />
                        <x-primary-button>Add Image</x-primary-button>
                    </div>
                    <div class="mb-3">
                        <x-input-label class="form-label">Food</x-input-label>
                        <x-text-input type="text" name="food" class="mt-1 block w-full" placeholder="Food"/>
                    </div>
                    <div class="mb-3">
                        <x-input-label class="form-label">Price</x-input-label>
                        <x-text-input type="text" name="price" class="mt-1 block w-full" placeholder="Price"/>
                    </div>
                    <div class="input-group">
                        <select class="select select-bordered" name="category" required>
                            <option disabled selected hidden value="">Category</option>
                            <option value="Makanan">Makanan</option>
                            <option value="Minuman">Minuman</option>
                            <option value="Snack">Snack</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <x-input-label class="mt-1 ">Description</x-input-label>
                        <x-text-input class="mt-1 block w-full" name="description" placeholder="Food Description"/>
                    </div>
                    <div class="">
                        <x-primary-button class="btn btn-warning">Create</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-app-layout>

