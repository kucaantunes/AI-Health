<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<?php
      $con = new mysqli("localhost","root","","vel");
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AI Health</title>
    <meta name="description" content="AI Health">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="vendors/jqvmap/dist/jqvmap.min.css">


    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body style = "background-image: url("'https://i.ibb.co/yPY7yWY/b5.jpg'");">
	
	
	 <?php
   /* Start Update Code */
      if(isset($_REQUEST["btnupdate"]))   /* Update button click event.. */
      {
           
            $image="";
            if($_FILES["profile"]["name"]=="")
            {
                $image=$_REQUEST["txtimg"];
            }	

            else
            {
                unlink("images//".$_REQUEST["txtimg"]);
                move_uploaded_file($_FILES["profile"]["tmp_name"],"images/".$_FILES["profile"]["name"]);
                $image=$_FILES["profile"]["name"];
            }	

            $data = $con->query("update tblregistration set RegFullName='".$_REQUEST["txtfname"]."',RegEmail='".$_REQUEST["txtuemail"]."',RegPassword='".$_REQUEST["txtpassword"]."',RegGender='".$_REQUEST["rdogender"]."',RegHobbies='".$chk."',RegProfile='".$image."' where RegId='".$_REQUEST["txtid"]."'");
            if($data == TRUE)
            {
                echo "<script>alert('Data updated successfully..!');window.location='doctordata.php';</script>";   
            }
            else
            {
                echo "<script>alert('Error while updating..!!')</script>";
            }
        }
  
        if(isset($_REQUEST["btncancel"]))   /* Cancel button click event.. */
        {
            echo "<script>window.location='doctordata.php';</script>";   
        }
		  if(isset($_REQUEST["btninsert"]))   
        {
            echo "<script>window.location='doctordata.php';</script>";   
        }
	/* End update code */
   ?>
  
    <?php
        /* Click on edit from display page check variable that you send from that page and fetch data of that variable. */
	if(isset($_REQUEST["isEdit"]))
        {
            $rs = $con->query("select * from tblregistration where RegId='".$_REQUEST["isEdit"]."'") or die(mysqli_error($con));
            while($row = mysqli_fetch_array($rs))
            {
                $ch1 = $ch2 = $ch3 = "";
		  $myArray = explode(',', $row["RegHobbies"]);
		  foreach($myArray as $chk)
		  {
		    if($chk == "Cricket")
		       {
			  $ch1 = 'checked';
		       }  
		    if($chk == "Hocky")
		       {
			  $ch2 = 'checked';
		       }
		    if($chk == "Singing")
		       {
			  $ch3 = 'checked';
		       }					

	     }
    ?>
	
	
	
  <div class="wrapper">
   
   
   <?php include 'HTMLparts/left.html';?>
   
   
 
    <div id="right-panel" class="right-panel">

        <!-- Header-->
 <?php include 'HTMLparts/header.html';?>
   
   
 <div id="main-menu" class="main-menu collapse navbar-collapse">
 <nav class="navbar navbar-expand-sm navbar-default">
  <div class="breadcrumbs">
  
<!-- 
     <div class="main-panel" id="main-panel"> 
     
      <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
			-->
			  <div class="content mt-3">
            <a class="navbar-brand" href="#Carlos">User Profile</a>
       
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form>
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="now-ui-icons ui-1_zoom-bold"></i>
                  </div>
                </div>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="#Carlos">
                  <i class="now-ui-icons media-2_sound-wave"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Stats</span>
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="now-ui-icons location_world"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  <i class="now-ui-icons users_single-02"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Account</span>
                  </p>
                </a>
              </li>
            </ul>
          
       
      </nav>
      <!-- End Navbar -->
	  
	  
	  
      <div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Edit Profile</h5>
              </div>
              <div class="card-body">
			  
               <form method="post" enctype="multipart/form-data" >
               <input type="hidden" name="txtimg" value="<?php echo $row["RegProfile"]; ?>">
               <input type="hidden" name="txtid" value="<?php echo $row["RegId"]; ?>">
			   
                  <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>Patient (disabled)</label>
						<td><input type="text" class="form-control" disabled="" placeholder="ID"  value="<?php echo $row["RegFullName"]; ?>"></td>
                      <!--  <input type="text" class="form-control" disabled="" placeholder="Company" value="Creative Code Inc."> -->
                      </div>
                    </div>
                    <div class="col-md-3 px-1">
                      <div class="form-group">
                        <label>Name</label>
						<input type="text" class="form-control" name="txtfname" value="<?php echo $row["RegFullName"]; ?>">
                      <!--  <input type="text" class="form-control" placeholder="Username" value=""> -->
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
						<input type="text" class="form-control" placeholder="Email" name="txtuemail" value="<?php echo $row["RegEmail"]; ?>"></td>
                     <!--   <input type="email" class="form-control" placeholder="Email"> -->
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>First Name</label>
                        <input type="text" class="form-control" placeholder="First Name" value="">
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" class="form-control" placeholder="Last Name" value="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Date of Birth</label>
						<input type="date" class="form-control" placeholder="Home Address" name="txtpassword" value="<?php echo $row["RegPassword"]; ?>">
                     <!--   <input type="text" class="form-control" placeholder="Home Address" value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09"> -->
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control" placeholder="City" value="">
                      </div>
                    </div>
                    <div class="col-md-4 px-1">
                      <div class="form-group">
                        <label>Country</label>
                        <input type="text" class="form-control" placeholder="Country" value="">
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label>Postal Code</label>
                        <input type="number" class="form-control" placeholder="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Details</label>
						<input type="text" class="form-control" placeholder="Country" name="rdogender" value="<?php echo $row["RegGender"]; ?>">
                        <textarea rows="4" cols="80" class="form-control" placeholder="Here can be your description" value=""> </textarea>
                      </div>
					  <div>
					  </div>
					  <div>
					   <tr>
                    
					<div>
					  <p>
					  <td>Profile Picture:</td>
					  </p>
					  </div>
					<div>
					<tr>
                    <td><img src="images/<?php echo $row["RegProfile"]; ?>" alt="User Profile" height="100" width="100"> 
					<tr>
					</div>
					<div>
					  <p>
					  </p>
					  </div>
					<div>
					<input type="file" name="profile"><br/></td>
                </div>
				</tr>
				 </div>
					  <div>
					  <p>
					  </p>
					  </div>
					  
					  <!--
                <tr>
                    <td>Evaluation:</td>
					 <td><input type="text" name="chkhobby" value="<?php echo $row["chkhobby"]; ?>"></td>
					
                </tr>
				-->
                    </div>
					  <p>
					  </p>
                  </div>
				  <div class="col-md-4 px-1">
                      <div class="form-group">
                        <label>Actions</label>
						<td colspan="2" class="form-control" align="center"><input type="submit" value="Update" name="btnupdate"> <input type="submit" value="Cancel" name="btncancel"></td>
                     <!--   <input type="text" class="form-control" placeholder="Country" value=""> -->
                      </div>
                    </div>
				  
				  
				  
				  
				  
                </form>
              </div>
            </div>
          </div>
		  
		  
		  
		  
		  
		  
		  
		  
		  <!---
		  -->
		  
		  
		  
		  
		  
		  
          <div class="col-md-4">
            <div class="card card-user">
              <div class="image">
                <img src="../assets/img/bg5.jpg" alt="...">
              </div>
              <div class="card-body" style = "text-align: center;">
                <div class="author">
                  <a href="#">
				 <img class="avatar border-gray"  src="images/<?php echo $row["RegProfile"]; ?>" alt="User Profile" height="100" width="100">
				  
				  
				  
				  
				  
				  
				  
              <!--      <img class="avatar border-gray" src="../assets/img/mike.jpg" alt="..."> 
			  
			  
			  
			  
			 
                 <input type="file" name="profile"><br/>
				 
				 -->
				 
				 	 <p>
			  </p>
			   <p>
			  </p>
			   <p>
			  </p>
			   <p>
			  </p>
			   <p>
			  </p>
			   <p>
			  </p>
			   <p>
			  </p>
			   <p>
			  </p>
			   <p>
			  </p>
			   <p>
			  </p>
			   <p>
			  </p>
			   <p>
			  </p>
				 
				<h6 class="title"><input type="text"  style = "text-align: center;" disabled="" name="txtfname" value="<?php echo $row["RegFullName"]; ?>">  </h6>
				
				
				 <p>
			  </p>
			   <p>
			  </p>
			   <p>
			  </p>
			   <p>
			  </p>
			   <p>
			  </p>
			   <p>
			  </p>
			   <p>
			  </p>
			   <p>
			  </p>
			   <p>
			  </p>
			   <p>
			  </p>
			   <p>
			  </p>
			   <p>
			  </p>
				
				
				
				
                  </a>
                  <h6 style = "text-align:center;">
                    <input type="text"  name="txtuemail" style = "text-align:center;" disabled="" value="<?php echo $row["RegEmail"]; ?> 
					
					
				
					
					
					
                  </h6>
                </div>
                <p class="description text-center">
                 
                </p>
              </div>
              <hr>
              <div class="button-container">
                <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                  <i class="fab fa-facebook-f"></i>
                </button>
                <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                  <i class="fab fa-twitter"></i>
                </button>
                <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                  <i class="fab fa-google-plus-g"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
	  
	    <?php
            }
        }else{
    ?>
	  
	  
	  
	  
	  <div class="wrapper">
   
   
   <?php include 'HTMLparts/left.html';?>
   
   
 
   
   




    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="">User Profile</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form>
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="now-ui-icons ui-1_zoom-bold"></i>
                  </div>
                </div>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <i class="now-ui-icons media-2_sound-wave"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Stats</span>
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="now-ui-icons location_world"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <i class="now-ui-icons users_single-02"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Account</span>
                  </p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
	  
	  
	    <div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Edit Profile</h5>
              </div>
              <div class="card-body">
	  
	  
	    <form method="post" enctype="multipart/form-data" >
       <center><h1>Insert Patient Details</h1></center>
        <table align="center" border="0">
            <tr>
                <td>Patient Name:</td>
                <td><input type="text" name="txtfname"></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="text" name="txtuemail"></td>
            </tr>
            <tr>
                <td>Date of Birth:</td>
                <td><input type="date" name="txtpassword"></td>
            </tr>
            <tr>
                <td>Details:</td>
				<td><input type="text" name="rdogender"></td>
			<!--	
                <td><input type="radio" name="rdogender" value="Male">Male<input type="radio" name="rdogender" value="Female">Female</td>
			-->	
				
            </tr>
			<!--
            <tr>
                <td>Evaluation:</td>
				<td><input type="text" name="chkhobby"></td>
				
                <td><input type="checkbox" name="chkhobby[]" value="Cricket">Cricket
                <input type="checkbox" name="chkhobby[]" value="Hocky">Hocky
                <input type="checkbox" name="chkhobby[]" value="Singing">Singing</td>
				
            </tr>
			-->
            <tr>
                <td>Profile Picture:</td>
                <td><input type="file" name="profile"></td>
            </tr>
			<tr>
			<td> </td>
			</tr>
            <tr>
			</tr>
			<tr>
			<td> </td>
			</tr>
            <tr>
			</tr>
			<tr>
			<td> </td>
			</tr>
            <tr>
			</tr>
			<tr>
			<td> </td>
			</tr>
            <tr>
			</tr>
			<tr>
			<td> </td>
			</tr>
            <tr>
			<div>
                <td  align="center"><input type="submit" value="Insert" name="btninsert">
				<a href = "./doctordata.php" align="center">
				<button type="button"> Return </button>
				<a>
				</td>
			<div>
            </tr>
        </table>
    </form>
	
	
	
	
	   
	
	     </div>
            </div>
          </div>
		  
		  
		  
		  
		  
		  
		  
		  
		  <!---
		  -->
		  
		  
		  
		  
		  
		  
          <div class="col-md-4">
            <div class="card card-user">
              <div class="image">
                <img src="../assets/img/bg5.jpg" alt="...">
              </div>
              <div class="card-body" style = "text-align: center;">
                <div class="author">
                  <a href="#">
				  <!-- 
				 <img class="avatar border-gray"  src="images/<?php echo $row["RegProfile"]; ?>" alt="User Profile" height="100" width="100">
				  
				  -->
				  
				  
				  
				  
				  
              <!--      <img class="avatar border-gray" src="../assets/img/mike.jpg" alt="..."> 
			  
			  
			  
			  
			 
                 <input type="file" name="profile"><br/> -->
				 
				 	 <p>
			  </p>
			   <p>
			  </p>
			   <p>
			  </p>
			   <p>
			  </p>
			   <p>
			  </p>
			   <p>
			  </p>
			   <p>
			  </p>
			   <p>
			  </p>
			   <p>
			  </p>
			   <p>
			  </p>
			   <p>
			  </p>
			   <p>
			  </p>
				 
				   <!-- 
				<h6 class="title"><input type="text"  style = "text-align: center;" disabled="" name="txtfname" value="<?php echo $row["RegFullName"]; ?>">  </h6>
				-->
				
				 <p>
			  </p>
			   <p>
			  </p>
			   <p>
			  </p>
			   <p>
			  </p>
			   <p>
			  </p>
			   <p>
			  </p>
			   <p>
			  </p>
			   <p>
			  </p>
			   <p>
			  </p>
			   <p>
			  </p>
			   <p>
			  </p>
			   <p>
			  </p>
				
				
				
				
                  </a>
                  <h6 style = "text-align:center;">
				  
				    <!-- 
                    <input type="text"  name="txtuemail" style = "text-align:center;" disabled="" value="<?php echo $row["RegEmail"]; ?> 
					-->
					
				
					
					
					
                  </h6>
                </div>
                <p class="description text-center">
                 
                </p>
              </div>
              <hr>
              <div class="button-container">
                <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                  <i class="fab fa-facebook-f"></i>
                </button>
                <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                  <i class="fab fa-twitter"></i>
                </button>
                <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                  <i class="fab fa-google-plus-g"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
	  
	
	
	
	
	
	  
	  <?php } ?>
  
    <?php
	/* Insert Code Start */
        if(isset($_POST["btninsert"]))   /* Insert button click event */
        {
	    /* Move image into images folder which you have to create in C:\xampp\htdocs\foldername\ */
            move_uploaded_file($_FILES["profile"]["tmp_name"],"Images/".$_FILES["profile"]["name"]); 
	    $image=$_FILES["profile"]["name"];
	  
/*
	  $checkbox1=$_POST['chkhobby'];  
	    $chk="";  
	    foreach($checkbox1 as $chk1)  
	      {  
		 if($chk == "")
		    {
		       $chk .= $chk1;
		    }
		 else{
		       $chk .= ",".$chk1;  
		     }  
	      } 

*/		  
            $res = $con->query("insert into tblregistration(RegFullName,RegEmail,RegPassword,RegGender,RegHobbies,RegProfile) values('".$_POST["txtfname"]."','".$_POST["txtuemail"]."','".$_POST["txtpassword"]."','".$_POST["rdogender"]."','".$_POST["chkhobby"]."','".$image."')") or die(mysqli_error($con));
            if($res == TRUE)
            {
                echo "<script>alert('Data added successfully..!!')</script>";
            }
            else
            {
                echo "<script>alert('Something getting wrong.Please try again..!')</script>";
            }
        }
	/* Insert Code End */
    ?> 
	  
	  
	 
	 
	  
	  
    
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="vendors/jquery/dist/jquery.min.js"></script>
<script src="vendors/popper.js/dist/umd/popper.min.js"></script>
<script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="assets/js/main.js"></script>
<script src="vendors/chosen/chosen.jquery.min.js"></script>

<script>
    jQuery(document).ready(function() {
        jQuery(".standardSelect").chosen({
            disable_search_threshold: 10,
            no_results_text: "Oops, nothing found!",
            width: "100%"
        });
    });
</script>

  <script src="../assets/demo/demo.js"></script>
</body>

</html>