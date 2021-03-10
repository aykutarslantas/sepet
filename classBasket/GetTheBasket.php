<?php


namespace classBasket;


class GetTheBasket
{
    function fecthData(){
        $json = file_get_contents('database/products.json');
        $data = json_decode($json);
        return ($data);
    }

}