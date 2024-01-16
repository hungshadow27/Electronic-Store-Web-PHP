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
}
