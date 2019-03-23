<?php 
$connection = mysqli_connect('localhost', 'root', '', 'ajax-demo');
//if($connection) {
//    echo "Yes it is";
//}
$search = $_POST['search'];

$query = "SELECT * from cars WHERE cars LIKE '$search%' ";
$search_query = mysqli_query($connection,$query);
if(!$search_query){
    die('QUERY FAILED' . mysqli_error($connection));
}

while($row = mysqli_fetch_array($search_query)) {
$brand = $row['cars'];
?> 

<ul>
<?php
echo "<li>{$brand}</li>";
?>

</ul>
<?php
}

?>