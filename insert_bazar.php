<?php
$page=insert_bazar;
 include ("$_SERVER[DOCUMENT_ROOT]/mess_bazar/function/function.php");
OnlyMemberEntry('manager/login.php');
OnlyMemberEntry('manager/login.php');
CallHeader();
 ?>

<div class="container">
         <div class="row">
         <div class="col-sm-12">
            <div class="col-sm-8 col-sm-offset-2 well">
               <h4 class="text-center">Daily Bazar Report</h4> <hr/>
		          	
   <?php  
include("php/connection.php");
session_start();
$logged_ManagerID=$_SESSION ['logged_ManagerID'];
$sql  = "SELECT * FROM mess_member WHERE ManagerID=$logged_ManagerID";
$result =  mysqli_query($connect, $sql);
$datas  = array();
if (mysqli_num_rows ($result) >0 ) {
while($row= mysqli_fetch_assoc($result)) {
$datas[] = $row;
	}
}

?>


<form action="php/store_bazar.php"class="form-horizontal" method="post" enctype="multipart/form-data">

<div class="form-group">
        <label class="col-md-4 control-label">Purchase Person Name</label>
        <div class="col-md-6  inputGroupContainer">
          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <select name="purchasers"  class="form-control selectpicker" required>           
          <option selected value="" >Purchasers</option>
          <?php foreach ($datas as $data){
           ?>
          <option value="<?php echo $data['id'];?>" ><?php echo $data['name']; ?></option>
<?php } ?>
            </select>
          </div>
        </div>
      </div>
      
      
      <div class="form-group">
        <label class="col-md-4 control-label">Pick Purchase Date</label>
        <div class="col-md-6  inputGroupContainer">
          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
            <input  name="purchases_date"  placeholder="Enter Date" class="form-control"  type="date" required>
          </div>
        </div>
      </div>

<div class="form-group">
        <label class="col-md-4 control-label">Select Your Token No</label>
        <div class="col-md-6  inputGroupContainer">
          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <select name="token"  class="form-control selectpicker" required>           
          <option selected value="" >Choose yours</option>
          <?php
$logged_ManagerID=$_SESSION ['logged_ManagerID'];
$sql  = "SELECT * FROM bazar_list WHERE ManagerID=$logged_ManagerID";
$result2 =  mysqli_query($connect, $sql);
$datas2  = array();
if (mysqli_num_rows ($result2) >0 ) {
while($row2= mysqli_fetch_assoc($result2)) {
$datas2[] = $row2;
	}
}

 foreach ($datas2 as $data2){
           ?>
          <option value="<?php echo $data2['token_no'];?>" ><?php echo $data2['token_no']; ?></option>
<?php } ?>
            </select>
          </div>
<p class="help-block">Your bazar token number is given in the <a href="bazar_list.php">Bazar List</a>.</p>
        </div>
      </div>
      
      <h4  class="text-center">Products</h4>

    <hr style="margin-top:0px;">
<div class="still">
        <div class="input-group">
         <input type="text" class="form-control " name="items[]" id="item" placeholder="Item:Quantity" required/> 
<span class="input-group-addon">-</span>   
                <input type="number" class="form-control price" name="price[]" placeholder="Price" step="any" required /> 
            </div>
</br>
</div>

         <?php
         	for($i=1;$i<=7;$i++){
         ?>
<div class="more">
        <div class="input-group">
         <input type="text" class="form-control " name="items[]" id="item" placeholder="Item:Quantity" required/> 
<span class="input-group-addon">-</span>   
                <input type="number" class="form-control price" name="price[]" placeholder="Price" required /> 
            </div>
<br>
</div>
<?php 
}
?>

<div class="new"></div>

            <div class="input-group">
         <input class="form-control" readonly  value="Total"/> 
<span class="input-group-addon">-</span>                
                <input class="form-control " name="total" id="result" readonly /> 
            </div>
<br>


                  
             </br>     
                  <button type="button" class="btn btn-warning pull-right Add">Add More</button>

<button type="button" class="btn btn-danger pull-left Remove">Remove Last</button>
</br>
</br>
</br>
<div class="text-center">
                  <input type="submit" class="btn btn-success btn-lg"></input>
</div>
               </form>
            </div>
         </div>
      </div>
    </div>
<?php
CallFooter();
?>

<script>
$(document).ready(function(){
$('.input-group').on('input','.price',function(){
            var totalSum = 0;
            $('.input-group .price').each(function(){
                var inputVal = $(this).val();
                if($.isNumeric(inputVal)){
                    totalSum += parseFloat(inputVal);
                }
            });
            $('#result').val(totalSum);
        });
        });

    
$(document).ready(function(){
      $(".Remove").click(function(){
      $(".more:last").remove(); 
    });
  });

$(document).ready(function(){
      $(".Add").click(function(){
      $(".more:last").clone().insertBefore(".new"); 
    });
  });

</script>
