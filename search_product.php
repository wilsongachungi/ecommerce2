<?php
include('includes/connect.php');
include('functions/common_function.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <style>
    .logo {
        width: 7%;
        height: 7%;
    }

    .card-img-top {
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
                <form class="form-inline my-2 my-lg-0"  action="search_product.php" method="get">
                    <input class="form-control mr-sm-2" type="search" name="search_data" placeholder="Search" aria-label="Search">
                    <input type="submit" value="search" name="search_data_product" class="btn btn-outline-light">
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
                    search_product();
                    get_unique_categories();
                    get_unique_brands();
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
                           getbrands();
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
                            getcategories();

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