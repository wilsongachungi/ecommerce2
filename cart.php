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
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                        <a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i> <sup class="text-danger"><?php cart_item() ?></sup></a>
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
                <form action="" method="post">
                    <table class="table table-bordered text-center">
                        <thead>
                            <th>Product title</th>
                            <th>Product Image</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Remove</th>
                            <th colspan="2">Operations</th>
                        </thead>
                        <tbody>
                            <?php
                            global $con;
                            $total_price = 0;
                            $get_ip_address = getIPAddress();
                            $cart_query = "SELECT * FROM `cart_details` WHERE ip_address = '$get_ip_address'";
                            $result = mysqli_query($con, $cart_query);
                            while ($row = mysqli_fetch_array($result)) {
                                $product_id = $row['product_id'];
                                $select_products = "SELECT * FROM `product_table` WHERE product_id = '$product_id'";
                                $result_products = mysqli_query($con, $select_products);
                                while ($row_product_price = mysqli_fetch_array($result_products)) {
                                    $product_price = array($row_product_price['product_price']);
                                    $price_table = $row_product_price['product_price'];
                                    $product_title = $row_product_price['product_title'];
                                    $product_image1 = $row_product_price['product_image1'];
                                    $product_values = array_sum($product_price);
                                    $total_price += $product_values;


                            ?>
                                    <tr>
                                        <td><?php echo $product_title ?></td>
                                        <td><img style="width: 30%; height:30%; object-fit:contain" src="./admin_area/product_images/<?php echo $product_image1 ?>" alt=""></td>
                                        <td><input class="form-input w-50" name="qty" type="text"></td>

                                        <?php
                                         $get_ip_address = getIPAddress();
                                         if(isset($_POST['update_cart'])){
                                            $quantities=$_POST['qty'];
                                            $update_cart="update `cart_details` set quantity=$quantities where ip_address='$get_ip_address'";
                                            $result_products_quantity = mysqli_query($con, $update_cart);
                                            $total_price=$total_price*$quantities;
                                         }
                                        ?>
                                        <td> <?php echo $product_values ?></td>
                                        <td><input type="checkbox"></td>
                                        <td>
                                            <!-- <button >Update</button> -->
                                            <input class="bg-info px-3 py-2 text-light mx-2 border-0" name="update_cart" type="submit" value="Update Cart">
                                            <button class="bg-info px-3 py-2 text-light border-0">Remove</button>
                                        </td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>

                    <div class="d-flex mb-5">
                        <h5 class="px-3">Subtotal: <strong class="text-info"><?php echo $total_price ?></strong></h5>
                        <a href="index.php"><button class="bg-info px-3 py-2 mx-3 border-0">Continue shopping</button></a>
                        <a href="#"><button class="bg-info px-3 py-2 text-light border-0">Checkout</button></a>
                    </div>

            </div>
            </form>
        </div>


        <div class="bg-info p-3 text-center mb-0">
            <p>All rights reserved</p>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>