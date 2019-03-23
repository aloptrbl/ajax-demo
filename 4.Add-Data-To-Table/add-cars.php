<?php
include('db.php');

if(isset($_POST['car_name'])) {
   // echo "DATA RECEIVED";
   $cars = $_POST['car_name'];
   $query = "INSERT INTO cars(cars) VALUES('$cars')";
   $query_car_name = mysqli_query($connection, $query);

   if (!$query_car_name) {
       die("QUERY FAILED");
   }
   else if ($query_car_name) {
       echo "DATA INSERTED";
   }
}
?>