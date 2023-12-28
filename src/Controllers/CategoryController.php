<?php
class CategoryController
{
    use Controller;
    public function index($a = '', $b = '', $c = '')
    {
        redirect('category/dienthoai');
    }
    public function dienthoai($a = '', $b = '', $c = '')
    {
        $this->view('listproductcategory.view');
    }
    public function laptop($a = '', $b = '', $c = '')
    {
        $this->view('listproductcategory.view');
    }
}
