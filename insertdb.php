<?php
include 'Classes/conn.php';
require_once 'Classes/PHPExcel.php';
require_once 'Classes/PHPExcel/IOFactory.php';
require_once 'Classes/PHPExcel/Reader/Excel2007.php';

$objReader = PHPExcel_IOFactory::createReader('Excel2007');//use excel2007 for 2007 format 
//$filename="test.xlsx";//指定excel文件
$objPHPExcel = $objReader->load($_POST["file"]); //$filename可以是上传的文件，或者是指定的文件
$sheet = $objPHPExcel->getSheet(0); 
$highestRow = $sheet->getHighestRow(); // 取得总行数 
$highestColumn = $sheet->getHighestColumn(); // 取得总列数
//循环读取excel文件,读取一条,插入一条
//j表示从哪一行开始读取
//$a表示列号
for($j=2;$j<=$highestRow;$j++)
{
    $a = $objPHPExcel->getActiveSheet()->getCell("A".$j)->getValue();//获取A列的值
    $b = $objPHPExcel->getActiveSheet()->getCell("B".$j)->getValue();//获取B列的值
    $c = $objPHPExcel->getActiveSheet()->getCell("C".$j)->getValue();//获取C列的值
    $d = $objPHPExcel->getActiveSheet()->getCell("D".$j)->getValue();//获取C列的值
    $sql =" INSERT INTO `test` (`first`, `second`, `third`, `fourth`) VALUES ('".$a."',' ".$b."',' ".$c."',' ".$d."')";
    mysqli_query($conn, $sql); 
}
echo "插入成功";
