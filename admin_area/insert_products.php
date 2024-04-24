<?php
include('../includes/connect.php')
?>

<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
        <div class="input-group-prepend">
            <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        </div>
        <input type="text" class="form-control" name="cart_title" placeholder="Insert Products" aria-label="Products"
            aria-describedby="basic-addon1">
    </div>
<!-- 
    <div class="input-group w-10 mb-2 m-auto">
        <input type="submit" class="form-control bg-info" name="cart_title" value="Insert Categories" aria-label="Username"
            aria-describedby="basic-addon1">
    </div> -->
    <button class="btn btn-success">Insert Product</button>
</form>