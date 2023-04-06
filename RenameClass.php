<?php
$link = mysqli_connect("localhost", "root", "", "vansh");

if ($link === false) {
    die("Connection failed: ");
}

if (isset($_POST['submit'])) {
    $class_id = $_POST['class_id'];
    $class_name = $_POST['class_name'];
    $teacher_id = $_POST['teacher_id'];
    $capacity = $_POST['capacity'];

    $query = "UPDATE classes SET class_name='$class_name', teacher_id='$teacher_id', capacity='$capacity' WHERE class_id='$class_id'";
    $result = mysqli_query($link, $query);

    if ($result) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($link);
    }
}

$query = "SELECT * FROM classes";
$result = mysqli_query($link, $query);

?>

<h3>Edit Class Details</h3>

<table>
    <tr>
        <th width="150px">Class Id<br><hr></th>
        <th width="250px">Class Name<br><hr></th>
        <th width="250px">Teacher Id<br><hr></th>
        <th width="250px">Capacity<br><hr></th>
        <th width="250px">Actions<br><hr></th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <input type="hidden" name="class_id" value="<?php echo $row['class_id']; ?>">
                <td><input type="text" name="class_id_input" value="<?php echo $row['class_id']; ?>" readonly></td>
                <td><input type="text" name="class_name" value="<?php echo $row['class_name']; ?>"></td>
                <td><input type="text" name="teacher_id" value="<?php echo $row['teacher_id']; ?>"></td>
                <td><input type="text" name="capacity" value="<?php echo $row['capacity']; ?>"></td>
                <td><input type="submit" name="submit" value="Update"></td>
            </form>
        </tr>
    <?php } ?>
</table>
