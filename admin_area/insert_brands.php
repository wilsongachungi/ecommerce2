<?php
include('../includes/connect.php');

if(isset($_POST['insert_brand'])){
    $brand_title=$_POST['cart_title'];

  //select data from the database
  $select_query = "SELECT * FROM brands WHERE brand_title='$brand_title'";

    $result_select= mysqli_query($con,$select_query);
    $number=mysqli_num_rows($result_select);
    if($number>0){
        echo "<script>alert('the brand is present in the database')</script>";
    }else{

    $insert_query = "INSERT INTO brands (brand_title) VALUES ('$brand_title')";
    $result=mysqli_query($con,$insert_query);
    if($result){
        echo "<script>alert('brand has been inserted successfully')</script>";
    }
    }}
?>
<h3 class="text-center">Insert Brands</h3>
<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
        <div class="input-group-prepend">
            <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        </div>
        <input type="text" class="form-control" name="cart_title" placeholder="Insert Brands" aria-label="Brands"
            aria-describedby="basic-addon1">
    </div>

    <button class="btn btn-success" name="insert_brand">Insert Brands</button>
</form>