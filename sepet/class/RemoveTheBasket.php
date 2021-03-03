<?php
namespace basket;
require_once 'sessionBasket.php';
class RemoveTheBasket
{
    function remove($id){
        unset($_SESSION['basket'][$this->find($id)]);
        return 'deleted';
    }

    function find($id){
        $key = array_search($id, array_column($_SESSION['basket'],'uid'));
        return $key;
    }
}