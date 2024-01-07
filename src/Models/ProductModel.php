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
    public function getProductByBrandId($brandId, $limit = 15, $offset = 0)
    {
        $rs = $this->table('product')
            ->limit($limit)
            ->offset($offset)
            ->getListItemsWithCondition('brand_id', $brandId);
        $products = array();
        foreach ($rs as $r) {
            $products[] = $r;
        }
        return $products;
    }
    public function getProductByCategoryId($catId, $limit = 15, $offset = 0)
    {
        $rs = $this->table('product')
            ->limit($limit)
            ->offset($offset)
            ->getListItemsWithCondition('category_id', $catId);
        $products = array();
        foreach ($rs as $r) {
            $products[] = $r;
        }
        return $products;
    }

    //FIX HERE
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
