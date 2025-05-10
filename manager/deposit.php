<?php
$page=balance_deposit;
 include ("$_SERVER[DOCUMENT_ROOT]/mess_bazar/function/function.php");
OnlyMemberEntry('../manager/login.php');
OnlyMangerEntry('../manager/mess_director_login.php');
CallHeader();
GetConn();
 ?>

<div class="container">
         <div class="row">
         <div class="col-sm-12">
            <div class="col-sm-8 col-sm-offset-2 well">
               <h4 class="text-center">Balance Deposit</h4> <hr/>
		          	


<form action="../php/deposited_balance_store.php"class="form-horizontal" method="post" enctype="multipart/form-data">

<div class="form-group">
        <label class="col-md-4 control-label">Depositor's Name</label>
        <div class="col-md-6  inputGroupContainer">
          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <select name="depositor"  class="form-control selectpicker" required>           
          <option selected value="" >Select Depositor</option>
          <?php 
session_start();
$logged_ManagerID=$_SESSION ['logged_ManagerID'];

$datas=GetTableInfo(mess_member,ManagerID,$logged_ManagerID);

foreach ($datas as $data){
           ?>
          <option value="<?php echo $data['id'];?>" ><?php echo $data['name']; ?></option>
<?php } ?>
            </select>
          </div>
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-4 control-label">Date of Deposit</label>
        <div class="col-md-6  inputGroupContainer">
          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
            <input  name="deposits_date"  placeholder="Enter Date" class="form-control"  type="date" required>
          </div>
        </div>
      </div>


<div class="form-group">
        <label class="col-md-4 control-label">Amount of Taka</label>
        <div class="col-md-6  inputGroupContainer">
          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
            <input  name="amount"  placeholder="Enter Amount" class="form-control"  type="number" required>
          </div>
        </div>
      </div>
                 
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
