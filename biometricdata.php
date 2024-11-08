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



<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AI Health</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">


    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>

<body>
    <!-- Left Panel -->
  <?php include 'HTMLparts/left.html';?>
    <!-- Left Panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->



        <!-- Header-->
 <?php include 'HTMLparts/header.html';?>
   
		 <?php 
 $results_per_page = 1;


if (!isset($_GET['page'])) {
  $page = 1;
} else {
  $page = $_GET['page'];
}
// determine the sql LIMIT starting number for the results on the displaying page
$this_page_first_result = ($page-1)*$results_per_page;
?>
	
	
    
      <!-- End Navbar -->
      <div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Patients </h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        Patient
                      </th>
                      <th>
                        Email
                      </th>
                      <th>
                        Date of Birth
                      </th>
                      <th>
                        Details
                      </th>
					   <th>
                        Name
                      </th>
                    </thead>
					
				
					
					
                    <tbody>
                      <tr>
					     <?php
	/* Fetch data from databse(select query) */
            $res = $con->query("select * from tblregistration LIMIT {$this_page_first_result} , {$results_per_page}" ) or die(mysqli_error($con));
            while($row = mysqli_fetch_array($res))
            {
				
        ?>
                        <td>
                         <img src="images/<?php echo $row["RegProfile"]; ?>" height="150" width="250" alt="User image">
                        </td>
                        <td>
						  <?php echo $row["RegEmail"]; ?>
                         
                        </td>
                        <td>
                          <?php echo $row["RegPassword"]; ?>
                        </td>
                        <td>
                         <?php echo $row["RegGender"]; ?>
                        </td>
						
						 <td>
                         <?php echo $row["RegFullName"]; ?>
						 
                        </td>
						
						<td class="text-right"> <a href="user.php?isEdit=<?php echo $row["RegId"]; ?>"> <img  style = "  height:40px; width:55px;" src="edit.png"> </img>   </a> </td>
			            <td></td>
		                <td class="text-right"> <a href="?delete=<?php echo $row["RegId"]; ?>"><img style = "  height:40px; width:55px;" src="delete.png"> </img></a></td>
	                  	<td></td>
                        </tr>
					    <?php
						$searchstring =   $row["RegFullName"];


						
						
                        }
                        ?>
						
					
					
                  </table>
				  
				  
				  
				  
				  
				   <?php 
 $results_per_page = 1;


if (!isset($_GET['page'])) {
  $page = 1;
} else {
  $page = $_GET['page'];
}
// determine the sql LIMIT starting number for the results on the displaying page
$this_page_first_result = ($page-1)*$results_per_page;

?>
		
		
		
	<?php

// retrieve selected results from database and display them on page
$sql='SELECT * FROM tblregistration  ' ;
$result = mysqli_query($con, $sql);
 $number_of_results = mysqli_num_rows($result);
$number_of_pages = ceil($number_of_results/$results_per_page);
/*
while($row = mysqli_fetch_array($result)) {
  echo $row['RegId'] . ' ' . $row['RegFullName']. '<br>';
}
*/
// display the links to the pages
for ($page=1;$page<=$number_of_pages;$page++) {
  echo '<a href="biometricdata.php?page=' . $page . '">' . $page . '</a> ';
}

?>
	<p>
	</p>
	<p>
	</p>
	
	<form align="center" action="user.php">
    <input type="submit" value="Insert Patient" />
</form>
	
	
	<p>
	</p>
	<p>
	</p>
    <?php
	/* Delete code.Wehen click on delete link this will perform.!*/
        if(isset($_REQUEST["delete"]))
        {
            $result=$con->query("select RegProfile from tblregistration where RegId='".$_REQUEST["delete"]."'") or die(mysqli_error($con));
            while($row1=mysqli_fetch_array($result))
            {
                $image1=$row1["RegProfile"];
            }
            unlink("images//".$image1);
            $con->query("delete from tblregistration where RegId='".$_REQUEST["delete"]."'") or die(mysqli_error($con));
            echo "<script>alert('Data deleted successfully..!');window.location='index.php';</script>";   
        }
    ?>		
			
				  
				  
				  
				  
				  
				  
				  
				  
				  
				  
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="card card-plain">
              <div class="card-header">
                <h4 class="card-title"> Patient Biometric Data</h4>
                <p class="category"> Data obtained via AI Health</p>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                 
				 
				 
				     <table class="table">
                    <thead class=" text-primary">
                      <th>
                        Patient
                      </th>
                      <th>
                        Model
                      </th>
                      <th>
                        Precision
                      </th>
                      <th>
                        Recall
                      </th>
					   <th>
                        Accuracy
                      </th>
					   <th>
                        Cross-entropy
                      </th>
					   <th>
                        F1-Score
                      </th>
					  <th>
                        Area Under the Curve
                      </th>
					  
                    </thead>
					
				
					
					
                    <tbody>
                      <tr>
					     <?php
	/* Fetch data from databse(select query) */
	       
            $resbio = $con->query("select * from result where name like  '%$searchstring%'" ) or die(mysqli_error($con));
            while($row = mysqli_fetch_array($resbio))
            {
        ?>
                        
                        <td>
						  <?php echo $row["name"]; ?>
                         
                        </td>
                        <td>
                          <?php echo $row["model"]; ?>
                        </td>
                        <td>
                         <?php echo $row["pecision"]; ?>
                        </td>
						
						 <td>
                         <?php echo $row["recall"]; ?>
						 
                        </td>
							 <td>
                         <?php echo $row["accuracy"]; ?>
						 
                        </td>
							 <td>
                         <?php echo $row["cross-entropy"]; ?>
						 
                        </td>
							 <td>
                         <?php echo $row["f1score"]; ?>
						 
                        </td>
							 <td>
                         <?php echo $row["auc"]; ?>
						 
                        </td>
						<!--
						<td class="text-right"> <a href="user.php?isEdit=<?php echo $row["RegId"]; ?>"> <img  style = "  height:40px; width:55px;" src="edit.png"> </img>   </a> </td>
			            <td></td>
		                <td class="text-right"> <a href="?delete=<?php echo $row["RegId"]; ?>"><img style = "  height:40px; width:55px;" src="delete.png"> </img></a></td>
	                  	-->
						<td></td>
                        </tr>
					    <?php
                        }
                        ?>
						
					
					
                  </table>
				 
				 
				 
				 
				 
				 
				 
				 
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    <!-- Left Panel -->

    <!-- Right Panel -->



    <!-- Right Panel -->


    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="vendors/jszip/dist/jszip.min.js"></script>
    <script src="vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="vendors/pdfmake/build/vfs_fonts.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <script src="assets/js/init-scripts/data-table/datatables-init.js"></script>


</body>

</html>
