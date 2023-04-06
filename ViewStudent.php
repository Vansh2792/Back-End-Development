<html>
	<head>
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
	</head>
  <body>
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
      
<?php


$link = mysqli_connect("localhost", "root", "", "vansh");

if ($link === false) {
    die("Connection failed: ");
}
?>

<h3>See all Pupils</h3>
	
		<table>
		
			<tr>
				<th width="150px">Pupil ID<br><hr></th>
        <th width="150px">Parent ID<br><hr></th>
        <th width="150px">Class Id<br><hr></th>
				<th width="250px">First Name<br><hr></th>
				<th width="250px">Last Name<br><hr></th>
				<th width="250px">Class<br><hr></th>
				<th width="250px">Medical Info<br><hr></th>
                
			</tr>
				
			<?php
				
			$sql = mysqli_query($link, "SELECT PupilID, ParentId, ClassId, FirstName, LastName, Class, MedicalInfo    FROM Pupils");
			while ($row = $sql->fetch_assoc()){
			echo "
			<tr>
				<th>{$row['PupilID']}</th>
        <th>{$row['ParentId']}</th>
				<th>{$row['ClassId']}</th>
        <th>{$row['FirstName']}</th>
				<th>{$row['LastName']}</th>
				<th>{$row['Class']}</th>
				<th>{$row['MedicalInfo']}</th>

			</tr>";
			}
			?>
            </table>
        </body>
        </html>


