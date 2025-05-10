<?php
$page= 'mess_director';
include ("$_SERVER[DOCUMENT_ROOT]/mess_bazar/function/function.php");
CallHeader();

 ?>

  <div class="container">
<div class="row">
<div class="col-sm-12">
<div class="col-sm-10 col-sm-offset-1 well">
	        <br>
<br>
<h2 class="text-center">Mess Director Sign Up</h2>
<br>
	<form action="../php/mess_director_signup_action.php"class="form-horizontal" method="post" enctype="multipart/form-data">
      

  <!-- Text input-->
      
      <div class="form-group">
        <label class="col-md-4 control-label">Mess ID</label>
        <div class="col-md-6  inputGroupContainer">
          <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
             <input type="text"name="mess_id" value= "<?php 
             			session_start;
       echo $logged_ManagerID=$_SESSION['logged_ManagerID'];
								 
             ?>
             " class="form-control" required readonly>
          </div>
        </div>
      </div>

      
      <!-- Text input-->
      
      <div class="form-group">
        <label class="col-md-4 control-label">Your Email (If Exist)</label>
        <div class="col-md-6  inputGroupContainer">
          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
            <input  name="email" placeholder="Enter your email" class="form-control" type="email" >
          </div>
        </div>
      </div>
      
      <!-- Text input-->
      
      <div class="form-group">
        <label class="col-md-4 control-label">Enter Your Mobile No</label>
        <div class="col-md-6  inputGroupContainer">
          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
            <input  name="mobile" placeholder="Your Mobile No" class="form-control" type="text" required>
          </div>
        </div>
      </div>
      
      <!-- Text input-->
      
      <div class="form-group">
        <label class="col-md-4 control-label">Make a Password</label>
        <div class="col-md-6  inputGroupContainer">
          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input  name="password" placeholder="Password" class="form-control" type="password" required>
          </div>
        </div>
      </div>

      <!-- Text input-->
      
      <div class="form-group">
        <label class="col-md-4 control-label">Confirm Password</label>
        <div class="col-md-6  inputGroupContainer">
          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input  name="confirmPassword" placeholder="Re-type Password" class="form-control" type="password" required>
          </div>
        </div>
      </div>

      <!-- Button -->
      <div class="text-center">
                  <input type="submit" class="btn btn-success btn-lg"></input>
</div>


    </fieldset>
  </form>
            
      </div>
   </div>

</div>
</div>
<?php
CallFooter();
?>
