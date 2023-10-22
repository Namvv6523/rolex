<?php

namespace App\Controllers;

use App\Models\Category;
use App\Models\Product;

class ProductController extends BaseController
{

    public $category;
    public $product;

    public function __construct()
    {
        $this->product = new Product();
        $this->category = new Category();
    }


    public function showPrd()
    {
        $product = $this->product->getProduct();
        return $this->render('product.index', compact('product'));
    }

    public function store()
    {
        $loadCate =  $this->category->getCate();
        $this->render('product.add', compact('loadCate'));
    }

    public function create()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['submit'])) {
                $errors = [];

                if (empty($_POST["name"])) {
                    $errors[] = "Trường tên không được để trống";
                }

                if (empty($_POST["price"])) {
                    $errors[] = "Trường giá không được để trống";
                }

                if (empty($_FILES["image"])) {
                    $errors[] = "Trường hình ảnh không được để trống";
                }

                if (empty($_POST["iddm"])) {
                    $errors[] = "Trường danh mục không được để trống";
                }

                if (empty($_POST["quantity"])) {
                    $errors[] = "Trường số lượng không được để trống";
                }

                if (count($errors) > 0) {
                    redirect('errors', $errors, 'product/store');
                    die;
                } else {
                    $create = $this->product->add($_POST["name"], $_POST["price"], $_FILES["image"], $_POST["iddm"], $_POST["quantity"]);
                    if ($create) {
                        redirect('success', "Thêm thành công", 'product/show');
                        die;
                    }
                }
            }
        }
    }

    public function delete($id){
        $this->product->remove($id);
        header('location: ' . BASE_URL . 'product/show');
        
    }
}
