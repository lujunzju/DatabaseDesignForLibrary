<?php include("check_login.php");?>
<meta http-equiv="Content-Type" content="text/html; charset=gbk2312">
<head>
<link href="CSS/style.css" rel="stylesheet">
</head>
<script language="javascript">
function checkForm(form){
	for(i=0;i<form.length;i++){
		if(form.elements[i].value==""){
			alert("Please fill in the complete library information!");
			form.elements[i].focus();
			return false;
		}
	}
}
</script>
<body>
<table width="776" border="0" align="center" cellpadding="0" cellspacing="0" class="tableBorder">
  <tr>
    <td>
	<?php include ("navigation.php");?>
	</td>
  </tr>
	<td>
	<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top" bgcolor="#FFFFFF">
    <table width="99%" height="510"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="tableBorder_gray">
  <tr>
    <td height="510" valign="top" style="padding:5px;">
    <table width="98%" height="487"  border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td height="22" valign="top" class="word_orange"> Current Location: System Settings &gt; Library Info &gt;&gt;&gt; </td>
      </tr>
      <tr>
        <td align="center" valign="top">
        <table width="100%"  border="0" cellspacing="0" cellpadding="0">
          <tr>
          <td width="84%">&nbsp;</td>
          </tr>
        </table>  
        <table width="100%"  border="0" cellspacing="0" cellpadding="0">
          <tr>
          <td width="84%">&nbsp;</td>
          </tr>
        </table>  
<form name="form1" method="post" action="library_ok.php">
<?php 
include("conn/conn.php");
mysql_query("SET NAMES 'utf8'");
$sql=mysql_query("select * from library");
$info=mysql_fetch_array($sql);
?>
  <table width="58%"  border="0" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" bordercolordark="#D2E3E6" bordercolorlight="#FFFFFF">
  <tr align="center">
    <td width="20%" align="left" style="padding:5px;"> Library Name: </td>
    <td width="80%" align="left">
      <input name="libraryname" type="text" id="libraryname" value="<?php echo @$info[library_name];?>" size="30">
    </td>
    <tr>
    <td align="left" style="padding:5px;"> Curator: </td>
    <td align="left"><input name="curator" type="text" id="curator" size="30" value="<?php echo @$info[curator];?>" ></td>
    </tr>
    <tr>
      <td align="left" style="padding:5px;"> Contact: </td>
      <td align="left"><input name="tel" type="text" id="tel" size="30" value="<?php echo @$info[phone];?>"></td>
    </tr>
    <tr>
      <td align="left" style="padding:5px;"> Address: </td>
      <td align="left"><input name="address" type="text" id="address" size="30" value="<?php echo @$info[address];?>"></td>
    </tr>
    <tr>
      <td align="left" style="padding:5px;"> E-mail�� </td>
      <td align="left"><input name="email" type="text" id="email" size="30" value="<?php echo @$info[email];?>"></td>
    </tr>
    <tr>
      <td align="left" style="padding:5px;"> Website: </td>
      <td align="left"><input name="url" type="text" id="url" size="30" value="<?php echo @$info[url];?>"></td>
    </tr>
    <tr>
      <td align="left" style="padding:5px;"> Library building time: </td>
      <td align="left"><input name="createDate" type="text" id="createDate" size="30" value="<?php echo @$info[create_date];?>"></td>
    </tr>
    <tr>
      <td height="84" align="left" style="padding:5px;"> Library Introduction: </td>
      <td align="left"><textarea name="introduce" cols="50" rows="5" class="wenbenkuang" id="introduce"><?php echo @$info[introduce];?></textarea></td>
    </tr>
    <tr>
      <td height="65" align="left" style="padding:5px;">&nbsp;</td>
      <td>        &nbsp;
          <input name="Submit" type="submit" class="btn_grey" id="Submit" value="����" onClick="return checkForm(form1)">
          <input name="Submit2" type="reset" class="btn_grey" id="Submit2" value="ȡ��">
      </td>
    </tr>
</table>
</form>
      </td>
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
