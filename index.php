<!DOCTYPE html>
<html lang="en">
<head>
  <title>Ongeza Customers</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>





<body>
<!-- BOOSTRAP TABLE TO SHOW ALL LIST OF THE CLIENTS -->
<div class="container" id="tableCustomer">
  <h2>Customers Details</h2>
  <div style="text-align: right;"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAddCustomer">Add New Customer</button></div><br>

  <input class="form-control" id="myInput" type="text" placeholder="Search..">
  <br>

<?php include("db_config.php");
$sql    = "SELECT c.id, c.first_name, c.last_name, c.town_name, g.gender_name FROM customer c LEFT JOIN gender g ON c.gender_id = g.id";
$result = $conn->query($sql);
?>


  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>First Name</th>
        <th>Last Name</th>
         <th>Town Name</th>
          <th>Gender</th>
           <th style="width: 10%">Action</th>
      </tr>
    </thead>
    <tbody id="myTable">
      <?php
if ($result->num_rows > 0) {
    
    while ($row = $result->fetch_assoc()) {
?>
     <tr>

        <td><?php
        echo $id = $row["id"];
?></td>
        <td><?php
        echo $fname = $row["first_name"];
?></td>
        <td><?php
        echo $lname = $row["last_name"];
?></td>
        <td><?php
        echo $tname = $row["town_name"];
?></td>
        <td><?php
        echo $gname = $row["gender_name"];
?></td>
        <td>
        
        <div onclick="dataCustomer('<?php
        echo $id;
?>', '<?php
        echo $fname;
?>', '<?php
        echo $lname;
?>', '<?php
        echo $tname;
?>', '<?php
        echo $gname;
?>')" class="col-sm-6" href="#" data-toggle="modal" data-target="#modalEditCustomer" > 
          <span class="glyphicon glyphicon-edit"  data-toggle="tooltip" data-placement="top" title="Edit"></span>
        </div>

        <a href="delete_customer.php?id=<?php
        echo $id;
?>" onclick="return confirm('Are you sure you want to delete ' + '<?php
        echo $fname . " " . $lname;
?>' + '?');" class="col-sm-6" data-toggle="tooltip" data-placement="top" title="Delete"> 
          <span style="color: red" class="glyphicon glyphicon-trash">  </span>
        </div>
      </a>

          

        </td>

      </tr>

    <?php
    }
    
    
}
?>
   
    
    </tbody>
  </table>
<!-- END OF BOOSTRAP TABLE THAT SHOW ALL LIST OF THE CLIENTS -->




<!-- MODAL CALLED FOR INSERTING EMPLOYMENT DETAILS -->
<form name="customerForm" action="insert_customer.php" onsubmit="return validateForm()" method="post">
<div class="modal fade" id="modalAddCustomer" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Customer Details</h4>
        </div>
        <div class="modal-body">


    <div class="form-group">
      <label for="first_name">Customer's First Name:</label>
      <input type="text" class="form-control" id="first_name" name="first_name">
    </div>


           <div class="form-group">
    <label for="last_name">Customer's Last name:</label>
    <input type="text" class="form-control" id="last_name" name="last_name">
  </div>


     <div class="form-group">
    <label for="town_name">Customer's Town name:</label>
    <input type="text" class="form-control" id="town_name" name="town_name">  
  </div>


 <div class="form-group">
    <label for="Town_name">Customer's Gender:</label>
  <select required="true" class="form-control" id="gender_id" name="gender_id">
<option></option>
    <?php
$sql_gender    = "SELECT * from gender";
$result_gender = $conn->query($sql_gender);
while ($row_gender = $result_gender->fetch_assoc()) {
    
?>      
        <option value="<?php
    echo $row_gender["id"];
?>"><?php
    echo $row_gender["gender_name"];
?></option>
        <?php
}
?>
 </select>
</div>


<input class="btn btn-primary " type="submit" value="Submit">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
</form>
<!-- END OF MODAL CALLED FOR INSERTING EMPLOYMENT DETAILS -->



<!-- MODAL CALLED FOR UPDATING EMPLOYMENT DETAILS -->
<form name="editCustomerForm" action="edit_customer.php" onsubmit="return validateEditForm()" method="post">
<div class="modal fade" id="modalEditCustomer" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Customer Details</h4>
        </div>
        <div class="modal-body">


    <div class="form-group">
      <label for="first_name">Customer's First Name:</label>
      <input type="text" class="form-control" id="update_first_name" name="update_first_name">
    </div>


  <div class="form-group">
    <label for="last_name">Customer's Last name:</label>
    <input type="text" class="form-control" id="update_last_name" name="update_last_name">
  </div>


    <div class="form-group">
    <label for="town_name">Customer's Town name:</label>
    <input type="text" class="form-control" id="update_town_name" name="update_town_name">  
  </div>



    <input style="display: none" type="text" class="form-control" id="update_id" name="update_id">  


 <div class="form-group">
    <label for="Town_name">Customer's Gender:</label>
  <select class="form-control" id="update_gender_id" name="update_gender_id">

    <?php
$sql_gender    = "SELECT * from gender";
$result_gender = $conn->query($sql_gender);
while ($row_gender = $result_gender->fetch_assoc()) {
    
?>
<!-- retrieving gender details from database -->
  <option id = "<?php echo $row_gender["gender_name"]; ?>" value="<?php echo $row_gender["id"]; ?>"><?php
    echo $row_gender["gender_name"];
?></option>
        <?php
}
?>
 </select>
  

</div>

<input class="btn btn-primary " type="submit" value="Update">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
</form>

<!-- END OF MODAL CALLED FOR UPDATING EMPLOYMENT DETAILS -->


</div>





<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});


