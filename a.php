<html>

<head>
  <style>
table, tr, td {  
  border: 1px solid #FF5733;
  text-align: left;
}

table {
  border-collapse: collapse;
  width: 100%;
}

tr, td {
  padding: 10px ;
}

  </style>
</head>
  <body>
    <br>
 <a href="registration.php"> <button style= "color: red;  width: 4%; height: 4%; padding-left: 10px;" >Insert</button> </a>   
  <br>  
<br>

<?php include "connect.php";?>
<table>
<tbody><tr>
            <td style="font-weight: bold;"> id          </td>
            <td style="font-weight: bold;"> first_name  </td>
            <td style="font-weight: bold;"> last_name   </td>
            <td style="font-weight: bold;"> email       </td>
            <td style="font-weight: bold;"> country     </td>
            <td style="font-weight: bold;"> state       </td>
            <td style="font-weight: bold;"> gender      </td>
            <td style="font-weight: bold;"> hobbies     </td>
            <td style="font-weight: bold;"> Edit        </td>
            <td style="font-weight: bold;"> Delete      </td>


</tr>

        <?php
        $sql = "SELECT * FROM `registration`";
        $result = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <tr>
            <td><?php echo $row["id"] ?>          </td>
            <td><?php echo $row["fullname"] ?>  </td>
            <td><?php echo $row["lastname"] ?>   </td>
            <td><?php echo $row["email"] ?>       </td>
            <td><?php echo $row["country"] ?>     </td>
            <td><?php echo $row["state"] ?>       </td>
            <td><?php echo $row["gender"] ?>      </td>
            <td><?php echo $row["hobbies"] ?>     </td>
           
            <td>
            <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a></td>
             <td> <a href="delete.php?id=<?php echo $row['id'] ?>">Delete</a>
              
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody> </table>
      </body>
</html>