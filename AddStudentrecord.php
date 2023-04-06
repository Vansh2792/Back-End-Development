<html>

	<head><title>School Management System</title>

	<meta charset="UTF-8">
    <title>Add Class</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
    }

    .navbar {
      overflow: hidden;
      background-color: #000000;
    }

    .navbar a {
      float: left;
      font-size: 20px;
      color: rgb(255, 255, 255);
      text-align: center;
      padding: 20px 20px;
      text-decoration: none;
    }

    .dropdown {
      float: left;
      overflow: hidden;
    }

    .dropdown .dropbtn {
      font-size: 20px;
      border: none;
      outline: none;
      color: rgb(255, 255, 255);
      padding: 20px 20px;
      background-color: inherit;
      font-family: inherit;
      margin: 0;
    }

    .navbar a:hover, .dropdown:hover .dropbtn {
      background-color: rgb(255, 132, 0);
    }

    .dropdown-content {
      display: none;
      position: absolute;
      background-color: rgb(255, 132, 0);
      min-width: 200px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      z-index: 1;
    }

    .dropdown-content a {
      float: none;
      color: rgb(255, 255, 255);
      padding: 12px 16px;
      text-decoration: none;
      display: block;
      text-align: left;
    }

    .dropdown-content a:hover {
      background-color: #000000;
    }

    .dropdown:hover .dropdown-content {
      display: block;
    }
    </style>
    
    
    <style>
    
      form {
        background-color: #ffffff;
        padding: 20px;
        border-radius: 5px;
        width: 400px;
        margin: auto;
      }
      label {
        display: block;
        margin-bottom: 10px;
        font-weight: bold;
      }
      input[type=text], input[type=password], select {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        box-sizing: border-box;
        border: 2px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
      }
      input[type=submit] {
        background-color: #54af57;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
      }
      input[type=submit]:hover {
        background-color: #1ec827;
      }
    </style>
  


</head>

	<body bgcolor="grey">



	<div class="navbar">
        <a href="Index.html">Home</a>
        <div class="dropdown">
            <button class="dropbtn">View
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="ViewStudent.php">Student</a>
                <a href="ViewParent.php">Parent</a>
                <a href="ViewTeacher.php">Teacher</a>
                <a href="ViewClass.php">Class</a>
                <a href="ViewStudentrecord.php">Student Record</a>
                <a href="ViewPayRate.php">Pay Rate</a>
                <a href="ViewHospital.php">Hospital</a>
            </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn">Add
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="AddStudent.php">Student</a>
                <a href="AddParent.php">Parent</a>
                <a href="AddTeacher.php">Teacher</a>
                <a href="AddClass.php">Class</a>
                <a href="AddStudentrecord.php">Student Record</a>
                <a href="AddPayRate.php">Pay Rate</a>
                <a href="AddHospital.php">Hospital</a>
            </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn">Delete
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="DeleteStudent.php">Student</a>
                <a href="DeleteParent.php">Parent</a>
                <a href="DeleteTeacher.php">Teacher</a>
                <a href="DeleteClass.php">Class</a>
                <a href="DeleteStudentrecord.php">Student Record</a>
                <a href="DeletePayRate.php">Pay Rate</a>
                <a href="DeleteHospital.php">Hospital</a>
            </div>
        </div>
        <a href="Contact.html">Contact Us</a>
    </div>
    
     
    
   
    <style>
.container {
  position: relative;
  text-align: center;
  color: white;
}

.bottom-left {
  position: absolute;
  bottom: 8px;
  left: 16px;
}

.top-left {
  position: absolute;
  top: 8px;
  left: 16px;
}

.top-right {
  position: absolute;
  top: 8px;
  right: 16px;
}

.bottom-right {
  position: absolute;
  bottom: 8px;
  right: 16px;
}

.centered {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}
</style>

		
		
		<?php

$link = mysqli_connect("localhost", "root", "", "vansh");
// Check connection
if ($link === false) {
	die("Connection failed: " . mysqli_connect_error());
}
?>

<h3>Add Student Record</h3>

<form method="post" action="AddStudentrecord.php">

  <label>Select Parent</label>
  <select name="Pid">
    <?php
      $sql = mysqli_query($link, "SELECT ParentId, FatherFirstName FROM parents");
      while ($row = $sql->fetch_assoc()){
        echo "<option value='{$row['ParentId']}'>{$row['FatherFirstName']}</option>";
      }
    ?>
  </select>

  <label>Select Pupil </label>
	<select name="pname">
		<?php
		$sql = mysqli_query($link, "SELECT PupilID, FirstName FROM pupils");
		while ($row = $sql->fetch_assoc()){
			echo "<option value='{$row['PupilID']}'>{$row['FirstName']}</option>";
		}
		?>
	</select>

   
      <label>Absence</label>
      <input type="text" id="abs" name="abs">
      
      <label>Course Duration</label>
      <input type="text" id="cdur" name="cdur">
          
           
  <input type="submit" name="submit">

</form>

<?php
if (isset($_POST['submit'])) {
  $Pid = $_POST['Pid'];
  $pname = $_POST['pname'];
  $abs = $_POST['abs'];
  $cdur = $_POST['cdur'];
  
  $sql = "INSERT INTO `records`(`ParentId`, `PupilId`, `Absence`, `Duration`) 
  VALUES ('$Pid','$pname','$abs','$cdur')";
  
  if (mysqli_query($link, $sql)) {
      echo "New record created successfully";
  } else {
      echo "Error adding record: " . mysqli_error($link);
  }
}
$link->close();
?>

	
	</body>

</html>