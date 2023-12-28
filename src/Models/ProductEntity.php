<?php
class ProductEntity
{

    private $id = '';
    private $name = '';
    private $description = '';
    private $price = '';
    private $image = '';
    private $sale_price = '';
    private $stock_quantity = '';
    private $category_id = '';

    public function __construct($id = '', $name = '', $description = '', $price = '', $image = '', $sale_price = '', $stock_quantity = '', $category_id = '')
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->image = $image;
        $this->sale_price = $sale_price;
        $this->stock_quantity = $stock_quantity;
        $this->category_id = $category_id;
    }


    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the value of description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get the value of price
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Get the value of image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Get the value of sale_price
     */
    public function getSale_price()
    {
        return $this->sale_price;
    }

    /**
     * Get the value of stock_quantity
     */
    public function getStock_quantity()
    {
        return $this->stock_quantity;
    }

    /**
     * Get the value of category_id
     */
    public function getCategory_id()
    {
        return $this->category_id;
    }
}
