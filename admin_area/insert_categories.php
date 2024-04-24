<?php
include('../includes/connect.php');

if(isset($_POST['insert_cart'])){
    $category_title=$_POST['cart_title'];

  //select data from the database
    $select_query="select * from 'categories' where category_title='$category_title'";
    

    $insert_query = "INSERT INTO categories (category_title) VALUES ('$category_title')";
    $result=mysqli_query($con,$insert_query);
    if($result){
        echo "<script>alert('category has been inserted successfully')</script>";
    }
}
?>

<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
        <div class="input-group-prepend">
            <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        </div>
        <input type="text" class="form-control" name="cart_title" placeholder="Insert Categories" aria-label="Username"
            aria-describedby="basic-addon1">
    </div>
<!-- 
    <div class="input-group w-10 mb-2 m-auto">
        <input type="submit" class="form-control bg-info" name="cart_title" value="Insert Categories" aria-label="Username"
            aria-describedby="basic-addon1">
    </div> -->
    <button class="btn btn-success" name="insert_cart" value="Insert Categories">Insert categiries</button>
</form>