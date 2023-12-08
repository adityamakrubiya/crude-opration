<html>
<head>
<title>REGISTRATION</title>


<script>
 
        function validateForm() {
    var radios = document.getElementsByName("gender");
    var formValid = false;

    var i = 0;
    while (!formValid && i < radios.length) {
        if (radios[i].checked) formValid = true;
        i++;        
    }

    if (!formValid) alert(" select a gender!");
    return formValid;

            if(!this.form.checkbox.checked)
{
    alert('You must agree to the terms first.');
    return false;
}
}


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
input[type=button], input[type=submit], input[type=reset]{
  margin: -10px 2px;
}
input[type=text],input[type=email],p{
    margin: +5px 20px;
}

  </style>
</head>
<body>
  
<form  method="post"  name="form1" action="data.php" onsubmit="return validateForm()" >
<p>
firstname:<input type="text" name="fname" value="" required maxlength="10" minlength="3"></br>
lastname: <input type="text" name="lname" value="" required maxlength="10" minlength="3"></br>

email:   <input type="email" name="email" value=""></br>

gender:  <input type="radio" name="gender" id="1" value="Male" /> Male
        <input type="radio" name="gender"id="1" value="Female" /> Female<br>
</p><p>
country: <select name="country" id="country" required>
        <option value="india">india</option>
        <option value="Iran">Iran</option>
        <option value="japan">japan</option>
        <option value="Bhutan">Bhutan</option>
</select><br>
</p><p>
state: <select name="state" id="state" require>
        <option value="gujarat">gujarat</option>
        <option value="Assam">Assam</option>
        <option value="Andhra Pradesh">Andhra Pradesh</option>
        <option value="Goa">Goa</option>
</select><br>
</p><p>
hobbies:    cricket   <input type="checkbox"    id="green"  name="hobby[]" value="cricket"  required><br />  
            volleyball   <input type="checkbox" id="pink"   name="hobby[]" value="volleyball"><br />  
            football     <input type="checkbox" id="yellow" name="hobby[]" value="football"><br />  
            chess        <input type="checkbox" id="black"  name="hobby[]" value="chess"><br/><br>

        <input type="submit" name="submit" value="submit" id="submit" onclick="ValidateEmail(document.form1.email)" >
        <input type="reset" name="Insert" value="reset">
        </p> 
</form>
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
