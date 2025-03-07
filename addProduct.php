<?php

session_start();

require "connection.php";

if (isset($_SESSION["au"])) {

?>
    <!DOCTYPE html>

    <html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>AdminPanel | Akshara</title>
        <link rel="icon" href="assets/img/A_icon.jpg">

        <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
        <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
        <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" />
        <link rel="stylesheet" href="style.css" />
        <link href="assets/css/style.css" rel="stylesheet">

        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,600,600i,700,700i|Satisfy|Comic+Neue:300,300i,400,400i,700,700i" rel="stylesheet">

    </head>

    <body>

        <div class="container-fluid">
            <div class="row">

                <div class="col-2 col-lg-2 fixed-bottom d-none d-lg-block">
                    <div class="row">
                        <div class="col-12 align-items-start bg-dark vh-100">
                            <div class="row g-1 text-center">

                                <div class="col-12 mt-5">

                                    <img src="assets/img/A_icon.jpg" onclick="window.location='index.php'" class="rounded-circle" style="width: 80px;" />

                                    <div class="mx-5 mt-1">
                                        <a href="index.php">
                                            <h4>Akshara</h4>
                                        </a>
                                    </div>
                                    <hr class="border border-1 border-white" />


                                </div>
                                <div class="nav flex-column nav-pills me-3 mt-2 " role="tablist" aria-orientation="vertical">
                                    <nav class="nav flex-column">

                                        <div class="mt-3">
                                            <a href="AdminPanel.php" class="text-decoration-none ">
                                                <i class='bx bx-grid-alt fs-3'></i>
                                                <span class="text-white fs-3">Dashboard</span>
                                            </a>
                                        </div>
                                        <div class="mt-3">
                                            <a href="addProduct.php" class="text-decoration-none nav-link active">
                                                <i class='bx bx-coin-stack fs-3'></i>
                                                <span class="text-white fs-3">Add Book</span>
                                            </a>
                                        </div>
                                        <div class="mt-3 ">
                                            <a href="Products.php" class="text-decoration-none">
                                                <i class='bx bx-box fs-3 '></i>
                                                <span class="text-white fs-3 ">Books</span>
                                            </a>
                                        </div>
                                        <div class="mt-3">
                                            <a href="users.php" class="text-decoration-none">
                                                <i class='bx bx-user fs-3'></i>
                                                <span class="text-white fs-3">Users</span>
                                            </a>
                                        </div>
                                        <div class="mt-3">
                                            <a href="stock.php" class="text-decoration-none">
                                                <i class='bx bx-coin-stack fs-3'></i>
                                                <span class="text-white fs-3">Stock</span>
                                            </a>
                                        </div>
                                        <div class="mt-3 align-items-end">
                                            <a href="#" onclick="adminSignout();" class="text-decoration-none">
                                                <i class='bx bx-log-out fs-3'></i>
                                                <span class="text-white fs-3">Log out</span>
                                            </a>
                                        </div>

                                    </nav>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


                <div class="mx-lg-auto  col-12 col-lg-12 bg-body rounded-3 mb-2">
                    <div class="row">

                        <div class=" col-lg-7 offset-lg-2 px-5 mt-5 mb-4">
                            <span class="fs-3">Add New Book</span>
                        </div>



                        <div class="d-none d-lg-block col-lg-3 mt-5 mb-4 ">
                            <span class=" mt-2 mb-2 mx-2 justify-content-end">Admin :</span>
                            <span class=" mt-2 mb-2 mx-2 justify-content-end"><?php echo $_SESSION["au"]["fname"] . " " . $_SESSION["au"]["lname"]; ?></span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-10 offset-lg-2">
                    <div class=" p-5">

                        <div class="row">


                            <div class="col-12">
                                <div class="row">

                                    <div class="alert alert-secondary d-none" id="alert">
                                        <span class="fs-6 mb-2" id="msg"></span>
                                    </div>

                                    <div class="col-12 card mt-1">
                                        <div class="row">
                                            <div class="col-12">
                                                <label class="form-label fw-bold card-body" style="font-size: 20px;">
                                                    Add a Title to Book
                                                </label>
                                            </div>
                                            <div class="offset-0 offset-lg-2 mb-3 col-12 col-lg-8">
                                                <input type="text" class="form-control" id="title" placeholder="Title "/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-4 card mt-1">
                                        <div class="row">
                                            <div class="col-12">
                                                <label class="form-label fw-bold" style="font-size: 20px;">Select Category</label>
                                            </div>
                                            <div class="col-12">
                                                <select class="form-select" id="cate">
                                                    <option value="0">Select Category</option>
                                                    <?php
                                                    $rs = Database::search("SELECT * FROM `category`");
                                                    $n = $rs->num_rows;
                                                    for ($x = 0; $x < $n; $x++) {
                                                        $d = $rs->fetch_assoc();
                                                    ?>
                                                        <option value="<?php echo $d["id"]; ?>"><?php echo $d["category"]; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-12">
                                                <div class="input-group mt-2 mb-2">
                                                    <input type="text" class="form-control" placeholder="Add new Category" id="category"/>
                                                    <button class="btn btn-outline-primary" type="button" onclick="show4();">+ Add</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-4 card mt-1">
                                        <div class="row">
                                            <div class="col-12">
                                                <label class="form-label fw-bold" style="font-size: 20px;">Select Language</label>
                                            </div>
                                            <div class="col-12">
                                                <select class="form-select" id="lan">
                                                    <option value="0">Select Language</option>
                                                    <?php
                                                    $rs = Database::search("SELECT * FROM `language`");
                                                    $n = $rs->num_rows;
                                                    for ($x = 0; $x < $n; $x++) {
                                                        $d = $rs->fetch_assoc();
                                                    ?>
                                                        <option value="<?php echo $d["id"]; ?>"><?php echo $d["language"]; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-12">
                                                <div class="input-group mt-2 mb-2">
                                                    <input type="text" class="form-control" placeholder="Add new Language" id="Language"/>
                                                    <button class="btn btn-outline-primary" type="button" onclick="show1();">+ Add</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-12 col-lg-4 card mt-1">
                                        <div class="row">
                                            <div class="col-12">
                                                <label class="form-label fw-bold" style="font-size: 20px;">Select Author</label>
                                            </div>
                                            <div class="col-12">

                                                <select class="form-select" id="aut">
                                                    <option value="0">Select Author</option>
                                                    <?php
                                                    $rs = Database::search("SELECT * FROM `author`");
                                                    $n = $rs->num_rows;
                                                    for ($x = 0; $x < $n; $x++) {
                                                        $d = $rs->fetch_assoc();
                                                    ?>
                                                        <option value="<?php echo $d["id_num"]; ?>"><?php echo $d["author"]; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="col-12">
                                                <div class="input-group mt-2 mb-2">
                                                    <input type="text" class="form-control" placeholder="Add new Author" id="Author" />
                                                    <button class="btn btn-outline-primary" type="button" onclick="show2();">+ Add</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-4 card mt-1">
                                        <div class="row">
                                            <div class="col-12">
                                                <label class="form-label fw-bold" style="font-size: 20px;">Select Publisher</label>
                                            </div>
                                            <div class="col-12">
                                                <select class="form-select" id="publi">
                                                    <option value="0">Select Publisher</option>
                                                    <?php
                                                    $rs = Database::search("SELECT * FROM `publisher`");
                                                    $n = $rs->num_rows;

                                                    for ($x = 0; $x < $n; $x++) {
                                                        $d = $rs->fetch_assoc();

                                                    ?>
                                                        <option value="<?php echo $d["id"]; ?>"><?php echo $d["publisher"]; ?></option>
                                                    <?php

                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="col-12">
                                                <div class="input-group mt-2 mb-2">
                                                    <input type="text" class="form-control" placeholder="Add new Publisher" id="Publisher" />
                                                    <button class="btn btn-outline-primary" type="button" onclick="show3();">+ Add</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-4 card mt-1">
                                        <div class="row">
                                            <div class="col-12">
                                                <label class="form-label fw-bold" style="font-size: 20px;">Add Book Quantity</label>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <input type="number" class="form-control" value="0" min="0" id="qty"/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-4 card mt-1 ">
                                        <div class="row">
                                            <div class="col-12">
                                                <label class="form-label fw-bold" style="font-size: 20px;">Add Book Paperback</label>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <input type="number" class="form-control" value="0" min="0" id="paper"/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-4 card mt-1 ">
                                        <div class="row">
                                            <div class="col-12">
                                                <label class="form-label fw-bold" style="font-size: 20px;">Cost Per Item</label>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <div class="input-group mb-2 mt-2">
                                                    <span class="input-group-text">Rs.</span>
                                                    <input type="text" class="form-control" id="price"/>
                                                    <span class="input-group-text">.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-4 card mt-1">
                                        <div class="row">
                                            <div class="col-12">
                                                <label class="form-label fw-bold" style="font-size: 20px;">Delivery Cost</label>
                                            </div>
                                            <div class="col-12">
                                                <div class="input-group mb-2 mt-2">
                                                    <span class="input-group-text">Rs.</span>
                                                    <input type="text" class="form-control" id="dCost"/>
                                                    <span class="input-group-text">.00</span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-4  mt-1 card">
                                        <div class="row p-2">
                                            <div class="col-12">
                                                <label class="form-label fw-bold" style="font-size: 20px;">Approved Payment Methods</label>
                                            </div>
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-2 pm pm1"></div>
                                                    <div class="col-2 pm pm2"></div>
                                                    <div class="col-2 pm pm3"></div>
                                                    <div class="col-2 pm pm4"></div>
                                                    <div class="col-2 pm pm6"></div>
                                                    <div class="col-2 pm pm5"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <hr class="border-success" />
                                    </div>

                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-12">
                                                <label class="form-label fw-bold" style="font-size: 20px;">Add Product Images</label>
                                            </div>
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="offset-lg-4 col-12 col-lg-4 border border-primary rounded ">
                                                        <div class="offset-lg-3 offset-2">
                                                            <img src="resource/product_images/add-icon.png" style="height: 200px;" id="viewImg" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="offset-lg-5 col-12 col-lg-2 d-grid mt-3">
                                                <input type="file" class="d-none" id="imageuploader" multiple />
                                                <label for="imageuploader" class="col-12 btn btn-primary" onclick="changeImage();">Upload Images</label>
                                            </div>
                                        </div>
                                    </div>

                                    <span class="fs-6 mb-2" id="Fill1"></span>

                                    <div class="col-12">
                                        <hr class="border-success" />
                                    </div>

                                    <div class="offset-lg-4 col-12 col-lg-4 d-grid mt-3 mb-3">
                                        <button class="btn btn-success" onclick="addProduct();">Save Product</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!--  -->

                <div class="modal" tabindex="-1" id="addModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <label class="form-label">Confirm the addition</label>
                            </div>
                            <div class="modal-body">
                            <span class="fs-6" id="msg3"></span></br>
                            <span class="fs-4" id="msg2"></span>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="window.location.reload();">Close</button>
                                <button type="button" class="btn btn-primary" onclick="Add();">Add</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!--  -->


            </div>
        </div>

        <!-- Vendor JS Files -->
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
        <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
        <script src="assets/vendor/php-email-form/validate.js"></script>


        <script src="assets/js/main.js"></script>
        <script src="assets/js/script.js"></script>
    </body>

    </html>
<?php

} else {
    echo ("You are Not a valid user");
}

?>