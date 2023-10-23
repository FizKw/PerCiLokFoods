<div class="p-6 text-gray-900">
    @if(Session::has('success'))
        <div class="alert alert-success my-4" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif

    <div class="flex justify-between items-center">
        <div> </div>
        <h1 class="items-center uppercase text-xl ml-6 font-bold">List Product</h1>
        <a href="{{ route('products.create') }}" class="mr-20 btn rounded-full bg-color1 hover:bg-red-400 text-white">Add list</a>

    </div>

    <div class="overflow-x-auto h-96">
        <table class="table table-hover relative">
                <thead class="text-center sticky top-0 font-bold bg-white text-lg text-black">
                    <tr>
                        <th></th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Product Code</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if($product->count() > 0)
                        @foreach($product as $rs)
                            <tr>
                                <td><img src="{{ asset('storage/' . $rs->food_image) }}" alt="{{ $rs->food_image }}" class=" object-center object-cover  h-16 w-20 rounded"> </td>
                                <td class="align-middle text-center">{{ $rs->food }}</td>
                                <td class="align-middle text-center">{{ $rs->price }}</td>
                                <td class="align-middle text-center">{{ $rs->category }}</td>
                                <td class="align-middle text-center">{{ $rs->description }}</td>  
                                <td class="align-middle text-center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ route('products.show', $rs->id) }}" type="button" class="btn btn-info hover:bg-blue-400 bg-blue-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                                            </svg>
                                        </a>
                                        <a href="{{ route('products.edit', $rs->id)}}" type="button" class="btn btn-warning hover:bg-yellow-200 bg-yellow-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                            </svg>
                                        </a>
                                        <form action="{{ route('products.destroy', $rs->id) }}" method="POST" type="button"  onsubmit="return confirm('Delete?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-error hover:bg-red-400 bg-red-600">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td class="text-center" colspan="5">Product not found</td>
                        </tr>
                    @endif
             </tbody>
         </table>
    </div>
</div>
