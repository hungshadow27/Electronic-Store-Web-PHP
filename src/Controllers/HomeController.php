<?php

class HomeController extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $this->view('home');
    }
    public function edit($a = 1, $b = 2)
    {
        $c = $a + $b;
        echo "Ket qua =  $c";
    }
}
