<?php
$page= 'reg';
 include (dirname(__DIR__)."/function/function.php");
CallHeader();


 ?>

  <div class="container">
<div class="row">
<div class="col-sm-12">
<div class="col-sm-10 col-sm-offset-1 well">
	        <br>
<br>
<h2 class="text-center">Please Provide The Correct Informationn Below</h2>
<br>
	<form action="../php/dataStore.php"class="form-horizontal" method="post" enctype="multipart/form-data" autocomplete="off">
      
    
      <!-- Text input-->
      
      <div class="form-group">
        <label class="col-md-4 control-label">Mess Name</label>
        <div class="col-md-6  inputGroupContainer">
          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input  name="MessName" placeholder="Write a Mess Name" class="form-control"  type="text" required >
          </div>
        </div>
      </div>
          
      <!-- Text input-->
      
      <div class="form-group">
        <label class="col-md-4 control-label">Your Full Name</label>
        <div class="col-md-6  inputGroupContainer">
          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input  name="fullName" placeholder="Write Your Full Name" class="form-control"  type="text" required>
          </div        </div>
      </div>
    </div>
      
      <!-- Text input-->
      
      <div class="form-group">
        <label class="col-md-4 control-label">Your Birth Date</label>
        <div class="col-md-6  inputGroupContainer">
          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
            <input  name="bd"  class="form-control" type="date" required>
          </div>
        </div>
      </div>
   <!-- Text input-->
      
      <div class="form-group">
        <label class="col-md-4 control-label">Your Email Address</label>
        <div class="col-md-6  inputGroupContainer">
          <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                      
             <input type="email" value="" name="email" max="14" placeholder="Write a valid Email" class="form-control" required>
          </div>
        </div>
      </div>

      <!-- Text input-->
      
      <div class="form-group">
        <label class="col-md-4 control-label">Your Mobile No</label>
        <div class="col-md-6  inputGroupContainer">
          <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                      
             <input type="text"name="mobile" class="form-control" required>
          </div>
        </div>
      </div>

  <!-- Text input-->
      
      <div class="form-group">
        <label class="col-md-4 control-label">Create a Username for Mess</label>
        <div class="col-md-6  inputGroupContainer">
          <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      
             <input type="text"name="username" class="form-control" required>
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