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
    <title>Cart details</title>
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
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
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
                        <a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart"
                                aria-hidden="true"></i> <sup class="text-danger"><?php  cart_item() ?></sup></a>
                    </li>
                    
                </ul>
                
            </div>
        </nav>

        <?php
            cart();
        ?>

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

        <div class="container">
            <div class="row">
                <table class="table table-bordered text-center">
                    <thead>
                        <th>Product title</th>
                        <th>Product Image</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Remove</th>
                        <th>Operations</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Desktop</td>
                            <td><img src="./img/apple.jpeg" alt=""></td>
                            <td><input type="text"></td>
                            <td>90000</td>
                            <td><input type="checkbox"></td>
                            <td>
                                <p>Update</p>
                                <p>Remove</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
                
                <div class="d-flex mb-5">
                    <h5 class="px-3">Subtotal:<strong class="text-info">5000</strong></h5>
                    <a href="index.php"><button class="bg-info px-3 py-2 mx-3 border-0">Continue shopping</button></a>
                    <a href="#"><button class="bg-info px-3 py-2 border-0">Checkout</button></a>
                </div>

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