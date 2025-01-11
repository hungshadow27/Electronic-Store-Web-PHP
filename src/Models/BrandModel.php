<?php
class BrandModel
{
    use Database;
    public function getAllBrand()
    {
        $rs = $this->table('brand')
            ->limit(999)
            ->get();
        $brands = array();
        foreach ($rs as $r) {
            $brands[] = $r;
        }
        return $brands;
    }
    public function getBrandBySlug($slug)
    {
        $brand = $this->table('brand')
            ->getOne('slug', $slug);
        return $brand;
    }
    public function getBrandById($id)
    {
        $brand = $this->table('brand')
            ->getOne('brand_id', $id);
        return $brand;
    }
    public function updateBrand($id, $slug, $name, $category_id, $image)
    {
        $rs = $this->table('brand')
            ->update('brand_id', $id, ['slug' => $slug, 'brand_name' => $name, 'category' => $category_id, 'image' => $image]);
        return $rs;
    }
    public function deleteBrand($id)
    {
        $rs = $this->table('brand')
            ->deleteOne('brand_id', $id);
        return $rs;
    }
    public function addBrand($slug, $name, $category_id, $image)
    {
        $rs = $this->table('brand')
            ->insert(['slug' => $slug, 'brand_name' => $name, 'category' => $category_id, 'image' => $image]);
        return $rs;
    }
}
