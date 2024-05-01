<?php
    include('./includes/connect.php');

    function getproducts(){
        global $con;
        if(!isset($_GET['category'])){
            if(!isset($_GET['brand'])){

        $select_query = "SELECT * FROM `product_table` order by rand() limit 0,9";
        $result_query = mysqli_query($con, $select_query);

        if ($result_query && mysqli_num_rows($result_query) > 0) {
            while ($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                $product_keywords = $row['product_keywords'];
                $product_image1 = $row['product_image1'];
                $product_price = $row['product_price'];
                $brand_id = $row['brand_id'];
                $category_id = $row['category_id'];

                echo "
                <div class='col-md-4 mb-2'>
                    <div class='card'>
                        <img class='card-img-top' src='./admin_area/product_images/$product_image1' alt='Card image cap'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p>$product_description</p>
                            <p>KSH$product_price</p>
                            <a href='#' class='btn btn-info'>Add to Cart</a>
                            <a href='#' class='btn btn-secondary'>View More</a>
                        </div>
                    </div>
                </div>";
            }
        } else {
            echo "<div class='col-md-12'><p>No products found</p></div>";
        }
    }
}
}

    function get_unique-categories(){
        if(isset($_GET['category']))
    }
    function getbrands(){
        global $con;
        $select_brands = "SELECT brand_id, brand_title FROM brands"; 
        $result_brands = mysqli_query($con, $select_brands);

        if ($result_brands) {
            while ($row_data = mysqli_fetch_assoc($result_brands)) {
                $brand_id = $row_data['brand_id'];
                $brand_title = $row_data['brand_title'];
                echo '<li class="nav-item"><a href="index.php?brand=' . $brand_id . '" class="nav-link text-light">' . $brand_title . '</a></li>';
            }
        } else {    $select_categories = "SELECT category_id, category_title FROM categories"; 
            $result_categories = mysqli_query($con, $select_categories);

            if ($result_categories) {
                while ($row_data = mysqli_fetch_assoc($result_categories)) {
                    $category_id = $row_data['category_id'];
                    $category_title = $row_data['category_title'];
                    echo '<li class="nav-item"><a href="index.php?category=' . $category_id . '" class="nav-link text-light">' . $category_title . '</a></li>';
                }
            } else {
                echo '<li class="nav-item"><span class="nav-link text-light">Error fetching categories: ' . mysqli_error($con) . '</span></li>';
            }
            echo '<li class="nav-item"><span class="nav-link text-light">Error fetching brands: ' . mysqli_error($con) . '</span></li>';
        }
    }

    function getcategories(){
        global $con;
        $select_categories = "SELECT category_id, category_title FROM categories"; 
        $result_categories = mysqli_query($con, $select_categories);

        if ($result_categories) {
            while ($row_data = mysqli_fetch_assoc($result_categories)) {
                $category_id = $row_data['category_id'];
                $category_title = $row_data['category_title'];
                echo '<li class="nav-item"><a href="index.php?category=' . $category_id . '" class="nav-link text-light">' . $category_title . '</a></li>';
            }
        } else {
            echo '<li class="nav-item"><span class="nav-link text-light">Error fetching categories: ' . mysqli_error($con) . '</span></li>';
        }
    }
?>