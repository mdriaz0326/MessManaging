<?php
$page='insert_daily_meal';
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
               <h4 class="text-center">Daily Meal Report</h4> <hr/>
		          	
   <?php  

session_start();
$logged_ManagerID=$_SESSION ['logged_ManagerID'];

?>


<form action="../php/store_daily_meal.php"class="form-horizontal" method="post" enctype="multipart/form-data">
           
      <div class="form-group">
        <label class="col-md-4 control-label">Pick  Date</label>
        <div class="col-md-6  inputGroupContainer">
          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>

            <input  name="date" class="form-control"  type="date" required>
          </div>
        </div>
      </div>


      
      <h4  class="text-center">Insert Meal</h4>
<hr style="margin-top:0px;">
<?php
$datas= GetTableInfo(mess_member,ManagerID,$logged_ManagerID);
foreach ($datas as $data){
?>

        <div class="input-group">

         <select  class="form-control " name="person[]"  readonly required/>
<option value="<?php echo $data['id']?>"><?php echo $data['name']?></option>
</select>

<span class="input-group-addon">-</span>   

                <input type="number" 
class="form-control price" name="total_meal[]" placeholder="Today's Meal" step="0.5" required > </input>
</div>

</br>
<?php } ?>



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
