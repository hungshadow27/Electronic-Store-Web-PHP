<?php
class OrderItemsModel
{
    use Database;
    public function getOrderItemsByOrderId($orderID)
    {
        $rs = $this->table('order_items')
            ->limit(999)
            ->offset(0)
            ->getListItemsWithCondition('order_id', $orderID);
        return $rs;
        $order_items = array();
        foreach ($rs as $r) {
            $order_items[] = $r;
        }
        return $order_items;
    }
    public function getOrderItemByOrderItemId($orderItemId)
    {
        $order_item = $this->table('order_items')
            ->getOne("order_item_id", $orderItemId);
        return $order_item;
    }
    public function createOrderItem($orderID, $product_id, $quantity, $priceAtPurchase)
    {
        $rs = $this->table('order_items')
            ->insert(['order_id' => $orderID, 'product_id' => $product_id, 'quantity' => $quantity, 'price_at_purchase' => $priceAtPurchase]);
        return $rs;
    }
    // public function deleteCartItem($product_id)
    // {
    //     $rs = $this->table('cart_items')
    //         ->deleteOne('product_id', $product_id);
    //     return $rs;
    // }
    // public function updateQuantityCartItem($product_id, $quantity)
    // {
    //     $rs = $this->table('cart_items')
    //         ->update('product_id', $product_id, ['quantity' => $quantity]);
    //     return $rs;
    // }
}
