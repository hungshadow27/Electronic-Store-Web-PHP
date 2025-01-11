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
    public function updateCategoryById($id, $name, $slug)
    {
        $rs = $this->table('category')
            ->update('category_id', $id, [
                'name' => $name,
                'slug' => $slug
            ]);
        return $rs;
    }
    public function addCategory($name, $slug)
    {
        $rs = $this->table('category')
            ->insert([
                'name' => $name,
                'slug' => $slug
            ]);
        return $rs;
    }
    public function deleteCategoryById($id)
    {
        $rs = $this->table('category')
            ->deleteOne('category_id', $id);
        return $rs;
    }
}
