<?php
$page = 'bazar_list';
include ("$_SERVER[DOCUMENT_ROOT]/mess_bazar/function/function.php");
OnlyMemberEntry('manager/login.php');
CallHeader();
include("php/connection.php");

session_start();
$logged_ManagerID =    $_SESSION ['logged_ManagerID'] ;

$query = "SELECT * FROM bazar_list WHERE ManagerID=$logged_ManagerID";
$match=mysqli_query ($connect,$query);


?>


	 <div class="container">
	 <div class="row">
         <div class="col-sm-12">
        

	 	 	 	 <div  class="col-sm-10 col-sm-offset-1 well">
<div>
<p class="h3 text-center">Monthly Bazar List</p>
<hr style="margin-top:0 ;"></hr>

</div>
	 	 <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Serial</th>
      <th scope="col">Date of Purchase</th>
      <th scope="col">Purchaser's Name </th>
      <th scope="col">Token No. </th>
      <th scope="col">Status</th>
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
      <th scope="row"><?php echo $i; ?></th>
      <td>
<?php 
$dt= $rows['date']; 
$new_date = date('d-M-Y', strtotime($dt));
echo $new_date;
?>
    </td>
      <td>
<a href="members/view.php?id=
<?php echo $rows['purchasers']; ?>">

<?php 
$s=$rows['purchasers'];
$details=GetNamebyID(mess_member,id,$s);
echo $details['name'];
?>
</a>
</td>
      <td><?php echo $rows['token_no']; ?></td>
    <td>  
<?php
if($rows['status']==1){

?>
<a href="bazar_details.php?token=<?php echo $rows['token_no'] ?>" class="btn btn-info">View</a>
<?php } ?>
</td>
    </tr>
<?php } ?>
  </tbody>
</table>
            </div><!--col-12-->
	 			 </div><!--col-md-8-->
	 </div><!--row-->
	 </div>	<!--container--> 
<?php
CallFooter();
?>