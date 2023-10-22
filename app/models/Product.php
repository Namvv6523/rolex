<?php

namespace App\Models;

use App\Models\BaseModel;

class Product extends BaseModel
{
    protected $table = 'products';
    protected $tableCae = 'categories';

    public function getProduct()
    {
        $sql = "SELECT * FROM $this->table";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    // xây dựng hàm thêm
    public function add($name, $price, $img, $categoryId, $quantity){
        $sql = "INSERT INTO $this->table (name, price, img, categoryId, quantity ) VALUES (?,?,?,?,?)";
        move_uploaded_file($_FILES["image"]["tmp_name"],"./upload/".$_FILES["image"]["name"]);
        $this->setQuery($sql);
        return $this->execute([$name, $price, $img, $categoryId, $quantity]);

    }

    // xây dựng hàm xóa
    public function remove($id){
        $sql = "DELETE FROM $this->table WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }
    
}
