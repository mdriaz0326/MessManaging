<?php
$page = 'member_profile_view';
include ("$_SERVER[DOCUMENT_ROOT]/mess_bazar/function/function.php");
OnlyMemberEntry('../manager/login.php');
CallHeader();
GetConn();
$id = $_GET ["id"];
	
$exists = mysqli_query($connect,"select 1 from member_profile");
	if($exists !== FALSE){
       $info_tbl= GetNamebyID(member_profile,MemberID,$id);
       if($info_tbl['name']!=NULL){
             $details=$info_tbl;
}
else{
$details= GetNamebyID(mess_member,id,$id);

        }
  }
else{
$details= GetNamebyID(mess_member,id,$id);


}



 ?>



 	 <div class="container">
	 <div  class="row">
<div  class="col-sm-12">
	 <div  class="col-sm-6 well">
<h2 class  = "text-center">Profile</h2>
	 	 </br>
	 	 <table class="table">
	 	 
	 	 
	 	 <tr><th  class="text-right"> Name:</th><td><?php echo $details['name']; ?> </td></tr>
	 	 
	 	 <tr><th class="text-right"> Mobile No:</th><td>
<a href="tel:<?php echo $team_details['mobile']; ?>"> <?php echo $details['mobile']; ?> </a></td></tr>

<tr><th class="text-right"> Email Address:</th><td><a href="mailto:<?php echo $team_details['email']; ?>" ><?php echo $details['email']; ?></a> </td></tr>
	 	 
	
	 	 <tr><th class="text-right"> Date of Birth:</th><td><?php $d=$details['bd'];
echo date("jS M, Y", strtotime("$d")); ?> </td></tr>
	 	 
	 	 <tr><th class="text-right "> Blood Group:</th><td class="" style="color:red;"><?php echo $details['blood']; ?> </td></tr>

<tr><td class="text-center" colspan="2"><a href="update_profile.php?id=<?php echo $id; ?> " class="btn btn-primary">Update Info</a></td></tr>
	 
	 	 	 	 
</table>	 	 

   </div><!--col-sm-6-->

<div class="col-sm-5 col-sm-offset-1 well">

<table class="table">   
<thead> 
<h3 class="text-center">Cash Info</h3>
</thead>
<tbody>
<?php 
session_start();
$logged_ManagerID=$_SESSION ['logged_ManagerID'];
$datas= GetTableInfo(daily_meal,ManagerID,$logged_ManagerID);
$tmeal=0;
foreach ($datas as $data) {
$tmealall+=$data['total_meal'];
}
$datas= GetTableInfo(daily_bazar,ManagerID,$logged_ManagerID);
$sum_all=0;
foreach ($datas as $data) {
$sum_all+=$data['total'];
}

$meal_rate=number_format($sum_all/$tmealall,2);

$datas= GetMemTableInfo(daily_meal,person,$id);
$tmeal_one=0;
foreach ($datas as $data) {
$tmeal_one+=$data['total_meal'];
}
$cost_one=$meal_rate*$tmeal_one;

$datas= GetMemTableInfo(balance_deposit,depositor,$id);
$deposit_one=0;
foreach ($datas as $data) {
$deposit_one+=$data['amount'];
}
?>


    <tr>
      <th class="text-right">Meal Rate (For All):</th>
      <td><b><?php echo $meal_rate; ?> </b>Taka</td>
    </tr>
    <tr>
      <th class="text-right">Total Meal:</th>
      <td><b><?php echo $tmeal_one; ?> </b>(s)</td>
    </tr>
             <tr>
                <th   class="text-right"> Total Cost:</th>
                <td>
<?php
echo number_format($cost_one,2);

?> Taka
</td>
            </tr>


    
    <tr>
      <th class="text-right">Total Deposit:</th>
      <td><?php echo number_format($deposit_one,2); ?> Taka</td>
    </tr>
 
            <tr>
                <th class="text-right">Remainder:</th>
                <td>
<?php 
echo number_format($deposit_one-$cost_one,2);
?> 
Taka</td>
            </tr>

<?php
$remainder=$deposit_one-$cost_one;
if ($remainder<0){
?>
    <tr>
                <th class="text-center text-danger bg-danger" colspan="2">**You have to pay &nbsp; <?php echo -$remainder; ?> taka to Manager. </th>
            </tr>
<?php } ?>


<!--Total Bazar-->

</tbody>
</table>



</div>



	 </div><!--col-sm-12-->
	 </div><!--row-->
	 </div>	<!--container--> 
<?php
CallFooter();
?>