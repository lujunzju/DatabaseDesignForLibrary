<?php
session_start();
include("conn/conn.php");
@$backTime=date("Y-m-d");        //归还图书日期
@$borrid=$_GET[borrid];
@$book_id=$_GET[barcode];
@$result=mysql_query("update record set return_time='$backTime' where id='$borrid'");
@$result2=mysql_query("update book_number set number=number+1 where book_id='$book_id'");
if($result == true){
	echo "<script language='javascript'>alert('图书归还操作成功！');window.location.href='bookBack.php';</script>";
}
else{
	echo $borrid;
}
?>
