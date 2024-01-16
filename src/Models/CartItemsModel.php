<?php
class CartItemsModel
{
    use Database;
    public function getCartItems($cart_id)
    {
        $rs = $this->table('cart_items')
            ->limit(999)
            ->offset(0)
            ->getListItemsWithCondition('cart_id', $cart_id);
        return $rs;
        $cart_items = array();
        foreach ($rs as $r) {
            $cart_items[] = $r;
        }
        return $cart_items;
    }
    public function getCartItem($cartItemId)
    {
        $cart_item = $this->table('cart_items')
            ->getOne("cart_item_id", $cartItemId);
        return $cart_item;
    }
    public function createCartItem($cart_id, $product_id, $quantity)
    {
        $rs = $this->table('cart_items')
            ->insert(['cart_id' => $cart_id, 'product_id' => $product_id, 'quantity' => $quantity]);
        return $rs;
    }
    public function deleteCartItem($product_id)
    {
        $rs = $this->table('cart_items')
            ->deleteOne('product_id', $product_id);
        return $rs;
    }
    public function updateQuantityCartItem($product_id, $quantity)
    {
        $rs = $this->table('cart_items')
            ->update('product_id', $product_id, ['quantity' => $quantity]);
        return $rs;
    }
}
