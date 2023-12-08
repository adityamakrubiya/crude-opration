<?php
include 'connect.php';

$id = $_GET["id"];
ini_set('display_errors','Off');

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
   
  $sql = "UPDATE `registration` SET fullname ='$first_name',lastname='$last_name',`email`='$email',`country`='$country',`state`='$state' ,`gender`='$gender',hobbies='$comma_separated_hobbies' WHERE id = $id ";


  $result = mysqli_query($con, $sql);

  if ($result) {
    header("Location: a.php?msg=Data updated successfully");
  } else {
    echo "Failed: " . mysqli_error($con);
  }
}
      }}}
?>

<?php

// $user_id = $name = "$id";
// $chk = array("","","checked","","");
// if((isset($_POST['submit'])) && $_POST['submit']== "clear"){
//   $user_id=$name="";
//   $chk = array("","","","","");
// }

?>

<head>
<title>REGISTRATION</title>
<script>

//
//  function validateForm() {
//     var radios = document.getElementsByName("gender");
//     var formValid = false;

//     var i = 0;
//     while (!formValid && i < radios.length) {
//         if (radios[i].checked) formValid = true;
//         i++;        
//     }

//     if (!formValid) alert(" select a gender!");
//     return formValid;

//             if(!this.form.checkbox.checked)
// {
//     alert('You must agree to the terms first.');
//     return false;
// }
// }

function ValidateEmail(inputText)
{
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
if(inputText.value.match(mailformat))
{
// alert("Valid email address!");
// document.form1.text1.focus();
// return true;
}
else
{
alert("You have entered an invalid email address!");
document.form1.text1.focus();
return false;
}
}



</script>
<style>
input[type=button], input[type=submit]{
    margin: -10px 2px;
}
input[type=text],input[type=email],p{
    margin: +5px 20px;
}
  </style>
</head>
<body>



  <?php 
    $sql = "SELECT * FROM `registration` WHERE id = $id LIMIT 1 ";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    $color_exp = explode(', ', $row['hobbies']);
  


?>

<?php
if($row==null) {echo "record not found"; 
  // header("Location: a.php");
  ?><a href="a.php"> <button style= "color: red; padding-left: 10px;">Back</button> </a>
<?php
}
?>

<form  method="post"  name="form1" action="" onsubmit="return validateForm()" >
<p>
firstname:<input type="text" name="fname" value="<?php echo $row['fullname'] ?>" required maxlength="10" minlength="2"></br>
lastname: <input type="text" name="lname" value="<?php echo $row['lastname'] ?>" required maxlength="10" minlength="2"></br>

email:   <input type="email" name="email" value="<?php echo $row['email'] ?>"></br>

gender:  <input type="radio" name="gender" id="male" value="Male" 
<?php 
  if ($row['gender'] == "male"){ echo "checked";} ?>/> Male
        <input type="radio" name="gender"id="female" value=Female" <?php
  if ($row['gender'] == "female"){echo "checked";}?>/> Female<br>
</p><p>
country: <select name="country" id="country" required>
        <option value="india"  <?php if($row['country'] == "india") { echo "selected" ; } ?>  >india</option>
        <option value="Iran"   <?php if($row['country'] == "Iran") { echo "selected" ; } ?>   >Iran</option>
        <option value="japan"  <?php if($row['country'] == "Japan") { echo "selected" ; } ?>  >japan</option>
        <option value="Bhutan" <?php if($row['country'] == "Bhutan") { echo "selected" ; } ?>  >Bhutan</option>
</select><br>
</p><p>
state: <select name="state" id="state" require>
      <option value="gujarat"       <?php if($row['state'] == "Gujarat") { echo "selected" ; } ?>    >  gujarat</option>
      <option value="Assam"         <?php if($row['state'] == "Assam") { echo "selected" ; } ?>      >  Assam</option>
      <option value="Andhra Pradesh"<?php if($row['state'] == "Andhra Pradesh") { echo "selected";}?>>  Andhra Pradesh</option>
      <option value="Goa"           <?php if($row['state'] == "Goa") { echo "selected" ; } ?>        >  Goa</option>
</select><br>
</p><p>
<hobbies:   <br> cricket   <input type="checkbox" id="green"  name="hobby[]" value="cricket" 
<?php if(in_array('cricket',$color_exp)) {echo 'checked';}?>><br>
          volleyball <input type="checkbox" id="red"   name="hobby[]" value="volleyball"
<?php if(in_array('volleyball',$color_exp)) {echo 'checked'; }?>><br>
          football  <input type="checkbox" id="yellow" name="hobby[]" value="football" 
<?php if(in_array('football',$color_exp)) {echo 'checked';}?>><br>
          chess  <input type="checkbox" id="black"  name="hobby[]" value="chess"          
<?php if(in_array('chess',$color_exp)) {echo 'checked';}?>>
<br>
 
</p> 
    <br>
        <input type="submit" name="submit" value="submit" id="submit" onclick="ValidateEmail(document.form1.email)" >
        <input type="hidden" id="colId<?php echo $row["id"]; ?>" value="<?php echo $row["id"]; ?>" />

</form>
<a href="a.php"> <button style= "color: red; padding-left: 10px;">Back</button> </a>

<!-- <script>
        var itemForm = document.getElementById('itemForm'); 
        var checkBoxes = itemForm.querySelectorAll('input[type="text"]'); 
        document.getElementById('itemForm').addEventListener('click', getData);  

        let error = true;

        function getData() {                     
            checkBoxes.forEach(item => {        
                if (item.checked) {            
                    error = false;
                }
            });
            if (error) {
                alert("Minimum one chechbox select");
            }
           
        }
    </script> --> 

</body>
</html>

