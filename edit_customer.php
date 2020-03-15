<?php include("db_config.php");

$sql = "UPDATE customer SET first_name='".$_POST['update_first_name']."', last_name='".$_POST['update_last_name']."', town_name='".$_POST['update_town_name']."', gender_id='".$_POST['update_gender_id']."' WHERE id='".$_POST['update_id']."'";

if ($conn->query($sql) === TRUE) {
      echo ("<script>location.href='index.php'</script>");
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?> 