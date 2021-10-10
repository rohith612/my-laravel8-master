<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Product
        </h2>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="name" class="block font-medium text-sm text-gray-700">Name</label>
                            <input type="text" name="name" id="name" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                value="{{ $product -> name }}" />
                            @error('name')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="description" class="block font-medium text-sm text-gray-700">Description</label>
                            <input type="text" name="description" id="description" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                value="{{ $product -> description }}" />
                            @error('description')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="price" class="block font-medium text-sm text-gray-700">Price</label>
                            <input type="text" name="price" id="price" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                value="{{ $product -> price }}" />
                            @error('price')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="quantity" class="block font-medium text-sm text-gray-700">Quantity</label>
                            <input type="number" name="quantity" id="quantity" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                value="{{ $product -> quantity }}" />
                            @error('quantity')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="image" class="block font-medium text-sm text-gray-700">Image</label>
                            <div class="row">
                                <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                                <img
                                    src="{{ $product->file_thumb_url }}"
                                    class="w-100 shadow-1-strong rounded mb-4"
                                    alt="{{ $product->name }}"
                                />
                                </div>
                             
                            </div>
                         
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                          
                            <label for="picture_path" class="block font-medium text-sm text-gray-700">Upload Image</label>
                            <input type="file" name="picture_path" id="picture_path" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                value="{{ old('picture_path', '') }}" />
                            @error('picture_path')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="image" class="block font-medium text-sm text-gray-700">Additional Images</label>
                            <div class="row">
                                <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                                
                                    @forelse ($product->additionaImages as $item)
                                        <img
                                        src="{{ $item -> file_main_url }}"
                                        class="w-100 shadow-1-strong rounded mb-4"
                                        alt="{{ $item->image_name }}" width="100"/>
                                    @empty
                                        <span>No images found</span>
                                    @endforelse
                                   
                                </div>
                             
                            </div>
                         
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
                                Edit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="{{ asset('/js/custom/products.js') }}"></script>
    @endpush


</x-app-layout>




