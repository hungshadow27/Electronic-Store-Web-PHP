<?php

class HomeController extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $this->view('home');
    }
}
