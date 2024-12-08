<?php
function view ($page , $data=[]) {
    extract($data);
    require 'views/' . $page . '.php';
}