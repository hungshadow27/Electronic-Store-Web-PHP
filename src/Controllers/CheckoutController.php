<?php
class CheckoutController
{
    use Controller;
    public function index($a = '', $b = '', $c = '')
    {
        $this->view('checkout.view');
    }
}
