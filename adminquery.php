<?php
include_once("config/config.php");  
include('Adminheader.php');
include_once('phpmailer/class.smtp.php');
include_once('phpmailer/class.pop3.php');
include_once('email.class.inc.php');
error_reporting(0);

	$configVars = array();
	$configVars['my_email'] = 'packtemp1@gmail.com';
	$configVars['user_name'] = 'packtemp1@gmail.com';
	$configVars['password'] = 'owjmhdvikpxlunts';


function sendMail($param){
		  $message = '
			<html>
			  <body bgcolor="#DCEEFC">
			    <center>
				'.$param['message'].'
				Thanks
  			    </center>
			  </body>
			</html>';
	   sendOrderMail($message);
	}



mysql_connect("localhost","root","")  or die(mysql_error());
mysql_select_db("placement")  or die(mysql_error());
		if(isset($_POST['register']))
		{
		if ($_POST['p11']=="")
			{
			$query = "select * from student where tenth_CGPA>=".$_POST['p8']." and twelth_CGPA>=".$_POST['p9']." and UG_CGPA>=".$_POST['p10']." and Specialization1 ='".$_POST['p12']."' and Year_of_passing3='".$_POST['p13']."'";
			}
			else
			{
$query = "select * from student where tenth_CGPA>=".$_POST['p8']." and twelth_CGPA>=".$_POST['p9']." and UG_CGPA>=".$_POST['p10']." and PG_CGPA>=".$_POST['p11']." and Specialization2='".$_POST['p12']."' and Year_of_passing='".$_POST['p13']."'";
			}
		
		//echo $query;exit; 
		$result = mysql_query($query) or die(mysql_error());
			$result = mysql_query($query) or die(mysql_error());
		}



		if(isset($_POST['send']))
		{
		if ($_POST['p11']=="")
			{
			$query = "select * from student where tenth_CGPA>=".$_POST['p8']." and twelth_CGPA>=".$_POST['p9']." and UG_CGPA>=".$_POST['p10']." and Specialization1 ='".$_POST['p12']."' and Year_of_passing3='".$_POST['p13']."'";
			}
			else
			{
$query = "select * from student where tenth_CGPA>=".$_POST['p8']." and twelth_CGPA>=".$_POST['p9']." and UG_CGPA>=".$_POST['p10']." and PG_CGPA>=".$_POST['p11']." and Specialization2='".$_POST['p12']."' and Year_of_passing='".$_POST['p13']."'";
			}
		
		echo $query;
		//exit; 
		$result = mysql_query($query) or die(mysql_error());
			$result = mysql_query($query) or die(mysql_error());

		  while($row=mysql_fetch_array($result))
			{
			$html="";
			
		//	$html .= 'Name:'.$row['first_name'].'<br />';
		//	$html .= 'Phone NO:'.$row['phone'].'<br />';
		  //  $html .= 'Address:'.$row['address'].'<br />';
			//$html .= 'Country:'.$row['country'].'<br />';
			 $html .= 'Congratulations '.$row['First_Name'].' Your Interview Details<br />';
			$html .= 'Company Name : '.$_POST['p2'].'<br />';
			$html .= 'Address : '.$_POST['p3'].'<br />';
			$html .= 'Website : '.$_POST['p4'].'<br />';
			$html .= 'Contact Number : '.$_POST['p5'].'<br />';
			$html .= 'Interview Date : '.$_POST['p6'].'<br />';
			$email = new Email();
			$email->set_from($configVars['my_email']);
			$email->set_from_name('Acknowledgement Mail');		
			$email->set_subject('Interview Notification');
			$email->set_message(html_entity_decode($html.'<br /><br />'));

		 $email->add_to($row['Email_ID']);
		 $sent_flag = $email->send();
			}

		}

?>	

<div align="center">
<script type="text/javascript">	
  $(document).ready(function(){
    $("#register_form").validate();
  });
	
