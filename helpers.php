<?php
function view ($page , $data=[]) {
    extract($data);
    require 'view/' . $page . '.php';
}