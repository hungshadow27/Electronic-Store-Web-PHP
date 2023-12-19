<?php

// http://localhost/live/Home/Show/1/2

class ListProduct{

    function Detail($id){
        // $id = $id;
        require_once "./src/Views/Detail.php";
    }
    function Show(){        
        require_once "./src/Views/ListProduct.php";
    }
}
?>