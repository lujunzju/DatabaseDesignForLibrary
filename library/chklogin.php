<?php
session_start();
$A_name=$_POST['name'];          //接收表单提交的用户名
$A_pwd=$_POST['pwd'];            //接收表单提交的密码

class chkinput{                //定义类
   var $name; 
   var $pwd;

   function chkinput($x,$y){
     $this->name=$x;
     $this->pwd=$y;
    }

   function checkinput(){
     include("conn/conn.php");   		  //连接数据源    
     $sql=mysql_query("select * from admin where admin_id='".$this->name."' and password='".$this->pwd."'",$conn);
     $info=mysql_fetch_array($sql);       //检索管理员名称和密码是否正确
     if($info==false){                    //如果管理员名称或密码不正确，则弹出相关提示信息
          echo "<script language='javascript'>alert('The administrator name you entered is incorrect. Please re-enter!');history.back();</script>";//history back();返回上一页
          exit;
       }
      else{                              //如果管理员名称或密码正确，则弹出相关提示信息
          echo "<script>alert('Admin login success!');window.location='logined.php';</script>";
		  $_SESSION[admin_id]=$info[admin_id];
		 $_SESSION[admin_name]=$info[name];
		 $_SESSION[pwd]=$info[pwd];
   }
 }
}
    $obj=new chkinput($A_name,$A_pwd);      //创建对象
    $obj->checkinput();          				    //调用类
?>
