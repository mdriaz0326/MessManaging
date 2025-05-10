<?php
$page='update_profile';
 include ("$_SERVER[DOCUMENT_ROOT]/mess_bazar/function/function.php");
OnlyMemberEntry('../manager/login.php');
CallHeader();

//get data

$id=$_GET['id'];



$exists = mysqli_query($connect,"select 1 from member_profile");
	if($exists !== FALSE){
       $info_tbl= GetNamebyID(member_profile,MemberID,$id);
       if($info_tbl['name']!=NULL){
             $details=$info_tbl;
}
else{
$details= GetNamebyID(mess_member,id,$id);

        }
  }
else{
$details= GetNamebyID(mess_member,id,$id);


}

 ?>

<div class="container">
         <div class="row">
         <div class="col-sm-12">
            <div class="col-sm-10 col-sm-offset-1 well">
               <h3 class="text-center">Update Profile</h3> <hr/>
		          	


<form action="../php/member_details_update.php?id=<?php echo $id;?>"class="form-horizontal" method="post" enctype="multipart/form-data">

     <div class="form-group">
        <label class="col-md-4 control-label">Your Name</label>
        <div class="col-md-6  inputGroupContainer">
          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input  name="name"  placeholder="Enter Your Name" class="form-control"  type="text" value="<?php echo $details ['name'];?>" required>
          </div>
        </div>
      </div>

  <div class="form-group">
        <label class="col-md-4 control-label">Date of Birth</label>
        <div class="col-md-6  inputGroupContainer">
          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input  name="bd"  placeholder="Your Birthday Date" class="form-control"  type="date" value="<?php echo $details ['bd'];?>" required>
          </div>
        </div>
      </div>

  <div class="form-group">
        <label class="col-md-4 control-label">Your Mobile No</label>
        <div class="col-md-6  inputGroupContainer">
          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input  name="mobile"  placeholder="Enter Valid Mobile No" class="form-control"  type="text" value="<?php echo $details ['mobile'];?>" required>
          </div>
        </div>
      </div>

  <div class="form-group">
        <label class="col-md-4 control-label">Your Email Address (If Exist)</label>
        <div class="col-md-6  inputGroupContainer">
          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input  name="email"  placeholder="Enter Your Email" class="form-control"  type="email" value="<?php echo $details ['email'];?>">
          </div>
        </div>
      </div>

  <div class="form-group">
        <label class="col-md-4 control-label">Your Blood Group</label>
        <div class="col-md-6  inputGroupContainer">
          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <select  name="blood"  class="form-control">
                 <option selected value="<?php echo $details['blood'];?>"><?php echo $details['blood'];?></option>
                 <option value="A+">A+</option>
                 <option value="A-">A-</option>
                 <option value="B+">B+</option>
                 <option value="B-">B-</option>
                 <option value="AB+">AB+</option>
                 <option value="O+">O+</option>
                 <option value="O-">O-</option>
           </select>
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
