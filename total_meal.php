<?php
$page='BazarDetais';
 include ("$_SERVER[DOCUMENT_ROOT]/mess_bazar/function/function.php");
CallHeader();
GetConn();
$token= $_GET ["token"];
session_start();
$logged_ManagerID=$_SESSION['logged_ManagerID'];
$datas= GetTableInfo(daily_meal,ManagerID,$logged_ManagerID);
$details=GetTableArray(mess_member,ManagerID,$logged_ManagerID);
?>


<div class="container">
         <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-8 col-sm-offset-2 well">
               <h4 class="text-center">Daily Meal Report Details</h4> 
               <hr/>
               
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Date</th>
      <?php
          while ($rows=mysqli_fetch_array($details)){  

      ?>   
      <th scope="col"><?php echo $rows['name'];?>
</th>
<?php } ?>
    </tr>
  </thead>
  <tbody>

   </th>
<?php foreach ($datas as $data) {

  ?>
      <td><?php foreach ($datas as $data) {

  ?></td>
      <td><?php echo $data['price'];   ?></td>
    </tr>



      <th scope="row" colspan="2" c class="text-right">Total</th>
      <th><?php echo number_format($sum,2); ?> Taka</th>
    </tr>
  </tbody>
</table>    
   
</div>
    </div>
         </div>
      </div>
<?php
CallFooter();
?>
