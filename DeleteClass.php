<?php
$link = mysqli_connect("localhost", "root", "", "vansh");
// Check connection
if ($link === false) {
    die("Connection failed: ");
}

// Fetch all pupils from database
$sql = mysqli_query($link, "SELECT `ClassId`, `TeacherId`, `Capacity`, `ClassName` FROM `Classes`");

?>

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
        padding: 20px;
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
    <style>

table {
  border-collapse: collapse;
  width: 150%;
}

th, td {
  text-align: left;
  padding: 8px;
}

th {
  background-color: #fc8803;
  color: #fff;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}

input[type='checkbox'] {
  transform: scale(1.5);
}
</style>

    
    </head>
  <body bgcolor="white">
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
      
    <h3>Delete Class Records</h3>

    <form method="post">
      <table>
        <tr>
          <th width="150px">Class ID</th>
          <th width="250px">Teacher Id</th>
          <th width="250px">Capacity</th>
          <th width="250px">Class Name</th>
          <th width="250px">Delete</th>
        </tr>

        <?php
        // Display all pupils and their corresponding delete buttons
        while ($row = $sql->fetch_assoc()){
          echo "
          <tr>
            <td>{$row['ClassId']}</td>
            <td>{$row['TeacherId']}</td>
            <td>{$row['Capacity']}</td>
            <td>{$row['ClassName']}</td>
            <td><input type='checkbox' name='class_ids[]' value='{$row['ClassId']}'></td>
          </tr>";
        }
        ?>

        <tr>
          <td colspan="8"><input type="submit" name="delete" value="Delete Selected Class"></td>
        </tr>
      </table>
    </form>
    <?php
    // Check if form has been submitted
if(isset($_POST['delete'])) {
    // Get the IDs of pupils to be deleted
    $class_ids = $_POST['class_ids'];
  
    // Convert array of IDs to comma-separated string
    $class_ids_str = implode(",", $class_ids);
  
    // Delete pupils from database
    $sql = "DELETE FROM Classes WHERE ClassId IN ($class_ids_str)";
    if(mysqli_query($link, $sql)) {
      echo "Class records deleted successfully.";
    } else {
      echo "Error deleting Class records: " . mysqli_error($link);
    }
  }
?>  

  </body>
</html>
