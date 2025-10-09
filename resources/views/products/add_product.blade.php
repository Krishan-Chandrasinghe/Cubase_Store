<x-app-layout>
    <x-slot:title>
        Add Product
    </x-slot>

    <x-slot:nav_link>
        <a href="{{ url('products') }}">Products</a>
        <a href="{{ url('users') }}">Users</a>
    </x-slot>

    <div class="flex flex-col items-center justify-center h-[85vh]">

        <div class="flex flex-col items-center">

            <span class="font-bold text-3xl mb-4">Add Product</span>

        @if (session('status'))
            <div class="bg-green-200 flex flex-col min-w-80 max-w-96 mt-2">
                <span class="text-center py-1 px-8">{{ session('status') }}</span>
            </div>
        @endif

        <form action="{{ url('products/add_product') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-col min-w-80 max-w-96 mb-2 pl-0">
                <label>Product Image: </label>
                <input type="file" name="product_img" />
                @error('product_img')
                    <span class="text-red-500 font-bold">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex flex-col min-w-80 max-w-96 mb-2">
                <label>Product Name: </label>
                <input type="text" name="product_name" value="{{ old('product_name') }}" />
                @error('product_name')
                    <span class="text-red-500 font-bold">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-col min-w-80 max-w-96 mb-2">
                <label>Category: </label>
                <select name="product_category" value="{{ old('product_catego') }}">
                    <option value="Phones">Phones</option>
                    <option value="Laptop">Laptop</option>
                    <option value="Watches">Watches</option>
                </select>
                <!-- <input type="text" name="product_category" value="{{ old('product_catego') }}" /> -->
                @error('product_catego')
                    <span class="text-red-500 font-bold">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-col min-w-80 max-w-96 mb-2">
                <label>Product Price: </label>
                <input type="text" name="product_price" value="{{ old('product_price') }}" placeholder="Eg:- 123.00"/>
                @error('product_price')
                    <span class="text-red-500 font-bold">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex flex-col min-w-80 max-w-96">
                <input type="Submit" class="button bg-blue-400">
            </div>

        </form>
        </div>

    </div>
</x-app-layout>
