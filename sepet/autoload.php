<?php

// burada, namespace kullanımından dolayı gelen ismi (basket) str_replace ile çıkarmak zorunda kaldım
// doğru kullanımın bu olduğunu sanmıyorum.
// todo Burda soracağım bir yer var!

spl_autoload_register(function($className) {
    $ds = DIRECTORY_SEPARATOR;
    $className = str_replace("basket\\", "", $className);
    include_once $_SERVER['DOCUMENT_ROOT'] . $ds.'sepet'.$ds.'class'.$ds . $className . '.php';
});

