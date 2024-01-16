<?php
class OrderModel
{
    use Database;
    public function createNewOrder($user_id, $paymentMethod, $shippingAddress, $orderStatus, $orderDate, $totalCost)
    {
        $rs = $this->table('orders')
            ->insert([
                'user_id' => $user_id, 'payment_method' => $paymentMethod, 'shipping_address' => $shippingAddress,
                'order_status' => $orderStatus, 'order_date' => $orderDate, 'total_cost' => $totalCost
            ]);
    }
    public function getOrdersByUserId($user_id)
    {
        $rs = $this->table('orders')
            ->limit(999)
            ->offset(0)
            ->getListItemsWithCondition('user_id', $user_id);
        $orders = array();
        foreach ($rs as $r) {
            $orders[] = $r;
        }
        return $orders;
    }
    public function getOrderByUserId($user_id)
    {
        $rs = $this->table('orders')
            ->getOne('user_id', $user_id);
        return $rs;
    }
    public function getOrderByStatus($status)
    {
        $rs = $this->table('orders')
            ->getOne('order_status', $status);
        return $rs;
    }
    public function getOrderStatus($status)
    {
        $string = [
            -1 => "Đã huỷ",
            0 => "Chờ xác nhận",
            1 => "Đang chuẩn bị",
            2 => "Đang giao hàng",
            3 => "Đang trên đường giao đến bạn",
            4 => "Đã giao hàng"
        ];
        return $string[$status];
    }
}
