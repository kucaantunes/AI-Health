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


<html class="no-js" lang="en">
<!--<![endif]-->

<head>
<meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
 
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  
  
  
  
  
    <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    AI Care
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />
</head>
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  <link href="assets/demo/demo.css" rel="stylesheet" />
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

    <!-- Left Panel -->

    <!-- Right Panel -->


    <!-- Right Panel -->
	 <?php 
 $results_per_page = 5;
if (!isset($_GET['page'])) {
  $page = 1;
} else {
  $page = $_GET['page'];
}
// determine the sql LIMIT starting number for the results on the displaying page
$this_page_first_result = ($page-1)*$results_per_page;
?>

    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>

  
	  <?php
  
    // Connect to database 
    $con = mysqli_connect("localhost","root","","vel");
      
    // mysqli_connect("servername","username","password","database_name")
   
    // Get all the categories from description table
    $sql = "SELECT * FROM `tblregistration`";
    $all_categories = mysqli_query($con,$sql);
   
    // The following code checks if the submit button is clicked 
    // and inserts the data in the database accordingly
    if(isset($_POST['submit']))
    {
        // Store the Product name in a "name" variable
        $name = mysqli_real_escape_string($con,$_POST['RegFullName']);
         
        // Store the description ID in a "id" variable
        $id = mysqli_real_escape_string($con,$_POST['description']); 
         
        // Creating an insert query using SQL syntax and
        // storing it in a variable.
        $sql_insert = 
        "INSERT INTO `tblregistration`(`RegFullName`, `RegID`)
            VALUES ('$name','$id')";
           
          // The following code attempts to execute the SQL query
          // if the query executes with no errors 
          // a javascript alert message is displayed
          // which says the data is inserted successfully
          if(mysqli_query($con,$sql_insert))
        {
            echo '<script>alert("Record added successfully")</script>';
        }
    }
?>
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  <!--
	  
	   <h9> <b style="color:white; text-align: center">       Select a Patient: </b></h9>
        <select name="description">
            <?php 
               
                while ($description = mysqli_fetch_array(
                        $all_categories,MYSQLI_ASSOC)):; 
            ?>
			
                <option name="description" value="<?php echo $description["RegFullName"]; ?>">
                    <?php echo $description["RegFullName"];
                        // To show the description name to the user
                    ?>
                </option>
            <?php 
                endwhile; 
                // While loop must be terminated
            ?>
        </select>
		<p> </p> 
	  
	  -->
	  
	  
	  
	  
	  
	  
	  
	  
	  
        <canvas id="bigDashboardChart"></canvas>
      </div>
      <div class="content" style = background-image: url("https://appsvel.eu/assets/images/medical/background.jpg");">
        <div class="row">
          <div class="col-lg-4">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">Health Monitoring</h5>
                <h4 class="card-title">Heart Rate</h4>
                <div class="dropdown">
                  <button type="button" class="btn btn-round btn-outline-default dropdown-toggle btn-simple btn-icon no-caret" data-toggle="dropdown">
                    <i class="now-ui-icons loader_gear"></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="gametest.php">Get Current Values</a>
                    <a class="dropdown-item" href="biometricdata.php">Change Values</a>
                    
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="chart-area">
                  <canvas id="lineChartExample"></canvas>
                </div>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="now-ui-icons arrows-1_refresh-69"></i> Info from the Last Update
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">Helath Monitoring</h5>
                <h4 class="card-title">Breathing Rate</h4>
                <div class="dropdown">
                  <button type="button" class="btn btn-round btn-outline-default dropdown-toggle btn-simple btn-icon no-caret" data-toggle="dropdown">
                    <i class="now-ui-icons loader_gear"></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right">
                 <a class="dropdown-item" href="breath.php">Get Current Values</a>
                    <a class="dropdown-item" href="biometricdata.php">Change Values</a>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="chart-area">
                  <canvas id="lineChartExampleWithNumbersAndGrid"></canvas>
                </div>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="now-ui-icons arrows-1_refresh-69"></i> Info from the Last Update
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">Health Monitoring</h5>
                <h4 class="card-title">Body Temperature</h4>
              </div>
              <div class="card-body">
                <div class="chart-area">
                  <canvas id="barChartSimpleGradientsNumbers"></canvas>
                </div>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="now-ui-icons ui-2_time-alarm"></i> Info from the Last Update
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="card  card-tasks">
              <div class="card-header ">
                <h5 class="card-category">Obtained Measurements</h5>
                <h4 class="card-title">Biometric Data</h4>
              </div>
              <div class="card-body ">
                <div class="table-full-width table-responsive">
                 
				 
				 
				 
				       <table class="table">
                    <thead class=" text-primary">
                      <th>
                        Patient
                      </th>
                      <th>
                        Metric
                      </th>
                      <th>
                        Month
                      </th>
                      <th>
                        Value
                      </th>
					  
                    </thead>
					
				
					
					
                    <tbody>
                      <tr>
					     <?php
	/* Fetch data from databse(select query) */
            $resbio = $con->query("select * from item" ) or die(mysqli_error($con));
            while($row = mysqli_fetch_array($resbio))
            {
        ?>
                        
                        <td>
						  <?php echo $row["description"]; ?>
                         
                        </td>
                        <td>
                          <?php echo $row["subcategory"]; ?>
                        </td>
                        <td>
                         <?php echo $row["supplier"]; ?>
                        </td>
						
						 <td>
                         <?php echo $row["item"]; ?>
						 
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
              
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  <div class="card-footer ">
			  
			  
			  
			  
			  
			  
			  
			  
			  
                <hr>
                <div class="stats">
                  <i class="now-ui-icons loader_refresh spin"></i> Update on real time
                </div>
				
				
				
				
				
				  
				
				
				
				
				
              </div>
			  
			  
			  
			  
			  
			  
            </div>
			
			
			
			
			
			
          </div>
		  
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h5 class="card-category">All Patients List</h5>
                <h4 class="card-title"> Patients List</h4>
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
            $res = $con->query("select * from tblregistration " ) or die(mysqli_error($con));
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
						<!--
						<td class="text-right"> <a href="user.php?isEdit=<?php echo $row["RegId"]; ?>"> <img  style = "  height:40px; width:55px;" src="edit.png"> </img>   </a> </td>
			            <td></td>
		                <td class="text-right"> <a href="?delete=<?php echo $row["RegId"]; ?>"><img style = "  height:40px; width:55px;" src="delete.png"> </img></a></td>
	                  	-->
						<td></td>
                        </tr>
					    <?php
						$searchstring =   $row["RegFullName"];
                        }
                        ?>
						
					
					
                  </table>
				  
				  
				
				  
				  
				   <?php 
 $results_per_page = 5;


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
  echo '<a href="doctordata.php?page=' . $page . '">' . $page . '</a> ';
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
				
				
				
				
				
						  

			  
<?php


/* functions 		               */
include("./submysql.php");
include("./subconfig.php");
include("./subdisplay.php");
include("./subtimedate.php");

/* HTML special characters converted before data is displayed        */


// ----------
// item form


function show_item($item, $subcategory, $description, $supplier, $item_index, $menu) {
global $sql_result_subcategories, $sql_result_suppliers;
  if ($item) {
     $sel_subcategory = $subcategory;
     $sel_supplier = $supplier;
   }
   
?>

 <div class="card-body">


 <div class="form-group">	
   <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
   <table class="entry">
   <tbody>
     <tr> &nbsp; </tr>
     <tr>
	 
       <td><strong>Value:</strong></td>  
	   
	   
	     
	   
	   
<?php
     echo "
	 
	 
	 
	 
	 <td><input type=\"text\"  size=\"50\" name=\"item\" value=\"$item\" /></td>
     </tr>
     <tr>
	 
	
	 
       <td ><strong>Metric:</strong></td>
       <td><select name=\"sel_subcategory\"><option value=\"$subcategory\">$subcategory</option>";
     while ($row = mysqli_fetch_array($sql_result_subcategories)) {
         $subcat_opt = $row['subcategory'];
         echo "<option value=\"$subcat_opt\">$subcat_opt</option>";
       }
     echo "</select></td>
     </tr>
   
     <tr>
       <td><strong>Month:</strong></td>

       <td><select name=\"sel_supplier\"><option value=\"$supplier\">$supplier</option>";
	   
     while ($row = mysqli_fetch_array($sql_result_suppliers)) {
         $supplier_opt = $row['supplier'];
         echo "<option value=\"$supplier_opt\">$supplier_opt</option>";
       }
     echo "</select></td>
     </tr>
	 
	 
     <tr><td><input type=\"hidden\" name=\"item_code\" value=\"$item\" /></td><td><input type=\"hidden\" name=\"item_index\" value=\"$item_index\" /></td></tr>";
?>



<?php
  
    // Connect to database 
    $con = mysqli_connect("localhost","root","","vel");
      
    // mysqli_connect("servername","username","password","database_name")
   
    // Get all the categories from description table
    $sql = "SELECT * FROM `tblregistration`";
    $all_categories = mysqli_query($con,$sql);
   
    // The following code checks if the submit button is clicked 
    // and inserts the data in the database accordingly
    if(isset($_POST['submit']))
    {
        // Store the Product name in a "name" variable
        $name = mysqli_real_escape_string($con,$_POST['RegFullName']);
         
        // Store the description ID in a "id" variable
        $id = mysqli_real_escape_string($con,$_POST['description']); 
         
        // Creating an insert query using SQL syntax and
        // storing it in a variable.
        $sql_insert = 
        "INSERT INTO `tblregistration`(`RegFullName`, `RegID`)
            VALUES ('$name','$id')";
           
          // The following code attempts to execute the SQL query
          // if the query executes with no errors 
          // a javascript alert message is displayed
          // which says the data is inserted successfully
          if(mysqli_query($con,$sql_insert))
        {
            echo '<script>alert("Record added successfully")</script>';
        }
    }
?>
   





   
        
        <h9> <b> Select a Patient: </b></h9>
        <select name="description">
            <?php 
               
                while ($description = mysqli_fetch_array(
                        $all_categories,MYSQLI_ASSOC)):; 
            ?>
			
                <option name="description" value="<?php echo $description["RegFullName"]; ?>">
                    <?php echo $description["RegFullName"];
                        // To show the description name to the user
                    ?>
                </option>
            <?php 
                endwhile; 
                // While loop must be terminated
            ?>
        </select>
        
		<!--
        <input type="submit" value="submit" name="submit">
		-->
		
		
	



    <tr><td></td><td>
	
	<div> &nbsp;</div>
	<div> &nbsp;</div>
	
	</div>
	   </div>
	
	<table><tbody><tr><td><input type="submit" value="First" name="first" /></td><td><input type="submit" value="Previous" name="previous" /></td><td><input type="submit" value="Next" name="next" /></td><td><input type="submit" value="Select" name="last" /></td><td>&nbsp;</td><td><input type="submit" value="Reset" name="reset" /></td><td>&nbsp;</td><td>&nbsp;</td>
	
	
	<td><input type="submit" value="New" name="clear" /></td>
	</tr>
	<tr>
	
	<td><input type="submit" value="Add" name="add" /></td><td><input type="submit" value="Update" name="update" /></td><td><input type="submit" value="List" name="list" /></td><td><input type="submit" value="Delete" name="delete" /></td></tr></tbody></table></td>
   </tr>
   
   </tbody>
  </table></form>
  
 
				
  
  <?php

  
  ?>
  
  
<?php
//  sub_button($menu, "Menu");
//  return;
 }
  ?>
  
  <?php
  
