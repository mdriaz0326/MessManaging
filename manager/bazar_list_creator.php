<?php
$page = 'bazar_list_creator';
include ("$_SERVER[DOCUMENT_ROOT]/mess_bazar/function/function.php");
OnlyMemberEntry('../manager/login.php');
OnlyMangerEntry('../manager/mess_director_login.php');
CallHeader();
GetConn();

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


	 <div class="container">
	 <div class="row">
	 <div class="col-sm-12">
	 	 	 	 <div  class="col-sm-10 col-sm-offset-1 well">
      <h4  class="text-center">Bazar List Creator</h4>
      <hr style = "margin-top:0px;">
						



								          	<form action="../php/bazar_list_creator_action.php"class="form-horizontal" method="post" enctype="multipart/form-data">
			<?php 
    for($i=1;$i<=10;$i++){
    ?>				
	          	
		<div class = "more">			    
  </br>   	
			<div class="input-group">
            <input  name="date[]"  placeholder="Insert Date" class="form-control"  type="date" required>
         <span class="input-group-addon">-</span> 
	
            <select name="name[]"  class="form-control selectpicker" required>           
          <option selected value="" >Purchasers</option>
          <?php foreach ($datas as $data){
           ?>
          <option value="<?php echo $data['id'];?>" ><?php echo $data['name']; ?></option>
<?php } ?>
            </select>
         </div> 
      </div>
      <?php } ?>
<div class="new"></div>
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
	 			 </div><!--col-md-8-->
	 </div><!--row-->
	 </div>	<!--container--> 
	<?php
CallFooter();
?>


<script>
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