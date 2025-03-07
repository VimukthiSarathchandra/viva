<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advanced Search | New Tech</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resource/New Tech-1.png" />
</head>

<body>
    <div class="home">

        <div class="container-fluid">
            <div class="row">
                <?php 
                session_start();
                require "connection.php";
                include "header.php"; 
                ?>

                <div class="col-12">
                    <hr />
                </div>

                <div class="col-12 mb-2">
                    <div class="row">
                        <div class="col-12 col-lg-4">
                            <div class="row">
                                <div class="col-12 text-center">
                                    <div class="fs-2 text-black-50 fw-bold mt-3 pt-2 offset-1"><span class="fs-1 text-black fw-bold mt-3 pt-2">New Tech</span>
                                        Advanced Search</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb offset-1">
                            <li class="breadcrumb-item"><a class="text-decoration-none" href="index.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Advanced Search</li>
                        </ol>
                    </nav>
                    <div class="col-12">
                        <hr />
                    </div>
                </div>



                <div class="col-11 col-lg-2  offset-lg-1 mb-2 d-none d-lg-block">
                    <!-- bg-body rounded-3-->
                    <div class="row">

                        <div class="offset-1 mt-2 ">
                            <a href="#" class="fw-bold fs-4 mt-3 text-decoration-none text-dark">Manage My Account</a>
                            <div class="mx-3 mb-4 mt-3">
                                <a class="text-decoration-none text-secondary" href="#">My Profile</a><br>
                                <a class="text-decoration-none text-secondary" href="#">Address Book</a><br>
                                <a class="text-decoration-none text-secondary" href="#">My Payment Options</a><br>
                                <a class="text-decoration-none text-secondary" href="purchasedHistory.php">Purchase</a><br>
                                <a class="text-decoration-none text-secondary" href="#">Vouchers</a>
                                <a class="text-decoration-none text-secondary" href="myProduct.php">My Produts</a>
                            </div>

                            <a href="purchasedHistory.php" class="fw-bold fs-4 mt-3 text-decoration-none text-dark">My Orders</a>
                            <div class="mx-3 mb-4 mt-3">
                                <a class="text-decoration-none text-secondary" href="#">My Returns</a><br>
                                <a class="text-decoration-none text-secondary" href="#">My Cancellations</a>
                            </div>
                            <a href="watchlist.php" class="fw-bold fs-4 text-decoration-none text-dark">Watchlist</a>
                        </div>
                    </div>
                </div>


                <div class="mx-lg-auto  col-12 col-lg-8 bg-body rounded-3 mb-2">
                    <div class="row">

                        <div class="offset-lg-1 col-12 col-lg-10 mt-3 mb-5">
                            <div class="row">
                                <div class="col-12 col-lg-10 mt-2 mb-1">
                                    <input type="text" class="form-control" placeholder="Type Keyword to search..." />
                                </div>
                                <div class="col-12 col-lg-2 mt-2 mb-1 d-grid">
                                    <button class="btn btn-primary">Search</button>
                                </div>

                            </div>
                        </div>


                        <div class="offset-lg-0 col-12 col-lg-6 mb-2 col-sm-12">
                            <div class="row">

                                <div class="col-12">

                                    <div class="offset-lg-2 col-12 col-lg-7 mb-5">
                                        <select class="form-select">
                                            <option>All Category</option>
                                            <option>Mobile Phone</option>
                                            <option>Computers & Laptop</option>
                                            <option>Camera & Drones</option>
                                            <option>Computer Accessories</option>
                                            <option>Video Games & Consoles</option>
                                        </select>
                                    </div>

                                    <div class="offset-lg-2 col-12 col-lg-7 mb-5">
                                        <select class="form-select">
                                            <option>Select Brand</option>
                                            <option>Apple</option>
                                            <option>Huawei</option>
                                            <option>Samsung</option>
                                        </select>
                                    </div>

                                    <div class="offset-lg-2 col-12 col-lg-7 mb-5">
                                        <select class="form-select">
                                            <option>Select Model</option>
                                            <option>iPhone12</option>
                                            <option>iPhone14</option>
                                            <option>S22 Ultra</option>>
                                        </select>
                                    </div>

                                    <div class="offset-lg-2 col-12 col-lg-7 mb-5">
                                        <select class="form-select">
                                            <option>Select Colour</option>
                                            <option>Black</option>
                                            <option>Red</option>
                                            <option>Purple</option>
                                        </select>
                                    </div>

                                    <div class="offset-lg-2 col-12 col-lg-7 mb-5">
                                        <select class="form-select">
                                            <option>Sort by</option>
                                            <option>Price High to Low</option>
                                            <option>Price Low to High</option>
                                            <option>Quantity High to Low</option>
                                            <option>Quantity Low to High</option>
                                        </select>
                                    </div>

                                </div>

                            </div>
                        </div>



                        <div class="col-12 col-lg-6 col-sm-12 ">
                            <div class="row">

                                <div class="col-8 offset-lg-4">

                                    <div class="mb-3">
                                        <p class="fw-bold">Shipping options</p>
                                        <div class="form-check">
                                            <input class="form-check-input " type="checkbox">
                                            <label class="form-check-label ">
                                                Free international shipping
                                            </label>
                                        </div>

                                    </div>

                                </div>

                                <div class="mt-2 col-8 offset-lg-4">
                                    <p class="fw-bold ">Condition</p>
                                    <div class="form-check ">
                                        <input class="form-check-input " type="radio" name="flexRadioDefault" checked>
                                        <label class="form-check-label ">
                                            Brand New
                                        </label>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input " type="radio" name="flexRadioDefault">
                                        <label class="form-check-label ">
                                            Used
                                        </label>
                                    </div>
                                </div>

                                <div class="mt-3 col-lg-6 col-sm-12 col-8 offset-lg-4 mt-4">
                                    <label class="form-label fw-bold">Price range</label>
                                    <input type="range" class="form-range">
                                </div>



                            </div>
                            <div class="col-12 col-lg-2 mt-2 mb-1 d-grid col-8 offset-lg-4">
                                <button class="btn btn-outline-success ">ClearAll</button>
                            </div>
                        </div>

                    </div>
                </div>

                <?php require "footer.php"; ?>
            </div>
        </div>

    </div>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>