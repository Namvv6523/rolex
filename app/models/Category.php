<?php
namespace App\Models;

class Category extends BaseModel{
    protected $table = 'categories';

    public function getCate(){
        $sql = "SELECT * FROM $this->table";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    public function add($name){
        $sql = "INSERT INTO $this->table (name) VALUE (?) ";
        $this->setQuery($sql);
        return $this->execute([$name]);
    }

    public function getDetail($id){
        $sql = "SELECT * FROM $this->table WHERE id = ?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }

    public function updateCate($id,$name){
        $sql = "UPDATE $this->table SET name = ? WHERE id = ? ";
        $this->setQuery($sql);
        return $this->execute([$name,$id]);
    }

    public function remove($id){
        $sql = "DELETE FROM $this->table WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }




}
?>