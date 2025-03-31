<?php
require_once "./src/Models/ProductEntity.php";

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
    public function searchProducts($searchTerm, $limit = 15, $offset = 0)
    {
        $searchTerm = "%" . $searchTerm . "%";
        $sql = "SELECT * FROM product WHERE name LIKE ? LIMIT ? OFFSET ?";
        $this->statement = $this->conn->prepare($sql);
        $this->statement->bind_param('sii', $searchTerm, $limit, $offset);
        $this->statement->execute();

        $result = $this->statement->get_result();
        $products = [];
        while ($row = $result->fetch_object()) {
            $products[] = $row;
        }
        $this->resetQuery();

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
    public function updateProductById($product_id, $name, $description, $price, $sale_price, $stock_quantity, $category_id, $brand_id, $image)
    {
        $this->table('product')
            ->update('product_id', $product_id, [
                'name' => $name,
                'description' => $description,
                'price' => $price,
                'sale_price' => $sale_price,
                'stock_quantity' => $stock_quantity,
                'category_id' => $category_id,
                'brand_id' => $brand_id,
                'image' => $image
            ]);
    }
    public function deleteProductById($product_id)
    {
        $this->table('product')
            ->deleteOne('product_id', $product_id);
    }
    public function addProduct($name, $description, $price, $sale_price, $stock_quantity, $category_id, $brand_id, $image)
    {
        $this->table('product')
            ->insert([
                'name' => $name,
                'description' => $description,
                'price' => $price,
                'sale_price' => $sale_price,
                'stock_quantity' => $stock_quantity,
                'category_id' => $category_id,
                'brand_id' => $brand_id,
                'image' => $image
            ]);
    }
}
