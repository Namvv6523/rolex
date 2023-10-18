<?php

namespace App\Controllers;

use App\Models\Category;

class CategoryController extends BaseController
{
    public $category;

    public function __construct()
    {
        $this->category = new Category();
    }


    // hiển thị danh mục
    public function show()
    {
        $category = $this->category->getCate();
        return $this->render('category.index', compact('category'));
    }

    // tạo form thêm danh mục
    public function store()
    {
        return $this->render('category.add');
    }

    // thêm danh mục
    public function create()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['submit'])) {
                $errors = [];

                if (empty($_POST["name"])) {
                    $errors[] = "Trường này không được để trống";
                }

                if (count($errors) > 0) {
                    redirect('errors', $errors, 'category/store');
                    die;
                } else {
                    $create = $this->category->add($_POST['name']);
                    if ($create) {
                        redirect('success', "Thêm thành công", 'category/list');
                        die;
                    }
                }
            }
        }
    }

    // tạo form edit và lấy giá trị
    public function detail($id)
    {
        $cate = $this->category->getDetail($id);
        return $this->render('category.edit', compact('cate'));
    }

    // sửa danh mục
    public function update($id)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['submit'])) {
                $errors = [];

                if (empty($_POST["name"])) {
                    $errors[] = "Trường này không được để trống";
                }

                if (count($errors) > 0) {
                    redirect('errors', $errors, 'category/detail');
                    die;
                } else {
                    $create = $this->category->updateCate($id, $_POST['name']);
                    if ($create) {
                        redirect('success', "Thêm thành công", 'category/list');
                        die;
                    }
                }
            }
        }
    }


    public function delete($id)
    {
        $this->category->remove($id);
        header('location: ' . BASE_URL . 'category/list');
    }
}
