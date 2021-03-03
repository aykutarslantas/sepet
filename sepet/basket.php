<?php

require_once 'autoload.php';
use basket;

if (isset($_POST['amount']) and isset($_POST['id'])){
    $amount = intval(htmlentities($_POST['amount'],ENT_QUOTES,'UTF-8'));
    $id = htmlentities($_POST['id'],ENT_QUOTES,'UTF-8');
    $data = new basket\AddToBasket();
    print_r($data->add($id,$amount));

}
