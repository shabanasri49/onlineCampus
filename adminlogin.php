<?php
 include_once("config/config.php"); 
 if(isset($_POST['login'])){
	$t=time();
	$dt=date("Y-m-d",$t);
	$time=date("h:i:sa");
	$set=$dt.':'.$time;
	if($_POST['email_id']="user1" && $_POST['password']="user1"){
	$_SESSION['loggedIn']='user1';
	$query="insert into finishedtask (Userid,login) VALUES('".$_SESSION['loggedIn']."','".$set."')";
	$result=mysql_query($query);
	$row=mysql_fetch_array($result);
	 echo '<script> alert("LOGIN SUCCESS");</script>';
	 header('location:adminhome.php');
	 }
 }
 
include_once("header.php"); 
?>
<script type="text/javascript">	
  $(document).ready(function(){
    $("#login_form").validate();
  });
</script>
<div align="center">
	<form action="" name="login_form" id="login_form"  method="post">
	<img src="login.png" width="300" height="200">
	<br />
	<table border="0"  class="displaycontent" bgcolor="Silver" >
	<caption><?php echo $_SESSION['message'];$_SESSION['message']=''; ?></caption>
	<tr>
		<th colspan="2">Placement Officer Login</th>
	<tr>
	<tr>
		<td class="col">User ID:</td>
		<td><input type="text" name="email_id" value="" /></td>
	</tr>
	<tr>
		<td  class="col">Password:</td>
		<td><input type="password" name="password" value="" class="required"/></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td >
			<input type="submit" name="login" value="Login" />
		     	<input type="Reset"  value="Reset" />
			
		</td>
	</tr>
	<tr><td colspan="2">&nbsp;</td></tr>
	<tr>
	<td>
		
		</td>
	</tr>
	</table>
	</form>
<?php include_once("footer.php");?>