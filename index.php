<?php
include('includes/connect.php')
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <style>
    .logo {
        width: 7%;
        height: 7%;
    }
    .card-img-top{
    width: 100%;
    height: 150px;
    object-fit: contain;
}

    .admin_img {
        width: 100px;
        object-fit: contain;
    }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce Website</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <img src="./img/shopping.jpeg" alt="" class="logo">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa fa-shopping-cart"
                                aria-hidden="true"></i><sup>1</sup></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Total Price:100</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>

        <nav class="nav navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Welcome Guest</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Login</a>
                </li>
            </ul>
        </nav>

        <div class="bg-light">
            <h3 class="text-center">Hidden Store</h3>
            <p class="text-center">
                Communication is at the heart of E-commerce and the community
            </p>
        </div>

        <div class="row px-4">
            <div class="col-md-10">
                <div class="row">

                <?php
                    $select_query="select *from `product_table`";
                    $result_query=mysqli_query($con,$select_query);
                    $row=mysqli_fetch_assoc($result_query);
                   
                    while($row=mysqli_fetch_assoc($result_query)){
                        $product_id=$row['product_id'];
                        $product_title=$row['product_title'];
                        $product_description=$row['product_description'];
                        $product_keywords=$row['product_keywords'];
                        $product_image1=$row['product_image1'];
                        $product_price=$row['product_price'];
                        $brand_id=$row['brand_id'];
                        $category_id=$row['category_id'];
                        echo "  <div class='col-md-4 mb-2'>
                       
                        <div class='card'>
                            <img class='card-img-top' src='./admin_area/product_images/$product_image1' alt='Card image cap'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_title</h5>
                                <p> $product_description.</p>
                                <a href='#' class='btn btn-info'>Add to Cart</a>
                                <a href='#' class='btn btn-secondary'>View More</a>
                            </div>
                        </div>
                    </div>";
                    }
                ?>

                    
                </div>
            </div>
            <div class="col-md-2 bg-secondary p-0">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item bg-info text-center">
                        <a href="" class="nav-link text-light">
                            <h4>Derivery brands</h4>
                        </a>
                    </li>
                    <ul class="navbar-nav">
                        <?php
                            $select_brands = "SELECT brand_id, brand_title FROM brands"; 
                            $result_brands = mysqli_query($con, $select_brands);

                            if ($result_brands) {
                                while ($row_data = mysqli_fetch_assoc($result_brands)) {
                                    $brand_id = $row_data['brand_id'];
                                    $brand_title = $row_data['brand_title'];
                                    echo '<li class="nav-item"><a href="index.php?brand=' . $brand_id . '" class="nav-link text-light">' . $brand_title . '</a></li>';
                                }
                            } else {
                                echo '<li class="nav-item"><span class="nav-link text-light">Error fetching brands: ' . mysqli_error($con) . '</span></li>';
                            }
                        ?>

                    </ul>


                </ul>

                <ul class="navbar-nav me-auto">
                    <li class="nav-item bg-info text-center">
                        <a href="" class="nav-link text-light">
                            <h4>Categories</h4>
                        </a>
                    </li>

                    <ul class="navbar-nav">

                    <?php
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
                    ?>


                    </ul>
                </ul>
            </div>
        </div>

        <div class="bg-info p-3 text-center">
            <p>All rights reserved</p>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>