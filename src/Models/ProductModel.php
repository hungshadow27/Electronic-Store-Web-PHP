<?php
require "./src/Models/ProductEntity.php";

class ProductModel
{
    use Database;
    public function getProductById($id)
    {
        $product = $this->table('product')
            ->getOne('product_id', $id);
        return $product;
    }
    public function getAllProduct()
    {
        $rs = $this->table('product')
            ->get();
        $products = array();
        foreach ($rs as $r) {
            $products[] = $r;
        }
        return $products;
    }
}
