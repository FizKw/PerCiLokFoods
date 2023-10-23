<div class="p-6 text-gray-900">
    @if(Session::has('success'))
        <div class="alert alert-success my-4" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif

    <div class="flex justify-between items-center mb-5">
        <div> </div>
        <h1 class="items-center uppercase text-xl ml-6 font-bold">List Product</h1>
        <a href="{{ route('products.create') }}" class=" mr-12 btn rounded-full bg-color1 hover:bg-red-400 text-white">Add list</a>

    </div>

    <div class="overflow-x-auto  container">
        <table class="table-fixed w-full h-full mx-auto table-hover relative border">
                <thead class="text-center sticky top-0 font-bold bg-color3 text-lg text-black border-y">
                    <tr>
                        <th class=" w-20"></th>
                        <th class=" w-20">Title</th>
                        <th class=" w-20">Price</th>
                        <th class=" w-20">Category</th>
                        <th class=" w-20 overflow-hidden">Description</th>
                        <th class=" w-20">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if($product->count() > 0)
                        @foreach($product as $rs)
                            <tr class="even:bg-color3">
                                <td><img src="{{ asset('storage/' . $rs->food_image) }}" alt="{{ $rs->food_image }}" class=" object-center object-cover mx-auto h-16 w-20 rounded"> </td>
                                <td class="align-middle border-y text-center">{{ $rs->food }}</td>
                                <td class="align-middle border-y text-center">{{ $rs->price }}</td>
                                <td class="align-middle border-y text-center">{{ $rs->category }}</td>
                                <td class="align-middle border-y text-center table-fixed">{{ $rs->description }}</td>  
                                <td class="align-middle border-y text-center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
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
