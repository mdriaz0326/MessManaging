<?php
$page='BazarDetais';
 include ("$_SERVER[DOCUMENT_ROOT]/mess_bazar/function/function.php");
CallHeader();
GetConn();
$token= $_GET ["token"];


$datas= GetTableInfo(bazar_info,token_no,$token);
$sum=0;
foreach ($datas as $data) {
$sum+=$data['total'];
}


 ?>


<div class="container">
         <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-8 col-sm-offset-2 well">
               <h4 class="text-center">Daily Bazar Report Details</h4> 
               <hr/>
               
<table class="table table-hover">
<?php
$data_select="SELECT * FROM daily_bazar WHERE token_no= $token"; 
$data_store=mysqli_query($connect,$data_select);
$std_details=mysqli_fetch_assoc($data_store);
?>

  <tbody>
    <tr>
      <th scope="col" class="text-right">Purchase Person:</th>
      <td scope="col" class="text-left"> 
<?php 
 $s=$std_details['purchasers'];

$name=GetNameByID(mess_member,id,$s);
echo $name['name'];
?> 

</td>
    </tr>
    <tr>
      <th scope="col" class="text-right">Purchase Date:</th>
      <td scope="col" class="text-left"><?php echo $std_details['purchases_date']; ?></td>
    </tr>
    <tr>
      <th scope="col" class="text-right">Data Updated Date:</th>
      <td scope="col" class="text-left"><?php echo $std_details['reg_date']; ?></td>
    </tr>
  </tbody>
</table>        
<h4  class="text-center">Product Items</h4>
    <hr style="margin-top:0px;">    
    
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Serial</th>
      <th scope="col">Item Name & Quantity</th>
      <th scope="col">Price</th>
    </tr>
  </thead>
  <tbody>
<?php 
$count=1;
$sum=0;
foreach ($datas as $data) {
$sum+=$data['price'];
 ?>
    <tr>
     <th scope="row"> 
 <?php 
echo $count;
$count++;

?>
   </th>
      <td><?php echo $data['item_name'];   ?></td>
      <td><?php echo $data['price'];   ?></td>
    </tr>

<?php  }?>

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
