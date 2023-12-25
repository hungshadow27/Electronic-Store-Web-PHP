<?php

class ProductController extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $this->view('product');
    }
}
