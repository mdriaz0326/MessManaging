<?php
$page = 'monthly_bazar_list';
include ("$_SERVER[DOCUMENT_ROOT]/mess_bazar/function/function.php");
OnlyMemberEntry('manager/login.php');
CallHeader();
GetConn();
session_start();
$logged_ManagerID=$_SESSION ['logged_ManagerID'];

	 $query = "SELECT * FROM daily_bazar WHERE ManagerID=$logged_ManagerID ORDER BY purchases_date DESC";
	 $match=mysqli_query ($connect,$query);
  
?>

	 <div class="container">
	 <div class="row">
	 <div class="col-sm-12">
	 	 	 	 <div  class="col-sm-8 col-sm-offset-2 well">

	 	 <table class="table table-hover table-striped">
	 	 <thead>
      <tr>
	 	 <th>Serial</th>
	 	 <th>Date</th>
	 	 <th>Purchase Person</th>
	 	 <th>Action</th>
      </tr>
	 	 </thead>
	 	 <tbody>
	 	 <!--php loop start-->
	 	 <?php
	 	 $i = 0;
	 	 while ($rows=mysqli_fetch_array($match)){	

	 	 $i++;
	 	 ?>
	 	 <tr>
	 	<td><?php echo $i; ?></td> 
	 	<td><?php echo $rows['purchases_date']; ?>
    </td> 
	 	<td><?php

 $s=$rows['purchasers'];
$details=GetNamebyID(mess_member,id,$s);
echo $details['name'];

 ?>	 	</td> 
	 	<td>
	 <a href="bazar_details.php?token=<?php echo $rows['token_no']; ?>"  class="btn btn-info">Details</a>
	 	</td> 
	 	 </tr>
	 	 <?php	 } ?>
	 	 </tbody>
	 	 </table>
	 	 
	 	 </br>	
	 	 </br>	

	 <p class="text-bold bg-info text-center h3"> The total purchase has been cut <b>
  <?php echo $i; ?> </b>times.</p>	 
	 	 </div>
	 	 </div><!--col-md-12-->
	 </div><!--row-->
	 </div>	<!--container--> 
	<?php
CallFooter();
?>