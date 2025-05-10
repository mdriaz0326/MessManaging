<?php 
$page='member_index';
include ("$_SERVER[DOCUMENT_ROOT]/mess_bazar/function/function.php");
OnlyMemberEntry('../manager/login.php');
CallHeader();
GetConn();
?>
<div class="container">
 <div  class="row">
    <div class="col-sm-12">
        <div class="col-sm-10 col-sm-offset-1 well">
            <h2 class  = "text-center">All Members</h2>
     
    <br>
  
          <table class="table table-hover table-striped">
     <thead>
      <tr>
     <th>Serial</th>
     <th>Member Name</th>
     <th>Member Mobile</th>
     <th>Action</th>
      </tr>
     </thead>
     <tbody>
     <!--php loop start-->
     <?php
session_start();
$logged_ManagerID=$_SESSION ['logged_ManagerID'];
$match= GetTableArray(mess_member,ManagerID,$logged_ManagerID);
     $i = 0;
     while ($rows=mysqli_fetch_array($match)){  

     $i++;
     ?>
     <tr>
    <td><?php echo $i; ?></td> 
    <td><?php echo $rows['name']; ?>
    </td> 
    <td><?php echo $rows['mobile']; ?>    </td> 
    <td>
   <a href="view.php?id=<?php echo $rows['id']; ?>"  class="btn btn-info">View</a>

    <?php } ?>

    </td> 
     </tr>
     
     </tbody>
     </table>
</div><!--col-md-10 -->
</div><!--col-md-12 -->
</div><!--row-->
</div> <!--container--> 
<?php
CallFooter();
?>

