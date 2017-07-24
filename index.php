<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="insertdb.php" method="post">
        <h3>从excel导入</h3>
            <input type="file" name="file">
            <input type="submit" value="导入">
        </form>
        <form action="exportToExcel.php" method="post">
        <h3>从数据库导出</h3>
            <input type="submit" value="导出"> 
        </form>
    </body>
</html>
