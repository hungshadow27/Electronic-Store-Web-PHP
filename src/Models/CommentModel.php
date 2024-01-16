<?php
class CommentModel
{
    use Database;
    public function createNewComment($product_id, $user_id, $comment_parent, $content, $comment_date)
    {
        $rs = $this->table('comment')
            ->insert([
                'product_id' => $product_id, 'user_id' => $user_id, 'comment_parent' => $comment_parent,
                'content' => $content, 'comment_date' => $comment_date
            ]);
        return $rs;
    }
    public function getCommentsByProductId($product_id)
    {
        $rs = $this->table('comment')
            ->limit(999)
            ->offset(0)
            ->getListItemsWithCondition('product_id', $product_id);
        $comments = array();
        foreach ($rs as $r) {
            $comments[] = $r;
        }
        return $comments;
    }
}
