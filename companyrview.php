<?php
 include_once("config/config.php");  

 include_once("Userheader.php"); 
 error_reporting(0);

 ?>

	

<form action="companyrview.php" name="ViewInterview" class="row" method="post">
	<div align="center">
	<center>
<h2><center> Company Details </center></h2></center>
	<table border="2" cellspacing="6" class="displaycontent" width="800" style="border:10px solid Darkblue;" align="center">
	<tr>
			<th bgcolor=Orange><font color=white size=2>Company Id</font></th>
			<th bgcolor=Orange><font color=white size=2>Company Name</font></th>
			<th bgcolor=Orange><font color=white size=2>Contact Person</font></th>
			<th bgcolor=Orange><font color=white size=2>Contact Number </font></th>
			<th bgcolor=Orange><font color=white size=2>Website</font></th>
			<th bgcolor=Orange><font color=white size=2>Number of Employees </font></th>
			<th bgcolor=Orange><font color=white size=2>Address </font></th>
		
			
	      
	</tr>

	<?php
	
	$query = "select * from companydetails";
	$result = mysql_query($query) or die(mysql_error());
	while($row = mysql_fetch_assoc($result))
		{
 ?>
	<tr>
		<td bgcolor=white><font color=#000000 size=2><?php echo $row['CompanyId']; ?></font></td>	
       	<td bgcolor=white><font color=#000000 size=2><?php echo $row['CompanyName']; ?></font></td>
		<td bgcolor=white><font color=#000000 size=2><?php echo $row['ContactPerson']; ?></font></td>
		<td bgcolor=white><font color=#000000 size=2><?php echo $row['ContactNumber']; ?></font></td>
		<td bgcolor=white><font color=#000000 size=2><?php echo $row['Website']; ?></font></td>	
       	<td bgcolor=white><font color=#000000 size=2><?php echo $row['Numberofemp']; ?></font></td>
		<td bgcolor=white><font color=#000000 size=2><?php echo $row['Address']; ?></font></td>
		
 	
	</tr>
			<?php }  ?>
	</table>
</div>
</form>
	 
<?php 
	include_once("footer.php")
	?>	

</div>	<!-- End row -->	
</div>

</div>



