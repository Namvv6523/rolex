<?php
namespace App\Controllers;

use App\Models\Product;
use App\Models\Productc;

class ProductController extends BaseController{

    public $product;

    public function __construct()
    {
        $this->product = new Product();
    }

    
    public function getProduct() {
        
    }
}
