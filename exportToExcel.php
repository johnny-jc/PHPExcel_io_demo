<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//引入文件
include 'Classes/conn.php';
include 'Classes/PHPExcel.php';
include_once('Classes/PHPExcel/Writer/Excel2007.php');
include_once('Classes/PHPExcel/Writer/Excel5.php');
include_once('Classes/PHPExcel/IOFactory.php');

$fileName = 'test';
$headArr = array("first","second","third","fourth");
////表格数组
$sql = 'select * from test';
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_all($result);

getExcel($fileName, $headArr, $data);
       
       
function getExcel($fileName,$headArr,$data){
    if(empty($data) || !is_array($data)){
        die("data must be a array");
    }
    if(empty($fileName)){
        exit;
    }
    $date = date("Y_m_d",time());
    $fileName .= "_{$date}.xls";
 
    //创建新的PHPExcel对象
    $objPHPExcel = new PHPExcel();
    $objProps = $objPHPExcel->getProperties();
     
    //设置表头
    $key = ord("A");
    foreach($headArr as $v){
        $colum = chr($key);
        $objPHPExcel->setActiveSheetIndex(0) ->setCellValue($colum.'1', $v);
        $key += 1;
    }
     
    $column = 2;
    $objActSheet = $objPHPExcel->getActiveSheet();
    foreach($data as $key => $rows){ //行写入
        $span = ord("A");
        foreach($rows as $keyName=>$value){// 列写入
            $j = chr($span);
            $objActSheet->setCellValue($j.$column, $value);
            $span++;
        }
        $column++;
    }
 
    $fileName = iconv("utf-8", "gb2312", $fileName);
    $objPHPExcel->getActiveSheet()->setTitle('test');
    $objPHPExcel->setActiveSheetIndex(0);

       header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
       header("Content-Disposition: attachment; filename=\"$fileName\"");
       header('Cache-Control: max-age=0');
       $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
       $objWriter->save('php://output'); //文件通过浏览器下载
       exit;}
       

       