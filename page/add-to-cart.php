<?php

$id = $_GET["id"] ?? 0;
if ($id == 0){
    redirect_to(route("home"));
}

if (isset($_SESSION["cart_$id"])){
    $_SESSION["cart_$id"] += 1;
}else{
    $_SESSION["cart_$id"] = 1;
}

$previousPage = $_SERVER['HTTP_REFERER'] ?? route("home");
header("Location: $previousPage");
