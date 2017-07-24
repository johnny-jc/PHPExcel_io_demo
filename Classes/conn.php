<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$localhost = 'localhost';
$username = 'root';
$password = '';
$database = 'jiubujian';

$conn = mysqli_connect($localhost, $username, $password,$database) or die("数据库连接错误". mysqli_error());

mysqli_query($conn,'set names utf8');

//echo 'success';

//    $sql = "INSERT INTO `test` (`first`, `second`, `third`, `fourth`) VALUES ('2', '4', '5', '6')";
//    mysqli_query($conn, $sql);
//    if(!(mysqli_query($conn, $sql))){
//        echo "失败". mysqli_error($conn);
//    }

