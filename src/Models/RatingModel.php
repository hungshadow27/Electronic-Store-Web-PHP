<?php
class RatingModel
{
    use Database;
    public function createNewRating($order_id, $product_id, $user_id, $star, $create_date)
    {
        $rs = $this->table('rating')
            ->insert([
                'order_id' => $order_id, 'product_id' => $product_id, 'user_id' => $user_id,
                'star' => $star, 'create_date' => $create_date
            ]);
    }
    public function getRatingsByOrderId($order_id)
    {
        $rs = $this->table('rating')
            ->limit(999)
            ->offset(0)
            ->getListItemsWithCondition('order_id', $order_id);
        $ratings = array();
        foreach ($rs as $r) {
            $ratings[] = $r;
        }
        return $ratings;
    }
    public function getRatingsByProductId($product_id)
    {
        $rs = $this->table('rating')
            ->limit(999)
            ->offset(0)
            ->getListItemsWithCondition('product_id', $product_id);
        $ratings = array();
        foreach ($rs as $r) {
            $ratings[] = $r;
        }
        return $ratings;
    }
    public function DeleteRatingsByOrderId($order_id)
    {
        $rs = $this->table('rating')
            ->deleteOne('order_id', $order_id);
        return $rs;
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
