<?php include("check_login.php"); ?>
<head>
<link href="CSS/style.css" rel="stylesheet">
</head>
<body>
<table width="776" border="0" align="center" cellpadding="0" cellspacing="0" class="tableBorder" bgcolor="#FFFFFF">
  <tr>
    <td>
    <?php include("navigation.php");?>
    </td>
  </tr>
	<td>             <!--其实这里的写法不是很规则，但也无妨-->
	<table width="100%"  border="0" cellspacing="0" cellpadding="0">
      <tr>
      <td valign="top" bgcolor="#FFFFFF">
        <table width="99%" height="510"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="tableBorder_gray">
        <tr>
          <td height="510" align="center" valign="top" style="padding:5px;">
          <table width="98%" height="487"  border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td height="22" valign="top" class="word_orange">当前位置：读者管理 &gt; 读者档案管理 &gt;&gt;&gt;</td>
            </tr>
            <tr>
              <td align="center" valign="top">
<?php 
include("conn/conn.php");
$sql=mysql_query("select * from library_card");
$info=mysql_fetch_array($sql);
if($info==false){
?> 
  <table width="100%" height="30"  border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td height="36" align="center">暂无读者信息！</td>
    </tr>
  </table>
  <table width="100%"  border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td>
      <a href="reader_add.php">添加读者信息</a> 
      </td>
    </tr>
  </table>
 <?php 
}else{
  ?> 
  <table width="100%"  border="0" cellspacing="0" cellpadding="0" >
  <tr>
    <td width="87%">&nbsp;
    </td>
    <td width="13%">
      <a href="reader_add.php">Add reader information</a>
    </td>	  
  </tr>
  </table>  
  <table width="96%"  border="1" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" bordercolordark="#D2E3E6" bordercolorlight="#FFFFFF" >
  <tr align="center" bgcolor="#e3F4F7">
    <td width="20%">ID</td>  
    <td width="20%">Name</td>
    <td width="20%">Company</td>
    <td width="20%">Category</td>
  </tr>
<?php 
do{
	?>
  <tr align="center">
    <td style="padding:5px;"><?php echo "   ".@$info[card_id];?> </td>  
    <td style="padding:5px;"><?php echo @$info[name];?> </td>
    <td align="center"><?php echo @$info[unit];?> </td>
    <td align="center"><?php echo @$info[type];?> </td>
    <td width="6%" align="center"><a href="reader_modify.php?id=<?php echo @$info[card_id];?>">Update</a></td>
    <td width="5%" align="center"><a href="reader_del.php?id=<?php echo @$info[card_id];?> ">Delete</a></td>
  </tr>
<?php 
  }while($info=mysql_fetch_array($sql)); 
}
?> </table>
      </td>
      </tr>
    </table>
  </td>
  </tr>
</table><?php include("copyright.php");?>
  </td>
  </tr>
</table>
</td>
  </tr>
</table>
</body>
