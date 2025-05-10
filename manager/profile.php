<?php
$page ='manager_profile';
 include (dirname(__DIR__)."/function/function.php");
CallHeader();

if ((!isset(	$_SESSION ['admin_login_success'])) && (!isset($_SESSION ['manager_login_success'])))
{
	$_SESSION ['error_msg'] = "You must login first. ";
	header ("Location:manager_login.php");
	die (mysqli_error($connect));
}
include ("../php/connection.php");
if($connect){

session_start();
$logged_ManagerID=$_SESSION ['logged_ManagerID'];
$data_select="SELECT * FROM mess_manager WHERE id=$logged_ManagerID";
$data_store=mysqli_query($connect,$data_select);
$team_details=mysqli_fetch_assoc($data_store);
}
?>

<div class="container">
	<div  class="row">
		<div class="col-sm-10 col-sm-offset-1">

			</br>
		</br>
		<h2 class  = "text-center">  <?php echo $team_details['mess_name']; ?> (<?php echo $team_details['id']; ?>)</h2>


</br>
         <table class="table">   
             <tr>
                <th width="200px"  class="text-right"> Manager Name:</th>
                <td><?php echo $team_details['name']; ?> </td>
            </tr>
            <tr>
                <th width="200px"  class="text-right"> Mobile No:</th>
                <td><a href="tel:<?php echo $team_details['mobile']; ?>"> <?php echo $team_details['mobile']; ?> </a></td>
            </tr>
            <tr>
                <th width="200px"  class="text-right"> Email Address:</th>
                <td><a href="mailto:<?php echo $team_details['email']; ?>" ><?php echo $team_details['email']; ?></a></td>
            </tr>
            <tr>
                <th width="200px"  class="text-right"> Date of Birth:</th>
                <td><?php $d=$team_details['birthday'];echo date("jS M, Y", strtotime("$d")); ?> </td>
            </tr>
            <tr>
                <th width="200px"  class="text-right"> Registration Date:</th>
                <td><?php echo $team_details['reg_date']; ?> </td>
            </tr>
        </table>  
<p class="text-center"><a href="index.php" class="btn btn-primary">Go Mess Profile</a></p>
</div>

</div><!--col-md-10-->
</div><!--row-->
</div>	<!--container--> 
<?php
CallFooter();
?>