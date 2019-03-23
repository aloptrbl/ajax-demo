<?php
include('db.php');

if(isset($_POST['id'])) {
$id = $_POST['id'];
$ids = mysqli_real_escape_string($connection,$id);
$query = "SELECT * FROM cars WHERE id ={$id}";
$query_car_info = mysqli_query($connection, $query);
if (!$query_car_info) {
    die("QUERY Failed". mysqli_error($connection));
}
while ($row = mysqli_fetch_array($query_car_info)) {
  echo '<div class="ui input focus">
  <input class="title-input" type="text" rel="'.$row['id'].'" value="'.$row['cars'].'" name="cars" placeholder="Search...">
</div>';
echo ' <button class="ui green button update">
Update
</button>';
echo '<button class="ui red button delete">
Delete
</button>';
}
}

if(isset($_POST['updatethis'])) {


    $id = $_POST['id'];
    $ids = mysqli_real_escape_string($connection,$id);
    $title = $_POST['cars'];
    $titles = mysqli_real_escape_string($connection,$title);

    $query = "UPDATE cars SET cars = '$titles' WHERE id = $ids";
    $result_set = mysqli_query($connection, $query);
    if(!result_set) {
        die("QUERY FAILED" . mysqli_error($connection));
    }


}

if(isset($_POST['deletethis'])) {


    $id = $_POST['id'];
    $ids = mysqli_real_escape_string($connection,$id);
  

    $query = "DELETE FROM cars WHERE id = '$ids' ";
    $result_set = mysqli_query($connection, $query);
    if(!result_set) {
        die("QUERY FAILED" . mysqli_error($connection));
    }


}

?>

<script>
$(document).ready(function(){
    var id;
    var cars;
    var updatethis = "update";
    var deletethis = "delete";

    $(".title-input").on('input', function(){
        id = $(this).attr('rel');
        cars = $(this).val();

    })
        $(".update").on('click',function(){
            $.post("process.php", {id: id, cars: cars,  updatethis: updatethis}, function(data){
               $("#feedback").text("Record Updated sucessfully");
            })
        });

        $(".delete").on('click',function(){
            if(confirm('Are you sure want to delete this item?')) {
            id = $(".title-input").attr('rel');
            $.post("process.php", {id: id, deletethis: deletethis}, function(data){
              alert("DELETED");
            })
            }
        });




  
})

</script>