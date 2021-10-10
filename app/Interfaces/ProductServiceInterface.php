<?php

namespace App\Interfaces;

interface ProductServiceInterface{
    /**
     * fetch the product model from the matching condition
     * 
     * @return collection
     */
    public function productList($searchKey = NULL);
    /**
     * insert the product model to db
     * 
     * @return objects
     */
    public function productAdd($request);
    /**
     * update the product model to db
     * 
     * @return objects
     */
    public function productUpdate($request, $model);
    /**
     * remove the product model to db
     * 
     * @return objects
     */
    public function productRemove($model);
}
