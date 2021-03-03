<?php

namespace basket;

require_once 'sessionBasket.php';

class AddToBasket
{
    function fetchById($id){
        $json = file_get_contents('database/products.json');
        $data = json_decode($json,true);
        return ($data[$id]);
    }

    function isadd($id){
        if (isset($_SESSION['basket']) and count($_SESSION['basket']) > 1){
            $key = array_search($id, array_column($_SESSION['basket'],'uid'));
            if ($key){
                return $key;
            }
        }

    }

    function howMuchInBasket($id){
        return $_SESSION['basket'][$id]['amount'];
    }


    public function add($id,$amount){
        $product = $this->fetchById($id);
        if ($product['stock'] < $amount){
            return 'We dont have enouhg this product :(';
        }else{
            if (isset($_SESSION['basket'])){
                $key = array_search($id, array_column($_SESSION['basket'],'uid'));
            }else{
                $key = "";
            }
            if (is_numeric($key)){
                if ($product['stock'] < ($_SESSION['basket'][$key]['amount'] + $amount)){ // evet ekli
                    return 'We dont have enouhg this product :(';
                }else{
                    $_SESSION['basket'][$id]['amount'] = $this->howMuchInBasket($key) + $amount;
                    return 'Updated';
                }
            }else{
                $list = [
                    "uid"=>$id,
                    "category"=>$product['category'],
                    "title"=>$product['title'],
                    "features"=>$product['features'],
                    "price"=>$product['price'],
                    "amount"=>$amount,
                    "currency"=>$product['currency'],
                ];
                $_SESSION['basket'][] = $list;
                return 'Added';
            }

        }
    }
}