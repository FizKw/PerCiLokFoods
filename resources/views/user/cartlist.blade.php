<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>Food</th>
                <th>Price</th>
                <th>Category</th>
                <th>Description</th>
                <th>Count</th>
                <th></th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>+
            @if($listFood->count() > 0)
                @foreach($listFood as $rs)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $rs->food }}</td>
                        <td class="align-middle">{{ $rs->price }}</td>
                        <td class="align-middle">{{ $rs->category }}</td>
                        <td class="align-middle">{{ $rs->description }}</td>  
                        @foreach ($counts as $count)
                            @if ($count->foods_id == $rs->id)
                            <td class="align-middle">
                                {{ $count->count }}
                            </td>
                            @endif
                        @endforeach
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('increase', $rs->id) }}" type="button" class="btn btn-secondary">+</a>
                                <a href="{{ route('decrease', $rs->id) }}" type="button" class="btn btn-danger">-</a>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>{{ $totalPrice }}</td>
                </tr>
            @else
                <tr>
                    <td class="text-center" colspan="5">Product not found</td>
                </tr>
            @endif
        </tbody>
    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>