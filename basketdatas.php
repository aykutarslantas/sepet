<?php
require_once 'sessionBasket.php';
if (isset($_SESSION['basket']) and count($_SESSION['basket']) > 0){
    echo (count($_SESSION['basket']));
}else{
    echo 0;
}
