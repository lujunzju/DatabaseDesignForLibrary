<?php
session_start();
if($_SESSION['admin_name']==""){
	echo "<script>alert('�Բ�����ͨ����ȷ��;����ͼ��ݹ���ϵͳ!');window.location.href='login.php';</script>";
}
?>