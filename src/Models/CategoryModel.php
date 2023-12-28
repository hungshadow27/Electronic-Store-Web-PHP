<?php
class CategoryModel
{
    use Database;
    public function getAllCategory()
    {
        $rs = $this->table('category')
            ->get();
        $category = array();
        foreach ($rs as $r) {
            $category[] = $r;
        }
        return $category;
    }
}
