<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-auto shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 ">
                    <table class="table-fixed w-full h-full mx-auto table-hover relative border">
                        <thead class="table-primary text-center sticky top-0 font-bold  text-lg text-black border-y">
                             <tr class="text-center text-lg">
                                <th class=" w-48"></th>
                                <th class=" w-48">Food</th>
                                <th class=" w-48">Price</th>
                                <th class=" w-48">Category</th>
                                <th class=" w-48">Description</th>
                                <th class=" w-48">Count</th>
                            {{-- <th>Total</th> --}}
                            </tr>
                        </thead>
                        <tbody class="text-center text-lg">
                            @if($listFood->count() > 0)
                                @foreach($listFood as $rs)
                                    <tr>
                                        <td><img src="{{ asset('storage/' . $rs->food_image) }}" alt="{{ $rs->food_image }}" class=" object-center object-cover mx-auto h-20  w-28 rounded"> </td>
                                        <td class="align-middle text-center">{{ $rs->food }}</td>
                                        <td class="align-middle text-center">{{ $rs->price }}</td>
                                        <td class="align-middle text-center">{{ $rs->category }}</td>
                                        <td class="align-middle text-center overflow-hidden truncate">{{ $rs->description }}</td>  
                                        @foreach ($counts as $count)
                                            @if ($count->foods_id == $rs->id)
                                            <td class="justify-center place-items-center py-12 flex ">
                                                <a href="{{ route('decrease', $rs->id) }}" type="button" class="text-black hover:text-color2 cursor-pointer"><i class="" data-feather="minus-circle"></i> </a>
                                                <p class="mx-4 ">{{ $count->count }}</p>
                                                <a href="{{ route('increase', $rs->id) }}" type="button" class="text-black hover:text-color2 cursor-pointer"><i class="" data-feather="plus-circle"></i> </a>
                                            </td>
                                            @endif
                                        @endforeach
                                        <td class="align-middle">
                                    </tr>
                                @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            @else
                            <tr>
                                <td class="text-center" colspan="5">Cart Is Empty</td>
                            </tr>
                             @endif
                        </tbody>
                    </table>
                </div>
            </div>
            @if(DB::table('user_foods')->where('user_id', Auth()->user()->id)->get()->count() > 0)
            <div class="flex justify-between">
                <div class=""></div>
                <div class="mt-4 p-3 rounded-lg bg-orange-200">
                    <h1 class="mx-3 font-semibold mb-2">Harga total : Rp{{ $totalPrice }}</h1>
                    <button><a href="#modal_box" class="btn rounded-full capitalize text-lg bg-color1 hover:bg-red-400 text-white">Checkout pesanan</a></button>
                </div>
            </div>
            @endif
                <!-- Put this part before </body> tag -->
            <div class="modal" id="modal_box">
                <div class="modal-box">
                    <h3 class="font-bold text-lg">Terima kasih</h3>
                    <p class="py-4">Pesananmu segera di proses</p>
                    <div class="modal-action">
                       <x-primary-button><a href="{{ route('checkout') }}">Close</a></x-primary-button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>