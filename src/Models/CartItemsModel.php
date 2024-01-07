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
}
