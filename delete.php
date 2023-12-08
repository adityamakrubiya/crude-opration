<?php
include "connect.php";
$id = $_GET["id"];
$sql = "DELETE FROM `employee` WHERE id = $id";
$result = mysqli_query($con, $sql);

if ($result) {
  header("Location: a.php?msg=Data deleted successfully");
} else {
  echo "Failed: " . mysqli_error($con);
}