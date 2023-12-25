<?php
function show($stuff)
{
    echo "<pre>";
    print_r($stuff);
    echo "</pre>";
}

function showError($errno, $errstr, $errfile, $errline)
{
    echo "<h1>Có lỗi: .$errno</h1>";
    echo "<h2>Thông báo lỗi: .$errstr</h2>";
    echo "<h2>File: .$errfile</h2>";
    echo "<h2>Dòng: .$errline</h2>";
}
