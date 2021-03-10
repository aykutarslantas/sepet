<?php

require_once 'autoload.php';
use classBasket\AddToBasket;
use classBasket\RemoveTheBasket;

if (isset($_POST['amount']) and isset($_POST['id'])){
    $amount = intval(htmlentities($_POST['amount'],ENT_QUOTES,'UTF-8'));
    $id = htmlentities($_POST['id'],ENT_QUOTES,'UTF-8');
    $data = new classBasket\AddToBasket();
    print_r($data->add($id,$amount));
}
if (isset($_POST['delete']) and isset($_POST['id']) and is_numeric($_POST['id'])){
    $id = htmlentities($_POST['id'],ENT_QUOTES,'UTF-8');
    $data = new classBasket\RemoveTheBasket();
    print_r($data->remove($id));
}
