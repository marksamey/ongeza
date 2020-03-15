<?php include("db_config.php");

$sql = "INSERT INTO customer (first_name, last_name, town_name, gender_id)
VALUES ('".$_POST['first_name']."', '".$_POST['last_name']."', '".$_POST['town_name']."', '".$_POST['gender_id']."')";

if ($conn->query($sql) === TRUE) {
   echo ("<script>location.href='index.php'</script>");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?> 