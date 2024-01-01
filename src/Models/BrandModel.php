<?php
class BrandModel
{
    use Database;
    public function getAllBrand()
    {
        $rs = $this->table('brand')
            ->get();
        $brands = array();
        foreach ($rs as $r) {
            $brands[] = $r;
        }
        return $brands;
    }
}
