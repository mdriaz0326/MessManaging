<?php
$page = 'login_all';
 include (dirname(__DIR__)."/function/function.php");
CallHeader();

     if (isset( $_SESSION ['manager_login_success']))
     {
     header ("Location:profile.php");
     }
 ?> 
 
 <div class="container">
 <div class="row">
 <div class="col-sm-8">
         </br>
         <h2>Log In</h2>
         </br>
            <form action="../php/ManagerLoginAction.php" method="post" enctype="multipart/form-data" role="form">
            
            <div class="form-group">
            <level for= "mobile">Mobile or Username:</lavel>
            <input type="text" name="login" id="mobile" value="<?php if(isset($_COOKIE["mobile"])){echo $_COOKIE["mobile"];}?>" required  class="form-control" placeholder= "Mobile No"></input>
            </div><!--form grp-->

            <div class="form-group">
            <level for= "password">Password:</lavel>
            <input type="password" name="password" value="<?php if(isset($_COOKIE["password"])){
            echo $_COOKIE["password"];}?>" id="password" required class="form-control" placeholder= "Password"></input>
            </div><!--form grp-->
            
                        <div class="form-group">
            <level for= "remember_me"><input type="checkbox" id = "remember_me" name = "remember_me" value = "yes" <?php if(isset($_COOKIE["remember_me"])){
            echo "checked";}?>>&nbsp; Remember me</input> </lavel>
            </div><!--form grp-->

<hr></hr>
     <button  class="btn btn-success btn-lg" type="submit" name="submit">Login</button>
     &nbsp; <a href="password_recovery.php" class="btn btn-link btn-lg">Forget Password?</a>

</br></br>   &nbsp <font style = "font-size:20px">Not yet Account??</font>  <a href="registration.php" class="btn btn-link btn-lg">Register Here</a>


            </form>
     </div><!--col-md-8-->
     
     </div><!--row-->
     </div> <!--container--> 
    <?php
CallFooter();
?>