// -----------------
// create item array , list of subcategories and suppliers
function create_item_list($db_connection) {
global $item_array, $sql_result_subcategories, $sql_result_suppliers;

// sql query - list items
 $sql_item_list = "SELECT item, subcategory, description, supplier FROM item ORDER BY item";

// list items
 $sql_item_list_result = sub_query($sql_item_list, $db_connection);

 if (!$sql_item_list_result) {
    sub_company_heading($my_company, $module_name, $application);
    sub_message_error("Unable to access item table");
    sub_button($module, "Reset");
    sub_button($menu, "Menu");
    exit;
  }

// create item array
 $item_index = 0;

// escape single, double quote, backslash
 while ($row = mysqli_fetch_array($sql_item_list_result)) {
      $item_esc = addslashes($row['item']);
      $subcategory_esc = addslashes($row['subcategory']);
      $description_esc = addslashes($row['description']);
      $supplier_esc = addslashes($row['supplier']);
      $item_array[$item_index] = array($item_esc, $subcategory_esc, $description_esc, $supplier_esc);
      $item_index += 1;
   }
 $last_item = $item_index - 1;

// sql query - list of subcategories
 $sql_list_subcategories = "SELECT subcategory, category, description from subcategory ORDER BY category, subcategory";

// execute SQL query
 $sql_result_subcategories = sub_query($sql_list_subcategories, $db_connection);

 if (!$sql_result_subcategories) {
   sub_company_heading($my_company, $module_name, $application);
   sub_message_error("Unable to access subcategory table");
   sub_button($module, "Reset");
   sub_button($menu, "Menu");
   exit;
  }

// sql query - list of suppliers
 $sql_list_suppliers = "SELECT supplier, address, contact, telephone FROM supplier ORDER BY supplier";

// execute SQL query
 $sql_result_suppliers = sub_query($sql_list_suppliers, $db_connection);

 if (!$sql_result_suppliers) {
   sub_company_heading($my_company, $module_name, $application);
   sub_message_error("Unable to access supplier table");
   sub_button($module, "Reset");
   sub_button($menu, "Menu");
   exit;
  }
//  -1 if no items
 return $last_item;
 }
 

// ------------------------------
// display item form with no data
function no_item_data($item_index, $my_company, $module_name, $menu, $application) {
 sub_company_heading($my_company, $module_name, $application);
 show_item("", "", "", "", $item_index, $menu);
 return;
 }

// ---------------------------------------------------
// extract item data from item array and use htmlspecialchars
function get_item_html($item_index) {
global $item_array;

  if (!($item_index < 0)) {
    list($item_esc, $subcategory_esc, $description_esc, $supplier_esc) = $item_array[$item_index];
    $item_html = htmlspecialchars(stripslashes($item_esc), ENT_QUOTES);
    $subcategory_html = htmlspecialchars(stripslashes($subcategory_esc), ENT_QUOTES);
    $description_html = htmlspecialchars(stripslashes($description_esc), ENT_QUOTES);
    $supplier_html = htmlspecialchars(stripslashes($supplier_esc), ENT_QUOTES);
    return array($item_html, $subcategory_html, $description_html, $supplier_html);
   } else {
       return array("", "", "", "");
     }
}

// ---------------------------------------------------
// extract item data from item array, with backslashes
function get_item_esc($item_index) {
global $item_array;
 if (!($item_index < 0)) {
      return $item_array[$item_index];
  } else {
	 return array("", "", "", "");
    }       
}

// ---------------------------------
// main module
// ---------------------------------

 $module_name="";
 $module="maintitem.php";
 $db = "vel";

// get config variables and create connection
 list($my_company, $date_format, $menu, $database, $date_separator, $db_connection, $application) = sub_config($db);  

 $first_item = 0;
 $last_item = create_item_list($db_connection);

// check if form was submitted and which button was pressed, set switch
 $switch = "first";

 if (isset($_POST['update']))  {
   $switch = "update";
  }
 if (isset($_POST['previous']))  {
   $switch = "previous";
  }
 if (isset($_POST['next']))  {
   $switch = "next";
  }
 if (isset($_POST['first']))  {
   $switch = "first";
  }
 if (isset($_POST['last']))  {
   $switch = "last";
  }
 if (isset($_POST['reset']))  {
   $switch = "reset";
  }
 if (isset($_POST['clear']))  {
   $switch = "clear";
  }
 if (isset($_POST['add']))  {
   $switch = "add";
  }
 if (isset($_POST['list']))  {
   $switch = "list";
  }
 if (isset($_POST['delete']))  {
   $switch = "delete";
  }
  
  
  
 
