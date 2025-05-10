<?php
$page = 'add_member';
include ("$_SERVER[DOCUMENT_ROOT]/mess_bazar/function/function.php");
OnlyMemberEntry('../manager/login.php');
OnlyMangerEntry('../manager/mess_director_login.php');
CallHeader();

?>
<div class="container">
<div class="row">
<div class="col-sm-12">
<div class="col-sm-10 col-sm-offset-1 well">
    <br>
    <br>
        <form action="../php/MemberListStore.php" method="post" enctype="multipart/form-data" role="form" id="reg_form" autocomplete="off">
    <?php
    $AddMember= $_GET["AddMember"];
if($AddMember<1){
session_start();
$_SESSION ['error_msg'] = "Please Insert Number of Members Before Entering Members Details.";
header("Location:index.php");
}
    for ($i=1; $i<=$AddMember; $i++) { 


    ?>
    <div class="">
         <fieldset>
         <legend>Member  <?php echo $i; ?>:</legend>
        <div class="form-row">
            <div class="form-group col-sm-6">
                <label for="man">Member Name</label>
                <input name="name[]<?php echo $i; ?>" type="text" class="form-control" id="man" placeholder="Member Name">
            </div>
            <div class="form-group col-sm-6">
              <label for="mobile">Mobile No</label>
              <input name="mobile[]" type="text" class="form-control" id="mobile" placeholder="Mobile No">
          </div>
      </div>
            </div>
        <?php  } ?>
      <button type="submit" class="btn btn-primary pull-right">Submit</button>
  </form>
   </fieldset>
</div>
</div>
</div>
</div>
    <?php
CallFooter();
?>