$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();  
});



function confirmDeleteCustomer(fname,id) {
 var txt;
  var r = confirm("Are you sure you want to delete " + fname + "?");
 
}



function validateForm(){ 

 var first_name = document.forms["customerForm"]["first_name"].value;
 var last_name = document.forms["customerForm"]["last_name"].value;
var town_name = document.forms["customerForm"]["town_name"].value;


  if (first_name == "") {
    alert("First name must be filled out");
 document.getElementById('first_name').focus();
       return false;
  }

  else if (first_name.length < 3){
      alert("The first name must atleast contain three characters");
       document.getElementById('first_name').focus();
       return false;
      }


  if (last_name == "") {
    alert("Last name must be filled out");
 document.getElementById('last_name').focus();
       return false;
  }


  if (town_name == "") {
    alert("Town name must be filled out");
 document.getElementById('town_name').focus();
       return false;
  }

}


function validateEditForm(){ 

 var first_name = document.forms["editCustomerForm"]["update_first_name"].value;
 var last_name = document.forms["editCustomerForm"]["update_last_name"].value;
var town_name = document.forms["editCustomerForm"]["update_town_name"].value;
  
  

  if (first_name == "") {
    alert("First name must be filled out");
 document.getElementById('update_first_name').focus();
       return false;
  }

  else if (first_name.length < 3){
      alert("The first name must atleast contain three characters");
       document.getElementById('update_first_name').focus();
       return false;
      }


  if (last_name == "") {
    alert("Last name must be filled out");
 document.getElementById('update_last_name').focus();
       return false;
  }


  if (town_name == "") {
    alert("Town name must be filled out");
 document.getElementById('update_town_name').focus();
       return false;
  }


}

function dataCustomer(id,fname,lname,tname, gname){ 

document.getElementById('update_id').value = id;
document.getElementById('update_first_name').value = fname;
document.getElementById('update_last_name').value = lname;
document.getElementById('update_town_name').value = tname;
document.getElementById(gname).selected = "true";
}



$(document).ready(function () {
  setTimeout(function () {
      $('#successMessage').hide(1000);
  }, 6000);
});

</script>


</body>
</html>