</script>
<form action="adminquery.php" name="register_form"  id="register_form"  method="post">
	
	<table border="0" cellspacing="4" cellspadding="4"  bgcolor="White" class="displaycontent"  width="500">
	<caption></caption>
	<tr>
		<th colspan="2">  Short List Details</th>
		<br>
	</tr>
	<tr>
		<td class="col">Shortlist Id:</td>
		<td><input type="text" name="p1"  value="" /></td>
	</tr>

	<tr>
		<td class="col">Company Name:</td>
		<td><input type="text" name="p2" value="<?php echo $_POST['p2']; ?>" class="required" /></td>
	</tr>
	<tr>
		<td class="col">Address:</td>
		<td><input type="text" name="p3" value="<?php echo $_POST['p3']; ?>" class="required"  /></td>


	</tr>
	<tr>
		<td class="col">Website:</td>
		<td><input type="text" name="p4" value="<?php echo $_POST['p4']; ?>" class="required" /></td>
	</tr>
	
	<tr>
		<td class="col">Contact Number:</td>
		<td><input type="text" name="p5" value="<?php echo $_POST['p5']; ?>" class="required"  /></td>
	</tr>
	<tr>
		<td class="col">Interview Date:</td>
		<td><input type="text" name="p6" value="<?php echo $_POST['p6']; ?>" class="required" /></td>
	</tr>
	<tr>
		<td class="col"  >Venue:</td>
		<td><input type="text" class="required" name="p7" value="<?php echo $_POST['p7']; ?>" /></td>
	</tr>
	<tr>
		<td class="col">10th %:</td>
		<td><input type="text" name="p8" value="<?php echo $_POST['p8']; ?>" class="required"  /></td>
	</tr>
	<tr>
		<td class="col">12th %:</td>
		<td><input type="text" name="p9" value="<?php echo $_POST['p9']; ?>" class="required" /></td>
	</tr>
	<tr>
		<td class="col"  >UG %:</td>
		<td><input type="text" class="required" name="p10" value="<?php echo $_POST['p10']; ?>" /></td>
	</tr>
	<tr>
		<td class="col"  >PG %:</td>
		<td><input type="text" class="required" name="p11" value="<?php echo $_POST['p11']; ?>" /></td>
	</tr>
	<tr>
		<td class="col"  >Specialization:</td>
		<td><input type="text" class="required" name="p12" value="<?php echo $_POST['p12']; ?>" /></td>
	</tr>
	<tr>
		<td class="col"  >Year Of Passing:</td>
		<td><input type="text" class="required" name="p13" value="<?php echo $_POST['p13']; ?>" /></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td >
			<input type="submit" name="register" value="Apply Filter" />
		     	<input type="submit" name="send"  value="Submit" />
		</td>
	</tr>

		
	</table>

	<table border="2" cellspacing="6" class="displaycontent" width="800" style="border:10px solid Darkblue;" align="center">
	<tr>
			<table border="2" cellspacing="6" class="displaycontent" width="800" style="border:10px solid Darkblue;" align="center">
	<tr>
			
			<th bgcolor=Orange><font color=white size=2>Roll No</font></th>
			<th bgcolor=Orange><font color=white size=2>First Name </font></th>
			<th bgcolor=Orange><font color=white size=2>Last Name </font></th>
			<th bgcolor=Orange><font color=white size=2>Mobile Number</font></th>
			<th bgcolor=Orange><font color=white size=2>Email ID </font></td>
			<th bgcolor=Orange><font color=white size=2>Date of Birth </font></th>
			
			
		            
	</tr>

<?php
    while($row=mysql_fetch_array($result))
	{
?>
	<tr>		
       	<td bgcolor=white><font color=#000000 size=2><?php echo $row['Roll_no']; ?></font></td>
		<td bgcolor=white><font color=#000000 size=2><?php echo $row['First_Name']; ?></font></td>
		<td bgcolor=white><font color=#000000 size=2><?php echo $row['Last_Name']; ?></font></td>
 		<td bgcolor=white><font color=#000000 size=2><?php echo $row['Mobile_Number']; ?></font></td>
       	<td bgcolor=white><font color=#000000 size=2><?php echo $row['Email_ID']; ?></font></td>
		<td bgcolor=white><font color=#000000 size=2><?php echo $row['Date_of_birth']; ?></font></td>	
       	
			
	</tr>
				<?php
		}	

?>	

		
	</table>

	<div    align="center">
	<center >
	<?php include_once("footer.php")?>
</div>	   <!-- End container -->		
</div>	<!-- End row -->	
</div>
</div>




