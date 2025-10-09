<x-app-layout>
    <x-slot:title>
        Products
    </x-slot>
    <x-slot:nav_link>
        <a href="{{ url('users') }}">Users</a>
        <a href="{{ url('Products/add') }}">Add Product</a>
    </x-slot>

    <div class="flex flex-col items-center">

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 2xl:grid-cols-6 gap-4 justify-items-center w-full px-12 flex-wrap">
            <div class="flex items-center col-span-full w-full">
                <span class="font-bold text-3xl mt-2">Available Products</span>
                <div class="flex h-7 gap-2 text-sm mt-2 mr-3 ml-auto">
                    <form action="{{ url('products/filter') }}" method="POST">
                        @csrf
                        <select name="filter">
                            <option value=""{{ empty($filter) ? 'selected': '' }}>All</option>
                            <option value="Laptops"{{ $filter=='Laptops'? 'selected':'' }}>Laptops</option>
                            <option value="Phones"{{ $filter=='Phones'? 'selected':'' }}>Phones</option>
                            <option value="Watches"{{ $filter=='Watches'? 'selected':'' }}>Watches</option>
                        </select>
                        <input type="submit" value="Filter" class="button2 font-bold text-white bg-blue-500">
                    </form>
                </div>
            </div>

            @foreach ($products as $product)
                <div class="h-60 w-48 p-2 rounded-lg hover:shadow-lg border-2 border-zinc-300 cursor-pointer hover:bg-green-100">
                    <div class="catd-image">
                        <img src="{{ asset($product->product_img) }}" alt="Product Image"
                            class="h-32 w-full object-cover">
                    </div>
                    <div class="flex flex-col">
                        <span>{{ $product->product_name }}</span>
                        <span>{{ $product->product_category }}</span>
                        <span>$ {{ $product->product_price }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</x-app-layout>
