<?php include("check_login.php");?>
<html>
<head>
<link href="CSS/style.css" rel="stylesheet">
</head>
<body>
<table width="776" border="0" align="center" cellpadding="0" cellspacing="0" class="tableBorder">
  <tr>
    <td>
	<?php include("navigation.php");?>
	</td>
	</tr>
	<td>
	<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top" bgcolor="#FFFFFF">
    <table width="99%" height="510"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="tableBorder_gray">
  <tr>
    <td height="510" align="center" valign="top" style="padding:5px;">
    <table width="98%" height="487"  border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td align="center" valign="top">
		<script language="javascript">
		function checkreader(form){
			if(form.barcode.value==""){
				alert("请输入读者条形码!");form.barcode.focus();return;
			}
			form.submit();
		}
		</script>
<form name="form1" method="post" action="">
		<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tableBorder_gray">
   <tr align="left"><td align="left"><span class="word_orange">&nbsp;当前位置：图书借还 &gt; 图书归还&gt;&gt;&gt; </span></td></tr>
   <tr>
     <td valign="top"><table width="100%" border="0" cellpadding="02" cellspacing="2" bordercolor="#E3F4F7">
       <tr>
         <td height="33" background="Images/bookgh.gif">&nbsp;</td>
       </tr>
       <tr>
         <td valign="top" bgcolor="#D2E6F1">
<?php 
include("conn/conn.php");
$barcode=@$_POST[barcode];
$sql=mysql_query("select * from library_card,book,record where library_card.card_id = record.card_id and record.book_id = book.book_id and library_card.card_id = '$barcode'");
$info=mysql_fetch_array($sql);
?>
		 <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
           <tr>
             <td width="33%"><table width="100%" height="74" border="0" cellpadding="0" cellspacing="0">
               <tr>
                 <td height="27" colspan="2" align="center"><table width="90%" height="21" border="0" cellpadding="0" cellspacing="0">
                   <tr>
                     <td width="132" background="Images/bg_line.gif">&nbsp;</td>
                     <td>&nbsp;</td>
                   </tr>
                 </table></td>
               </tr>
               <tr>
                 <td width="8%" height="27">&nbsp;</td>
                 <td width="92%">读者卡号：</td>
               </tr>
               <tr>
                 <td height="27" colspan="2" align="center">
                 <input name="barcode" type="text" id="barcode" value="<?php echo $barcode;?>" size="24">
                   &nbsp;
                   <input name="Button" type="button" class="btn_grey" value="确定" onClick="checkreader(form1)"></td>
               </tr>
             </table></td>
             <td width="1%" align="center" valign="bottom"><img src="Images/borrow_fg.gif" width="18" height="111"></td>
             <td width="66%" align="right">
			 <table width="96%" border="0" cellpadding="0" cellspacing="0">
               <tr>
                 <td height="27">姓&nbsp;&nbsp;&nbsp;&nbsp;名：
                       <input name="readername" type="text" id="readername" value="<?php echo @$info[name];?>"></td>
               </tr>
               <tr>
                 <td height="27">单&nbsp;&nbsp;&nbsp;&nbsp;位：
                   <input name="unit" type="text" id="unit" value="<?php echo @$info[unit];?>"></td>
               </tr>
               <tr>
                 <td height="27">读者类型：
                   <input name="readerType" type="text" id="readerType" value="<?php echo @$info[type];?>"></td>
               </tr>
             </table>			 </td>
           </tr>
         </table>		 </td>
       </tr>
       <tr>
         <td valign="top" bgcolor="#D2E5F1">
         <table width="100%" height="35" border="1" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#D2E3E6" bgcolor="#FFFFFF">
                   <tr align="center" bgcolor="#e3F4F7">
                     <td width="24%" height="25" bgcolor="#F0FAFB">图书名称</td>
                     <td width="12%" bgcolor="#F0FAFB">借阅时间</td>
                     <td width="13%" bgcolor="#F0FAFB">应还时间</td>
                     <td width="14%" bgcolor="#F0FAFB">出版社</td>
                     <td width="12%" bgcolor="#F0FAFB">作者</td>
                     <td bgcolor="#F0FAFB">定价(元)</td>
                     <td width="12%" bgcolor="#F0FAFB"><input name="Button22" type="button" class="btn_grey" value="完成归还" onClick="window.location.href='bookBack.php'"></td>
                   </tr>
<?php
 do{
	 if(@$info[borrow_time] != NULL && @$info[return_time] == NULL){
	 ?>
                   <tr>
                     <td height="25" style="padding:5px;">&nbsp;<?php echo @$info[book_name];?></td>
                     <td style="padding:5px;">&nbsp;<?php echo @$info[borrow_time];?></td>
                     <td style="padding:5px;">&nbsp;<?php echo '1 month later';?></td>
                     <td align="center">&nbsp;<?php echo @$info[press];?></td>
                     <td align="center">&nbsp;<?php echo @$info[author];?></td>
                     <td width="13%" align="center">&nbsp;<?php echo @$info[author];?></td>
                     <td width="12%" align="center"><a href="bookBack_ok.php?borrid=<?php echo @$info[id];?>&barcode=<?php echo @$info[book_id];?>">归还</a>&nbsp;</td>
                   </tr>
<?php
		 }
}while($info=mysql_fetch_array($sql));
 ?>
                 </table>                 </td>
       </tr>
     </table></td>
   </tr>
</table>
 </form> </td>
      </tr>
    </table>
</td>
  </tr>
</table><?php include("copyright.php");?></td>
  </tr>
</table>
</td>
</tr>
</table>
</body>
</html>
