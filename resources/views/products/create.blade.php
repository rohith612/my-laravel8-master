<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create Roles
        </h2>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="{{ route('products.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="name" class="block font-medium text-sm text-gray-700">Name</label>
                            <input type="text" name="name" id="name" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('name', '') }}" />
                            @error('name')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="description" class="block font-medium text-sm text-gray-700">Description</label>
                            <input type="text" name="description" id="description" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('description', '') }}" />
                            @error('description')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="price" class="block font-medium text-sm text-gray-700">Price</label>
                            <input type="text" name="price" id="price" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('price', '') }}" />
                            @error('price')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="quantity" class="block font-medium text-sm text-gray-700">Quantity</label>
                            <input type="number" name="quantity" id="quantity" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('quantity', '') }}" />
                            @error('quantity')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="roles" class="block font-medium text-sm text-gray-700">Category</label>
                            <select name="category" id="category" class="form-select block rounded-md shadow-sm mt-1 block w-full">
                                <option value="" selected >SELECT CATEGORY</option>
                                @foreach($categories as $cats => $id)
                                    <option value="{{ $id }}">{{ $cats }}</option>
                                @endforeach
                            </select>
                            @error('category')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="picture_path" class="block font-medium text-sm text-gray-700">Image</label>
                            <input type="file" name="picture_path" id="picture_path" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('picture_path', '') }}" />
                            @error('picture_path')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="additional_imgs" class="block font-medium text-sm text-gray-700">Additional Image Upload</label>
                            <input type="file" name="additional_imgs[]" id="additional_imgs" class="form-input rounded-md shadow-sm mt-1 block w-full" multiple />
                            @error('additional_imgs')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>





                       
                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Create
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>