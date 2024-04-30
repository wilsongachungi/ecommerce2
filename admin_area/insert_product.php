<?php
include('../includes/connect.php');

if(isset($_POST['insert_product'])){

   
    // Retrieve form data
    $product_title = $_POST['product_title'];
    $product_description = $_POST['product_description'];
    $product_keywords = $_POST['product_keywords'];
    $product_category = $_POST['category_id'];
    $product_brand = $_POST['product_brand'];
    $product_price = $_POST['product_price'];
    $product_status = 'true';

    // Handle file uploads
    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];

    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];
    $temp_image3 = $_FILES['product_image3']['tmp_name'];

    // Check if required fields are empty
    if($product_title == '' || $product_description == '' || $product_category == '' || $product_brand == '' || $product_image1 == '' ||
     $product_image2 == '' || $product_image3 == '') {
        echo "<script>alert('Please fill all the available fields')</script>";
    } else {
        // Move uploaded files to destination directory
        move_uploaded_file($temp_image1, "./product_images/$product_image1");
        move_uploaded_file($temp_image2, "./product_images/$product_image2");
        move_uploaded_file($temp_image3, "./product_images/$product_image3");

        // Insert data into database
        $insert_products = "INSERT INTO `product_table` 
                            (`product_title`, `product_description`, `product_keywords`, `category_id`, 
                             `brand_id`, `product_price`, `product_image1`, `product_image2`, `product_image3`, 
                             `date`, `status`) 
                            VALUES 
                            ('$product_title', '$product_description', '$product_keywords', '$product_category', 
                             '$product_brand', '$product_price', '$product_image1', '$product_image2', '$product_image3', 
                             NOW(), '$product_status')";

        $result_query = mysqli_query($con, $insert_products);

        if($result_query) {
            echo "<script>alert('Successfully inserted')</script>";
        } else {
            echo "<script>alert('Error inserting data')</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>insert products</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body class="bg-light">
    <div class="container mt-3">
        <h3 class="text-center ">Insert products</h3>
        <form action="insert_product.php" method="post" enctype="multipart/form-data">
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Product Title</label>
                <input type="text" name="product_title" id="product_title" class="form-control"
                    placeholder="Enter Product Title" autocomplete="off" required>
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_description" class="form-label">Product description</label>
                <input type="text" name="product_description" id="product_description" class="form-control"
                    placeholder="Enter Product Title" autocomplete="off" required>
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keywords" class="form-label">Product keywords</label>
                <input type="text" name="product_keywords" id="product_keywords" class="form-control"
                    placeholder="Enter Product Title" autocomplete="off" required>
            </div>
            <br>

            <div class="form-outline mb-4 w-50 m-auto">
                <select class="form-select" name="category_id">
                    <option selected>Select Category</option>
                    <?php
                        $select_query = "SELECT category_title, category_title FROM categories"; 
                        $result_query = mysqli_query($con, $select_query);

                        if ($result_query && mysqli_num_rows($result_query) > 0) {
                            while ($row = mysqli_fetch_assoc($result_query)) {
                                $category_id = $row['category_id'];
                                $category_title = $row['category_title'];
                                echo '<option value="' . $category_id . '">' . $category_title . '</option>';
                            }
                        } else {
                            echo '<option value="">No categories found</option>';
                        }
                    ?>

                </select>
            </div>
            <br>

            <div class="form-outline mb-4 w-50 m-auto">
                <select class="form-select" name="product_brand">
                    <option selected>Select a Brand</option>
                    <?php
                        $select_query = "SELECT brand_id, brand_title FROM brands"; 
                        $result_query = mysqli_query($con, $select_query);

                        if ($result_query && mysqli_num_rows($result_query) > 0) {
                            while ($row = mysqli_fetch_assoc($result_query)) {
                                $brand_id = $row['brand_id'];
                                $brand_title = $row['brand_title'];
                                echo '<option value="' . $brand_id . '">' . $brand_title . '</option>';
                            }
                        } else {
                            echo '<option value="">No categories found</option>';
                        }
                    ?>
                </select>
            </div>


            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-label">Product image1</label>
                <input type="file" name="product_image1" id="product_image1" class="form-control"
                    placeholder="Enter Product image" autocomplete="off" required>
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image2" class="form-label">Product image2</label>
                <input type="file" name="product_image2" id="product_image2" class="form-control"
                    placeholder="Enter Product image" autocomplete="off" required>
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image3" class="form-label">Product image3</label>
                <input type="file" name="product_image3" id="product_image3" class="form-control"
                    placeholder="Enter Product image" autocomplete="off" required>
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label">Product price</label>
                <input type="number" name="product_price" id="product_price" class="form-control"
                    placeholder="Enter Product Price" autocomplete="off" required>
            </div>
            <br>
            <div class="form-outline mb-4 w-50 m-auto">
                <button class="btn btn-info mb-3" name="insert_product" value="insert product">Insert Product</button>
            </div>

        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>