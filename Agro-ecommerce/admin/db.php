<?php

class db
{
    public function db_connect(){
        $hostName = 'localhost';
        $userName = 'root';
        $password = '';
        $dbName = 'agro_ecommerce';
        $link = mysqli_connect($hostName, $userName, $password, $dbName);
        return $link;
    }
}