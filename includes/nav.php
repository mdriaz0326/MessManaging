<li class="<?php if($page=='home'){echo 'active';}?>"> <a href="/index.php" >Home</a>
</li>

<?php
if (isset($_SESSION ['manager_login_success'])){
?>
<li class="<?php if($page=='insert_bazar'){echo 'active';}?>"> <a href="/insert_bazar.php" >Insert Bazar</a>
</li>

<li class="<?php if($page=='monthly_bazar'){echo 'active';}?>"> <a href="/monthly_bazar.php" >Monthly All Bazar</a>
</li>

<li class="<?php if($page=='bazar_list'){echo 'active';}?>"> <a href="/bazar_list.php" >Bazar List</a>
</li>

<?php
   }
?>

<!--manager_part-->
<?php
if(isset($_SESSION['director_login_success'])){
?>

<li class="<?php if($page=='insert_daily_meal'){echo 'active';}?>"> <a href="/manager/insert_daily_meal.php" >Insert Daily Meal</a>
</li>
<li class="<?php if($page=='balance_deposit'){echo 'active';}?>"> <a href="/manager/deposit.php" >Balance Deposit</a>
</li>
<li class="<?php if($page=='bazar_list_creator'){echo 'active';}?>"> <a href="/manager/bazar_list_creator.php" >Create Bazar List</a>
</li>
<?php
  }
?>

<!--manager _part_end-->
</ul>
<?php
if (!isset($_SESSION ['manager_login_success'])){
?>
<ul class="nav navbar-nav navbar-right">
	<li class="<?php if($page=='sign_up'){echo 'active';}?>"> <a href="/manager/registration.php" ><span class="glyphicon glyphicon-user"></span> Registration</a>
	</li>
	<li class="<?php if($page=='login_all'){echo 'active';}?>"> <a href="/manager/login.php" ><span class="glyphicon glyphicon-log-in"></span> Log In</a>
	</li>
<?php
}else{
?>
<ul class="nav navbar-nav navbar-right">
	<li class="<?php if($page=='mess_index'){echo 'active';}?>"> <a href="/manager/index.php" >
<span class="glyphicon glyphicon-user"></span> Mess Profile</a>
	</li>
	<li class=""> <a href="/php/logout.php" ><span class="glyphicon glyphicon-log-out"></span> Log Out</a>
	</li>
	<?php
   }
?>