<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Interfaces\ProductServiceInterface;
use App\Models\Product;
use App\Models\ProductsImages;
use Image;

class ProductService implements ProductServiceInterface{

    /**
     * Get the product model from the matching condition
     * 
     * @return collection
     */
    public function productList($searchKey = NULL){
        return Product::when($searchKey, function ($query, $searchKey) {
                return $query->orWhere('name', 'like', "%". $searchKey. "%")
                        ->orWhere('shipping_code', 'like', "%". $searchKey. "%")
                        ->orWhere('product_code', 'like', "%". $searchKey. "%");
                })
                ->latest()->paginate(config('config.PAGINATE_COUNT'));
    }
    /**
     * Insert the product model to db
     * 
     * @return objects
     */
    public function productAdd($request){
        $request['picture_path'] = $this -> uploadImage($request['picture_path']);
        $request['product_code'] = Str::uuid()->toString();
        $request['shipping_code'] = Str::uuid()->toString();
        $request['batch'] = now();

        $product =  Product::create($request);

        if(!empty($request['additional_imgs'])){
            $additionalFiels = [];
            foreach($request['additional_imgs'] as $file){
                $additionalFiels[] = new ProductsImages(['image_name' => $this -> uploadImage($file, false)]);
            }
            return $product->additionaImages()->saveMany($additionalFiels);
        }

        return true;
    }
    /**
     * Upload the product image and thumb image
     * 
     * @return None
     */
    public function uploadImage($image, $thumbNeed = true){
        $picture_path= $image->getClientOriginalName();
        if($thumbNeed){
            $img = Image::make($image->path());
            $img->resize(config('config.T_WIDTH'), config('config.T_HEIGHT'), function ($constraint) {
                $constraint->aspectRatio();
            })->encode($image->extension(), 80);
            Storage::disk('local')->put(config('config.THUMB_UPATH').$picture_path, $img);
        }
        Storage::disk('local')->put(config('config.MAIN_UPATH').$picture_path, file_get_contents($image));
        return $picture_path;
    }
    /**
     * update the product model to db
     * 
     * @return objects
     */
    public function productUpdate($request, $product){
        if(!empty($request['picture_path'])){
            $request['picture_path'] = $this -> uploadImage($request['picture_path']);
            $this -> removeImageFiles($product->picture_path);
        }
        if(!empty($request['additional_imgs'])){
            $additionalFiels = [];
            foreach($request['additional_imgs'] as $file){
                $additionalFiels[] = new ProductsImages(['image_name' => $this -> uploadImage($file, false)]);
            }
            // remove additional images
            $this -> removeAdditionalImageDisk($product);
            $product->additionaImages()->saveMany($additionalFiels);
        }
        return $product->update($request);
    }
    /**
     * remove the product model to db
     * 
     * @return objects
     */
    public function productRemove($product){
        // remove additional images
        $this -> removeAdditionalImageDisk($product);
        // remove main image
        $this -> removeImageFiles($product->picture_path);
        return $product->delete();
    }
    /**
     * remove the product images file from the storage
     * 
     * @return objects
     */
    public function removeImageFiles($product_file){
        if (Storage::disk('local')->exists(config('config.THUMB_UPATH').$product_file)) 
            Storage::disk('local')->delete(config('config.THUMB_UPATH').$product_file);
        
        if (Storage::disk('local')->exists(config('config.MAIN_UPATH').$product_file))
            Storage::disk('local')->delete(config('config.MAIN_UPATH').$product_file);
    }
    /**
     * remove the product additional file from the storage
     * 
     * @return objects
     */
    public function removeAdditionalImageDisk($product){
        $fileName = [];
        foreach($product -> additionaImages as $removeFile){
            $fileName[] = config('config.MAIN_UPATH').$removeFile -> image_name;
        }
        if(!empty($fileName)){
            Storage::disk('local')->delete($fileName);
            $product->additionaImages()->delete();
        }
    }
}
