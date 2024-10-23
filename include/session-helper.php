<?php

function GET_ID_FROM_CART(){
    $carts = [];
    foreach ($_SESSION as $key => $value){
        if (strpos($key, "cart_") === 0){
            $carts[] = explode("_", $key)[1];
        }
    }
    return $carts;
}