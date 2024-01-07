<?php
class CartModel
{
    use Database;
    public function createNewCart($user_id, $created_at)
    {
        $rs = $this->table('cart')
            ->insert(['user_id' => $user_id, 'created_at' => $created_at]);
    }
    public function getCartByUserId($user_id)
    {
        $rs = $this->table('cart')
            ->getOne('user_id', $user_id);
        return $rs;
    }
}
