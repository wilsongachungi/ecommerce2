<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../style.css">
    <style>
    .admin_img {
        width: 100px;
        object-fit: contain;
    }
    

    </style>
</head>

<body>

    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid ">
                <img src="../img/shopping.jpeg" alt="" class="logo">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar nav">
                        <li class="nav-item">
                            <a href="" class="nav-link">welcome Guest</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>

        <div class="bg-light">
            <h3 class="text-center p-2">Manage Details</h3>
        </div>

        <div class="col-md-12 bg-secondary p-1 d-flex align-item-center">
            <div class="p-3">
                <a href=""><img src="../img/apple.jpeg" alt="" class="admin_img"></a>
                <p class="text-light text-center">Admin name</p>
            </div>
            <div class="button text-center">
                <button class="my-3"><a href="insert_product.php" class="nav-link text-light bg-info my-1">Insert Products</a></button>
                <button><a href="" class="nav-link text-light bg-info my-1">View Products</a></button>
                <button><a href="index.php?insert_category" class="nav-link text-light bg-info my-1">Insert Categories</a></button>
                <button><a href="" class="nav-link text-light bg-info my-1">View Categories</a></button>
                <button><a href="index.php?insert_brand" class="nav-link text-light bg-info my-1">Insert Brands</a></button>
                <button><a href="" class="nav-link text-light bg-info my-1">View Brands</a></button>
                <button><a href="" class="nav-link text-light bg-info my-1">All Orders</a></button>
                <button><a href="" class="nav-link text-light bg-info my-1">All payments</a></button>
                <button><a href="" class="nav-link text-light bg-info my-1">List Users</a></button>
                <button><a href="" class="nav-link text-light bg-info my-1">Logout</a></button>
            </div>
        </div>
    </div>

    <div class="container my-4">
        <?php
         if(isset($_GET['insert_product'])) {
            include('insert_products.php');
        }

        if(isset($_GET['insert_category'])) {
            include('insert_categories.php');
        }

        if(isset($_GET['insert_brand'])) {
            include('insert_brands.php');
        }
        ?>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>