<?php
class SliderModel
{
    use Database;
    public function getAllSlider()
    {
        $rs = $this->table('slider')
            ->get();
        $slider = array();
        foreach ($rs as $r) {
            $slider[] = $r;
        }
        return $slider;
    }
}
