<?php
class BannerModel
{
    use Database;
    public function getAllBanner()
    {
        $rs = $this->table('banner')
            ->get();
        $banner = array();
        foreach ($rs as $r) {
            $banner[] = $r;
        }
        return $banner;
    }
}
