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
    public function getCategoryById($id)
    {
        $category = $this->table('category')
            ->getOne('category_id', $id);
        return $category;
    }
    public function getCategoryBySlug($slug)
    {
        $category = $this->table('category')
            ->getOne('slug', $slug);
        return $category;
    }
}
