<?php
include "connect.php";

if (isset($_POST["submit"])) {
   $first_name  = $_POST['fname'];
   $last_name   = $_POST['lname'];
   $email       = $_POST['email'];
   $country     = $_POST['country'];
   $state       = $_POST['state'];
   $gender      = $_POST['gender'];
   $hobbies     = $_POST['hobby'];
   
if(isset($_REQUEST['submit'])!=''){

    if (isset($_POST['hobby'])) {

        if (is_array($_POST['hobby'])) {

            $hobbies = $_POST['hobby'];
    
            $comma_separated_hobbies = implode(", ", $hobbies);
    
          
        } {
    ?><?php

   $sql="INSERT INTO  registration (id,fullname,lastname,email,country,state,gender,hobbies) VALUES (null,'$first_name','$last_name','$email','$country','$state','$gender','$comma_separated_hobbies')";

   $result = mysqli_query($con, $sql);

   if ($result) {
      header("Location: a.php?msg=New record created successfully");
   } else {
      echo "Failed: " . mysqli_error($con);
   }?>
   <br><br><center><h1>

<?php echo "successfully Inserted ";?>
</h1></center>
<?php
}
    }}}
?>