switch($switch) {
//---------------------------------------------------
  case "first":
// start case - first item

  $item_index = $first_item;
  if ($last_item < 0) {
     no_item_data($last_item, $my_company, $module_name, $menu, $application);
     exit;
   }

// get item details from array processed for html
  list($item_html, $subcategory_html, $description_html, $supplier_html) = get_item_html($item_index);

// display form
  sub_company_heading($my_company, $module_name, $application);
  show_item($item_html, $subcategory_html, $description_html, $supplier_html, $item_index, $menu);
    
  break;
// end case first

//---------------------------------------------------
 case "add":
// start case - add pressed

// retrieve variables
  $item = trim($_POST['item']);
  $subcategory = trim($_POST['sel_subcategory']); 
  $description = trim($_POST['description']);
  $supplier = trim($_POST['sel_supplier']);
  $item_index = $_POST['item_index'];
 
// escape quotes and slash
  $item_esc = addslashes($item);
  $subcategory_esc = addslashes($subcategory);
  $description_esc = addslashes($description);
  $supplier_esc = addslashes($supplier);
  
// htmlspecialchars 
  $item_html = htmlspecialchars($item, ENT_QUOTES);
  $subcategory_html = htmlspecialchars($subcategory, ENT_QUOTES);
  $description_html = htmlspecialchars($description, ENT_QUOTES);
  $supplier_html = htmlspecialchars($supplier, ENT_QUOTES);
 
// validate input
  if ((!$item_esc) or (!$subcategory_esc) or (!$description_esc) or (!$supplier_esc)) {
     sub_company_heading($my_company, $module_name, $application);
     show_item($item_html, $subcategory_html, $description_html, $supplier_html, $last_item + 1, $menu);
     sub_message_warning("At least one field is blank");
     exit;
   }

// sql query - insert
 $sql_insert = "INSERT INTO item (item, subcategory, description, supplier) VALUES ('$item_esc', '$subcategory_esc', '$description_esc', '$supplier_esc')";
 
// sql query - lookup
 $sql_lookup = "SELECT item, subcategory, description, supplier FROM item WHERE item='$item_esc'";

// lookup item
 $sql_result = sub_query($sql_lookup,$db_connection);

 while ($row = mysqli_fetch_array($sql_result)) {
   $item2 =  $row['item'];
   $subcategory2 =  $row['subcategory']; 
   $description2 =  $row['description'];
   $supplier2 =  $row['supplier'];
  
// htmlspecialchars
   $item2_html = htmlspecialchars($item2, ENT_QUOTES);
   $subcategory2_html = htmlspecialchars($subcategory2, ENT_QUOTES);
   $description2_html = htmlspecialchars($description2, ENT_QUOTES);
   $supplier2_html = htmlspecialchars($supplier2, ENT_QUOTES);
  }
/*
 if (isset($item2)) {
    sub_company_heading($my_company, $module_name, $application);
    show_item($item2_html, $subcategory2_html, $description2_html, $supplier2_html, $last_item, $menu);
    sub_message_error("Item already exists");
    exit;
  }*/
 $sql_result = sub_query($sql_insert,$db_connection);

// force 'invalid item' status
 $new_item_index = $last_item + 1;

 if (!$sql_result) {
    sub_company_heading($my_company, $module_name, $application);
    show_item($item_html, $subcategory_html, $description_html, $supplier_html, $new_item_index, $menu);
    sub_message_error("Unable to add item");
  } else {
     sub_company_heading($my_company, $module_name, $application);
     show_item($item_html, $subcategory_html, $description_html, $supplier_html, $new_item_index, $menu);
     sub_message_info("A new item was added");
  }

 break;
// end case add

//---------------------------------------------------
 case "update":
// start case - update item
// item_index from the original item
// item name is the key and cannot be changed

// retrieve variables
  $item = trim($_POST['item']);
  $subcategory = trim($_POST['sel_subcategory']); 
  $description = trim($_POST['description']);
  $supplier = trim($_POST['sel_supplier']);
  $item_index = $_POST['item_index'];
 
// escape quotes and slash
  $item_esc = addslashes($item);
  $subcategory_esc = addslashes($subcategory);
  $description_esc = addslashes($description);
  $supplier_esc = addslashes($supplier);
  
// htmlspecialchars
  $item_html = htmlspecialchars($item, ENT_QUOTES);
  $subcategory_html = htmlspecialchars($subcategory, ENT_QUOTES);
  $description_html = htmlspecialchars($description, ENT_QUOTES);
  $supplier_html = htmlspecialchars($supplier, ENT_QUOTES);
 
// validate input
  if ((!$item_esc) or (!$subcategory_esc) or (!$description_esc) or (!$supplier_esc)) {
     sub_company_heading($my_company, $module_name, $application);
     show_item($item_html, $subcategory_html, $description_html, $supplier_html, $item_index, $menu);
     sub_message_warning("At least one of the fields is blank");
     exit;
   }

// *******************
// validate item index
// *******************
 if (!is_numeric($item_index) or ($item_index > $last_item) or ($item_index < 0)) {
    sub_company_heading($my_company, $module_name, $application);
    show_item($item_html, $subcategory_html, $description_html, $supplier_html, $item_index, $menu);
    sub_message_error("Item does not exist, it cannot be updated");
    exit;
  }

// ***********************
// cannot change item key 
// ***********************
// get item details from array
 list($item2_esc, $subcategory2_esc, $description2_esc, $supplier2_esc) = get_item_esc($item_index);

// compare form to array
 if (!($item_esc == $item2_esc)) {
    sub_company_heading($my_company, $module_name, $application);
    show_item($item_html, $subcategory_html, $description_html, $supplier_html, $item_index, $menu);
    sub_message_error("Item code was changed, item cannot be updated");
    exit;
  }
 
// sql query - update a row in item table
   $sql_update_item = "UPDATE item SET subcategory='$subcategory_esc', description='$description_esc', supplier='$supplier_esc' WHERE item='$item_esc'";
   
   $sql_update_item_result = sub_query($sql_update_item, $db_connection);

   if (!$sql_update_item_result) {
       sub_company_heading($my_company, $module_name, $application);
       show_item($item_html, $subcategory_html, $description_html, $supplier_html, $item_index, $menu);
 	sub_message_error("Unable to update item");
	exit;
     }

// display form
  sub_company_heading($my_company, $module_name, $application);
  show_item($item_html, $subcategory_html, $description_html, $supplier_html, $item_index, $menu); 
  sub_message_info("Item was updated");

  break;
// end case update

//---------------------------------------------------
 case "delete":
// start case delete

// retrieve variables
  $item = trim($_POST['item']);
  $subcategory = trim($_POST['sel_subcategory']); 
  $description = trim($_POST['description']);
  $supplier = trim($_POST['sel_supplier']);
  $item_index = $_POST['item_index'];
 
// escape quotes and slash
  $item_esc = addslashes($item);
  
// htmlspecialchars
  $item_html = htmlspecialchars($item, ENT_QUOTES);
  $subcategory_html = htmlspecialchars($subcategory, ENT_QUOTES);
  $description_html = htmlspecialchars($description, ENT_QUOTES);
  $supplier_html = htmlspecialchars($supplier, ENT_QUOTES); 

// *******************
// validate item index
// *******************
 if (!is_numeric($item_index) or ($item_index > $last_item) or ($item_index < 0)) {
    sub_company_heading($my_company, $module_name, $application);
    show_item($item_html, $subcategory_html, $description_html, $supplier_html, $last_item + 1, $menu);
    sub_message_error("Item does not exist, it cannot be deleted");
    exit;
  }

// ***********************
// cannot change item key 
// ***********************
// get item details from array
 list($item2_esc, $subcategory2_esc, $description2_esc, $supplier2_esc) = get_item_esc($item_index);

// compare item
 if (!($item_esc == $item2_esc)) {
    sub_company_heading($my_company, $module_name, $application);
    show_item($item_html, $subcategory_html, $description_html, $supplier_html, $item_index, $menu);
    sub_message_error("Item code was changed, item cannot be deleted");
    exit;
  }

// sql delete query
 $sql_delete = "DELETE FROM item WHERE item='$item_esc'";

 $sql_delete_result = sub_query($sql_delete, $db_connection);

 if (!$sql_delete_result) {
    sub_company_heading($my_company, $module_name, $application);
    show_item($item_html, $subcategory_html, $description_html, $supplier_html, $item_index, $menu);
    sub_message_error("Unable to delete from item table");
    exit;
  } else {
      sub_company_heading($my_company, $module_name, $application);
      show_item($item_html, $subcategory_html, $description_html, $supplier_html, $item_index, $menu);
      sub_message_info("Item was deleted");
      exit;
  }

 break;
// end case delete

//---------------------------------------------------
  case "previous":
// start case - previous pressed

// retrieve hidden field from form
  $item_index = $_POST['item_index'];
 
  if (!is_numeric($item_index) or ($item_index > $last_item) or ($item_index < 0)) {
     no_item_data($last_item, $my_company, $module_name, $menu, $application);
     exit;
   }

// decrement item pointer, first --> last
  if (($item_index > 0) and ($item_index <= $last_item)) {
     $item_index -= 1; 
    } else {
     $item_index = $last_item;
   }

// get item details from array in html format
  list($item_html, $subcategory_html, $description_html, $supplier_html) = get_item_html($item_index);

// display form
  sub_company_heading($my_company, $module_name, $application);
  show_item($item_html, $subcategory_html, $description_html, $supplier_html, $item_index, $menu);

  break;
// end case previous

//---------------------------------------------------
  case "next":
// start case - next pressed

// retrieve hidden field from form
  $item_index = $_POST['item_index'];
 
  if (!is_numeric($item_index) or ($item_index > $last_item) or ($item_index < 0)) {
     no_item_data($last_item, $my_company, $module_name, $menu, $application);
     exit;
   }
 
// increment item pointer, last --> first
  if (($item_index >= 0) and ($item_index < $last_item)) {
     $item_index += 1; 
    } else {
     $item_index = 0;
   }

// get item details from array in html format
  list($item_html, $subcategory_html, $description_html, $supplier_html) = get_item_html($item_index);

// display the form
  sub_company_heading($my_company, $module_name, $application);
  show_item($item_html, $subcategory_html, $description_html, $supplier_html, $item_index, $menu);

  break;
// end case next

//---------------------------------------------------
  case "last":
// start case - last pressed



$item = trim($_POST['item']);
  $subcategory = trim($_POST['sel_subcategory']); 
  $description = trim($_POST['description']);
  $supplier = trim($_POST['sel_supplier']);
  $item_index = $_POST['item_index'];
 
// escape quotes and slash
  $item_esc = addslashes($item);
  $subcategory_esc = addslashes($subcategory);
  $description_esc = addslashes($description);
  $supplier_esc = addslashes($supplier);
  
// htmlspecialchars 
  $item_html = htmlspecialchars($item, ENT_QUOTES);
  $subcategory_html = htmlspecialchars($subcategory, ENT_QUOTES);
  $description_html = htmlspecialchars($description, ENT_QUOTES);
  $supplier_html = htmlspecialchars($supplier, ENT_QUOTES);
 
// validate input
  if ((!$item_esc) or (!$subcategory_esc) or (!$description_esc) or (!$supplier_esc)) {
     sub_company_heading($my_company, $module_name, $application);
     show_item($item_html, $subcategory_html, $description_html, $supplier_html, $last_item + 1, $menu);
     sub_message_warning("At least one field is blank");
     exit;
   }

// sql query - insert
// $sql_insert = "INSERT INTO item (item, subcategory, description, supplier) VALUES ('$item_esc', '$subcategory_esc', '$description_esc', '$supplier_esc')";
 
 $sql_choose = "select * from item where description like '%$description_esc%'" ;
 
 
// sql query - lookup
 $sql_lookup = "SELECT item, subcategory, description, supplier FROM item WHERE item='$item_esc'";

// lookup item
 $sql_result = sub_query($sql_lookup,$db_connection);

 while ($row = mysqli_fetch_array($sql_result)) {
   $item2 =  $row['item'];
   $subcategory2 =  $row['subcategory']; 
   $description2 =  $row['description'];
   $supplier2 =  $row['supplier'];
  
// htmlspecialchars
   $item2_html = htmlspecialchars($item2, ENT_QUOTES);
   $subcategory2_html = htmlspecialchars($subcategory2, ENT_QUOTES);
   $description2_html = htmlspecialchars($description2, ENT_QUOTES);
   $supplier2_html = htmlspecialchars($supplier2, ENT_QUOTES);
  }
/*
 if (isset($item2)) {
    sub_company_heading($my_company, $module_name, $application);
    show_item($item2_html, $subcategory2_html, $description2_html, $supplier2_html, $last_item, $menu);
    sub_message_error("Item already exists");
    exit;
  }
 $sql_result = sub_query($sql_choose,$db_connection);

// force 'invalid item' status
 $new_item_index = $last_item + 1;

 if (!$sql_result) {
    sub_company_heading($my_company, $module_name, $application);
    show_item($item_html, $subcategory_html, $description_html, $supplier_html, $new_item_index, $menu);
    sub_message_error("Unable to add item");
  } else {
     sub_company_heading($my_company, $module_name, $application);
     show_item($item_html, $subcategory_html, $description_html, $supplier_html, $new_item_index, $menu);
     sub_message_info("A new item was added");
  }

*/



////////////////////////////////////////////////////////

  $item_index = $last_item;

  if ($last_item < 0) {
     no_item_data($last_item, $my_company, $module_name, $menu, $application);
     exit;
   }

// get item details from array in html format
  list($item_html, $subcategory_html, $description_html, $supplier_html) = get_item_html($item_index);
 
// display form
  sub_company_heading($my_company, $module_name, $application);
  show_item($item_html, $subcategory_html, $description_html, $supplier_html, $item_index, $menu);
 
 $resbio3 = $con->query("select * from item where description like  '%$description_esc%'" ) or die(mysqli_error($con));
 
  break;
// end case last

//---------------------------------------------------
  case "reset":
// start case - reset pressed

// retrieve hidden field from form
  $item_index = $_POST['item_index'];
 
  if (!is_numeric($item_index) or ($item_index > $last_item) or ($item_index < 0)) {
     no_item_data($last_item, $my_company, $module_name, $menu, $application);
     exit;
   }

// get item details from array in html format
  list($item_html, $subcategory_html, $description_html, $supplier_html) = get_item_html($item_index);
 
// display form
  sub_company_heading($my_company, $module_name, $application);
  show_item($item_html, $subcategory_html, $description_html, $supplier_html, $item_index, $menu);
 
  break;
// end case reset

//---------------------------------------------------
  case "clear":
// start case - clear pressed

// retrieve hidden field from form
  $item_index = $_POST['item_index'];
 
  $item_html = "";
  $subcategory_html = "";
  $description_html = "";
  $supplier_html = "";

// display form
  sub_company_heading($my_company, $module_name, $application);
  show_item($item_html, $subcategory_html, $description_html, $supplier_html, $item_index, $menu);

  break;
// end case clear

//---------------------------------------------------
 case "list":
// start case - list items from the item array

// today's date
 list($timestamp, $today, $local_date) = get_date($date_format, $date_separator);

 $item_index = 0;
 echo "<h1>$my_company</h1><h1>&nbsp;</h1><h1>Bio records &nbsp; &nbsp; &nbsp; $local_date</h1><h1>&nbsp;</h1>
   <table><tbody>
   <tr style=\"font-family: helvetica; background-color: #FFEC69; font-weight: bold\">";
 echo "<td>Item</td><td style=\"background-color: #FFFFFF;\">&nbsp;</td><td>Subcategory</td><td>Description</td><td>Supplier</td></tr>"; 
 while (!($item_index > $last_item)) { 
     list($item_html, $subcategory_html, $description_html, $supplier_html) = get_item_html($item_index);
     $item_index += 1;
     echo "<tr><td>$item_html</td><td>&nbsp;</td><td>$subcategory_html</td><td>$description_html</td><td>$supplier_html</td></tr>";
   }
 echo "</tbody></table>"; 
 echo "<p><b>$item_index &nbsp; items</b></p>";
 break;
// end case list

//---------------------------------------------------
 default:
   sub_company_heading($my_company, $module_name, $application);
   sub_message_error("case = default");
 }
 
  
  //  list($timestamp, $today, $local_date) = get_date($date_format, $date_separator);

 $item_index = 0;
 echo "
 
 <div> &nbsp;</div>
 <h1></h1><h1>&nbsp;</h1><h6>Patient Bio Data &nbsp; &nbsp; &nbsp; </h6>
   <table><tbody>
   
   <tr style=\"font-family: helvetica; background-color: gray; font-weight: bold\">";
 echo "<td>Value</td><td style=\"background-color: #FFFFFF;
 
 
 tr:nth-child(even){background-color: #f2f2f2}

 
 
 
 \">&nbsp;</td><td>Metric</td><td>Patient</td><td>Month</td></tr>"; 
 while (!($item_index > $last_item)) { 
     list($item_html, $subcategory_html, $description_html, $supplier_html) = get_item_html($item_index);
     $item_index += 1;
     echo "<tr><td>$item_html</td><td>&nbsp;</td><td>$subcategory_html</td><td>$description_html</td><td>$supplier_html</td></tr>";
   }
 echo "</tbody></table>"; 
 echo "<p><b>$item_index &nbsp; records</b></p>";
  

 
 
 
?>
		</div>









     <table class="table">
                    <thead class=" text-primary">
                      <th>
                        Patient
                      </th>
                      <th>
                        Metric
                      </th>
                      <th>
                        Month
                      </th>
                      <th>
                        Value
                      </th>
					  
                    </thead>
					
				
					
					
                    <tbody>
                      <tr>
					     <?php
	/* Fetch data from databse(select query) */
	       
		  //  $reference = echo $description_esc; 
            $resbio = $con->query("select * from item where description like  '%$description_esc%'" ) or die(mysqli_error($con));
            while($row = mysqli_fetch_array($resbio))
            {
        ?>
                        
                        <td>
						  <?php echo $row["description"]; ?>
                         
                        </td>
                        <td>
                          <?php echo $row["subcategory"]; ?>
                        </td>
                        <td>
                         <?php echo $row["supplier"]; ?>
                        </td>
						
						 <td>
                         <?php echo $row["item"]; ?>
						 
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



















<!--
		
                <form>
                  <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>Company (disabled)</label>
                        <input type="text" class="form-control" disabled="" placeholder="Company" value="Creative Code Inc.">
                      </div>
                    </div>
                    <div class="col-md-3 px-1">
                      <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" placeholder="Username" value="michael23">
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" placeholder="Email">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>First Name</label>
                        <input type="text" class="form-control" placeholder="Company" value="Mike">
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" class="form-control" placeholder="Last Name" value="Andrew">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" placeholder="Home Address" value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control" placeholder="City" value="Mike">
                      </div>
                    </div>
                    <div class="col-md-4 px-1">
                      <div class="form-group">
                        <label>Country</label>
                        <input type="text" class="form-control" placeholder="Country" value="Andrew">
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label>Postal Code</label>
                        <input type="number" class="form-control" placeholder="ZIP Code">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>About Me</label>
                        <textarea rows="4" cols="80" class="form-control" placeholder="Here can be your description" value="Mike">Lamborghini Mercy, Your chick she so thirsty, I'm in that two seat Lambo.</textarea>
                      </div>
                    </div>
                  </div>
                </form>
				
				
				-->
				
				
				
				
				
				
				
				
				
				
				
              </div>
			  
			  
			  
			  
			  
			  	 <?php
	/* Fetch data from databse(select query) */

	       
           $resbio4 = $con->query("select * from item where description like '%$description_esc%' and supplier like '%Jan%' and subcategory like '%gen%'" ) or die(mysqli_error($con));
            while($row = mysqli_fetch_array($resbio4))
            {
        ?>
                        <tr>
                     <td>
                         <?php // echo $row["description"]; ?>
						 
                        </td>
						
						 <td>
						 <?php // echo $row["item"]; ?>
                         <?php $v1g = $row["item"]; ?>
						 
                        </td>
						
						<td></td>
                        </tr>
					    <?php
                        }
                        ?>
			  
			  
				  	 <?php
	/* Fetch data from databse(select query) */

	       
           $resbio5 = $con->query("select * from item where description like  '%$description_esc%' and supplier like  '%Feb%' and subcategory like  '%gen%'" ) or die(mysqli_error($con));
            while($row = mysqli_fetch_array($resbio5))
            {
        ?>
                        <tr>
                     <td>
                         <?php // echo $row["description"]; ?>
						 
                        </td>
						
						 <td>
						 <?php // echo $row["item"]; ?>
                         <?php $v2g = $row["item"]; ?>
						 
                        </td>
						
						<td></td>
                        </tr>
					    <?php
                        }
                        ?>	  
			  
			  
			  
			  
			  	 <?php
	/* Fetch data from databse(select query) */

	       
           $resbio6 = $con->query("select * from item where description like  '%$description_esc%' and supplier like  '%Mar%' and subcategory like  '%gen%'" ) or die(mysqli_error($con));
            while($row = mysqli_fetch_array($resbio6))
            {
        ?>
                        <tr>
                     <td>
                         <?php // echo $row["description"]; ?>
						 
                        </td>
						
						 <td>
						 <?php // echo $row["item"]; ?>
                         <?php $v3g = $row["item"]; ?>
						 
                        </td>
						
						<td></td>
                        </tr>
					    <?php
                        }
                        ?>	 
			  
			  
				 <?php
	/* Fetch data from databse(select query) */

	       
           $resbio7 = $con->query("select * from item where description like  '%$description_esc%' and supplier like  '%Apr%' and subcategory like  '%gen%'" ) or die(mysqli_error($con));
            while($row = mysqli_fetch_array($resbio7))
            {
        ?>
                        <tr>
                     <td>
                         <?php // echo $row["description"]; ?>
						 
                        </td>
						
						 <td>
						 <?php // echo $row["item"]; ?>
                         <?php $v4g = $row["item"]; ?>
						 
                        </td>
						
						<td></td>
                        </tr>
					    <?php
                        }
                        ?>




 <?php
	/* Fetch data from databse(select query) */

	       
           $resbio8 = $con->query("select * from item where description like  '%$description_esc%' and supplier like  '%May%' and subcategory like  '%gen%'" ) or die(mysqli_error($con));
            while($row = mysqli_fetch_array($resbio8))
            {
        ?>
                        <tr>
                     <td>
                         <?php // echo $row["description"]; ?>
						 
                        </td>
						
						 <td>
						 <?php // echo $row["item"]; ?>
                         <?php $v5g = $row["item"]; ?>
						 
                        </td>
						
						<td></td>
                        </tr>
					    <?php
                        }
                        ?>	 





	 <?php
	/* Fetch data from databse(select query) */

	       
           $resbio9 = $con->query("select * from item where description like  '%$description_esc%' and supplier like  '%Jun%' and subcategory like  '%gen%'" ) or die(mysqli_error($con));
            while($row = mysqli_fetch_array($resbio9))
            {
        ?>
                        <tr>
                     <td>
                         <?php // echo $row["description"]; ?>
						 
                        </td>
						
						 <td>
						 <?php // echo $row["item"]; ?>
                         <?php $v6g = $row["item"]; ?>
						 
                        </td>
						
						<td></td>
                        </tr>
					    <?php
                        }
                        ?>	 





 <?php
	/* Fetch data from databse(select query) */

	       
           $resbio10 = $con->query("select * from item where description like  '%$description_esc%' and supplier like  '%Jul%' and subcategory like  '%gen%'" ) or die(mysqli_error($con));
            while($row = mysqli_fetch_array($resbio10))
            {
        ?>
                        <tr>
                     <td>
                         <?php // echo $row["description"]; ?>
						 
                        </td>
						
						 <td>
						 <?php // echo $row["item"]; ?>
                         <?php $v7g = $row["item"]; ?>
						 
                        </td>
						
						<td></td>
                        </tr>
					    <?php
                        }
                        ?>	 





 <?php
	/* Fetch data from databse(select query) */

	       
           $resbio11 = $con->query("select * from item where description like  '%$description_esc%' and supplier like  '%Aug%' and subcategory like  '%gen%'" ) or die(mysqli_error($con));
            while($row = mysqli_fetch_array($resbio11))
            {
        ?>
                        <tr>
                     <td>
                         <?php // echo $row["description"]; ?>
						 
                        </td>
						
						 <td>
						 <?php // echo $row["item"]; ?>
                         <?php $v8g = $row["item"]; ?>
						 
                        </td>
						
						<td></td>
                        </tr>
					    <?php
                        }
                        ?>	 


 <?php
	/* Fetch data from databse(select query) */

	       
           $resbio12 = $con->query("select * from item where description like  '%$description_esc%' and supplier like  '%Sep%' and subcategory like  '%gen%'" ) or die(mysqli_error($con));
            while($row = mysqli_fetch_array($resbio12))
            {
        ?>
                        <tr>
                     <td>
                         <?php // echo $row["description"]; ?>
						 
                        </td>
						
						 <td>
						 <?php // echo $row["item"]; ?>
                         <?php $v9g = $row["item"]; ?>
						 
                        </td>
						
						<td></td>
                        </tr>
					    <?php
                        }
                        ?>	 








 <?php
	/* Fetch data from databse(select query) */

	       
           $resbio13 = $con->query("select * from item where description like  '%$description_esc%' and supplier like  '%Oct%' and subcategory like  '%gen%'" ) or die(mysqli_error($con));
            while($row = mysqli_fetch_array($resbio13))
            {
        ?>
                        <tr>
                     <td>
                         <?php // echo $row["description"]; ?>
						 
                        </td>
						
						 <td>
						 <?php // echo $row["item"]; ?>
                         <?php $v10g = $row["item"]; ?>
						 
                        </td>
						
						<td></td>
                        </tr>
					    <?php
                        }
                        ?>	 


 <?php
	/* Fetch data from databse(select query) */

	       
           $resbio14 = $con->query("select * from item where description like  '%$description_esc%' and supplier like  '%Nov%' and subcategory like  '%gen%'" ) or die(mysqli_error($con));
            while($row = mysqli_fetch_array($resbio14))
            {
        ?>
                        <tr>
                     <td>
                         <?php // echo $row["description"]; ?>
						 
                        </td>
						
						 <td>
						 <?php // echo $row["item"]; ?>
                         <?php $v11g = $row["item"]; ?>
						 
                        </td>
						
						<td></td>
                        </tr>
					    <?php
                        }
                        ?>	 
						
						
						
 <?php
	/* Fetch data from databse(select query) */

	       
           $resbio15 = $con->query("select * from item where description like  '%$description_esc%' and supplier like  '%Dec%' and subcategory like  '%gen%'" ) or die(mysqli_error($con));
            while($row = mysqli_fetch_array($resbio15))
            {
        ?>
                        <tr>
                     <td>
                         <?php // echo $row["description"]; ?>
						 
                        </td>
						
						 <td>
						 <?php // echo $row["item"]; ?>
                         <?php $v12g = $row["item"]; ?>
						 
                        </td>
						
						<td></td>
                        </tr>
					    <?php
                        }
                        ?>							
						
						
						
		<?php
	/* Fetch data from databse(select query) */

	       
           $resheart1 = $con->query("select * from item where description like  '%$description_esc%' and supplier like  '%Jan%' and subcategory like  '%BPM%'" ) or die(mysqli_error($con));
            while($row = mysqli_fetch_array($resheart1))
            {
        ?>
                        <tr>
                     <td>
                         <?php // echo $row["description"]; ?>
						 
                        </td>
						
						 <td>
						 <?php // echo $row["item"]; ?>
                         <?php $h1g = $row["item"]; ?>
						 
                        </td>
						
						<td></td>
                        </tr>
					    <?php
                        }
                        ?>								
						
						
						
								
		<?php
	/* Fetch data from databse(select query) */

	       
           $resheart2 = $con->query("select * from item where description like  '%$description_esc%' and supplier like  '%Feb%' and subcategory like  '%BPM%'" ) or die(mysqli_error($con));
            while($row = mysqli_fetch_array($resheart2))
            {
        ?>
                        <tr>
                     <td>
                         <?php // echo $row["description"]; ?>
						 
                        </td>
						
						 <td>
						 <?php // echo $row["item"]; ?>
                         <?php $h2g = $row["item"]; ?>
						 
                        </td>
						
						<td></td>
                        </tr>
					    <?php
                        }
                        ?>								
						


						
		<?php
	/* Fetch data from databse(select query) */

	       
           $resheart3 = $con->query("select * from item where description like  '%$description_esc%' and supplier like  '%Mar%' and subcategory like  '%BPM%'" ) or die(mysqli_error($con));
            while($row = mysqli_fetch_array($resheart3))
            {
        ?>
                        <tr>
                     <td>
                         <?php // echo $row["description"]; ?>
						 
                        </td>
						
						 <td>
						 <?php // echo $row["item"]; ?>
                         <?php $h3g = $row["item"]; ?>
						 
                        </td>
						
						<td></td>
                        </tr>
					    <?php
                        }
                        ?>								
						


						
		<?php
	/* Fetch data from databse(select query) */

	       
           $resheart4 = $con->query("select * from item where description like  '%$description_esc%' and supplier like  '%Apr%' and subcategory like  '%BPM%'" ) or die(mysqli_error($con));
            while($row = mysqli_fetch_array($resheart4))
            {
        ?>
                        <tr>
                     <td>
                         <?php // echo $row["description"]; ?>
						 
                        </td>
						
						 <td>
						 <?php // echo $row["item"]; ?>
                         <?php $h4g = $row["item"]; ?>
						 
                        </td>
						
						<td></td>
                        </tr>
					    <?php
                        }
                        ?>								
						


						
		<?php
	/* Fetch data from databse(select query) */

	       
           $resheart5 = $con->query("select * from item where description like  '%$description_esc%' and supplier like  '%May%' and subcategory like  '%BPM%'" ) or die(mysqli_error($con));
            while($row = mysqli_fetch_array($resheart5))
            {
        ?>
                        <tr>
                     <td>
                         <?php // echo $row["description"]; ?>
						 
                        </td>
						
						 <td>
						 <?php // echo $row["item"]; ?>
                         <?php $h5g = $row["item"]; ?>
						 
                        </td>
						
						<td></td>
                        </tr>
					    <?php
                        }
                        ?>								
						


						
		<?php
	/* Fetch data from databse(select query) */

	       
           $resheart6 = $con->query("select * from item where description like  '%$description_esc%' and supplier like  '%Jun%' and subcategory like  '%BPM%'" ) or die(mysqli_error($con));
            while($row = mysqli_fetch_array($resheart6))
            {
        ?>
                        <tr>
                     <td>
                         <?php // echo $row["description"]; ?>
						 
                        </td>
						
						 <td>
						 <?php // echo $row["item"]; ?>
                         <?php $h6g = $row["item"]; ?>
						 
                        </td>
						
						<td></td>
                        </tr>
					    <?php
                        }
                        ?>								
						


						
		<?php
	/* Fetch data from databse(select query) */

	       
           $resheart7 = $con->query("select * from item where description like  '%$description_esc%' and supplier like  '%Jul%' and subcategory like  '%BPM%'" ) or die(mysqli_error($con));
            while($row = mysqli_fetch_array($resheart7))
            {
        ?>
                        <tr>
                     <td>
                         <?php // echo $row["description"]; ?>
						 
                        </td>
						
						 <td>
						 <?php // echo $row["item"]; ?>
                         <?php $h7g = $row["item"]; ?>
						 
                        </td>
						
						<td></td>
                        </tr>
					    <?php
                        }
                        ?>								
						


						
		<?php
	/* Fetch data from databse(select query) */

	       
           $resheart8 = $con->query("select * from item where description like  '%$description_esc%' and supplier like  '%Aug%' and subcategory like  '%BPM%'" ) or die(mysqli_error($con));
            while($row = mysqli_fetch_array($resheart8))
            {
        ?>
                        <tr>
                     <td>
                         <?php // echo $row["description"]; ?>
						 
                        </td>
						
						 <td>
						 <?php // echo $row["item"]; ?>
                         <?php $h8g = $row["item"]; ?>
						 
                        </td>
						
						<td></td>
                        </tr>
					    <?php
                        }
                        ?>								
						


						
		<?php
	/* Fetch data from databse(select query) */

	       
           $resheart9 = $con->query("select * from item where description like  '%$description_esc%' and supplier like  '%Sep%' and subcategory like  '%BPM%'" ) or die(mysqli_error($con));
            while($row = mysqli_fetch_array($resheart9))
            {
        ?>
                        <tr>
                     <td>
                         <?php // echo $row["description"]; ?>
						 
                        </td>
						
						 <td>
						 <?php // echo $row["item"]; ?>
                         <?php $h9g = $row["item"]; ?>
						 
                        </td>
						
						<td></td>
                        </tr>
					    <?php
                        }
                        ?>								
						


						
		<?php
	/* Fetch data from databse(select query) */

	       
           $resheart10 = $con->query("select * from item where description like  '%$description_esc%' and supplier like  '%Oct%' and subcategory like  '%BPM%'" ) or die(mysqli_error($con));
            while($row = mysqli_fetch_array($resheart10))
            {
        ?>
                        <tr>
                     <td>
                         <?php // echo $row["description"]; ?>
						 
                        </td>
						
						 <td>
						 <?php // echo $row["item"]; ?>
                         <?php $h10g = $row["item"]; ?>
						 
                        </td>
						
						<td></td>
                        </tr>
					    <?php
                        }
                        ?>								
						


						
		<?php
	/* Fetch data from databse(select query) */

	       
           $resheart11 = $con->query("select * from item where description like  '%$description_esc%' and supplier like  '%Nov%' and subcategory like  '%BPM%'" ) or die(mysqli_error($con));
            while($row = mysqli_fetch_array($resheart11))
            {
        ?>
                        <tr>
                     <td>
                         <?php // echo $row["description"]; ?>
						 
                        </td>
						
						 <td>
						 <?php // echo $row["item"]; ?>
                         <?php $h11g = $row["item"]; ?>
						 
                        </td>
						
						<td></td>
                        </tr>
					    <?php
                        }
                        ?>								
						


						
		<?php
	/* Fetch data from databse(select query) */

	       
           $resheart12 = $con->query("select * from item where description like  '%$description_esc%' and supplier like  '%Dec%' and subcategory like  '%BPM%'" ) or die(mysqli_error($con));
            while($row = mysqli_fetch_array($resheart12))
            {
        ?>
                        <tr>
                     <td>
                         <?php // echo $row["description"]; ?>
						 
                        </td>
						
						 <td>
						 <?php // echo $row["item"]; ?>
                         <?php $h12g = $row["item"]; ?>
						 
                        </td>
						
						<td></td>
                        </tr>
					    <?php
                        }
                        ?>								
												
						
			<?php
	/* Fetch data from databse(select query) */

	       
           $resbreath1 = $con->query("select * from item where description like  '%$description_esc%' and supplier like  '%Jan%' and subcategory like  '%breath%'" ) or die(mysqli_error($con));
            while($row = mysqli_fetch_array($resbreath1))
            {
        ?>
                        <tr>
                     <td>
                         <?php // echo $row["description"]; ?>
						 
                        </td>
						
						 <td>
						 <?php // echo $row["item"]; ?>
                         <?php $b1g = $row["item"]; ?>
						 
                        </td>
						
						<td></td>
                        </tr>
					    <?php
                        }
                        ?>	


	<?php
	/* Fetch data from databse(select query) */

	       
           $resbreath2 = $con->query("select * from item where description like  '%$description_esc%' and supplier like  '%Feb%' and subcategory like  '%breath%'" ) or die(mysqli_error($con));
            while($row = mysqli_fetch_array($resbreath2))
            {
        ?>
                        <tr>
                     <td>
                         <?php // echo $row["description"]; ?>
						 
                        </td>
						
						 <td>
						 <?php // echo $row["item"]; ?>
                         <?php $b2g = $row["item"]; ?>
						 
                        </td>
						
						<td></td>
                        </tr>
					    <?php
                        }
                        ?>	
						
							<?php
	/* Fetch data from databse(select query) */

	       
           $resbreath3 = $con->query("select * from item where description like  '%$description_esc%' and supplier like  '%Mar%' and subcategory like  '%bre%'" ) or die(mysqli_error($con));
            while($row = mysqli_fetch_array($resbreath3))
            {
        ?>
                        <tr>
                     <td>
                         <?php // echo $row["description"]; ?>
						 
                        </td>
						
						 <td>
						 <?php // echo $row["item"]; ?>
                         <?php $b3g = $row["item"]; ?>
						 
                        </td>
						
						<td></td>
                        </tr>
					    <?php
                        }
                        ?>	
						
						
						
							<?php
	/* Fetch data from databse(select query) */

	       
           $resbreath4 = $con->query("select * from item where description like  '%$description_esc%' and supplier like  '%Apr%' and subcategory like  '%bre%'" ) or die(mysqli_error($con));
            while($row = mysqli_fetch_array($resbreath4))
            {
        ?>
                        <tr>
                     <td>
                         <?php // echo $row["description"]; ?>
						 
                        </td>
						
						 <td>
						 <?php // echo $row["item"]; ?>
                         <?php $b4g = $row["item"]; ?>
						 
                        </td>
						
						<td></td>
                        </tr>
					    <?php
                        }
                        ?>	
						
						
						
						
							<?php
	/* Fetch data from databse(select query) */

	       
           $resbreath5 = $con->query("select * from item where description like  '%$description_esc%' and supplier like  '%May%' and subcategory like  '%bre%'" ) or die(mysqli_error($con));
            while($row = mysqli_fetch_array($resbreath5))
            {
        ?>
                        <tr>
                     <td>
                         <?php // echo $row["description"]; ?>
						 
                        </td>
						
						 <td>
						 <?php // echo $row["item"]; ?>
                         <?php $b5g = $row["item"]; ?>
						 
                        </td>
						
						<td></td>
                        </tr>
					    <?php
                        }
                        ?>	
						
						
						
						
						
							<?php
	/* Fetch data from databse(select query) */

	       
           $resbreath6 = $con->query("select * from item where description like  '%$description_esc%' and supplier like  '%Jun%' and subcategory like  '%bre%'" ) or die(mysqli_error($con));
            while($row = mysqli_fetch_array($resbreath6))
            {
        ?>
                        <tr>
                     <td>
                         <?php // echo $row["description"]; ?>
						 
                        </td>
						
						 <td>
						 <?php // echo $row["item"]; ?>
                         <?php $b6g = $row["item"]; ?>
						 
                        </td>
						
						<td></td>
                        </tr>
					    <?php
                        }
                        ?>	
						
						
						
						
							<?php
	/* Fetch data from databse(select query) */

	       
           $resbreath7 = $con->query("select * from item where description like  '%$description_esc%' and supplier like  '%Jul%' and subcategory like  '%bre%'" ) or die(mysqli_error($con));
            while($row = mysqli_fetch_array($resbreath7))
            {
        ?>
                        <tr>
                     <td>
                         <?php // echo $row["description"]; ?>
						 
                        </td>
						
						 <td>
						 <?php // echo $row["item"]; ?>
                         <?php $b7g = $row["item"]; ?>
						 
                        </td>
						
						<td></td>
                        </tr>
					    <?php
                        }
                        ?>	
						
						
						
						
							<?php
	/* Fetch data from databse(select query) */

	       
           $resbreath8 = $con->query("select * from item where description like  '%$description_esc%' and supplier like  '%Aug%' and subcategory like  '%bre%'" ) or die(mysqli_error($con));
            while($row = mysqli_fetch_array($resbreath8))
            {
        ?>
                        <tr>
                     <td>
                         <?php // echo $row["description"]; ?>
						 
                        </td>
						
						 <td>
						 <?php // echo $row["item"]; ?>
                         <?php $b8g = $row["item"]; ?>
						 
                        </td>
						
						<td></td>
                        </tr>
					    <?php
                        }
                        ?>	
						
						
						
							<?php
	/* Fetch data from databse(select query) */

	       
           $resbreath9 = $con->query("select * from item where description like  '%$description_esc%' and supplier like  '%Sep%' and subcategory like  '%bre%'" ) or die(mysqli_error($con));
            while($row = mysqli_fetch_array($resbreath9))
            {
        ?>
                        <tr>
                     <td>
                         <?php // echo $row["description"]; ?>
						 
                        </td>
						
						 <td>
						 <?php // echo $row["item"]; ?>
                         <?php $b9g = $row["item"]; ?>
						 
                        </td>
						
						<td></td>
                        </tr>
					    <?php
                        }
                        ?>	
						
						
						
						
							<?php
	/* Fetch data from databse(select query) */

	       
           $resbreath10 = $con->query("select * from item where description like  '%$description_esc%' and supplier like  '%Oct%' and subcategory like  '%bre%'" ) or die(mysqli_error($con));
            while($row = mysqli_fetch_array($resbreath10))
            {
        ?>
                        <tr>
                     <td>
                         <?php // echo $row["description"]; ?>
						 
                        </td>
						
						 <td>
						 <?php // echo $row["item"]; ?>
                         <?php $b10g = $row["item"]; ?>
						 
                        </td>
						
						<td></td>
                        </tr>
					    <?php
                        }
                        ?>	
						
						
						
						
							<?php
	/* Fetch data from databse(select query) */

	       
           $resbreath11 = $con->query("select * from item where description like  '%$description_esc%' and supplier like  '%Nov%' and subcategory like  '%bre%'" ) or die(mysqli_error($con));
            while($row = mysqli_fetch_array($resbreath11))
            {
        ?>
                        <tr>
                     <td>
                         <?php // echo $row["description"]; ?>
						 
                        </td>
						
						 <td>
						 <?php // echo $row["item"]; ?>
                         <?php $b11g = $row["item"]; ?>
						 
                        </td>
						
						<td></td>
                        </tr>
					    <?php
                        }
                        ?>	
						
						
						
							<?php
	/* Fetch data from databse(select query) */

	       
           $resbreath12 = $con->query("select * from item where description like  '%$description_esc%' and supplier like  '%Dec%' and subcategory like  '%bre%'" ) or die(mysqli_error($con));
            while($row = mysqli_fetch_array($resbreath1))
            {
        ?>
                        <tr>
                     <td>
                         <?php // echo $row["description"]; ?>
						 
                        </td>
						
						 <td>
						 <?php // echo $row["item"]; ?>
                         <?php $b12g = $row["item"]; ?>
						 
                        </td>
						
						<td></td>
                        </tr>
					    <?php
                        }
                        ?>	




			<?php
	/* Fetch data from databse(select query) */

	       
           $restemp1 = $con->query("select * from item where description like  '%$description_esc%' and supplier like  '%Jan%' and subcategory like  '%tem%'" ) or die(mysqli_error($con));
            while($row = mysqli_fetch_array($restemp1))
            {
        ?>
                        <tr>
                     <td>
                         <?php // echo $row["description"]; ?>
						 
                        </td>
						
						 <td>
						 <?php // echo $row["item"]; ?>
                         <?php $t1g = $row["item"]; ?>
						 
                        </td>
						
						<td></td>
                        </tr>
					    <?php
                        }
                        ?>	



	<?php
	/* Fetch data from databse(select query) */

	       
           $restemp2 = $con->query("select * from item where description like  '%$description_esc%' and supplier like  '%Feb%' and subcategory like  '%tem%'" ) or die(mysqli_error($con));
            while($row = mysqli_fetch_array($restemp2))
            {
        ?>
                        <tr>
                     <td>
                         <?php // echo $row["description"]; ?>
						 
                        </td>
						
						 <td>
						 <?php // echo $row["item"]; ?>
                         <?php $t2g = $row["item"]; ?>
						 
                        </td>
						
						<td></td>
                        </tr>
					    <?php
                        }
                        ?>	



	<?php
	/* Fetch data from databse(select query) */

	       
           $restemp3 = $con->query("select * from item where description like  '%$description_esc%' and supplier like  '%Mar%' and subcategory like  '%tem%'" ) or die(mysqli_error($con));
            while($row = mysqli_fetch_array($restemp3))
            {
        ?>
                        <tr>
                     <td>
                         <?php // echo $row["description"]; ?>
						 
                        </td>
						
						 <td>
						 <?php // echo $row["item"]; ?>
                         <?php $t3g = $row["item"]; ?>
						 
                        </td>
						
						<td></td>
                        </tr>
					    <?php
                        }
                        ?>	


<?php
	/* Fetch data from databse(select query) */

	       
           $restemp4 = $con->query("select * from item where description like  '%$description_esc%' and supplier like  '%Apr%' and subcategory like  '%tem%'" ) or die(mysqli_error($con));
            while($row = mysqli_fetch_array($restemp4))
            {
        ?>
                        <tr>
                     <td>
                         <?php // echo $row["description"]; ?>
						 
                        </td>
						
						 <td>
						 <?php // echo $row["item"]; ?>
                         <?php $t4g = $row["item"]; ?>
						 
                        </td>
						
						<td></td>
                        </tr>
					    <?php
                        }
                        ?>	


<?php
	/* Fetch data from databse(select query) */

	       
           $restemp5 = $con->query("select * from item where description like  '%$description_esc%' and supplier like  '%May%' and subcategory like  '%tem%'" ) or die(mysqli_error($con));
            while($row = mysqli_fetch_array($restemp5))
            {
        ?>
                        <tr>
                     <td>
                         <?php // echo $row["description"]; ?>
						 
                        </td>
						
						 <td>
						 <?php // echo $row["item"]; ?>
                         <?php $t5g = $row["item"]; ?>
						 
                        </td>
						
						<td></td>
                        </tr>
					    <?php
                        }
                        ?>	


<?php
	/* Fetch data from databse(select query) */

	       
           $restemp6 = $con->query("select * from item where description like  '%$description_esc%' and supplier like  '%Jun%' and subcategory like  '%tem%'" ) or die(mysqli_error($con));
            while($row = mysqli_fetch_array($restemp6))
            {
        ?>
                        <tr>
                     <td>
                         <?php // echo $row["description"]; ?>
						 
                        </td>
						
						 <td>
						 <?php // echo $row["item"]; ?>
                         <?php $t6g = $row["item"]; ?>
						 
                        </td>
						
						<td></td>
                        </tr>
					    <?php
                        }
                        ?>	


<?php
	/* Fetch data from databse(select query) */

	       
           $restemp7 = $con->query("select * from item where description like  '%$description_esc%' and supplier like  '%Jul%' and subcategory like  '%tem%'" ) or die(mysqli_error($con));
            while($row = mysqli_fetch_array($restemp7))
            {
        ?>
                        <tr>
                     <td>
                         <?php // echo $row["description"]; ?>
						 
                        </td>
						
						 <td>
						 <?php // echo $row["item"]; ?>
                         <?php $t7g = $row["item"]; ?>
						 
                        </td>
						
						<td></td>
                        </tr>
					    <?php
                        }
                        ?>	


<?php
	/* Fetch data from databse(select query) */

	       
           $restemp8 = $con->query("select * from item where description like  '%$description_esc%' and supplier like  '%Aug%' and subcategory like  '%tem%'" ) or die(mysqli_error($con));
            while($row = mysqli_fetch_array($restemp8))
            {
        ?>
                        <tr>
                     <td>
                         <?php // echo $row["description"]; ?>
						 
                        </td>
						
						 <td>
						 <?php // echo $row["item"]; ?>
                         <?php $t8g = $row["item"]; ?>
						 
                        </td>
						
						<td></td>
                        </tr>
					    <?php
                        }
                        ?>	


<?php
	/* Fetch data from databse(select query) */

	       
           $restemp9 = $con->query("select * from item where description like  '%$description_esc%' and supplier like  '%Sep%' and subcategory like  '%tem%'" ) or die(mysqli_error($con));
            while($row = mysqli_fetch_array($restemp9))
            {
        ?>
                        <tr>
                     <td>
                         <?php // echo $row["description"]; ?>
						 
                        </td>
						
						 <td>
						 <?php // echo $row["item"]; ?>
                         <?php $t9g = $row["item"]; ?>
						 
                        </td>
						
						<td></td>
                        </tr>
					    <?php
                        }
                        ?>	



<?php
	/* Fetch data from databse(select query) */

	       
           $restemp10 = $con->query("select * from item where description like  '%$description_esc%' and supplier like  '%Oct%' and subcategory like  '%tem%'" ) or die(mysqli_error($con));
            while($row = mysqli_fetch_array($restemp10))
            {
        ?>
                        <tr>
                     <td>
                         <?php // echo $row["description"]; ?>
						 
                        </td>
						
						 <td>
						 <?php // echo $row["item"]; ?>
                         <?php $t10g = $row["item"]; ?>
						 
                        </td>
						
						<td></td>
                        </tr>
					    <?php
                        }
                        ?>	


<?php
	/* Fetch data from databse(select query) */

	       
           $restemp11 = $con->query("select * from item where description like  '%$description_esc%' and supplier like  '%Nov%' and subcategory like  '%tem%'" ) or die(mysqli_error($con));
            while($row = mysqli_fetch_array($restemp11))
            {
        ?>
                        <tr>
                     <td>
                         <?php // echo $row["description"]; ?>
						 
                        </td>
						
						 <td>
						 <?php // echo $row["item"]; ?>
                         <?php $t11g = $row["item"]; ?>
						 
                        </td>
						
						<td></td>
                        </tr>
					    <?php
                        }
                        ?>	


<?php
	/* Fetch data from databse(select query) */

	       
           $restemp12 = $con->query("select * from item where description like  '%$description_esc%' and supplier like  '%Dec%' and subcategory like  '%tem%'" ) or die(mysqli_error($con));
            while($row = mysqli_fetch_array($restemp12))
            {
        ?>
                        <tr>
                     <td>
                         <?php // echo $row["description"]; ?>
						 
                        </td>
						
						 <td>
						 <?php // echo $row["item"]; ?>
                         <?php $t12g = $row["item"]; ?>
						 
                        </td>
						
						<td></td>
                        </tr>
					    <?php
                        }
                        ?>	
						
						
						
			  
            </div>
          </div>
		  
		  
		  <!--
		  
          <div class="col-md-4">
            <div class="card card-user">
              <div class="image">
                <img src="../assets/img/bg5.jpg" alt="...">
              </div>
              <div class="card-body">
                <div class="author">
                  <a href="#">
                    <img class="avatar border-gray" src="../assets/img/mike.jpg" alt="...">
                    <h5 class="title">Mike Andrew</h5>
                  </a>
                  <p class="description">
                    michael24
                  </p>
                </div>
                <p class="description text-center">
                  "Lamborghini Mercy <br>
                  Your chick she so thirsty <br>
                  I'm in that two seat Lambo"
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
		  
		  -->
		  
				
				
				
				
				
				
				
				
				
				
				
				
				
				
  
  
  
				
				
				
				
				
				
				
			
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				

              </div>
            </div>
          </div>
                </div>
              </div>
            </div>
          </div>
        </div>
		
			
				
			
		
		
		
      </div>
  <?php include 'HTMLparts/footer.html';?>
  
  
  
  
  
  
  
  
  
  
  
  
  
  
    </div>
  </div>
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  <script>
  
  var va1g  = '<?php echo $v1g;?>';
  var va2g  = '<?php echo $v2g;?>';
  var va3g  = '<?php echo $v3g;?>';
  var va4g  = '<?php echo $v4g;?>';
  var va5g  = '<?php echo $v5g;?>';
  var va6g  = '<?php echo $v6g;?>';
  var va7g  = '<?php echo $v7g;?>';
  var va8g  = '<?php echo $v8g;?>';
  var va9g  = '<?php echo $v9g;?>';
  var va10g  = '<?php echo $v10g;?>';
  var va11g  = '<?php echo $v11g;?>';
  var va12g  = '<?php echo $v12g;?>';
  
  
  var vh1g = '<?php echo $h1g;?>';
  var vh2g = '<?php echo $h2g;?>';
  var vh3g = '<?php echo $h3g;?>';
  var vh4g = '<?php echo $h4g;?>';
  var vh5g = '<?php echo $h5g;?>';
  var vh6g = '<?php echo $h6g;?>';
  var vh7g = '<?php echo $h7g;?>';
  var vh8g = '<?php echo $h8g;?>';
  var vh9g = '<?php echo $h9g;?>';
  var vh10g = '<?php echo $h10g;?>';
  var vh11g = '<?php echo $h11g;?>';
  var vh12g = '<?php echo $h12g;?>';
  
  
  
  var vb1g = '<?php echo $b1g;?>';
  var vb2g = '<?php echo $b2g;?>';
  var vb3g = '<?php echo $b3g;?>';
  var vb4g = '<?php echo $b4g;?>';
  var vb5g = '<?php echo $b5g;?>';
  var vb6g = '<?php echo $b6g;?>';
  var vb7g = '<?php echo $b7g;?>';
  var vb8g = '<?php echo $b8g;?>';
  var vb9g = '<?php echo $b9g;?>';
  var vb10g = '<?php echo $b10g;?>';
  var vb11g = '<?php echo $b11g;?>';
  var vb12g = '<?php echo $b12g;?>';
  
  
  var vt1g = '<?php echo $t1g;?>';
  var vt2g = '<?php echo $t2g;?>';
  var vt3g = '<?php echo $t3g;?>';
  var vt4g = '<?php echo $t4g;?>';
  var vt5g = '<?php echo $t5g;?>';
  var vt6g = '<?php echo $t6g;?>';
  var vt7g = '<?php echo $t7g;?>';
  var vt8g = '<?php echo $t8g;?>';
  var vt9g = '<?php echo $t9g;?>';
  var vt10g = '<?php echo $t10g;?>';
  var vt11g = '<?php echo $t11g;?>';
  var vt12g = '<?php echo $t12g;?>';
  

  
  demo = {
	  
	  
	  
	  
  initPickColor: function() {
    $('.pick-class-label').click(function() {
      var new_class = $(this).attr('new-class');
      var old_class = $('#display-buttons').attr('data-class');
      var display_div = $('#display-buttons');
      if (display_div.length) {
        var display_buttons = display_div.find('.btn');
        display_buttons.removeClass(old_class);
        display_buttons.addClass(new_class);
        display_div.attr('data-class', new_class);
      }
    });
  },

  initDocChart: function() {
    chartColor = "#FFFFFF";

    // General configuration for the charts with Line gradientStroke
    gradientChartOptionsConfiguration = {
      maintainAspectRatio: false,
      legend: {
        display: false
      },
      tooltips: {
        bodySpacing: 4,
        mode: "nearest",
        intersect: 0,
        position: "nearest",
        xPadding: 10,
        yPadding: 10,
        caretPadding: 10
      },
      responsive: true,
      scales: {
        yAxes: [{
          display: 0,
          gridLines: 0,
          ticks: {
            display: false
          },
          gridLines: {
            zeroLineColor: "transparent",
            drawTicks: false,
            display: false,
            drawBorder: false
          }
        }],
        xAxes: [{
          display: 0,
          gridLines: 0,
          ticks: {
            display: false
          },
          gridLines: {
            zeroLineColor: "transparent",
            drawTicks: false,
            display: false,
            drawBorder: false
          }
        }]
      },
      layout: {
        padding: {
          left: 0,
          right: 0,
          top: 15,
          bottom: 15
        }
      }
    };

    ctx = document.getElementById('lineChartExample').getContext("2d");

    gradientStroke = ctx.createLinearGradient(500, 0, 100, 0);
    gradientStroke.addColorStop(0, '#80b6f4');
    gradientStroke.addColorStop(1, chartColor);

    gradientFill = ctx.createLinearGradient(0, 170, 0, 50);
    gradientFill.addColorStop(0, "rgba(128, 182, 244, 0)");
    gradientFill.addColorStop(1, "rgba(249, 99, 59, 0.40)");

    myChart = new Chart(ctx, {
      type: 'line',
      responsive: true,
      data: {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "BPM",
          borderColor: "#f96332",
          pointBorderColor: "#FFF",
          pointBackgroundColor: "#f96332",
          pointBorderWidth: 2,
          pointHoverRadius: 4,
          pointHoverBorderWidth: 1,
          pointRadius: 4,
          fill: true,
          backgroundColor: gradientFill,
          borderWidth: 2,
          data: [vh1g, vh2g, vh3g, vh4g, vh5g, vh6g, vh7g, vh8g, vh9g, vh10g, vh11g, vh12g]
        }]
      },
      options: gradientChartOptionsConfiguration
    });
  },

  initDashboardPageCharts: function() {

    chartColor = "#FFFFFF";

    // General configuration for the charts with Line gradientStroke
    gradientChartOptionsConfiguration = {
      maintainAspectRatio: false,
      legend: {
        display: false
      },
      tooltips: {
        bodySpacing: 4,
        mode: "nearest",
        intersect: 0,
        position: "nearest",
        xPadding: 10,
        yPadding: 10,
        caretPadding: 10
      },
      responsive: 1,
      scales: {
        yAxes: [{
          display: 0,
          gridLines: 0,
          ticks: {
            display: false
          },
          gridLines: {
            zeroLineColor: "transparent",
            drawTicks: false,
            display: false,
            drawBorder: false
          }
        }],
        xAxes: [{
          display: 0,
          gridLines: 0,
          ticks: {
            display: false
          },
          gridLines: {
            zeroLineColor: "transparent",
            drawTicks: false,
            display: false,
            drawBorder: false
          }
        }]
      },
      layout: {
        padding: {
          left: 0,
          right: 0,
          top: 15,
          bottom: 15
        }
      }
    };

    gradientChartOptionsConfigurationWithNumbersAndGrid = {
      maintainAspectRatio: false,
      legend: {
        display: false
      },
      tooltips: {
        bodySpacing: 4,
        mode: "nearest",
        intersect: 0,
        position: "nearest",
        xPadding: 10,
        yPadding: 10,
        caretPadding: 10
      },
      responsive: true,
      scales: {
        yAxes: [{
          gridLines: 0,
          gridLines: {
            zeroLineColor: "transparent",
            drawBorder: false
          }
        }],
        xAxes: [{
          display: 0,
          gridLines: 0,
          ticks: {
            display: false
          },
          gridLines: {
            zeroLineColor: "transparent",
            drawTicks: false,
            display: false,
            drawBorder: false
          }
        }]
      },
      layout: {
        padding: {
          left: 0,
          right: 0,
          top: 15,
          bottom: 15
        }
      }
    };

    var ctx = document.getElementById('bigDashboardChart').getContext("2d");

    var gradientStroke = ctx.createLinearGradient(500, 0, 100, 0);
    gradientStroke.addColorStop(0, '#80b6f4');
    gradientStroke.addColorStop(1, chartColor);

    var gradientFill = ctx.createLinearGradient(0, 200, 0, 50);
    gradientFill.addColorStop(0, "rgba(128, 182, 244, 0)");
    gradientFill.addColorStop(1, "rgba(255, 255, 255, 0.24)");

    var myChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: ["JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AUG", "SEP", "OCT", "NOV", "DEC"],
        datasets: [{
          label: "Data",
          borderColor: chartColor,
          pointBorderColor: chartColor,
          pointBackgroundColor: "#1e3d60",
          pointHoverBackgroundColor: "#1e3d60",
          pointHoverBorderColor: chartColor,
          pointBorderWidth: 1,
          pointHoverRadius: 7,
          pointHoverBorderWidth: 2,
          pointRadius: 5,
          fill: true,
          backgroundColor: gradientFill,
          borderWidth: 2,
          data: [va1g, va2g, va3g, va4g, va5g, va6g, va7g, va8g, va9g, va10g, va11g, va12g]
        }]
      },
      options: {
        layout: {
          padding: {
            left: 20,
            right: 20,
            top: 0,
            bottom: 0
          }
        },
        maintainAspectRatio: false,
        tooltips: {
          backgroundColor: '#fff',
          titleFontColor: '#333',
          bodyFontColor: '#666',
          bodySpacing: 4,
          xPadding: 12,
          mode: "nearest",
          intersect: 0,
          position: "nearest"
        },
        legend: {
          position: "bottom",
          fillStyle: "#FFF",
          display: false
        },
        scales: {
          yAxes: [{
            ticks: {
              fontColor: "rgba(255,255,255,0.4)",
              fontStyle: "bold",
              beginAtZero: true,
              maxTicksLimit: 5,
              padding: 10
            },
            gridLines: {
              drawTicks: true,
              drawBorder: false,
              display: true,
              color: "rgba(255,255,255,0.1)",
              zeroLineColor: "transparent"
            }

          }],
          xAxes: [{
            gridLines: {
              zeroLineColor: "transparent",
              display: false,

            },
            ticks: {
              padding: 10,
              fontColor: "rgba(255,255,255,0.4)",
              fontStyle: "bold"
            }
          }]
        }
      }
    });

    var cardStatsMiniLineColor = "#fff",
      cardStatsMiniDotColor = "#fff";

    ctx = document.getElementById('lineChartExample').getContext("2d");

    gradientStroke = ctx.createLinearGradient(500, 0, 100, 0);
    gradientStroke.addColorStop(0, '#80b6f4');
    gradientStroke.addColorStop(1, chartColor);

    gradientFill = ctx.createLinearGradient(0, 170, 0, 50);
    gradientFill.addColorStop(0, "rgba(128, 182, 244, 0)");
    gradientFill.addColorStop(1, "rgba(249, 99, 59, 0.40)");

    myChart = new Chart(ctx, {
      type: 'line',
      responsive: true,
      data: {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "BPM",
          borderColor: "#f96332",
          pointBorderColor: "#FFF",
          pointBackgroundColor: "#f96332",
          pointBorderWidth: 2,
          pointHoverRadius: 4,
          pointHoverBorderWidth: 1,
          pointRadius: 4,
          fill: true,
          backgroundColor: gradientFill,
          borderWidth: 2,
          data: [vh1g, vh2g, vh3g, vh4g, vh5g, vh6g, vh7g, vh8g, vh9g, vh10g, vh11g, vh11g]
        }]
      },
      options: gradientChartOptionsConfiguration
    });


    ctx = document.getElementById('lineChartExampleWithNumbersAndGrid').getContext("2d");

    gradientStroke = ctx.createLinearGradient(500, 0, 100, 0);
    gradientStroke.addColorStop(0, '#18ce0f');
    gradientStroke.addColorStop(1, chartColor);

    gradientFill = ctx.createLinearGradient(0, 170, 0, 50);
    gradientFill.addColorStop(0, "rgba(128, 182, 244, 0)");
    gradientFill.addColorStop(1, hexToRGB('#18ce0f', 0.4));

    myChart = new Chart(ctx, {
      type: 'line',
      responsive: true,
      data: {
        labels: ["Jannuary", "February", "March", "April", "May", "June", "July", "August", "Spetember", "Octuber", "November", "December"],
        datasets: [{
          label: "Breathing Rate",
          borderColor: "#18ce0f",
          pointBorderColor: "#FFF",
          pointBackgroundColor: "#18ce0f",
          pointBorderWidth: 2,
          pointHoverRadius: 4,
          pointHoverBorderWidth: 1,
          pointRadius: 4,
          fill: true,
          backgroundColor: gradientFill,
          borderWidth: 2,
          data: [vb1g, vb2g, vb3g, vb4g, vb5g, vb6g, vb7g, vb8g, vb9g, vb10g, vb11g, vb12g]
        }]
      },
      options: gradientChartOptionsConfigurationWithNumbersAndGrid
    });

    var e = document.getElementById("barChartSimpleGradientsNumbers").getContext("2d");

    gradientFill = ctx.createLinearGradient(0, 170, 0, 50);
    gradientFill.addColorStop(0, "rgba(128, 182, 244, 0)");
    gradientFill.addColorStop(1, hexToRGB('#2CA8FF', 0.6));

    var a = {
      type: "bar",
      data: {
        labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
        datasets: [{
          label: "Temperature",
          backgroundColor: gradientFill,
          borderColor: "#2CA8FF",
          pointBorderColor: "#FFF",
          pointBackgroundColor: "#2CA8FF",
          pointBorderWidth: 2,
          pointHoverRadius: 4,
          pointHoverBorderWidth: 1,
          pointRadius: 4,
          fill: true,
          borderWidth: 1,
          data: [vt1g, vt2g, vt3g, vt4g, vt5g, vt6g, vt7g, vt8g, vt9g, vt10g, vt11g, vt12g]
        }]
      },
      options: {
        maintainAspectRatio: false,
        legend: {
          display: false
        },
        tooltips: {
          bodySpacing: 4,
          mode: "nearest",
          intersect: 0,
          position: "nearest",
          xPadding: 10,
          yPadding: 10,
          caretPadding: 10
        },
        responsive: 1,
        scales: {
          yAxes: [{
            gridLines: 0,
            gridLines: {
              zeroLineColor: "transparent",
              drawBorder: false
            }
          }],
          xAxes: [{
            display: 0,
            gridLines: 0,
            ticks: {
              display: false
            },
            gridLines: {
              zeroLineColor: "transparent",
              drawTicks: false,
              display: false,
              drawBorder: false
            }
          }]
        },
        layout: {
          padding: {
            left: 0,
            right: 0,
            top: 15,
            bottom: 15
          }
        }
      }
    };

    var viewsChart = new Chart(e, a);
  },

  initGoogleMaps: function() {
    var myLatlng = new google.maps.LatLng(40.748817, -73.985428);
    var mapOptions = {
      zoom: 13,
      center: myLatlng,
      scrollwheel: false, //we disable de scroll over the map, it is a really annoing when you scroll through page
      styles: [{
        "featureType": "water",
        "elementType": "geometry",
        "stylers": [{
          "color": "#e9e9e9"
        }, {
          "lightness": 17
        }]
      }, {
        "featureType": "landscape",
        "elementType": "geometry",
        "stylers": [{
          "color": "#f5f5f5"
        }, {
          "lightness": 20
        }]
      }, {
        "featureType": "road.highway",
        "elementType": "geometry.fill",
        "stylers": [{
          "color": "#ffffff"
        }, {
          "lightness": 17
        }]
      }, {
        "featureType": "road.highway",
        "elementType": "geometry.stroke",
        "stylers": [{
          "color": "#ffffff"
        }, {
          "lightness": 29
        }, {
          "weight": 0.2
        }]
      }, {
        "featureType": "road.arterial",
        "elementType": "geometry",
        "stylers": [{
          "color": "#ffffff"
        }, {
          "lightness": 18
        }]
      }, {
        "featureType": "road.local",
        "elementType": "geometry",
        "stylers": [{
          "color": "#ffffff"
        }, {
          "lightness": 16
        }]
      }, {
        "featureType": "poi",
        "elementType": "geometry",
        "stylers": [{
          "color": "#f5f5f5"
        }, {
          "lightness": 21
        }]
      }, {
        "featureType": "poi.park",
        "elementType": "geometry",
        "stylers": [{
          "color": "#dedede"
        }, {
          "lightness": 21
        }]
      }, {
        "elementType": "labels.text.stroke",
        "stylers": [{
          "visibility": "on"
        }, {
          "color": "#ffffff"
        }, {
          "lightness": 16
        }]
      }, {
        "elementType": "labels.text.fill",
        "stylers": [{
          "saturation": 36
        }, {
          "color": "#333333"
        }, {
          "lightness": 40
        }]
      }, {
        "elementType": "labels.icon",
        "stylers": [{
          "visibility": "off"
        }]
      }, {
        "featureType": "transit",
        "elementType": "geometry",
        "stylers": [{
          "color": "#f2f2f2"
        }, {
          "lightness": 19
        }]
      }, {
        "featureType": "administrative",
        "elementType": "geometry.fill",
        "stylers": [{
          "color": "#fefefe"
        }, {
          "lightness": 20
        }]
      }, {
        "featureType": "administrative",
        "elementType": "geometry.stroke",
        "stylers": [{
          "color": "#fefefe"
        }, {
          "lightness": 17
        }, {
          "weight": 1.2
        }]
      }]
    };

    var map = new google.maps.Map(document.getElementById("map"), mapOptions);

    var marker = new google.maps.Marker({
      position: myLatlng,
      title: "Hello World!"
    });

    // To add the marker to the map, call setMap();
    marker.setMap(map);
  }
};
  
   </script>
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  <!--   Core JS Files   -->
  <script src="assets/js/core/jquery.min.js"></script>
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <!-- <script src="../assets/demo/demo5.js"></script> -->
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();

    });
  </script>
  
    <script src="assets/js/core/jquery.min.js"></script>
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <!-- <script src="../assets/demo/demo5.js"></script> -->
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();

    });
  </script>

</body>

</html>
