<?php include("db_config.php");

$id = $_GET['id'];
// sql to delete a record
$sql = "DELETE FROM customer WHERE id='".$id."'";

if ($conn->query($sql) === TRUE) { ?>
echo ("<script>location.href='index.php'</script>");

<?php   } 

else { ?>

	<div class="alert alert-warning">
  <strong>Error!</strong> Error while deleting 
</div
  <?php  }

$conn->close();
?> 

